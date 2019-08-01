<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (isset($_SESSION["user"]))
  {
    $user = $_SESSION["user"];
  }
  else
  {
    $user = null;
  }
  if ($user != null)
  {
    $_SESSION["user"] = null;
    $_SESSION["result"] = "LOG_OUT";
  }  
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";
?>