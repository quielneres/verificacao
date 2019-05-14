<?php
class RetiradasController extends AppController {

	var $name = 'Retiradas';
        var $actionsFilters = array('index','index2'); 
        
        function index2() {
            
            //print_r($this->params['url']);

            if(!empty($this->params['url']['data1'])){
            $status = $this->params['url']['status'];
            $data1 = $this->params['url']['data1'];
            $data2 = $this->params['url']['data2'];
            } else{   
            $url = implode("", $this->params['url']);     
            $data1 = substr($url, 21, 10);
            $data2 = substr($url, 32, 10);
            $status = substr($url, 43, 2);    
            }      

           $data11 = str_replace("/","-",$data1);
           $data22 = str_replace("/","-",$data2);           
           $data111 = date('Y-m-d', strtotime($data11));
           $data222 = date('Y-m-d', strtotime($data22));           
           
           /*if($status == 1){
               $data = "STR_TO_DATE(Contrato.inicio_vigencia, '%d/%m/%Y') BETWEEN '".$data111."' and '".$data222."' ";
           }*/
           if($status == 3){
               $data = "STR_TO_DATE(Retirada.data, '%d/%m/%Y') BETWEEN '".$data111."' and '".$data222."' ";
           }
           
                //( !empty($this->data['Cliente']['codigo_cliente']) ) ? $codigo_cliente = 'Cliente.codigo_cliente LIKE \'%'.$this->data['Cliente']['codigo_cliente'].'%\'' : $codigo_cliente = '';
                //( !empty($this->data['Cliente']['nome']) ) ? $cliente = 'Cliente.nome LIKE \'%'.$this->data['Cliente']['nome'].'%\'' : $cliente = '';
                
                $this->paginate = array('fields' => array('id', 'Cliente.nome', 'produto', 'valor_pago', 'data', 'created'),'limit' => 500,'order'=>'created desc', 'conditions' => array($data));              
                $retiradas = $this->paginate(null);
		$this->set(compact('retiradas','status','data1','data2'));
	}
        
	function index() {
            
               ( !empty($this->data['Cliente']['nome']) ) ? $cliente_id = 'Cliente.nome LIKE \'%'.$this->data['Cliente']['nome'].'%\'' : $cliente_id = '';
               ( !empty($this->data['Retirada']['data']) ) ? $data = 'Retirada.data LIKE \'%'.$this->data['Retirada']['data'].'%\'' : $data = '';
                //( !empty($this->data['Retirada']['cpf']) ) ? $cpf = 'Retirada.cpf LIKE \'%'.$this->data['Retirada']['cpf'].'%\'' : $cpf = '';
               
                $this->paginate = array('fields' => array('id', 'Cliente.nome', 'produto', 'valor_pago', 'data', 'created'), 'order'=>'data desc', 'conditions' => array($cliente_id,$data));
		$retiradas = $this->paginate(null);
		$this->set(compact('retiradas'));
	}
    
        function add() {
		if (!empty($this->data)) {
			$this->Retirada->create(); 
                        
                        $cliente_id = $this->data['Retirada']['cliente_id'];
                        $statusContrato = $this->Retirada->pegaStatusContrato($cliente_id);
                        $status = $statusContrato[0]['contratos']['status'];

                        $dataHoje = date("/m/Y");
                        $dataRetirada = $this->Retirada->pegaDataRetirada($cliente_id,$dataHoje);                        
                        //$DataRet = $dataRetirada['retiradas']['data'];
                        
                        //print_r($dataRetirada);
                        //exit;
                        
                        if($status == 'ATIVO'){                      
                        if(empty($dataRetirada)){
                           if ($this->Retirada->save($this->data)) {                        
				$this->addMessageSucess(__('Retirada salvo com sucesso.', true));
				$this->redirect(array('controller' => 'retiradas', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao salvar o Retirada. Tente novamente.', true));
			}                      
                        }else{
                        $this->addMessageError(__('Este cliente já retirou produto com desconto nesse mês.', true));
                        }                       
                      }else{
                      $this->addMessageError(__('Cliente com contrato vencido.', true));
                      }    
                    } 
                    $clientes = $this->Retirada->Cliente->find('list' , array('order'=>'nome ASC'));
                    $this->set(compact('clientes'));
		$this->set('acao', 'add');	
	}
        
        function edit($id = null) {  
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Retirada inválido', true));
			$this->redirect(array('controller' => 'retiradas', 'action'=>'index'));
		}
                if (!empty($this->data)) {                        
                        if ($this->Retirada->save($this->data)) {                                   
				$this->addMessageSucess(__('Retirada alterado com sucesso.', true));
				$this->redirect(array('controller' => 'retiradas', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao alterar o Retirada. Tente novamente.', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Retirada->read(null, $id);
		}
                $clientes = $this->Retirada->Cliente->find('list' , array('order'=>'nome ASC'));
                $this->set(compact('clientes'));
		$this->set('acao', 'edit');
		$this->render('add');
	}    
        
        function delete( $id = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para o Retirada', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Retirada->del($id)) {  
                            $this->addMessageSucess(__('Retirada excluido com sucesso.', true));
                            $this->redirect(array('action'=>'index'));
			}

        }
}
?>