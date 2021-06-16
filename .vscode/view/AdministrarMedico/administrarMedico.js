
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("nombre").value = "";
        document.getElementById("cedula").value = "";
        document.getElementById("edad").value = "";
        document.getElementById("sedes").value = "";
        document.getElementById("apellidos").value = "";
        document.getElementById("usuario").value = "";
        document.getElementById("password").value = "";
        document.getElementById("especialidades").value = "";
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 &&  this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                  
                document.getElementById
                    ("cedula").value = myObj[0];

                document.getElementById
                    ("cedula1").value = myObj[0];
                  
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
                    "usuario1").value = myObj[5];

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

function validarNombre(){

    let x = document.getElementById("nombre").value;

    let patron = /^[a-zA-Z ]+$/;

    if(x.search(patron)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite un nombre valido',
            showConfirmButton: false,
            timer: 1500
          })

          document.getElementById("nombre").value="";
          return false;
    }else{

        return true;
    }
    
}

function validarApellido(){

    let x = document.getElementById("apellidos").value;

    let patron = /^[a-zA-Z ]+$/;

    if(x.search(patron)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite un apellido valido',
            showConfirmButton: false,
            timer: 1500
          })

          document.getElementById("apellidos").value="";
          return false;
    }else{

        return true;
    }
    
}

function validarCedula() {

    var ced = document.getElementById("cedula").value;
  
    if (ced.length != 9 || ced.length == 0 || isNaN(ced)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite una cedula valida',
            showConfirmButton: false,
            timer: 1500
          })

            document.getElementById("cedula").value="";
            return false;
          
    }else{

        return true;
  }
}

function validarEdad() {

    var edad = document.getElementById("edad").value;
  
    if (edad.length == 0 || isNaN(edad)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite una edad valida',
            showConfirmButton: false,
            timer: 1500
          })

          document.getElementById("edad").value="";
          return false;
    }else{

        return true;
  }
}

function pregunta(){

    if(document.getElementById('eliminar') != null){
        let input = document.getElementById('eliminar');
        let padre = input.parentNode;
        padre.removeChild(input);
    }

    if(validarNombre() == true && validarCedula() && validarEdad() && validarApellido()){
        let input = document.createElement('input');
        input.setAttribute("name","modificar");
        input.setAttribute("type","hidden");
        input.setAttribute("id","modificar");
        document.buscarMedico.appendChild(input);
    
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
    
                setTimeout(success,1500);
                
            }
          })
    }

    
}

function success(){
    document.buscarMedico.submit();
}

function pregunta2(){

   if(document.getElementById('modificar') != null){
        let input = document.getElementById('modificar');
        let padre = input.parentNode;
        padre.removeChild(input);
    }

    if(validarNombre() == true && validarCedula() && validarEdad() && validarApellido()){

        let input = document.createElement('input');
        input.setAttribute("name","eliminar");
        input.setAttribute("type","hidden");
        input.setAttribute("id","eliminar");
        document.buscarMedico.appendChild(input);   

        Swal.fire({
            title: 'Esta seguro que desea eliminar el Medico?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminalo'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El medico ha sido eliminado.',
                    'success'
                )

                setTimeout(success,1500);
                
            }
        })
    }
}