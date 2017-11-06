<?php
    $name = null;
     $lastname = null;
      $username = null;
       $email = null;
       $phone = null;

       require_once("validacion.php");
 ?>
<?php
  var_dump($_FILES);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="reset.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo_reg.css">
    <link rel="stylesheet" href="css/estilo.css">
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
                name="profile_pic"
                id="profile_pic"
                class="input-48"
                placeholder="Foto de Perfil">


                <input type="text" name="phone" placeholder="Telefono"
                value="<?php echo $phone ?>"
                class="input-100" >

                <input type="password" name="password" placeholder="Clave"class="input-48" >

                <input type="submit" value="Registrar" class="boton-enviar">

                <p class="form-link">Ya tienes una cuenta? <a href="#">Ingresar</a></p>

            </div>
        </form>

        <p><?php if(isset($errores['name'])) echo $errores['name']; ?></p>

        <p><?php if(isset($errores['lastname'])) echo $errores['lastname']; ?></p>

        <p><?php if(isset($errores['username'])) echo $errores['username']; ?></p>

        <p><?php if(isset($errores['email'])) echo $errores['email']; ?></p>

        <p><?php if(isset($errores['pass'])) echo $errores['pass']; ?></p>

        <p><?php if(isset($errores['phone'])) echo $errores['phone']; ?></p>

        <p><?php if(isset($errores["imagen"])) echo   $errores["imagen"]; ?></p>


    </div>

<!-- ********************************* FROM ************************************* -->

<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
