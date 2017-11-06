<?php include("soporte.php");

   $email = "";


if ($auth->estaLogueado()) {
  header("Location:index.php");exit;
}

if ($_POST) {
  $errores = $validator->validarLogin($db);

  if (count($errores) == 0) {
    $auth->loguear($_POST["email"]);

    if (isset($_POST["recordame"])) {
      setcookie("usuarioLogueado", $_POST["email"], time()+60*60*24*30);
    }

    header("Location:index.php");

    // header("Location:perfilDeUsuario.php?email=" . $_POST["email"]);
  }
}
?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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

      <?php

// var_dump($_POST['password'],);

      if(isset($errores)) : ?>
			<ul class="errores">
				<?php foreach($errores as $error) : ?>
					<li>
						<?=$error?>
					</li>
				<?php endforeach;?>
			</ul>
		<?php endif; ?>

        <form class="form-registro" action="login.php" method="post">
            <h2 class="form-titulo">Ingresa al futuro</h2>
                <div class="contenedor-input">
                    <input type="text" name="email" placeholder="email"class="input-100" required
                    value="<?php echo $email ?>" >

                    <input type="password" name="password" placeholder="Contrasena"class="input-100" required>

                    <div class="form-group">
                    				Recordame <input type="checkbox" name="recordame">
                    </div>

                    <input type="submit" value="Entrar" class="boton-enviar">
                    <p class="form-link"> <a href="#">Olvidé mi maldita contraseña!</a></p>
                </div>
        </form>

    </div>

    <div class="">
      No tenes cuenta?  <a href="registrarse.php">Registrate acá!</a>
    </div>
<!-- ********************************* FORM ************************************* -->


<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
