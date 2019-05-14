    <?php
echo $this->element('flash');
?>
<div class="cabecalho">
	<?php //echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Doador', 'title'=>'Novo Doador')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3>Lista de Contas</h3></center>
</div>
<div class="cx_listagem"> 
	<?php echo $ajax->form('index', 'post', array('model'=>'Usuario', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
		<div class="form_busca">
			<?php
				echo $form->input('NomeUsuario', array('label' => 'Nome ', 'div' => false));
                                echo $form->input('plano', array('label' => 'Plano', 'div' => false)); 
                                echo $form->input('Ativo', array('label'=>'Ativo', 'empty'=>'Escolha...', 'options'=>array(1=>'SIM', '2'=>'NÃO'), 'div' => false));
                                
                                echo $html->tag('button', '', array('type' => 'submit', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($usuarios)): ?>
			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
					<th><?php echo $paginator->sort('Nome','NomeUsuario', $filter_options);?></th>
					<th><?php echo $paginator->sort('Plano','plano', $filter_options);?></th>
					<th><?php echo $paginator->sort('Ativo','Ativo', $filter_options);?></th>
					<?php echo '<th colspan="5"></th>'; ?>
				</tr>
				<?php
					$i = 0;
					foreach ($usuarios as $usuario):
						$class = null;
						if ($i++ % 2 != 0) { $class = ' class="zebra"'; }
				?>
				<tr<?php echo $class;?>>
					<!--<td><?php //echo $usuario['Usuario']['NomeUsuario']; ?></td>-->
                                        
                                        <td><?php echo $ajax->link($usuario['Usuario']['NomeUsuario'], array('controller'=> 'usuarios', 'action'=>'index1', $usuario['Usuario']['id']), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();'));?></td>

					<td>
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
						<?php
							echo ($usuario['Usuario']['Ativo'] == 1) ? 'Sim': ' ';
							echo ($usuario['Usuario']['Ativo'] == 2) ? 'Não': ' ';
						?>
					</td>
					<?php
                                                //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('restaurar.png', array('alt'=>'Mais Níveis', 'title'=>'Mais Níveis')), array('action'=>'index1', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Dados Pessoais', 'title'=>'Alterar Dados Pessoais')), array('action'=>'edit', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                                echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_bueiro_16.gif', array('alt'=>'Dados do Plano', 'title'=>'Alterar Dados do Plano')), array('action'=>'edit2', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                                //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_versao_16.gif', array('alt'=>'Doação Mensal', 'title'=>'Alterar Dados de Doação Mensal')), array('action'=>'edit3', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                                echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('enviado.png', array('alt'=>'Financeiro', 'title'=>'Financeiro')), array('action'=>'financeiro2', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>'; 
					?>
				</tr>
				<?php 
					endforeach;
					if (($paginator->numbers()) != "") :
						echo '<tr><td colspan="8" class="paginacao"><b>Páginas: </b>'.$paginator->prev("« ".__("Anterior ", true), $filter_options, null); echo $paginator->numbers($filter_options); echo $paginator->next(__(" Próxima", true)." »", $filter_options, null).'</td></tr>';
					endif; 
				?>
			</table>
		<?php else: ?>
			<div class="vazio">Não há registros para serem exibidos.</div>
		<?php endif; ?>
	<?php echo $form->end(); ?>
</div>