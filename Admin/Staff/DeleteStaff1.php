<?php
//Add connection
include "../../connection.php";

    //Fetching details to the table
    if(isset($_GET['s_ID'])){
        $id1 = $_GET['s_ID'];
        $fetch="SELECT* FROM `staff`WHERE s_ID =$id1";
        $result=$con->query($fetch);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $s_ID=$row["s_ID"];
            $name=$row['name'];
            $userName=$row['userName'];
            $password=$row['password'];
            $confirmpassword=$row['confirmpassword'];
            $DoB =$row['birthday'];
            $gender =$row['gender'];
            $sallary =$row['sallery'];
            $contact1 =$row['number1'];
            $contact2 =$row['number2'];
            $address =$row['address'];
            $registerDateTime =$row['registerDateTime'];

        }    
    }  
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteStaff1</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">
</head>
<body>

 <?php
        include "NavBar.php";
?> 
    <div class="my-3">
        <h1 class="text-center">Delete Staff Information</h1>
    </div>

    <!-- table creation -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Staff ID</th>  
                        <td><?php global $s_ID; echo $s_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Full Name</th>
                        <td><?php global $name;echo $name;?></td> 
                    </tr>
                    <tr>
                        <th scope="col">Sallery</th>
                        <td><?php global $sallary; echo $sallary;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Registered Date, Time</th>
                        <td><?php global $registerDateTime; echo $registerDateTime;?></td>
                    </tr>
                    <tr>
                        <th scope="col">User Name</th>
                        <td><?php global $userName; echo $userName;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Password</th>
                        <td><?php global $password; echo $password;?></td>
                    </tr>                    
                    <tr>
                        <th scope="col">Date of Birth</th>
                        <td><?php global $DoB; echo $DoB;?></td>
                    </tr>                    
                    <tr>
                        <th scope="col">Gender</th>
                        <td><?php global $gender; echo $gender;?></td>
                    </tr>                    
                    <tr>
                        <th scope="col">Contact Number 1</th>
                        <td><?php global $contact1; echo $contact1;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Contact Number 2</th>
                        <td><?php global $contact2; echo $contact2;?></td>
                    </tr>                    
                    <tr>
                        <th scope="col">Address</th>
                        <td><?php global $address; echo $address;?></td>
                    </tr>
                    <tr>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="submit3"><a href="DeleteStaff1.php?ids=<?php global $id1; echo $id1;?>" style="text-decoration:none; color:black;">Delete</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="submit2"><a href="ViewStaff.php" style="text-decoration:none; color:black;">Cancel</a></button>
                        </td>
                    </tr>
            </table>
        </div>
</body>
</html>


<?php
    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM staff WHERE s_ID=$id6";
        $con->query($delete0);
        echo 
        "<script>
        alert('Staff member Deleted');
        window.open('ViewStaff.php','_self');
        </script>";
    }
?>
