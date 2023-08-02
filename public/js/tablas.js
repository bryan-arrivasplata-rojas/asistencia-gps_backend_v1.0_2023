var estilo = $('.table');
var table;
if($("#table-asistencias").length > 0){
    table = estilo.DataTable({
        responsive:true,
        autoWidth:true,
        "pagingType": "numbers",
        deferRender:true,
        "language":{
            url:'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        dom: 'PQBlfritp',
    });
}else{
    table = estilo.DataTable({
        responsive:true,
        autoWidth:true,
        "pagingType": "numbers",
        deferRender:true,
        "language":{
            url:'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
    });
}

$('.filter-select-ciclo').change(function(){
    table.columns(0).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select').change(function(){
    table.columns(1).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select-curso').change(function(){
    table.columns(2).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select-seccion').change(function(){
    table.columns(3).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select-semana').change(function(){
    table.columns(4).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select-solicitud').change(function(){
    table.columns(5).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});
$('.filter-select-email').change(function(){
    table.columns(6).search($(this).val()).draw();
    //console.log($(this).data('facultad'));
});

$('.table_estilo').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
