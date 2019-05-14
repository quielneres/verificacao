<?php
echo $this->element('flash');
?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Nova Permissão', 'title'=>'Nova Permissão')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3>Listagem de Permissões</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Permissao', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
		<div class="form_busca">
			<?php
				echo $form->input('Alias', array('label' => 'Alias ', 'div' => false));
				echo $form->input('combinacao', array('label' => 'Controller / Action ', 'div' => false));
				echo $html->tag('button', '', array('type' => 'submit', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($permissoes)): ?>
			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
					<th><?php echo $paginator->sort('Alias','Alias', $filter_options);?></th>
					<th><?php echo $paginator->sort('Controller / Action','combinacao', $filter_options);?></th>
					<th width="18%"><?php echo $paginator->sort('Data de Criação','created', $filter_options);?></th>
					<th width="18%"><?php echo $paginator->sort('Atualizado','modified', $filter_options);?></th>
					<?php echo '<th colspan="2"></th>'; ?>
				</tr>
				<?php
					$i = 0;
					foreach ($permissoes as $permissao):
						$class = null;
						if ($i++ % 2 != 0) { $class = ' class="zebra"'; }
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $permissao['Permissao']['Alias']; ?></td>
					<td><?php echo $permissao['Permissao']['combinacao']; ?></td>
					<td><?php echo date('d/m/Y - H:i:s', strtotime($permissao['Permissao']['created'])); ?></td>
					<td><?php echo date('d/m/Y - H:i:s', strtotime($permissao['Permissao']['modified'])); ?></td>
					<?php
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $permissao['Permissao']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $permissao['Permissao']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>'; 
					?>
				</tr>
				<?php 
					endforeach;
					if (($paginator->numbers()) != "") :
						echo '<tr><td colspan="6" class="paginacao"><b>Páginas: </b>'.$paginator->prev("« ".__("Anterior ", true), $filter_options, null); echo $paginator->numbers($filter_options); echo $paginator->next(__(" Próxima", true)." »", $filter_options, null).'</td></tr>';
					endif; 
				?>
			</table>
		<?php else: ?>
			<div class="vazio">Não há registros para serem exibidos.</div>
		<?php endif; ?>
	<?php echo $form->end(); ?>
</div>