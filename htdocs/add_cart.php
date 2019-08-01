<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_GET["id"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }   
  
  $logged_in = (isset($_SESSION["user"]));

  $id = $_GET["id"];
  $product = Product::get($id);
  if ($product == null || $product->get_status() != "AVAILABLE")
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;    
  }
  
  $number = $product->get_number();
  $name = $product->get_name();
  $gender = $product->get_gender();
  $category = $product->get_category();
  $age_range = $product->get_age_range();
  $description = $product->get_description();
  $price = "RM".number_format($product->get_price(), 2);
  
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
</head>
<body>
<div class="background">
  <nav>
    <div class="navWrapper">
      <p id="logo">Bella Kids Outfit</p>
      <?php 
        if ($logged_in)
        {
          $customer = Customer::get($_SESSION["user"]);
          $customer_name = $customer->get_name(); 
        }
        else
        {
          $customer_name = "Guest";
        }
      ?>
      <p style="padding-top: 8px">Welcome, <?php echo $customer_name?>!</p>           
      <div style="float:left; margin-top: 8px">
        <div class="dropdown">
          <button class="dropbtn">Menu</button>
          <div class="dropdown-content">
            <a href="index.php">Home</a>
            <?php
              if ($logged_in)
              {
                echo "<a href='edit_details.php'>Update Details</a>";
                echo "<a href='cart.php'>Shopping Cart</a>";
                echo "<a href='transactions.php'>Transactions</a>";
                echo "<a href='logout.php'>Log Out</a>";
              }
              else
              {
                echo "<a href='login.php'>Sign In</a>";
                echo "<a href='register.php'>Register</a>";                
              }
            ?>
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
<div class="form-wrap">
	<br>
	<center><h3>Viewing Item #<?php echo $number ?></h3></center>
  <div class="tabs-content">
    <div id="login-tab-content" class="active">
      <form class="login-form" method="post" action="<?php if($logged_in){echo "add_cart_post.php"; } else {echo "login.php";}?>">
        <input type='hidden' name='id' value='<?php echo $id?>'>
        <div style="text-align: center">
        <?php 
          $image_dir = "/images/product/";
          $image_name = $product->get_image();
          if ($image_name == "")
          {
            echo "(No Image)"."<br>";
          }
          else
          {
            $image_url = $image_dir.$image_name;
            echo "<img src=".$image_url."></img>"."<br>";
          }
          echo "<b>$name</b><br>";
          echo "Gender: $gender <br>";
          echo "Category: $category <br>";
          echo "Age Range: $age_range <br>";
          echo "Price: $price <br><br>";
          echo "$description<br><br>";
        ?>
        </div>
        <p>Units</p>
			  <input type="number" class="input" name="units" min="1" step="1" value="1" required="true">               
        <center><input type="submit" class="button" value="Add to Cart"></center>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php  
/*
  echo "Add to Cart";
  echo "<br><br>";
  
  echo $name."<br>";
  
  $image_dir = "/images/product/";
  $image_name = $product->get_image();
  if ($image_name == "")
  {
    echo "(No Image)"."<br>";
  }
  else
  {
    $image_url = $image_dir.$image_name;
    echo "<img src=".$image_url."></img>"."<br>";
  }
  
  echo $price;
  echo "<br>";
  echo "Gender: ".$gender;
  echo "<br>";
  echo "Category: ".$category;
  echo "<br>";
  echo "Age Range: ".$age_range;    
  echo "<br><br>";  
  
  echo "<form method='post' action='add_cart_post.php'>";
  echo "<input type='hidden' name='id' value=$id>";
  echo "Units: <input type='number' min=1 value=1 name='units'><br>";
  echo "<input type='submit' value='Add to Cart'>";
  echo "</form>";
  
  echo "<br><br>";
  echo "<a href='index.php'>Back</a>";
 */
?>