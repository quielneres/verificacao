<?php
class Historico extends AppModel {

	var $name = 'Historico';
        var $displayField = 'nome';

        	var $validate = array(
                'cliente_id' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'plano_id' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'inicio_vigencia' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório'),
                'termino_vigencia' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório')
                );
                
                var $belongsTo = array(
                 'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                 'Plano' => array(
			'className' => 'Plano',
			'foreignKey' => 'plano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

                );
                
                function pegaTerminoVigencia() {   
                $pega = $this->query("SELECT termino_vigencia FROM historicos");
		return $pega;       
                } 
                
                function expiraHistorico($historicosVencidos2) {                     
                $pega = $this->query("UPDATE historicos SET status = 'VENCIDO' WHERE termino_vigencia = '".$historicosVencidos2."' ");
		return $pega;       
                } 
              
}
?>