function start_loader(){
	$('body').prepend('<div id="preloader"></div>')
}
function end_loader(){
	 $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
}