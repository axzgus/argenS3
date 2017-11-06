<?php

class Usuario {
  private $id;
  private $name;
  private $lastname;
  private $email;
  private $username;
  private $password;
  private $phone;


  public function __construct($name, $lastname, $email, $username, $phone, $password, $id = null) {
    if ($id == null) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
      $this->password = $password;
    }

    $this->name = $name;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->username = $username;
    $this->phone = $phone;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->name;
  }

  public function setNombre($name) {
    $this->name = $name;
  }

  public function getApellido() {
    return $this->lastname;
  }

  public function setApellido($name) {
    $this->lastname = $lastname;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPhone() {
    return $this->phone;
  }

  public function setPhone($phone) {
    $this->phone = $phone;
  }



  public function toArray() {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "lastname" => $this->lastname,
      "email" => $this->email,
      "username" => $this->username,
      "phone" => $this->phone,
      "password" => $this->password,
    ];
  }

  public function setNewPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

?>
