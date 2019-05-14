<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('controller'=> 'usuarios', 'action'=>'login'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
    <h3> <a href="/sistema">Voltar</a> <center><?php __('Recuperar Login e Senha'); ?></center> </h3>
</div>
<div>
	<?php
		//$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form('email', 'post', array('model'=>'Usuario', 'update'=> 'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		
				<div class="largura_quatro_colunas">
				<?php
					
                                    //$div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        //echo $form->input('id');           
                                        //echo $form->input('pessoa1', array('label'=>'Pessoa <font color="red">(*)</font>','type' => 'select', 'title'=>'É necessário selecionar o tipo de pessoa (Física ou Jurídica).', 'options'=> array('CNPJ'=>'Jurídica', 'CPF' => 'Física'), 'class'=>'tres_colunas'));
                                        //echo $form->input('nome', array('label'=>'Cliente ', 'disabled'=>'disabled', 'class'=>'tres_colunas'));					
                                        //echo $form->input('nomeremetente', array('label'=>'Nome do remetente ', 'value'=>'PIZZARIA CALIFORNIA', 'class'=>'tres_colunas'));					
                                        //echo $form->input('emailremetente', array('label'=>'e-mail do remetente ', 'class'=>'tres_colunas'));
                                        echo $form->input('email', array('label'=>'Informe o e-mail que está cadastrado em sua conta ', 'class'=>'duas_colunas'));                                     
                                        //echo $form->input('assunto', array('label'=>'Assunto ', 'class'=>'tres_colunas'));
                                        //echo $form->input('mensagem', array('label'=>'Mensagem ', 'type'=>'textarea'));
                                                                                
                                 ?>                
			</div>
		</fieldset>
        

	<?php 
		echo $form->submit('ENVIAR');
		echo $form->end(); 
	?>	
</div>