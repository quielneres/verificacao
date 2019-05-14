$(document).ready(function() {
	//$('.flash_good').animate({opacity: 1.0}, 3000).fadeOut('slow');
	
	$('.flash_good').click(function(){
		$(this).fadeOut('slow');
		return false;
	});
	
	$('flash_bad').click(function(){
		$(this).fadeOut('slow');
		return false;
	});
	
	$('.flash_alert').click(function(){
		$(this).fadeOut('slow');
		return false;
	});
});