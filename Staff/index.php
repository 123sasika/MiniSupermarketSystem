<?php
//Add connection
include "../connection.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">

  <title>Document</title>
  <!-- bootstrap CSS Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@zxing/library@latest"></script>


  <link rel="stylesheet" href="index.css">


</head>

<body>

  <div class="row">
    <!-- Side-Nav -->
    <div class="col mt-5">
      <div class="col-3 pe-15 w-50">
        <ul class="navbar-nav me-auto text-center" id="list">
          <li class="nav-item" id="product">
            <a href="../Product/AddProduct1.php" class="nav-link text-light">
              <h4 id="h4">Product Information</h4>
            </a>
          </li>
          <li class="nav-item" id="product">
            <a href="../Order/AddOrder1.php" class="nav-link text-light">
              <h4 id="h4">Oder Information</h4>
            </a>
          </li>
          <li class="nav-item" id="product">
            <a href="../DiscountsAndOffers/ViewDiscountsOfferce.php" class="nav-link text-light">
              <h4 id="h4">Discounts and Offers Information</h4>
            </a>
          </li>
          <li class="nav-item" id="product">
            <a href="../Customer/AddCustomer1.php" class="nav-link text-light">
              <h4 id="h4">Customer Information</h4>
            </a>
          </li>
        </ul>
      </div>
    </div>


    <!-- Inventory Stock Section -->
    <div class="stock">
      <div class="mt-4 col-xl-8">
        <div style="max-width:50%;">
          <h1 class="stockName">Inventory Stock</h1>
          <input type="text" id="searchStock" class="form-control mt-3" onkeyup="searchTable('searchStock', 'stockTable', false)" placeholder="Search for items...">
        </div>
        <div style="max-height: 400px; overflow-y: auto; max-width:50%;">
          <table id="stockTable" class="table">
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $fetch = "SELECT * FROM `product`";
              $result = $con->query($fetch);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $product_name = $row['name'];
                  $product_quantity = $row['quantity'];
              ?>
                  <tr>
                    <td><?php echo $product_name; ?></td>
                    <td><?php echo $product_quantity; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- logout button creation -->
    <div class="col-xl-4">
      <button class="btn btn-warning px-3" id="Main2"><a href="StaffLogin.php" style="text-decoration:none; color:black;">Log Out</a></button>
    </div>

    <!-- Regular Customers Section -->
    <div class="customer">
      <div class="mt-4 col-xl-8">
        <div style="max-width:50%;">
          <h1 class="regularcustomer">Regular Customers</h1>
          <input type="text" id="searchCustomer" class="form-control mt-3" onkeyup="searchTable('searchCustomer', 'customerTable', true)" placeholder="Search for Customer ID...">
        </div>
        <div style="max-height: 400px; overflow-y: auto; max-width:50%;">
          <table id="customerTable" class="table">
            <thead>
              <tr>
                <th scope="col">Order Items</th>
                <th scope="col">Customer Id</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $fetch = "SELECT po.`customer_ID`, poi.`Item`, COUNT(*) AS visit_count
                        FROM `pre_order` po
                        JOIN `pre-order_item` poi ON po.`pre_order_ID` = poi.`Pre-Order_id`
                        WHERE po.`date` >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
                        GROUP BY po.`customer_ID`, poi.`Item`
                        HAVING visit_count >= 1;";

              $result = $con->query($fetch);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $order_items = $row["Item"];
                  $Customer_ID = $row["customer_ID"];
              ?>
                  <tr>
                    <td><?php echo $order_items; ?></td>
                    <td><?php echo $Customer_ID; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php include "../Footer.php"; ?>

  </div>

  <script>
    function searchTable(inputId, tableId, isNumeric) {
      let input = document.getElementById(inputId).value.toUpperCase();
      let table = document.getElementById(tableId);
      let tr = table.getElementsByTagName("tr");

      for (let i = 1; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName("td")[isNumeric ? 1 : 0]; // Use 1 for numeric search (Customer ID)

        if (td) {
          let textValue = td.textContent || td.innerText;
          
          // If searching for numbers, only allow exact matches
          if (isNumeric) {
            tr[i].style.display = textValue.indexOf(input) === 0 ? "" : "none";
          } else {
            tr[i].style.display = textValue.toUpperCase().indexOf(input) > -1 ? "" : "none";
          }
        }
      }
    }
  </script>

</body>
