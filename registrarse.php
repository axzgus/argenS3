<?php

require_once("soporte.php");

	if ($auth->estaLogueado()) {
		header("Location:index.php");exit;
	}

    $name = "";
     $lastname = "";
      $username = "";
       $email = "";
       $phone = "";

   

   //Si se envia información
 	if ($_POST) {
 		// Validar
    // var_dump($_POST);
 		$errores = $validator->validarInformacion($db);

 		//Si no hay errores
 		if (count($errores) == 0) {
 			//Registrar
 			$usuario = new Usuario($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["username"], $_POST["phone"], $_POST["password"]);

 			$usuario = $db->guardarUsuario($usuario);

 			//Subir la foto
 			$nombreArchivo = $_FILES["avatar"]["name"];

 			$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

 			$nombre =  "avatares/" . $_POST["email"] . ".$extension";
 			$archivo = $_FILES["avatar"]["tmp_name"];
 			move_uploaded_file($archivo, $nombre);
    }

  }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="reset.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo_regs.css">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <div class="cuerpo">


      <!-- *************************HEADER**************************** -->
          <?php include 'header.php'; ?>

          <!-- *******************FIN HEADER********************************* -->


<!-- ********************************* FORM ************************************* -->


    <div class="Formulario">

        <form class="form-registro" action="registrarse.php" method="post" enctype="multipart/form-data">
            <h2 class="form-titulo">Crear una cuenta</h2>
            <div class="contenedor-input">
                <input type="text" name="name" placeholder="Nombre"
                value="<?php echo $name ?>"
                class="input-48" >


              <input type="text" name="lastname" placeholder="Apellido"
               value="<?php echo $lastname ?>"
                class="input-48" >

                <input type="email" name="email" placeholder="Correo"
                value="<?php echo $email ?>"
                 class="input-100" >

                <input type="text" name="username" placeholder="Usuario"
                value="<?php echo $username ?>"
                class="input-48" >

                <input
                type="file"
                name="avatar"
                id="profile_pic"
                class="input-48"
                placeholder="Foto de Perfil">


                <input type="text" name="phone" placeholder="Telefono"
                value="<?php echo $phone ?>"
                class="input-100" >

                <input type="password" name="password" placeholder="Clave"class="input-48" >

                <input type="password" name="repassword" placeholder="Clave"class="input-48" >

                <input type="checkbox" name="terminos">Acepto T&C


                <input type="submit" value="Registrar" class="boton-enviar">

                <p class="form-link">Ya tienes una cuenta? <a href="#">Ingresar</a></p>

            </div>
        </form>

        <div class="echo_errores">


            <div class="echo_errores_container">



        <p>		<?php if(isset($errores)) : ?>
        			<ul class="errores">
        				<?php foreach($errores as $error) : ?>
        					<li>
        						<?=$error?>
        					</li>
        				<?php endforeach;?>
        			</ul>
        		<?php endif; ?></p>

          </div>

          </div>

    </div>

<!-- ********************************* FROM ************************************* -->

<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
