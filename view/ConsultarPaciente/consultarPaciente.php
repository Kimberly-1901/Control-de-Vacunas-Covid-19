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
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/responsiveConsultar.css" />
  <link rel="stylesheet" href="../../public/css/tabla.css" />
  <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
  <title>Consultar Pacientes</title>
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

  <div class="search">
    <div id="logotipo">
      <h1>Consultar Paciente</h1>
    </div>
    </div>
  </div>

  <div id="wrapper" style="margin-left: 0px;">

    <table id="keywords" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th><span>Cédula</span></th>
          <th><span>Nombre</span></th>
          <th><span>Correo</span></th>
          <th><span>Género</span></th>
          <th><span>Edad</span></th>
          <th><span>Télefono</span></th>
          <th><span>Marca de Vacuna</span></th>
          <th><span>Número de Dosis</span></th>
          <th><span>Nivel de Riesgo</span></th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../../modelo/llenarTablaPacientes.php");
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
<?php
  }
  else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>
