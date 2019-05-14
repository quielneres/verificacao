<?php

class Investimento extends AppModel
{
    var $name = 'Investimento';


    function somaValorInvestimento($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_investimento) FROM investimentos WHERE ativo = 1 and id_usuario =" . $id_usuario);
        return $pega;
    }


}