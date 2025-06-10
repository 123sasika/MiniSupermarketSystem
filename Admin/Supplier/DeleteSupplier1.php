<?php
//Add connection
include "../../connection.php";

    //Fetching details from db to the table
    if(isset($_GET['ID'])){
        $id1 = $_GET['ID'];
        $fetch="SELECT* FROM `supplier`WHERE su_ID=$id1";
        $result=$con->query($fetch);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $su_ID=$row["su_ID"];
            $name=$row["name"];
            $rating=$row["rating"];
            $location=$row["location"];
            $TelephoneNumber1=$row["TelephoneNumber1"]; 
            $TelephoneNumber2=$row["TelephoneNumber2"]; 
            $email=$row["e-mail"]; 

        }    
    }  
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteSupplier1</title>
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
        <h2 class="text-center">Delete Supplier Information</h2>
       </div>
    <!-- table creation -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Supplier ID</th>  
                        <td><?php global $su_ID; echo $su_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Supplier Name</th>
                        <td><?php global $name;echo $name;?></td> 
                    </tr>
                    <tr>
                        <th scope="col">Rating</th>
                        <td><?php global $rating; echo $rating;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Telephone Number 1</th>
                        <td><?php global $TelephoneNumber1; echo $TelephoneNumber1;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Telephone Number 2</th>
                        <td><?php global $TelephoneNumber2; echo $TelephoneNumber2;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Location</th>
                        <td><?php global $location; echo $location;?></td>
                    </tr>
                    <tr>
                        <th scope="col">E-mail</th>
                        <td><?php global $email; echo $email;?></td>
                    </tr>
                    <tr>
                    
                        <td>
                        
                            <button class="btn btn-success px-3" id="delete"><a href="DeleteSupplier1.php?ids=<?php global $su_ID; echo $su_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="cancel"><a href="ViewSupplier.php" style="text-decoration:none; color:black;">Cancel</a></button>
                        </td>
                    </tr>
            </table>
        </div>
</body>
</html>



<?php
    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM supplier WHERE su_ID=$id6";
        $con->query($delete0);
        echo 
        "<script>
        alert('Supplier Deleted!');
        window.open('ViewSupplier.php');
        </script>";
    }
?>

