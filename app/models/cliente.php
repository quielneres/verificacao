<?php
class Cliente extends AppModel {

	var $name = 'Cliente';
        var $displayField = 'nome';

        	var $validate = array(                     
                'nome' => array(
                    'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório', 'last' => true),
                    'isUnique' => array('rule' => 'isUnique', 'message' => 'Este nome já foi cadastrado'))                    
                );
                
                /*
                var $belongsTo = array(
                 'Plano' => array(
			'className' => 'Plano',
			'foreignKey' => 'plano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

                );*/
                
                function pegaEmails() {   
                $pega = $this->query("SELECT email FROM clientes");
		return $pega;       
                }
              
}
?>