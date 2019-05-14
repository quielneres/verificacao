<?php
class PlanosController extends AppController {

	var $name = 'Planos';
	var $actionsFilters = array('index');
        
	function index() {
            
               ( !empty($this->data['Plano']['nome']) ) ? $nome = 'Plano.nome LIKE \'%'.$this->data['Plano']['nome'].'%\'' : $nome = '';
               //( !empty($this->data['Plano']['cpf_cnpj']) ) ? $cpf_cnpj = 'Plano.cpf_cnpj LIKE \'%'.$this->data['Plano']['cpf_cnpj'].'%\'' : $cpf_cnpj = '';
                $this->paginate = array('fields' => array('id', 'nome', 'valor', 'desconto', 'vigencia', 'observacao', 'created'), 'order'=>'created desc', 'conditions' => array($nome));
		$planos = $this->paginate(null);
		$this->set(compact('planos'));                
	}
    
        function add() {
		if (!empty($this->data)) {
			$this->Plano->create();                        
                        if ($this->Plano->save($this->data)) {                        
				$this->addMessageSucess(__('Plano salvo com sucesso.', true));
				$this->redirect(array('controller' => 'planos', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao salvar o Plano. Tente novamente.', true));
			}
                    }
                
		$this->set('acao', 'add');	
	}
        
        function edit($id = null) {  
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Plano inválido', true));
			$this->redirect(array('controller' => 'planos', 'action'=>'index'));
		}
                if (!empty($this->data)) {                        
                        if ($this->Plano->save($this->data)) {                                   
				$this->addMessageSucess(__('Plano alterado com sucesso.', true));
				$this->redirect(array('controller' => 'planos', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao alterar o Plano. Tente novamente.', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Plano->read(null, $id);
		}
		$this->set('acao', 'edit');
		$this->render('add');
	}  
        
        function delete( $id = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para o Plano', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Plano->del($id)) {  
                            $this->addMessageSucess(__('Plano excluido com sucesso.', true));
                            $this->redirect(array('action'=>'index'));
			}

        }
}
?>