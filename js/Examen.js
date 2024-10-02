$(document).ready(function() {
    var funcion = '';
    rellenar_materia();
    rellenar_parcial();

    
    
    
    $('#form-question').submit(e=>{
        let consulta = $('#asignatura_e').val();
        let parcial = $('#parcial_e').val();
        
        funcion = 'generar_examen';
        
        // Create an array to store the checked values
        
        const checkedValues = [];
        const checkedDataIds = [];

        $('#checks input[type="checkbox"]:checked').each(function() {
        checkedValues.push($(this).val());
        checkedDataIds.push($(this).attr('data-id'));
        });

        console.log(checkedValues);
        console.log(checkedDataIds);


    $.ajax({
        type: 'POST',
        url: '../Controlador/ExamenController.php',
        data: { 
            funcion: encodeURIComponent(funcion), 
            checkedDataIds: checkedDataIds,
            consulta: consulta,
            parcial: parcial
        }, 
        xhrFields: {
            responseType: 'blob'
        },
        contentType: 'application/x-www-form-urlencoded; charset=utf8mb4_general_ci', 
        dataType: 'binary', 
        success: (response) => {
            console.log(response);
            
            const url = URL.createObjectURL(response);
            
            window.open(url, '_blank');
            
        }
    });
    e.preventDefault();
})


    $('#form-question_r').submit(e=>{
        let consulta = $('#asignatura_e_r').val();
        let parcial = $('parcial_e_r').val();
        
        

        funcion = 'generar_examen_r';


        $.ajax({
            type: 'POST',
            url: '../Controlador/ExamenController.php',
            data: { 
                funcion: encodeURIComponent(funcion), 
                consulta: consulta,
                parcial: parcial
            }, 
            xhrFields: {
                responseType: 'blob'
            },
            contentType: 'application/x-www-form-urlencoded; charset=utf8mb4_general_ci', 
            dataType: 'binary', 
            success: (response) => {
                console.log(response);
                
                const url = URL.createObjectURL(response);
                
                window.open(url, '_blank');
                
            }
        });
        e.preventDefault();
    })

    $(document).on('click', '.refresh', (e) => {
            let consulta = $('#asignatura_e').val();
            let parcial = $('#parcial_e').val();
            rellenar_check(consulta, parcial);
    });

    function rellenar_check(consulta, parcial) {
    funcion = 'rellenar_check';
    $.post('../Controlador/ExamenController.php', {funcion, consulta, parcial}, (response) => {
        const checks = JSON.parse(response);
        let checkboxId = 0;
        
        if (checks.length === 0) {
            $('#warning').hide('slow');
            $('#warning').show(1000);
            $('#warning').hide(2000);
            $('#form-question').trigger('reset'); // Aqui se reiniciara el Form para poder volver a hacerlo
        } else {
            let template = '';
            checks.forEach(check => {
                template += `
                <div class="form-group ml-4">
                
                    <input class="form-check-input" value="${check.id}" type="checkbox" data-id="${check.id}" id="${check.id}">
                    <label class="form-check-label" for="${check.id}">
                    `
                    template +=
                    `
                    ${check.titulo}
                    </label>
                </div>
                `;
            });
            
            
            $('#checks').html(template);

           $('#checks .form-check-input').each(function() {
            let checkboxId = $(this).attr('data-id');
            globalCheckboxId = checkboxId;
            console.log(checkboxId);
});
        }
    })
}

function rellenar_parcial() {
    funcion = 'rellenar_parcial';
    $.post('../Controlador/TemarioController.php', {funcion}, (response) => {
        console.log(response);
        
        const parciales = JSON.parse(response);
        let template = '';
        parciales.forEach(parcial => {
            template += `
                <option value="${parcial.id}">${parcial.descripcion}</option>
            `;
        });
        $('#parcial_e').html(template);
        $('#parcial_e_r').html(template);
    });
}

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
            $('#asignatura_e').html(template);
            $('#asignatura_e_r').html(template);

        })
    }



            
        
})