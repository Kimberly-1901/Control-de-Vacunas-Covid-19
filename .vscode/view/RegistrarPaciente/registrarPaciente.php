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
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../public/css/styles.css" />
    <link rel="stylesheet" href="../../public/css/responsiveRegistrar.css" />
    <link rel="icon" type="favicon/x-icon" href="../../public/img/medico.png" />
    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <title>Registrar Paciente</title>
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
          <a href="../RegistrarPaciente/registrarPaciente.php"
            ><i class="fas fa-link"></i>Agregar Paciente</a
          >
        </li>
        <li>
          <a href="../AdministrarPaciente/administrarPaciente.php"
            ><i class="fas fa-stream"></i>Modificar Paciente</a
          >
        </li>
        <li>
          <a href="../ConsultarPaciente/consultarPaciente.php"
            ><i class="fas fa-calendar-week"></i>Consultar Paciente</a
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
        <h3>Desde esta ventana puede ingresar nuevos Pacientes:</h3>
        <h3 class="bordebajo">Ingrese la informacion del Paciente</h3>
        <div id="forma">
          <img src="../../public/img/pacientes.png" width="500px" />
        </div>

        <form method="POST" id="datosPaciente" action="../../controller/Paciente.php?opc=insert">
          <div class="contentInputs1">
            <div class="inputs">
              <label for="nombre">Nombre Completo: </label>
              <input type="text" name="nombre" id="nombre"  onblur="validarNombre()" required/>
              <label for="cedula">Cédula: </label>
              <input type="text" name="cedula" id="cedula"  onblur="validarCedula()" required/>
              <label for="edad">Edad: </label>
              <input type="text" name="edad" id="edad"  onblur="validarEdad()" required/>

              <label for="riesgo">Nivel de Riesgo: </label>
              <select id="riesgo" name="riesgo">
                <option>Alto</option>
                <option>Medio</option>
                <option>Bajo</option>
              </select>

              <label for="genero">Género: </label>
              <select id="genero" name="genero">
                <option>Masculino</option>
                <option>Femenino</option>
                <option>Otro</option>
              </select>
            </div>

            <div class="inputs">
              <label for="telefono">Teléfono: </label>
              <input type="text" name="telefono" id="telefono" onblur="validarTelefono()" required/>
              <label for="correo">Correo Eléctronico: </label>
              <input type="email" name="correo" id="correo" required onblur="validarEmail()"/>
              <label for="password">Contraseña: </label>
              <input type="text" name="password" id="password" required/>
              <label for="vacuna">Marca de Vacuna: </label>
              <input type="text" name="vacuna" id="vacuna" required/>
              <label for="dosis">Número de dosis: </label>
              <select id="dosis" name="dosis">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
              </select>

            </div>
            <input type="submit" value="Guardar" />
          </div>
        </form>
      </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="registrarPaciente.js"></script>

    <?php
    if(isset($_GET['sweet'])){
        switch($_GET['sweet']){
          case '1':
            ?>
            <script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Paciente ya registrado',
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
              title: 'El paciente ha sido registrado',
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
