<?php
//Add connection
include "../../connection.php";

    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM supplier WHERE su_ID=$id6";
        $con->query($delete0);
        echo "<script> alert('Supplier Deleted!');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteSupplier2</title>
<!-- bootstrap CSS Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="supplier.css">
</head>
<body>
<?php
        include "NavBar.php";
?>
<button class="btn btn-warning px-3" id="goBack"><a href="ViewSupplier.php" style="text-decoration:none; color:black;">Go back</a></button>
<button class="btn btn-warning px-3" id="Main2"><a href="../AdminIndex.php" style="text-decoration:none; color:black;">Main</a></button>


        <!-- including footer -->
        <?php
        include "../../Footer.php";
        ?>
</body>
</html>