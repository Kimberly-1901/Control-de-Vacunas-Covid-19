<?php
    require_once "../config/conexionMysqli.php";
    $conexio = conexion();
    $sql = "SELECT edad,COUNT(edad) FROM paciente WHERE no_dosis <> 0 GROUP BY edad;";
    $result = mysqli_query($conexio,$sql);
    $valoresY = array();//cantidad de pacientes
    $valoresX = array();//edad

    while($ver = mysqli_fetch_row($result)){
        $valoresY[] = $ver[1];//edad
        $valoresX[] = $ver[0];//cantidad de pacientes
    }
     
    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);

?>

<div id="graficaLineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]); 
        }
        return arr;
    }
</script>

<script type="text/javascript">

    datosX = crearCadenaLineal('<?php echo $datosX?>');
    datosY = crearCadenaLineal('<?php echo $datosY?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter', 
        line: {
        color: 'rgba(58,200,225,.5)',
        width: 2
        }
    };

    var layout = {
        title: 'Reporte por edades de pacientes vacunados',
        xaxis: {
            title: 'Edad',
        },
        yaxis:{
            title: 'Cantidad de pacientes'
        }
    };
    var data = [trace1];

    Plotly.newPlot('graficaLineal', data,layout);
</script>