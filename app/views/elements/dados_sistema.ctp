<?php
$id_usuario = $session->read('Auth.Usuario.id');
$ativo = $session->read('Auth.Usuario.Ativo');
?>


<div id="dados_sistema">  

    <!--<p id="versao"><b>Sistema ADM</b></p>-->

    <br>
    
    <?php    
    if($session->read('Auth.Usuario.username')) {
    ?>
      
    <p><?php echo ($session->read('Auth.Usuario.username')) ? $session->read('Auth.Usuario.Empresa'): ''; ?></p>    
    &nbsp;&nbsp;&nbsp;
       <a href="http://afiliado.tooplife.com.br/" title="Clique para acessar o site" target="_blank"><img src="https://afiliado.tooplife.com.br/sistema/app/webroot/img/tooplifelogo.jpeg" width="180px" height=70px"></a>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php //echo $session->read('SaldoTotal'); ?>
    
<?php

if($id_usuario == 1){   
   echo "<b> <font size='5'> AREA ADMINISTRATIVA </font> </b><br>";
   }elseif($id_usuario != 1 && $ativo == 1){
   echo "<b> <font size='2'> Seu Link: &nbsp;&nbsp; </font> <font size='2' style='text-transform: lowercase'> https://afiliado.tooplife.com.br/sistema/usuarios/add/$id_usuario  </font>  </b>";   
   }
   
?>                               
    <!--
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <font size="3">

    Doador: <b><?php //echo ($session->read('Auth.Usuario.username')) ? $session->read('Auth.Usuario.NomeUsuario'): ''; ?></b>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <b>R$ 00,00</b>
    
    </font>
    -->
    
    
    <?php } else { ?>

    &nbsp;&nbsp;&nbsp;
    <a href="http://afiliado.tooplife.com.br/" title="Clique para acessar o site" target="_blank"><img src="https://afiliado.tooplife.com.br/sistema/app/webroot/img/tooplifelogo.jpeg" width="180px" height=70px"></a>
        
    <?php } ?>    
    
</div>