<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["admin"]))
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
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
    <h1>Add Product</h1>
    <form method="post" action="add_product_post.php" enctype="multipart/form-data">
      <p>Product Number (Required)</p>
      <input name="number" type="text" class="input" placeholder="Product Number" required="true" /> 
      <p>Product Name (Required)</p>
      <input name="name" type="text" class="input" placeholder="Product Name" required="true" />
      <p>Gender</p>
      <select name="gender" class="input">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Unisex">Unisex</option>
      </select>
      <p>Category</p>
      <select name="category" class="input">
        <option value="Hat">Hat</option>
        <option value="Shirt">Shirt</option>
        <option value="Pants">Pants</option>
        <option value="Dress">Dress</option>
        <option value="Shoes">Shoes</option>
        <option value="Others">Others</option>
      </select>
      <p>Age range</p>
      <select name="age_range" class="input">
        <option value="Below 1 year">Below 1 year</option>
        <option value="1 to 3 years">1 to 3 years</option>
        <option value="4 to 6 years">4 to 6 years</option>
        <option value="7 to 9 years">7 to 9 years</option>
        <option value="9 to 12 years">9 to 12 years</option>
        <option value="Above 12 years">Above 12 years</option>
      </select>
      <p>Description</p>
      <textarea name="desc" class="input" placeholder="Description"></textarea>
      <p>Price(RM)</p>
      <input name="price" type="number" class="input" placeholder="Price" min="0" step="0.01" value="0.00"  />
      <p>Image</p>
      <input name="image" type="file" class="input" placeholder="Image" />
      <p>Status</p>
      <select name="status" class="input">
        <option value="AVAILABLE">AVAILABLE</option>
        <option value="OUT OF STOCK">OUT OF STOCK</option>
      </select>
      <p> </p>
      <input type="submit" value="SUBMIT"/>
      <br><br>
    </form>

  </body>
  
</body>
</html>

<?php
  if (isset($_SESSION["result"]))
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "FAILURE")
      {
        echo "<script type='text/javascript'>alert('Invalid data! Please try again.')</script>";
      }
      else if($result == "SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Product successfully added.')</script>";
      }    
    }
  }
?>