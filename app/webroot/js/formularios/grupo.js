$(document).ready(function() {
	
	$('#add_permissao').click(function() {
		return !$('#PermissaoNaoSelecionado option:selected').remove().appendTo('#PermissaoPermissao');
	});
	$('#remove_permissao').click(function() {
		return !$('#PermissaoPermissao option:selected').remove().appendTo('#PermissaoNaoSelecionado');
	});
	
	$('#submit_grupo').click(function() {
		$('#PermissaoPermissao option, #PermissaoNaoSelecionado option').each(function(i) {
			$(this).attr('selected', 'selected');
		});
	});

});