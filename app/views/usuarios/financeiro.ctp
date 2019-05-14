<?php 
	echo $this->element('flash');

        $valorTotal = $valorTotal - $totalSaquesPagos;        
        
?>


<div class="cabecalho">
	<?php 
		//echo $ajax->link($html->image('ico_altera_24.gif', array('alt'=>'Alterar Doador', 'title'=>'Alterar Doador')), array('action'=>'edit', $usuario['Usuario']['id']), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_novo_24.gif', array('alt'=>'Novo Doador', 'title'=>'Novo Doador')), array('action'=>'add'), array('update'=>'inicial', 'indicator'=>'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
		//echo $ajax->link($html->image('ico_voltar_24.gif', array('alt' => 'Voltar', 'title' => 'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'indicator'=> 'ajax_load', 'before'=>'$("#inicial").empty();'), null, false);
	?>
	<center><h3>Financeiro</h3></center>
</div>


<?php echo $ajax->form('financeiro', 'post', array('model'=>'Usuario', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
		<div class="form_busca">
		<?php
                echo '<br>';
                        //echo $form->input('status', array('label'=>'Status', 'empty'=>'TODOS', 'options'=>array('ATIVO'=>'ATIVO', 'VENCIDO'=>'VENCIDO')));
                        echo $form->input('data1', array('label'=>'Data início <b>(*)</b>', 'type' =>'text', 'div'=>'calendario'));
                        echo $form->input('data2', array('label'=>' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data fim <b>(*)</b>', 'type' =>'text', 'div'=>'calendario'));
                        //echo '<br>';
                        //echo '<br>';
                echo $form->submit('Pesquisar', array('div'=> false));
		//echo $form->button('Limpar', array('type'=>'reset'));
		echo $form->end();
                ?>
		</div>
    
    <?php if (!empty($this->data['Contrato']['data1']) && !empty($this->data['Contrato']['data2'])){ 
        
        $data1 = $this->data['Usuario']['data1'];
        $data2 = $this->data['Usuario']['data2'];
              
        }
        
        ?>

<table class="tabela_view">
	<tr><th colspan="2">Valores</th></tr>     
        
	<tr>
		<td><b>Saldo: </b> R$ <?php echo number_format($valorTotal,2,',','.'); ?></td>
                <td><b>Inativos: </b> R$ <?php echo number_format($valorTotal2,2,',','.'); ?></td>
	</tr>       

        <tr>
		<td><b>Pagos: </b> R$ <?php echo number_format($totalSaquesPagos,2,',','.'); ?></td>
                <td><b>A Pagar: </b> R$ <?php echo number_format($totalSaquesPendentes,2,',','.'); ?></td>
	</tr>   
        
</table>    
        
<table class="tabela_view">
	<tr><th colspan="2">Quantidades</th></tr>
        
        <tr>
                <td><b>Ativos: </b> <?php echo $qtdativos; ?></td>
                <td><b>Inativos: </b> <?php echo $qtdinativos; ?></td>
        </tr> 
        
	<tr class="zebra_detalhe">
		<td><b>1º Plano Do.Partner: </b> <?php echo $qtdPlano1; ?></td>
                <td><b>2º Plano Do.Bronze: </b> <?php echo $qtdPlano2; ?></td>
	</tr>  
        
        <tr>
                <td><b>3º Plano Do.Silver: </b> <?php echo $qtdPlano3; ?></td>
                <td><b>4º Plano Do.Crystal: </b> <?php echo $qtdPlano4; ?></td>
        </tr>
        
        <tr class="zebra_detalhe">
		<td><b>5º Plano Do.Gold: </b> <?php echo $qtdPlano5; ?></td>
                <td><b>6º Plano Do.Diamond: </b> <?php echo $qtdPlano6; ?></td>
	</tr>  
        
        <tr>
                <td><b>7º Plano Do.Diamond Plus: </b> <?php echo $qtdPlano7; ?></td>
                <td><b>8º Plano Do.Ruby: </b> <?php echo $qtdPlano8; ?></td>
        </tr>         
                
</table>