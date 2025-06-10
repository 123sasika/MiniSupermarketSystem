<?php
//Add connection
include "../../connection.php";

//Fetching details from db to the form
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $fetch="SELECT* FROM `supplier`WHERE su_ID=$ID";
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
    $Supplier_Name=$_POST['Supplier_Name'];
    $Rating=$_POST['Rating'];
    $Telephone_Number1=$_POST['Telephone_Number1'];
    $Telephone_Number2 =$_POST['Telephone_Number2'];
    $Location =$_POST['Location'];
    $Email =$_POST['Email'];


    $sql4="UPDATE `supplier` SET name='$Supplier_Name',rating='$Rating',location='$Location',
    TelephoneNumber1='$Telephone_Number1',TelephoneNumber2='$Telephone_Number2',`e-mail`='$Email'
    WHERE su_ID=$ID";
    $result4=$con->query($sql4);
    if($result4) {
        echo 
        "<script>
        alert('succesfully updated');
        window.open('ViewSupplier.php');
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
    <title>UpdateSupplier</title>
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
        <h2 class="text-center">Update Supplier Information</h2>
    </div>
    <div class="row justify-content-center" id="addProductForm">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="mb-2">
                <label for="Supplier_ID">Supplier ID:</label>
                 <input type="text"name="Supplier_ID"class="form-control" placeholder="Supplier ID" value="<?php echo $su_ID; ?>">
                </div>
                <div class="mb-2">
                <label for="   Supplier_Name">   Supplier Name:</label>
                <input type="text"name="Supplier_Name"class="form-control"  placeholder="Supplier Name" value="<?php echo $name; ?>">
                </div>
                <div class="mb-2">
                <label for="Rating">:Rating</label>
                <input type="text"name="Rating"class="form-control" placeholder="Rating" value="<?php echo $rating; ?>">
                </div>
                <div class="mb-2">
                <label for="Telephone_Number1">Telephone Number 1:</label>
                <input type="telephone"name="Telephone_Number1"class="form-control" placeholder="Telephone Number 1" value="<?php echo $TelephoneNumber1; ?>">
                </div>
                <div class="mb-2">
                <label for="Telephone_Number2">Telephone Number 2:</label>
                 <input type="telephone"name="Telephone_Number2"class="form-control" placeholder="Telephone Number 2" value="<?php echo $TelephoneNumber2; ?>">
                </div>
                <div class="mb-2">
                <label for="Locaion">Locaion:</label>
                 <input type="text"name="Location"class="form-control" placeholder="Location" value="<?php echo $location; ?>">
                </div>
                <div class="mb-2">
                <label for="Email">E-mail:</label>
                 <input type="text"name="Email"class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                </div>

                <div class="row mt-4 pt-3">
                    <div class="col-lg-4">
                        <input type="submit" name="UPDATE" value="Update" class=" form-control" id="update2">
                    </div>
                    <div class="col-xl-4">
                        <button class=" form-control" id="goBack2"><a href="ViewSupplier.php" style="text-decoration:none;color:black;">Go Back</a></button>
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



