<?php

echo $this->element('flash');

$id = $session->read('Auth.Usuario.id');

$totalValorDoador  = $n130 + $n23 + $n33 + $n43 + $n53 + $n63 + $n73 + $n83;
$totalQtdDoador    = $qtd1 + $qtd2 + $qtd3 + $qtd4 + $qtd5 + $qtd6 + $qtd7 + $qtd8;
$totalValorBinario = $binarioN1 + $binarioN2 + $binarioN3 + $binarioN4 + $binarioN5 + $binarioN6 + $binarioN7 + $binarioN8;
$totalQtdBinario   = $qtdN1 + $qtdN2 + $qtdN3 + $qtdN4 + $qtdN5 + $qtdN6 + $qtdN7 + $qtdN8;

$total_geral = $totalValorDoador + $totalValorBinario + $comissao + $totalRecebido - $totalRetirada - $totalTransaferido - $totalTaxaMudanca - $taxaManutencao;

?>

<div class="cabecalho">
    <?php
    //echo $ajax->link($html->image(
    //'ico_altera_24.gif', array(
    //'alt'=>'Alterar Doador',
    // 'title'=>'Alterar Doador'
    //)), array(
    //'action'=>'edit',
    // $usuario['Usuario']['id']),
    // array('update'=>'inicial',
    // 'indicator'=>'ajax_load',
    // 'before'=>'$("#inicial").empty();'), null, false);
    //echo $ajax->link($html->image('ico_novo_24.gif',
    // array('alt'=>'Novo Doador',
    // 'title'=>'Novo Doador')),
    // array('action'=>'add'),
    // array('update'=>'inicial',
    // 'indicator'=>'ajax_load',
    // 'before'=>'$("#inicial").empty();'), null, false);
    //echo $ajax->link($html->image('ico_voltar_24.gif',
    // array('alt' => 'Voltar',
    // 'title' => 'Voltar')),
    // array('action'=>'index'),
    // array('update'=>'inicial',
    // 'indicator'=> 'ajax_load',
    // 'before'=>'$("#inicial").empty();'), null, false);
    ?>
    <center><h3>Financeiro</h3></center>
</div>
<table class="tabela_view">
    <tr>
        <th colspan="2">Total</th>
    </tr>
    <tr>
        <td><b>SALDO: </b> R$ <?php echo number_format($total_geral, 2, ',', '.'); ?></td>
        <td><?php if ($id != 1) {
                $data =  explode('-', date('Y-m-d'));
                $dia = intval($data[2]);

                if($dia >= 9 && $dia <= 11){
                    echo $ajax->link($html->image('sacar10.png',
                        array(
                            'alt' => 'Solicitar Saques',
                            'title' => 'Solicitar Saque')),
                        array(
                            'controller' => 'saques',
                            'action' => 'add/' . $total_geral),
                        array(
                            'update' => 'inicial',
                            'indicator' => 'ajax_load',
                            'before' => '$("#inicial").empty();'), null, false);
                }

            } ?>
            <?php if ($id != 1) {
                echo $ajax->link($html->image('sacar11.png',
                                              array(
                                                  'alt' => 'Transferir para outra conta',
                                                  'title' => 'Transferir para outra conta')),
                                 array('controller' => 'saques', 'action' => "add/$total_geral/1"),
                                 array(
                                     'update' => 'inicial',
                                     'indicator' => 'ajax_load',
                                     'before' => '$("#inicial").empty();'), null, false);
            } ?>
        </td>
    </tr>

    <tr>
        <td><b>Taxa de manutençao: </b> R$ <?php echo number_format($taxaManutencao, 2, ',', '.'); ?></td>
        <td></td>
    </tr>

    <tr>
        <td><b>SAQUES: </b> R$ <?php echo number_format($totalRetirada, 2, ',', '.'); ?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>TRANSFERÊNCIAS: </b> R$ <?php echo number_format($totalTransaferido, 2, ',', '.'); ?></td>
        <td></td>
    </tr>
    <tr>
        <td><b>RECEBIDO: </b> R$ <?php echo number_format($totalRecebido, 2, ',', '.'); ?></td>
        <td></td>
    </tr>
  <!--    <tr>-->
<!--        <td><b>comissão investimento: </b> R$ --><?php //echo number_format($comissao_investimento, 2, ',', '.'); ?><!--</td>-->
<!--        <td></td>-->
<!--    </tr>-->

    <?php
    if ($comissao >= 4) { ?>
        <tr>
            <td><b>comissão: </b> R$ <?php echo number_format($comissao, 2, ',', '.'); ?></td>
            <td></td>
        </tr>
    <?php } ?>
    <?php
    if ($totalTaxaMudanca > 0) { ?>
        <tr>
            <td><b>Taxa de mudança de plano: </b> R$ <?php echo '-' . number_format($totalTaxaMudanca, 2, ',', '.'); ?>
            </td>
            <td></td>
        </tr>
    <?php } ?>
</table>
<table class="tabela_view">
    <tr>
        <th colspan="2">Afiliados em sua Rede</th>
    </tr>
    <tr>
        <td><b>Nivel 1: </b> <?php echo $qtd1; ?> Afiliados - R$ <?php echo number_format($n130, 2, ',', '.'); ?></td>
        <td><b>Nivel 2: </b> <?php echo $qtd2; ?> Afiliados - R$ <?php echo number_format($n23, 2, ',', '.'); ?></td>
    </tr>

    <tr>
        <td><b>Nivel 3: </b> <?php echo $qtd3; ?> Afiliados - R$ <?php echo number_format($n33, 2, ',', '.'); ?></td>
        <td><b>Nivel 4: </b> <?php echo $qtd4; ?> Afiliados - R$ <?php echo number_format($n43, 2, ',', '.'); ?></td>
    </tr>

    <tr>
        <td><b>Nivel 5: </b> <?php echo $qtd5; ?> Afiliados - R$ <?php echo number_format($n53, 2, ',', '.'); ?></td>
        <td><b>Nivel 6: </b> <?php echo $qtd6; ?> Afiliados - R$ <?php echo number_format($n63, 2, ',', '.'); ?></td>
    </tr>

    <tr>
        <td><b>Nivel 7: </b> <?php echo $qtd7; ?> Afiliados - R$ <?php echo number_format($n73, 2, ',', '.'); ?></td>
        <td><b>Nivel 8: </b> <?php echo $qtd8; ?> Afiliados - R$ <?php echo number_format($n83, 2, ',', '.'); ?></td>
    </tr>

    <tr>
        <td><b>Quantidade Total de Afiliados: </b> <?php echo $totalQtdDoador; ?></td>
        <td><b>Valor Total de Afiliados: </b> R$ <?php echo number_format($totalValorDoador, 2, ',', '.'); ?> </td>
    </tr>

</table>
<table class="tabela_view">
    <tr>
        <th colspan="2">Binário em sua Rede</th>
    </tr>
    <tr>
        <td><b>Nivel 1: </b> <?php echo $qtdN1; ?> Binário - R$ <?php echo number_format($binarioN1, 2, ',', '.'); ?>
        </td>
        <td><b>Nivel 2: </b> <?php echo $qtdN2; ?> Binário - R$ <?php echo number_format($binarioN2, 2, ',', '.'); ?>
        </td>
    </tr>

    <tr>
        <td><b>Nivel 3: </b> <?php echo $qtdN3; ?> Binário - R$ <?php echo number_format($binarioN3, 2, ',', '.'); ?>
        </td>
        <td><b>Nivel 4: </b> <?php echo $qtdN4; ?> Binário - R$ <?php echo number_format($binarioN4, 2, ',', '.'); ?>
        </td>
    </tr>

    <tr>
        <td><b>Nivel 5: </b> <?php echo $qtdN5; ?> Binário - R$ <?php echo number_format($binarioN5, 2, ',', '.'); ?>
        </td>
        <td><b>Nivel 6: </b> <?php echo $qtdN6; ?> Binário - R$ <?php echo number_format($binarioN6, 2, ',', '.'); ?>
        </td>
    </tr>

    <tr>
        <td><b>Nivel 7: </b> <?php echo $qtdN7; ?> Binário - R$ <?php echo number_format($binarioN7, 2, ',', '.'); ?>
        </td>
        <td><b>Nivel 8: </b> <?php echo $qtdN8; ?> Binário - R$ <?php echo number_format($binarioN8, 2, ',', '.'); ?>
        </td>
    </tr>

    <tr>
        <td><b>Quantidade Total de Binário: </b> <?php echo $totalQtdBinario; ?></td>
        <td><b>Valor Total de Binário: </b> R$ <?php echo number_format($totalValorBinario, 2, ',', '.');; ?></td>
    </tr>

</table>
<fieldset style="margin-top: 10px;">
    <center><h2>Meus Investimentos</h2></center>
    <a href="#" id="abreDivInvestimanto">fazer Investimento</a>
    <div id="formInvestimento" class="divInvestir" style="display: none">
        <?php
        echo $form->create(array(
                               'action' => 'edit2',
                               'class' => 'formulario'
                           )); ?>

        <input type="hidden" name="idUsuario" value="<?php echo $id; ?>">
        <input type="hidden" name="investimento" value="investimento">
        <label>Digite o valor do investimento</label>
        <input type="text" class="dilma" name="valorInvestimento">
        <input type="submit" value="Enviar">
        <?php
        echo $form->end();
        ?>

        <a href="#" id="cancelarDivIvestimento" style="display: none">Cancelar</a>
        <p style="color: red; margin-top: 10px">*O valor minimo para investimento é
            de 1.000,00</p>
    </div>
    <?php
    if (count($investimentos) == 0) {
        echo '<fieldset><center><h4>Nao possui investimentos</h4></center></fieldset>';
    } else {
        ?>
        <table class="tabela_view">
            <?php
            foreach ($investimentos as $investimento) {
                if ($investimento['Investimento']['ativo'] == 0) {
                    echo '<tr><td style="background: white">Aguardando validação pelo administrador para o investimento no valor de R$ ' . number_format($investimento['Investimento']['valor_investimento'], 2, ',', '.') . '</td></tr>';
                } else {
                    echo '<tr><td style="background: #00aa00; color: white">investimento confirmado no valor de R$ ' . number_format($investimento['Investimento']['valor_investimento'], 2, ',', '.') . '</td></tr>';
                }
            }
            ?>
        </table>
    <?php } ?>
</fieldset>
<style>
    .divInvestir {
        background: white;
        width: 50%;
        border-radius: 5px;
        padding: 2%;
        text-align: left;
        margin-bottom: 2%;
    }

    .divInvestir form {
        text-align: left;
        margin-bottom: 3%;
    }
</style>
<script>

    $('.dilma').setMask({mask: '99,999.999', type: 'reverse'});
    $('#abreDivInvestimanto').click(function () {

        $('#formInvestimento').show();
        $('#abreDivInvestimanto').hide();
        $('#cancelarDivIvestimento').show();
    });
    $('#cancelarDivIvestimento').click(function () {
        $('#formInvestimento').hide();
        $('#cancelarDivIvestimento').hide();
        $('#abreDivInvestimanto').show();
    });
</script>