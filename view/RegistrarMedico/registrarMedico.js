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

function validarUsuario(){



}
  