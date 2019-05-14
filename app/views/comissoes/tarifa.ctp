<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .spanData {
        color: green;
    }

    .novaData {
        float: left;
        display: none;
    }
</style>
<div class="cabecalho">
    <div>
        Cobrar Tarifa de uso de beneficios
    </div>
    <?php echo $ajax->link('Cobrar tarifa', array('controller' => 'comissoes', 'action' => 'tarifa/1'), array('update' => 'inicial', 'indicator' => 'ajax_load', 'before' => '$("#inicial").empty();')); ?>

</div>
<script>
    $('#escolherData').click(function () {
        $('#dataAtual').hide();
        $('.novaData').show();
    });

    $('#cancelar').click(function () {
        $('#dataAtual').show();
        $('.novaData').hide();
    });
</script>