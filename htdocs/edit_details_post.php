<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]) || !isset($_POST["old_pw"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }
  
  $user = Customer::get($_SESSION["user"]);
  
  $old_pw = $_POST["old_pw"];
  $new_pw1 = $_POST["new_pw1"];
  $new_pw2 = $_POST["new_pw2"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];  
  
  $result = "REGISTER_SUCCESS";
  
  if ($name == "" || $address == "" || $phone == "")
  {
    $result = "INCOMPLETE";
  }
  else if ($old_pw != $user->get_password())
  {
    $result = "AUTH_FAILURE";
  }
  else if ($new_pw1 != "" && $new_pw1 != $new_pw2)
  {
    $result = "NOT_MATCH";
  }
  else
  {
    if ($new_pw1 != "")
    {
      $user->set_password($new_pw1);
    }
    $user->set_name($name);
    $user->set_address($address);
    $user->set_phone($phone);
    $user->save();
    $result = "SUCCESS";
  }
  
  $_SESSION["result"] = $result;
  echo "<script type='text/javascript'>location.href = 'edit_details.php';</script>";
  
?>