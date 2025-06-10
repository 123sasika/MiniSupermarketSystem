<?php
//Add connection
include "../../connection.php";

//Add details
if(isset($_POST['ADD'])){
    $discount_name=$_POST['discount_name'];
    $price=$_POST['price'];

//checking existing customer IDs
$sql1="SELECT * FROM discountsandofferce WHERE discount_name='$discount_name'";
$result1=$con->query($sql1);
if($result1->num_rows > 0) {
    echo "<script>alert('This Discount or order name is already exist!')</script>";
}else{
//inserting customers
$sql2 = "INSERT INTO `discountsandofferce`(`discount_name`,`price`) 
        VALUES('$discount_name','$price')";

$result2=$con->query($sql2);

if($result2){
    echo "<script>alert('Item added successfully!');</script>";
}}
}

//closing connection
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount_Offers1</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Discount.css">
</head>
<body>
<?php
        include "NavBar.php";
?>
       <div class="my-3">
        <h2 class="text-center">Add Discounts and Offrece</h2>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
         <form action=""method="post">
            <div class="mb-2">
            <label for="Discount Name ">Discount Name </label>
            <input type="text"name="discount_name"class="form-control" placeholder="Item Name">
            </div>
            <div class="mb-2">
            <label for="price">Price</label>
                 <input type="text"name="price"class="form-control" placeholder="Price">
            </div>
            
            <div class="row mt-4 pt-3">
                <div class="col-lg-4">
                 <input type="submit"name="ADD"value="Add"class=" form-control" id="submit">
                </div>
                <div class="col-xl-4">
                        <button class=" form-control" id="submit"><a href="../AdminIndex.php" style="text-decoration:none;color:black;">Main</a></button>
                </div>              
            </div>
         </form>
        </div>
       <?php
include "../../Footer.php";
?>
</body>
</html>
