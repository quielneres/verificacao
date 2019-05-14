<?php
class GruposController extends AppController {

	var $name = 'Grupos';

	function index() {

                ( !empty($this->data['Grupo']['Descricao']) ) ? $descricao = 'Grupo.Descricao LIKE \'%'.$this->data['Grupo']['Descricao'].'%\'' : $descricao = '';
            
		$this->Grupo->recursive = 0;
		$this->paginate = array('order'=>'Descricao ASC', 'conditions' => array($descricao));
		$this->set('grupos', $this->paginate());
            
            /*
		$this->Grupo->recursive = 0;
		$this->paginate = array('order'=>'Descricao ASC');
		$this->set('grupos', $this->paginate());
             * */

	}

	function view($id = null) {
		if (!$id) {
			//$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
			$this->addMessageError(__('O registro informado é inválido ou não existe.', true));
                        $this->redirect(array('action'=>'index'));
		}
		$this->set('grupo', $this->Grupo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			if(!empty($this->data['Permissao']['Permissao'])) {
				$this->Grupo->create();
				if ($this->Grupo->saveAll($this->data, array('validate'=>'first'))) {
					//$this->Session->setFlash('O registro foi incluído com sucesso.', 'flash_good');
                                        $this->addMessageSucess(__('O registro foi incluído com sucesso.', true));
					$this->redirect(array('action'=>'index'));
				} else {
					//$this->Session->setFlash('O registro não pode ser incluído. Tente novamente.', 'flash_bad');
                                        $this->addMessageError(__('O registro não pode ser incluído. Tente novamente.', true));
				}
			} else {
				//$this->Session->setFlash('É necessário selecionar pelo menos uma permissão. Tente novamente.', 'flash_bad');
                                $this->addMessageError(__('É necessário selecionar pelo menos uma permissão. Tente novamente.', true));
			}
		}
		
		if(array_key_exists('NaoSelecionado', $this->data['Permissao']))
			$permissoes = '';
		else $permissoes = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC'));

		if(!empty($this->data['Permissao']['NaoSelecionado']))
			$permissoes = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('Permissao.id' => $this->data['Permissao']['NaoSelecionado'])));

		if(!empty($this->data['Permissao']['Permissao']))
			$permissaoselecionada = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('Permissao.id' => $this->data['Permissao']['Permissao'])));
		else $permissaoselecionada = '';
		
		$this->set(compact('permissoes','permissaoselecionada'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			//$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                        $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if(!empty($this->data['Permissao']['Permissao'])) {
				if ($this->Grupo->saveAll($this->data, array('validate'=>'first'))) {
					//$this->Session->setFlash('O registro foi atualizado com sucesso.', 'flash_good');
                                        $this->addMessageSucess(__('O registro foi atualizado com sucesso.', true));
                                        
					$this->redirect(array('action'=>'index'));
				} else {
					//$this->Session->setFlash('O registro não pode ser atualizado. Tente novamente.', 'flash_bad');
                                        $this->addMessageError(__('O registro não pode ser atualizado. Tente novamente.', true));
				}
			} else {
				//$this->Session->setFlash('É necessário selecionar pelo menos uma permissão. Tente novamente.', 'flash_bad');
                                $this->addMessageError(__('É necessário selecionar pelo menos uma permissão. Tente novamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Grupo->read(null, $id);
		}
		
		if(array_key_exists('NaoSelecionado', $this->data['Permissao']))
			$permissoes = '';
		else $permissoes = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC'));
		
		if(!empty($this->data['Permissao']) && !(array_key_exists('Permissao', $this->data['Permissao'])) && !(array_key_exists('NaoSelecionado', $this->data['Permissao']))) {
			foreach($this->data['Permissao'] as $permissao)
				$ids_permissoes[] = $permissao['id'];
			$permissaoselecionada = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('Permissao.id' => $ids_permissoes)));
			$permissoes = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('NOT' => array('Permissao.id' => $ids_permissoes))));
		} else {
			if(!empty($this->data['Permissao']['Permissao']))
			$permissaoselecionada = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('Permissao.id' => $this->data['Permissao']['Permissao'])));
			else $permissaoselecionada = '';
			
			if(!empty($this->data['Permissao']['NaoSelecionado']))
			$permissoes = $this->Grupo->Permissao->find('list', array('order'=>'Permissao.id ASC', 'conditions' => array('Permissao.id' => $this->data['Permissao']['NaoSelecionado'])));
		}
		
		$this->set(compact('permissoes','permissaoselecionada'));
	}

	function delete($id = null) {
		if (!$id) {
			//$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                         $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
			$this->redirect(array('action'=>'index'));
		}
		$dependencia = $this->Grupo->find(array('Grupo.id'=>$id));
		if(empty($dependencia['Usuario'])){
			if ($this->Grupo->del($id)) {
				//$this->Session->setFlash('O registro foi apagado com sucesso.', 'flash_good');
                                $this->addMessageSucess(__('O registro foi apagado com sucesso.', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		//$this->Session->setFlash('O registro não pode ser APAGADO pois esse grupo possui ligação com algum doador.', 'flash_bad');
                $this->addMessageError(__('O registro não pode ser APAGADO pois esse grupo possui ligação com algum doador.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>