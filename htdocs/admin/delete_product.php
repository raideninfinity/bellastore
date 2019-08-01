<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';

  $admin = $_SESSION["admin"];
  if ($admin == null)
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }

  $id = $_GET["id"];
  if ($id == null) 
  {
    $id = 0;
  }
  $item = Product::get($id);
  if ($item != null)
  {
    $result = "DELETE_SUCCESS";
    $cond = "product_id = ".$id;
    if (Order::find($cond) == null && Transaction::find($cond) == null)
    {
      $item->erase();
    }
    else
    {
       $result = "DELETE_FAILURE";
    }
    $_SESSION["result"] = $result;
  }
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  
?>