$(document).ready(function() {
    
        $('fieldset div').find('input').each(function(){
		var id = $(this).attr('id');
		if (id.match(/Data/g)) {
			$('#'+id+'').setMask('date');
			$('#'+id+'').datepicker({ changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true, showOn: 'button', buttonText: 'Selecionar data', buttonImage: '../img/ico_calendario_22.gif', buttonImageOnly: true });
		}
	});
        
        $('#UsuarioTelefone').setMask({mask: '(99) 9999-99999', maxLength: 15});
	
        $('#UsuarioCpf').setMask({mask: '999.999.999-99'});
        
	$('#add_grupo').click(function() {
		return !$('#GrupoNaoSelecionado option:selected').remove().appendTo('#GrupoGrupo');
	});
	$('#remove_grupo').click(function() {
		return !$('#GrupoGrupo option:selected').remove().appendTo('#GrupoNaoSelecionado');
	});
	
	$('#submit_usuario').click(function() {
		$('#GrupoGrupo option, #GrupoNaoSelecionado option').each(function(i) {
			$(this).attr('selected', 'selected');
		});
	});

});