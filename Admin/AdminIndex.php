<?php
    //Add connection
    include "../connection.php";

    $product_name=[];
    $product_quantity=[];

    //Fetching details from db for the product graph
    $fetch="SELECT* FROM `product`";
    $result=$con->query($fetch);
    while($row = $result->fetch_assoc()) {                                  
        $product_name[]=$row['name'];
        $product_quantity[]=$row['quantity'];
    }

    // Convert data to JSON for JavaScript
    echo "<script>
    const productLabels = " . json_encode($product_name) . ";
    const productData = " . json_encode($product_quantity) . ";
    </script>";

    $discount_name=[];
    $price=[];

    //Fetching details from db for discountsandofferce graph
    $fetch="SELECT* FROM `discountsandofferce`";
    $result=$con->query($fetch);
    while($row = $result->fetch_assoc()) {                                  
        $discount_name[]=$row['discount_name'];
        $price[]=$row['price'];
    }

    // Convert data to JSON for JavaScript
    echo "<script>
    const DiscountsLabels1 = " . json_encode($discount_name) . ";
    const DiscountsData1 = " . json_encode($price) . ";
    </script>";

?>
                        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>
        AdminIndex
    </title>

    <!-- bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


     <link rel="stylesheet" href="admin.css">   
</head>
<body>

    <?php
        include "NavBar.php";
    ?>

    <!-- logout button creation -->
    <div class="col-xl-4">
      <button class="btn btn-warning px-3" id="Main2"><a href="Admin login.php" style="text-decoration:none; color:black;">Log Out</a></button>
    </div>
    
    <!-- import JavaScript charting library -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

    <!-- adding productChart to the page -->
     <!-- <div class="product">
    <canvas id="productChart" width="100" height="10"></canvas>
     </div> -->
    <!-- adding DiscountsChart to the page -->
     <!-- <div class="discount">
    <canvas id="DiscountsChart" width="100" height="10"></canvas>
     </div>

     <div class="details">        //Fetching details from db
        // $fetch="SELECT* FROM `orders`";
        // $result=$con->query($fetch);
        // echo "Number of Completed Orders :",$result->num_rows,"<br>";

        //Fetching details to the table
        // $fetch="SELECT* FROM `pre_order`";
        // $result=$con->query($fetch);
        // echo "Number of Pre-orders :",$result->num_rows,"<br>";

        //Fetching details to the table
        // $fetch="SELECT* FROM `supplier`";
        // $result=$con->query($fetch);
        // echo "Number of Supplies :",$result->num_rows,"<br>";

        //Fetching details to the table
//         $fetch="SELECT* FROM `staff`";
//         $result=$con->query($fetch);
//         echo "Number of Staff Menbers :",$result->num_rows,"<br>";
//     ?>
//      </div>




// <script>
    //Product graph
    // const ctx = document.getElementById('productChart').getContext('2d');
    // const productChart = new Chart(ctx, {
    //     type: 'bar', // Chart type (e.g., bar, pie, line)
    //     data: {
    //         labels: productLabels, // Data from PHP
    //         datasets: [{
    //             label: 'Stock Quantity',
    //             data: productData, // Data from PHP
    //             backgroundColor: ['red', 'blue', 'green'], // Bar colors
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

//Discount and Offers Graph
    const ctx1 = document.getElementById('DiscountsChart').getContext('2d');
    const DiscountsChart = new Chart(ctx1, {
        type: 'bar', // Chart type (e.g., bar, pie, line)
        data: {
            labels: DiscountsLabels1, // Data from PHP
            datasets: [{
                label: 'Discounts and Offers Prizes',
                data: DiscountsData1, // Data from PHP
                backgroundColor: ['red', 'blue', 'green'], // Bar colors
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>