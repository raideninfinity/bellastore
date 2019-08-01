<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]) || !isset($_GET["id"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }
  
  $id = $_GET["id"];
  $order = Order::get($id);
  if ($order == null)
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;    
  }
  $order->erase();
  
  $_SESSION["result"] = "DELETE_CART_SUCCESS";
  echo "<script type='text/javascript'>location.href = 'cart.php';</script>";
  
?>  