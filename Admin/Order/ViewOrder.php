<?php
//Add connection
include "../../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
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
        <h1 class="text-center">View Cash on Hand Order Information</h1>
    </div>
       <!-- table creation -->
        <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Oder ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `orders`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $order_ID=$row["order_ID"];
                                    $date=$row["date"];
                                    $Total_price=$row["total_price"];      
                        ?>
                        <th><?php echo $order_ID;?></th>
                        <td><?php echo $date;?></td>
                        <td><?php echo $Total_price;?></td>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3"><a href="DeleteOrder1.php?ID=<?php echo $order_ID;?>" style="text-decoration:none; color:white;">Delete</a></button>
                        </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>
        <!-- including footer -->
        <?php
        include "../../Footer.php";
        ?>
</body>
</html>



