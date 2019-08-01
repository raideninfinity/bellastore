<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }   
  
  $user = $_SESSION["user"];
  $customer = Customer::get($user);
  $customer_name = $customer->get_name();  
  $array = Order::where("customer_id = $user");
  $total = 0;
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bella Kids Outfit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<script type="text/javascript" src="js/index.js"></script> 
  <style>
   .del{
    background-color: #dddddd;
    color: black;
    padding: 8px 24px;
    text-align: center;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
  }
  .del:hover, .del:active {
    background-color: #7AD8E5;  
  }  
  </style>
</head>
<body>
<div class="background">
  <nav>
    <div class="navWrapper">
      <p id="logo">Bella Kids Outfit</p>
      <p style="padding-top: 8px">Welcome, <?php echo $customer_name?>!</p>        
      <div style="float:left; margin-top: 8px">
        <div class="dropdown">
          <button class="dropbtn">Menu</button>
          <div class="dropdown-content">
            <a href="index.php">Home</a>
            <a href="edit_details.php">Update Details</a>
            <a href="cart.php">Shopping Cart</a>
            <a href="transactions.php">Transactions</a>
            <a href="logout.php">Log Out</a>
          </div>
        </div> 
      </div>      
    </div>
  </nav>
  <div class="header">
    <div class="headerWrapper">
  </div>
</div>
<div style="margin-top: 100px; margin-bottom: 24px">&nbsp;</div>
<div style="margin: 24px; padding: 16px; border-radius: 8px; background-color: white">
  <center><h3>Checkout</h3></center>
  <div style="overflow-x:auto; margin: 8px; border-style: solid; border-width: 2px; border-color: #333399">
  <?php
  echo "<table>";
  echo "<tr><th>Item No.</th><th>Item Name</th><th>Unit Price</th><th>Units</th><th>Subtotal</th></tr>";
  foreach($array as $order)
  {
    $product = Product::get($order->get_product_id());
    $number = $product->get_number(); 
    $name = $product->get_name();
    $units = $order->get_units();
    $price = "RM".number_format($product->get_price(), 2);
    $subtotal = "RM".number_format($product->get_price() * $units, 2);
    $total += $product->get_price() * $units;
    echo "<tr>";
    echo "<td>".$number."</td>";
    echo "<td>".$name."</td>";
    echo "<td>".$price."</td>";
    echo "<td>".$units."</td>";
    echo "<td>".$subtotal."</td>";
    echo "</tr>";
  }
  echo "</table>";
  ?>
  </div>
  <?php
    $checkout = ($total > 0);
    $total_price = "RM".number_format($total, 2);
    echo "<h3 style='margin-left: 8px'>Total: $total_price</h3>";
    if ($checkout)
    {
      echo "<form method='post' action='checkout_post.php'>";
      echo "<input type='hidden' name='checkout' value=$total>";
      echo "<input type='submit' class='del' value='Confirm Purchase'>";
      echo "</form>";
    }    
  ?>
</div>
</body>
</html>