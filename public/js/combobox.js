$('#combobox_cod_op').change(function() {//ORDEN PEDIDO - CURSO
    let selectOption = $( 'select[name="cod_op"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="cod_curso"] option').remove();
    $('select[name="cod_curso"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el curso del ciclo académico'
    }));
    if(selectOption!=""){
        $.ajax({ 
            url: url+"laravel/op/cursodisponible/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_curso"] option').remove();
                $('select[name="cod_curso"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar el curso del ciclo académicoo'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_curso"]').append($('<option>', { 
                            value: response['cod_curso'],
                            text : response['cod_curso']+": "+response['descripcion']
                        }));
                    });
                }else{
                    alert("Se presento el siguiente problema: El ciclo seleccionado ya no tiene cursos disponibles para crear");
                }
                
            }
        });
    }
});
$('#combobox_cod_facultad').change(function() {//FACULTAD - CURSO
    let selectOption = $( 'select[name="cod_facultad"] option:selected' ).data("facultad");
    const url = $('#url').val();
    $('select[name="cod_curso"] option').remove();
    $('select[name="cod_curso"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar un curso'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/facultad/curso/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_curso"] option').remove();
                $('select[name="cod_curso"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar un curso'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_curso"]').append($('<option>', { 
                            value: response['cod_curso'],
                            text : response['cod_curso']+": "+response['descripcion']
                        }));
                    });
                }else{
                    alert("La facultad seleccionada aun no tiene cursos asignados");
                }
                
            }
        });
    }
});
$('#combobox_cod_op_ocurso').change(function() {//ORDEN PEDIDO - OCURSO
    let selectOption = $( 'select[name="cod_op"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="cod_ocurso"] option').remove();
    $('select[name="cod_ocurso"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el curso del ciclo académico'
    }));

    $('select[name="cod_oseccion"] option').remove();
    $('select[name="cod_oseccion"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar la sección'
    }));

    $('select[name="email"] option').remove();
    $('select[name="email"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el usuario'
    }));
    if(selectOption!=""){
        $.ajax({ 
            url: url+"laravel/op/ocurso/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_ocurso"] option').remove();
                $('select[name="cod_ocurso"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar el curso del ciclo académico'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_ocurso"]').append($('<option>', { 
                            value: response['cod_ocurso'],
                            text : response['cod_curso']+": "+response['descripcion']
                        }));
                    });
                }else{
                    alert("Se presento el siguiente problema: El ciclo seleccionado no cuenta con cursos");
                }
                
            }
        });
    }
});
$('#combobox_cod_ocurso').change(function() {//OCURSO - SECCION
    let selectOption = $( 'select[name="cod_ocurso"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="cod_seccion"] option').remove();
    $('select[name="cod_seccion"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar la sección'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/ocurso/seccion/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_seccion"] option').remove();
                $('select[name="cod_seccion"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar la sección'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_seccion"]').append($('<option>', { 
                            value: response['cod_seccion'],
                            text : 'Sección '+response['cod_seccion']
                        }));
                    });
                }else{
                    alert("El curso seleccionado ya no tiene secciones disponibles para asignar");
                }
                
            }
        });
    }
});

$('#combobox_cod_ocurso_oseccion').change(function() {//OCURSO - OSECCION
    let selectOption = $( 'select[name="cod_ocurso"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="cod_oseccion"] option').remove();
    $('select[name="cod_oseccion"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar la sección'
    }));

    $('select[name="email"] option').remove();
    $('select[name="email"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el usuario'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/ocurso/oseccion/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_oseccion"] option').remove();
                $('select[name="cod_oseccion"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar la sección'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_oseccion"]').append($('<option>', { 
                            value: response['cod_oseccion'],
                            text : 'Sección '+response['cod_seccion']
                        }));
                    });
                }else{
                    alert("El curso seleccionado ya no tiene secciones disponibles para asignar");
                }
                
            }
        });
    }
});

$('#combobox_cod_oseccion_email').change(function() {//OSECCION - EMAIL
    let selectOption = $( 'select[name="cod_oseccion"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="email"] option').remove();
    $('select[name="email"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el usuario'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/oseccion/email/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="email"] option').remove();
                $('select[name="email"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar el usuario'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="email"]').append($('<option>', { 
                            value: response['email'],
                            text : response['email']
                        }));
                    });
                }else{
                    alert("La sección ya tiene a todos los alumnos disponibles asignados");
                }
                
            }
        });
    }
});

$('#combobox_cod_op_op_semana').change(function() {//ORDEN PEDIDO - OP SEMANA
    let selectOption = $( 'select[name="cod_op"] option:selected' ).data('op');
    const url = $('#url').val();
    $('select[name="cod_op_semana"] option').remove();
    $('select[name="cod_op_semana"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar una semana'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/op/osemana/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_op_semana"] option').remove();
                $('select[name="cod_op_semana"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar una semana'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_op_semana"]').append($('<option>', { 
                            value: response['cod_op_semana'],
                            text : "Semana N°"+response['num_semana']
                        }));
                    });
                }else{
                    alert("Se presento el siguiente problema: El ciclo seleccionado no cuenta con semanas establecidas");
                }
                
            }
        });
    }
});

$('#combobox_cod_op_semana_solicitud').change(function() {//OP SEMANA - NUM SOLICITUD
    let selectOption = $( 'select[name="cod_op_semana"] option:selected' ).val();
    let selectOption_op = $( 'select[name="cod_op"] option:selected' ).data('op');
    let selectOption_curso = $( 'select[name="cod_curso"] option:selected' ).val();
    let selectOption_seccion = $( 'select[name="cod_seccion"] option:selected' ).val();
    const url = $('#url').val();
    //console.log(selectOption);
    $('select[name="num_solicitud"] option').remove();
    $('select[name="num_solicitud"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar una solicitud'
    }));
    if(selectOption_op!="" && selectOption_op !=undefined){
        if(selectOption_curso!="" && selectOption_curso !=undefined){
            if(selectOption_curso!="" && selectOption_curso !=undefined){
                if(selectOption!="" && selectOption !=undefined){
                    $.ajax({ 
                        url: url+"laravel/osemana/seccioncursofacultadop/"+selectOption_seccion+"&"+selectOption+"&"+selectOption_curso+"&"+selectOption_op,
                        method: 'get',
                        success: function(result){
                            $('select[name="num_solicitud"] option').remove();
                            $('select[name="num_solicitud"]').append($('<option>', { 
                                value: '',
                                text : 'Seleccionar una solicitud'
                            }));
                            if(result.length!=0){
                                result.forEach(response => {
                                    for(var i=1; i<=parseInt(response['num_solicitud'],0);i++){
                                        $('select[name="num_solicitud"]').append($('<option>', { 
                                            value: i,
                                            text : "Solicitud N°"+i
                                        }));
                                    };
                                });
                            }else{
                                alert("Se presento el siguiente problema: No hay disponible solicitudes para esta semana o no ha seleccionado los filtros");
                            }
                            
                        }
                    });
                }
            }else{
                alert("Debe seleccionar una sección para continuar para visualizar las opciones de solicitud");
            }
        }else{
            alert("Debe seleccionar un curso para visualizar las opciones de solicitud");
        }
    }else{
        alert("Debe seleccionar un ciclo académico para continuar para visualizar las opciones de solicitud");
    }
});

$('#combobox_cod_ocurso_oseccion_aula').change(function() {//OCURSO - OSECCION - AULA
    let selectOption = $( 'select[name="cod_ocurso"] option:selected' ).val();
    const url = $('#url').val();
    $('select[name="cod_oseccion"] option').remove();
    $('select[name="cod_oseccion"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar la sección'
    }));

    $('select[name="email"] option').remove();
    $('select[name="email"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el usuario'
    }));

    $('select[name="cod_aula"] option').remove();
    $('select[name="cod_aula"]').append($('<option>', { 
        value: '',
        text : 'Seleccionar el aula'
    }));
    if(selectOption!="" && selectOption !=undefined){
        $.ajax({ 
            url: url+"laravel/ocurso/oseccion/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_oseccion"] option').remove();
                $('select[name="cod_oseccion"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar la sección'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_oseccion"]').append($('<option>', { 
                            value: response['cod_oseccion'],
                            text : 'Sección '+response['cod_seccion']
                        }));
                    });
                }else{
                    alert("El curso seleccionado ya no tiene secciones disponibles para asignar");
                }
                
            }
        });
        $.ajax({ 
            url: url+"laravel/op/aula/"+selectOption,
            method: 'get',
            success: function(result){
                $('select[name="cod_aula"] option').remove();
                $('select[name="cod_aula"]').append($('<option>', { 
                    value: '',
                    text : 'Seleccionar el aula'
                }));
                if(result.length!=0){
                    result.forEach(response => {
                        $('select[name="cod_aula"]').append($('<option>', { 
                            value: response['cod_aula'],
                            text : response['cod_aula']+": "+response['referencia']
                        }));
                    });
                }else{
                    alert("Se presento el siguiente problema: La facultad no cuenta con aulas definidas");
                }
                
            }
        });
    }
});

$('.filter-select').select2();
$('.filter-select-curso').select2();
$('.filter-select-ciclo').select2();
$('.filter-select-seccion').select2();
$('.filter-select-semana').select2();
$('.filter-select-solicitud').select2();
$('.filter-select-email').select2();
$('.filter-select-semana').select2();
$('.filter-select-aula').select2();