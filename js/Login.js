$(document).ready(function () {
  var funcion = "";
  $("#form-login").submit((e) => {
  
  let clave = $('#usuario_l').val();
  let pass = $('#pass_l').val();

    funcion = "Loguearse";

    $.post("controlador/LoginController.php", {funcion, clave, pass}, (response) => {
      console.log(response);
     
        if(clave === '' || pass === '') {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Algo salio mal!, Rellene todos los campos",
            footer: '<a href="#">Contacta con un Administrador</a>'
          });
        } else if(response == "login") {

          funcion = 'obtener_tipo';

          
              $.post("controlador/UsuarioController.php", {funcion, clave, pass}, (response) =>{
                console.log(response);
                
                  const tipos = JSON.parse(response);
                  $('#id_usuario').val(tipos.us_tipo);

                  if(tipos.estado === 1) {
                    Swal.fire({
                      icon: "success",
                      title: "Exito!",
                      text: "Se ha iniciado sesion correctamente!, Bienvenido: " + tipos.nombre,
                      footer: '<a href="#"></a>'
                    }).then(()=>{
                        if(tipos.us_tipo === 1) {
                          window.location.href = "vistas/adm_inicio.php";
                        }
                        if(tipos.us_tipo === 2) {
                          window.location.href = "vistas/adm_inicio.php";
                        }
                      
                    });
                  } else if(tipos.estado === 0){
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Se ha producido un error, Usuario Inactivo",
                      footer: '<a href="#">Contacta con un Administrador</a>'
                    });
                  }
                  
                  
              })

          
          
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Se ha producido un error, Usuario o Contraseña Incorrectos",
            footer: '<a href="#">Contacta con un Administrador</a>'
          });
        }
    })
    e.preventDefault();
  });
});