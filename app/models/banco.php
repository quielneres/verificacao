<?php

class Banco extends AppModel
{

    var $name = 'Banco';
    //var $actsAs = array('DateFormatter','Validacao');

    var $displayField = 'nome';

    var $validate = array(
        'NomeUsuario' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'cpf' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'banco' => array('rule' => 'notEmpty', 'message' => 'Obrigatório (*)'),
        'tipo' => array('rule' => 'notEmpty', 'message' => 'Obrigatório (*)'),
        'conta' => array('rule' => 'notEmpty', 'message' => 'Obrig. (*)'),
        'agencia' => array('rule' => 'notEmpty', 'message' => 'Obrig. (*)'),
        'favorecido' => array('rule' => 'notEmpty', 'message' => 'Obrigatório (*)')


        //'cpf_cnpj' => array(
        //'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
        //'cnpj' => array('rule' => 'cnpjOuCpf', 'message' => 'Digite um número de CNPJ/CPF válido.'),
        //	'isUnique' => array('rule' => 'isUnique', 'message' => 'Este número já foi inserido.')
        //),
        /*'nome' => array(
                'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
    'maxLength' => array('rule' => array('maxLength', 15), 'message' => 'Insira no máximo 15 caracteres.')
),*/

        //'Sexo' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),

        //'telefone' => array(
        //        'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.')
        //),


        /* 'datanascimento' => array(
     'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
         'data' => array('rule' => 'validaData', 'message' => 'Insira uma data válida.')
 ),*/


        /*'endereco' => array(
                        'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
            'maxLength' => array('rule' => array('maxLength', 100), 'message' => 'Insira no máximo 100 caracteres.')
        )*/

    );

    /*
    var $hasMany = array(
'Produto' => array(
'className' => 'Produto',
'foreignKey' => 'banco_id',
'dependent' => false,
'conditions' => '',
'fields' => '',
'order' => '',
'limit' => '',
'offset' => '',
'exclusive' => '',
'finderQuery' => '',
'counterQuery' => ''
)

    );
    */

    function pegaBanco($id)
    {
        $pega = $this->query("SELECT id FROM bancos WHERE usuario_id =" . $id);
        return $pega;
    }

}

?>