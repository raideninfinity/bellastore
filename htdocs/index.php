<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (isset($_SESSION["user"]))
  {
    $user = $_SESSION["user"];
  }
  else
  {
    $user = null;
  }
  $logged_in = ($user != null);
  
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .prod_list
  {    
    padding: 8px;
    margin-top: 16px;
    background-color: rgba(255, 255, 255, 0.8); 
  }
  
  .del
  {
    margin-top: 8px;
  }
  .del:link, .del:visited
  {
    background-color: #333399;
  }
  
  .del:hover, .del:active
  {
    color: black;
    background-color: #7AD8E5; 
  }
  </style>
</head>
<body onload="func()">
<script type="text/javascript">
  function func()
  {
    var count = <?php echo Product::count_where()?>;
    var height = 0;
    for (i = 0; i < count; i++)
    {
      var h = document.getElementById('col' + i).offsetHeight;
      if (h > height){ height = h;}
    }
    for(i = 0; i < count; i++)
    {
      document.getElementById('col' + i).style.height = height + "px";
    }
  };   
</script>
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
  <div style="text-align: center">
    <div class="prod_list"><h3>Product List</h3></div>
    <div style='padding: 12px'>
      <section>
      <?php
        $array = Product::all();
        $image_dir = "/images/product/";
        $index = 0;
        foreach($array as $product)
        {
          $name = $product->get_name();
          $gender = $product->get_gender();
          $category = $product->get_category();
          $age_range = $product->get_age_range();
          $description = $product->get_description();
          $price = "RM".number_format($product->get_price(), 2);
          $status = $product->get_status();
          
          echo "<div class='col'><div class='inner_col' id='col$index'>";
          echo "<p style='padding-bottom: 8px'><h3>$name</h3></p>";
          $image_name = $product->get_image();
          if ($image_name == "")
          {
            echo "<br><p>(No Image)</p>";
          }
          else
          {
            $image_url = $image_dir.$image_name;
            echo "<img style='padding-bottom: 4px' src=".$image_url."></img>";
          }    
          echo "<br>";
          echo "Price: ".$price;
          echo "<br>";
          echo "Gender: ".$gender;
          echo "<br>";
          echo "Category: ".$category;
          echo "<br>";
          echo "Age Range: ".$age_range;   
          echo "<br>";
          if ($status == 'AVAILABLE')
          {
            $pid = $product->get_id();
            echo "<a class='del' href='add_cart.php?id=$pid'>Buy</a>";
          }
          else
          {
            echo "<p><h3 style='color:red'>OUT OF STOCK</h3></p>";
          }          
          echo "</div></div>";
          $index += 1;
        }
      ?>
      </section>
    </div>
  </div>
</body>
</html>
  
<?php  
/*
  echo "<br>";
  echo "<br>";
  echo "PRODUCT LIST";
  echo "<br>";
  echo "<br>";
  echo "<table border=1>";
  $array = Product::all();
  $image_dir = "/images/product/";
  foreach($array as $product)
  {
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
    $name = $product->get_name();
    $gender = $product->get_gender();
    $category = $product->get_category();
    $age_range = $product->get_age_range();
    $description = $product->get_description();
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
    echo "<td>".$description."</td>";
    echo "<td>";
    if ($status == 'AVAILABLE')
    {
      $pid = $product->get_id();
      echo "<a href='add_cart.php?id=$pid'>Buy</a>";
    }
    else
    {
      echo "OUT OF STOCK";
    }
    echo "</td>";    
    echo "</tr>";
  }
  echo "</table>"
 */
?>

<?php
  if (isset($_SESSION["result"]))
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "LOG_OUT")
      {
        echo "<script type='text/javascript'>alert('Successfully logged out.')</script>";
      }
      else if ($result == "ADD_CART_SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Item added to cart.')</script>";
      }    
    }
  }
?>