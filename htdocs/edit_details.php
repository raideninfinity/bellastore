<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }   
  
  $user = Customer::get($_SESSION["user"]);
  $email = $user->get_email();
  $name = $user->get_name();
  $address = $user->get_address();
  $phone = $user->get_phone();
  
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
      <p style="padding-top: 8px">Welcome, <?php echo $name?>!</p>        
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
<div class="form-wrap">
	<br>
	<center><h3>Update Details</h3></center>
  <div class="tabs-content">
    <div id="login-tab-content" class="active">
      <form class="login-form" method="post" action="edit_details_post.php">
        <p>Current Password</p>
        <input type="password" class="input" name="old_pw" autocomplete="off" value="" required="true">
        <p>New Password (If changing)</p>
        <input type="password" class="input" name="new_pw1" autocomplete="off" value="">
        <p>Re-enter New Password</p>
        <input type="password" class="input" name="new_pw2" autocomplete="off" value="">
        <p>Name</p>
				<input type="text" class="input" id="name" name="name" autocomplete="off" value="<?php echo $name?>" required="true">
        <p>Address</p>
				<input type="text" class="input" id="address" name="address" autocomplete="off" value="<?php echo $address?>" required="true">
        <p>Phone Number</p>
			  <input type="text" class="input" name="phone" id="phone" autocomplete="off" value="<?php echo $phone?>" required="true">               
        <center><input type="submit" class="button" value="Update"></center>
      </form>
    </div>
  </div>
</div>
</body>
</html>

<!--  
  echo "Update Details";
  echo "<br><br>";
  echo "Your email: $email";
  echo "<br>";
  echo "<br>";
  echo "<form method='post' action='edit_details_post.php'>";
  echo "Current password: <input type='password' name='old_pw'>";
  echo "<br>";
  echo "New password: <input type='password' name='new_pw1'> *Leave blank if not changing";
  echo "<br>";
  echo "Re-enter password: <input type='password' name='new_pw2'>";
  echo "<br>";
  echo "Name: <input type='text' name='name' value='$name'>";
  echo "<br>";
  echo "Address: <input type='text' name='address' value='$address'>";
  echo "<br>";
  echo "Phone: <input type='text' name='phone' value='$phone'>";
  echo "<br>";
  echo "<input type='submit' value='Update'>";
  echo "</form>";
  echo "<br>";
  echo "<br>";
  echo "<a href='index.php'>Back</a>";
-->  

<?php  
  if (isset($_SESSION["result"]))
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "INCOMPLETE")
      {
        echo "<script type='text/javascript'>alert('All details must be filled in. Please try again.')</script>";
      }
      else if ($result == "AUTH_FAILURE")
      {
        echo "<script type='text/javascript'>alert('Wrong current password. Please try again.')</script>";
      }    
      else if ($result == "NOT_MATCH")
      {
        echo "<script type='text/javascript'>alert('New passwords do not match. Please try again.')</script>";
      }    
      else if ($result == "SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Details successfully updated.')</script>";
      }          
    }
  }
?>