<?php
    //Add connection
    include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct1</title>

    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css">

    <!-- Barcode Scanner Library -->
    <script src="html5-qrcode.min.js"></script>

</head>
<body>

<?php
        include "NavBar.php";
?>

    <div class="my-3 mt-4">
        <h1 class="text-center">Product Information</h1>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12 col-xl-6">
            <!-- Form to submit scanned barcode -->
             <div id="addProductForm">
            <form action="AddProduct1.php" method="post">

                <div class="mb-2">
                    <label for="barcode">Barcode:</label>
                    <input type="text" id="barcode" name="barcode" class="form-control">
                </div>
                <div class="mb-2">
                    <button type="button" class="btn btn-primary" onclick="startScanner()">Scan Barcode</button>
                </div>

                <div id="reader" class="mb-3"></div> <!-- Barcode Scanner Display -->

                <div class="mb-2">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                </div>
                <div class="mb-2">
                    <label for="brand">Brand:</label>
                    <input type="text" name="brand" class="form-control" placeholder="Brand">
                </div>
                <div class="mb-2">
                    <label for="category">Category:</label>
                    <input type="text" name="category" class="form-control" placeholder="Category">
                </div>
                <div class="mb-2">
                    <label for="expire_date">Expire Date:</label>
                    <input type="date" name="expire_date" class="form-control" placeholder="Expire Date">
                </div>
                <div class="mb-2">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                </div>
                <div class="mb-2">
                    <label for="price">Price:</label>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="mb-2">
                    <label for="description">Description:</label>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>
                <div class="row mt-4 pt-3">
                    <div class="col-lg-4">
                        <input type="submit" name="add" value="Add Product" class=" form-control" id="add">
                    </div>
                    <div class="col-xl-4">
                        <button class="form-control" id="main">
                            <a href="../AdminIndex.php" style="text-decoration: none; color: black;">Main</a>
                        </button>
                    </div>
                </div>
            </form>
             </div>
        </div>
    </div>
    <!-- Including Footer -->
    <?php
        include "../Footer.php";
    ?>
<script>
    function startScanner() {
        const html5QrCode = new Html5Qrcode("reader");

        html5QrCode.start(
            { facingMode: "environment" }, // Use the back camera if available
            { fps: 10, qrbox: { width: 450, height: 100 } }, 
            (decodedText) => {
                document.getElementById("barcode").value = decodedText;
                html5QrCode.stop(); // Stop scanning once barcode is detected
            },
            (errorMessage) => {
                console.warn("Scan failed: ", errorMessage);
            }
        ).catch((err) => {
            console.error("Camera access error: ", err);
        });
    }
</script>
          
</body>
</html>


<?php
//Add details
if(isset($_POST['add'])){
$barcode = $_POST['barcode'];
$product_name=$_POST['product_name'];
$brand=$_POST['brand'];
$category=$_POST['category'];
$expire_date =$_POST['expire_date'];
$product_description =$_POST['description'];
$product_quantity=$_POST['quantity'];
$product_price=$_POST['price'];

//checking existing customer IDs
$sql1="SELECT * FROM product WHERE barcode='$barcode'";
$result1=$con->query($sql1);
if($result1->num_rows > 0) {
    echo "<script>alert('This barcode ID is Already exist!')</script>";
}else{
//inserting customers
$sql2 = "INSERT INTO `product`(`barcode`,`name`,`brand`,`price`,`description`,
`category`,`quantity`,`taken_date`,`expire_date`) 
        VALUES('$barcode','$product_name','$brand',$product_price,'$product_description',
        '$category',$product_quantity,Now(),'$expire_date')";

$result2=$con->query($sql2);

if($result2){
    echo "<script>
    alert('successfully inserted');
    </script>";
}else{
    echo "<script>
    alert('not inserted');
    </script>"; 
}}
}

//closing connection
$con->close();
?>