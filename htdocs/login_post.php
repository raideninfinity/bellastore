<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  $item = Customer::find("email = '".$email."'");
  if ($item == null || $item->get_password() != $password)
  {
    $_SESSION["result"] = "AUTH_FAIL";
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
  }
  else
  {
    $_SESSION["user"] = $item->get_id();
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  }
?>
