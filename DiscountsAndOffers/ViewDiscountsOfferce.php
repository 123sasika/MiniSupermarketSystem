<?php
//Add connection
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Discounts</title>
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
        <h1 class="text-center">View Discounts and Offers Information</h1>
    </div>
       <!-- table creation -->
        <div class="mt-4 col-xl-8">
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



