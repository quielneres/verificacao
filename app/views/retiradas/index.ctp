<style>
.quatro_colunas{
	margin-left: 10px;
}
.form_busca div.input, .form_busca div.sem_direita, .form_busca div.calendario{
	height: 40px;
}
</style>
<?php 
    echo $this->element('flash');
    //echo $javascript->link('formularios/intervalo');   
?>
<div class="cabecalho">
<?php 
        
        echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Retirada', 'title'=>'Novo Retirada')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Lista de Retiradas</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Retirada', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>
		<div class="form_busca">
			<?php                   
                                echo $form->input('Cliente.nome', array('label' => 'cliente', 'type' => 'text', 'div' => false));
                                //cho $form->input('cpf_cnpj', array('label' => 'CPF', 'type' => 'text', 'div' => false));

                                echo $form->input('data', array('label' => 'data', 'type' => 'text', 'div' => false));
                                
                                echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($retiradas)): ?>

			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
                                        <th><?php echo $paginator->sort('cliente','Cliente.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('produto','produto', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('valor pago','valor_pago', $filter_options);?></th>
					<th><?php echo $paginator->sort('data','data', $filter_options);?></th>
					<?php echo '<th colspan="2"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($retiradas as $retirada):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                        <td><?php echo $retirada['Cliente']['nome']; ?> </td>    
					<td><?php echo $retirada['Retirada']['produto']; ?> </td>
                                        <td><?php echo 'R$ ' . $retirada['Retirada']['valor_pago']; ?> </td>
					<td><?php echo $retirada['Retirada']['data']; ?> </td>
					<?php 

                                        
					//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $retirada['Retirada']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';						
                     
                                        //echo '<td class="acoes" width="1.6%"></td>';                        

                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $retirada['Retirada']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';   
                   
                                        //echo '<td class="acoes" width="1.6%"></td>';                        
			                                     
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $retirada['Retirada']['id']), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';                   
                                  
                                         ?>
				</tr>
				<?php endforeach;?>				
			</table>
			<?php
				if (($paginator->numbers()) != "") :
					echo '<div class="paginacao"><b>Páginas: </b>'.$paginator->prev("« ".__("Anterior ", true), $filter_options, null); echo $paginator->numbers($filter_options); echo $paginator->next(__(" Próxima", true)." »", $filter_options, null)."</div>";
				endif;
			?> 
		<?php else: ?>
			<div class="vazio">Não há registro para serem exibidos.</div>
		<?php endif; ?>
	<?php echo $form->end(); ?>
</div>