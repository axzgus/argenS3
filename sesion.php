<?php include("soporte.php");

   $email = "";


if (!$auth->estaLogueado()) {
  header("Location:index.php");exit;
}

$usuario = $auth->obtenerUsuarioLogueado($db);

if ($_POST) {
  $errores = $validator->validarEdicion($db,$usuario);

  //Si no hay errores
  if (count($errores) == 0) {
    //Modifico el usuario

    $userid = $usuario->getId();

    $usuario = new Usuario($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["username"], $_POST["phone"], $_POST["password"],$userid);

    $usuario = $db->editarUsuario($usuario);

    header("Location:sesion.php");

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

    <form class="form-registro" action="sesion.php" method="post" enctype="multipart/form-data">
        <h2 class="form-titulo">Edita tu cuenta</h2>
        <div class="contenedor-input">
            <input type="text" name="name" placeholder="Nombre"
            value="<?= $usuario->getNombre() ?>"
            class="input-48" >


          <input type="text" name="lastname" placeholder="Apellido"
           value="<?= $usuario->getApellido() ?>"
            class="input-48" >

            <input type="email" name="email" placeholder="Correo"
            value="<?= $usuario->getEmail() ?>"
             class="input-100" >

            <input type="text" name="username" placeholder="Usuario"
            value="<?= $usuario->getUsername() ?>"
            class="input-48" >


            <input type="text" name="phone" placeholder="Telefono"
            value="<?= $usuario->getPhone() ?>"
            class="input-100" >


            <input type="password" name="oldpassword" placeholder="Clave Actual"class="input-48" >


            <input type="password" name="password" placeholder="Clave Nueva"class="input-48" >

            <input type="password" name="repassword" placeholder="Repeti tu Clave Nueva"class="input-48" >


            <a href="index.php?logout">Cerrar sesion</a>



            <input type="submit" value="Modificar" class="boton-enviar">



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

<!-- ********************************* FORM ************************************* -->


<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
