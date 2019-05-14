<?php
class BancosController extends AppController {

	var $name = 'Bancos';
	var $actionsFilters = array('index');

    
        function add($id = null) {
            
            /*
            if(!empty($id) ){
            $id_usuario = $id;    
            }else{
            $id_usuario = $this->Session->read('Auth.Usuario.id');    
            }*/

            $banco = $this->Banco->pegaBanco($id);            
            $id = $banco[0]['bancos']['id'];            
            if(!empty($banco)){
            $this->redirect(array('controller' => 'bancos', 'action'=>'edit/'.$id)); 
            }                        
            
		if (!empty($this->data)) {
			$this->Banco->create();                        
                        if ($this->Banco->save($this->data)) {                        
				$this->addMessageSucess(__('Dados cadastrados com sucesso.', true));
				$this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
			} else {
				$this->addMessageError(__('Ocorreu um erro. Verifique os campos Obrigatorios (*).', true));
			}
                    }
                    //$this->set('id', $id);
	}
        
        function edit($id = null) {            
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Dados invalidos', true));
			$this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
		}
                if (!empty($this->data)) {                        
                        if ($this->Banco->save($this->data)) {                                   
				$this->addMessageSucess(__('Dados alterados com sucesso.', true));
				$this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
			} else {
				$this->addMessageError(__('Ocorreu um erro. Verifique os campo s Obrigatorios (*).', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Banco->read(null, $id);
		}   
		        $this->set(compact('id'));
          
	}  

}
