<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $item = Admin::find("username = '".$username."'");
  if ($item == null || $item->get_password() != $password)
  {
    $_SESSION["result"] = "AUTH_FAIL";
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
  }
  else
  {
    $_SESSION["admin"] = $item->get_id();
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  }
?>
