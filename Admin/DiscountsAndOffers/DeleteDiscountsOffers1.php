<?php
//Add connection
include "../../connection.php";

    //Fetching details from db to the table
    if(isset($_GET['ID'])){
        $id1 = $_GET['ID'];
        $fetch="SELECT* FROM `discountsandofferce`WHERE Discount_ID=$id1";
        $result=$con->query($fetch);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Discount_ID=$row["Discount_ID"];
            $discount_name=$row["discount_name"];
            $price=$row["price"];
        }    
    }  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteDiscount1</title>
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
        <h2 class="text-center">Delete Discounts and Offrece</h2>
       </div>
    <!-- table creation -->
    <div class="mt-4 col-xl-8">
        <table class="table" id="table">
                    <tr>
                        <th scope="col">Discount Id</th>  
                        <td><?php global $Discount_ID; echo $Discount_ID;?></td>
                    </tr>
                    <tr>
                        <th scope="col">Discount Name</th>
                        <td><?php global $discount_name;echo $discount_name;?></td> 
                    </tr>
                    <tr>
                        <th scope="col">price</th>
                        <td><?php global $price; echo $price;?></td>
                    </tr>
                       <!-- create button -->
                        <td>
                            <button class="btn btn-success px-3" id="delete"><a href="DeleteDiscountsOffers1.php?ids=<?php global $Discount_ID; echo $Discount_ID;?>" style="text-decoration:none; color:black;">Delete</a></button>
                        </td>
                        <td>
                            <button class="btn btn-success px-3" id="cancel"><a href="ViewDiscountsOfferce.php" style="text-decoration:none; color:black;">Cancel</a></button>
                        </td>
                    </tr>
            </table>
        </div>
</body>
</html>


<?php
    if(isset($_GET['ids'])){
        $id6=$_GET['ids'];
        $delete0="DELETE FROM discountsandofferce WHERE Discount_ID=$id6";
        $con->query($delete0);
        echo "<script> 
        alert('Discount or Offer Deleted!');
        window.open('ViewDiscountsOfferce.php','_self');
        </script>";
    }
?>

