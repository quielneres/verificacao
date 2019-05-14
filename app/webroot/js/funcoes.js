$(document).ready(function(){

	$('.formulario :input').easyTooltip();
	$('.galeria_fotos a').lightBox();
	
	function verLink(objeto, pai) {
		if (objeto.attr('href')) {
			link = objeto.attr('href');
			if(!(link == '/principal') && !(link == '#') && !(link == '/usuarios/logout')){
				link = link.replace(link.match(/[\d\.]+/g), '');
				link = link.substring(1,(link.length - 1));
				if (!(string_array.indexOf(link) > -1)) {
					if(pai)
						objeto.parent().remove();
					else objeto.remove();
				}
			}
		}
	}
	
	if(string_array != '') {
		$('#menu, .nivel_1, .nivel_2').children().each(function(){ 
			verLink($('a', this), true);
		});
		
		$('#menu').find('ul').each(function(){
			var li = $(this).children();
			if (li.length == 0)
				$(this).remove();
		});
		
		$('#menu').find('a').each(function(){
			var url = $(this).attr('href');
			if(!(url == '/usuarios/logout')){
				var vazio = $(this).attr('href', '#').next();
				if (vazio.length == 0)
					$(this).parent().remove();
			}
		});
		
		$('.cabecalho').children().each(function(){ 
			verLink($(this), false);
		});
		
		$('table').find('tr').children().each(function(){
			if($(this).hasClass('acoes'))
				verLink($('a', this), true);
		});
	}
	
});
