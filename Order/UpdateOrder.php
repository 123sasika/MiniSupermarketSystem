<?php
//Add connection
include "../connection.php";

//Fetching details from db to the form
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $fetch="SELECT* FROM `orders`WHERE order_ID=$ID";
    $result=$con->query($fetch);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $order_ID=$row["order_ID"];
            $date=$row["date"];
            $quantity=$row["quantity"];
            $total_price=$row["total_price"];      
        }
    }else{
        echo"";
    }
}else{
    echo "";
}

// updating database
if(isset($_POST['UPDATE'])){
    $name=$_POST['name'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];

    $sql4="UPDATE orders SET oder_name='$name',
    quantity=$quantity,total_price=$price";
    $result4=$con->query($sql4);
    if($result4) {
        echo "<script>alert('succesfully updated');</script>";
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
    <title>UpdateOrder</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
        <link rel="stylesheet" href="order.css">

</head>
<body>
<?php
        include "NavBar.php";
?>
    <div class="my-3">
        <h1 class="text-center">    <div class="my-3">
        <h2 class="text-center">Update Cash On Hand Order Information</h2>
    </div></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
        <form action=""method="post">
                <div class="mb-2">
                    <label for="id">Order ID:</label>
                    <input type="text"name="Id"class="form-control"placeholder="Order Id" value="<?php echo $order_ID; ?>">
                </div>
                <div class="mb-2">
                    <label for="name">Order Name:</label>
                    <input type="text"name="name"class="form-control" placeholder="Order Name" value="<?php echo $oder_name; ?>">
                </div>
                <div class="mb-2">
                    <label for="Quantity">Quantity:</label>
                    <input type="text"name="quantity"class="form-control" placeholder="Quantity" value="<?php echo $quantity; ?>">
                </div>
                <div class="mb-2">
                    <label for="TotalPrice">Total Price:</label>
                    <input type="text"name="price"class="form-control" placeholder="Total Price" value="<?php echo $total_price; ?>">
                </div>
                <div class="mb-2">
                    <label for="TotalPrice">Date:</label>
                    <input type="text"name="Date"class="form-control" placeholder="Date" value="<?php echo $date; ?>">
                </div>
                <div class="row mt-4 pt-3">
                    <div class="col-lg-4">
                        <input type="submit" name="UPDATE" value="Update" class=" form-control" id="submit">
                    </div>
                    <div class="col-xl-4">
                        <button class=" form-control" id="submit"><a href="ViewOrder.php" style="text-decoration:none;color:black;">Go Back</a></button>
                    </div>
                </div>
             </form>
        </div>
    </div>
    <?php
        include "../Footer.php";
    ?>
</body>
</html>



