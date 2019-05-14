<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Novo Retirada');
            if ( $acao == 'edit' ) __('Alterar Retirada');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Retirada', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    $div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');           

                                        if($acao == 'edit'){
                                        echo $form->input('cliente_id', array('label'=>'Cliente <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('produto', array('label'=>'Descrição do Produto <font color="red">(*)</font>', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('valor_real', array('label'=>'valor do produto <font color="red">(*)</font>', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('valor_desconto', array('label'=>'desconto <font color="red">(*)</font>', 'class'=>'tres_colunas_select', 'disabled'=>'disabled', 'empty'=>'', 'options'=> array('50%'=>'50%', '30%'=>'30%')));
                                        echo $form->input('valor_pago', array('label'=>'valor pago<font color="red">(*)</font>', 'class'=>'tres_colunas', 'disabled'=>'disabled'));
                                        echo $form->input('forma_pagamento', array('label'=>'Forma de pagamento', 'class'=>'tres_colunas', 'disabled'=>'disabled'));     
                                        }else{
                                        echo $form->input('cliente_id', array('label'=>'Cliente <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                                        echo $form->input('produto', array('label'=>'Descrição do Produto <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('valor_real', array('label'=>'valor do produto <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('valor_desconto', array('label'=>'desconto <font color="red">(*)</font>', 'class'=>'tres_colunas_select',  'empty'=>'', 'options'=> array('50%'=>'50%', '30%'=>'30%')));
                                        echo $form->input('valor_pago', array('label'=>'valor pago<font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('forma_pagamento', array('label'=>'Forma de pagamento', 'class'=>'tres_colunas'));
                                        
                                        $data = date("d/m/Y");
                                        echo $form->input('data', array('label'=>'data', 'type'=>'hidden', 'value'=>$data));                                        
                                        
                                        }
                                        
                                        
                                 ?>                
			</div>
		</fieldset>
	<?php 
		if ($acao != 'edit') {
			echo $form->submit('Cadastrar', array('div' => false));
			echo $form->button('Limpar', array('type'=>'reset'));
		} else
			//echo $form->submit('Atualizar');
		echo $form->end(); 
	?>	
</div>