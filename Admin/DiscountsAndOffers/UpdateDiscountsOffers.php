<?php
//Add connection
include "../../connection.php";

//Fetching details to the form
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $fetch="SELECT* FROM `discountsandofferce`WHERE Discount_ID=$ID";
    $result=$con->query($fetch);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Discount_ID=$row["Discount_ID"];
            $discount_name=$row["discount_name"];
            $price=$row["price"];       
        }
    }else{
        echo"";
    }
}else{
    echo "";
}

// updating database
if(isset($_POST['UPDATE'])){
    global $ID;
    // $orderID=$_POST['orderID'];
    $discount_name=$_POST['discount_name'];
    $price=$_POST['price'];

    $sql4="UPDATE discountsandofferce SET discount_name='$discount_name',
    price='$price'WHERE Discount_ID=$ID";
    $result4=$con->query($sql4);
    if($result4) {
        echo "<script>
        alert('succesfully updated');
        window.open('ViewDiscountsOfferce.php','_self');
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
    <title>UpdateDiscount</title>
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
        <h1 class="text-center">Update Discounts and Offrece</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="mb-4">
                    <label for=" Order ID"> Order ID</label>
                 <input type="text"name="orderID"class="form-control" placeholder="Order Id"value="<?php echo $Discount_ID; ?>">
                </div>
                <div class="mb-4">
                <label for="Discount Name ">Discount Name </label>
                 <input type="text"name="discount_name"class="form-control" placeholder="Item Name" value="<?php echo $discount_name; ?>">
                </div>
                <div class="mb-4">
                <label for="price">Price</label>
                <input type="text"name="price"class="form-control" placeholder="Price" value="<?php echo $price; ?>">
                </div>

                <div class="row mt-4 pt-3">
                    <div class="col-lg-4">
                        <input type="submit" name="UPDATE" value="Update" class=" form-control" id="submit">
                    </div>
                    <div class="col-xl-4">
                        <button class=" form-control" id="submit"><a href="ViewDiscountsOfferce.php" style="text-decoration:none;color:black;">Go Back</a></button>
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



