
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
    $id_usuario = $session->read('Auth.Usuario.id');
?>

<!--
<div class="cabecalho">
<?php 
        
        //echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Noticia', 'title'=>'Novo Noticia')), array('controller'=> 'noticias', 'action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Notificações Importantes</h3></center>
</div>
-->

<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Noticia', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>
		<!--<div class="form_busca">
			<?php                   
                                echo $form->input('descricao', array('label' => 'descricao', 'type' => 'text', 'div' => false));
                                //cho $form->input('cpf_cnpj', array('label' => 'CPF', 'type' => 'text', 'div' => false));

                                echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));
			?>
		</div>-->
		<?php if (!empty($noticias)): ?>

                        <!--
			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
                        -->
                        
			<table>
				<tr>
                                        <th><?php echo $paginator->sort('Notificações Importantes','descricao', $filter_options);?></th>
                                        <!--<th><?php echo $paginator->sort('status','status', $filter_options);?></th>-->
					<?php echo '<th colspan="4"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($noticias as $noticia):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                        <td><?php echo $noticia['Noticia']['descricao']; ?> </td>    
					<td><?php 
                                        
                                        //echo $noticia['Noticia']['status'];                                         
                                        
                                        ?> </td>
					<?php 
					
                                        if($id_usuario == 1){
                                        
                                        if($noticia['Noticia']['status'] == 0){                                                                               
                                        
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('inativo.png', array('alt'=>'Ativar Conta', 'title'=>'Ativar Conta')), array('controller'=> 'usuarios', 'action'=>'edit2', $noticia['Noticia']['usuario_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_24.gif', array('alt'=>'Dados Pessoais', 'title'=>'Alterar Dados Pessoais')), array('controller'=> 'usuarios', 'action'=>'edit', $noticia['Noticia']['usuario_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        echo '<td class="acoes" width="1.6%"></td>'; 
                                        
                                        }else{
                                            
                                        if($noticia['Noticia']['status'] == 1){
                                          echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('confirmar.png', array('alt'=>'Clique para Confirmar Pagamento', 'title'=>'Clique para Confirmar Pagamento')), array('controller'=> 'saques', 'action'=>'edit', $noticia['Noticia']['saque_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        }else{
                                          echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('pago.png', array('alt'=>'O Valor foi Pago ao Doador', 'title'=>'O Valor foi Pago ao Doador')), array('controller'=> 'usuarios', 'action'=>'principal'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        }
                                          
                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image($imagem, array('alt'=>'', 'title'=>'')), array('controller'=> 'saques', 'action'=>'edit', $noticia['Noticia']['saque_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('banco2.jpg', array('alt'=>'Visualizar Conta Bancária do Doador', 'title'=>'Visualizar Conta Bancária do Doador')), array('controller'=> 'bancos', 'action'=>'add', $noticia['Noticia']['usuario_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('financeiro4.jpg', array('alt'=>'Viualizar Financeiro do Doador', 'title'=>'Viualizar Financeiro do Doador')), array('controller'=> 'usuarios', 'action'=>'financeiro2', $noticia['Noticia']['usuario_id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                            
                                        }                                        
                                        
                                        }else{
                                            
                                        if($noticia['Noticia']['status'] == 0){

                                        echo '<td class="acoes" width="1.6%"></td>';
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        
                                        }else{  
                                            
                                        if($noticia['Noticia']['status'] == 1){
                                          echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('aguardando.png', array('alt'=>'Aguardando Pagamento', 'title'=>'Aguardando Pagamento')), array('controller'=> 'usuarios', 'action'=>'principal'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        }else{
                                          echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('pago.png', array('alt'=>'O Valor foi Depositado em sua Conta Bancária', 'title'=>'O Valor foi Depositado em sua Conta Bancária')), array('controller'=> 'usuarios', 'action'=>'principal'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        }
                                            
                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image($imagem, array('alt'=>'', 'title'=>'')), array('controller'=> 'usuarios', 'action'=>'principal'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        echo '<td class="acoes" width="1.6%"></td>';

                                        }
                                        
                                        }
                                        
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
			<!--<div class="vazio">Não há registro para serem exibidos.</div>-->
		<?php endif; ?>
	<?php echo $form->end(); ?>
</div>