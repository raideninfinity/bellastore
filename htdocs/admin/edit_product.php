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
  $product = Product::get($id);
  if ($product == null)
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  }

  $num = $product->get_number();
  $name = $product->get_name();
  $gender = $product->get_gender();
  $category = $product->get_category();
  $age_range = $product->get_age_range();
  $description = $product->get_description();
  $price = number_format($product->get_price(), 2);
  $status = $product->get_status();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_admin_add_product.css">
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
  <?php 
    echo "<h1>Editing Product #$id</h1>"; 
    echo "<form method='post' action='edit_product_post.php' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='id' value='$id'>";
    echo "<p>Product Number (Required)</p>";
    echo "<input name='number' type='text' class='input' placeholder='Product Number' required='true' value='$num'/>";
    echo "<p>Product Name (Required)</p>";
    echo "<input name='name' type='text' class='input' placeholder='Product Name' required='true' value='$name'/>";
    echo "<p>Gender</p>";
    $gender_list = ["Male","Female","Unisex"];
    echo "<select name='gender' class='input'>";
    foreach($gender_list as $str)
    {
      $selected = "";
      if ($gender == $str){ $selected = "selected"; }
      echo "<option value='$str' $selected>$str</option>";
    }
    echo "</select>";
    echo "<p>Category</p>";
    $category_list = ["Hat","Shirt","Pants","Dress","Shoes","Others"];
    echo "<select name='category' class='input'>";
    foreach($category_list as $str)
    {
      $selected = "";
      if ($category == $str){ $selected = "selected"; }
      echo "<option value='$str' $selected>$str</option>";
    }
    echo "</select>";    
    echo "";
    echo "<p>Age Range</p>";
    $age_list = ["Below 1 year","1 to 3 years","4 to 6 years", "7 to 9 years", "9 to 12 years", "Above 12 years"];
    echo "<select name='age_range' class='input'>";
    foreach($age_list as $str)
    {
      $selected = "";
      if ($age_range == $str){ $selected = "selected"; }
      echo "<option value='$str' $selected>$str</option>";
    }
    echo "</select>";    
    echo "";
    echo "<p>Description</p>";
    echo "<textarea name='desc' class='input' placeholder='Description'>$description</textarea>";
    echo "<p>Price(RM)</p>";
    echo "<input type='number' class='input' name='price' min='0' step='0.01' value='$price'/>";
    echo "<p>Current Image</p>";
    $image_name = $product->get_image();
      if ($image_name == "")
      {
        echo "-";
      }
      else
      {
        $image_dir = "/images/product/";
        $image_url = $image_dir.$image_name;
        echo "<img src=".$image_url."></img>";
      }
    echo "<p>New Image (If Updating)</p>";
    echo "<input name='image' type='file' class='input' placeholder='Image'/>";
    echo "<input type='checkbox' name='no_image' value='true'> Remove Image";
    //Status
    echo "<p>Status</p>";
    echo "<select name='status' class='input'>";
    $s1 = "";
    $s2 = "";
    if ($status == "AVAILABLE")
    {
      $s1 = "selected";
    }
    else{
      $s2 = "selected";
    }
    echo "   <option value='AVAILABLE' $s1>AVAILABLE</option>";
    echo "   <option value='OUT OF STOCK' $s2>OUT OF STOCK</option>";
    echo "</select>";
    //Submit
    echo "<input type='submit' value='SUBMIT'/>";
    echo "</form>";
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
      if ($result == "EDIT_FAILURE")
      {
        echo "<script type='text/javascript'>alert('Invalid data! Please try again.')</script>";
      }  
      else if($result == "EDIT_SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Product successfully edited.')</script>";
      }       
    }
  }
?>