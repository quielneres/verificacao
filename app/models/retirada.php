<?php
class Retirada extends AppModel {

	var $name = 'Retirada';
        var $displayField = 'nome';

        	var $validate = array(
                'cliente_id' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'produto' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'valor_real' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'valor_desconto' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'valor_pago' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório')	
                );
                
                
                var $belongsTo = array(
                 'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

                );
                
                function pegaStatusContrato($cliente_id) {   
                $pega = $this->query("SELECT status FROM contratos WHERE cliente_id = ".$cliente_id);
		return $pega;       
                } 
                
                function pegaDataRetirada($cliente_id,$dataHoje) {   
                $pega = $this->query("SELECT data FROM retiradas WHERE data LIKE '%$dataHoje' AND cliente_id = ".$cliente_id);
		return $pega;       
                } 
              
}
?>