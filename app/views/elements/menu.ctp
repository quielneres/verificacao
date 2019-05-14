<ul id="menu">
    <?php if ($session->read('Auth.Usuario.username')) {

        $id    = $session->read('Auth.Usuario.id');
        $ativo = $session->read('Auth.Usuario.Ativo');
        $acoes = $session->read('acoes');

        ?>


        <li><?php echo $ajax->link('Principal', array('controller' => 'usuarios', 'action' => 'principal'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>

        <?php if ($acoes[0] == '*:*') { ?>


            <li><?php echo $html->link(__('Administrativo', true), '#'); ?>
                <ul class="nivel_1">
                    <li><?php echo $ajax->link('Todas as Contas', array('controller' => 'usuarios', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <li><?php echo $ajax->link('Dados do Admin', array('controller' => 'usuarios', 'action' => 'edit/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <li><?php echo $ajax->link('Comissões', array('controller' => 'comissoes', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <li><?php echo $ajax->link('Investimento', array('controller' => 'noticias', 'action' => 'investimentos'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <li><?php echo $ajax->link('Tarifas', array('controller' => 'comissoes', 'action' => 'tarifa'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                </ul>
            </li>

        <?php } else { ?>
            <li><?php echo $ajax->link('Minha Rede', array('controller' => 'usuarios', 'action' => 'index1/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>


            <li><?php echo $html->link(__('Meus Dados', true), '#'); ?>
                <ul class="nivel_1">
                    <li><?php echo $ajax->link('Dados Pessoais', array('controller' => 'usuarios', 'action' => 'edit/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <li><?php echo $ajax->link('Meu Plano', array('controller' => 'usuarios', 'action' => 'edit2/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <!--<li><?php echo $ajax->link('Doação Mensal', array('controller' => 'usuarios', 'action' => 'edit3/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>-->
                </ul>
            </li>


        <?php } ?>


        <?php if ($ativo == 1) { ?>
            <li><?php echo $ajax->link('Nova Conta', array('controller' => 'usuarios', 'action' => 'add2/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        <?php } ?>

        <!--<li><?php echo $ajax->link('Notificações', array('controller' => 'noticias', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>-->

        <?php if ($ativo == 1) { ?>
            <li><?php echo $html->link(__('Financeiro', true), '#'); ?>
                <ul class="nivel_1">
                    <li><?php echo $ajax->link('Conta bancaria', array('controller' => 'bancos', 'action' => 'add/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <?php if ($acoes[0] == '*:*') { ?>
                        <li><?php echo $ajax->link('Extrato', array('controller' => 'usuarios', 'action' => 'financeiro'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                    <?php } else { ?>
                        <li><?php echo $ajax->link('Extrato', array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
                        <!--<li><?php echo $ajax->link('Saque', array('controller' => 'saques', 'action' => 'add/' . $id), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>-->
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php if ($acoes[0] == '*:*') { ?>
            <li><?php echo $ajax->link('Mensagens', array('controller' => 'mensagens', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        <?php } ?>

        <!--
        <li><?php echo $ajax->link('Clientes', array('controller' => 'clientes', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        <li><?php echo $ajax->link('Contratos', array('controller' => 'contratos', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        <li><?php echo $ajax->link('Retiradas de produtos', array('controller' => 'retiradas', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        <li><?php echo $ajax->link('Planos', array('controller' => 'planos', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        
        <li><?php echo $ajax->link('Estatisticas', array('controller' => 'contratos', 'action' => 'financeiro'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        
        <li><?php echo $ajax->link('Historicos', array('controller' => 'historicos', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        -->


        <!--
        <li><?php echo $html->link(__('Administrativo', true), '#'); ?>
        <ul class="nivel_1">
            <li><?php echo $ajax->link('Grupos', array('controller' => 'grupos', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
            <li><?php echo $ajax->link('Usuários', array('controller' => 'usuarios', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
            <li><?php echo $ajax->link('Permissões', array('controller' => 'permissoes', 'action' => 'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?></li>
        </ul>
        </li>
        -->


        <li class="sair"><?php echo $html->link('Sair', array('controller' => 'usuarios', 'action' => 'logout')); ?></li>

    <?php } //else { echo '<li class="sair"> SISTEMA Toop Life - Marketing multinível </li>'; } ?>

</ul>
