<?php

require_once("db.php");

class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = "mysql:host=localhost;port=3306;dbname=argenshop";
    $user = "root";
    $pass = "";

    $this->conn = new PDO($dsn, $user, $pass);
  }

  public function traerPorEmail($email) {
    $sql = "Select * from usuarios where email = :email";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":email", $email);

    $query->execute();

    $array = $query->fetch(PDO::FETCH_ASSOC);

    if (!$array) {
      return NULL;
    }

    return new Usuario($array["name"],$array["lastname"], $array["email"],$array["username"],$array["phone"], $array["password"],$array["id"]);
  }
  public function traerTodosLosUsuarios() {
    $sql = "Select * from usuarios";

    $query = $this->conn->prepare($sql);

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["name"],$array["lastname"], $array["email"],$array["username"],$array["phone"], $array["password"],$array["id"]);
    }

    return $arrayDeObjetos;
  }
  public function guardarUsuario(Usuario $usuario) {
    $sql = "Insert into usuarios values(default, :name, :lastname, :email, :username, :phone, :password)";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":name",$usuario->getNombre());
    $query->bindValue(":lastname",$usuario->getApellido());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":username",$usuario->getUsername());
    $query->bindValue(":phone",$usuario->getPhone());
    $query->bindValue(":password",$usuario->getPassword());



    $query->execute();

    $usuario->setId($this->conn->lastInsertId());

    return $usuario;
  }

  public function buscarUsuarios($buscar) {

    $sql = "Select * from usuarios where nombre like :buscar OR email like :buscar";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":buscar", "%$buscar%");

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["name"],$array["lastname"], $array["email"],$array["username"],$array["phone"], $array["password"],$array["id"]);
    }

    return $arrayDeObjetos;
  }

  public function editarUsuario(Usuario $usuario) {

    // var_dump($usuario); exit;


    $sql = "UPDATE usuarios set name = :name,lastname = :lastname, email = :email,username = :username, phone = :phone,  password = :password WHERE id = :id";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":name",$usuario->getNombre());
    $query->bindValue(":lastname",$usuario->getApellido());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":username",$usuario->getUsername());
    $query->bindValue(":phone",$usuario->getPhone());
    $query->bindValue(":password",$usuario->getPassword());
    $query->bindValue(":id",$usuario->getId());

    $query->execute();
  }
}

?>
