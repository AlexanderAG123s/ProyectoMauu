$(document).ready(function(){
    var funcion = '';
    rellenar_materia();
    mostrar_temas();
    rellenar_parcial();
    rellenar_semestre();


    $('#form-materia').submit((e) =>{
        let titulo = $('#titulo_t').val();
        console.log(titulo);
        
        let materia = $('#materia').val();
        let parcial = $('#parcial').val();
        let semestre = $('#semestre').val();
        

        if (titulo === "") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Algo salio mal, Rellene todos los campos",
              footer: '<a href="#">¿Por qué ocurre este error?</a>',
            });
          } else {
            funcion = "crear_tema";
            $.post('../Controlador/TemarioController.php', {funcion, materia, parcial, semestre, titulo}, (response) =>{
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
                  mostrar_temas();
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
    })



    function rellenar_materia() {
        funcion = 'rellenar_materia';
        $.post('../controlador/TemarioController.php', {funcion}, (response)=>{
           console.log(response);
            const materias = JSON.parse(response);
            
            
            let template = '';
           
            materias.forEach(materia => {
                template += `
                    <option value="${materia.id}">${materia.nombre}</option>
                `;
            });
            $('#materia').html(template);
            $('#materia_e').html(template);
            
        })
    }

    function rellenar_parcial() {
      funcion = 'rellenar_parcial';
      $.post('../controlador/TemarioController.php', {funcion}, (response)=>{
         console.log(response);
          const parciales = JSON.parse(response);
          
          
          let template = '';
         
          parciales.forEach(parcial => {
              template += `
                  <option value="${parcial.id}">${parcial.descripcion}</option>
              `;
          });
          $('#parcial').html(template);
          $('#parcial_e').html(template);
          
      })
  }

  function rellenar_semestre() {
    funcion = 'rellenar_semestre';
    $.post('../controlador/TemarioController.php', {funcion}, (response)=>{
      console.log(response);
      console.log(response);
      const semestres = JSON.parse(response);
      
      
      let template = '';
     
      semestres.forEach(semestre => {
          template += `
              <option value="${semestre.id}">${semestre.descripcion}</option>
          `;
      });
      $('#semestre').html(template);
      $('#semestre_e').html(template);
    })
  }

    function mostrar_temas() {
        funcion = 'mostrar_temas';
        $.post('../controlador/TemarioController.php', {funcion}, (response)=>{
            console.log(response);
            
            const temas = JSON.parse(response);
            
            let template = '';
            temas.forEach((tema) => {
                template += `
                    <tr class="table" temaID="${tema.id}">
                        <input type="hidden" id="id_tema" style="display:none;" value="${tema.id}">
                            <td>${tema.id}</td>
                            <td>${tema.titulo}</td>
                            <td>${tema.materia}</td>
                            <td>${tema.parcial}</td>
                            
                            

                            <td>
                              <button type="button" data-id="${tema.id}" class="edit btn btn-outline-primary mr-2" data-bs-toggle="modal" data-bs-target="#edit-materia"><i class="fas fa-pencil"></i></button>
                            </td>


                
                `;
            });
            $('#temas').html(template);
        })
    }

    $(document).on("click", ".edit", (e) => {
        const id_tema = $(e.target).closest(".edit").data("id");
        console.log(id_tema);
    
        funcion = "capturar_tema";
        $.post(
          "../controlador/TemarioController.php",
          { funcion, id_tema },
          (response) => {
            console.log(response);
            const tema = JSON.parse(response);
            
            $("#titulo_e").val(tema.titulo);
            $('#materia_e').val(tema.materia).trigger('change');
            $('#parcial_e').val(tema.parcial).trigger('change');
            $("#semestre_e").val(tema.semestre).trigger('change');
            $("#id_tema").val(id_tema);
          }
        );
    
        e.preventDefault();
      }); 

      $("#form_edit").submit((e) => {
        let id_tema = $("#id_tema").val(); // Obtiene el ID del usuario a editar
        console.log(id_tema);
        
        let titulo = $("#titulo_e").val();
        let materia = $('#materia_e').val();
        let parcial = $('#parcial_e').val();
        let semestre = $('#semestre_e').val();

        console.log(materia);
        

    
        funcion = "editar_tema";
        $.post(
          "../controlador/TemarioController.php",
          { id_tema, titulo, parcial, materia, semestre , funcion },
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
              mostrar_temas();
            }
          }
        );
        e.preventDefault();
      });

})


