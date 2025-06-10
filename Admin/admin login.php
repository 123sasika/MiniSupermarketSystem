<?php
//Add connection
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body>


<div class="loginsection">
<div class="my-3">
        <h2 class="text-center">Admin login</h2>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
         <form action=""method="post">
           
            
            <div class="t2">
                User Name <input type="text"name="user"class="form-control">
            </div>
            <div class="t2">
                Password <input type="password"name="password"class="form-control">
            </div>


            </div>
            
            <div class="btn">
                <div class="btn1">
                    <input type="submit" name="Login" Value="Login" class="bg-info form-control">

                
                </div>
                <!-- logout button creation -->
                <button class="bg-info form-control" id="Main2"><a href="../SelectUser.php" style="text-decoration:none; color:black;">Go Back</a></button>
            </div>
        </form>
       </div>

    </div>
    
    <div class="footermenu">
       <?php
        include "../Footer.php";
    ?>   
    
    </div>

    <?php
        if(isset($_POST['Login'])){
            $user1=$_POST['user'];
            $password1=$_POST['password'];

            //fetching
            $sql="SELECT *FROM `admin`";
            $result=$con->query($sql);
            $row=$result->fetch_assoc();
            $user=$row['user_name'];
            $password=$row['password'];

            if($user1==$user && $password1==$password){
                echo "<script>alert('successfully login')</script>";
                echo"<Script>window.open('AdminIndex.php')</script>";
            }else{
                echo "<script>alert('Incorrect Username or Password')</script>";
            }

        }
    ?>
</body>
</html>