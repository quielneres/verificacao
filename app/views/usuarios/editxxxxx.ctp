<?php
echo $this->element('flash');
	echo $javascript->link('formularios/usuario');   
        $acoes = $session->read('acoes'); 
        $id_usuario = $session->read('Auth.Usuario.id');
        $ativo = $session->read('Auth.Usuario.Ativo');
        $plano1 = $session->read('Auth.Usuario.plano');
        
        if($ativo == 1){
          $ativo2 = 'Ativo';
        }else{
          $ativo2 = 'Inativo';  
        }        
        
        if($plano1 == 1){ $plano2 = '1º Plano Do.Partner - R$ 50,00'; }
        if($plano1 == 2){ $plano2 = '2º Plano Do.Bronze - R$ 100,00'; }
        if($plano1 == 3){ $plano2 = '3º Plano Do.Silver - R$ 300,00'; }
        if($plano1 == 4){ $plano2 = '4º Plano Do.Crystal - R$ 500,00'; }
        if($plano1 == 5){ $plano2 = '5º Plano Do.Gold - R$ 1.000,00'; }
        if($plano1 == 6){ $plano2 = '6º Plano Do.Diamond - R$ 3.000,00'; }
        if($plano1 == 7){ $plano2 = '7º Plano Do.Diamond Plus - R$ 5.000,00'; }
        if($plano1 == 8){ $plano2 = '8º Plano Do.Ruby - R$ 10.000,00'; }
        
?>

<script language="javascript">
function abrir_pop(url, name, feature)
{
    window.open(url, name, feature);
}     
</script>

<!--<a href="javascript:abrir_pop('http://localhost/boleto/<?=$banco?>.php?id_usuario=<?=$id_usuario?>', 'Boleto', 'width=800,height=600,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário"><img src="images/boleto.gif" width="22" height="18" border="0"></a>-->

<div class="cabecalho">
	<?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
	<center><h3><?php __('Dados da Conta'); ?></h3></center>
</div>
<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('edit', 'post', array('model'=>'Usuario', 'update'=>'inicial', 'indicator'=>'ajax_load', 'after'=>'$("#inicial").empty();', 'class'=>'formulario')); ?>
	
    
        <fieldset>
		<legend><?php __('Geral');?></legend>
		<?php
			echo $form->input('id');
			echo $form->hidden('Obrigatorio', array('value'=>false));                        
                        echo $form->hidden('usuario_id', array('label'=>'Usuario <font color="red">(*)</font>', 'empty' => '', 'class'=>'tres_colunas'));
                        
			echo $form->input('NomeUsuario', array('label'=>'Nome <font color="red">(*)</font>', 'class'=>'tres_colunas'));
                        echo $form->input('Sexo', array('label'=>'Sexo <font color="red">(*)</font>', 'class'=>'tres_colunas_select',  'empty'=>'Selecione uma opção', 'options'=> array('M'=>'Masculino', 'F'=>'Feminino')));
                        echo $form->input('email', array('label'=>'E-mail', 'class'=>'tres_colunas'));
                        echo $form->input('telefone', array('label'=>'Telefone', 'class'=>'tres_colunas'));
		        echo $form->input('username', array('label'=>'Login <font color="red">(*)</font>', 'class'=>'tres_colunas'));
			echo $form->input('senha', array('label'=>'Senha <font color="red">(*)</font>', 'type'=>'password', 'class'=>'tres_colunas'));
                        
                        //echo $form->input('idade', array('label'=>'Você é maior de Idade? <font color="red">(*)</font>', 'class'=>'tres_colunas_select',  'empty'=>'Selecione uma opção', 'options'=> array(1=>'Sim', 2=>'Não')));
                        //echo $form->input('termo', array('label'=>'Você leu e aceita os Termos de Uso? <font color="red">(*)</font>', 'class'=>'tres_colunas_select',  'empty'=>'Selecione uma opção', 'options'=> array(1=>'Sim', 2=>'Não')));

                        //print $acoes[0];
                        
                        if($acoes[0] == '*:*'){
                            echo $form->input('Ativo', array('label'=>'Ativo <font color="red">(*)</font>', 'class'=>'tres_colunas_select', 'empty'=>'Selecione uma opção', 'options'=> array(1=>'Sim', 2=>'Não')));
                            echo $form->input('plano', array('label'=>'Plano <font color="red">(*)</font>  ', 'class'=>'tres_colunas_select', 'empty'=>'Selecione uma opção', 'options'=> array(1=>'1º Plano Do.Partner - R$ 50,00', 2=>'2º Plano Do.Bronze - R$ 100,00', 3=>'3º Plano Do.Silver - R$ 300,00', 4=>'4º Plano Do.Crystal - R$ 500,00', 5=>'5º Plano Do.Gold - R$ 1.000,00', 6=>'6º Plano Do.Diamond - R$ 3.000,00', 7=>'7º Plano Do.Diamond Plus - R$ 5.000,00', 8=>'8º Plano Do.Ruby - R$ 10.000,00')));    
                            echo $form->input('link', array('label'=>'Link', 'value'=>'http://tooplife.com.br/usuarios/add/'.$id , 'class'=>'duas_colunas'));
                            
                            ?><!--<div class="duas_colunas"><a href="javascript:abrir_pop('http://localhost/boleto/<?=$banco?>.php?id_usuario=<?=$id_usuario?>', 'Boleto', 'width=660,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário">Imprimir boleto Bancário</a></div>--><?php 
                              
                        }else{   
                            //echo $form->input('Ativo', array('label'=>'Ativo <font color="red">(*)</font>', 'readonly'=>'readonly', 'type'=>'text', 'class'=>'tres_colunas'));
                            if($ativo == 1){                             
                            //echo $form->input('plano', array('label'=>'Plano <font color="red">(*)</font>', 'readonly'=>'readonly', 'class'=>'tres_colunas_select', 'empty'=>'Selecione uma opção', 'options'=> array(1=>'1º Plano Do.Partner - R$ 50,00', 2=>'2º Plano Do.Bronze - R$ 100,00', 3=>'3º Plano Do.Silver - R$ 300,00', 4=>'4º Plano Do.Crystal - R$ 500,00', 5=>'5º Plano Do.Gold - R$ 1.000,00', 6=>'6º Plano Do.Diamond - R$ 3.000,00', 7=>'7º Plano Do.Diamond Plus - R$ 5.000,00', 8=>'8º Plano Do.Ruby - R$ 10.000,00')));  
                            echo $form->input('link', array('label'=>'Link', 'value'=>'http://tooplife.com.br/usuarios/add/'.$id , 'class'=>'duas_colunas'));

                            ?>
                            <div class="duas_colunas">
                            <font size="3" style="text-transform: uppercase" color="black">Cadastro:</font> <font size="3" style="text-transform: uppercase" color="green"><?=$ativo2?></font><br><br>
                            <font size="3" style="text-transform: uppercase" color="black">Plano:</font> <font size="3" style="text-transform: uppercase" color="green"><?=$plano2?></font><br><br>
                            </div>
                            <?php 
                            
                            }else{
                            echo $form->input('plano', array('label'=>'Plano <font color="red">(*)</font>', 'class'=>'tres_colunas_select', 'empty'=>'Selecione uma opção', 'options'=> array(1=>'1º Plano Do.Partner - R$ 50,00', 2=>'2º Plano Do.Bronze - R$ 100,00', 3=>'3º Plano Do.Silver - R$ 300,00', 4=>'4º Plano Do.Crystal - R$ 500,00', 5=>'5º Plano Do.Gold - R$ 1.000,00', 6=>'6º Plano Do.Diamond - R$ 3.000,00', 7=>'7º Plano Do.Diamond Plus - R$ 5.000,00', 8=>'8º Plano Do.Ruby - R$ 10.000,00')));    
                            echo $form->input('link', array('label'=>'Link', 'value'=>'' , 'class'=>'duas_colunas'));
                            
                            ?>
                            <div class="duas_colunas"><font size="3" style="text-transform: uppercase" color="black">Cadastro:</font> <font size="3" style="text-transform: uppercase" color="red"><?=$ativo2?></font><br><br>
                            <font size="3" color="black"> para ativar seu cadastro, pague o boleto bancário </font>
                            <a href="javascript:abrir_pop('http://localhost/boleto/<?=$banco?>.php?id_usuario=<?=$id_usuario?>', 'Boleto', 'width=660,height=560,top=50,left=80,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')" title="Gerar boleto bancário">Imprimir boleto</a></div>
                            <?php 
                              
                            } 
                        }
   
		?>
	</fieldset>
    
        <?php 
		echo $form->submit('Atualizar');
		echo $form->end(); 
	?>
    
    <!--
	<fieldset>
		<legend><?php __('Grupos');?></legend>	
		<?php 
			echo $form->input('Grupo.NaoSelecionado', array('label'=>'Não Selecionados','class'=>'tres_colunas_select','div'=>'multiple','type' =>'select','multiple' => true, 'options'=>$grupos, 'after'=>'<br /><input type="button" id="add_grupo" value="Adicionar &gt;&gt;" title="Adicionar">'));
			echo $form->input('Grupo', array('label'=>'Selecionados <font color="red">(*)</font>','div'=>'multiple sem_direita','class'=>'tres_colunas_select','type' =>'select','multiple' => true, 'options'=>$gruposelecionado, 'after'=>'<br /><input type="button" id="remove_grupo" value="&lt;&lt; Remover" title="Remover">'));
		?>
	</fieldset>
    -->

	<?php
		//echo $form->button('Atualizar', array('div'=> false, 'id'=>'submit_usuario', 'class'=>'submit_upload', 'onClick'=>'$(\'#UsuarioEditForm\').ajaxSubmit({target: \'#inicial\',url: \''.$html->url('/usuarios/edit/'.$this->data['Usuario']['id']).'\'}); return false;'));
		//echo $form->end(); 
	?>
    
</div>