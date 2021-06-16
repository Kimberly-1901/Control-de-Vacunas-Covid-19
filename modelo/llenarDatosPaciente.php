<?php

    $con = mysqli_connect("localhost", "root", "root", "hospital"); 

    if(isset($_REQUEST['buscar1'])){
        $buscar1 = $_REQUEST['buscar1'];
        if ($buscar1 !== "") {
            $query = mysqli_query($con, "SELECT cedula,nombre,correo,genero,edad,telefono,marca_vacuna,no_dosis,riesgo,password FROM paciente WHERE cedula='$buscar1'");

            $resultado = mysqli_fetch_array($query);

            $cedula = $resultado["nombre"];
            $nombre = $resultado["cedula"];
            $correo = $resultado['correo'];
            $genero = $resultado['genero'];
            $edad = $resultado['edad'];
            $telefono = $resultado['telefono'];
            $marca_vacuna = $resultado['marca_vacuna'];
            $no_dosis = $resultado['no_dosis'];
            $riesgo = $resultado['riesgo'];
            $password = $resultado['password'];
        }

        $result = array("$nombre", "$cedula","$correo","$genero","$edad","$telefono","$marca_vacuna","$no_dosis","$riesgo","$password");

        $myJSON = json_encode($result);
        echo $myJSON;
    }

?>
