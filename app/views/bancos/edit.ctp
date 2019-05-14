<?php echo $this->element('flash');
//echo $javascript->link('formularios/intervalo');
//$id = $session->read('Auth.Usuario.id');
?>
<div class="cabecalho">
    <?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
    <h3>
        <center>
            <?php __('Canta Bancária'); ?>
        </center>
    </h3>
</div>
<div>
    <?php echo $ajax->form('edit', 'post', array('model' => 'Banco', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>
    <br/>
    <fieldset>
        <legend><?php __('conta bancária'); ?></legend>
        <div class="largura_quatro_colunas">
            <?php

            echo $form->input('id');
            echo $form->input('NomeUsuario', array('label' => 'Nome do titular', 'class' => 'tres_colunas'));
            if ($id == 1) {

                echo $form->input('cpf', array('label' => 'CPF <font color="red">(*)</font>', 'class' => 'tres_colunas', 'tres_colunas'));
            } else {

                echo $form->input('cpf', array('label' => 'CPF <font color="red">(*)</font>', 'class' => 'tres_colunas', 'tres_colunas'));
            }
            echo $form->input('banco', array('label' => 'Banco', 'class' => 'tres_colunas_select', 'empty' => '', 'options' => array(
                'boleto_bb' => '001 – Banco do Brasil S.A.',
                'boleto_itau' => '341 – Banco Itaú S.A.',
                'boleto_inter' => '077 – Banco Inter',
                'boleto_cef' => '104 – Caixa Econômica Federal',
                'boleto_bradesco' => '237 – Banco Bradesco S.A.',
                'boleto_modal_mais' => '746 -  Banco Modal Mais',
                'boleto_santander' => '033 – Banco Santander (Brasil) S.A.',
                'boleto_real' => '356 – Banco Real S.A. (antigo)',
                'boleto_unibanco_itau' => '652 – Itaú Unibanco Holding S.A.',
                'boleto_citibank' => '745 – Banco Citibank S.A.',
                'baleto_hsbc' => '399 – HSBC Bank Brasil S.A. – Banco Múltiplo',
                'banco_mercantil' => '389 – Banco Mercantil do Brasil S.A.',
                'banco_rural' => '453 – Banco Rural S.A.',
                'banco_safra' => '422 – Banco Safra S.A.',
                'banco_rendimento' => '633 – Banco Rendimento S.A.'
            )));
            echo $form->input('tipo', array('label' => 'Tipo', 'class' => 'tres_colunas_select', 'empty' => '', 'options' => array('Corrente' => 'Corrente', 'Poupança' => 'Poupança')));
            echo $form->input('conta', array('label' => 'Conta', 'class' => 'seis_colunas'));
            echo $form->input('contaDV', array('label' => 'DV ', 'class' => 'sete_colunas'));
            echo $form->input('agencia', array('label' => 'Agência ', 'class' => 'seis_colunas'));
            echo $form->input('agenciaDV', array('label' => 'DV ', 'class' => 'sete_colunas'));
            ?>
        </div>
    </fieldset>


    <!--
                <?php /*if($id == 1){ ?>
        
                <fieldset>
	 		<legend><?php __('Boleto bancário');?></legend>
				<div class="largura_quatro_colunas">
				<?php                                
                                        echo $form->input('demonstrativo', array('label'=>'demonstrativo ', 'class'=>'tres_colunas'));
                                        echo $form->input('instrucoes', array('label'=>'instruções ', 'class'=>'tres_colunas'));
                                        echo $form->input('identificacao', array('label'=>'identificação ', 'class'=>'tres_colunas'));                                        
                                        echo $form->input('carteira', array('label'=>'carteira ', 'class'=>'cinco_colunas'));
                                        echo $form->input('diasPrazo', array('label'=>'dias de prazo ', 'class'=>'cinco_colunas'));
                                        echo $form->input('taxaBoleto', array('label'=>'taxa boleto ', 'class'=>'cinco_colunas'));
                                        echo $form->input('nossoNumero', array('label'=>'nosso número ', 'class'=>'cinco_colunas'));                                                                             
                                        echo $form->input('aceite', array('label'=>'aceite ', 'class'=>'cinco_colunas'));
                                        echo $form->input('especie', array('label'=>'espécie ', 'class'=>'cinco_colunas'));
                                        echo $form->input('especieDoc', array('label'=>'espécie DOC ', 'class'=>'cinco_colunas'));
                                        echo $form->input('convenio', array('label'=>'convênio ', 'class'=>'cinco_colunas'));
                                        echo $form->input('contrato', array('label'=>'contrato ', 'class'=>'cinco_colunas'));                                         
                                 ?>                
			</div>
		</fieldset>
        
                <?php }*/ ?>
                -->


    <?php
    echo $form->submit('Atualizar');
    echo $form->end();
    ?>
</div>