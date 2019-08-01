<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/database.php';
  if (!isset($_SESSION["admin"]))
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    exit;
  }
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Nunito|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_admin_index.css">
  <title>Admin Home</title>
</head>
<body>
  <nav>
    <div class="logo">
      <img src="img/logo.png" style=" width: 90px; height: 50px;">
    </div>
    <div class="toggle-bars">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <div class="nav">
      <ul>
        <li><a href="index.php" style="text-decoration:none; color: white;">Admin Home</a></li>
        <li><a href="add_product.php" style="text-decoration:none; color: white;">Add Product</a></li>
        <li><a href="transactions.php" style="text-decoration:none; color: white;">Transactions</a></li>
        <li><a href="change_pw.php" style="text-decoration:none; color: white;">Change Password</a></li>
        <li><a href="logout.php" style="text-decoration:none; color: white;">Log Out</a></li>
      </ul>
    </div>
  </nav>
  <div class="info" style="padding-top: 24px;">
    <h1>Product List</h1>
    <br><br>
    <table>
    <tr>
      <th>ID</th>
      <th>Product Number</th>
      <th>Product Name</th>
      <th>Gender</th>
      <th>Category</th>
      <th>Price(RM)</th>
      <th>Status</th>
      <th>Operation</th>
    </tr>
    <?php
    $array = Product::all();
    foreach ($array as $product)
    {    
      $id = $product->get_id();
      echo "<tr>";
      echo "<td>".$id."</td>";
      echo "<td>".$product->get_number()."</td>";
      echo "<td>".$product->get_name()."</td>";
      echo "<td>".$product->get_gender()."</td>";
      echo "<td>".$product->get_category()."</td>";    
      echo "<td>".number_format($product->get_price(), 2)."</td>";
      echo "<td>".$product->get_status()."</td>";     
      echo "<td>";
      echo "<a href='edit_product.php?id=$id'><img src='img/edit.png' style=' width: 20px; height: 20px;'></a>";
      echo "&nbsp &nbsp &nbsp";
      $cond = "product_id = ".$id;
      if (Order::find($cond) == null && Transaction::find($cond) == null)
      {
        echo "<a href='delete_product.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this item?\");'><img src='img/delete.png' style=' width: 20px; height: 20px;'></a>";
      }      
      echo "</td>";      
      echo "</tr>";
    }
    ?>
  </table>
  </div>  
</body>
</html>

<?php
  if (!$_SESSION["result"])
  {
    $result = $_SESSION["result"];
    if ($result != null)
    {
      $_SESSION["result"] = null;
      if ($result == "DELETE_SUCCESS")
      {
        echo "<script type='text/javascript'>alert('Product successfully deleted.')</script>";
      }
      else if($result == "DELETE_FAILURE")
      {
        echo "<script type='text/javascript'>alert('Product delete failed.')</script>";
      }       
    }
  }
?>

<br>