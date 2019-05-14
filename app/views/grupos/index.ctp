<?php
echo $this->element('flash');
?>
<div class="cabecalho">
	<?php echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Grupo', 'title'=>'Novo Grupo')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3>Listagem de Grupos</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Grupo', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
		<div class="form_busca">
			<?php
				echo $form->input('Descricao', array('label' => 'Descrição ', 'div' => false));
				echo $html->tag('button', '', array('type' => 'submit', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($grupos)): ?>
			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
					<th><?php echo $paginator->sort('Descrição','Descricao', $filter_options);?></th>
					<th width="18%"><?php echo $paginator->sort('Data de Criação','created', $filter_options);?></th>
					<th width="18%"><?php echo $paginator->sort('Atualizado','modified', $filter_options);?></th>
					<?php echo '<th colspan="3"></th>'; ?>
				</tr>
				<?php
					$i = 0;
					foreach ($grupos as $grupo):
						$class = null;
						if ($i++ % 2 != 0) { $class = ' class="zebra"'; }
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $grupo['Grupo']['Descricao']; ?></td>
					<td><?php echo date('d/m/Y - H:i:s', strtotime($grupo['Grupo']['created'])); ?></td>
					<td><?php echo date('d/m/Y - H:i:s', strtotime($grupo['Grupo']['modified'])); ?></td>
					<?php
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $grupo['Grupo']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $grupo['Grupo']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $grupo['Grupo']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>'; 
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