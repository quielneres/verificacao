<?php 

echo $this->element('flash');

$id = $session->read('Auth.Usuario.id');
        
$totalValorDoador = $n130 + $n23 + $n33 + $n43 + $n53 + $n63 + $n73 + $n83;        
$totalQtdDoador = $qtd1 + $qtd2 + $qtd3 + $qtd4 + $qtd5 + $qtd6 + $qtd7 + $qtd8;
$totalValorBinario = $binarioN1 + $binarioN2 + $binarioN3 + $binarioN4 + $binarioN5 + $binarioN6 + $binarioN7 + $binarioN8; 
$totalQtdBinario = $qtdN1 + $qtdN2 + $qtdN3 + $qtdN4 + $qtdN5 + $qtdN6 + $qtdN7 + $qtdN8;  

$total_geral = $totalValorDoador + $totalValorBinario - $totalRetirada;

?>

<div class="cabecalho">
	<?php 
		//echo $ajax->link($html->image('ico_altera_24.gif', array('alt'=>'Alterar Doador', 'title'=>'Alterar Doador')), array('action'=>'edit', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_novo_24.gif', array('alt'=>'Novo Doador', 'title'=>'Novo Doador')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=> 'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
	?>
	<center><h3>Financeiro</h3></center>
</div>
<table class="tabela_view">
	<tr><th colspan="2">Total</th></tr>
	<tr>
            <td><b>SALDO: </b> R$ <?php echo number_format($total_geral, 2, ',', '.'); ?></td>
            
            <td><?php if ($id != 1){ echo $ajax->link($html->image('sacar10.png', array('alt'=>'Solicitar Saque', 'title'=>'Solicitar Saque')), array('controller'=> 'saques', 'action'=>'add/'.$total_geral), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); } ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            
	</tr>
        
        <tr>
            <td><b>SAQUES: </b> R$ <?php echo number_format($totalRetirada, 2, ',', '.'); ?></td>
            <td></td>
	</tr>
        
</table>

<table class="tabela_view">
	<tr><th colspan="2">Doadores em sua Rede</th></tr>
	<tr>
		<td><b>Nivel 1: </b> <?php echo $qtd1; ?> Doadores - R$ <?php echo number_format($n130, 2, ',', '.'); ?></td>
                <td><b>Nivel 2: </b> <?php echo $qtd2; ?> Doadores - R$ <?php echo number_format($n23, 2, ',', '.'); ?></td>
	</tr>
        
        <tr>
                <td><b>Nivel 3: </b> <?php echo $qtd3; ?> Doadores - R$ <?php echo number_format($n33, 2, ',', '.'); ?></td>
                <td><b>Nivel 4: </b> <?php echo $qtd4; ?> Doadores - R$ <?php echo number_format($n43, 2, ',', '.'); ?></td>
        </tr> 
        
        <tr>
		<td><b>Nivel 5: </b> <?php echo $qtd5; ?> Doadores - R$ <?php echo number_format($n53, 2, ',', '.'); ?></td>
                <td><b>Nivel 6: </b> <?php echo $qtd6; ?> Doadores - R$ <?php echo number_format($n63, 2, ',', '.'); ?></td>
	</tr>
        
        <tr>
                <td><b>Nivel 7: </b> <?php echo $qtd7; ?> Doadores - R$ <?php echo number_format($n73, 2, ',', '.'); ?></td>
                <td><b>Nivel 8: </b> <?php echo $qtd8; ?> Doadores - R$ <?php echo number_format($n83, 2, ',', '.'); ?></td>
        </tr>
        
        <tr>
                <td><b>Quantidade Total de Doadores: </b> <?php echo $totalQtdDoador; ?></td>
                <td><b>Valor Total de Doadores: </b> R$ <?php echo number_format($totalValorDoador, 2, ',', '.'); ?> </td>                
        </tr>
            
</table>


<table class="tabela_view">
	<tr><th colspan="2">Binário em sua Rede</th></tr>
	<tr>
		<td><b>Nivel 1: </b> <?php echo $qtdN1; ?> Binário - R$ <?php echo number_format($binarioN1, 2, ',', '.'); ?></td>
                <td><b>Nivel 2: </b> <?php echo $qtdN2; ?> Binário - R$ <?php echo number_format($binarioN2, 2, ',', '.'); ?></td>
	</tr>
        
        <tr>
                <td><b>Nivel 3: </b> <?php echo $qtdN3; ?> Binário - R$ <?php echo number_format($binarioN3, 2, ',', '.'); ?></td>
                <td><b>Nivel 4: </b> <?php echo $qtdN4; ?> Binário - R$ <?php echo number_format($binarioN4, 2, ',', '.'); ?></td>
        </tr> 
        
        <tr>
		<td><b>Nivel 5: </b> <?php echo $qtdN5; ?> Binário - R$ <?php echo number_format($binarioN5, 2, ',', '.'); ?></td>
                <td><b>Nivel 6: </b> <?php echo $qtdN6; ?> Binário - R$ <?php echo number_format($binarioN6, 2, ',', '.'); ?></td>
	</tr>
        
        <tr>
                <td><b>Nivel 7: </b> <?php echo $qtdN7; ?> Binário - R$ <?php echo number_format($binarioN7, 2, ',', '.'); ?></td>
                <td><b>Nivel 8: </b> <?php echo $qtdN8; ?> Binário - R$ <?php echo number_format($binarioN8, 2, ',', '.'); ?></td>
        </tr>
        
        <tr>
                <td><b>Quantidade Total de Binário: </b> <?php echo $totalQtdBinario; ?></td>
                <td><b>Valor Total de Binário: </b> R$ <?php echo number_format($totalValorBinario, 2, ',', '.');; ?></td>		
        </tr>
            
</table>
