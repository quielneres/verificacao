<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<h3><center>
	    <?php  
            __('Escrever E-mail');
            //if ( $acao == 'edit' ) __('Alterar Cliente');
        ?>
    </center></h3>
</div>
<div>
	<?php
		//$div_update = $acao == 'edit' ? 'inicial' : 'inicial'; 
		echo $ajax->form('email', 'post', array('model'=>'Contrato', 'update'=> 'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); 
	?>
	<br />
		<fieldset>
	 		<legend><?php __('destinatario');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    //$div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');           
                                        //echo $form->input('pessoa1', array('label'=>'Pessoa <font color="red">(*)</font>','type' => 'select', 'title'=>'É necessário selecionar o tipo de pessoa (Física ou Jurídica).', 'options'=> array('CNPJ'=>'Jurídica', 'CPF' => 'Física'), 'class'=>'tres_colunas'));
                                        echo $form->input('Cliente.nome', array('label'=>'Cliente ', 'class'=>'tres_colunas'));					
                                        //echo $form->input('nomeremetente', array('label'=>'Nome do remetente ', 'value'=>'PIZZARIA CALIFORNIA', 'class'=>'tres_colunas'));					
                                        //echo $form->input('emailremetente', array('label'=>'e-mail do remetente ', 'class'=>'tres_colunas'));
                                        echo $form->input('Cliente.email', array('label'=>'e-mail ', 'class'=>'tres_colunas'));                                     
                                        //echo $form->input('assunto', array('label'=>'Assunto ', 'class'=>'tres_colunas'));
                                        //echo $form->input('mensagem', array('label'=>'Mensagem ', 'type'=>'textarea', 'class'=>'textarea'));
                                                                                
                                 ?>                
			</div>
		</fieldset>
        
        		<fieldset>
	 		<legend><?php __('remetente');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    //$div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');           
                                        //echo $form->input('pessoa1', array('label'=>'Pessoa <font color="red">(*)</font>','type' => 'select', 'title'=>'É necessário selecionar o tipo de pessoa (Física ou Jurídica).', 'options'=> array('CNPJ'=>'Jurídica', 'CPF' => 'Física'), 'class'=>'tres_colunas'));
                                        //echo $form->input('nome', array('label'=>'Cliente ', 'class'=>'tres_colunas'));					
                                        echo $form->input('nomeremetente', array('label'=>'empresa ', 'value'=>'sistema', 'class'=>'tres_colunas'));					
                                        echo $form->input('emailremetente', array('label'=>'e-mail ', 'value'=>'harrisonbarreto@hotmail.com', 'class'=>'tres_colunas'));
                                        //echo $form->input('email', array('label'=>'e-mail do destinatário ', 'class'=>'tres_colunas'));                                     
                                        //echo $form->input('assunto', array('label'=>'Assunto ', 'class'=>'tres_colunas'));
                                        //echo $form->input('mensagem', array('label'=>'Mensagem ', 'type'=>'textarea', 'class'=>'textarea'));
                                                                                
                                 ?>                
			</div>
		</fieldset>
        
        		<fieldset>
	 		<legend><?php __('e-mail');?></legend>
				<div class="largura_quatro_colunas">
				<?php
					
                                    //$div_update = $acao == 'edit' ? 'inicial' : 'inicial';
                                
                                        echo $form->input('id');           
                                        //echo $form->input('pessoa1', array('label'=>'Pessoa <font color="red">(*)</font>','type' => 'select', 'title'=>'É necessário selecionar o tipo de pessoa (Física ou Jurídica).', 'options'=> array('CNPJ'=>'Jurídica', 'CPF' => 'Física'), 'class'=>'tres_colunas'));
                                        //echo $form->input('nome', array('label'=>'Cliente ', 'class'=>'tres_colunas'));					
                                        //echo $form->input('nomeremetente', array('label'=>'Nome do remetente ', 'value'=>'PIZZARIA CALIFORNIA', 'class'=>'tres_colunas'));					
                                        //echo $form->input('emailremetente', array('label'=>'e-mail do remetente ', 'class'=>'tres_colunas'));
                                        //echo $form->input('email', array('label'=>'e-mail do destinatário ', 'class'=>'tres_colunas'));                                     
                                        echo $form->input('assunto', array('label'=>'Assunto ', 'class'=>'duas_colunas'));
                                        echo $form->input('mensagem', array('label'=>'Mensagem ', 'type'=>'textarea', 'class'=>'textarea'));
                                                                                
                                 ?>                
			</div>
		</fieldset>
	<?php 
		echo $form->submit('Enviar');
		echo $form->end(); 
	?>	
</div>