$(document).ready(function() {	 

    //$.backstretch("../img/fundo32.JPG");
        //$(".dinheiro").parent().fadeIn();
        //$(".cartao").parent().fadeOut();
        
        if ($('#VendidoDinheiro').val() != '' ) {
            
                        $(".dinheiro").parent().fadeIn();                
                        $(".cartao").parent().fadeOut(); 
                        
                        $('#VendidoFormaPagamento').val('');
                        $('#VendidoNumeroParcelas').val('');
                        $('#VendidoValorParcelas').val('');
           
        } else if ($('#VendidoFormaPagamento').val() != '' || $('#VendidoNumeroParcelas').val() != '') {
            
                        $(".cartao").parent().fadeIn();
                        $(".dinheiro").parent().fadeOut();    

                        $('#VendidoTroco').val('');
                        $('#VendidoDinheiro').val(''); 
            
        } else {
            
                $(".dinheiro").parent().fadeOut();
                $(".cartao").parent().fadeOut();
            
        }
        
  
       //$('#VendidoFormaPagamento').val('');
       //$('#VendidoNumeroParcelas').val('');
       //$('#VendidoValorParcelas').val('');
    

        $('#ProdutoFlag1').val(''); //item
        $('#ServicoFlag2').val(''); //vazio
        $('#ProdutoFlag3').val(''); //produto
        
        $('#ItemEntrada').val("");
        
	$('#VendidoFlag1').val(''); //credito
        $('#VendidoFlag2').val(''); //dinheiro

        // credito
        $("#credito").click(function() {
        $('#VendidoFlag1').val('1');
        });

        //dinheiro
        $("#dinheiro").click(function() {
        $('#VendidoFlag2').val('1');
        });

        $('#ProdutoClienteId').val("");
        $('#ProdutoVendidoId').val("");
                
        $('#ProdutoQtdvendida').val("");
        $('#ProdutoDescricao2').val("");
        $('#ProdutoFornecedor').val("");
        $('#IngredienteFornecedor').val("");    
        

	$('#ContratoInicioVigencia').setMask('date');
	//$('#ContratoInicioVigencia').datepicker({ changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true, showOn: 'button', buttonText: 'Selecionar data', buttonImage: '../img/ico_calendario_22.gif', buttonImageOnly: true });

	$('#ContratoTerminoVigencia').setMask('date');
	//$('#ContratoTerminoVigencia').datepicker({ changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true, showOn: 'button', buttonText: 'Selecionar data', buttonImage: '../img/ico_calendario_22.gif', buttonImageOnly: true });

                
        $("#addDinheiro").click(function() {
            
                        $('#VendidoFormaPagamento').val('');
                        $('#VendidoNumeroParcelas').val('');
                        $('#VendidoValorParcelas').val('');
            
            if ($('#VendidoDinheiro').val() != '') {
                
            $('#VendidoFlag7').val('1');
                
            } else {
                
                $('#VendidoFlag10').val('1');
                
                alert('O seguinte campo deve ser preenchido:  DINHEIRO');
  
            }

        });
        
                
        $("#addCartao").click(function() {
            
                    $('#VendidoTroco').val('');
                    $('#VendidoDinheiro').val(''); 
            
            if ($('#VendidoNumeroParcelas').val() == '' || $('#VendidoFormaPagamento').val() == '') {

                $('#VendidoFlag10').val('1');
                
                alert('Os seguintes campos devem ser preenchidos: FORMA DE PAGAMENTO E NUMERO DE PARCELAS');

            } else {
                
                $('#VendidoFlag8').val('1');
  
            }

        });
        
                
        $("#addSalvar").click(function() {
            
            if ($('#VendidoValorParcelas').val() != '' || $('#VendidoTroco').val() != '' ) {
                
            $('#VendidoFlag9').val('1');
                
            } else {
                
                $('#VendidoFlag10').val('1');
                
               alert('Antes de salvar é necessário calcular o pagamento em dinheiro ou no cartão');
  
            }

        });
        
                
        $("#addItem").click(function() {
            
            if ($('#ProdutoQtd').val() != '' && $('#ProdutoItenId').val() != '') {
                
            $('#ProdutoFlag1').val('1');
                
            } else {
                
                $('#ProdutoFlag2').val('1');
                
                alert('Os seguintes campos devem ser preenchidos: ITEM e QUANTIDADE');
  
            }

        });
        
                
        $("#salvaProduto").click(function() {
            
           if ($('#ProdutoCodigo').val() != '' && 
               //$('#ProdutoPreco').val() != '' &&
               //$('#ProdutoQuantidade').val() != '' &&
               $('#ProdutoDescricao').val() != '') {
                
               $('#ProdutoFlag3').val('1');

            } else {
                
               $('#ProdutoFlag2').val('1');
                
             alert('O seguinte campo deve ser preenchidos: CODIGO E PRODUTO');
                        
            }

        });
        
      
                                       
       $(".opcao1").click(function(){
			
                        $(".dinheiro").parent().fadeIn();                
                        $(".cartao").parent().fadeOut(); 
                        
                        //$('#VendidoFormaPagamento').val('');
                        //$('#VendidoNumeroParcelas').val('');
                        //$('#VendidoValorParcelas').val('');
              
        });
        
       $(".opcao2").click(function(){                 		
                        $(".cartao").parent().fadeIn();
                        $(".dinheiro").parent().fadeOut();    

                        //$('#VendidoTroco').val('');
                        //$('#VendidoDinheiro').val('');

        }); 
        
        
        /*
        
 
    	function mascaraAdd1() {
		if ($('#ClientePessoa1').val() == 'CNPJ') {
                        //$("#ClienteNome").parent().fadeOut();
                        $("#ClienteNomefantasia").parent().fadeIn();
                        $("#ClienteRazaosocial").parent().fadeIn();
                        $("#ClienteInscricao").parent().fadeIn();
			$('#ClienteCpfCnpj').parent().find('label').html('CNPJ');
			$('#ClienteCpfCnpj').setMask({mask: '99.999.999/9999-99'});
		} else {
                    	//$("#ClienteNome").parent().fadeOut();
                        $("#ClienteNomefantasia").parent().fadeOut();
                        $("#ClienteRazaosocial").parent().fadeOut();
                        $("#ClienteInscricao").parent().fadeOut();
			$('#ClienteCpfCnpj').parent().find('label').html('CPF');
			$('#ClienteCpfCnpj').setMask({mask: '999.999.999-99'});
		} 
	}
	$('#ClientePessoa1').change(function(){
		$('#ClienteInscricao').val('');
                //$('#ClienteNome').val('');
                $('#ClienteCpfCnpj').val('');
                $('#ClienteNomefantasia').val('');
                $('#ClienteRazaosocial').val('');
		mascaraAdd1();
		return false;
	});
	mascaraAdd1();
        
            	function mascaraAdd2() {
		if ($('#FornecedorPessoa2').val() == 'CNPJ') {
                    	//$("#FornecedorNome").parent().fadeOut();
                        $("#FornecedorNomefantasia").parent().fadeIn();
                        $("#FornecedorRazaosocial").parent().fadeIn();
                        $("#FornecedorInscricao").parent().fadeIn();
			$('#FornecedorCpfCnpj').parent().find('label').html('CNPJ');
			$('#FornecedorCpfCnpj').setMask({mask: '99.999.999/9999-99'});
		} else {
                    	//$("#FornecedorNome").parent().fadeIn();
                        $("#FornecedorNomefantasia").parent().fadeOut();
                        $("#FornecedorRazaosocial").parent().fadeOut();
                        $("#FornecedorInscricao").parent().fadeOut();	
			$('#FornecedorCpfCnpj').parent().find('label').html('CPF');
			$('#FornecedorCpfCnpj').setMask({mask: '999.999.999-99'});
		} 
	}
	$('#FornecedorPessoa2').change(function(){
		//$('#FornecedorNome').val('');
                $('#FornecedorInscricao').val('');
                $('#FornecedorCpfCnpj').val('');
                $('#FornecedorNomefantasia').val('');
                $('#FornecedorRazaosocial').val('');
		mascaraAdd2();
		return false;
	});
	mascaraAdd2();
        
        
        */
        
        
        
        /*

        $('#ProdutoSim').val("");
        $("#ProdutoClienteId").val("");
                        
                        $("#ProdutoDescricao2").parent().fadeIn();
                        $("#ProdutoClienteId").parent().fadeOut();
        
	$("#ProdutoSim").click(function(){
		 
		if( !this.checked ){
			$("#ProdutoClienteId").parent().fadeOut();
                        $("#ProdutoDescricao2").parent().fadeIn();
                
                
                } else {
			$("#ProdutoClienteId").parent().fadeIn();
                        $("#ProdutoDescricao2").parent().fadeOut();
		
                }
	});
        */
        
        $("#ClienteNome").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
        $("#ProdutoDescricao2").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
        $("#ProdutoDescricao").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });

                $("#ProdutoCodigo").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                $("#ClienteEndereco").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                $("#ClienteEmail").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                $("#ClienteObservacao").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });

                $("#VendidoDescricao2").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                $("#AtualizaprodutoDescricao2").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                $("#AtualizaprodutoDescricao").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
                        $("#AtualizaprodutoData").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        });
        
        $('#ProdutoQtd').setMask({mask: '99999', maxLength: 5});
        $('#ItemQtd').setMask({mask: '99999', maxLength: 5});
        $('#ItemEntrada').setMask({mask: '99999', maxLength: 5});
 
        $('#VendidoValorcredito').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValordebito').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoDinheiro').setMask({mask: '99,999', type: 'reverse'});
         
                //$('#VendidoTroco').setMask({mask: '99,999'}); 
                //$('#VendidoValorParcelas').setMask({mask: '99,999'});
        
        $('#VendidoNumeroParcelas').setMask({mask: '99'});
        
        $('#SaqueValor').setMask({mask: '99,999.999', type: 'reverse'});
        $('#SaqueSaldo').setMask({mask: '99,999.999', type: 'reverse'});        
        
        $('#VendidoValorcheque1').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValorcheque2').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValorcheque3').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValorcheque4').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValorcheque5').setMask({mask: '99,999', type: 'reverse'});
        $('#VendidoValorcheque6').setMask({mask: '99,999', type: 'reverse'});

        $('#VendidoDesconto').setMask({mask: '99,999', type: 'reverse'});
        $('#ClienteCep').setMask({mask: '99999-999', maxLength: 9});
        $('#FornecedorCep').setMask({mask: '99999-999', maxLength: 9});
        $('#ProdutoPreco').setMask({mask: '99,999', type: 'reverse'});
        $('#ProdutoPrecocompra').setMask({mask: '99,999', type: 'reverse'});
        $('#ProdutoQtdvendida').setMask({mask: '999', maxLength: 3});
        $('#ProdutoQuantidade').setMask({mask: '999999999', maxLength: 9});
        $('#IngredienteQuantidade').setMask({mask: '999999999', maxLength: 9});
        $('#IngredienteFornecedor').setMask({mask: '999999999', maxLength: 9});
        $('#ProdutoFornecedor').setMask({mask: '999999999', maxLength: 9});
        $('#ClienteTelefone').setMask({mask: '(99) 9999-9999', maxLength: 9});
        $('#ClienteTelefone2').setMask({mask: '(99) 9999-9999', maxLength: 9});
        $('#VendidoTotalpago').setMask({mask: '99,999', type: 'reverse'});
        $('#FornecedorTelefone1').setMask({mask: '(99) 9999-9999', maxLength: 9});
        $('#FornecedorTelefone2').setMask({mask: '(99) 9999-9999', maxLength: 9});
        //$('#AtualizaprodutoCodigo').setMask({mask: '999999999', maxLength: 9});
        $('#ClienteCpf').setMask({mask: '999.999.999-99'});
        
        $('#ContratoValorPago').setMask({mask: '99,999.999', type: 'reverse'});
        
        $('#RetiradaValorReal').setMask({mask: '99,999.999', type: 'reverse'});
        //$('#RetiradaValorDesconto').setMask({mask: '99,999.999', type: 'reverse'});
        $('#RetiradaValorPago').setMask({mask: '99,999.999', type: 'reverse'});
        $('#PlanoValor').setMask({mask: '99,999.999', type: 'reverse'});
        
        
        //$('#ProdutoItenId').selectToAutocomplete();
        
});
