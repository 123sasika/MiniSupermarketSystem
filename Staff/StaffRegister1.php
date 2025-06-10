<?php
//Add connection
include "../connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staff register</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="staff.css">
</head>
<body>
       <div class="my-3">
        <h2 class="text-center">Staff Register</h2>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
         <form action=""method="post">
            <div class="mb-2">
                <label for="name">Name:</label>
                <input type="text"name="name"class="form-control">
            </div>
            <div class="mb-2">
            <label for="Username">User Name:</label>
                <input type="text"name="username"class="form-control">
            </div>
            <div class="mb-2">
            <label for="password">Password</label>
                 <input type="text"name="password"class="form-control">
            </div>
            <div class="mb-2">
            <label for="Cpassword">Confirm Password</label>
                <input type="text"name="cpassword"class="form-control">
            </div>
            <div class="mb-2">
            <label for="DoB">Date of Birth</label>
                <input type="date"name="DoB"class="form-control">
            </div>
            <div class="mb-4">
            <label for="gender">Gender</label>
                    
                    <select class="form-select"name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>
            <div class="mb-2">
            <label for="contact1">Contact Number1</label>
                 <input type="text"name="contact1"class="form-control">
            </div>
            <div class="mb-2">
            <label for="contact2">Contact Number2</label>
                 <input type="text"name="contact2"class="form-control">
            </div>
            <div class="mb-2">
            <label for="address">Address</label>
                 <input type="text"name="address"class="form-control">
            </div>
            <div class="mb-2">
            <label for="Username">Sallary:</label>
                <input type="text"name="sallary" class="form-control">
            </div>
            <div class="row mt-4 pt-3">
            <div class="col-lg-4">
                <input type="submit"name="add"value="Register"class="form-control" id="submit">
            </div>
            <div class="col-xl-4">
                <button class=" form-control" id="submit2">
                    <a href="StaffLogin.php" style="text-decoration: none; color: black;" >Go Back</a>
                </button>
            </div>
            </div>                
        </div>

         </form>
    </div>



</div>
       <?php
include "../Footer.php";
?>
       

</body>
</html>


<?php
//Add connection
include "../connection.php";

//Add details
if(isset($_POST['add'])){
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$DoB =$_POST['DoB'];
$gender =$_POST['gender'];
$sallary =$_POST['sallary'];
$contact1 =$_POST['contact1'];
$contact2 =$_POST['contact2'];
$address =$_POST['address'];



//checking existing customer IDs
$sql1="SELECT * FROM staff WHERE userName='$username'";
$result1=$con->query($sql1);
if($result1->num_rows > 0) {
    echo "<script>
            alert('This User Name is Already exist!');
            window.open('StaffRegister1.php','_self');
          </script>";
}else{
//inserting customers
$sql2 = "INSERT INTO `staff`(`name`,`birthday`,`gender`,`sallery`,`number1`,`number2`,`address`,`registerDateTime`,`userName`,`password`,`confirmpassword`) 
        VALUES('$name','$DoB','$gender',$sallary,'$contact1','$contact2','$address',Now(),
        '$username','$password','$cpassword')";

$result2=$con->query($sql2);

if($result2){
    echo "<script>
            alert('successfully Registered');
            window.open('StaffLogin.php','_self');

        </script>";
}}
}

//closing connection
$con->close();
?>