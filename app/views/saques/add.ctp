<?php echo $this->element('flash');
echo $javascript->link('formularios/intervalo');

$id_usuario = $session->read('Auth.Usuario.id');
//$ativo = $session->read('Auth.Usuario.Ativo');
$total_geral = number_format($total_geral, 2, ',', '.');

if ($transferencia == 1) { ?>

    <div class="cabecalho">
        <?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id_usuario), array('update' => 'inicial', 'before' => '$("#inicial").empty();'), null, false); ?>
        <h3>
            <center>
                <?php

                __('Transferencia entre contas do sistema');

                //$total_geral = number_format($total_geral, 2, ',', '.');

                //echo "seu saldo: <font color='green'>R$ ".number_format($total_geral, 2, ',', '.')."</font>";

                ?>
            </center>
        </h3>
    </div>
    <div>

        <?php echo $ajax->form('add', 'post', array('model' => 'Saque', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>

        <br/>
        <fieldset>
            <legend><?php __(''); ?></legend>
            <div class="largura_quatro_colunas">
                <?php

                //echo $form->input('id');
                //echo $form->hidden('Obrigatorio', array('value'=>true));

                echo $form->hidden('usuario_id', array('label' => 'Usuario <font color="red">(*)</font>', 'empty' => '', 'class' => 'tres_colunas', 'value' => $id_usuario));

                echo $form->hidden('status', array('label' => 'status', 'class' => 'quatro_colunas', 'value' => 1));
                echo $form->hidden('transferencia', array('label' => 'Transferencia', 'class' => 'quatro_colunas', 'value' => 1));

                echo $form->input('saldo', array('label' => 'seu saldo', 'class' => 'quatro_colunas', 'value' => $total_geral, 'readonly' => 'readonly'));
                echo $form->input('valor', array('label' => 'valor a ser transferido <font color="red">(*)</font>', 'class' => 'quatro_colunas'));
                //                echo $form->input('username', array('label' => 'Informe o Login do destinatario <font color="red">(*)</font>', 'class' => 'tres_colunas'));
                //                echo $form->input('username', array('label' => 'Informe o Login do destinatario <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => '', 'options' => array(
                //                        'Corrente' => 'Corrente', 'Poupança' => 'Poupança')));
                ?>
                <label for="">Informe o Login do destinatario <font color="red">(*)</font></label>

                <select class="tres_colunas_select" name="usuario" id="">
                    <option value="">Selecine...</option>
                    <?php foreach ($usuarios as $usuario) {
                      ?>
                        <option value="<?php echo $usuario['Usuario']['id']; ?>"><?php echo $usuario['Usuario']['NomeUsuario'];?></option>
                    <?php } ?>
                </select>


                <?php

                echo '<br><br><br><br><br>';

                //echo '* Para proceguir e necessario completar o formulario de dados pessoais. <br><br>';
                echo '* O valor informado sera retirado de seu saldo e adicionado ao saldo do destinatario. <br><br>';
                // '* O valor solicitado será depositado na conta bancária cadastrada. <br><br>';
                echo '* Saque somente apartir de R$ 300,00 <br><br>';
                //echo '* Sera cobrado 5% para este serviço <br><br>';
                //echo '* Deposito sera confirmado  <br><br>';

                ?>
            </div>
        </fieldset>
        <?php
        echo $form->submit('Confirmar', array('div' => false));
        echo $form->end();
        ?>
    </div>

<?php } else { ?>

    <div class="cabecalho">
        <?php echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id_usuario), array('update' => 'inicial', 'before' => '$("#inicial").empty();'), null, false); ?>
        <h3>
            <center>
                <?php

                __('Solicitar saque');

                //$total_geral = number_format($total_geral, 2, ',', '.');

                //echo "seu saldo: <font color='green'>R$ ".number_format($total_geral, 2, ',', '.')."</font>";

                ?>
            </center>
        </h3>
    </div>
    <div>

        <?php echo $ajax->form('add', 'post', array('model' => 'Saque', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>

        <br/>
        <fieldset>
            <legend><?php __(''); ?></legend>
            <div class="largura_quatro_colunas">
                <?php

                //echo $form->input('id');
                //echo $form->hidden('Obrigatorio', array('value'=>true));

                echo $form->hidden('usuario_id', array('label' => 'Usuario <font color="red">(*)</font>', 'empty' => '', 'class' => 'tres_colunas', 'value' => $id_usuario));

                echo $form->hidden('status', array('label' => 'status', 'class' => 'quatro_colunas', 'value' => 1));

                echo $form->input('saldo', array('label' => 'seu saldo', 'class' => 'quatro_colunas', 'value' => $total_geral, 'readonly' => 'readonly'));
                echo $form->input('valor', array('label' => 'valor do saque <font color="red">(*)</font>', 'class' => 'quatro_colunas'));

                echo '<br><br><br><br><br>';

                echo '* Para proceguir e necessario completar o formulario de dados pessoais. <br><br>';
                echo '* O valor solicitado será depositado na conta bancária cadastrada. <br><br>';
                echo '* Saque somente apartir de R$ 300,00 <br><br>';
                echo '* Sera cobrado 5% para este serviço <br><br>';
                //echo '* Deposito sera confirmado  <br><br>';

                ?>
            </div>
        </fieldset>
        <?php
        echo $form->submit('Confirmar', array('div' => false));
        echo $form->end();
        ?>
    </div>

<?php } ?>
