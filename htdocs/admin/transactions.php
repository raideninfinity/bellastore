<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  if (!isset($_SESSION["admin"]))
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_admin_index.css">
  <title>Transactions List</title>
</head>
<body>
  <nav>
    <div class="logo">
      <img src="img/logo.png" style=" width: 90px; height: 50px;">
    </div>
    <div class="toggle-bars">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="nav">
      <ul>
        <li><a href="index.php" style="text-decoration:none; color: white;">Admin Home</a></li>
        <li><a href="add_product.php" style="text-decoration:none; color: white;">Add Product</a></li>
        <li><a href="transactions.php" style="text-decoration:none; color: white;">Transactions</a></li>
        <li><a href="change_pw.php" style="text-decoration:none; color: white;">Change Password</a></li>
        <li><a href="logout.php" style="text-decoration:none; color: white;">Log Out</a></li>
      </ul>
    </div>
  </nav>
  <div class="info" style="padding-top: 24px;">
    <h1>Transactions List</h1>
    <br><br>
    <table>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Customer Email</th>
      <th>Product Number</th>
      <th>Price(RM)</th>
      <th>Units</th>
      <th>Operation</th>
    </tr>
    <?php
    $array = Transaction::all();
    foreach ($array as $transaction)
    {    
      $id = $transaction->get_id();
      $product = Product::get($transaction->get_product_id());
      $customer = Customer::get($transaction->get_customer_id());
      echo "<tr>";
      echo "<td>".$id."</td>";
      echo "<td>".$transaction->get_date()."</td>";
      echo "<td>".$customer->get_email()."</td>";
      echo "<td>".$product->get_number()."</td>";
      echo "<td>".number_format($transaction->get_price(), 2)."</td>";
      echo "<td>".$transaction->get_units()."</td>";     
      echo "<td>";
      echo "<a href='view_transaction.php?id=$id'><img src='img/view_icon.png' style=' width: 20px; height: 20px;'></a>";
      echo "</td>";      
      echo "</tr>";
    }
    ?>
  </table>
  </div>  
</body>
</html>

<br>