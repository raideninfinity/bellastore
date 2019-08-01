<?php

require_once "model.php";

class Admin extends Model
{
  const TABLE_NAME = 'admins'; 
  protected $form = ["id" => "int", "username" => "string", "password" => "string"];
  
  public function __construct()
  {
    $this->data = ["id" => 0, "username" => "", "password" => ""]; 
  }

  public function set_username($value)
  {
    $this->data['username'] = $value;
  }

  public function get_username()
  {
    return $this->data['username'];
  }
  
  public function set_password($value)
  {
    $this->data['password'] = $value;
  }

  public function get_password()
  {
    return $this->data['password'];
  }
  
  public function set_data($source)
  {
    $this->data['id'] = intval($source['id']);
    $this->data['username'] = $source['username'];
    $this->data['password'] = $source['password'];
  }
  
}

?>