<?php
require_once("../../config/conexion.php");

$now = time();

  if($now > $_SESSION['expire']) {
    session_destroy();

    echo "Su sesion a terminado,
    <a href='http://13.59.37.197/ProyectoCovid/index.php'>Necesita Hacer Login</a>";
    exit;
  }
  
if (isset($_SESSION['cedula'])) {
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Home Paciente</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
      <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
      <?php
        require_once("../estilosplantilla.php");
      ?>
      
      <script src="../../public/js/jquery-3.6.0.min.js"></script>
      <script src="../../public/js/plotly-latest.min.js"></script>
  </head>

  <body class="clinic_version">

    <input type="hidden" value="<?php echo $_SESSION['cedula'] ?>" id="buscar1">

    <?php
    require_once("../header.php");
    ?>

    <div class="container centro">
      <div class="row">
        <div class="col-sm-6">
          <div style="width: 400px;">
            <img src="../../public/img/formu.png" width="115px" id="doctor">
            <label for="nombre" class="infoPac">Nombre: </label>
            <br>
            <input type="text" id="nombre" name="nombre" disabled>
            <label for="cedula" class="infoPac">Cédula: </label>
            <br>
            <input type="text" id="cedula" name="cedula" disabled>
            <label for="correo" class="infoPac">Correo: </label>
            <br>
            <input type="text" id="correo" name="correo" disabled>

            <label for="genero" class="infoPac">Género: </label>
            <br>
            <input type="text" id="genero" name="genero" disabled>

            <label for="edad" class="infoPac">Edad: </label>
            <br>
            <input type="text" id="edad" name="edad" disabled>

            <label for="telefono" class="infoPac">Télefono: </label>
            <br>
            <input type="text" id="telefono" name="telefono" disabled>

            <label for="riesgo" class="infoPac">Nivel de Riesgo: </label>
            <br>
            <input type="text" id="riesgo" name="riesgo" disabled>

            <label for="vacuna" class="infoPac">Marca de Vacuna: </label>
            <br>
            <input type="text" id="vacuna" name="vacuna" disabled>

            <label for="dosis" class="infoPac">Número de Dosis: </label>
            <br>
            <input type="text" id="dosis" name="dosis" disabled>
          </div>
        </div>

        <div class="col-sm-2">
        </div>

        <div class="col-sm-6">
          <div id="grafica"></div>  
        </div>
      </div>
    </div>



    <script src="../ConsultarPaciente/consultarPaciente.js"></script>
    <script src="../../plantillaPaciente/js/all.js"></script>
    <script src="../../plantillaPaciente/js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>

  </body>

  </html>


<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>