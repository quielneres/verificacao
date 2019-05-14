<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .spanData {
        color: green;
    }

    .novaData {
        float: left;
        display: none;
    }
</style>
<div class="cabecalho">
    <!--    <form action="/comissoes/pagaComissao" method="post" class="formulario">-->
    <fieldset>
        <!--            <div id="dataAtual">-->
        Data atual: <span class="spanData"><?php echo date('d/m/Y H:m:s') ?></span><br>
        <?php echo $ajax->link('Pagar', array('controller' => 'comissoes', 'action' => 'index/1'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?>
        <!--                <a href="#" id="escolherData">Escolher uma data diferença</a>-->
        <!--            </div>-->
        <!--            <div class="novaData">-->
        <!--                <a href="#" id="cancelar">Data Atual</a><br>-->
        <!--                <input  type="text" class="tres_colunas">-->
        <!--            </div>-->
        <!--            <input type="submit"  value="Pagar">-->
        <?php echo $ajax->link('Pagar Ivestimento', array('controller' => 'comissoes', 'action' => 'pagarComissaoInvestiemnto'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?>

    </fieldset>
    </form>
    <div class="cx_listagem">
        <table>
            <tr>
                <th>Nome</th>
                <th>valor</th>
                <th>data</th>

            </tr>
            <?php
            foreach ($comissoes as $comissao) { ?>
                <tr>
                    <td><?php echo $comissao['Comissao']['nome_beneficiario']; ?></td>
                    <td>
                        <?php echo 'R$ ' . number_format($comissao['Comissao']['valor_comissao'], 2, ',', '.'); ?></td>
                    <td>
                        <?php echo date('d/m/Y', strtotime($comissao['Comissao']['created'])); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    $('#escolherData').click(function () {
        $('#dataAtual').hide();
        $('.novaData').show();
    });

    $('#cancelar').click(function () {
        $('#dataAtual').show();
        $('.novaData').hide();
    });
</script>