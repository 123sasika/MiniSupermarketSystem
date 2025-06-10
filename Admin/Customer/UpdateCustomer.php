<?php
//Add connection
include "../../connection.php";

//Fetching details to the form
if(isset($_GET['id'])){
    $ID=$_GET['id'];
    $fetch="SELECT* FROM `customer`WHERE customerID=$ID";
    $result=$con->query($fetch);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Cu_ID=$row["customerID"];
            $Cu_Name=$row["Customer_Name"];
            $Cu_Gender=$row["Gender"];
            $Cu_MobileNumber=$row["MobileNumber"];
            $Cu_Location=$row["Location"];        
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
    $cus_name=$_POST['customer_name'];
    $cus_gender=$_POST['gender'];
    $cus_mobile=$_POST['mobile_number'];
    $cus_location =$_POST['location'];

    $sql4="UPDATE customer SET Customer_Name='$cus_name',
    Gender='$cus_gender',MobileNumber='$cus_mobile',Location='$cus_location'
    WHERE customerID=$ID";
    $result4=$con->query($sql4);
    if($result4) {
        echo "<script>
        alert('succesfully updated');
        window.open('ViewCustomer.php');
        </script>";    
    }else{ 
        echo "<script>
        alert('not updated');
        window.open('ViewCustomer.php','_self');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
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
        <h2 class="text-center">Update Customer Information</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="mb-4">
                    Customer ID <input type="text" name="customer_id" class="form-control" placeholder="Customer ID" value="<?php echo $Cu_ID;?>">
                </div>
                <div class="mb-4">
                    Customer Name <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value="<?php echo $Cu_Name;?>">
                </div>
                <div class="mb-4">
                    Gender
                    <select class="form-select"name="gender">
                        <option value="Male" <?php if($Cu_Gender == 'Male'){echo 'selected';}?>>Male</option>
                        <option value="Female" <?php if($Cu_Gender == 'Female'){echo 'selected';} ?>>Female</option>
                    </select>

                </div>
                <div class="mb-4">
                    Mobile number <input type="telephone" name="mobile_number" class="form-control" value="<?php echo $Cu_MobileNumber;?>">
                </div>
                <div class="mb-4">
                    Location <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo $Cu_Location;?>">
                </div>

                <div class="row mt-4 pt-3">
                    <div class="col-lg-4">
                        <input type="submit" name="UPDATE" value="Update" class="bg-info form-control">
                    </div>
                    <div class="col-xl-4">
                        <button class="bg-info form-control"><a href="ViewCustomer.php" style="text-decoration:none;color:black;">Go Back</a></button>
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



