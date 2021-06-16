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
    <link rel="stylesheet" href="../../public/css/responsiveRegistrar.css" />
    <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
    <title>Registrar Médicos</title>
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
          <a href="../RegistrarMedico/registrarMedicos.php"
            ><i class="fas fa-link"></i>Agregar Médicos</a
          >
        </li>
        <li>
          <a href="../AdministrarMedico/administrarMedicos.php"
            ><i class="fas fa-stream"></i>Modificar Médicos</a
          >
        </li>
        <li>
          <a href="../ConsultarMedico/consultarMedicos.php"
            ><i class="fas fa-calendar-week"></i>Consultar Médicos</a
          >
        </li>
        <li>
          <a href="../../modelo/logout.php"
            ><i class="fas fa-calendar-week"></i>Cerrar Sesión</a
          >
        </li>
      </ul>
    </aside>

    <div class="search">
      <div id="registro1">
        <h3>Desde esta ventana puede ingresar nuevos Médicos:</h3>
        <h3 class="bordebajo">Ingrese la informacion del Médico</h3>
        <div id="forma">
          <img src="../../public/img/medico3.png" />
        </div>

        <form method="POST" id="datosMedicos" action="../../controller/Medico.php?opc=insert">
          <div class="contentInputs1">
            <div class="inputs">
              <label for="nombre">Nombre: </label>
              <input type="text" name="nombre" id="nombre" required onblur="validarNombre()" />
              <label for="cedula">Cédula: </label>
              <input type="text" name="cedula" id="cedula" required onblur="validarCedula()" />
              <label for="edad">Edad: </label>
              <input type="text" name="edad" id="edad" required onblur="validarEdad()"/>
              <label for="sedes">Sede: </label>
              <select id="sedes" name="sedes">
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
              <input type="text" name="apellidos" id="apellidos" required onblur="validarApellido()" />
              <label for="usuario">Usuario: </label>
              <input type="text" name="usuario" id="usuario" required/>
              <label for="password">Contraseña: </label>
              <input type="text" name="password" id="password" required/>
              <label for="especialidad">Especialidad: </label>

              <select id="especialidades" name="especialidades">
                <option>Cirugía General</option>
                <option>Cirugía Pediátrica</option>
                <option>Cardiología</option>
                <option>Dermatología</option>
                <option>Geriatría</option>
                <option>Ginecología y Obstetricia</option>
                <option>Radiología</option>
              </select>
            </div>
            <input type="submit" value="Guardar" />
          </div>
        </form>
      </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="registrarMedico.js"></script>

    <?php
    if(isset($_GET['sweet'])){
        switch($_GET['sweet']){
          case '1':
            ?>
            <script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'El nombre de usuario o cédula ya existe',
              showConfirmButton: false,
              timer: 1500
            })
            </script>
            <?php
            break;
          case '2':
            ?>
            <script>
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'El medico ha sido registrado',
              showConfirmButton: false,
              timer: 1500
            })
            </script>
            <?php
            break;
        }
      }
  ?>
  </body>
</html>

<?php
  }
  else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>
