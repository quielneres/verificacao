<?php
echo $this->element('flash');
$plano = $session->read('Auth.Usuario.plano');

/*
$n1 = $session->read('n1_id');
$n2 = $session->read('n2_id');
$n3 = $session->read('n3_id');
$n4 = $session->read('n4_id');

echo $n1;
*/

?>

<div class="cabecalho">
<?php //echo $ajax->link($html->image('ico_novo_24.png', array('alt'=>'Novo Doador', 'title'=>'Novo Doador')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
<center><h3><?php echo $nome; ?></h3></center>
</div>
<div class="cx_listagem"> 
	<?php echo $ajax->form('index', 'post', array('model'=>'Usuario', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
    <h3>        
        <?php if($plano == 1) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 2) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 3) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } elseif ($plano == 4) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 4 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 5) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 4 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 5 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 6) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 4 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 5 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 6 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 7) { ?>
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 4 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 5 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 6 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 7 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
        <?php } elseif ($plano == 8) { ?>      
        <b> Nivel 1 (15%)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 2 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 3 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 4 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 5 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 6 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 7 (3%)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="nivel"> Nivel 8 (3%)</span> 
        <?php } else { ?>
        <span class="nivel">Sem Plano</span> 
        <?php } ?>       
    </h3> 
    <br>  
    <?php if (!empty($usuarios)): ?> 
			<div class="total"><?php //$paginator->options(array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();')); echo $paginator->counter(array('format' => __('Página <b>%page%</b> de <b>%pages%</b>, <br> total de <b>%count%</b> membros.', true))); ?></div>
			<table>
				<!--<tr>
					<th><?php echo $paginator->sort('Nivel 1','NomeUsuario', $filter_options);?></th>
					<?php //echo '<th colspan="1"></th>'; ?>
				</tr>-->
				<?php
					$i = 0;
					foreach ($usuarios as $usuario):
						$class = null;
						if ($i++ % 2 != 0) { $class = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; }  
                                                        
				?>	                                   
                                
                                    <?php                                    
                                    
                                    if ($usuario['Usuario']['plano'] == 1) { $plano = '1º Plano Do.Partner - R$ 50,00'; }
                                    if ($usuario['Usuario']['plano'] == 2) { $plano = '2º Plano Do.Bronze - R$ 100,00'; }
                                    if ($usuario['Usuario']['plano'] == 3) { $plano = '3º Plano Do.Silver - R$ 300,00'; }
                                    if ($usuario['Usuario']['plano'] == 4) { $plano = '4º Plano Do.Crystal - R$ 500,00'; }                                                       
                                    if ($usuario['Usuario']['plano'] == 5) { $plano = '5º Plano Do.Gold - R$ 1.000,00'; }
                                    if ($usuario['Usuario']['plano'] == 6) { $plano = '6º Plano Do.Diamond - R$ 3.000,00'; }
                                    if ($usuario['Usuario']['plano'] == 7) { $plano = '7º Plano Do.Diamond Plus - R$ 5.000,00'; }
                                    if ($usuario['Usuario']['plano'] == 8) { $plano = '8º Plano Do.Ruby - R$ 10.000,00'; }
                                    
                                    $title = $usuario['Usuario']['NomeUsuario'].' | '.$plano;                                                                        
                                    
                                    if($usuario['Usuario']['Sexo'] == 'F'){ ?> 
                            
                                     <?php if($usuario['Usuario']['Ativo'] == '1'){ 
                                     $feminino = 'feminino.jpg';
                                     } else {  
                                     $feminino = 'feminino.png';
                                     } ?>                            
                            
                                    <?php if($plano > 1) {?>                                    
                                    <?php echo $ajax->link($html->image($feminino, array('title'=>$title)), array('controller'=> 'usuarios', 'action'=>'index2', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
                                    <?php } else { ?>
                                    <?php echo $html->image($feminino, array('title'=>$title)); ?>
                                    <?php } ?>                             
                            
                                    <?php } else { ?> 
                            
                                    <?php if($usuario['Usuario']['Ativo'] == '1'){ 
                                     $masculino = 'masculino.jpg';
                                     } else {  
                                     $masculino = 'masculino.png';
                                     } ?>   
                                    
                                    <?php if($plano > 1) {?>                                    
                                    <?php echo $ajax->link($html->image($masculino, array('title'=>$title)), array('controller'=> 'usuarios', 'action'=>'index2', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false); ?>
                                    <?php } else { ?>
                                    <?php echo $html->image($masculino, array('title'=>$title)); ?>
                                    <?php } ?> 
                            
                                    <?php } ?>                         

                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <?php
                                                //echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('restaurar.png', array('alt'=>'Mais Níveis', 'title'=>'Mais Níveis')), array('action'=>'index2', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('ico_detalhe_16.png', array('alt'=>'Detalhar', 'title'=>'Detalhar')), array('action'=>'view', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false).'</td>';
						//echo '<td class="acoes" width="1.6%">'.$ajax->link($html->image('apaga.png', array('title'=>'Apagar', 'alt'=>'Apagar')), array('action'=>'delete', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), 'Você realmente deseja excluir esse registro ?', null, false).'</td>'; 
					?>
				
                                <?php echo $class;?>    
                                    
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