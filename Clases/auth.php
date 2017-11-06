<?php

require_once("db.php");

class Auth {
  public function __construct() {
    session_start();

    if (isset($_COOKIE["usuarioLogueado"]) && !$this->estaLogueado()) {
      $this->loguear($_COOKIE["usuarioLogueado"]);
    }
  }



  public function estaLogueado() {
		if (isset($_SESSION["usuarioLogueado"])) {
			return true;
		}
		else {
			return false;
		}
	}

  public function obtenerUsuarioLogueado(db $db) {
		if ($this->estaLogueado()) {
			$email = $_SESSION["usuarioLogueado"];
			return $db->traerPorEmail($email);
		} else {
			return null;
		}
	}

  public function loguear($email) {
		$_SESSION["usuarioLogueado"] = $email;
	}

  public function logout(){

    setcookie("usuarioLogueado", '', time() -10);

    session_destroy();

    header('location:index.php');
    die();
  }
}


?>
