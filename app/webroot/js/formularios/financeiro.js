$(document).ready(function() {

        $('.valor').setMask({mask: '99,999.999.999.9', type: 'reverse'});
        
        $('.form_busca').find('input').each(function(){
		var id = $(this).attr('id');
		if (id.match(/Data/g)) {
			$('#'+id+'').setMask('date');
			$('#'+id+'').datepicker({ changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true, showOn: 'button', buttonText: 'Selecionar data', buttonImage: '../img/ico_calendario_22.gif', buttonImageOnly: true });
		}
	});

});