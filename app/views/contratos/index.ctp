<style>
.quatro_colunas{
	margin-left: 10px;
}
.form_busca div.input, .form_busca div.sem_direita, .form_busca div.calendario{
	height: 40px;
}
</style>

<script language="javascript">
function abrir_pop(url, name, feature)
{
    window.open(url, name, feature);
}
</script>

<?php 
    echo $this->element('flash');
    //echo $javascript->link('formularios/intervalo');   
?>
<div class="cabecalho">
<?php 

        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email.png', array('alt'=>'Enviar email para todos os clientes', 'title'=>'Enviar email para todos os clientes')), array('action'=>'email2'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>'; 
        
        echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Contrato', 'title'=>'Novo Contrato')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'id'=>'add', 'before'=>'$("#inicial").empty();'), null, false);

?>
	<center><h3>Lista de Contratos</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('index', 'post', array('model'=>'Contrato', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>
		<div class="form_busca">
			<?php                   
                                echo $form->input('Cliente.nome', array('label' => 'cliente', 'type' => 'text', 'div' => false));
                                //cho $form->input('cpf_cnpj', array('label' => 'CPF', 'type' => 'text', 'div' => false));

                                echo $form->input('status', array('label'=>'contrato', 'empty'=>'TODOS', 'options'=>array(
                                    'ATIVO'=>'ATIVO',
                                    'VENCIDO'=>'VENCIDO'),
                                    'div' => false));
                                
                                    echo $form->input('inicio_vigencia', array('label' => 'inicio', 'type' => 'text', 'div' => false));
                                    echo $form->input('termino_vigencia', array('label' => 'termino', 'type' => 'text', 'div' => false));

                                echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				echo $ajax->link('', array('action'=>'index'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));
			?>
		</div>
		<?php if (!empty($contratos)): ?>

			<div class="total"><?php $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, de um total de <b>%count%</b> registros.', true))); ?></div>
			<table>
				<tr>
                                        <th><?php echo $paginator->sort('cliente','Cliente.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('plano','Plano.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('inicio','inicio_vigencia', $filter_options);?></th>
					<th><?php echo $paginator->sort('termino','termino_vigencia', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('cont.','status', $filter_options);?></th>
					<th><?php echo $paginator->sort('email','email', $filter_options);?></th>
                                            <?php echo '<th colspan="2"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($contratos as $contrato):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                        <td><?php                                              
                                        if($contrato['Contrato']['plano_id'] == 1){
                                        echo $ajax->link($html->image('ouro2.png', array('alt'=>'Plano Ouro', 'title'=>'Plano Ouro')), array('controller'=> 'planos', 'action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false). ' &nbsp;&nbsp; ' .$contrato['Cliente']['nome'];    
                                        }else{                                        
                                        echo $ajax->link($html->image('prata2.png', array('alt'=>'Plano Prata', 'title'=>'Plano Prata')), array('controller'=> 'planos', 'action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false). ' &nbsp;&nbsp; ' .$contrato['Cliente']['nome']; 
                                        }?></td>  

					<td><?php echo $contrato['Plano']['nome']; ?> </td>
                                        <td><?php echo $contrato['Contrato']['inicio_vigencia']; ?> </td>
					<td><?php echo $contrato['Contrato']['termino_vigencia']; ?> </td>
                                        
                                        <td><?php                                        
                                        if($contrato['Contrato']['status'] == 'ATIVO'){
                                        echo '<font color="green">'.$contrato['Contrato']['status']."</font>";    
                                        }else{                                        
                                        echo '<font color="red">'.$contrato['Contrato']['status']."</font>"; 
                                        }                                       
                                        ?> </td>                                        
                                        
                                        <td> <?php                                              
                                        if($contrato['Contrato']['email'] == 1){
                                        echo $ajax->link($html->image('enviado.png', array('alt'=>'E-mail com contrato anexado já enviado para este cliente', 'title'=>'E-mail com contrato anexado já enviado para este cliente')), array('controller'=> 'Contratos', 'action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false);    
                                        }else{ ?>
                                        <a href="javascript:abrir_pop('../../../email/index.php?cliente_id=<?=$contrato['Contrato']['cliente_id']?>','email','width=850,height=450,top=120,left=105,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')">Enviar</a>
                                        </td>
                                        <?php } 
                                        
					//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $contrato['Contrato']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';						
                     
                                        //echo '<td class="acoes" width="1.6%"></td>';                        

                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $contrato['Contrato']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';   
                   
                                        //echo '<td class="acoes" width="1.6%"></td>';                        
			                                     
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $contrato['Contrato']['id']), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';                   
                                  
                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email2.png', array('alt'=>'Enviar email', 'title'=>'Enviar email')), array('action'=>'email', $contrato['Contrato']['cliente_id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
                                        
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