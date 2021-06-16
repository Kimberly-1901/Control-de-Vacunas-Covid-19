<?php
    require_once "../config/conexionMysqli.php";
    $conexio = conexion();
    $sql = "SELECT genero,COUNT(genero) FROM paciente GROUP BY genero;";

    $result = mysqli_query($conexio,$sql);
    $valoresY = array();//cantidad de pacientes por genero
    $valoresX = array();//genero 

    while($ver = mysqli_fetch_row($result)){
        $valoresY[] = $ver[1];//genero 
        $valoresX[] = $ver[0];//cantidad de pacientes por genero
    }
     
    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);
?>

<div id="graficaBarras"></div>

<script type="text/javascript">
    function crearCadenaBarras(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]); 
        }
        return arr;
    }
</script>

<script type="text/javascript">

    datosX = crearCadenaBarras('<?php echo $datosX?>');
    datosY = crearCadenaBarras('<?php echo $datosY?>');

    var data = [
        {
            values: datosY,
            labels: datosX,
            type: 'pie',
        }
    ];

    var layout = {
        title: 'Reporte de vacunados por genero',
        height: 400,
        width: 500
};
    Plotly.newPlot('graficaBarras',data,layout);
</script>
