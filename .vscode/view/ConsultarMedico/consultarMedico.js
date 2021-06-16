
function GetDetail(str) {
    if (str.length == 0) {
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 &&  this.status == 200) {
                var myObj = JSON.parse(this.responseText);

                document.getElementById
                    ("keywords").value = myObj[0];
                  
                document.getElementById(
                    "nombre").value = myObj[1];

                document.getElementById(
                    "apellidos").value = myObj[2];

                document.getElementById(
                    "edad").value = myObj[3];

                $("#sedes").val(myObj[4]);
                $('#sedes').change();

                document.getElementById(
                    "usuario").value = myObj[5];

                document.getElementById(
                    "password").value = myObj[6];

                $("#especialidades").val(myObj[7]);
                $('#especialidades').change();
            }
        };

        xmlhttp.open("GET", "../../modelo/llenarDatos.php?buscar1=" + str, true);
          
        xmlhttp.send();
    }
}

function Buscar(){
    GetDetail(document.getElementById('buscar1').value);
}

function mostrarAlerta(){

    Swal.fire({
        title: 'Esta seguro que desea modificar el Medico?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Modificalo'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Modificado!',
            'El medico ha sido modificado.',
            'success'
          )
        }
      })
}