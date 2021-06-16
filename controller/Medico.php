<?php
    require_once("../config/conexion.php");
    require_once("../modelo/medico.php");

    $medico = new Medico();

    switch($_GET['opc']){
        case 'insert':
            if($medico->buscarRepetido($_POST['usuario']) == false && $medico->buscarRepetidoCedula($_POST['cedula']) == false){
                $medico->insertar_medico($_POST['cedula'],$_POST['nombre'],$_POST['apellidos'],$_POST['edad'],$_POST['sedes'],$_POST['usuario'],$_POST['password'],$_POST['especialidades']);
                header("Location:".Conectar::ruta()."view/RegistrarMedico/registrarMedicos.php?sweet=2");
            }
            else{
                header("Location:".Conectar::ruta()."view/RegistrarMedico/registrarMedicos.php?sweet=1");
            }
            break;

        case 'buscar':
            $cedula = $_POST['buscar1'];
            header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php");
            return $datos = $medico->buscarMedico($cedula);

        case 'mod_o_eliminar':
            if(isset($_POST['modificar'])){
                if($medico->buscarRepetido($_POST['usuario1']) == true && $medico->buscarRepetidoCedula($_POST['cedula1']) == true){
                    $medico->actualizarMedico($_POST['cedula1'],$_POST['nombre'],$_POST['apellidos'],$_POST['edad'],$_POST['sedes'],$_POST['usuario1'],$_POST['password'],$_POST['especialidades'],$_POST['especialidades']);
                    header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php");
                }
                else{
                    header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php");
                }
                break;
            }
            else if(isset($_POST['eliminar'])){
                if($medico->buscarRepetido($_POST['usuario1']) == true && $medico->buscarRepetidoCedula($_POST['cedula1']) == true){
                    $medico->borrar_medico($_POST['cedula1']);
                    header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php");
                }
                else{
                    header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php");
                }
                break;
            }
    }
?>