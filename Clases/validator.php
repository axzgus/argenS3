<?php

require_once("db.php");
require_once("usuario.php");

class Validator {
  public function validarInformacion(db $db) {
		$errores = [];

		$nombreArchivo = $_FILES["avatar"]["name"];

		$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

		if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
			$errores["avatar"] = "Ey, no se subio bien la foto";
		}
		else if ($extension != "jpg" && $extension != "jpeg" && $extension != "gif" && $extension != "png") {
			$errores["avatar"] = "La foto no tiene un formato valido";
		}

		if ($_POST["name"] == "") {
			$errores["name"] = "Che, el nombre esta mal";
		}

    if ($_POST["lastname"] == "") {
      $errores["lastname"] = "Che, el apellido esta mal";
    }

    if ($_POST["username"] == "") {
      $errores["username"] = "Che, el nombre de usuario esta mal";
    }

		if ($_POST["email"] == "") {
			$errores["email"] = "Che, el mail no esta";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$errores["email"] = "Che, el FORMATO del mail esta mal";
		}
		else if ($db->traerPorEmail($_POST["email"]) != null) {
			$errores["email"] = "El mail ya existe en otro usuario";
		}

		if (is_numeric($_POST["phone"]) == false) {
			$errores["phone"] = "Che, pusiste cualquier cosa en el numero de telefono";
		}

		if (strlen($_POST["password"]) < 6) {
			$errores["password"] = "Che, pone al menos 6 caracters de pass";
		}
		else if ($_POST["password"] != $_POST["repassword"]) {
			$errores["password"] = "Las contraseñas no verifican";
		}

		if (isset($_POST["terminos"]) == false) {
			$errores["terminos"] = "Ey! Acepta los terminos";
		}

		return $errores;
	}

  public function validarLogin(db $db) {
		$errores = [];


		if ($_POST["email"] == "") {
			$errores["email"] = "Che, el mail no esta";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$errores["email"] = "Che, el FORMATO del mail esta mal";
		}
		else if ($db->traerPorEmail($_POST["email"]) == null) {
			$errores["email"] = "El mail no esta en la base";
		}
		else {
			//El mail existe!!
			$usuario = $db->traerPorEmail($_POST["email"]);

			if (password_verify($_POST["password"],  $usuario->getPassword()) == false) {
				$errores["password"] = "La contraseña no verifica";
			}
		}

		return $errores;
	}

  public function validarEdicion(db $db, Usuario $usuario) {
		$errores = [];

		if ($_POST["name"] == "") {
			$errores["name"] = "Che, el nombre esta mal";
		}

    if ($_POST["lastname"] == "") {
      $errores["lastname"] = "Che, el apellido esta mal";
    }

		if ($_POST["email"] == "") {
			$errores["email"] = "Che, el mail no esta";
		}
		else if(filter_var($_POST["email"],  FILTER_VALIDATE_EMAIL) == false) {
			$errores["email"] = "Che, el FORMATO del mail esta mal";
		}
		else if ($db->traerPorEmail($_POST["email"]) != null && $_POST["email"] != $usuario->getEmail()) {
			$errores["email"] = "El mail ya existe en la base de datos";
		}

		if (is_numeric($_POST["phone"]) == false) {
			$errores["phone"] = "Che, pusiste cualquier cosa en tu telefono";
		}

  if (!$_POST["password"]){

    $_POST["password"]= $usuario->getPassword();

  }else{

    if (password_verify($_POST["oldpassword"], $usuario->getPassword()) == false ){
      $errores["oldpassword"] = "Che, tu contraseña anterior esta mal";
    }

		if (strlen($_POST["password"]) < 6) {
			$errores["password"] = "Che, pone al menos 6 caracters de pass";
		}
		else if ($_POST["password"] != $_POST["repassword"]) {
			$errores["password"] = "Las contraseñas no verifican";
		}
  }

		return $errores;
	}
}

?>
