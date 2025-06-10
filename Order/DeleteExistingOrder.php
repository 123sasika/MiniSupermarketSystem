<?php
//Add connection
include "../connection.php";

        //fetching details from orders table in DB
        if(isset($_GET['ID'])){
            $id1 = $_GET['ID'];
            $sql="DELETE FROM orders_item WHERE id=$id1";
            $delete=$con->query($sql);
            if($delete==0){
                echo "There is an error";
            }else{
                echo"
                <script>
                    window.open('AddOrder1.php','_self');
                </script>";
            }
        }
?>