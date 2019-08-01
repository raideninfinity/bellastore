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
	<title>Change Password</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_admin_change_pw.css">
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
        <li><a href="index.php" style="text-decoration:none; color: white;">Admin Home</li></a>
        <li><a href="add_product.php" style="text-decoration:none; color: white;">Add Product</li></a>
        <li><a href="transactions.php" style="text-decoration:none; color: white;">Transactions</li></a>
        <li><a href="change_pw.php" style="text-decoration:none; color: white;">Change Password</li></a>
        <li><a href="logout.php" style="text-decoration:none; color: white;">Log Out</li></a>
      </ul>
    </div>
  </nav>
  <div class="info" style="padding-top: 24px;">
    <h1>Change Password</h1>
    <form method="post" action="change_pw_post.php">
      <p>Old Password</p>
      <input name="old_pw" type="password" class="input" placeholder="Old Password" required="true" /> 
      <p>New Password</p>
      <input name="new_pw1" type="password" class="input" placeholder="New Password" required="true" />
      <p>Re-enter Password</p>
      <input name="new_pw2" type="password" class="input" placeholder="Re-enter password" required="true" />
      <input type="submit" value="SUBMIT"/>
      <br><br>
    </form>
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
      if ($result == "OLD_PW_FAIL")
      {
        echo "<script type='text/javascript'>alert('Wrong old password! Please try again.')</script>";
      }
      else if($result == "NEW_PW_FAIL")
      {
        echo "<script type='text/javascript'>alert('New password is invalid or did not match! Please try again.')</script>";
      }
      else if($result == "SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Password successfully changed.')</script>";
      }    
    }
  }
?>