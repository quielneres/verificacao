<?php
class AppController extends Controller {
	
	var $_Filter = array();	
	var $actionsFilters = array('index', 'index1', 'index2', 'index3', 'index4', 'index5', 'index6', 'index7', 'index8');
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax');	
	var $components = array('Auth', 'Filter', 'RequestHandler');
		
    function beforeFilter() {

                $this->Auth->userModel = 'Usuario';
		//$this->Auth->allow('login');
                $this->Auth->allowedActions = array('login','logout', 'buscaCtrls', 'geraCtrls', 'buscaAcoes', 'geraAcoes', 'add', 'email');
		$this->Auth->ajaxLogin = array('controller' => 'usuarios', 'action' => 'principal');
		$this->Auth->autoRedirect = false;
		$this->Auth->logoutRedirect = array('controller' => 'usuarios', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'usuarios', 'action' => 'principal');
		$this->Auth->authorize = 'controller';
		//$this->Auth->userScope = array('Usuario.Ativo = 1');
		$this->Auth->loginError = 'Falha no login. Nome de doador ou senha inválidos.';
		$this->Auth->authError = 'VOCÊ NÃO ESTÁ AUTORIZADO A ACESSAR O LOCAL SOLICITADO';

		if($this->RequestHandler->isAjax()){
			if($this->Session->check('Auth') == false) {
				echo '<div class="flash_alert">Sua sessão expirou. Por favor efetue o <a href="/sistema/"><b>LOGIN</b></a> novamente.</div>';
                                //$this->addMessageAlert(__('Após um longo tempo de inatividade sua sessão é finalizada automaticamente por questões de segurança. Por favor efetue o <a href="/systempro/"><b>LOGIN</b></a> novamente.', true));
				exit();
			}
			Configure::write('debug', 0);
			$this->layout = 'ajax';
		}
		
		if($this->actionFilter()) { 
			$this->_Filter = $this->Filter->process($this);
			$url = $this->Filter->url;
			if(empty($url)) {
				$url = '/';
			}
			$this->set('filter_options',array('url'=>array($url)));
		}
	
    }
    
    	function isAuthorized(){
		if(($this->name.':'.$this->action == 'Usuarios:logout') || ($this->name.':'.$this->action == 'Usuarios:principal')) return true;	  
		if($this->Session->check('acoes')) {
			$acoes = $this->Session->read('acoes');
			foreach($acoes as $acao){
				if($acao == '*:*') return true;
				if($acao == $this->name.':'.$this->action) return true;
			}
		}
		return false;
	}
     	
	function actionFilter(){		
		if($this->action == 'index'){
			return true;
		}
		for ( $index = 0, $max_count = sizeof($this->actionsFilters); $index < $max_count; $index++ ) {
			if($this->actionsFilters[$index] == $this->action){
				return true;
			}
		}
		return false;
	}
	
	function __construct() {
	    parent::__construct();
	    if ($this->name == 'CakeError') {
	        $this->constructClasses();
	        $this->beforeFilter();
		}
	}
	
	function addMessageSucess($message){
		$this->addMessage($message, 'Messages.good');
	}
	
	function addMessageError($message){
		$this->addMessage($message, 'Messages.bad');
	}
	
	function addMessageAlert($message){
		$this->addMessage($message, 'Messages.warn');
	}
	
	private function addMessage($message, $tipo){
		$messages = array();
		if ($this->Session->check($tipo)) {
			$messages = $this->Session->read($tipo);
		}	
		$this->Session->write($tipo, $messages + array(sizeof($messages) => $message));
	}
        
        function ajax_validation() {
		$model = &$this->{$this->modelClass};
		$model->set($this->data);
		if ( !$model->validates() ) {
			echo json_encode($model->validationErrors);
		} else {
			echo json_encode(array());
		}
		exit(0);
	}

	function preencher($id) {
		preg_match_all("/\{([A-Za-z0-9._]+)\}/", $this->{$this->modelClass}->autoSearchFields, $maths);
		$fields = array($this->modelClass . "." .  $this->{$this->modelClass}->autocompleteKey);
		foreach ( $maths[1] as $field ) {
			$fields[] = $field;
			$replace[] = "/{{$field}}/";
		}
		$resp = $this->{$this->modelClass}->find('all', array('fields' => $fields, 'conditions' => array($this->modelClass . ".id = $id")));
		$json = array();
		foreach ( $resp as $r ) {
			$jsonpointer = &$json[];
			$jsonpointer['id'] = $r[$this->modelClass]['id'];
			array_shift($r[$this->modelClass]);
			$replaceBy = array();
			foreach ( $r[$this->modelClass] as $value )
				$replaceBy[] = $value;
			$jsonpointer['value'] = preg_replace($replace, $replaceBy, $this->{$this->modelClass}->autoSearchFields);
		}
		return $json[0]['value'];
	}
        
        function autocomplete() {
		preg_match_all("/\{([A-Za-z0-9._]+)\}/", $this->{$this->modelClass}->autoSearchFields, $maths);
		$fields = array($this->modelClass . "." . $this->{$this->modelClass}->autocompleteKey);
		foreach ( $maths[1] as $field ) {
			$fields[] = $field;
			$conditions[] = "$field ilike '%{$_GET['term']}%'";
			$replace[] = "/{{$field}}/";
		}
		$resp = $this->{$this->modelClass}->find('all', array('fields' => $fields, 'conditions' => array(implode("or", $conditions))));
		$json = array();
		foreach ( $resp as $r ) {
			$jsonpointer = &$json[];
			$jsonpointer['id'] = $r[ $this->modelClass ]['id'];
			array_shift($r[$this->modelClass]);
			$replaceBy = array();
			foreach ( $r[$this->modelClass] as $value )
				$replaceBy[] = $value;
			$jsonpointer['value'] = preg_replace($replace, $replaceBy, $this->{$this->modelClass}->autoSearchFields);
		}
		echo json_encode($json);
		exit(0);
	}
	
}
?>