<?php
class ClientesController extends AppController {

	var $name = 'Clientes';
	var $actionsFilters = array('index');
        
        function email($id = null) {
            
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Cliente inválido', true));
			$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
		}
           
		if (!empty($this->data)) {
			//$this->Cliente->create();

                        //$nome_destinatario = $this->data['Cliente']['nome'];
                        $nome_remetente = $this->data['Cliente']['nomeremetente'];
                        $email_remetente = $this->data['Cliente']['emailremetente'];
                        $email_destinatario = $this->data['Cliente']['email'];
                        $assunto = $this->data['Cliente']['assunto'];
                        $mensagem = $this->data['Cliente']['mensagem'];
                        
                        //print_r($nome_remetente);
                        //exit;
           
    // Dados de envio e da mensagem

    //$nome_remetente = "Fulano da Silva";   
    //$assunto = "Mensagem de teste";
    //$email_remetente = "marcosbatera.pc@gmail.com";
    //$email_destinatario = "marcosbatera.pc@gmail.com";

    // Conteudo do e-mail (você poderá usar HTML)

    //$mensagem = "Olá, ".$nome_destinatario."!<br />";
    //$mensagem .= "Esta é uma mensagem da ".$nome_remetente." pra você!<br />";
    //$mensagem .= "Até mais!<br /><br />";
    //$mensagem .= "<b>".$nome_remetente."</b><br />";

    // Cabeçalho do e-mail. Não é necessário alterar geralmente...

    $cabecalho =    "MIME-Version: 1.0\n";
    $cabecalho .=   "Content-Type: text/html; charset=UTF-8\n";
    $cabecalho .=   "From: \"{$nome_remetente}\" <{$email_remetente}>\n";

    // Dispara e-mail e retorna status para variável

    $status_envio = @mail ($email_destinatario, $assunto, $mensagem, $cabecalho);

    // Se mensagem foi enviada pelo servidor…

    if ($status_envio) {
        //echo "Mensagem enviada!";
        $this->addMessageSucess(__('Mensagem enviada com sucesso.', true));
	$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
    }
    // Se mensagem não foi enviada pelo servidor…
    else
    {
        //echo "Mensagem não enviada!";
        $this->addMessageError(__('Ocorreu um erro, o e-mail não foi enviado. verifique se os campos foram preenchidos corretamente.', true));
    }          

    }
                    
    if (empty($this->data)) {
		$this->data = $this->Cliente->read(null, $id);
		}
                
		//$this->set('acao', 'add');    
        }
        
        
    function email2() {

        $todosEmails1 = '';
        
                    $emails = $this->Cliente->pegaEmails();

                            $tamanho = count($emails);

                            for ($i = 0; $i < $tamanho; $i++) {
                                
                            $todosEmails2 = $emails[$i]['clientes']['email'];
                            
                            $todosEmails1 = $todosEmails1.','.$todosEmails2;
        
                            }

                    $todosEmails = substr($todosEmails1, 1);
                    
                    $this->set(compact('todosEmails'));
                    
              if (!empty($this->data)) {
			$this->Cliente->create();
                    
                    
                        //$nome_destinatario = $this->data['Cliente']['nome'];
                        $nome_remetente = $this->data['Cliente']['nomeremetente'];
                        $email_remetente = $this->data['Cliente']['emailremetente'];
                        
                        $email_destinatario = $this->data['Cliente']['email'];
                        
                        $assunto = $this->data['Cliente']['assunto'];
                        $mensagem = $this->data['Cliente']['mensagem'];

    $cabecalho =    "MIME-Version: 1.0\n";
    $cabecalho .=   "Content-Type: text/html; charset=UTF-8\n";
    $cabecalho .=   "From: \"{$nome_remetente}\" <{$email_remetente}>\n";

    // Dispara e-mail e retorna status para variável

    $status_envio = @mail ($email_destinatario, $assunto, $mensagem, $cabecalho);

    // Se mensagem foi enviada pelo servidor…

    if ($status_envio) {
        //echo "Mensagem enviada!";
        $this->addMessageSucess(__('Mensagem enviada para todos clientes.', true));
	$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
    }
    // Se mensagem não foi enviada pelo servidor…
    else
    {
        //echo "Mensagem não enviada!";
        $this->addMessageError(__('Ocorreu um erro, o e-mail não foi enviado. verifique se os campos foram preenchidos corretamente.', true));
    }          

    }
                    
    if (empty($this->data)) {
		$this->data = $this->Cliente->read(null, $id);
		}
        }
        
	function index() {
            
               ( !empty($this->data['Cliente']['nome']) ) ? $nome = 'Cliente.nome LIKE \'%'.$this->data['Cliente']['nome'].'%\'' : $nome = '';
               ( !empty($this->data['Cliente']['cpf']) ) ? $cpf = 'Cliente.cpf LIKE \'%'.$this->data['Cliente']['cpf'].'%\'' : $cpf = '';
               
                $this->paginate = array('fields' => array('id', 'nome', 'cpf', 'email', 'created'), 'order'=>'created desc', 'conditions' => array($nome, $cpf));
		$clientes = $this->paginate(null);
		$this->set(compact('clientes'));
	}
    
        function add() {
		if (!empty($this->data)) {
			$this->Cliente->create();                        
                        if ($this->Cliente->save($this->data)) {                        
				$this->addMessageSucess(__('Cliente salvo com sucesso.', true));
				$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao salvar o Cliente. Tente novamente.', true));
			}
                    }                                  
		$this->set('acao', 'add');	
	}
        
        function edit($id = null) {  
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Cliente inválido', true));
			$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
		}
                if (!empty($this->data)) {                        
                        if ($this->Cliente->save($this->data)) {                                   
				$this->addMessageSucess(__('Cliente alterado com sucesso.', true));
				$this->redirect(array('controller' => 'clientes', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao alterar o Cliente. Tente novamente.', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Cliente->read(null, $id);
		}                
		$this->set('acao', 'edit');
		$this->render('add');
	}    
        
        function delete( $id = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para o Cliente', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Cliente->del($id)) {  
                            $this->addMessageSucess(__('Cliente excluido com sucesso.', true));
                            $this->redirect(array('action'=>'index'));
			}

        }
}
?>