<?php
class HistoricosController extends AppController {

	var $name = 'Historicos';
	var $actionsFilters = array('index'); 
        var $layout = 'popup';
                
	function index($idCliente = null) {            
                $this->paginate = array('fields' => array('id', 'Cliente.nome', 'Plano.nome', 'inicio_vigencia', 'termino_vigencia', 'status', 'created'), 'order'=>'id desc', 'conditions' => array('cliente_id'=>$idCliente));
		$historicos = $this->paginate(null);
		$this->set(compact('historicos'));
                $this->set('idCliente', $idCliente);
	}
       
        function delete( $id = null, $idCliente = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para o Historico', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Historico->del($id)) {  
                            $this->addMessageSucess(__('Historico excluido com sucesso.', true));
                            $this->redirect(array('action'=>'index/'.$idCliente));
			}
                        $this->set('idCliente', $idCliente);
        }
}
?>