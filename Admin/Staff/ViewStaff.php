
<?php
//Add connection
include "../../connection.php";

    $sql3="SHOW TABLE STATUS LIKE 'product'";
    $result3=$con->query($sql3);
    $row=$result3->fetch_assoc();
    $new=$row['Auto_increment'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="staff.css">
</head>
<body>

 <?php
        include "NavBar.php";
?> 
<div class="my-3">
        <h2 class="text-center">View Staff Information</h2>
    </div>
       <!-- table creation -->
        <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Sallery</th>
                        <th scope="col">Registered Date, Time</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Contact Number 1</th>
                        <th scope="col">Contact Number 2</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            //Fetching details to the table
                            $fetch="SELECT* FROM `staff`";
                            $result=$con->query($fetch);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $s_ID =$row["s_ID"];
                                    $userName=$row["userName"];
                                    $password=$row["password"];
                                    $name=$row["name"];
                                    $birthday=$row["birthday"];
                                    $gender=$row["gender"]; 
                                    $number1=$row["number1"];       
                                    $number2=$row["number2"];  
                                    $address=$row["address"];    
                                    $sallery=$row["sallery"];       
                                    $registerDateTime=$row["registerDateTime"];           
                        ?>
                        <th><?php echo $s_ID;?></th>
                        <td><?php echo $name;?></td>
                        <td><?php echo $sallery;?></td>
                        <td><?php echo $registerDateTime;?></td>
                        <td><?php echo $userName;?></td>
                        <td><?php echo $password;?></td>
                        <td><?php echo $birthday;?></td>
                        <td><?php echo $gender;?></td>
                        <td><?php echo $number1;?></td>
                        <td><?php echo $number2;?></td>
                        <td><?php echo $address;?></td>


                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="submit5"><a href="UpdateStaff.php?s_ID=<?php echo $s_ID;?>" style="text-decoration:none; color:black;">Update</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="submit4"><a href="DeleteStaff1.php?s_ID=<?php echo $s_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
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



