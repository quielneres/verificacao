<?php 
echo $this->element('flash');
?>
<div class="cabecalho">
	<?php 
		echo $ajax->link($html->image('ico_altera_24.gif', array('alt'=>'Alterar Grupo', 'title'=>'Alterar Grupo')), array('action'=>'edit', $grupo['Grupo']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		echo $ajax->link($html->image('ico_novo_24.gif', array('alt'=>'Novo Grupo', 'title'=>'Novo Grupo')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=> 'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
	?>
	<center><h3>Detalhe do Grupo</h3></center>
</div>
<table class="tabela_view">
	<tr><th colspan="3">Geral</th></tr>
	<tr>
		<td><b>Descrição:</b><br /><?php echo $grupo['Grupo']['Descricao']; ?></td>
		<td><b>Data de criação:</b><br /><?php echo date('d/m/Y - H:i:s', strtotime($grupo['Grupo']['created'])); ?></td>
		<td><b>Última atualização:</b><br /><?php echo date('d/m/Y - H:i:s', strtotime($grupo['Grupo']['modified'])); ?></td>
	</tr>
</table>
<table class="tabela_view">
	<tr><th colspan="4">Permissões</th></tr>
	<?php 
		$i = 0;
		foreach (array_chunk($grupo['Permissao'], 3) as $v1_permissao) {
			$class = null;
			if ($i++ % 2 != 0) { $class = ' class="zebra_detalhe"'; }
		    echo '<tr '.$class.'>';
		   	$colunas = count($v1_permissao);
		    foreach ($v1_permissao as $v2_permissao)
	        	echo '<td align="left">'.$v2_permissao['Alias'].' - '.$v2_permissao['combinacao'].'</td>';
	        if($colunas == 1) echo '<td></td><td></td>';
	        if($colunas == 2) echo '<td></td>';
	    	echo '</tr>';
		} 
	?>
</table>