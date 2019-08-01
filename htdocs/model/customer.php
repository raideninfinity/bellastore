<?php

require_once "model.php";

class Customer extends Model
{
  const TABLE_NAME = 'customers';
  protected $form = ["id" => "int", "email" => "string", "password" => "string", "name" => "string", "address" => "string", "phone" => "string"];
  
  public function __construct()
  {
    $this->data = ["id" => 0, "email" => "", "password" => "", "name" => "", "address" => "", "phone" => ""];
  }

  public function set_email($value)
  {
    $this->data['email'] = $value;
  }

  public function get_email()
  {
    return $this->data['email'];
  }
  
  public function set_password($value)
  {
    $this->data['password'] = $value;
  }

  public function get_password()
  {
    return $this->data['password'];
  }

  public function set_name($value)
  {
    $this->data['name'] = $value;
  }

  public function get_name()
  {
    return $this->data['name'];
  }

  public function set_address($value)
  {
    $this->data['address'] = $value;
  }

  public function get_address()
  {
    return $this->data['address'];
  }

  public function set_phone($value)
  {
    $this->data['phone'] = $value;
  }

  public function get_phone()
  {
    return $this->data['phone'];
  }  
  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['email'] = $source['email'];
    $this->data['password'] = $source['password'];
    $this->data['name'] = $source['name'];
    $this->data['address'] = $source['address'];
    $this->data['phone'] = $source['phone'];
  }
  
}

?>