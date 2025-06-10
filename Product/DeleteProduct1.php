<?php
//Add connection
include "../connection.php";

    //Fetching details from db to the table
    if(isset($_GET['ID'])){
        $id1 = $_GET['ID'];
        $fetch="SELECT* FROM `product`WHERE p_ID=$id1";
        $result=$con->query($fetch);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_ID=$row['p_ID'];
            $product_name=$row['name'];
            $brand=$row['brand'];
            $category=$row['category'];
            $taken_date =$row['taken_date'];
            $expire_date =$row['expire_date'];
            $product_description =$row['description'];
            $product_quantity=$row['quantity'];
            $product_price=$row['price']; 
        }    
    }  
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteProduct1</title>
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
        <h1 class="text-center">Delete Product Information</h1>
    </div>
    <!-- table creation -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Product ID</th>  
                        <td><?php global $product_ID; echo $product_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Product Name</th>
                        <td><?php global $product_name;echo $product_name;?></td> 
                    </tr>
                    <tr>
                        <th scope="col">Brand</th>
                        <td><?php global $brand; echo $brand;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Category</th>
                        <td><?php global $category; echo $category;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Taken Date</th>
                        <td><?php global $taken_date; echo $taken_date;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Expire Date</th>
                        <td><?php global $expire_date; echo $expire_date;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Product Description</th>
                        <td><?php global $product_description; echo $product_description;?></td>
                    </tr>
                    <tr>
                        <th scope="col">product Quantity</th>
                        <td><?php global $product_quantity; echo $product_quantity;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Product Price</th>
                        <td><?php global $product_price; echo $product_price;?></td>
                    </tr>
                    <tr>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="delete"><a href="DeleteProduct1.php?ids=<?php global $product_ID; echo $product_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="cancel"><a href="ViewProduct.php" style="text-decoration:none; color:black;">Cancel</a></button>
                        </td>
                    </tr>
            </table>
        </div>
</body>
</html>

<?php
    // delete product from the db
    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM product WHERE p_ID=$id6";
        $con->query($delete0);
        echo 
        "<script>
        alert('Product Deleted!');
        window.open('ViewProduct.php','_self');
        </script>";
    }
?>
