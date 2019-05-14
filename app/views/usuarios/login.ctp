<?php
$session->flash();
$session->flash('auth');
echo $javascript->link('flash');
echo $this->element('flash');

echo '<br>';
//echo '<center><font size="3"><b>Bem vindo ao sistema de administrativo da sistema</font></center>';
?>

<?php echo '<b>Ainda não tem uma conta? <a title="Cadastrar Nova Conta" href="usuarios/add/1"><font size="2">Cadastre-se aqui</font></a></b> <br>'; ?>

<?php echo '<b>Recuperar senha e login <a title="Recuperar Senha e Login" href="usuarios/email"><font size="2">Aqui</font></a></b>'; ?>

<div id="cx_login">

    <?php echo '<center><font size="3"><b>Autenticação</font></center>'; ?>

    <?php echo $form->create('Usuario', array('action' => 'login', 'class', 'tres_colunas')); ?>
    <?php echo $form->input('username', array('label' => 'LOGIN:')); ?>
    <?php echo $form->input('password', array('label' => 'SENHA:')); ?>
    <div class="g-recaptcha" data-sitekey="6LfAepgUAAAAAINLbQb118gWZKUq3alyBxC4eo_L"></div>
    <?php echo $form->end('Entrar'); ?>

</div>
<style>
    #cx_login{
       padding-right: 30px;
        height: 20%;
    }
    .g-recaptcha{
        width: 50%;
    }
</style>