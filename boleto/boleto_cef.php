<?php

//header('Content-type: text/html; charset=UTF-8');

include ("conexao.php");

$id_usuario = $_GET['id_usuario'];

//DADOS DO EMITENTE -----------------------------------------------------------
$sql_emitente = mysql_query("SELECT NomeUsuario,telefone,email FROM usuarios WHERE id = 1");
if(mysql_num_rows($sql_emitente)>0){
        $nome_emitente = mysql_result($sql_emitente,0,"NomeUsuario");
        $telefone_emitente = mysql_result($sql_emitente,0,"telefone");
        $email_emitente = mysql_result($sql_emitente,0,"email");
}
// FIM DADOS DO EMITENTE ------------------------------------------------------


//DADOS DO CLIENTE -----------------------------------------------------------
$sql_cliente = mysql_query("SELECT NomeUsuario,telefone,email,plano FROM usuarios WHERE id =".$id_usuario);
if(mysql_num_rows($sql_cliente)>0){
        $nome_cliente = mysql_result($sql_cliente,0,"NomeUsuario");
        $telefone_cliente = mysql_result($sql_cliente,0,"telefone");
        $email_cliente = mysql_result($sql_cliente,0,"email");
        $plano_cliente = mysql_result($sql_cliente,0,"plano");
}
// FIM DADOS DO CLIENTE ------------------------------------------------------ 

if ($plano_cliente == 1) { $valor = '50,00'; }
if ($plano_cliente == 2) { $valor = '100,00'; }
if ($plano_cliente == 3) { $valor = '300,00'; }
if ($plano_cliente == 4) { $valor = '500,00'; }
if ($plano_cliente == 5) { $valor = '1.000,00'; }
if ($plano_cliente == 6) { $valor = '3.000,00'; }
if ($plano_cliente == 7) { $valor = '5.000,00'; }
if ($plano_cliente == 8) { $valor = '10.000,00'; }

        
 // PEGA DADOS DA CONTA BANCARIA -----------------------------------------------------------
        $sql_banco = "SELECT * FROM bancos WHERE id = 1";
	$s = mysql_query($sql_banco);	
	if(mysql_num_rows($s)>0)
	{	
                $banco	= mysql_result($s,0,"banco");
                $tipo_conta     = mysql_result($s,0,"tipo");
                $agencia        = mysql_result($s,0,"agencia");
                $agencia_dv         = mysql_result($s,0,"agenciaDV");
                $conta          = mysql_result($s,0,"conta");                
                $conta_dv         = mysql_result($s,0,"contaDV");                
                $carteira 	= mysql_result($s,0,"carteira");
                $dias_de_prazo  = mysql_result($s,0,"diasPrazo");
                $taxa_boleto    = mysql_result($s,0,"taxaBoleto");
                $nosso_numero 	= mysql_result($s,0,"nossoNumero");
                $demonstrativo	= mysql_result($s,0,"demonstrativo");
                $instrucoes 	= mysql_result($s,0,"instrucoes");
                $identificacao 	= mysql_result($s,0,"identificacao"); 
                $aceite 	= mysql_result($s,0,"aceite");
                $especie 	= mysql_result($s,0,"especie");
                $especie_doc 	= mysql_result($s,0,"especieDoc");                
                $convenio 	= mysql_result($s,0,"convenio");
                $contrato 	= mysql_result($s,0,"contrato");
	}
// FIM DADOS DA CONTA BACARIA  ------------------------------------------------------  

$numero_documento = '000'.$id_usuario;

// DADOS DO BOLETO PARA O SEU CLIENTE
$data_venc = date("d/m/Y", time() + ($dias_de_prazo * 86400));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = $valor; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal

$valor_cobrado = str_replace(".", "",$valor_cobrado);
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');


$dadosboleto["inicio_nosso_numero"] = $nosso_numero;  // Carteira SR: 80, 81 ou 82  -  Carteira CR: 90 (Confirmar com gerente qual usar)
$dadosboleto["nosso_numero"] = $numero_documento;  // Nosso numero sem o DV - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = $numero_documento;	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $nome_cliente;
$dadosboleto["endereco1"] = $telefone_cliente;
$dadosboleto["endereco2"] = $email_cliente;

/*
$dadosboleto["endereco1"] = $endereco2;
$dadosboleto["endereco2"] = $cidade2." - ".$uf." - CEP: ".$cep2;
*/

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $demonstrativo;
$dadosboleto["demonstrativo2"] = '';
$dadosboleto["demonstrativo3"] = '';

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = $instrucoes;
$dadosboleto["instrucoes2"] = '';
$dadosboleto["instrucoes3"] = '';
$dadosboleto["instrucoes4"] = '';

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = '';
$dadosboleto["valor_unitario"] = '';
$dadosboleto["aceite"] = $aceite;		
$dadosboleto["especie"] = $especie;
$dadosboleto["especie_doc"] = $especie_doc;


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = $agencia; // Num da agencia, sem digito
$dadosboleto["conta"] = $conta; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = $conta_dv; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = $conta; // ContaCedente do Cliente, sem digito (Somente Numeros)
$dadosboleto["conta_cedente_dv"] = $conta_dv; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = $carteira;  // Codigo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = $identificacao;
$dadosboleto["cpf_cnpj"] = $telefone_emitente;
$dadosboleto["endereco"] = $email_emitente;
$dadosboleto["cidade_uf"] = '';
$dadosboleto["cedente"] = '';

/*
$dadosboleto["cpf_cnpj"] = $cnpj;
$dadosboleto["endereco"] = $endereco1;
$dadosboleto["cidade_uf"] = $cidade1. ' - ' .$uf1;
$dadosboleto["cedente"] = $razaosocial;
*/

// NÃO ALTERAR!
include("include/funcoes_cef.php"); 
include("include/layout_cef.php");
?>
