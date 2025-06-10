<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


   <style>

 body {
    background-image: url('assets/loginbackground.jpeg');
    background-size: cover; 
    overflow: hidden;
  }
  
  *{
    margin: 0;
  }

  .admin-button {
    width: 400px; /* Set width */
    height: 100px; /* Adjust height */
    background: rgba(26, 219, 26, 0.6); /* Slightly dark transparent background */
    color: white; /* Text color */
    border: 2px solid rgba(0, 0, 0, 0.5); /* Light border */
    border-radius: 20px; /* Slightly rounded corners */
    font-size: 16px; /* Adjust text size */
    cursor: pointer; /* Pointer effect on hover */
    transition: 0.3s; /* Smooth hover effect */
    
    
 
}

.admin-button:hover {
    background: rgba(4, 92, 11, 0.9); /* Darker on hover */
}

.staff{

    width: 400px; /* Set width */
    height: 100px; /* Adjust height */
    background: rgba(216, 219, 19, 0.7); /* Slightly dark transparent background */
    color: white; /* Text color */
    border: 2px solid rgba(0,0,0, 0.5); /* Light border */
    border-radius: 20px; /* Slightly rounded corners */
    font-size: 16px; /* Adjust text size */
    cursor: pointer; /* Pointer effect on hover */
    transition: 0.3s; /* Smooth hover effect */

}

.staff:hover {
    background: rgba(211, 145, 3, 0.9); /* Darker on hover */
}

.bbb{
    margin-left: 600px;
    margin-top: 700px;
}

       
    </style>


<!-- bootstrap CSS Link -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
</head>
<body>
    <div class="btn">
        <div class="bbb">
         <button type="button" class="admin-button "><a href="Admin/admin login.php" style="text-decoration:none; color:black; font-size:400%;">ADMIN</a></button>
         <button type="button" class="staff"><a href="Staff/StaffLogin.php" style="text-decoration:none; color:black; font-size:400%;">STAFF</a></button>
        </div>
    </div>
</body>
</html>