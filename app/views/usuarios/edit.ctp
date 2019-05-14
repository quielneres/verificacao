<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
?>

<script language="javascript">
    function abrir_pop(url, name, feature) {
        window.open(url, name, feature);
    }
</script>

<div class="cabecalho">
    <?php //echo $ajax->link($html->image('ico_voltar_24.gif', array('alt'=>'Voltar', 'title'=>'Voltar')), array('action'=>'index'), array('update'=>'inicial', 'before'=>'$("#inicial").empty();'), null, false); ?>
    <center><h3><?php __('Dados pessoais'); ?></h3></center>
</div>
<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('edit', 'post', array('model' => 'Usuario', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>


    <fieldset>
        <legend><?php __('Geral'); ?></legend>
        <?php
        echo $form->input('id');
        echo $form->hidden('Obrigatorio', array('value' => false));
        echo $form->hidden('usuario_id', array('label' => 'Usuario <font color="red">(*)</font>', 'empty' => '', 'class' => 'tres_colunas'));

        echo $form->input('NomeUsuario', array('label' => 'Nome <font color="red">(*)</font>', 'class' => 'tres_colunas'));
        
        if ($id == 1) {

            echo $form->input('cpf', array('label' => 'CPF <font color="red">(*)</font>', 'class' => 'tres_colunas', 'tres_colunas'));
        } else {

            echo $form->input('cpf', array('label' => 'CPF <font color="red">(*)</font>', 'class' => 'tres_colunas', 'tres_colunas', 'readonly' => 'true'));
        }
      
        echo $form->input('dataNascimento', array('label' => 'Data nascimento <font color="red">(*)</font>', 'class' => 'tres_colunas'));

        echo $form->input('Sexo', array('label' => 'Sexo <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção', 'options' => array('M' => 'Masculino', 'F' => 'Feminino')));
        echo $form->input('email', array('label' => 'E-mail', 'class' => 'tres_colunas'));
        echo $form->input('telefone', array('label' => 'Telefone', 'class' => 'tres_colunas'));

        echo $form->input('endereco', array('label' => 'endereço', 'class' => 'tres_colunas'));
        echo $form->input('cidade', array('label' => 'cidade', 'class' => 'tres_colunas'));
        echo $form->input('estado', array('label' => 'estado', 'class' => 'tres_colunas_select', 'empty' => 'Selecione...', 'options' => array(
            'ac' => 'Acre',
            'al' => 'Alagoas',
            'am' => 'Amazonas',
            'ap' => 'Amapá',
            'ba' => 'Bahia',
            'ce' => 'Ceará',
            'df' => 'Distrito Federal',
            'es' => 'Espírito Santo',
            'go' => 'Goiás',
            'ma' => 'Maranhão',
            'mt' => 'Mato Grosso',
            'ms' => 'Mato Grosso do Sul',
            'mg' => 'Minas Gerais',
            'pa' => 'Pará',
            'pb' => 'Paraíba',
            'pr' => 'Paraná',
            'pe' => 'Pernambuco',
            'pi' => 'Piauí',
            'rj' => 'Rio de Janeiro',
            'rn' => 'Rio Grande do Norte',
            'ro' => 'Rondônia',
            'rs' => 'Rio Grande do Sul',
            'rr' => 'Roraima',
            'sc' => 'Santa Catarina',
            'se' => 'Sergipe',
            'sp' => 'São Paulo',
            'to' => 'Tocantins'
        )));
        echo $form->input('cep', array('label' => 'cep', 'class' => 'tres_colunas'));
        echo $form->input('username', array('label' => 'Login <font color="red">(*)</font>', 'class' => 'tres_colunas', 'readonly' => 'true' ));
        echo $form->input('senha', array('label' => 'Senha <font color="red">(*)</font>', 'type' => 'password', 'class' => 'tres_colunas'));

        ?>
    </fieldset>

    <?php
    echo $form->submit('Atualizar');
    echo $form->end();
    ?>

</div>