<?php
  require_once("../../config/conexion.php");

  $now = time();

  if($now > $_SESSION['expire']) {
    session_destroy();

    echo "Su sesion a terminado,
    <a href='http://13.59.37.197/ProyectoCovid/index.php'>Necesita Hacer Login</a>";
    exit;
  }
  
  if(isset($_SESSION['id_administrador'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../public/css/styles.css" />
  <link rel="stylesheet" href="../../public/css/responsiveAdministrar.css" />
  <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
  <script src="../../public/js/jquery-3.6.0.min.js"></script>

  <title>Administrar Médicos</title>
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
        <a href="../ConsultarMedico/consultarMedicos.php"><i class="fas fa-calendar-week"></i>Consultar Médicos</a>
      </li>
      <li>
        <a href="../../modelo/logout.php"><i class="fas fa-calendar-week"></i>Cerrar Sesión</a>
      </li>
    </ul>
  </aside>

  <div class="search">
    <div id="logotipo">
      <h1>Administrar Medicos</h1>
    </div>
    <div id="buscar">
      <label for="buscar1">Digite la cédula del médico a buscar: </label>
      <input type="text" name="buscar1" id="buscar1" value="" required/>
      <input type="button" value="Buscar" id="botonBuscar" onclick="Buscar()"/>
    </div>
  </div>


  <div class="contentInputs">
    <h3>Resultado de la búsqueda: </h3>

    <form method="post" autocomplete="off" id="buscarMedico" name="buscarMedico"  action="../../controller/Medico.php?opc=mod_o_eliminar">
      <div class="inputs">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required onblur="validarNombre()"/>
        <label for="cedula">Cédula: </label>
        <input type="text" name="cedula" id="cedula"  onblur="validarCedula()" disabled/>
        <input type="hidden" name="cedula1" id="cedula1"  onblur="validarCedula()" />
        <label for="edad">Edad: </label>
        <input type="text" name="edad" id="edad" required onblur="validarEdad()"/>
        <label for="sedes">Sede: </label>
        <select id="sedes" name="sedes" >
          <option>Alajuela</option>
          <option>Limón</option>
          <option>Cartago</option>
          <option>Heredia</option>
          <option>Puntarenas</option>
          <option>Guanacaste</option>
          <option>San José</option>
        </select>
      </div>

      <div class="inputs">
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos" required onblur="validarApellido()"/>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" required  disabled/>
        <input type="hidden" name="usuario1" id="usuario1" required  />
        <label for="password">Contraseña: </label>
        <input type="text" name="password" id="password" required />
        <label for="especialidades">Especialidad: </label>
        <select id="especialidades" name="especialidades" >
          <option>Cirugía General</option>
          <option>Cirugía Pediátrica</option>
          <option>Cardiología</option>
          <option>Dermatología</option>
          <option>Geriatría</option>
          <option>Ginecología y Obstetricia</option>
          <option>Radiología</option>
        </select>
      </div>
      

  <div id="botones">
    <input type="button" onclick="pregunta()"  value="Modificar"  />
    <input type="button" onclick="pregunta2()" value="Eliminar"/>
  </div>
  </form>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="administrarMedico.js"></script>
</body>

</html>
<?php
  }
  else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>
