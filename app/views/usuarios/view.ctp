<?php 
	echo $this->element('flash');
?>
<div class="cabecalho">
	<?php 
		//echo $ajax->link($html->image('ico_altera_24.gif', array('alt'=>'Alterar Doador', 'title'=>'Alterar Doador')), array('action'=>'edit', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_novo_24.gif', array('alt'=>'Novo Doador', 'title'=>'Novo Doador')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=> 'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
	?>
	<center><h3>Detalhe da Conta</h3></center>
</div>
<table class="tabela_view">
	<tr><th colspan="2">Geral</th></tr>
	<tr>
		<td><b>Nome:</b><br /><?php echo $usuario['Usuario']['NomeUsuario']; ?></td>
                <td><b>E-mail:</b><br /><?php echo $usuario['Usuario']['email']; ?></td>
	</tr>
        
	<tr class="zebra_detalhe">
		<td><b>Telefone:</b><br /><?php echo $usuario['Usuario']['telefone']; ?></td>
                <td><b>Login:</b><br /><?php echo $usuario['Usuario']['username']; ?></td>
	</tr>  
        
        <tr>
                <td>
			<b>Plano:</b><br />
			<?php                                
                                echo ($usuario['Usuario']['plano'] == 1) ? '1º Plano Do.Partner - R$ 50,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 2) ? '2º Plano Do.Bronze - R$ 100,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 3) ? '3º Plano Do.Silver - R$ 300,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 4) ? '4º Plano Do.Crystal - R$ 500,00': ' ';                                                        
                                echo ($usuario['Usuario']['plano'] == 5) ? '5º Plano Do.Gold - R$ 1.000,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 6) ? '6º Plano Do.Diamond - R$ 3.000,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 7) ? '7º Plano Do.Diamond Plus - R$ 5.000,00': ' ';
                                echo ($usuario['Usuario']['plano'] == 8) ? '8º Plano Do.Ruby - R$ 10.000,00': ' ';
			?>
		</td>
                
                <td>
			<b>Ativo:</b><br />
			<?php
				echo ($usuario['Usuario']['Ativo'] == 1) ? 'Sim': ' ';
				echo ($usuario['Usuario']['Ativo'] == 2) ? 'Não': ' ';
			?>
		</td>
        </tr>   
        
        <tr class="zebra_detalhe">
                <td><b>Última atualização:</b><br /><?php echo date('d/m/Y - H:i:s', strtotime($usuario['Usuario']['modified'])); ?></td>
                <td><b>Data de criação:</b><br /><?php echo date('d/m/Y - H:i:s', strtotime($usuario['Usuario']['created'])); ?></td>
	</tr>
        
</table>


<!--
<table class="tabela_view">
	<tr><th colspan="4">Grupos</th></tr>
	<?php 
		$i = 0;
		foreach (array_chunk($usuario['Grupo'], 3) as $v1_grupo) {
			$class = null;
			if ($i++ % 2 != 0) { $class = ' class="zebra_detalhe"'; }
		    echo '<tr '.$class.'>';
		   	$colunas = count($v1_grupo);
		    foreach ($v1_grupo as $v2_grupo)
	        	echo '<td>'.$v2_grupo['Descricao'].'</td>';
	        if($colunas == 1) echo '<td></td><td></td>';
	        if($colunas == 2) echo '<td></td>';
	    	echo '</tr>';
		}
	?>
</table>
-->