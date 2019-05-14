<?php
class PermissoesController extends AppController {

	var $name = 'Permissoes';
	
	private function geraAcoes() {
		$className = $this->data['Permissao']['Controllers'];
		
		if($className == '*') {
			$actions = array('*'=>'*');
		} else {
			App::import('Controller', $className);
	        $controller_methods = get_class_methods($className.'Controller');
			$controller_app = get_class_methods('AppController');
			$controller_methods = array_diff($controller_methods,$controller_app);
			if($className == 'Usuarios') {
				foreach($controller_methods as $key => $value)
					if($value == 'login' || $value == 'logout' || $value == 'principal')
						unset($controller_methods[$key]);
			}
			sort($controller_methods);
			$actions = array_combine($controller_methods, $controller_methods);
			
		}
		return $actions;
	}

	function index() {
            
                ( !empty($this->data['Permissao']['Alias']) ) ? $Alias = 'Permissao.Alias LIKE \'%'.$this->data['Permissao']['Alias'].'%\'' : $Alias = '';
                ( !empty($this->data['Permissao']['combinacao']) ) ? $combinacao = 'Permissao.combinacao LIKE \'%'.$this->data['Permissao']['combinacao'].'%\'' : $combinacao = '';
                
		$this->Permissao->recursive = 0;
		$this->paginate = array('order'=>'id ASC', 'conditions' => array($Alias, $combinacao));
		$this->set('permissoes', $this->paginate(null));
                
	}

	function add() {
		if (!empty($this->data)) {
			$concatenado = $this->Permissao->findByCombinacao($this->data['Permissao']['Controllers'].':'.$this->data['Permissao']['Actions']);
			$this->Permissao->create();
			if(empty($concatenado)){
				$this->data['Permissao']['combinacao'] = $this->data['Permissao']['Controllers'].':'.$this->data['Permissao']['Actions'];
				if ($this->Permissao->save($this->data)) {
					//$this->Session->setFlash('O registro foi incluído com sucesso.', 'flash_good');
                                        $this->addMessageSucess(__('O registro foi incluído com sucesso.', true));
					$this->redirect(array('action'=>'index'));
				} else {
					//$this->Session->setFlash('O registro não pode ser incluído. Tente novamente.', 'flash_bad');
                                         $this->addMessageError(__('O registro não pode ser incluído. Tente novamente.', true));
				}
			} else {
				//$this->Session->setFlash('Essa permissão já foi cadastrada. Tente novamente.', 'flash_bad');
                                $this->addMessageError(__('Essa permissão já foi cadastrada. Tente novamente.', true));
			}
		}
		
		$controllerList = Configure::listObjects('controller');
        foreach($controllerList as $controllerItem)
        	if(($controllerItem <> 'App') && ($controllerItem <> 'Pages')) 
        		$controllers[] = $controllerItem;
        array_push($controllers, '*');
        sort($controllers);
        $controllers = array_combine($controllers, $controllers);
        
        if(!empty($this->data['Permissao']['Controllers'])) 
        	$actions = $this->geraAcoes();
        else $actions = '';

        $this->set(compact('controllers','actions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			//$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                        $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$concatenado = $this->Permissao->findByCombinacao($this->data['Permissao']['Controllers'].':'.$this->data['Permissao']['Actions']);
			if(empty($concatenado) || ($concatenado['Permissao']['id'] == $this->data['Permissao']['id'])){
				$this->data['Permissao']['combinacao'] = $this->data['Permissao']['Controllers'].':'.$this->data['Permissao']['Actions'];
				if ($this->Permissao->save($this->data)) {
					//$this->Session->setFlash('O registro foi atualizado com sucesso.', 'flash_good');
                                        $this->addMessageSucess(__('O registro foi atualizado com sucesso.', true));
					$this->redirect(array('action'=>'index'));
				} else {
					//$this->Session->setFlash('O registro não pode ser atualizado. Tente novamente.', 'flash_bad');
                                        $this->addMessageError(__('O registro não pode ser atualizado. Tente novamente.', true));
				}
			} else {
				//$this->Session->setFlash('Essa permissão já foi cadastrada. Tente novamente.', 'flash_bad');
                                  $this->addMessageError(__('Essa permissão já foi cadastrada. Tente novamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Permissao->read(null, $id);
		}
		
		$controllerList = Configure::listObjects('controller');
        foreach($controllerList as $controllerItem)
        	if(($controllerItem <> 'App') && ($controllerItem <> 'Pages')) 
        		$controllers[] = $controllerItem;
        array_push($controllers, '*');
        sort($controllers);
        $controllers = array_combine($controllers, $controllers);
        
	 	if(!empty($this->data['Permissao']['combinacao']) && empty($this->data['Permissao']['Controllers']) && empty($this->data['Permissao']['Actions'])) {
        	$valor = explode(':', $this->data['Permissao']['combinacao']);
        	$this->data['Permissao']['Controllers'] = $valor[0];
        	$this->data['Permissao']['Actions'] = $valor[1];
        }
        
        if(!empty($this->data['Permissao']['Controllers'])) 
        	$actions = $this->geraAcoes();
        else $actions = '';

        $this->set(compact('controllers','actions'));
	}

	function delete($id = null) {
		if (!$id) {
			//$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                        $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
			$this->redirect(array('action'=>'index'));
		}
		$dependencia = $this->Permissao->find(array('Permissao.id'=>$id));
		if(empty($dependencia['Grupo'])){
			if ($this->Permissao->del($id)) {
				//$this->Session->setFlash('O registro foi apagado com sucesso.', 'flash_good');
                                $this->addMessageSucess(__('O registro foi apagado com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		//$this->Session->setFlash('O registro não pode ser APAGADO pois essa permissão está sendo usada em algum grupo.', 'flash_bad');
                $this->addMessageError(__('O registro não pode ser APAGADO pois essa permissão está sendo usada em algum grupo.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function buscaAcoes() {
		$this->layout = 'editor';
		$actions = $this->geraAcoes();
		
		if ($actions != null) {
			foreach($actions as $key => $action){
				echo "<option value=\"{$key}\">{$action}</option>";
			}
		} else { 
			echo "<option value=\"\">Selecione uma opção</option>";
		}
		$this->render(false);
	}

}
?>