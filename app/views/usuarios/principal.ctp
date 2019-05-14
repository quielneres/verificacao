<?php 
	$session->flash('auth');
	echo $this->element('flash');
        $id_usuario = $session->read('Auth.Usuario.id');
        $nome_usuario = $session->read('Auth.Usuario.NomeUsuario');
        $plano = $session->read('Auth.Usuario.plano');
        
        if ( $plano == 1 ) { $plano_descricao = '1º Plano Do.Partner - R$ 50,00'; }
        if ( $plano == 2 ) { $plano_descricao = '2º Plano Do.Bronze - R$ 100,00'; }
        if ( $plano == 3 ) { $plano_descricao = '3º Plano Do.Silver - R$ 300,00'; }
        if ( $plano == 4 ) { $plano_descricao = '4º Plano Do.Crystal - R$ 500,00'; }                                                        
        if ( $plano == 5 ) { $plano_descricao = '5º Plano Do.Gold - R$ 1.000,00'; }
        if ( $plano == 6 ) { $plano_descricao = '6º Plano Do.Diamond - R$ 3.000,00'; }
        if ( $plano == 7 ) { $plano_descricao = '7º Plano Do.Diamond Plus - R$ 5.000,00'; }
        if ( $plano == 8 ) { $plano_descricao = '8º Plano Do.Ruby - R$ 10.000,00'; }
        
        //$ativo = $session->read('Auth.Usuario.Ativo');
        
        /*
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        $n1_30 = $session->read('n1_30');
        
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');
        $n1_3 = $session->read('n1_3');       
        
        $valorBinario = $session->read('binario');
        */
        
        //echo $n1_30; 
        
?> 

<br>

<script language="javascript">
function abrir_pop(url, name, feature)
{
    window.open(url, name, feature);
}     
</script>

 
<?php 

//echo '<font size="3"> Olá <b>'.$nome_usuario.'</b>! </font>';
//echo '<br><br>';
//echo '<font color="black"> Seja bem vindo!. </font>';

if (!empty($banco)) { 

echo '<font size="3"> Olá <b>'.$nome_usuario.'</b>! </font>';
echo '<br><br>';
echo '<font color="red"> Sua conta está INATIVA. </font>';
echo '<br>';
echo '<font color="red"> Para ativar pague o Boleto Abaixo referente ao plano que você escolheu. </font>';
echo '<br><br>';
echo $plano_descricao;
echo '<br><br>'; 

?>    

<!--<div class="duas_colunas"><a href="javascript:abrir_pop('https://www.inovesystem.com.br/boleto/<?=$banco?>.php?id_usuario=<?=$id_usuario?>', 'Boleto', 'width=700,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário">Imprimir boleto Bancário</a></div>-->

<?php if($id_usuario != 1){ ?>

<?php if($plano == 1 && $id_usuario != 1){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="6F72398D353545CDD49CEF97458D8990" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 2){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="7B4617FAADAD878EE4DA8FBEF4295158" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 3){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="594F45523434FD8EE4A3FF966912E47D" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 4){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="1A1DC8B32B2B4DA664081FBF90ACE913" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 5){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="DAA4F13F5C5C8A9444D7CFBAF0643023" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 6){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="D8DEB9F58989961224BD6FBA3E1219FE" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 7){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="CCB9D5A91414880EE4A51F966C2AF191" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>


<?php if($plano == 8){ ?>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="9B19D5D2E6E6B8FDD430AFABDBC7A62B" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<?php } ?>

<?php } ?>

<?php } ?>


<font size="3" color="black">
    
<?php /* if ($ativo == 1) {  
    
    
    //echo $n1_30;     
    
   if (!empty($n1_30)) { $n30 = $n1_30; }
   if (!empty($n2_30)) { $n30 = $n2_30; }
   if (!empty($n3_30)) { $n30 = $n3_30; } 
   if (!empty($n4_30)) { $n30 = $n4_30; }
   if (!empty($n5_30)) { $n30 = $n5_30; }
   if (!empty($n6_30)) { $n30 = $n6_30; }
   if (!empty($n7_30)) { $n30 = $n7_30; }
   if (!empty($n8_30)) { $n30 = $n8_30; }
    
   if (!empty($n1_3)) { $n3 = $n1_3; }
   if (!empty($n2_3)) { $n3 = $n2_3; }
   if (!empty($n3_3)) { $n3 = $n3_3; }
   if (!empty($n4_3)) { $n3 = $n4_3; }
   if (!empty($n5_3)) { $n3 = $n5_3; }
   if (!empty($n6_3)) { $n3 = $n6_3; }
   if (!empty($n7_3)) { $n3 = $n7_3; }
   if (!empty($n8_3)) { $n3 = $n8_3; }
    

$total_rede = $n30 + $n3;
$total_binario = $valorBinario;
$total_mensal = '';

$total_saldo2 = $total_rede + $total_binario + $total_mensal;
$total_saldo = number_format($total_saldo2, 2, ',', '.');

$total_rede = number_format($total_rede, 2, ',', '.');
$total_binario = number_format($total_binario, 2, ',', '.');
$total_mensal = number_format($total_mensal, 2, ',', '.');

    
echo 'SALDO TOTAL: '.$total_saldo;
echo '<br><br>';
echo 'Total Rede: '.$total_rede;
echo '<br>';
echo 'Total Binário: '.$total_binario;
echo '<br>';
echo 'Total Mensal: '.$total_mensal;
echo '<br><br>';    


    
}
 * 
 */
?>

</font>