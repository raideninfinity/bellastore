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
  $array = Transaction::where("customer_id = $user");
  $total = 0;
  $index = 0;
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bella Kids Outfit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/card.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<script type="text/javascript" src="js/index.js"></script> 
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
  <center><h3>Transactions</h3></center>
  <div style="overflow-x:auto; margin: 8px; border-style: solid; border-width: 2px; border-color: #333399">
    <?php
      echo "<table>";
      $image_dir = "/images/product/";
      echo "<tr><th>#</th><th>Date</th><th>Item No.</th><th>Item Name</th><th>Unit Price</th><th>Units</th><th>Subtotal</th></tr>";
      foreach($array as $transaction)
      {
        $product = Product::get($transaction->get_product_id());
        $number = $product->get_number(); 
        $name = $product->get_name();
        $units = $transaction->get_units();
        $price = "RM".number_format($transaction->get_price(), 2);
        $subtotal = "RM".number_format($transaction->get_price() * $units, 2);
        $total += $transaction->get_price() * $units;
        $index += 1;
        $date = $transaction->get_date();
        echo "<tr>";
        echo "<td>".$index."</td>";
        echo "<td>".$date."</td>";
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
    $total_price = "RM".number_format($total, 2);
    echo "<h3 style='margin-left: 8px'>Total: $total_price</h3>";
  ?>
</div>
</body>
</html>

<?php
if (isset($_SESSION["result"]))
{
  $result = $_SESSION["result"];
  if ($result != null)
  {
    $_SESSION["result"] = null;
    if ($result == "CHECKOUT_SUCCESS")
    {
      echo "<script type='text/javascript'>alert('Checkout success! Thanks for your purchase!')</script>";
    }   
  }
}
?>