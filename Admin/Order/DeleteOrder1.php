<?php
//Add connection
include "../../connection.php";

 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteOrder1</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="preOrder.css">
        <link rel="stylesheet" href="order.css">

</head>
<body>
<?php
        include "NavBar.php";

        //fetching details from orders table in DB
        if(isset($_GET['ID'])){
            $id1 = $_GET['ID'];
            $fetch="SELECT orders.order_ID,orders.total_price,orders.date
                    FROM `orders`
                    WHERE orders.order_ID=$id1"; 
            $result=$con->query($fetch);
            $row = $result->fetch_assoc();
                        $order_ID=$row["order_ID"];
                        $date=$row["date"];
                        $total_price=$row["total_price"];
                    
?>
    <div class="my-3">
        <h2 class="text-center">Delete Cash On Hand Order Information</h2>
    </div>

    <div class="mt-4 col-xl-3">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Oder ID</th>  
                        <td><?php global $order_ID; echo $order_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Date</th>
                        <td><?php global $date; echo $date;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Price</th>
                        <td><?php global $total_price; echo $total_price;?></td>
                    </tr>
            </table>
        </div>

       <!-- table creation -->
       <div class="mt-4 col-xl-8">
       <h1><span class="badge text-bg-secondary ms-5 mb-0 mt-4">Corresponding Details</span></h1>
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Bar code</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        //Fetching details from orders_item table in DB
                            $fetch="SELECT orders_item.bar_code,orders_item.quantity,orders_item.price
                                    FROM `orders_item`
                                    WHERE orders_item.order_id=$id1";
                            $result=$con->query($fetch);
                            while($row = $result->fetch_assoc()){
                                        $bar_code=$row["bar_code"];
                                        $quantity=$row["quantity"];
                                        $price=$row["price"];
                                 
                          ?>     
                        <td><?php echo $bar_code;?></td>
                        <td><?php echo $quantity;?></td>
                        <td><?php echo $price;?></td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
            </table>

            <button class="btn btn-success px-3"><a href="DeleteOrder2.php?id=<?php echo $order_ID;?>" style="text-decoration:none; color:white;">Delete</a></button>
            <button class="btn btn-success px-3"><a href="ViewOrder.php" style="text-decoration:none; color:white;">View Orders</a></button>

        </div>
                       <!-- including footer -->
                       <?php
        include "../../Footer.php";
        ?>
</body>
</html>

