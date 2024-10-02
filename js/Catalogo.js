$(document).ready(function (){
    var funcion = '';

    rellenar_tipo();
    mostrar_usuarios();


    $("#register-form").submit((e) => {
        let nombre = $("#nombre").val();
        let clave = $('#clave').val();
        let tipo = $("#tipo_us").val();
        let pass = $('#password').val();     
        let estado = $('#activo').val();   

        
        
    
        if (nombre === "") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Algo salio mal, Rellene todos los campos",
            footer: '<a href="#">¿Por qué ocurre este error?</a>',
          });
        } else {
          funcion = "crear_usuario";
          $.post(
            "../controlador/UsuarioController.php",
            { funcion, nombre, clave, pass, estado ,tipo},
            (response) => {
                console.log(response);
                
                
              if (response == "add") {
                Swal.fire({
                  icon: "success",
                  title: "Exito!",
                  text: "Usuario Registrado Exitosamente, Compruebalo en la Tabla",
                  footer:
                    '<a href=""> Para editarlo haz click aqui</a>',
                }).then(() => {
                    $('#register-form').trigger('reset');
                  
                });
                mostrar_usuarios();
              } else {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Algo salio mal, el usuario ya esta registrado",
                  footer: '<a href="#">¿Por qué ocurre este error?</a>',
                });
              }
            }
          );
        }
        e.preventDefault();
      });


       function rellenar_tipo() {
         funcion = 'rellenar_tipo';
         $.post('../controlador/UsuarioController.php', {funcion}, (response)=>{
            console.log(response);
             const tipos = JSON.parse(response);
             
             
             let template = '';
            
             tipos.forEach(tipo => {
                 template += `
                     <option value="${tipo.id}">${tipo.nombre}</option>
                 `;
             });
             $('#tipo_us').html(template);
             $('#tipo_us_e').html(template);
             
         })
     }

    function mostrar_usuarios() {
        funcion = "buscar_usuario";
        $.post("../controlador/UsuarioController.php", { funcion }, (response) => {
          console.log(response);
            
          const usuarios = JSON.parse(response);
          
          let template = "";
    
          usuarios.forEach((usuario) => {
            template += `
                        <tr class="table" usuarioID="${usuario.id}" Activo="${usuario.activo}">
                        <input type="hidden" id="id_user" style="display:none;" value="${usuario.id}">
                            <td>${usuario.id}</td>
                            <td>${usuario.nombre}</td>
                            <td>${usuario.clave}</td>
                            `
                            if(usuario.estado === 1) {
                              template += `
                                <td>Activo</td>
                              `;
                            }

                            if(usuario.estado === 0) {
                              template += `
                                <td>Inactivo</td>
                              `;
                            }
                            template +=`
                            <td>${usuario.us_tipo}</td>
                            <td>

                             


                            `
                            
                            if(usuario.estado === 1) {
                              template +=
                              `
                              <button type="button" data-id="${usuario.id}" class="edit btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit-user"><i class="fas fa-pencil"></i></button>
                              <button class="delete btn btn-outline-danger ml-2"><i class="fas fa-trash-can"></i></button>`
                            }
                            if(usuario.estado === 0){
                              template +=
                              `<button class="update btn btn-outline-success"><i class="fas fa-check"></i></button>`;
                            }


                            `
                            
                            </td>
                        </tr>
                        `;
          });
          $("#users").html(template);
        });
      }

      $(document).on("click", ".edit", (e) => {
        const id_usuario = $(e.target).closest(".edit").data("id");
        console.log(id_usuario);
    
        funcion = "capturar_usuario";
        $.post(
          "../controlador/UsuarioController.php",
          { funcion, id_usuario },
          (response) => {
            const usuario = JSON.parse(response);
            $("#nombre_e").val(usuario.nombre);
            $("#clave_e").val(usuario.clave);
            $("#tipo_us_e").val(usuario.us_tipo).trigger('change');
            
            // Agrega el ID del usuario a editar en un campo oculto
            $("#id_user").val(id_usuario);
          }
        );
    
        e.preventDefault();
      });

      $("#form_edit").submit((e) => {
        let id_usuario = $("#id_user").val(); // Obtiene el ID del usuario a editar
        let nombre = $("#nombre_e").val();
        let clave = $("#clave_e").val();
        let pass = $('#pass_e').val();
        let tipo = $("#tipo_us_e").val();

    
        funcion = "editar_usuario";
        $.post(
          "../controlador/UsuarioController.php",
          {
            id_usuario,
            funcion,
            nombre,
            clave,
            pass,
            tipo
          },
          (response) => {
            console.log(response);
            
            if (response == "editado") {
                Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Usuario Editado Exitosamente, Compruebalo en la Tabla!",
                    footer:
                      '',
                  }).then(() => {
                    $('#edit-user').modal('hide');
                    
                  });
              mostrar_usuarios();
            }
          }
        );
        e.preventDefault();
      });


      $(document).on("click", ".delete", (e) => {
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr("usuarioID");
        const activo = $(elemento).attr("Activo");


        
        
        funcion = "eliminar_usuario";
    
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger mr-1",
          },
          buttonsStyling: false,
        });
        swalWithBootstrapButtons
          .fire({
            title: "¿Estas Seguro?",
            text: "No podras revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Eliminemos esto!",
            cancelButtonText: "No, Cancela todo!",
            reverseButtons: true,
          })
          .then((result) => {
            if (result.value) {
              $.post(
                "../controlador/UsuarioController.php",
                { activo, id, funcion },
                (response) => {
                  console.log(response);
                  
                  if (response == "delete") {
                    swalWithBootstrapButtons.fire({
                      title: "Eliminado!",
                      text: "El usuario se ha elimiado.",
                      icon: "success",
                    });
                    mostrar_usuarios();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "Error",
                      text:
                        "El Usuario con el id: " +
                        "'" +
                        id +
                        "' " +
                        " No se ha podido eliminar :(",
                      icon: "error",
                    });
                  }
                }
              );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "El usuario con el id: " + id + " se mantiene a salvo :)",
                icon: "error",
              });
            }
          });
        e.preventDefault();
      });

      $('#log-out').submit(e=>{
        Swal.fire({
            title: "¿Realmente quieres salir?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Salir",
            denyButtonText: `No Salir`
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                
              Swal.fire("Saliendo!", "", "success").then(()=>{
                window.location.href = "../index.php";
              });
            } else if (result.isDenied) {
              Swal.fire("Se ha cancelado la Accion", "", "info");
            }
          });
        e.preventDefault();
      })


      $(document).on("click", ".update", (e) => {
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(elemento).attr("usuarioID");
        const activo = $(elemento).attr("Activo");
        
        
        funcion = "habilitar_usuario";
    
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger mr-1",
          },
          buttonsStyling: false,
        });
        swalWithBootstrapButtons
          .fire({
            title: "¿Estas Seguro?",
            text: "No podras revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Activemos al Usuario!",
            cancelButtonText: "No, Cancela todo!",
            reverseButtons: true,
          })
          .then((result) => {
            if (result.value) {
              $.post(
                "../controlador/UsuarioController.php",
                { activo, id, funcion },
                (response) => {
                  console.log(response);
                  
                  if (response == "update") {
                    swalWithBootstrapButtons.fire({
                      title: "Eliminado!",
                      text: "El usuario se ha habilitado.",
                      icon: "success",
                    });
                    mostrar_usuarios();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "Error",
                      text:
                        "El Usuario con el id: " +
                        "'" +
                        id +
                        "' " +
                        " No se ha podido habilitar :(",
                      icon: "error",
                    });
                  }
                }
              );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "El usuario con el id: " + id + " se mantiene a salvo :)",
                icon: "error",
              });
            }
          });
        e.preventDefault();
      });

      
})