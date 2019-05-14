<?php
echo $this->element('flash');
	echo $javascript->link('formularios/usuario');   
        $acoes = $session->read('acoes'); 
        $id_usuario = $session->read('Auth.Usuario.id');
        $ativo = $session->read('Auth.Usuario.Ativo');    
?>

<script language="javascript">
function abrir_pop(url, name, feature)
{
    window.open(url, name, feature);
}     
</script>

<div class="cabecalho">
	<?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3><?php __('Doação mensal'); ?></h3></center>
</div>
<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('edit3', 'post', array('model'=>'Usuario', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); ?>
	
    
        <fieldset>
		<legend><?php __('Geral');?></legend>
		<?php
			echo $form->input('id');
			echo $form->hidden('Obrigatorio', array('value'=>false));                        
                        echo $form->hidden('usuario_id', array('label'=>'Usuario <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                        
			echo $form->input('valorMensal', array('label'=>'Valor Doação Mensal <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                        echo $form->input('dataVencimento', array('label'=>'Data do Vencimento <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                        
                        ?>
                            <div class="duas_colunas">
                            <a href="javascript:abrir_pop('https://www.inovesystem.com.br/boleto/<?=$banco?>.php?id_usuario=<?=$id_usuario?>', 'Boleto', 'width=700,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário">Imprimir boleto</a>
                            </div>
                        <?php
   
		?>
	</fieldset>
    
        <?php 
		echo $form->submit('Atualizar');
		echo $form->end(); 
	?>
    
</div>