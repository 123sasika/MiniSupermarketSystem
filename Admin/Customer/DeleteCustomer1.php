<?php
//Add connection
include "../../connection.php";

    //Fetching details to the table
    if(isset($_GET['ID'])){
        $id1 = $_GET['ID'];
        $fetch="SELECT* FROM `customer`WHERE customerID=$id1";
        $result=$con->query($fetch);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $C_ID=$row["customerID"];
            $C_Name=$row["Customer_Name"];
            $C_Gender=$row["Gender"];
            $C_MobileNumber=$row["MobileNumber"];
            $C_Location=$row["Location"]; 
        }    
    }  
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteCustomer1</title>
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
        <h2 class="text-center">Delete Customer Information</h2>
    </div>
    <!-- table creation -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Customer ID</th>  
                        <td><?php global $C_ID; echo $C_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Customer Name</th>
                        <td><?php global $C_Name;echo $C_Name;?></td> 
                    </tr>
                    <tr>
                        <th scope="col">Gender</th>
                        <td><?php global $C_Gender; echo $C_Gender;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Mobile Number</th>
                        <td><?php global $C_MobileNumber; echo $C_MobileNumber;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Location</th>
                        <td><?php global $C_Location; echo $C_Location;?></td>
                    </tr>
                    <tr>
                        <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="delete"><a href="DeleteCustomer1.php?ids=<?php global $C_ID; echo $C_ID;?>" style="text-decoration:none; color:white;">Delete</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="cancel"><a href="ViewCustomer.php" style="text-decoration:none; color:white;">Cancel</a></button>
                        </td>
                    </tr>
            </table>
        </div>
</body>
</html>

<?php
    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM customer WHERE customerID=$id6";
        $con->query($delete0);
        echo "<script>
         alert('Customer Deleted!');
        window.open('ViewCustomer.php','_self');
         </script>";
    }
?>

