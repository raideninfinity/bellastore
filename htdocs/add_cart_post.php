<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]) || !isset($_POST["id"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }
  
  $id = $_POST["id"];
  $product = Product::get($id);
  if ($product == null || $product->get_status() != "AVAILABLE")
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;    
  }
  
  $units = $_POST["units"];
  
  $order = new Order();
  $order->set_customer_id($_SESSION["user"]);
  $order->set_product_id($id);
  $order->set_units($units);
  $order->save();
  
  $_SESSION["result"] = "ADD_CART_SUCCESS";
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  
?>  