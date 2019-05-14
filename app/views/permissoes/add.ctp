<?php
echo $this->element('flash');
?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3><?php __('Adicionar Permissão'); ?></h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('add', 'post', array('model'=>'Permissao', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); ?>
	<fieldset>
 		<legend><?php __('Geral');?></legend>
		<?php
			echo $form->input('Alias', array('label'=>'Alias <b>(*)</b>', 'title'=>'Insira um nome para a permissão. Ex: cadastrar doador', 'class'=>'tres_colunas'));
			echo $form->input('Controllers', array('label'=>'Controller  <b>(*)</b>', 'title'=>'Selecione um controller.', 'empty'=>'Selecione uma opção', 'options'=>$controllers, 'class'=>'tres_colunas_select'));
			echo $form->input('Actions', array('label'=>'Actions  <b>(*)</b>', 'title'=>'É necessário selecionar um controller antes de escolher uma action.', 'type' => 'select', 'empty'=>'Selecione uma opção', 'options'=>$actions, 'div'=>'sem_direita', 'class'=>'tres_colunas_select'));
			$options = array('url' => array('controller' => 'Permissoes' , 'action' => 'buscaAcoes'), 'update' => 'PermissaoActions');
			echo $ajax->observeField('PermissaoControllers' , $options);
		?>
	</fieldset>
	<?php 
		echo $form->submit('Cadastrar', array('div'=> false));
		echo $form->button('Limpar', array('type'=>'reset'));
		echo $form->end(); 
	?>
</div>