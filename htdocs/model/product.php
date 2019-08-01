<?php

require_once "model.php";

class Product extends Model
{
  const TABLE_NAME = 'products';
  protected $form = ["id" => "int", "number" => "string", "name" => "string", "gender" => "string", "category" => "string", "age_range" => "string",
                     "description" => "string", "price" => "float", "image" => "string", "status" => "string"];
  
  public function __construct()
  {
    $this->data = ["id" => 0, "number" => "", "name" => "", "gender" => "", "category" => "", "age_range" => "",
                   "description" => "", "price" => 0.0, "image" => "", "status" => ""];
  }
  
  public function set_number($value)
  {
    $this->data['number'] = $value;
  }

  public function get_number()
  {
    return $this->data['number'];
  }

  public function set_name($value)
  {
    $this->data['name'] = $value;
  }

  public function get_name()
  {
    return $this->data['name'];
  }
  
  public function set_gender($value)
  {
    $this->data['gender'] = $value;
  }

  public function get_gender()
  {
    return $this->data['gender'];
  }
  
  public function set_category($value)
  {
    $this->data['category'] = $value;
  }

  public function get_category()
  {
    return $this->data['category'];
  }

  public function set_age_range($value)
  {
    $this->data['age_range'] = $value;
  }

  public function get_age_range()
  {
    return $this->data['age_range'];
  }

  public function set_description($value)
  {
    $this->data['description'] = $value;
  }

  public function get_description()
  {
    return $this->data['description'];
  }

  public function set_price($value)
  {
    $this->data['price'] = $value;
  }

  public function get_price()
  {
    return $this->data['price'];
  }

  public function set_image($value)
  {
    $this->data['image'] = $value;
  }

  public function get_image()
  {
    return $this->data['image'];
  }

  public function set_status($value)
  {
    $this->data['status'] = $value;
  }

  public function get_status()
  {
    return $this->data['status'];
  }  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['number'] = $source['number'];
    $this->data['name'] = $source['name'];
    $this->data['gender'] = $source['gender'];
    $this->data['category'] = $source['category'];
    $this->data['age_range'] = $source['age_range'];
    $this->data['description'] = $source['description'];
    $this->data['price'] = floatval($source['price']);
    $this->data['image'] = $source['image'];  
    $this->data['status'] = $source['status'];
  }
  
}

?>