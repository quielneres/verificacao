(function($){
	$.fn.abas = function(opcoes) {
		return this.each(function() {
			
			if($('#' + opcoes.abasId + ' li.aba_atual a').length > 0){
				carregaAba($('#' + opcoes.abasId + ' li.aba_atual a'));
			}
			
			function carregaAba(abaObj){
			    if(!abaObj || !abaObj.length){ return; }
			    $('#' + opcoes.conteudoId).load(abaObj.attr('href'));
			}
			
		});
		
	};
})(jQuery);