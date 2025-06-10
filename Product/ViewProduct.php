<?php
    //Add connection
    include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css">
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewProduct</title>
</head>
<body>
<?php
        include "NavBar.php";
?>
    <div class="my-3">
        <h1 class="text-center">View Product Information</h1>
    </div>
       <!-- table creation -->
       <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Barcord</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Taken Date</th>
                        <th scope="col">Expire Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `product`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $product_ID=$row['p_ID'];
                                    $barcode=$row['barcode'];
                                    $product_name=$row['name'];
                                    $brand=$row['brand'];
                                    $category=$row['category'];
                                    $taken_date =$row['taken_date'];
                                    $expire_date =$row['expire_date'];
                                    $product_description =$row['description'];
                                    $product_quantity=$row['quantity'];
                                    $product_price=$row['price'];
                        ?>
                        <th><?php echo $product_ID;?></th>
                        <td><?php echo $barcode;?></td>
                        <td><?php echo $product_name;?></td>
                        <td><?php echo $brand;?></td>
                        <td><?php echo $category;?></td>
                        <td><?php echo $taken_date;?></td>
                        <td><?php echo $expire_date;?></td>
                        <td><?php echo $product_price;?></td>
                        <td><?php echo $product_quantity;?></td>
                        <td><?php echo $product_description;?></td>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="update1"><a href="UpdateProduct.php?id=<?php echo $product_ID;?>" style="text-decoration:none; color:black;">Update</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="delete2"><a href="DeleteProduct1.php?ID=<?php echo $product_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
                        </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>
    <!-- including footer -->
    <?php
        include "../Footer.php";
    ?>
</body>
</html>