<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  $admin = $_SESSION["admin"];
  if ($admin != null)
  {
    $_SESSION["admin"] = null;
    $_SESSION["result"] = "LOG_OUT";
  }  
  echo "<script type='text/javascript'>location.href = 'login.php';</script>";
?>