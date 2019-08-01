<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';

  if (!isset($_SESSION["admin"]))
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }  

  $id = 0;
  if (isset($_GET["id"]))
  {
    $id = $_GET["id"];
  }
  $transaction = Transaction::get($id);
  if ($transaction == null)
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  }
  $customer = Customer::get($transaction->get_customer_id());
  $product = Product::get($transaction->get_product_id());
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Transaction</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_admin_add_product.css">
  <style>
    .center_box {
      margin-left: 20%;
      margin-right: 20%;
      margin-top: 24px;
      padding: 16pt;
      border-style: solid;
      border-radius: 4pt; 
      border-color: red;
    }    
  </style>
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
    <h2>Viewing Transaction #<?php echo "$id"?></h2>
    <div class="center_box">
      <p style="font-size: 1.2em">Date: <?php echo $transaction->get_date()?></p>
      <hr>
      <p><b>Customer Details</b></p>
      ID: <?php echo $customer->get_id()?><br>
      Email: <?php echo $customer->get_email()?><br>
      Name: <?php echo $customer->get_name()?><br>
      Address: <?php echo $customer->get_address()?><br>
      Phone: <?php echo $customer->get_phone()?><hr>   
      <p><b>Product Details</b></p>
      ID: <?php echo $product->get_id()?><br>
      P. Number: <?php echo $product->get_number()?><br>
      Name: <?php echo $product->get_name()?><br>
      Price: <?php echo $transaction->get_price()?><br>
      Units: <?php echo $transaction->get_units()?><br>
    </div>
    <form action="transactions.php">
      <input type="submit" value="Back">
    </form>
  </div>
  
</body>
</html>
