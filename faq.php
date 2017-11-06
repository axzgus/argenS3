<?php include("soporte.php"); ?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preguntas frecuentes</title>
        <link href="reset.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/FAQ.css">

    </head>

    <body>
      <!-- //******************************HEADER********************************** -->

        <?php include 'header.php'; ?>


      <!-- //*****************************BODY*********************************** -->
      <div class="accordion_arrows">


    	<nav class="accordion">
        	<header class="box">
        		<label for="acc-close" class="box-title">Preguntas frecuentes</label>
        	</header>
        		<input type="radio" name="accordion" id="cb1" />
        		<section class="box">
        			<label class="box-title" for="cb1">¿Cuentan con stock de todos los productos publicados?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Realizamos un seguimiento exhaustivo de nuestro stock para asegurar su disponibilidad al momento de la compra. Sin embargo, puede suceder que por motivos extraordinarios nos quedemos sin stock de alguno de los productos o verifiquemos que al momento de la entrega el stock disponible no cumple con los niveles de calidad que correspondan. Si no es posible coordinar con el cliente una fecha alternativa de entrega, se procede a la devolución del importe de la compra.</div>
        		</section>

        		<input type="radio" name="accordion" id="cb2" />
        		<section class="box">
        			<label class="box-title" for="cb2">¿El producto es exactamente igual a la foto publicada?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Las fotos e imágenes que se exhiben de los productos en nuestro sitio son solo ilustrativas y no necesariamente son la representación exacta del producto. Para conocer visualmente y exactamente el producto deberá dirigirse a cualquiera de nuestras oficinas de entrega.</div>
        		</section>

        		<input type="radio" name="accordion" id="cb3" />
        		<section class="box">
        			<label class="box-title" for="cb3">¿En que zona se encuentran?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Tenemos 2 oficinas de entrega:<br>
                    1) CABA:Estamos en el barrio San Cristóbal de Capital Federal. Es a poco más de una cuadra del cruce de las Av Independencia y Jujuy con estacionamiento propio. Estamos cerca de las estaciones Humberto 1 de Línea H y Jujuy de Línea E. Horario para retirar: Lunes a Viernes de 13 a 17:45hs.<br>
                    2) LANUS:Estamos en Lanús Oeste a pocas cuadras del cruce de las Avenidas Hipólito Yrigoyen y Remedios de Escalada de San Martín. Entre las estaciones Lanús y Gerli. Horario: de L a V de 9 a 17hs / Sáb de 9 a 13hs.
               </div>
        		</section>

                <input type="radio" name="accordion" id="cb4" />
        		<section class="box">

        			<label class="box-title" for="cb4">¿Realizan envíos a todo el país?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Si. Tenemos envío con nuestro servicio de logística o transporte expreso.<br>
                    Si nos indica la localidad de destino, le podemos informar disponibilidad y costo del medio más económico y seguro. <br>
                    Si va por expreso, llevamos la mercadería sin cargo a la terminal de salida en Capital Federal del transporte que llegue a tu zona.
                  </div>

        		</section>

                <input type="radio" name="accordion" id="cb5" />
        		<section class="box">
        			<label class="box-title" for="cb5">¿Que sucede si la mercadería se rompe durante el transporte?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Embalamos la mercadería cuidadosamente indicando claramente, en su caso, que la mercadería es frágil. Los envíos se realizan por medios que cuentan con seguro para cubrir todo riesgo de roturas.

              </div>

        		</section>

                <input type="radio" name="accordion" id="cb6" />
        		<section class="box">
        			<label class="box-title" for="cb6">¿Que sucede si la mercadería se rompe durante el transporte?</label>
        			<label class="box-close" for="acc-close"></label>
        			<div class="box-content">Embalamos la mercadería cuidadosamente indicando claramente, en su caso, que la mercadería es frágil. Los envíos se realizan por medios que cuentan con seguro para cubrir todo riesgo de roturas.

              </div>

        		</section>

        		<input type="radio" name="accordion" id="acc-close" />
        	</nav>
        </div>


        <!-- //*********************FOOTER***************************** -->

        <?php include 'footer.php'; ?>

        <!-- //*******************FOOTER END************************** -->
    </body>
</html>
