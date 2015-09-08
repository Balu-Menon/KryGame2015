$(document).on('mouseover','.bgfx',function(){
	var bg = $(this).data('bgfx');
	$('.'+bg).addClass('highlighted');
});
$(document).on('mouseout','.bgfx',function(){
	$('.bg').removeClass('highlighted');
});

$(document).on('mousemove','#raid-section',function( event ) {
  var x = event.clientX;
  var w = $(window).width();
  if (x > w/2){
  	$(this).find('.bg').removeClass('init');
  	$(this).find('.sr').removeClass('viewing');
  	$(this).find('.dd').addClass('viewing');
  }else{
  	$(this).find('.bg').removeClass('init');
  	$(this).find('.dd').removeClass('viewing');
  	$(this).find('.sr').addClass('viewing');
  }
});