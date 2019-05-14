<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Novo Cliente');
            if ( $acao == 'edit' ) __('Alterar Cliente');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Cliente', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('dados do cliente');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    $div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id'); 

                                        echo $form->input('nome', array('label'=>'Nome <font color="red">(*)</font>', 'class'=>'tres_colunas'));					
                                        echo $form->input('Sexo', array('label'=>'Sexo', 'class'=>'tres_colunas_select',  'empty'=>'', 'options'=> array('M'=>'Masculino', 'F'=>'Feminino')));                                        
                                        echo $form->input('cpf', array('label'=>'CPF', 'class'=>'tres_colunas'));                                                                                
                                        echo $form->input('telefone', array('label'=>'Telefone 1 ', 'class'=>'tres_colunas'));
                                        echo $form->input('telefone2', array('label'=>'Telefone 2 ', 'title'=>'Insira outro telefone do cliente (somente números).', 'class'=>'tres_colunas'));
                                        echo $form->input('endereco', array('label'=>'Endereço ', 'class'=>'tres_colunas'));
                                        echo $form->input('cidade', array('label'=>'Cidade', 'class'=>'tres_colunas'));                                     
                                        echo $form->input('email', array('label'=>'E-mail', 'class'=>'tres_colunas'));             
                                                                                                                        
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