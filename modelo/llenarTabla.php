<?php

        $con = mysqli_connect("localhost", "root", "root", "hospital");
        $sql = "SELECT cedula,nombre,apellidos,edad,sede,usuario,password,especialidad FROM medico";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["cedula"]. "</td><td>" . $row["nombre"] . "</td><td>". $row["apellidos"]. "</td><td>" . $row["edad"]. "</td><td>" . $row["sede"]. "</td>
            <td>" . $row["usuario"]. "</td><td>" . $row["especialidad"]. "</td> </tr>";
        }
        echo "</table>";
    } else { echo "0 results"; }
    
    


?>