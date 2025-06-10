<?php
//Add connection
include "../../connection.php";

//Fetching details to the form
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $fetch="SELECT* FROM `product`WHERE p_ID =$ID";
    $result=$con->query($fetch);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product_name=$row['name'];
            $brand=$row['brand'];
            $category=$row['category'];
            $expire_date =$row['expire_date'];
            $product_description =$row['description'];
            $product_quantity=$row['quantity'];
            $product_price=$row['price'];        
        }
    }else{
        echo"";
    }
}else{
    echo "";
}

// updating database
if(isset($_POST['update'])){
    global $ID;
    $product_name=$_POST['product_name'];
    $brand=$_POST['brand'];
    $category=$_POST['category'];
    $expire_date =$_POST['expire_date'];
    $product_description =$_POST['description'];
    $product_quantity=$_POST['quantity'];
    $product_price=$_POST['price'];

    $sql4="UPDATE product SET `name`='$product_name',`brand`='$brand',
    `price`=$product_price,`description`='$product_description',`category`='$category',`quantity`='$product_quantity',
    `expire_date`='$expire_date' WHERE p_ID =$ID";
    $result4=$con->query($sql4);
    if($result4) {
        echo "<script>
        alert('succesfully updated');
        window.open('ViewProduct.php','_self');
        </script>";
    }else{ 
        echo "<script>alert('not updated');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
        <link rel="stylesheet" href="product.css">
</head>
<body>
<?php
        include "NavBar.php";
?>
    <div class="my-3">
        <h1 class="text-center">Update Product Information</h1>
    </div>
    <div class="row justify-content-center" id="addProductForm">
        <div class="col-lg-12 col-xl-6" >
        <form action=""method="post">
            <div class="mb-2" id="mb-22">
            <label for="product_id">Product ID:</label>
                 <input type="text"name="product_id"class="form-control" value="<?php echo $ID;?>" placeholder="Product Id">
            </div>
            <div class="mb-2">
            <label for="product_name">Product Name:</label>
                 <input type="text"name="product_name"class="form-control" value="<?php echo $product_name;?>" placeholder="Product Name">
            </div>
            <div class="mb-2">
            <label for="brand">Brand:</label>
                <input type="text"name="brand"class="form-control" value="<?php echo $brand;?>" placeholder="Brand">
            </div>
            <div class="mb-2">
            <label for="category">Category:</label>
                 <input type="text"name="category"class="form-control" value="<?php echo $category;?>" placeholder="Category">
            </div>
            <div class="mb-2">
            <label for="expire_date">Expire Date:</label>
                 <input type="date"name="expire_date"class="form-control" value="<?php echo $expire_date;?>" placeholder="Expire Date">
            </div>
            <div class="mb-2">
            <label for="quantity">Quantity:</label>
                 <input type="text"name="quantity"class="form-control" value="<?php echo $product_quantity;?>" placeholder="Quantity">
            </div>
            <div class="mb-2">
            <label for="Price">Price:</label>
                <input type="text"name="price"class="form-control" value="<?php echo $product_price;?>" placeholder="Price">
            </div>
            <div class="mb-2">
            <label for="description">Desciption:</label>
                 <input type="text"name="description"class="form-control" value="<?php echo $product_description;?>" placeholder="Desciption">
            </div>
            <div class="row mt-4 pt-3">
                <div class="col-lg-4">
                 <input type="submit"name="update"value="update"class=" form-control" id="update2">
                </div>
                <div class="col-xl-4" >
                        <button class=" form-control" id="goBack2"><a href="ViewProduct.php" style="text-decoration:none;color:black;" >Go Back</a></button>
                    </div>              
            </div>
         </form>
        </div>
    </div>
    <?php
        include "../../Footer.php";
    ?>
</body>
</html>



