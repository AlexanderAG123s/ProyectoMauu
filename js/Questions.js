$(document).ready(function() {
    var funcion = '';
    rellenar_tema();
    mostrar_preguntas();
    rellenar_asignaturas();


    $('#form-question').submit((e)=>{
        let question = $('#question').val();
        let answer_1 = $('#answer_f1').val();
        let answer_2 = $('#answer_f2').val();
        let answer_c = $('#answer_c').val();
        let tema = $('#temas_q').val();
        let asignatura = $('#asignaturas_q').val();
        funcion = 'crear_pregunta';

        

          if (question === "" || answer_1 === "" || answer_2 === "" || answer_c === "") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Algo salio mal, Rellene todos los campos",
              footer: '<a href="#">¿Por qué ocurre este error?</a>',
            });
          } else {
            funcion = "crear_pregunta";
            $.post(
              "../controlador/QuestionController.php",
              { funcion, question, answer_1, answer_2, answer_c, tema, asignatura},
              (response) => {
                  console.log(response);
                  
                  
                if (response == "add") {
                  Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Pregunta Registrada Exitosamente, Compruebalo en la Tabla",
                    footer:
                      '<a href=""> Para editarlo haz click aqui</a>',
                  }).then(() => {
                      $('#form-question').trigger('reset');
                    
                  });
                  mostrar_preguntas();
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

    function rellenar_tema() {
      funcion = 'rellenar_tema';
      $.post('../controlador/QuestionController.php', {funcion}, (response)=>{
          console.log(response);
          const temas = JSON.parse(response);
          let template = '';
          temas.forEach(tema => {
              template += `
                  <option value="${tema.id}">${tema.titulo}</option>
              `;
          });
          $('#temas_q').html(template);
          $('#temas_q_e').html(template);

      });
  }
    function rellenar_asignaturas() {
        funcion = 'rellenar_asignaturas';
        $.post('../controlador/QuestionController.php', {funcion}, (response)=>{
          const asignaturas = JSON.parse(response);
            let template = '';
           
            asignaturas.forEach(asignatura => {
                template += `
                    <option value="${asignatura.id}">${asignatura.nombre}</option>
                `
                ;
            });
            $('#asignaturas_q').html(template);
            $('#asignaturas_q_e').html(template);
          })            
    }

    function mostrar_preguntas() {
        funcion = 'mostrar_preguntas';
        $.post('../Controlador/QuestionController.php', {funcion}, (response) =>{
            const preguntas = JSON.parse(response);
            
            let template = '';
            preguntas.forEach((pregunta) => {
                template += `
                    <tr class="table" temaID="${pregunta.id}" nombreTem="${pregunta.nombre}" avatarTem="${pregunta.avatar}" activoTem="${pregunta.activo}">
                        <input type="hidden" id="id_pregunta" style="display:none;" value="${pregunta.id}">
                            <td>${pregunta.id}</td>
                            <td>${pregunta.question}</td>
                            <td>${pregunta.respuesta_c}</td>
                            <td>${pregunta.tema}</td>
                            <td>${pregunta.asignatura}</td>

                            <h1></h1>
                            <td></td>
                
                `;
            });
            $('#preguntas').html(template);
            // <button type="button" data-id="${pregunta.id}" class="edit btn btn-outline-primary mr-2" data-bs-toggle="modal" data-bs-target="#edit-question"><i class="fas fa-pencil"></i></button>
        })
    }

    $(document).on("click", ".edit", (e) => {
        const id_pregunta = $(e.target).closest(".edit").data("id");
        console.log(id_pregunta);
        
    
        funcion = "capturar_pregunta";
        $.post(
          "../controlador/QuestionController.php",
          { funcion, id_pregunta},
          (response) => {
            const pregunta = JSON.parse(response);
            console.log(response);
            
            
            $('#question_e').val(pregunta.question);
            $('#answer_f1_e').val(pregunta.respuesta_1);
            $('#answer_f2_e').val(pregunta.respuesta_2);
            $('#answer_c_e').val(pregunta.respuesta_c);
            $('#temas_q_e').val(pregunta.tema).trigger('changed');
            $('#asignatura_q_e').val(pregunta.asignatura).trigger('changed');
          }
        );
    
        e.preventDefault();
      });

      $("#edit_question").submit((e) => {
        let id_pregunta = $("#id_pregunta").val(); // Obtiene el ID del usuario a editar
        console.log(id_pregunta);
        
        let question_e = $('#question_e').val();
        let answer_f1_e = $('#answer_f1_e').val();
        let answer_f2_e = $('#answer_f2_e').val();
        let answer_c_e = $('#answer_c_e').val();
        let tema_e = $('#temas_q_e').val();
        let asignatura_e = $('#asignaturas_q_e').val();

        console.log(question_e + answer_f1_e + answer_f2_e + answer_c_e + tema_e + asignatura_e);
        

        

    
        funcion = "editar_pregunta";
        $.post(
          "../controlador/QuestionController.php",
          { id_pregunta, question_e, answer_f1_e, answer_f2_e, answer_c_e, tema_e, asignatura_e, funcion },
          (response) => {
            
            if (response == "editado") {
                Swal.fire({
                    icon: "success",
                    title: "Exito!",
                    text: "Usuario Editado Exitosamente, Compruebalo en la Tabla!",
                    footer:
                      '',
                  }).then(() => {
                    $('#edit-question').modal('hide');
                    
                  });
               mostrar_preguntas();
            }
          }
        );
        e.preventDefault();
      });




})