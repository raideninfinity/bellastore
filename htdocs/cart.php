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
    .del:link, .del:visited {
    background-color: #dddddd;
    color: white;
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
  <center><h3>Shopping Cart</h3></center>
  <div style="overflow-x:auto; margin: 8px; border-style: solid; border-width: 2px; border-color: #333399">
    <?php
    echo "<table>";
    echo "<tr><th>&nbsp;</th><th></th><th></th><th></th><th></th></tr>";
    $image_dir = "/images/product/";
    foreach($array as $order)
    {
      $product = Product::get($order->get_product_id());
      echo "<tr>";
      echo "<td>".$product->get_number()."</td>";
      echo "<td>";
      $image_name = $product->get_image();
      if ($image_name == "")
      {
        echo "(No Image)";
      }
      else
      {
        $image_url = $image_dir.$image_name;
        echo "<img src=".$image_url."></img>";
      }
      echo "</td>";
      $id = $order->get_id();    
      $name = $product->get_name();
      $gender = $product->get_gender();
      $category = $product->get_category();
      $age_range = $product->get_age_range();
      $description = $product->get_description();
      $units = $order->get_units();
      $subtotal = "RM".number_format($product->get_price() * $units, 2);
      $total += $product->get_price() * $units;
      $price = "RM".number_format($product->get_price(), 2);
      $status = $product->get_status();
      echo "<td>";
      echo $name;
      echo "<br>";
      echo $price;
      echo "</td>";    
      echo "<td>";
      echo "Units: $units <br>"."(".$subtotal.")";
      echo "</td>";
      echo "<td>";
      echo "<a class='del' href='delete_cart.php?id=$id'><img src='images/delete.png'></a>";
    }
    echo "</table>";
    ?>
  </div>
  <?php
    $total_price = "RM".number_format($total, 2);
    echo "<h3 style='margin-left: 8px'>Total: $total_price</h3>";
  ?>
  <a style='color:black; margin-left: 8px' class='del' href='checkout.php'>Checkout</a>
</div>
</body>
</html>

  
<?php
/*  
  echo "<table>";
  $image_dir = "/images/product/";
  foreach($array as $order)
  {
    $product = Product::get($order->get_product_id());
    echo "<tr>";
    echo "<td>".$product->get_number()."</td>";
    echo "<td>";
    $image_name = $product->get_image();
    if ($image_name == "")
    {
      echo "(No Image)";
    }
    else
    {
      $image_url = $image_dir.$image_name;
      echo "<img src=".$image_url."></img>";
    }
    echo "</td>";
    $id = $order->get_id();    
    $name = $product->get_name();
    $gender = $product->get_gender();
    $category = $product->get_category();
    $age_range = $product->get_age_range();
    $description = $product->get_description();
    $units = $order->get_units();
    $subtotal = "RM".number_format($product->get_price() * $units, 2);
    $total += $product->get_price() * $units;
    $price = "RM".number_format($product->get_price(), 2);
    $status = $product->get_status();
    echo "<td>";
    echo $name;
    echo "<br>";
    echo $price;
    echo "<br>";
    echo "Gender: ".$gender;
    echo "<br>";
    echo "Category: ".$category;
    echo "<br>";
    echo "Age Range: ".$age_range;    
    echo "</td>";    
    echo "<td>";
    echo "Units: $units <br>"."(".$subtotal.")";
    echo "</td>";
    echo "<td>";
    echo "<a href='delete_cart.php?id=$id'>Delete from Cart</a>";
  }
  echo "</table>";
  echo "<br><br>";
  
  $total = "RM".number_format($total, 2);
  echo "Total: $total <br>";
  echo "<a href='checkout.php'>Checkout</a>";
  
  echo "<br><br>";
  echo "<a href='index.php'>Back</a>";
  */
?>

<?php
  if (isset($_SESSION["result"]))
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "DELETE_CART_SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Item removed from cart.')</script>";
      }    
    }
  }
?>