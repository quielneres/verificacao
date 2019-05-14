<?php
class Cliente extends AppModel {

	var $name = 'Cliente';
        
        var $actsAs = array('DateFormatter','Validacao');

        var $displayField = 'nome';

        	var $validate = array(
                //'cpf' => array(
			//'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
                //'cnpj' => array('rule' => 'cnpjOuCpf', 'message' => 'Digite um número de CNPJ/CPF válido.'),
		//	'isUnique' => array('rule' => 'isUnique', 'message' => 'Este número já foi inserido.')
		//),
                'nome' => array(
                        'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório.', 'last' => true),
			'maxLength' => array('rule' => array('maxLength', 15), 'message' => 'Insira no máximo 15 caracteres.')
		),
                    
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
                
                var $belongsTo = array(
                 'Plano' => array(
			'className' => 'Plano',
			'foreignKey' => 'plano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

                );
                
                
            function clientes() {   
                            
            $data = date("m");
                            
            $pega = $this->query("SELECT id, nome, datanascimento FROM clientes where aniversario = '".$data."' ");
            return $pega;       
                }

           function pegaPermissao() {   
                $pega = $this->query("SELECT * FROM permissoes");
		return $pega;       
                } 
                
           function pegaEmails() {   
                $pega = $this->query("SELECT email FROM clientes");
		return $pega;       
                } 
              
}
?>