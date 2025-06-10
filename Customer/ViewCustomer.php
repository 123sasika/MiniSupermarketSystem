<?php
//Add connection
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="customer.css">
</head>
<body>
<?php
        include "NavBar.php";
?>
<div class="my-3">
        <h2 class="text-center">View Customer Information</h2>
    </div>
       <!-- table creation -->
        <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Customer Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Location</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `customer`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $C_ID=$row["customerID"];
                                    $C_Name=$row["Customer_Name"];
                                    $C_Gender=$row["Gender"];
                                    $C_MobileNumber=$row["MobileNumber"];
                                    $C_Location=$row["Location"];       
                        ?>
                        <th><?php echo $C_ID;?></th>
                        <td><?php echo $C_Name;?></td>
                        <td><?php echo $C_Gender;?></td>
                        <td><?php echo $C_MobileNumber;?></td>
                        <td><?php echo $C_Location;?></td>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="update1"><a href="UpdateCustomer.php?id=<?php echo $C_ID;?>" style="text-decoration:none; color:white;">Update</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="delete2"><a href="DeleteCustomer1.php?ID=<?php echo $C_ID;?>" style="text-decoration:none; color:white;">Delete</a></button>
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



