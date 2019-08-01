<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (isset($_SESSION["admin"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }  
?>
<!-------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/style_admin_login.css">
</head>
<body style="background-image: url('img/adminbackground.jpg')">
  <center>
    <br><br><br><br>
    <img src="img/title3d.png" style="width: 500px">
    <div class="login">
      <div class="login-triangle"></div>
      <h2 class="login-header">Admin Login</h2>
      <form class="login-container" method="post" action="login_post.php">
        <p><input type="text" placeholder="Username" name="username"></p>
        <p><input type="password" placeholder="Password" name="password"></p>
        <p><input type="submit" value="Login"></p>
      </form>
    </div>
  </center>
</body>
</html>
<!-------------------------------------------------------------------------------->
<?php
  if (isset($_SESSION["result"]))
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "AUTH_FAIL")
      {
        echo "<script type='text/javascript'>alert('Authentication failure. Please try again.')</script>";
      }
      else if($result == "LOG_OUT")
      {
        echo "<script type='text/javascript'>alert('Successfully logged out.')</script>";
      }
    }
  }
?>
