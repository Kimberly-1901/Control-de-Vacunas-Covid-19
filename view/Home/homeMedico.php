<?php
  require_once("../../config/conexion.php");

  $now = time();

  if($now > $_SESSION['expire']) {
    session_destroy();

    echo "Su sesion a terminado,
    <a href='http://13.59.37.197/ProyectoCovid/index.php'>Necesita Hacer Login</a>";
    exit;
  }

  if(isset($_SESSION['cedula'])){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/responsiveAdministrar.css">
    <script type="text/javascript" src="../../public/js/script.js"></script>
    <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/plotly-latest.min.js"></script>
    <title>Inicio</title>
  </head>
  <body>


    <input type="checkbox" id="check" />
    <label for="check">
      <arial class="fas fa-bars" id="btn">☰</arial>
      <arial class="fas fa-times" id="cancel">☰</arial>
    </label>
    <aside class="sidebar">
      <img src="../../public/img/escu.png" id="doc" width="150px" />
      <header>Médico</header>
      <ul>
        <li>
          <a href="../Home/homeMedico.php"><i class="fas fa-qrcode"></i>Inicio</a>
        </li>
        <li>
          <a href="../RegistrarPaciente/registrarPaciente.php"><i class="fas fa-link"></i>Agregar Paciente</a>
        </li>
        <li>
          <a href="../AdministrarPaciente/administrarPaciente.php"><i class="fas fa-stream"></i>Modificar Paciente</a>
        </li>
        <li>
          <a href="../ConsultarPaciente/consultarPaciente.php"><i class="fas fa-calendar-week"></i>Consultar Paciente</a>
        </li>
        <li>
          <a href="../../modelo/logout.php"><i class="fas fa-calendar-week"></i>Cerrar Sesión</a>
        </li>
      </ul>
    </aside>
    <header class="Cabecera">
      <div class="content">
        <div class="images">
          <img src="../../public/img/carrusel1.jpg" class="imagenes"/>
          <img src="../../public/img/carrusel2.jpg" class="imagenes"/>
          <img src="../../public/img/carrusel3.jpg" class="imagenes"/>
        </div>
      </div>
    </header>

    <div id="Seccion1">
      <br /><br /><br />
      <h1>Bienvenido al Sistema de Vacunación Covid-19</h1>
      <br />
      <h2>Aquí se realiza el control de los Pacientes del sistema</h1>

      <br /><br /><br />
      <h1>Últimas Estadísticas Registradas</h1>
    </div>

    <div class="graficas">
      <div id="Seccion2"></div>
      <div id="Seccion3"></div>
      <div id="Seccion4"></div>
    </div>
  </body>

  <script>
    $(document).ready(function(){
    $('#Seccion2').load('../../modelo/graficalineal.php');
    });
    $(document).ready(function(){
    $('#Seccion3').load('../../modelo/barras.php');
    });
    $(document).ready(function(){
    $('#Seccion4').load('../../modelo/graficaCircular.php');
    });
    
  </script>

  </body>
</html>

<?php
  }
  else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>
