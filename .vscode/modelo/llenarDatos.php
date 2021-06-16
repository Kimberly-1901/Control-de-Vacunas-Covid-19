<?php

    $con = mysqli_connect("localhost", "root", "root", "hospital"); 
    

    if(isset($_REQUEST['buscar1'])){
        $buscar1 = $_REQUEST['buscar1'];
        if ($buscar1 !== "") {
            $query = mysqli_query($con, "SELECT cedula,nombre,apellidos,edad,sede,usuario,password,especialidad FROM medico WHERE cedula='$buscar1'");

            $resultado = mysqli_fetch_array($query);
            $cedula = "";
            $cedula = $resultado["cedula"];
            $nombre = $resultado["nombre"];
            $apellidos = $resultado["apellidos"];
            $edad = $resultado["edad"];
            $sede = $resultado["sede"];
            $usuario = $resultado["usuario"];
            $password = $resultado["password"];
            $especialidad = $resultado["especialidad"];

            if($cedula == ""){
                header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php?no");
            }
        }
        else{
            header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php?no");
        }
      
        $result = array("$cedula", "$nombre","$apellidos","$edad","$sede","$usuario","$password","$especialidad");
      
        $myJSON = json_encode($result);
        echo $myJSON;
    }else{
        header("Location:".Conectar::ruta()."view/AdministrarMedico/administrarMedicos.php?no=1");
    }
    
    
    
    

?>