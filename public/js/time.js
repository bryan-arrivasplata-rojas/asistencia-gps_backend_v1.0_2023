$( ".datepicker" ).datetimepicker({ 
  defaultDate: "+1w", 
  numberOfMonths: 1, 
  dateFormat: 'yy-mm-dd', 
  timeFormat: 'HH:mm:ss',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
  dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
  weekHeader: 'Sm',
  showMonthAfterYear: false,
  currentText: 'Hoy',
  closeText: 'Cerrar',
  prevText: ' nextText: Sig>',
  use24hours:true
});
$("#fecha_inicial").on('change',function(){
  if($("#fecha_final").val()==""){
    //console.log('hola');
  }else{
    if($("#fecha_inicial").val()<=$("#fecha_final").val()){
      //console.log($("#fecha_inicial").val());
    }else{
      $("#fecha_inicial").val("");
      alert('La fecha inicial debe ser menor a la fecha final')
    }
  }
});
$("#fecha_final").on('change',function(){
  if($("#fecha_final").val()==""){
    //null
  }else{
    if($("#fecha_final").val()>=$("#fecha_inicial").val()){
      //console.log($("#fecha_final").val());
    }else{
      $("#fecha_final").val("");
      alert('La fecha final debe ser mayor a la fecha final')
    }
  }
})