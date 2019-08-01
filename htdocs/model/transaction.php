<?php

require_once "model.php";

class Transaction extends Model
{
  const TABLE_NAME = 'transactions';
  protected $form = ["id" => "int", "customer_id" => "int", "product_id" => "int", "price" => "float", "units" => "int", "date" => "string"];
  
  public function __construct()
  {
    $this->data = ["id" => 0, "customer_id" => 0, "product_id" => 0, "price" => 0, "units" => 0, "date" => ""];
  }

  public function set_customer_id($value)
  {
    $this->data['customer_id'] = $value;
  }

  public function set_product_id($value)
  {
    $this->data['product_id'] = $value;
  }
  
  public function get_customer_id()
  {
    return $this->data['customer_id'];
  }
  
  public function get_product_id()
  {
    return $this->data['product_id'];
  }
 
  public function set_units($value)
  {
    $this->data['units'] = $value;
  }
  
  public function get_units()
  {
    return $this->data['units'];
  }
  
  public function set_price($value)
  {
    $this->data['price'] = $value;
  }
  
  public function get_price()
  {
    return $this->data['price'];
  }

  public function set_date($value)
  {
    $this->data['date'] = $value;
  }
  
  public function get_date()
  {
    return $this->data['date'];
  }
  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['customer_id'] = intval($source['customer_id']);
    $this->data['product_id'] = intval($source['product_id']);
    $this->data['units'] = intval($source['units']);
    $this->data['price'] = floatval($source['price']);
    $this->data['date'] = $source['date'];
  }
  
}

?>