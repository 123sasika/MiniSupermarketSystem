<?php
//Add connection
include "../../connection.php";

    if(isset($_GET['id'])){
        $id6=$_GET['id'];
        $delete0="DELETE FROM orders_item WHERE order_id=$id6";
        $con->query($delete0);

        $delete00="DELETE FROM orders WHERE order_ID=$id6";
        $con->query($delete00);
        
        echo "<script> 
                alert('Order Deleted!');
                window.open('ViewOrder.php','_self');
            </script>";

    }
?>

