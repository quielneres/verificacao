$(document).ready(function() {
    
        // FICHA PROJETADAS ------------------------------------
        if($("#FichabarrprojetadaLicenAmbientalProjetada").val() === "OPERAÇÃO"){          
                $("#FichabarrprojetadaSituacaoLicencaProjetada").attr('readonly', false);                
            }else{
                $("#FichabarrprojetadaSituacaoLicencaProjetada").attr('readonly', true);
                $("#FichabarrprojetadaSituacaoLicencaProjetada").val('');
            }
        
        $("#FichabarrprojetadaLicenAmbientalProjetada").click(function(){
            if($("#FichabarrprojetadaLicenAmbientalProjetada").val() === "OPERAÇÃO"){          
                $("#FichabarrprojetadaSituacaoLicencaProjetada").attr('readonly', false);                
            }else{
                $("#FichabarrprojetadaSituacaoLicencaProjetada").attr('readonly', true);
                $("#FichabarrprojetadaSituacaoLicencaProjetada").val('');
            }              
	});
        //FIM PROJETADAS ---------------------------------------         
              
        //FICHA ADUTORES -------------------------------    
        if($("#FichaadutorLicenAmbientalAdutor").val() === "OPERAÇÃO"){          
                $("#FichaadutorSituacaoLicencaAdutor").attr('readonly', false);                
            }else{
                $("#FichaadutorSituacaoLicencaAdutor").attr('readonly', true);
                $("#FichaadutorSituacaoLicencaAdutor").val('');
            }
        
        $("#FichaadutorLicenAmbientalAdutor").click(function(){
            if($("#FichaadutorLicenAmbientalAdutor").val() === "OPERAÇÃO"){          
                $("#FichaadutorSituacaoLicencaAdutor").attr('readonly', false);                
            }else{
                $("#FichaadutorSituacaoLicencaAdutor").attr('readonly', true);
                $("#FichaadutorSituacaoLicencaAdutor").val('');
            }              
	});
        //FIM ADUTORES -----------------------------------

        //REUSOS -----------------------------------
        if($("#FichareusoLicenAmbientalReuso").val() === "OPERAÇÃO"){          
                $("#FichareusoSituacaoLicencaReuso").attr('readonly', false);                
            }else{
                $("#FichareusoSituacaoLicencaReuso").attr('readonly', true);
                $("#FichareusoSituacaoLicencaReuso").val('');
            }
        
        $("#FichareusoLicenAmbientalReuso").click(function(){
            if($("#FichareusoLicenAmbientalReuso").val() === "OPERAÇÃO"){          
                $("#FichareusoSituacaoLicencaReuso").attr('readonly', false);                
            }else{
                $("#FichareusoSituacaoLicencaReuso").attr('readonly', true);
                $("#FichareusoSituacaoLicencaReuso").val('');
            }              
	});
        //FIM REUSOS --------------------------------          

        $('#FichabarrprojetadaLatitude').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichabarrprojetadaLongitude').setMask({mask: '999 99 99', maxLength: 2});
        $('#FichabarrprojetadaLatitudeObrassoci').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichabarrprojetadaLongitudeObrassoci').setMask({mask: '999 99 99', maxLength: 2});
        
        $('#FichabarrexistenteLatitude').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichabarrexistenteLongitude').setMask({mask: '999 99 99', maxLength: 2});
        
        $('#FichaintervencaoLatitude').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichaintervencaoLongitude').setMask({mask: '999 99 99', maxLength: 2});
        
        $('#FichaadutorLatitude').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichaadutorLongitude').setMask({mask: '999 99 99', maxLength: 2});
        $('#FichaadutorLatitudeFim').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichaadutorLongitudeFim').setMask({mask: '999 99 99', maxLength: 2});        
        
        $('#FichareusoLatitude').setMask({mask: '99 99 99', maxLength: 2});
        $('#FichareusoLongitude').setMask({mask: '999 99 99', maxLength: 2});

        $('#RelacionaestudoprojetadaAnoEstudo').setMask({mask: '9999', maxLength: 4});


});