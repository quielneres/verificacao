<?php

class Saque extends AppModel
{

    var $name = 'Saque';
    //var $actsAs = array('DateFormatter','Validacao');

    var $displayField = 'valor';

    var $validate = array(
        'valor' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigat¨®rio.')
    );

    /*
var $belongsTo = array(

     'Noticia' => array(
 'className' => 'Noticia',
 'foreignKey' => 'noticia_id',
 'conditions' => '',
 'fields' => '',
 'order' => ''
)

);
*/


    function noticias($descricao, $usuario_id, $saque_id, $created)
    {
        $salva = $this->query("INSERT INTO noticias (usuario_id, saque_id, descricao, status, created, modified) VALUES (" . $usuario_id . ", " . $saque_id . ", '" . $descricao . "', 1, '" . $created . "', '" . $created . "')");
        return $salva;
    }

    function pegaBanco($id)
    {
        $pega = $this->query("SELECT id FROM bancos WHERE usuario_id =" . $id);
        return $pega;
    }

    function alteraNoticia($id, $modified)
    {
        $pega = $this->query("UPDATE noticias SET status = 2, modified = '" . $modified . "' WHERE saque_id =" . $id);
        return $pega;
    }




}