<?php echo $this->element('flash');
//echo $javascript->link('formularios/intervalo');

//$id_usuario = $session->read('Auth.Usuario.id');
//$ativo = $session->read('Auth.Usuario.Ativo');
//$total_geral = number_format($total_geral, 2, ',', '.');

?>
<div class="cabecalho">
        
	<h3><center>
	    <?php  

            __('Confirmar Pagamento');

        ?>
    </center></h3>
</div>
<div>
		
    <?php echo $ajax->form('edit', 'post', array('model'=>'Saque', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); ?>
	<br />
		<fieldset>
	 		<legend><?php __('');?></legend>
				<div class="largura_quatro_colunas">
				<?php
                                
                                        echo $form->input('id');                                            
                                        //echo $form->hidden('Obrigatorio', array('value'=>true));                                                             
                                            
                                        //echo $form->input('usuario_id', array('label'=>'Usuario <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));

                                        //echo $form->input('saldo', array('label'=>'seu saldo', 'class'=>'quatro_colunas', 'value'=>$total_geral, 'readonly'=>'readonly'));
                                        //echo $form->input('valor', array('label'=>'valor do saque <font color="red">(*)</font>', 'class'=>'quatro_colunas'));
                                        
                                        echo $form->hidden('status', array('label'=>'status', 'class'=>'quatro_colunas', 'value'=>2));
                                        
                                        //echo $form->input('saldo', array('label'=>'seu saldo', 'class'=>'quatro_colunas', 'value'=>$total_geral, 'readonly'=>'readonly'));
                                        //echo $form->input('valor', array('label'=>'valor do saque <font color="red">(*)</font>', 'class'=>'quatro_colunas'));
                                        
                                        //echo '<br><br><br><br><br>';
                                        //echo 'Saque solicitado pelo doador: R$ . <br><br>';
                                        echo 'Se o pagamento já foi enviado ao doador, confirme no botão abaixo. <br><br>';
     
                                 ?>                
			</div>
		</fieldset>
	<?php 
                echo $form->submit('Confirmar');
		echo $form->end(); 
	?>	
</div>