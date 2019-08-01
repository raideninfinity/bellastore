<?php  
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  $admin = $_SESSION["admin"];
  if ($admin == null)
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }
  
  $old_pw = $_POST["old_pw"];
  $new_pw1 = $_POST["new_pw1"];
  $new_pw2 = $_POST["new_pw2"]; 
  
  $result = "SUCCESS";
  
  $admin = Admin::get($admin);
  
  if ($old_pw != $admin->get_password())
  {
    $result = "OLD_PW_FAIL";
  }
  else if ($new_pw1 == "" || $new_pw1 != $new_pw2)
  {
    $result = "NEW_PW_FAIL";
  }
  else
  {
    $admin->set_password($new_pw1);
    $admin->save();
  }
  $_SESSION["result"] = $result;
  echo "<script type='text/javascript'>location.href = 'change_pw.php';</script>";
?>