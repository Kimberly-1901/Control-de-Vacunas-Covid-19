<?php
    function conexion(){
        $mysqli= new mysqli("localhost", "root", "root", "hospital");
        if(mysqli_connect_errno()){
            echo "Este sitio esta presentando problemas";
        }else{
            return $mysqli;
        }
    }
?>
