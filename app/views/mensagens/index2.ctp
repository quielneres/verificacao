<style>
    .quatro_colunas {
        margin-left: 10px;
    }

    .form_busca div.input, .form_busca div.sem_direita, .form_busca div.calendario {
        height: 40px;
    }
</style>
<?php
echo $this->element('flash');
echo $javascript->link('formularios/intervalo');
?>
<!--<div class="cabecalho">
<?php
$ativo = $session->read('Auth.Usuario.Ativo');

//echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Nova Mensagem', 'title'=>'Nova Mensagem')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Lista de Mensagens</h3></center>
</div>-->
<?php if ($ativo == 1) { ?>
    <div class="cx_listagem">
        <?php echo $ajax->form('index', 'post', array('model' => 'Mensagem', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'id' => 'filters')); ?>
        <div class="form_busca">
            <?php
            //echo $form->input('mensagem', array('label' => 'Mensagem', 'type' => 'text', 'div' => false));

            //echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
            //echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));
            ?>
        </div>

        <?php if (!empty($mensagens)): ?>

            <!--<div class="total"><?php $paginator->options(array('update' => 'inicial', 'before' => '$("#inicial").empty();'));
            echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>-->
            <!--<table border="3">-->
            <tr>
                <!--<th><b><?php echo $paginator->sort('Mensagem', 'mensagem', $filter_options); ?></b></th>-->
                <?php //echo '<th colspan="2"></th>'; ?>
            </tr>
            <?php

            $i = 0;
            foreach ($mensagens as $mensagem):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="zebra"';
                }
                ?>
                <tr<?php echo $class; ?>>

                    <td align="justify"><?php echo $mensagem['Mensagem']['mensagem']; ?></td>
                    <br><br>
                    <?php


                    //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $mensagem['Mensagem']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';

                    //echo '<td class="acoes" width="1.6%"></td>';

                    //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $mensagem['Mensagem']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';

                    //echo '<td class="acoes" width="1.6%"></td>';

                    //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $mensagem['Mensagem']['id']), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';

                    ?>
                </tr>
            <?php endforeach; ?>
            <!--</table>-->
            <?php
            if (($paginator->numbers()) != "") :
                echo '<div class="paginacao"><b>Páginas: </b>' . $paginator->prev("« " . __("Anterior ", true), $filter_options, null);
                echo $paginator->numbers($filter_options);
                echo $paginator->next(__(" Próxima", true) . " »", $filter_options, null) . "</div>";
            endif;
            ?>
        <?php else: ?>
            <div class="vazio">Não há registro para serem exibidos.</div>
        <?php endif; ?>
        <?php echo $form->end(); ?>
    </div>
<?php }else{ ?>
<div class="cx_listagem">
    <fieldset>
        <div><span style="font-size:18px;"><strong><br></strong></span><span style="font-size:20px;"><strong>Como funciona</strong></span><span style="font-size:18px;"><strong></strong></span><br></div>
        <div><span style="font-size:18px;"><strong><br>         </strong> Após fazer o deposito ou transferencia, você acessará seu escritório virtual em nosso site utilizando login e senha cadastrado e enviará o comprovante de deposito ou transferencia que foi realizado. Após isto, o sistema irá confirma o valor. Assim que confirmado, você já estará ativo e poderá entrar no seu escritório contendo um link (endereço virtual) para a divulgação de cadastro. A partir da&iacute; o seu trabalho já poderá ser iniciado. </span><br></div>
        <div><span style="font-size:18px;"></span><br></div>
        <div><strong><span style="font-size:18px;">Segue abaixo dados para depósito (Obs: Colocar nome completo, CPF no comprovante)</span></strong><br></div>
        <div><span style="font-size:18px;"></span><span style="font-size:20px;"><br></span></div>
        <div><span style="font-size:20px;">               </span><br></div>
        <div><span style="font-size:20px;"><strong></strong></span><br></div>
        <div><span style="font-size:20px;"><strong>     </strong></span><span style="font-size:18px;"><strong>TOOP LIFE AGENCIAMENTOS DE SERVIÇOS EIRELI</strong></span></div>
        <div><span style="font-size:18px;">      CNPJ: <strong>28.966.488/0001-25</strong></span></div>
        <div><span style="font-size:18px;">      BANCO :  <strong> ITAÚ UNIBANCO S/A</strong></span></div>
        <div><span style="font-size:18px;">      AGENCIA : <strong>4338</strong></span></div>
        <div><span style="font-size:18px;">      CONTA CORRENTE:<strong> 40603-8</strong></span></div>
        <div><span style="font-size:18px;"></span><br></div>
        <div><span style="font-size:20px;"><strong>     </strong></span><span style="font-size:18px;"><strong>TOOP LIFE AGENCIAMENTOS DE SERVIÇOS EIRELI</strong></span></div>
        <div><span style="font-size:18px;">      BANCO :  <strong>Caixa</strong></span></div>
        <div><span style="font-size:18px;">      AGENCIA : <strong>3444 </strong></span></div>
        <div><span style="font-size:18px;">      CONTA CORRENTE:<strong>00003161 - 2</strong></span></div>
        <div><span style="font-size:18px;">      Operação:<strong>003</strong></span></div>
        <div><span style="font-size:18px;">&#8203;</span><br></div>
        <div><strong></strong><span style="font-size:18px;"></span><span style="font-size:18px;"></span><span style="font-size:18px;"></span><span style="font-size:18px;">&#8203;&#8203;</span><strong>Enviar comprovante para afiliado@toopife.com.br</strong></div>
    </fieldset>
</div>
<?php } ?>
