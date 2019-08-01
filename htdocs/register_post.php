<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (isset($_SESSION["user"]) || !isset($_POST["email"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }

  $email = $_POST["email"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];

  $result = "REGISTER_SUCCESS";
  
  if ($email == "" || $password == "" || $name == "" || $address == "" || $phone == "")
  {
    $result = "INCOMPLETE";
  }
  else if (Customer::find("email = '$email'") != null)
  {
    $result = "DUPLICATE";
  }
  else if ($password !=  $password2)
  {
    $result = "NOT_MATCH";
  }
  else
  {
    $user = new Customer();
    $user->set_email($email);
    $user->set_password($password);
    $user->set_name($name);
    $user->set_address($address);
    $user->set_phone($phone);
    $user->save();
    $_SESSION["result"] = $result;
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
  }
  
  $_SESSION["result"] = $result;
  echo "<script type='text/javascript'>location.href = 'register.php';</script>";
?>