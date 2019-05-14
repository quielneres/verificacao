<?php
session_name("AgenciaTime");
session_start();
include ("../include/funcoes.php");
//include ("layout1.php");

if($_GET[id_venda] == ""){

if(ValidaPermissao(1,$_COOKIE["id_usuario"],4) == 0)
{
	echo "<script>";
	echo "alert('Voce nao tem permissao para acessar essa tela!');";
        echo "location.href='principal_os.php'";
	echo "</script>";
}

// DADOS DO VENDA ---------------------------------------------------
$sql_os = mysql_query("SELECT id_cliente,total_geral,numero_os FROM tb_os WHERE id_oficina=$_COOKIE[id_oficina] AND numero_os = ".$_GET[id_os]);
$numero_os = $_GET[id_os];
if(mysql_num_rows($sql_os)>0){    
$id_cliente   	= mysql_result($sql_os,0,"id_cliente");
$total_geral2 	= mysql_result($sql_os,0,"total_geral");
$numero_documento = mysql_result($sql_os,0,"numero_os");
}
// FIM DOS DADOS DA VENDA ---------------------------------------------------

}else{
    
if(ValidaPermissao(1,$_COOKIE["id_usuario"],4) == 0)
{
	echo "<script>";
	echo "alert('Voce nao tem permissao para acessar essa tela!');";
        echo "location.href='principal_vendas.php'";
	echo "</script>";
}

// DADOS DO VENDA ---------------------------------------------------
$sql_venda = mysql_query("SELECT id_cliente,total_geral,numero_venda FROM tb_vendas WHERE id_oficina=$_COOKIE[id_oficina] AND numero_venda = ".$_GET[id_venda]);
$numero_venda = $_GET[id_venda];
if(mysql_num_rows($sql_venda)>0){    
$id_cliente   	= mysql_result($sql_venda,0,"id_cliente");
$total_geral2 	= mysql_result($sql_venda,0,"total_geral");
$numero_documento = mysql_result($sql_venda,0,"numero_venda");
}
// FIM DOS DADOS DA VENDA --------------------------------------------------- 
}

//DADOS DO EMITENTE -----------------------------------------------------------
$sql_emitente = mysql_query("SELECT razao_social,cnpj,endereco,cidade,estado FROM tb_emitentes WHERE id_oficina=".$_COOKIE[id_oficina]);
if(mysql_num_rows($sql_emitente)>0){
	//$logotipo = mysql_result($sql_emitente,0,"logotipo");
        $razaosocial = mysql_result($sql_emitente,0,"razao_social");
        $cnpj = mysql_result($sql_emitente,0,"cnpj");
        $endereco1 = mysql_result($sql_emitente,0,"endereco");
        $cidade1 = mysql_result($sql_emitente,0,"cidade");
        $uf1 = mysql_result($sql_emitente,0,"estado");
}
// FIM DADOS DO EMITENTE ------------------------------------------------------

// DADOS DO CLIENTE -----------------------------------------------------------
$sql_cliente = mysql_query("SELECT tipo_pessoa,nome,razao_social,endereco,cep FROM tb_clientes WHERE id_oficina=$_COOKIE[id_oficina] AND id_cliente=".$id_cliente);
if(mysql_num_rows($sql_cliente)>0){    
$tipo_pessoa  = mysql_result($sql_cliente,0,"tipo_pessoa");
$nome2 		  = mysql_result($sql_cliente,0,"nome");
$razao2 	  = mysql_result($sql_cliente,0,"razao_social");
$endereco2 	  = mysql_result($sql_cliente,0,"endereco");
$cep2	  = mysql_result($sql_cliente,0,"cep");
}
// FIM DOS DADOS DO CLIENTE ---------------------------------------------------

if($tipo_pessoa == 1){
$nome_cli = $nome2;
}else{
$nome_cli = $razao2;
}        
$cep2 = (str_replace("-","",$cep2));        
        
 // PEGA DADOS DA CONTA BANCARIA -----------------------------------------------------------
        $sql_consulta = "SELECT * FROM tb_boletos WHERE id_oficina=$_COOKIE[id_oficina]";
	$s = mysql_query($sql_consulta);	
	if(mysql_num_rows($s)>0)
	{	
                $banco	= mysql_result($s,0,"banco");
                $tipo_conta     = mysql_result($s,0,"tipo_conta");
                $agencia        = mysql_result($s,0,"agencia");
                $conta          = mysql_result($s,0,"conta");
                $digito         = mysql_result($s,0,"digito");
                $carteira 	= mysql_result($s,0,"carteira");
                $dias_de_prazo  = mysql_result($s,0,"dias_de_prazo");
                $taxa_boleto    = mysql_result($s,0,"taxa_boleto");
                $nosso_numero 	= mysql_result($s,0,"nosso_numero");
                $demonstrativo1	= mysql_result($s,0,"demonstrativo1");
                $demonstrativo2	= mysql_result($s,0,"demonstrativo2");
                $demonstrativo3 = mysql_result($s,0,"demonstrativo3");
                $instrucoes1 	= mysql_result($s,0,"instrucoes1");
                $instrucoes2    = mysql_result($s,0,"instrucoes2");
                $instrucoes3 	= mysql_result($s,0,"instrucoes3");
                $instrucoes4 	= mysql_result($s,0,"instrucoes4");
                //$conta_cedente  = mysql_result($s,0,"conta_cedente");
                //$conta_cedente_dv = mysql_result($s,0,"conta_cedente_dv");
                $identificacao 	= mysql_result($s,0,"identificacao"); 
                $quantidade 	= mysql_result($s,0,"quantidade");
                $valor_unitario = mysql_result($s,0,"valor_unitario");
                $aceite 	= mysql_result($s,0,"aceite");
                $especie 	= mysql_result($s,0,"especie");
                $especie_doc 	= mysql_result($s,0,"especie_doc");                
                $convenio 	= mysql_result($s,0,"convenio");
                $contrato 	= mysql_result($s,0,"contrato");
	}
// FIM DADOS DA CONTA BACARIA  ------------------------------------------------------ 


// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;
//$taxa_boleto = 2.95;

$data_venc = date("d/m/Y", time() + ($dias_de_prazo * 86400));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = $total_geral2; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal

$valor_cobrado = str_replace(".", "",$valor_cobrado);

$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');


$dadosboleto["nosso_numero"] = $numero_documento;  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
$dadosboleto["numero_documento"] = $numero_documento; // Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $nome_cli;
$dadosboleto["endereco1"] = $endereco2;
$dadosboleto["endereco2"] = $cidade2." - ".$uf." - CEP: ".$cep2;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $demonstrativo1;
$dadosboleto["demonstrativo2"] = $demonstrativo2;
$dadosboleto["demonstrativo3"] = $demonstrativo3;

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = $instrucoes1;
$dadosboleto["instrucoes2"] = $instrucoes2;
$dadosboleto["instrucoes3"] = $instrucoes3;
$dadosboleto["instrucoes4"] = $instrucoes4;

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = $quantidade;
$dadosboleto["valor_unitario"] = $valor_unitario;
$dadosboleto["aceite"] = $aceite;		
$dadosboleto["especie"] = $especie;
$dadosboleto["especie_doc"] = $especie_doc;

// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"] = $agencia; // Num da agencia, sem digito
$dadosboleto["agencia_dv"] = ""; // Digito do Num da agencia
$dadosboleto["conta"] = $conta; // Num da conta, sem digito
$dadosboleto["conta_dv"] = $digito; // Digito do Num da conta

// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"] = $conta; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = $digito; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = $carteira;  // Código da Carteira: pode ser 06 ou 03

// SEUS DADOS
$dadosboleto["identificacao"] = $identificacao;
$dadosboleto["cpf_cnpj"] = $cnpj;
$dadosboleto["endereco"] = $endereco1;
$dadosboleto["cidade_uf"] = $cidade1. ' - ' .$uf1;
$dadosboleto["cedente"] = $razaosocial;

// NÃO ALTERAR!
include("include/funcoes_bradesco.php");
include("include/layout_bradesco.php");
?>
