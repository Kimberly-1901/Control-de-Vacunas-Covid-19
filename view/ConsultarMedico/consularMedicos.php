<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../public/css/styles.css" />
    <link rel="stylesheet" href="../../public/css/responsiveConsultar.css" />
    <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
    <title>Consultar Medicos</title>
  </head>
  <body>
    <input type="checkbox" id="check" />
    <label for="check">
      <arial class="fas fa-bars" id="btn">☰</arial>
      <arial class="fas fa-times" id="cancel">☰</arial>
    </label>
    <aside class="sidebar">
      <img src="../../public/img/escu.png" id="doc" width="150px" />
      <header>Administador</header>
      <ul>
        <li>
          <a href="../Home/homeAdmin.php"><i class="fas fa-qrcode"></i>Inicio</a>
        </li>
        <li>
          <a href="../RegistrarMedico/registrarMedicos.php"><i class="fas fa-link"></i>Agregar Médicos</a>
        </li>
        <li>
          <a href="../AdministrarMedico/administrarMedicos.php"><i class="fas fa-stream"></i>Modificar Médicos</a>
        </li>
        <li>
          <a href="../ConsultarMedico/consularMedicos.php"><i class="fas fa-calendar-week"></i>Consultar Médicos</a>
        </li>
        <li>
          <a href="../../modelo/logout.php"><i class="fas fa-calendar-week"></i>Cerrar Sesión</a>
        </li>
      </ul>
    </aside>

    <div class="search">
      <div id="logotipo">
        <h1>Consultar Medicos</h1>
      </div>
      <div id="buscar">
        <label for="buscar1">Digite el nombre del médico a buscar: </label>
        <input type="text" name="buscar1" id="buscar1" />
        <input type="button" value="Buscar" />
      </div>
    </div>
  </body>
</html>
