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

        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email.png', array('alt'=>'Enviar email para todos os clientes', 'title'=>'Enviar email para todos os clientes')), array('action'=>'email2'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>'; 
        
        //echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Historico', 'title'=>'Novo Historico')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Historico do Contrato</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Historico', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>
		<?php if (!empty($historicos)): ?>
			<table>
				<tr>
                                        <th><?php echo $paginator->sort('cliente','Cliente.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('plano','Plano.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('inicio','inicio_vigencia', $filter_options);?></th>
					<th><?php echo $paginator->sort('termino','termino_vigencia', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('status','status', $filter_options);?></th>
                                        <?php echo '<th colspan="1"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($historicos as $historico):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                        <td><?php echo $historico['Cliente']['nome']; ?> </td>    
					<td><?php echo $historico['Plano']['nome']; ?> </td>
                                        <td><?php echo $historico['Historico']['inicio_vigencia']; ?> </td>
					<td><?php echo $historico['Historico']['termino_vigencia']; ?> </td>
                                        <td><?php echo $historico['Historico']['status']; ?> </td>

					<?php
                                        
					//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $historico['Historico']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';						
                     
                                        //echo '<td class="acoes" width="1.6%"></td>';                        

                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $historico['Historico']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';   
                   
                                        //echo '<td class="acoes" width="1.6%"></td>';                        
			                                     
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $historico['Historico']['id'],$idCliente), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';                   
                                  
                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email2.png', array('alt'=>'Enviar email', 'title'=>'Enviar email')), array('action'=>'email', $historico['Historico']['cliente_id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        
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