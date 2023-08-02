
$('.button-sidebar').on('click', function() {
  if($('.sidebar').is(':hidden')){
    $('.content').animate({
      marginLeft: '200px'
    }, 300);
  }else{
    $('.content').animate({
      marginLeft: '0px'
    }, 300);
  }
  $('.sidebar').animate({
    width: 'toggle'
  }, 300);
});
$('.list-submenu li').on('click', function(e){
  $(this).find('a')[0].click();
});