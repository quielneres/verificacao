<?php
class Contrato extends AppModel {

	var $name = 'Contrato';
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
                $pega = $this->query("SELECT termino_vigencia FROM contratos");
		return $pega;       
                } 
                
                function expiraContrato($contratosVencidos2) {
                $hoje = date('d/m/Y');
                $pega = $this->query("UPDATE contratos SET status = 'VENCIDO', data = '".$hoje."' WHERE termino_vigencia = '".$contratosVencidos2."' ");
		return $pega;       
                }
                
                function salvaHistorico($cliente_id,$plano_id,$inicio_vigencia,$termino_vigencia,$status) {                     
                $pega = $this->query("INSERT INTO historicos (cliente_id,plano_id,inicio_vigencia,termino_vigencia,status)VALUES('$cliente_id','$plano_id','$inicio_vigencia','$termino_vigencia','$status')");
		return $pega;       
                } 
                
                
                //FINANCEIRO
                function financeiro($data1, $data2) {            
                $data1 = date('d/m/Y', strtotime($data1));
                $data2 = date('d/m/Y', strtotime($data2));            
                $pega = $this->query("select status from contratos where inicio_vigencia BETWEEN '".$data1."' and '".$data2."'");
		return $pega;       
                } 

                /*
		function pegaCodigoCliente($cliente_id) {
                $pega = $this->query("select codigo_cliente from clientes where id = ".$cliente_id);
		return $pega;       
                }*/
                
                // VALORES
                //select * from contratos where STR_TO_DATE(inicio_vigencia, '%d/%m/%Y') BETWEEN '2014-12-01' and '2014-12-30'
                function valorContrato($status, $data1, $data2) {
                if(!empty($status)){
                $pega = $this->query("select valor_pago from contratos where STR_TO_DATE(data, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' and status = '".$status."' ");
		return $pega;       
                } elseif ($status == '') {
                $pega = $this->query("select valor_pago from contratos where STR_TO_DATE(data, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' ");
		return $pega; 
                }
                }
                
                function valorRetirada($data1, $data2) { 
                //if(!empty($status)){
                $pega = $this->query("select valor_pago from retiradas where STR_TO_DATE(data, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' ");
		return $pega;
                /*} elseif ($status == '') {
                $pega = $this->query("select valor_investido, valor_resgate from contratos where STR_TO_DATE(inicio_vigencia, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' and moeda = 2 ");
		return $pega;    
                }*/
                }
                
                // STATUS
                function ativo($status, $data1, $data2) {
                if($status == 'ATIVO' || $status == ''){
                $pega = $this->query("select status from contratos where STR_TO_DATE(data, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' and status = 'ATIVO' ");
		return $pega;       
                } 
                }
                
                function vencido($status, $data1, $data2) {  
                if($status == 'VENCIDO' || $status == ''){
                $pega = $this->query("select status from contratos where STR_TO_DATE(data, '%d/%m/%Y') BETWEEN '".$data1."' and '".$data2."' and status = 'VENCIDO' ");
		return $pega;       
                }
                }
                               
              
}
?>