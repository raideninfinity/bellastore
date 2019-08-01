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
	<link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
	<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<br>
<br>
<div class="form-wrap">
	<br>
	<center><h3>Member Login</h3></center>
		<div class="tabs-content">
			<div id="login-tab-content" class="active">
				<form class="login-form" method="post" action="login_post.php">
					<input type="text" class="input" id="email" name="email" autocomplete="off" placeholder="Email" required="true">
					<input type="password" class="input" id="password" name="password" autocomplete="off" placeholder="Password" required="true">
					<center><input type="submit" class="button" value="Sign In"></center>
				</form>
      <div class="help-text">
        <p>Don't have an account? <a href="register.php"><b>Register Here</b>.</a></p>
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
    if ($result == "AUTH_FAIL")
    {
      echo "<script type='text/javascript'>alert('Wrong user name or password. Please try again.')</script>";
    }
    else if ($result == "REGISTER_SUCCESS")
    {
      echo "<script type='text/javascript'>alert('Register success. You may now login.')</script>";
    }    
  }
}
?>
