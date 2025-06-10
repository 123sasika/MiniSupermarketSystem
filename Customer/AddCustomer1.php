
<?php
// Add connection
include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddCustomer1</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="NavBar.css">
        <link rel="stylesheet" href="customer.css">
</head>
<body>
<?php
        include "NavBar.php";
?>

    <div class="my-3">
        <h2 class="text-center">Add Customer Information</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="mb-4">
                <label for="customername">Customer Name:</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Customer Name"required>
                </div>
                <div class="mb-4">
                <label for="gender">Gender:</label>
                    <select class="form-select"name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                </div>
                <div class="mb-4">

                <label for="mobilenumber">Mobile Number:</label>
                     <input type="telephone" name="mobile_number" class="form-control" value="+94">
                </div>
                <div class="mb-4">
                <label for="location">Location:</label>
                    <input type="text" name="location" class="form-control" placeholder="Location">
                </div>
               

                <div class="row mt-4 pt-3 mb-5">
                    <div class="col-xl-4">
                        <input type="submit" name="ADD" value="Add" class="bg-info form-control" id="add">
                    </div>
                    <div class="col-xl-4">
                        <button class="bg-info form-control" id="main"><a href="../staff/index.php" style="text-decoration:none;color:black;">Main</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- including footer -->
    <?php
        include "../Footer.php";
    ?>
</body>
</html>


<?php
// Add details
if (isset($_POST['ADD'])) {
    $customer_name = $_POST['customer_name'];
    $customer_gender = $_POST['gender'];
    $customer_mobile = $_POST['mobile_number'];
    $customer_location = $_POST['location'];

        // Insert customer
        $sql2 = "INSERT INTO customer (Customer_Name, Gender, MobileNumber, Location)
                 VALUES ('$customer_name', '$customer_gender', '$customer_mobile', '$customer_location')";
        $result2 = $con->query($sql2);

        if ($result2) {
            echo "<script>alert('Customer added successfully!');</script>";

        }else{
            echo "<script>alert('Customer was not added!');</script>";
        }   
}
?>



