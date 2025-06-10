<?php
//Add connection
include "../../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Supplier Information</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="supplier.css">
</head>
<body>
<?php
        include "NavBar.php";
?>
<div class="my-3">
        <h2 class="text-center">View Supplier Information</h2>
    </div>
       <!-- table creation -->
        <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Telephone Number 1</th>
                        <th scope="col">Telephone Number 2</th>
                        <th scope="col">Location</th>
                        <th scope="col">E-mail</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `supplier`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $su_ID=$row["su_ID"];
                                    $name=$row["name"];
                                    $rating=$row["rating"];
                                    $location=$row["location"];
                                    $TelephoneNumber1=$row["TelephoneNumber1"];     
                                    $TelephoneNumber2=$row["TelephoneNumber2"];
                                    $email=$row["e-mail"];  
                        ?>
                        <th><?php echo $su_ID;?></th>
                        <td><?php echo $name;?></td>
                        <td><?php echo $rating;?></td>
                        <td><?php echo $location;?></td>
                        <td><?php echo $TelephoneNumber1;?></td>
                        <td><?php echo $TelephoneNumber2;?></td>
                        <td><?php echo $email;?></td>

                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="update1"><a href="UpdateSupplier.php?id=<?php echo $su_ID;?>" style="text-decoration:none; color:black;">Update</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="delete2"><a href="DeleteSupplier1.php?ID=<?php echo $su_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
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



