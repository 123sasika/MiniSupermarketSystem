<?php
// Start session and include DB connection
$total=0;
session_start();
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddOrder1</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Barcode Scanner Library -->
    <script src="../Product/html5-qrcode.min.js"></script>

    <link rel="stylesheet" href="order.css">
</head>
<body> 
    <!-- Navigation bar -->
    <?php include "NavBar.php"; ?>

    <div class="my-3">
        <h2 class="text-center">Add Order Information</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post"> 
                <div>  
                    <div class="mb-2">
                        <label for="barcode">Barcode:</label>
                        <input type="text" id="barcode" name="barcode" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary" onclick="startScanner()">Scan Barcode</button>
                    </div>

                    <div id="reader" class="mb-3"></div> <!-- Barcode Scanner Display --> 

                    <div class="mb-2">
                        <label for="Quantity">Quantity:</label>
                        <input type="text" id="Quantity" name="Quantity" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="col-lg-5 mb-1 mt-2">    
                        <input type="submit" name="ADD" value="Add Items" class="btn btn-primary">  
                    </div>
                </div>
            </form>

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

<?php
// Handle Add Items
if (isset($_POST['ADD'])) {
    $BarCode = $_POST['barcode'];
    $Quantity = $_POST['Quantity'];

    // Only create a new order if not already started
    if (!isset($_SESSION['order_ID'])) {
        $sql00 = "INSERT INTO `orders` (`date`) VALUES (Now())";
        $result00 = $con->query($sql00);
        if ($result00) {
            $_SESSION['order_ID'] = $con->insert_id;
        } else {
            echo "Failed to create new order.";
        }
    }

    // Fetch product quantity
    $sql4 = "SELECT `price`,`quantity` FROM `product` WHERE `barcode`='$BarCode'";
    $result4 = $con->query($sql4);
    if ($result4 && $row = $result4->fetch_assoc()) {
        $quantity1 = $row['quantity'];
        $price1 = $row['price'];

        //calculating price
        $sum=$price1*$Quantity;

        // Update product quantity
        $remaining = $quantity1 - $Quantity;
        $sql5 = "UPDATE `product` SET `quantity`=$remaining WHERE `barcode`='$BarCode'";
        $result5 = $con->query($sql5);
        if (!$result5) {
            echo "Failed to update product quantity.";
        }
    } else {
        echo "Invalid barcode or product not found.";
    }
    global $sum;

    $order_ID = $_SESSION['order_ID'];
    // Insert into orders_item
    $sql0 = "INSERT INTO `orders_item` (`bar_code`, `quantity`, `order_id`,`price`) VALUES ('$BarCode', $Quantity, $order_ID,$sum)";
    $result0 = $con->query($sql0);
    if (!$result0) {
        echo "Failed to insert item.";
    }
}




?>

            <form method="post" action="">
                <div class="row mt-4 pt-3">
                    <div class="col-xl-4">
                        <input type="submit" name="Pay" value="Pay" class="form-control btn btn-success" id="add" style="text-decoration:none;color:black;">
                    </div>
                </div>           
            </form>
        </div> 
    </div>


    <!-- Discount and Offerce table creation -->
    <!-- <div class="col-xl-4">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Discount and offer Id</th>
                        <th scope="col">Discount Name</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `discountsandofferce`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $Discount_ID=$row["Discount_ID"];
                                    $discount_name=$row["discount_name"];
                                    $price=$row["price"];       
                        ?>
                        <th><?php echo $Discount_ID;?></th>
                        <td><?php echo $discount_name;?></td>
                        <td><?php echo $price;?></td>
                        <td>
                        <a href="AddOrder1.php?id=<?php echo $price; ?>" class="btn btn-primary btn-sm">Add</a>
                    </td>
                    </tr>
                    <?php }}?>
                </tbody>
        </table>
    </div> -->


    <!-- Order Items Table -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['order_ID'])) {
                    $order_ID = $_SESSION['order_ID'];
                    $fetch33 = "SELECT * FROM `orders_item` WHERE `order_id`=$order_ID";
                    $result33 = $con->query($fetch33);
                    if ($result33->num_rows > 0) {
                        global $total;
                        while ($row33 = $result33->fetch_assoc()) {
                            $ID = $row33["id"];
                            $Barcode = $row33["bar_code"];
                            $quantity = $row33["quantity"];
                            $price = $row33["price"];
                            $total=$total+$price;
                ?>
                <tr>
                    <td><?php echo $order_ID; ?></td>
                    <td><?php echo $Barcode; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <a href="DeleteExistingOrder.php?ID=<?php echo $ID; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                        }
                    }}
                
                global $total;
                echo "
                <div class='d-grid gap-2 col-6 mx-auto'>
                <h1>Total Price:  <span class='badge text-bg-primary'>$total</span></h1>
                </div>";

                if (isset($_POST['Pay'])) {
                    global $order_ID;
                    
                    if($total==0){
                        echo "
                        <script>
                            alert('Add orders before paying');
                            window.open('AddOrder1.php','_self');
                        </script>";
                    }else{
                    $sql000 = "UPDATE `orders` SET `total_price` = $total WHERE `order_ID` = $order_ID";
                    $result000 = $con->query($sql000);
                    if (!$result000) {
                        echo "Failed to add total to new order.";
                    } 
                    // Clear session to start a new order
                    unset($_SESSION['order_ID']);
                    echo "<div class='alert alert-success'>Order completed successfully!</div>";
                }}
                ?>
            </tbody>
        </table>
    </div>

        <!-- including footer -->
        <?php
        include "../Footer.php";
        ?>
</body>
</html>
