<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Nova Mensagem');
            if ( $acao == 'edit' ) __('Alterar Mensagem');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Mensagem', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('dados da mensagem');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    $div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');                                                                             
                                        echo $form->input('mensagem', array('label'=>'Mensagem', 'class'=>'textarea'));             
                                                                                                                        
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