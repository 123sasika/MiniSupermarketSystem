<?php
//Add connection
include "../../connection.php";

//Fetching details to the form
if(isset($_GET['s_ID'])){
    $ID=$_GET['s_ID'];
    $fetch="SELECT* FROM `staff`WHERE s_ID=$ID";
    $result=$con->query($fetch);
    if($result->num_rows > 0) {
        $row=$result->fetch_assoc();
            $s_ID =$row["s_ID"];
            $userName=$row["userName"];
            $password=$row["password"];
            $confirmpassword=$row["confirmpassword"];
            $name=$row["name"];
            $birthday=$row["birthday"];
            $gender=$row["gender"]; 
            $number1=$row["number1"];       
            $number2=$row["number2"];  
            $address=$row["address"];    
            $sallery=$row["sallery"];       
            $registerDateTime=$row["registerDateTime"];      
        }
    }else{
        echo"";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateStaff</title>
    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
        <link rel="stylesheet" href="admin.css">
</head>
<body>

 <?php
        include "NavBar.php";
?> 

    <div class="my-3">
        <h1 class="text-center">Update Staff Information</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xl-6">
        <form action=""method="post">
        <div class="mb-2">
                <label for="Name">ID :</label>
                <input type="text"name="ID"class="form-control" value="<?php global $s_ID; echo $s_ID;?>">
            </div>
            <div class="mb-2">
                <label for="Name">Name :</label>
                <input type="text"name="name"class="form-control" value="<?php global $name; echo $name;?>">
            </div>
            <div class="mb-2">
            <label for="  User Name ">  User Name : </label>
                <input type="text"name="username"class="form-control"  value="<?php global $userName; echo $userName;?>">
            </div>
            <div class="mb-2">
            <label for="  Password">  Password :</label>
                 <input type="text"name="password"class="form-control" value="<?php global $password; echo $password;?>">
            </div>
            <div class="mb-2">
            <label for="Confirm Password ">Confirm Password: </label>
                 <input type="text"name="cpassword"class="form-control" value="<?php global $confirmpassword; echo $confirmpassword;?>">
            </div>
            <div class="mb-2">
            <label for="Sallary">Sallary :</label>
             <input type="text"name="sallary"class="form-control"  value="<?php global $sallery; echo $sallery;?>">
            </div>
            <div class="mb-2">
            <label for=" Date of Birth"> Date of Birth:</label>
                <input type="date"name="DoB"class="form-control" value="<?php global $birthday; echo $birthday;?>">
            </div>
            <div class="mb-4">
                    
                    <label for="Gender">Gender :</label>
                    <select class="form-select"name="gender">
                        <option value="Male" <?php global $gender; if($gender == 'Male'){echo 'selected';}?>>Male</option>
                        <option value="Female" <?php global $gender; if($gender == 'Female'){echo 'selected';} ?>>Female</option>
                    </select>
            </div>
            <div class="mb-2">
                <label for="Contact Number1">Contact Number1:</label>
                <input type="text"name="contact1"class="form-control" value="<?php global $number1; echo $number1;?>">
            </div>
            <div class="mb-2">
            <label for="Contact Number2">Contact Number2:</label>
                 <input type="text"name="contact2"class="form-control" value="<?php global $number2; echo $number2;?>">
            </div>
            <div class="mb-2">
            <label for="   Address">   Address :</label>
                <input type="text"name="address"class="form-control" value="<?php global $address; echo $address;?>">
            </div>
            <div class="mb-2">
            <label for="Registered Date">Registered Date and Time:</label>
                <input type="text"name="RegDate"class="form-control" value="<?php global $registerDateTime; echo $registerDateTime;?>">
            </div>
            <div class="row mt-4 pt-3">
            <div class="col-lg-4">
                <input type="submit"name="UPDATE"value="Update"class=" form-control" id="submit">
            </div>
            <div class="col-xl-4">
                <button class=" form-control" id="Main3">
                    <a href="ViewStaff.php" style="text-decoration: none; color: black;">Go back</a>
                </button>
            </div> 
            </div>           
        </div>

         </form>
        </div>
    </div>

<?php
// updating database
if(isset($_POST['UPDATE'])){
    global $ID;

    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword =$_POST['cpassword'];
    $sallary =$_POST['sallary'];
    $DoB =$_POST['DoB'];
    $gender =$_POST['gender'];
    $RegDate =$_POST['RegDate'];
    $contact1 =$_POST['contact1'];
    $contact2 =$_POST['contact2'];
    $address =$_POST['address'];

    $sql4="UPDATE staff SET name='$name',birthday='$birthday',gender='$gender',
    number1='$contact1',number2='$contact2',address='$address',
    sallery='$sallary',registerDateTime='$RegDate',username='$username',
    password='$password',confirmpassword='$cpassword'
    WHERE s_ID =$ID";
    $result4=$con->query($sql4);
    if($result4) {
        echo 
        "<script>
        alert('succesfully updated');
        window.open('ViewStaff.php','_self');
        </script>";
    }else{ 
        echo "<script>alert('not updated');</script>";
    }
}

        include "../../Footer.php";
    ?>
</body>
</html>



