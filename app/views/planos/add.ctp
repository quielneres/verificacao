<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Novo Plano');
            if ( $acao == 'edit' ) __('Alterar Plano');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Plano', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    $div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');           

                                        echo $form->input('nome', array('label'=>'nome do plano <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('valor', array('label'=>'valor do plano <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('vigencia', array('label'=>'vigencia do plano <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('desconto', array('label'=>'desconto no produto <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('observacao', array('label'=>'Vantagens', 'class'=>'duas_colunas'));                                    
                                                                                
                                 ?>                
			</div>
		</fieldset>
	<?php 
		if ($acao != 'edit') {
			echo $form->submit('Cadastrar', array('div' => false));
			echo $form->button('Limpar', array('type'=>'reset'));
		} else
			echo $form->submit('Atualizar');
		echo $form->end(); 
	?>	
</div>