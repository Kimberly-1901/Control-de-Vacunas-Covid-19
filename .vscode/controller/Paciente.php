<?php
    require_once("../config/conexion.php");
    require_once("../modelo/paciente.php");

    $paciente = new Paciente();

    switch($_GET['opc']){
        case 'insert':
            if($paciente->buscarRepetido($_POST['correo']) == false && $paciente->buscarRepetidoCedula($_POST['cedula']) == false){
                $paciente->insertar_paciente($_POST['cedula'],$_POST['nombre'],$_POST['edad'],$_POST['riesgo'],$_POST['genero'],$_POST['telefono']
                ,$_POST['correo'],$_POST['password'],$_POST['vacuna'],$_POST['dosis']);
                header("Location:".Conectar::ruta()."view/RegistrarPaciente/registrarPaciente.php?sweet=2");
            }
            else{
                header("Location:".Conectar::ruta()."view/RegistrarPaciente/registrarPaciente.php?sweet=1");
            }
            break;

        case 'mod_o_eliminar':
            if(isset($_POST['modificar'])){
                if($paciente->buscarRepetido($_POST['correo1']) == true && $paciente->buscarRepetidoCedula($_POST['cedula1']) == true){
                    $paciente->actualizarPaciente($_POST['cedula1'],$_POST['nombre'],$_POST['edad'],$_POST['riesgo'],$_POST['genero'],$_POST['telefono']
                    ,$_POST['correo1'],$_POST['password'],$_POST['vacuna'],$_POST['dosis']);
                    header("Location:".Conectar::ruta()."view/AdministrarPaciente/administrarPaciente.php");
                }
                else{
                    header("Location:".Conectar::ruta()."view/AdministrarPaciente/administrarPaciente.php");
                }
                break;
            }
            else if(isset($_POST['eliminar'])){
                if($paciente->buscarRepetido($_POST['correo1']) == true && $paciente->buscarRepetidoCedula($_POST['cedula1']) == true){
                    $paciente->borrar_paciente($_POST['cedula1']);
                    header("Location:".Conectar::ruta()."view/AdministrarPaciente/administrarPaciente.php");
                }
                else{
                    header("Location:".Conectar::ruta()."view/AdministrarPaciente/administrarPaciente.php");
                }
                break;
            }
    }
?>