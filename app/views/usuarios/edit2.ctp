<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
$acoes        = $session->read('acoes');
$id_usuario   = $session->read('Auth.Usuario.id');
$ativo        = $session->read('Auth.Usuario.Ativo');
$plano1       = $session->read('Auth.Usuario.plano');
$display_none = '';

if ($ativo == 1) {
    $ativo2 = 'Ativa';
} else {
    $ativo2 = 'Inativa';
}

if ($plano1 == 1) {
    $plano2  = '1º Plano - R$ 150,00';
    $options = '<option value="2">2º Plano - R$ 225,00</option>
                            <option value="3">3º Plano - R$ 300,00</option>
                            <option value="4">4º Plano - R$ 500,00</option>
                            <option value="5">5º Plano - R$ 1.000,00</option>
                            <option value="6">6º Plano - R$ 3.000,00</option>
                            <option value="7">7º Plano - R$ 5.000,00</option>
                            <option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 2) {
    $plano2  = '2º Plano - R$ 225,00';
    $options = '            <option value="3">3º Plano - R$ 300,00</option>
                            <option value="4">4º Plano - R$ 500,00</option>
                            <option value="5">5º Plano - R$ 1.000,00</option>
                            <option value="6">6º Plano - R$ 3.000,00</option>
                            <option value="7">7º Plano - R$ 5.000,00</option>
                            <option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 3) {
    $plano2  = '3º Plano - R$ 300,00';
    $options = '<option value="4">4º Plano  - R$ 500,00</option>
                            <option value="5">5º - R$ 1.000,00</option>
                            <option value="6">6º - R$ 3.000,00</option>
                            <option value="7">7º - R$ 5.000,00</option>
                            <option value="8">8º - R$ 10.000,00</option>';
}
if ($plano1 == 4) {
    $plano2  = '4º Plano - R$ 500,00';
    $options = '<option value="5">5º Plano - R$ 1.000,00</option>
                            <option value="6">6º Plano - R$ 3.000,00</option>
                            <option value="7">7º Plano - R$ 5.000,00</option>
                            <option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 5) {
    $plano2  = '5º Plano - R$ 1.000,00';
    $options = '<option value="6">6º Plano - R$ 3.000,00</option>
                <option value="7">7º Plano - R$ 5.000,00</option>
                <option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 6) {
    $plano2  = '6º Plano - R$ 3.000,00';
    $options = '<option value="7">7º Plano - R$ 5.000,00</option><option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 7) {
    $plano2  = '7º Plano - R$ 5.000,00';
    $options = '<option value="8">8º Plano - R$ 10.000,00</option>';
}
if ($plano1 == 8) {
    $plano2 = '8º Plano - R$ 10.000,00';
    $display_none = 'style="display: none"';
}

?>

<script language="javascript">
    function abrir_pop(url, name, feature) {
        window.open(url, name, feature);
    }
</script>

<!--<a href="javascript:abrir_pop('../../../../boleto/<?= $banco ?>.php?id_usuario=<?= $id_usuario ?>', 'Boleto', 'width=800,height=600,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário"><img src="images/boleto.gif" width="22" height="18" border="0"></a>-->

<div class="cabecalho">
    <?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
    <center><h3><?php __('Dados do Plano'); ?></h3></center>
</div>
<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('edit2', 'post', array('model' => 'Usuario', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>


    <fieldset>
        <legend><?php __('Geral'); ?></legend>
        <?php
        echo $form->input('id');
        echo $form->hidden('Obrigatorio', array('value' => false));
        echo $form->hidden('usuario_id', array('label' => 'Usuario <font color="red">(*)</font>', 'empty' => '', 'class' => 'tres_colunas'));

        if ($acoes[0] == '*:*'){
        echo $form->input('Ativo', array('label' => 'Ativo <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção', 'options' => array(1 => 'Sim', 2 => 'Não')));
        echo $form->input('plano', array('label' => 'Plano <font color="red">(*)</font>  ', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção', 'options' => array(1 => '1º Plano - R$ 150,00', 2 => '2º Plano - R$ 225,00', 3 => '3º Plano - R$ 300,00', 4 => '4º Plano - R$ 500,00', 5 => '5º Plano - R$ 1.000,00', 6 => '6º Plano - R$ 3.000,00', 7 => '7º Plano - R$ 5.000,00', 8 => '8º Plano - R$ 10.000,00')));
        //echo $form->input('link', array('label'=>'Link', 'value'=>'http://www.tooplife.com.br/sistema/usuarios/add/'.$id , 'class'=>'duas_colunas'));

        ?><!--<div class="duas_colunas"><a href="javascript:abrir_pop('../../../../boleto/<?= $banco ?>.php?id_usuario=<?= $id_usuario ?>', 'Boleto', 'width=660,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário">Imprimir boleto Bancário</a></div>--><?php

        } else {
            //echo $form->input('Ativo', array('label'=>'Ativo <font color="red">(*)</font>', 'readonly'=>'readonly', 'type'=>'text', 'class'=>'tres_colunas'));
            if ($ativo == 1) {
                //echo $form->input('plano', array('label'=>'Plano <font color="red">(*)</font>', 'readonly'=>'readonly', 'class'=>'tres_colunas_select', 'empty'=>'Selecione uma opção', 'options'=> array(1=>'1º Plano Do.Partner - R$ 50,00', 2=>'2º Plano Do.Bronze - R$ 100,00', 3=>'3º Plano Do.Silver - R$ 300,00', 4=>'4º Plano Do.Crystal - R$ 500,00', 5=>'5º Plano Do.Gold - R$ 1.000,00', 6=>'6º Plano Do.Diamond - R$ 3.000,00', 7=>'7º Plano Do.Diamond Plus - R$ 5.000,00', 8=>'8º Plano Do.Ruby - R$ 10.000,00')));
                //echo $form->input('link', array('label'=>'Link', 'value'=>'http://www.tooplife.com.br/sistema/usuarios/add/'.$id , 'class'=>'duas_colunas'));

                ?>
                <div class="uma_coluna">
                    <font size="3" style="text-transform: uppercase" color="black">Conta:</font> <font size="3"
                                                                                                       style="text-transform: uppercase"
                                                                                                       color="green"><?= $ativo2 ?></font><br><br>
                    <div id="planoAtual">
                        <font size="3" style="text-transform: uppercase" color="black">Plano:</font> <font size="3"
                                                                                                           style="text-transform: uppercase"
                                                                                                           color="green"><?= $plano2 ?>

                            <a href="#" id="abrirNovoPlano" <?php echo $display_none ?> title="Alterar plano">Alterar plano</a></font><br><br>
                    </div>
                    <div class="alterar" style="display: none">
                        <font color="red">
                            Observação: </font> Ao atualizar seu plano você deverá entrar no sistema novamente para que as informações sejam atualizadas.
                        <font size="3" style="text-transform: uppercase" color="black">Selecione um novo Plano:</font>
                        <select name="plano" id="" class="tres_colunas_select">
                            <option value="">Selecione...</option>
                            <?php echo $options ?>

                        </select>
                        <input type="hidden" value="<?php echo $id_usuario ?>" name="id_usuario">
                        <input type="hidden" value="<?php echo $plano1 ?>" name="plano_usuario">

                        <div class="botoes_alterar_plano">
                            <div class="cancelar_novo_plano">

                                <a href="#" class="linkCancelar">cancelar</a>
                            </div>
                        </div>
                    </div>
                    <font size="3" style="text-transform: uppercase" color="black">Validade:</font> <font size="3"
                                                                                                          style="text-transform: uppercase"
                                                                                                          color="green">
                        1 Ano </font><br><br>
                    <!--                            <font size="3" style="text-transform: uppercase" color="black">Cadastro:</font> <font size="3" style="text-transform: uppercase" color="green"> -->
                    <?php //echo date('d/m/Y', strtotime($cadastro))
                    ?><!-- </font><br><br>-->
                    <font size="3" style="text-transform: uppercase" color="black">Data de Início:</font> <font
                            size="3" style="text-transform: uppercase"
                            color="green"><?php echo date('d/m/Y', strtotime($cadastro)) ?>    </font><br><br>
                    <font size="3" style="text-transform: uppercase" color="black">Data de vencimento:</font> <font
                            size="3" style="text-transform: uppercase"
                            color="green"><?php echo date('d/m/Y', strtotime($data_vencimento)) ?></font><br><br>
                    <font size="3" style="text-transform: uppercase" color="black">Restam:</font> <font size="3"
                                                                                                        style="text-transform: uppercase"
                                                                                                        color="green"> <?php echo "$dias dia(s) para o vencimento do seu cadastro!"; ?> </font><br><br>
                </div>
                <?php

            } else {
                echo $form->input('plano', array('label' => 'Plano <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção', 'options' => array(1 => '1º Plano - R$ 150,00', 2 => '2º Plano - R$ 2250,00', 3 => '3º Plano - R$ 300,00', 4 => '4º Plano  - R$ 500,00', 5 => '5º Plano - R$ 1.000,00', 6 => '6º Plano - R$ 3.000,00', 7 => '7º Plano - R$ 5.000,00', 8 => '8º Plano - R$ 10.000,00')));
                //echo $form->input('link', array('label'=>'Link', 'value'=>'' , 'class'=>'duas_colunas'));

                echo '<br><br><br><br><br><br>';

                ?>
                <div><font size="2">Conta:</font> <font size="3" color="red"><?= $ativo2 ?></font><br><br>
                    <font size="2"> para ativar sua conta e começar a utilizar o sistema, pague o boleto na pagina
                        principal</font>
                </div>

                <br><br>

                <font color="black">
                    Observação: </font> Ao atualizar seu plano você deverá entrar no sistema novamente para que as informações sejam atualizadas.

                <!--                <a href="javascript:abrir_pop('../../../../boleto/--><?//= $banco
//                ?><!--.php?id_usuario=--><?////=$id_usuario
//                ?><!--', 'Boleto', 'width=660,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')"-->
                <!--                   title="Gerar boleto bancário">Imprimir boleto</a>-->-->
                <!---->
                <!--                --><?php

            }
        }

        ?>
    </fieldset>
    <?php
    echo $form->submit('Atualizar');
    echo $form->end();
    ?>
</div>
<style>
    .alterar {
        border-radius: 5px;
        background: white;
        padding: 10px;
        height: 70px;
        margin-bottom: 10px;
    }

    .botoes_alterar_plano {
        float: right;
        margin-top: 40px;
    }

    .cancelar_novo_plano {
        padding-top: 3px;
        float: inherit;
    }

    .salvar_novo_plano {
        float: inherit;

    }

    .linkCancelar {
    }
</style>
<script>
    $("#abrirNovoPlano").click(function () {
        $("#planoAtual").hide();
        $(".alterar").show();
    });

    $('.linkCancelar').click(function () {
        $(".alterar").hide();
        $("#planoAtual").show();
    });
</script>