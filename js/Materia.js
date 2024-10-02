$(document).ready(function() {
    var funcion = '';
    mostrar_materias();

    $('#form-materia').submit((e) =>{
        let nombre = $('#nombre_m').val();

        if (nombre === "") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Algo salio mal, Rellene todos los campos",
              footer: '<a href="#">¿Por qué ocurre este error?</a>',
            });
          } else {
            funcion = "crear_materia";
            $.post('../Controlador/MateriaController.php', {funcion, nombre}, (response) =>{
                  console.log(response);
                  
                  
                if (response == "add") {
                  Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Usuario Registrado Exitosamente, Compruebalo en la Tabla",
                    footer:
                      '<a href=""> Para editarlo haz click aqui</a>',
                  }).then(() => {
                      $('#form-materia').trigger('reset');
                    
                  });
                  mostrar_materias();
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

        e.preventDefault();
    })

    function mostrar_materias() {
        funcion = 'mostrar_materias';
        $.post('../Controlador/MateriaController.php', {funcion}, (response) =>{
            console.log(response);
            const materias = JSON.parse(response);
            
            let template = '';
            materias.forEach((materia) => {
                template += `
                    <tr class="table" materiaID="${materia.id}" nombreMat="${materia.nombre}" avatarMat="${materia.avatar}" activoMat="${materia.activo}">
                        <input type="hidden" id="id_materia" style="display:none;" value="${materia.id}">
                            <td>
                                <img src="${materia.avatar}" class="text-center img-fluid rounded" width = '60' heigth = '60'>
                            </td>
                            <td>${materia.id}</td>
                            <td>${materia.nombre}</td>
                            `
                            if(materia.activo === 0)
                               {
                              template += `
                                <td>Activo</td>
                              `;
                            }

                            if(materia.activo === 1) {
                              template += `
                                <td>Inactivo</td>
                              `;
                            }

                            template += `
                            <h1></h1>
                            <td>

                            

                             `
                            
                            if(materia.activo === 0) {
                              template +=
                              `
                              <button type="button" data-id="${materia.id}" class="edit btn btn-outline-primary mr-2" data-bs-toggle="modal" data-bs-target="#edit-materia"><i class="fas fa-pencil"></i></button>
                              <button type="button" data-id="${materia.id}" class="avatar btn btn-outline-info mr-2" data-bs-toggle="modal" data-bs-target="#cambiologo"><i class="fas fa-image"></i></button>
                              <button type="button" data-id="${materia.id}" class="delete btn btn-outline-danger"><i class="fas fa-trash-can"></i></button>`;
                            }
                            if(materia.activo === 1){
                              template +=
                              `
                              
                              <button type="button" title="Habilitar" data-id="${materia.id}" class="update btn btn-outline-success"><i class="fas fa-check"></i></button>`;
                            }


                            `

                             

                
                `;
            });
            $('#materias').html(template);
        })
    }

    $(document).on("click", ".edit", (e) => {
        const id_materia = $(e.target).closest(".edit").data("id");
        console.log(id_materia);
    
        funcion = "capturar_materia";
        $.post(
          "../controlador/MateriaController.php",
          { funcion, id_materia },
          (response) => {
            const materia = JSON.parse(response);
            $("#nombre_e").val(materia.nombre);
            $("#id_materia").val(id_materia);
          }
        );
    
        e.preventDefault();
      });

      $("#form_edit").submit((e) => {
        let id_materia = $("#id_materia").val(); // Obtiene el ID del usuario a editar
        console.log(id_materia);
        
        let nombre = $("#nombre_e").val();

    
        funcion = "editar_materia";
        $.post(
          "../controlador/MateriaController.php",
          { id_materia, nombre , funcion },
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
                    $('#edit-materia').modal('hide');
                    
                  });
              mostrar_materias();
            }
          }
        );
        e.preventDefault();
      });



      $(document).on("click", ".avatar", (e) => {
        funcion = 'cambiar_logo';
        const id_materia = $(e.target).closest(".avatar").data("id");
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const nombre = $(elemento).attr('nombreMat');
        const avatar = $(elemento).attr('avatarMat');

        $('#logoactual').attr('src', avatar);
        $('#nombre_logo').html(nombre);
        $('#funcion').val(funcion);
        $('#id_logo_mat').val(id_materia);
       })
    
       $('#form-logo').submit(e=>{
        let formData = new FormData($('#form-logo')[0]);
        $.ajax({
            url:'../controlador/MateriaController.php',
            type: 'POST',
            data:formData,
            cache:false,
            processData: false,
            contentType: false
        }).done(function(response){
            console.log(response);
            
           const json = JSON.parse(response);
            if(json.alert == 'edit') {
                $('#logoactual').attr('src', json.ruta);
                $('#edit').hide('slow');
                $('#edit').show(1000);
                $('#edit').hide(2000);
                $('#form-logo').trigger('reset');
                mostrar_materias();
            } else {
                $('#noedit').hide('slow');
                $('#noedit').show(1000);
                $('#noedit').hide(2000);
                $('#form-logo').trigger('reset');
            }
        });
        e.preventDefault();
        
        
        
      });

      $(document).on("click", ".delete", (e) =>{
        const id_materia = $(e.target).closest(".delete").data("id");
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        const activo = $(elemento).attr("activoMat");
        funcion = "deshabilitar_materia";
    
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
            confirmButtonText: "Si, Deshabilita esto!",
            cancelButtonText: "No, Cancela todo!",
            reverseButtons: true,
          })
          .then((result) => {
            if (result.value) {
              $.post(
                "../controlador/MateriaController.php",
                { id_materia, funcion },
                (response) => {
                  console.log(response);
                  
                  if (response == "inhabilitado") {
                    swalWithBootstrapButtons.fire({
                      title: "Eliminado!",
                      text: "La materia se ha deshabilitado.",
                      icon: "success",
                    });
                    mostrar_materias();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "Error",
                      text:
                        "La materia con matricula: " +
                        "'" +
                        id_materia +
                        "' " +
                        " No se ha podido deshabilitar :(",
                      icon: "error",
                    });
                  }
                }
              );
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "La materia con la matricula: " + id_materia + " se mantiene a salvo :)",
                icon: "error",
              });
            }
          });
        e.preventDefault();
      })

      $(document).on("click", ".update", (e) => {
        const id_materia = $(e.target).closest(".update").data("id");
        
        
        funcion = "habilitar_materia";
    
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
            confirmButtonText: "Si, Activemos la Materia!",
            cancelButtonText: "No, Cancela todo!",
            reverseButtons: true,
          })
          .then((result) => {
            if (result.value) {
              $.post(
                "../controlador/MateriaController.php",
                { id_materia, funcion },
                (response) => {
                  console.log(response);
                  
                  if (response == "habilitado") {
                    swalWithBootstrapButtons.fire({
                      title: "Eliminado!",
                      text: "La materia se ha habilitado.",
                      icon: "success",
                    });
                    mostrar_materias();
                  } else {
                    swalWithBootstrapButtons.fire({
                      title: "Error",
                      text:
                        "La materia con la matricula: " +
                        "'" +
                        id_materia +
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
                text: "La materia con la matricula: " + id_materia + " se mantiene a salvo :)",
                icon: "error",
              });
            }
          });
        e.preventDefault();
      });
    
    

})