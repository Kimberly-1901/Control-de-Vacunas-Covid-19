

$(document).ready(function(){
  $('#grafica').load('../../modelo/barras.php');
});

window.onload = Buscar();

function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("nombre").value = "";
    document.getElementById("cedula").value = "";
    document.getElementById("correo").value = "";
    document.getElementById("genero").value = "";
    document.getElementById("edad").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("riesgo").value = "";
    document.getElementById("vacuna").value = "";
    document.getElementById("dosis").value = "";
    document.getElementById("riesgo").value = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);

        document.getElementById(
          "cedula").value = myObj[0];

        document.getElementById(
          "nombre").value = myObj[1];

        document.getElementById(
          "correo").value = myObj[2];

        document.getElementById(
          "genero").value = myObj[3];

        document.getElementById(
          "edad").value = myObj[4];


        document.getElementById(
          "telefono").value = myObj[5];


        document.getElementById(
          "vacuna").value = myObj[6];


        document.getElementById(
          "dosis").value = myObj[7];

        document.getElementById(
          "riesgo").value = myObj[8];


      }
    };

    xmlhttp.open("GET", "../../modelo/llenarDatosPaciente.php?buscar1=" + str, true);

    xmlhttp.send();
  }
}
function Buscar(){
    GetDetail(document.getElementById('buscar1').value);
}