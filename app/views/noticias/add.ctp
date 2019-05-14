<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');

$id_usuario = $session->read('Auth.Usuario.id');
$ativo = $session->read('Auth.Usuario.Ativo');

?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            if ( $acao == 'add' ) __('Novo Noticia');
            if ( $acao == 'edit' ) __('Alterar Noticia');
        ?>
    </center></h3>
</div>
<div>
	<?php
		$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form($acao, 'post', array('model'=>'Noticia', 'update'=> $div_update, 'indicator'=>'ajax_load', 'after'=>'$("#'.$div_update.'").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    $div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');      
                                        echo $form->input('usuario_id', array('label'=>'Usuario <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas', 'value'=>$id_usuario));
                                        
                                        echo $form->input('descricao', array('label'=>'descricao <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                        echo $form->input('status', array('label'=>'status <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                                                                      
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