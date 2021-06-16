<?php
    require_once "../config/conexionMysqli.php";
    $conexio = conexion();
    $sql = "SELECT riesgo, COUNT(riesgo) FROM paciente GROUP BY riesgo;";

    $result = mysqli_query($conexio,$sql);
    $valoresY = array();//cantidad de pacientes
    $valoresX = array();//tipo de riesgo 

    while($ver = mysqli_fetch_row($result)){
        $valoresY[] = $ver[1];//tipo de riesgo 
        $valoresX[] = $ver[0];//cantidad de pacientes
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
            x: datosX,
            y: datosY,
            type: 'bar',
            marker: {
            color: 'rgba(58,200,225,.5)',
            line: {
                color: 'rgb(8,48,107)',
                width: 1.5
            }

        }
        }
    ];

    var layout = {
        title: 'Reporte de nivel de riesgo',
        font:{
        family: 'Raleway, sans-serif'
        },
        xaxis: {
        tickangle: -45,
        title: "Nivel de riesgo"
        },
        yaxis: {
            title: 'Cantidad de pacientes'
        },
        bargap :0.05
};
    Plotly.newPlot('graficaBarras',data,layout);
</script>