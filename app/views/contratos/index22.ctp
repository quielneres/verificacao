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
    echo $javascript->link('formularios/intervalo1');
?>

<div class="cabecalho">
<?php 		                
        if($status == 1) {
        echo "<center><h3>Em Andamento</h3></center>";
        }
        if($status == 2) {
        echo "<center><h3>Reinvestimento Parcial</h3></center>";
        }
        if($status == 3) {
        echo "<center><h3>Reinvestimento Total</h3></center>";
        }
        if($status == 4) {
        echo "<center><h3>Pagos</h3></center>";
        }
        if($status == 5) {
        echo "<center><h3>Finalizados</h3></center>";
        }
        
        echo "<b>Período:</b> $data1 <b>a</b> $data2 <br>";
        $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('total de <b>%count%</b> registros', true)));
        
?>
	
</div>

<div class="cx_listagem">
    <?php echo $ajax->form('index2', 'post', array('model'=>'Investimento', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters'));?>

    <?php 
    /*
    $codigoCliente = $session->read('Auth.Usuario.codigo_cliente');                  
    if (empty($codigoCliente)) {   
    echo '<div class="form_busca">';
			           
                                //echo $form->input('codigo_cliente', array('label' => 'Cód.', 'type' => 'text', 'div' => false));
                                //echo $form->input('Cliente.nome', array('label' => 'Client', 'type' => 'text', 'div' => false));
                                //echo $form->input('data_contrato', array('label' => 'Data con', 'type' => 'text', 'div' => false));
                                //echo $form->input('valor_investido', array('label' => 'Valor inv', 'type' => 'text', 'div' => false));                                
                                //echo $form->hidden('status', array('label'=>'Stat', 'empty'=>'Selecione uma opção', 'options'=>array(1=>'EM ANDAMENTO', 2=>'REINVESTIMENTO PARCIAL',3=>'REINVESTIMENTO TOTAL', 4=>'PAGO', 5=>'FINALIZADO'), 'div' => false));
                                
                                //echo $form->input('status',array('value'=>$status));
                                //echo $form->input('data1',array('value'=>$data1));
                                //echo $form->input('data2',array('value'=>$data2));
                                
                                //echo $html->tag('button', '', array('type' => 'submit', 'title'=>'Pesquisar', 'name'=>'data[filter]', 'value'=>'filter', 'class'=>'bt_filtrar'));
				//echo $ajax->link('', array('action'=>'index2'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before'=>'$("#inicial").empty();', 'title'=>'Limpar', 'class'=>'bt_limpar'));		
    echo '</div>';
    } */       
    ?>

	<?php if (!empty($investimentos)): ?>
		
    <?php    
    /*$codigoCliente = $session->read('Auth.Usuario.codigo_cliente');                  
    if (empty($codigoCliente)) {
    echo '<div class="total">';        
         $paginator->options(array('update'=>'inicial', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('<font size="3">total de <b>%count%</b> registros.</font>', true)));
    echo '</div>';
    }*/
    ?>

                        <table>
				<tr>
                                    
                                    <!--<th><?php //echo $paginator->sort('Código','codigo_cliente', $filter_options);?></th>--> 
                                        <th><?php echo $paginator->sort('Cliente','Cliente.nome', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('Data cont.','data_contrato', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('valor inv.','valor_investido', $filter_options);?></th>
                                        <th><?php echo $paginator->sort('status','status', $filter_options);?></th>                                       
                                        <!--<th><?php //echo $paginator->sort('Telefone 1','telefone', $filter_options);?></th>
					<th><?php //echo $paginator->sort('Data nasc.','datanascimento', $filter_options);?></th>-->
					<?php echo '<th colspan="4"></th>'; ?>
				</tr>
				<?php
 
                                $i = 0;
					foreach ($investimentos as $investimento):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="zebra"';
						}
				?>
				<tr<?php echo $class;?>>

                                    <!--<td><?php echo $investimento['Investimento']['codigo_cliente']; ?> </td>-->
                                        <td><?php echo $investimento['Cliente']['nome']; ?> </td>
                                        <td><?php echo $investimento['Investimento']['data_contrato']; ?> </td>
                                        <td>                                            
                                            <?php                                            
                                            if($investimento['Investimento']['moeda'] == 1){
                                            echo $investimento['Investimento']['valor_investido']; 
                                            }
                                            if($investimento['Investimento']['moeda'] == 2){
                                            echo 'US$ '.$investimento['Investimento']['valor_investido'];  
                                            }
                                            if($investimento['Investimento']['moeda'] == 3){
                                            echo 'EURO '.$investimento['Investimento']['valor_investido'];  
                                            }                
                                            ?>
                                        </td>
                                        
                                        <td><?php 
                                        
                                        if($investimento['Investimento']['status'] == 1){
                                        echo 'EM ANDAMENTO';   
                                        }
                                        if($investimento['Investimento']['status'] == 2){
                                        echo 'REINVESTIMENTO PARCIAL';   
                                        }
                                        if($investimento['Investimento']['status'] == 3){
                                        echo 'REINVESTIMENTO TOTAL';   
                                        }
                                        if($investimento['Investimento']['status'] == 4){
                                        echo 'PAGO';   
                                        }
                                        if($investimento['Investimento']['status'] == 5){
                                        echo 'FINALIZADO';
                                        }
                                        ?>

                                        </td>					
                                        <!--<td><?php //echo $investimento['Investimento']['telefone']; ?> </td>
					<td><?php //echo $investimento['Investimento']['datanascimento']; ?> </td>-->
					<?php 

                                        
					echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view2',$data1,$data2,$status,$investimento['Investimento']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';						
                     
                                        //echo '<td class="acoes" width="1.6%"></td>'; 
                                        /*
                                        $codigoCliente = $session->read('Auth.Usuario.codigo_cliente');                  
                                        if (empty($codigoCliente)) {
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_altera_16.gif', array('alt'=>'Alterar', 'title'=>'Alterar')), array('action'=>'edit', $investimento['Investimento']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';   
                                        
                                        //echo '<td class="acoes" width="1.6%"></td>';                        
			                                     
                                        echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $investimento['Investimento']['id']), array('update'=>'inicial', 'indicator' => 'ajax_load',  'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>';
    
                                        //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('email2.png', array('alt'=>'Enviar email', 'title'=>'Enviar email')), array('action'=>'email', $investimento['Investimento']['id']), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false).'</td>';                         
                                        } else {
                                        */
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        echo '<td class="acoes" width="1.6%"></td>';
                                        //}
                                        
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