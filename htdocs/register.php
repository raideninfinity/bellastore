<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (isset($_SESSION["user"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bella Kids Outfit</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<br>
<br>
<div class="form-wrap">
	<br>
	<center><h3>Member Register</h3></center>
		<div class="tabs-content">
			<div id="login-tab-content" class="active">
				<form class="login-form" action="register_post.php" method="post">
					<input type="text" class="input" id="email" name="email" autocomplete="off" placeholder="Email" required="true">
					<input type="password" class="input" id="Password" name="password" autocomplete="off" placeholder="Password" required="true">
					<input type="password" class="input" id="Password2" name="password2" autocomplete="off" placeholder="Re-enter Password" required="true">
					<input type="text" class="input" id="name" name="name" autocomplete="off" placeholder="Name" required="true">
					<input type="text" class="input" id="address" name="address" autocomplete="off" placeholder="Address" required="true">
					<input type="text" class="input" name="phone" id="phone" autocomplete="off" placeholder="Phone Number" required="true">
					<center><input type="submit" class="button" value="Sign Up"></center>
				</form>
      <div class="help-text">
        <p>Already have an account? <a href="login.php"><b>Login Here</b>.</a></p>
        <p><a href="index.php"><b>Back to Home Page</b>.</a></p>
      </div>
			</div>
		</div>
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
    if ($result == "INCOMPLETE")
    {
      echo "<script type='text/javascript'>alert('Incomplete form. Please try again.')</script>";
    }
    else if ($result == "DUPLICATE")
    {
      echo "<script type='text/javascript'>alert('An account already exist for this email.  Please log in with existing email or use another email.')</script>";
    }    
    else if ($result == "NOT_MATCH")
    {
      echo "<script type='text/javascript'>alert('Passwords do not match.  Please try again.')</script>";
    }        
  }
}
?>