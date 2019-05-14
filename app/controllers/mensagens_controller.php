<?php
class MensagensController extends AppController {

	var $name = 'Mensagens';
	var $actionsFilters = array('index','index2');

	function index() {
            
               ( !empty($this->data['Mensagem']['mensagem']) ) ? $mensagem = 'Mensagem.mensagem LIKE \'%'.$this->data['Mensagem']['mensagem'].'%\'' : $mensagem = '';
               
                $this->paginate = array('fields' => array('id', 'mensagem', 'created'), 'order'=>'created desc', 'conditions' => array($mensagem));
		$mensagens = $this->paginate(null);
		$this->set(compact('mensagens'));
	}
        
        function index2() {
               
                $this->paginate = array('fields' => array('id', 'mensagem', 'created'), 'order'=>'created desc');
		$mensagens = $this->paginate(null);
		$this->set(compact('mensagens'));
	}
    
        function add() {
		if (!empty($this->data)) {
			$this->Mensagem->create();                        
                        if ($this->Mensagem->save($this->data)) {                        
				$this->addMessageSucess(__('Mensagem salva com sucesso.', true));
				$this->redirect(array('controller' => 'mensagens', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao salvar a Mensagem. Tente novamente.', true));
			}
                    }                                  
		$this->set('acao', 'add');	
	}
        
        function edit($id = null) {  
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Mensagem inválida', true));
			$this->redirect(array('controller' => 'mensagens', 'action'=>'index'));
		}
                if (!empty($this->data)) {                        
                        if ($this->Mensagem->save($this->data)) {                                   
				$this->addMessageSucess(__('Mensagem alterada com sucesso.', true));
				$this->redirect(array('controller' => 'mensagens', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao alterar a Mensagem. Tente novamente.', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Mensagem->read(null, $id);
		}                
		$this->set('acao', 'edit');
		$this->render('add');
	}    
        
        function delete( $id = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para a Mensagem', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Mensagem->del($id)) {  
                            $this->addMessageSucess(__('Mensagem excluida com sucesso.', true));
                            $this->redirect(array('action'=>'index'));
			}

        }
}
?>