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
    echo $javascript->link('formularios/intervalo');
?>
<div class="cabecalho">
<?php 

        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email.png', array('alt'=>'Enviar email para todos os clientes', 'title'=>'Enviar email para todos os clientes')), array('action'=>'email2'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>'; 

        echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Cliente', 'title'=>'Novo Cliente')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Lista de Clientes</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Cliente', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>
		<div class="form_busca">
			<?php                   
                                echo $form->input('nome', array('label' => 'Nome', 'type' => 'text', 'div' => false));
                                echo $form->input('cpf', array('label' => 'CPF', 'type' => 'text', 'div' => false));

                                echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($clientes)): ?>

			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
                                        <th><?php echo $paginator->sort('Nome','nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('CPF','cpf', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('E-mail','email', $filter_options);?></th>
					<?php echo '<th colspan="3"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($clientes as $cliente):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                        <td><?php echo $cliente['Cliente']['nome']; ?> </td>    
					<td><?php echo $cliente['Cliente']['cpf']; ?> </td>
                                        <td><?php echo $cliente['Cliente']['email']; ?> </td>
					<?php 

                                        
					//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $cliente['Cliente']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';						
                     
                                        //echo '<td class="acoes" width="1.6%"></td>';                        

                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $cliente['Cliente']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';   
                   
                                        //echo '<td class="acoes" width="1.6%"></td>';                        
			                                     
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $cliente['Cliente']['id']), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';
    
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email2.png', array('alt'=>'Enviar email', 'title'=>'Enviar email')), array('action'=>'email', $cliente['Cliente']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';                         
                                  
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