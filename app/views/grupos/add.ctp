<?php echo $this->element('flash');
      echo $javascript->link('formularios/grupo');
?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3><?php __('Adicionar Grupo'); ?></h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('add', 'post', array('model'=>'Grupo', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); ?>
	
    
    
    <fieldset>
 		<legend><?php __('Geral');?></legend>
 		<?php echo $form->input('Descricao', array('label'=>'Descrição <b>(*)</b>', 'class'=>'uma_coluna', 'div'=>'sem_direita')); ?>
	</fieldset>
	<fieldset>
		<legend><?php __('Permissões');?></legend>	
		<?php 
			echo $form->input('Permissao.NaoSelecionado', array('label'=>'Não Selecionadas','class'=>'tres_colunas_select','div'=>'multiple','type' =>'select','multiple' => true, 'options'=>$permissoes, 'after'=>'<br /><input type="button" id="add_permissao" value="Adicionar &gt;&gt;" title="Adicionar">'));
			echo $form->input('Permissao', array('label'=>'Selecionadas <b>(*)</b>','div'=>'multiple  sem_direita','class'=>'tres_colunas_select','type' =>'select','multiple' => true, 'options'=>$permissaoselecionada, 'after'=>'<br /><input type="button" id="remove_permissao" value="&lt;&lt; Remover" title="Remover">'));
		?>
	</fieldset>
	<?php 
		echo $form->submit('Cadastrar', array('div'=> false, 'id'=>'submit_grupo'));
		echo $form->button('Limpar', array('type'=>'reset'));
		echo $form->end(); 
	?>
</div>