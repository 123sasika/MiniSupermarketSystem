<?php
//Add connection
include "../connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staff login</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="staff.css">
</head>
<body>
<div class="my-3">
        <h1 class="text-center" id="h2">staff login</h1>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
         <form action=""method="post"> 
            <div class="mb-2">
                <label for="user_name">User Name :</label>
                <input type="text"name="user_name"class="form-control">
            </div>
            <div class="mb-2">
                <label for="password">Password :</label>
                 <input type="text"name="password"class="form-control">
            </div>
            
            <div class="row mt-4 pt-3">
                <div class="col-lg-4">
                 <input type="submit"name="login"value="Login"class=" form-control" id="submit">
                </div>                              
            </div>



         </form>

    <!-- Register button creation -->
    <div class="col-xl-4">
      <button class="btn btn-warning px-3" id="Main2"><a href="StaffRegister1.php" style="text-decoration:none; color:black;">Register</a></button>
    </div>
        </div>

       </div>
       
       <?php
include "../Footer.php";
?>

<?php
        if(isset($_POST['login'])){
            $user_name=$_POST['user_name'];
            $password1=$_POST['password'];

            //fetching
            $sql="SELECT *FROM `staff` WHERE userName='$user_name'";
            $result=$con->query($sql);
            $row=$result->fetch_assoc();
            $user=$row['userName'];
            $password=$row['password'];

            if($user_name==$user && $password1==$password && !($user_name==Null) && !($password1==Null)){
                echo "<script>alert('successfully inserted')</script>";
                echo"<Script>window.open('Index.php')</script>";
            }else{
                echo "<script>alert('Incorrect Username or Password')</script>";
            }

        }
    ?>
</body>
</html>