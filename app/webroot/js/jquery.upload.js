(function($){
	$.fn.upload = function(opcoes) {

		var padrao = {
			botaoId: 'nova_foto_tunel',
			listaUploadId: 'lista_fotos_tunel',
			qtdUpload: 3,
			permitido: 'imagens'
		};
		var opcoes = $.extend(padrao, opcoes);
	    
		return this.each(function() {
			
			var im = 1;
			if(opcoes.permitido == 'imagens') {
				var expressao = /^(jpg|png|jpeg|gif)$/;
			} else {
				var expressao = /^(doc|odt|pdf|dwg|dxf|zip)$/;
			}
			
			$('select').change(function () {				
				$('option', $(this)).get($(this).attr('selectedIndex')).setAttribute('selected', 'selected');
				$('option:not(option:eq('+$(this).attr('selectedIndex')+'))', $(this)).removeAttr('selected');
			});
			
			$('#' + opcoes.botaoId).click(function(){
				var condicao = true;
				$(this).next().find('input, select').each(function(){
					if($(this).val() == '') {
						alert('Há campos obrigatórios em branco.'); 
						condicao = false;
						return false;
					}
				});
				if(condicao) {
					var arquivo = $(this).next().find('input:file');
					var extensao = $(arquivo).val().split('.').pop().toLowerCase();
					if ((expressao).test(extensao)) {
						$('.cx_listagem div:eq(0)').find('textarea').append($('.cx_listagem div:eq(0) textarea').val());
						$(arquivo).parent().parent().clone(true).hide().insertAfter($(arquivo).parent().parent());
						$(arquivo).parent().parent().find('input, select, textarea').each(function(){  
							$(this).attr('id', this.id.replace(this.id.match(/[\d\.]+/g), im));
							$(this).attr('name', this.name.replace(this.name.match(/[\d\.]+/g), im));
						});
						++im;
						var total = $('fieldset div:hidden input:file').length;
						if (total >= opcoes.qtdUpload) {
							$('#' + opcoes.botaoId).attr('disabled', true).attr('value','Desabilitado');
							$('.cx_listagem div:eq(0)').find('*').attr('disabled', true);
						}
						if ($('fieldset div:hidden').length > 0) {
							$('h4').show();
							$('#' + opcoes.listaUploadId).css({border: '1px solid #C7BEB6', padding: '5px 10px', marginTop: '10px', WebkitBorderRadius: 5, MozBorderRadius: 5});
						}
						if($(arquivo).val() != '') {
							$('#' + opcoes.listaUploadId).append('<div class="'+extensao+'">'+$(arquivo).val()+'<input type="button" value="Remover" /></div>').find('input:button').click(function(){
								var texto = $(this).parent().text();
								$(this).parent().remove();
								$('div').find('input:file').each(function(){
									if (texto == this.value) $('#'+this.id).parent().parent().remove();
								});
								if ($('fieldset div:hidden').length == 0) {
									$('h4').hide();
									$('#' + opcoes.listaUploadId).css({border: 'none', padding: '0', margin: '0'});
								}
								if (total >= opcoes.qtdUpload) {
									$('#' + opcoes.botaoId).attr('disabled', false).attr('value','Novo Upload');
									$('.cx_listagem div:eq(0)').find('*').attr('disabled', false);
								}
							});
						}
						$('.cx_listagem div:eq(0)').find('input:text, input:file, select:eq(1), textarea').attr('value','');	
						$('.cx_listagem div:eq(0)').find('textarea').empty();	
					} else {
						alert('Tipo de arquivo não é permitido.'); 
					}
				}
			});
			
		});
		
	};
})(jQuery);