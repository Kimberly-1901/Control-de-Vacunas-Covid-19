<?php
   
        $con = mysqli_connect("localhost", "root", "root", "hospital");
        
        $sql = "SELECT cedula,nombre,correo,genero,edad,telefono,marca_vacuna,no_dosis,riesgo,password FROM paciente";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["cedula"]. "</td><td>" . $row["nombre"] . "</td><td>". $row["correo"]. "</td><td>" . $row["genero"]. "</td><td>" . $row["edad"]. "</td>
            <td>" . $row["telefono"]. "</td><td>" . $row["marca_vacuna"]. "</td><td>" . $row["no_dosis"]. "</td><td>" . $row["riesgo"]. "</td></tr>";
        }
        echo "</table>";
    } else { echo "0 results"; }
    
    


?>