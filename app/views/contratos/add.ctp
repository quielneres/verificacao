<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');

$data_inicio = date('d/m/Y');
$data_inicio2 = strtotime('+1 year');
$data_termino = date('d/m/Y', $data_inicio2);

//print $data_termino;

?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Novo Contrato');
            if ( $acao == 'edit' ) __('Alterar Contrato');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Contrato', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('dados do contrato');?></legend>
				<div class="largura_quatro_colunas">
				<?php
                             
                                        echo $form->input('id');
                                                                               
                                        if($acao == 'edit'){                                      
                                        if($status == 'VENCIDO'){
                                            
                                        echo $form->input('cliente_id', array('label'=>'Cliente <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                                        echo $form->input('plano_id', array('label'=>'Plano <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                                        echo $form->input('valor_pago', array('label'=>'valor pago', 'class'=>'tres_colunas'));
                                        echo $form->input('forma_pagamento', array('label'=>'forma de pagamento', 'class'=>'tres_colunas'));
                                        echo $form->input('inicio_vigencia', array('label'=>'inicio da vigencia <font color="red">(*)</font>', 'value'=>$data_inicio, 'class'=>'tres_colunas'));
                                        echo $form->input('termino_vigencia', array('label'=>'termino da vigencia <font color="red">(*)</font>', 'value'=>$data_termino, 'class'=>'tres_colunas'));                                     
                                        echo $form->input('observacao', array('label'=>'observação', 'class'=>'uma_coluna'));  
                                        echo $form->input('status', array('label'=>'status do contrato', 'class'=>'tres_colunas_select',  'options'=> array('VENCIDO'=>'VENCIDO')));
                                        echo $form->input('renovar', array('label'=>'renovar contrato', 'class'=>'tres_colunas_select', 'options'=> array('ATIVO'=>'RENOVAR')));

                                        }else{                                            
  
                                        echo $form->input('cliente_id', array('label'=>'Cliente <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('plano_id', array('label'=>'Plano <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('valor_pago', array('label'=>'valor pago', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('forma_pagamento', array('label'=>'forma de pagamento', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('inicio_vigencia', array('label'=>'inicio da vigencia <font color="red">(*)</font>', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('termino_vigencia', array('label'=>'termino da vigencia <font color="red">(*)</font>', 'class'=>'tres_colunas', 'disabled'=>'disabled'));                                     
                                        echo $form->input('observacao', array('label'=>'observação', 'class'=>'uma_coluna', 'disabled'=>'disabled'));    
                                        echo $form->input('status', array('label'=>'status do contrato', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        }                                        
                                        
                                        }else{
                                        echo $form->input('cliente_id', array('label'=>'Cliente <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                                        echo $form->input('plano_id', array('label'=>'Plano <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                                        echo $form->input('valor_pago', array('label'=>'valor pago', 'class'=>'tres_colunas'));
                                        echo $form->input('forma_pagamento', array('label'=>'forma de pagamento', 'class'=>'tres_colunas'));
                                        echo $form->input('inicio_vigencia', array('label'=>'inicio da vigencia <font color="red">(*)</font>', 'value'=>$data_inicio, 'class'=>'tres_colunas'));
                                        echo $form->input('termino_vigencia', array('label'=>'termino da vigencia <font color="red">(*)</font>', 'value'=>$data_termino, 'class'=>'tres_colunas'));                                     
                                        echo $form->input('observacao', array('label'=>'observação', 'class'=>'uma_coluna'));
                                        echo $form->input('status', array('label'=>'status', 'value'=>'ATIVO', 'type'=>'hidden'));    
                                        }
                                              
                                 ?>                
			</div>
		</fieldset>
	<?php 
		if ($acao != 'edit') {
			echo $form->submit('Cadastrar', array('div' => false));
			echo $form->button('Limpar', array('type'=>'reset'));
		} else { ?>
                    
    <div align="left">   
    <a href="#" onclick="window.open('/historicos/index/<?php echo $idCliente; ?>', 'Histórico do Contrato', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1050, HEIGHT=400');">Histórico do Contrato</a>
    </div><br>
          
        <?php
                    if($status == 'VENCIDO'){
                    echo $form->submit('Atualizar');    
                    }else{
                    //echo $form->submit('Atualizar');    
                    }                    
                }
		echo $form->end(); 
	?>	
</div>