<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';

  $admin = $_SESSION["admin"];
  if ($admin == null)
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }

  $id = $_POST["id"];
  if ($id == null) 
  {
    $id = 0;
  }
  $product = Product::get($id);
  if ($product == null)
  {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
  }
  
  $num = $_POST["number"];
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $category = $_POST["category"];
  $age_range = $_POST["age_range"];
  $desc = $_POST["desc"];
  $price = floatval($_POST["price"]);
  $status = $_POST["status"];
  $no_image = isset($_POST["no_image"]);
  if ($num == "" || $name == "" || $status == "")
  {
    $_SESSION["result"] = "EDIT_FAILURE";
    
  }
  else
  {
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/images/product/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir.$image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $product->set_number($num);
    $product->set_name($name);
    $product->set_gender($gender);
    $product->set_category($category);
    $product->set_age_range($age_range);
    $product->set_description($desc);
    $product->set_price($price);
    if ($image_name != "")
    {
      $product->set_image($image_name);
    }
    if ($no_image)
    {
      $product->set_image("");
    }
    $product->set_status($status);
    $product->save();
    $_SESSION["result"] = "EDIT_SUCCESS";
  }
  echo "<script type='text/javascript'>location.href = 'edit_product.php?id=$id';</script>";  
  
 ?>