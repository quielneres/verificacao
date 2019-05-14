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

    .situacoInativa {
        padding: 5px;
        background: yellow;
        text-align: center;
    }

    .situacoAtiva {
        padding: 5px;
        background: #00aa00;
        text-align: center;

    }

    fieldset {
        text-align: center;
    }
</style>
<fieldset>
    <h1>Investidores</h1>
</fieldset>
<div class="cx_listagem">
    <table>
        <tr>
            <th>Nome</th>
            <th>data</th>
            <th>Situaçao</th>
            <th>Açoes</th>

        </tr>
        <?php
        foreach ($investimentos as $comissao) { ?>
            <tr>
                <td><?php echo $comissao['Investimento']['nome_usuario']; ?> fez um investimento de
                    <?php echo 'R$ ' . number_format($comissao['Investimento']['valor_investimento'], 2, ',', '.'); ?></td>
                <td>
                    <?php echo date('d/m/Y', strtotime($comissao['Investimento']['created'])); ?></td>
                <?php
                if ($comissao['Investimento']['ativo'] == 0) { ?>
                    <td>Aguardando confirmaçao</td>
                    <td class="situacoInativa"><?php echo $ajax->link('Validar',
                                                                      array(
                                                                          'controller' => 'noticias',
                                                                          'action' => 'investimentos/' . $comissao['Investimento']['id']),
                                                                      array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?>
                    </td>


                <?php } else { ?>
                    <td>Ativado</td>
                    <td class="situacoAtiva"><?php echo $ajax->link('Cancelar',
                                                                    array(
                                                                        'controller' => 'noticias',
                                                                        'action' => 'investimentos/' . $comissao['Investimento']['id']),
                                                                    array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?>
                    </td>
                <?php }
                ?>
            </tr>
        <?php } ?>
    </table>
</div>