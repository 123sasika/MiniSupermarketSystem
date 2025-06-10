<?php
//Add connection
include "../../connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddSupplier1</title>
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
        <h2 class="text-center">Add Supplier Information</h2>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
         <form action="AddSupplier1.php"method="post">
            <div class="mb-2">
            <label for="Supplier_Name">Supplier Name:</label>
                 <input type="text"name="Supplier_Name"class="form-control"  placeholder="Supplier Name">
            </div>
            <div class="mb-2">
            <label for="Rating">Rating:</label>
                 <input type="text"name="Rating"class="form-control" placeholder="Rating">
            </div>
            <div class="mb-2">
            <label for="Telephone_Number1">Telephone Number 1:</label>
                 <input type="telephone"name="Telephone_Number1"class="form-control" placeholder="Telephone Number 1">
            </div>
            <div class="mb-2">
            <label for=" Telephone_Number2 "> Telephone Number 2 :</label>
                 <input type="telephone"name="Telephone_Number2"class="form-control" placeholder="Telephone Number 2">
            </div>
            <div class="mb-2">
            <label for="Location">Location:</label>
                 <input type="text"name="Location"class="form-control" placeholder="Location">
            </div>
            <div class="mb-2">
            <label for="Email">E-mail:</label>
                 <input type="text"name="Email"class="form-control" placeholder="Email">
            </div>
            <div class="row mt-4 pt-3">
                <div class="col-lg-4">
                 <input type="submit"name="ADD"value="Add"class=" form-control" id="add">
                </div>
                <div class="col-xl-4">
                        <button class="form-control" id="main"><a href="../staff/index.php" style="text-decoration:none;color:black;" >Main</a></button>
                    </div>               
            </div>
         </form>
        </div>
       </div>
 
               <!-- including footer -->
               <?php
        include "../../Footer.php";
        ?>
</body>
</html>


<?php
//Add details
if(isset($_POST['ADD'])){
$Supplier_Name=$_POST['Supplier_Name'];
$Rating=$_POST['Rating'];
$Telephone_Number1=$_POST['Telephone_Number1'];
$Telephone_Number2=$_POST['Telephone_Number2'];
$Location =$_POST['Location'];
$Email =$_POST['Email'];

//inserting customers
$sql2 = "INSERT INTO `supplier`(`name`,`rating`,`location`,`TelephoneNumber1`,
`TelephoneNumber2`,`e-mail`)
        VALUES('$Supplier_Name','$Rating','$Location','$Telephone_Number1','$Telephone_Number2','$Email')";

$result2=$con->query($sql2);

if($result2){
    echo "<script>alert('successfully inserted')</script>";
}
}

//closing connection
$con->close();
?>
