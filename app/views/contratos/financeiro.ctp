<style type="text/css">
<!--                      
                                           
.valor	{
			//display: block;
			border-color: #999 #000 #000 #999;

			border: 1px solid;
			width: 175px;
                        height: 10px;
			padding: 15px;

			background: #ffff; 
			color: #000;

			font-family: Verdana;
			font-size: 18px;
			font-weight: bold;
			text-align: left;
			text-decoration: none;
	}
                        
-->
</style>

<?php
echo $this->element('flash');
echo $javascript->link('formularios/financeiro');
?>
<div class="cabecalho">
	<center><h3>Estatisticas</h3></center>
</div>
<div class="cx_listagem">
	<?php echo $ajax->form('financeiro', 'post', array('model'=>'Contrato', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'id'=>'filters')); ?>
		<div class="form_busca">
		<?php
                        //echo $form->input('status', array('label'=>'Codigo do consultor', 'class'=>'tres_colunas'));
                
                //echo $form->input('status', array('label'=>'status', 'type' =>'hidden', 'value'=>''));
                
                
                        echo $form->input('status', array('label'=>'Status', 'empty'=>'TODOS', 'options'=>array('ATIVO'=>'ATIVO', 'VENCIDO'=>'VENCIDO')));
                        echo $form->input('data1', array('label'=>'Data início <b>(*)</b>', 'type' =>'text', 'div'=>'calendario'));
                        echo $form->input('data2', array('label'=>' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data fim <b>(*)</b>', 'type' =>'text', 'div'=>'calendario'));
             
                        echo '<br>';
                        echo '<br>';
                echo $form->submit('Pesquisar', array('div'=> false));
		//echo $form->button('Limpar', array('type'=>'reset'));
		echo $form->end();
                ?>
		</div>
    
    <?php if (!empty($this->data['Contrato']['data1']) && !empty($this->data['Contrato']['data2'])){ 
        
        $data1 = $this->data['Contrato']['data1'];
        $data2 = $this->data['Contrato']['data2'];

        ?>
    
    <table class="tabela_view">
	<tr><th colspan="3">Valor total</th></tr>
	<tr>
            <td><font size="4"><b>TOTAL DE CONTRATOS </b></font><input disabled="disabled" type="text" class="valor" name="real" value="<?=$totalContrato?>"></td>
            <td><font size="4"><b>TOTAL DE RETIRADAS </b></font><input disabled="disabled" type="text" class="valor" name="us" value="<?=$totalRetirada?>"></td>
	</tr>
    </table>
    
    
    <table class="tabela_view">
	<tr><th colspan="3">Quantidade de Status do contrato</th></tr>
	<tr>           
            <?php //echo "<td><a href='../Contratos/index2?data1=$data1&data2=$data2&status=1' target='_blank'>Ativos:</a><font color='black' size='4'><b> $ativo </b></font></td>"; ?>
            <?php //echo "<td><a href='../Contratos/index2?data1=$data1&data2=$data2&status=2' target='_blank'>Vencidos:</a><font color='black' size='4'><b> $vencido </b></font></td>"; ?>

            <td>Ativos:<font color='black' size='4'><b> <?php echo $ativo; ?> </b></font></td>
            <td>Vencidos:<font color='black' size='4'><b> <?php echo $vencido; ?> </b></font></td>	
	</tr>
    </table>
    
    <table class="tabela_view">
	<tr><th colspan="3">Quantidade de produtos retirados</th></tr>
	<tr>           
            <?php //echo "<td><a href='../Retiradas/index2?data1=$data1&data2=$data2&status=3' target='_blank'>Retiradas:</a><font color='black' size='4'><b> $qtdRetirada </b></font></td>"; ?>	
            <td>Retiradas:<font color='black' size='4'><b> <?php echo $qtdRetirada; ?> </b></font></td>
        </tr>
    </table>    
    
    <?php } else { ?>
              
        <div class="vazio"><font color="#828282">Preencha os dois campos de data para mostrar Valores e Status.</font></div>
        
   <?php } ?> 
        
        
        
        
        
        
        

        <?php if (!empty($this->data['Contrato']['data1']) && !empty($this->data['Contrato']['data2']) && !empty($this->data['Contrato']['codigo_consultor'])){ ?>
        
        <?php if (!empty($codigo_consultor3)){ ?>
        
        <table class="tabela_view">
	<tr><th colspan="3">Financeiro para o consultor <?php echo $this->data['Contrato']['codigo_consultor']; ?>, período de <?php echo $this->data['Contrato']['data1']; ?> até <?php echo $this->data['Contrato']['data2']; ?></th></tr>
	<tr class="zebra_detalhe">
		<td><b>recontrato parcial:</b><br /><?php echo $recontrato_parcial1; ?></td>
                <td><b>Cliente em andamento:</b><br /><?php echo $em_andamento1; ?></td>
                <td><b>recontrato total:</b><br /><?php echo $recontrato_total1; ?></td>
	</tr>
        
        <tr class="zebra_detalhe">      
                <td><b>Pago:</b><br /><?php echo $pago1; ?></td>
		<td><b>Finalizado:</b><br /><?php echo $finalizado1; ?></td>
		<td><b>Total de financeiros:</b><br /><?php echo $tamanho1; ?></td>
        </tr>
    </table>
        
   <?php } else { ?>
              
        <div class="vazio">O consultor informado não existe no sistema ou existe mas sua financeiro é Zero.</div>
        
   <?php } ?>
        
   <?php } else { ?>
              
        <!--<div class="vazio"><font color="#828282">Preencha os 3 campos de pesquisa para mostrar financeiros do consultor específico.</font></div>-->
        
   <?php } ?>
