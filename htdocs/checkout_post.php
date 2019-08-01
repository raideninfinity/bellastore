<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  
  if (!isset($_SESSION["user"]) || !isset($_POST["checkout"]))
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;
  }
  
  if ($_POST["checkout"] <= 0)
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    exit;    
  }
  
  $user = $_SESSION["user"];
  $array = Order::where("customer_id = $user");
  $date_now = date('Y-m-d H:i:s');
  
  foreach ($array as $order)
  {
    $product = Product::get($order->get_product_id());
    $transaction = new Transaction();
    $transaction->set_customer_id($user);
    $transaction->set_product_id($product->get_id());
    $transaction->set_date($date_now);
    $transaction->set_units($order->get_units());
    $transaction->set_price($product->get_price());
    $transaction->save();
    $order->erase();
  }  
  
  $_SESSION["result"] = "CHECKOUT_SUCCESS";
  echo "<script type='text/javascript'>location.href = 'transactions.php';</script>";
  
?>  