<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
?>

<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('add', 'post', array('model' => 'Usuario', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>

    <fieldset>
        <legend><?php __('Busca Usuario'); ?></legend>
        <?php
        echo $form->input('cpf', array('label' => 'CPF', 'class' => 'tres_colunas'));

        ?>


    </fieldset>

    <?php
    echo $form->submit('Cadastrar', array('div' => false));
    //echo $form->button('Limpar', array('type'=>'reset'));
    echo $form->end();
    ?>

</div>