<?php
class ContratosController extends AppController {

	var $name = 'Contratos';
	var $actionsFilters = array('index','index2'); 
        var $users = array('Historico'); 
        
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
           
           if($status == 1){
               $data = "STR_TO_DATE(Contrato.inicio_vigencia, '%d/%m/%Y') BETWEEN '".$data111."' and '".$data222."' and status = 'ATIVO' ";
           }
           if($status == 2){
               $data = "STR_TO_DATE(Contrato.inicio_vigencia, '%d/%m/%Y') BETWEEN '".$data111."' and '".$data222."' and status = 'VENCIDO' ";
           }
           
                //( !empty($this->data['Cliente']['codigo_cliente']) ) ? $codigo_cliente = 'Cliente.codigo_cliente LIKE \'%'.$this->data['Cliente']['codigo_cliente'].'%\'' : $codigo_cliente = '';
                //( !empty($this->data['Cliente']['nome']) ) ? $cliente = 'Cliente.nome LIKE \'%'.$this->data['Cliente']['nome'].'%\'' : $cliente = '';
                
                $this->paginate = array('fields' => array('id', 'email', 'cliente_id', 'plano_id', 'Cliente.nome', 'Plano.nome', 'inicio_vigencia', 'termino_vigencia', 'status', 'data', 'created'),'limit' => 500,'order'=>'data desc', 'conditions' => array($data));              
                $contratos = $this->paginate(null);
		$this->set(compact('contratos','status','data1','data2'));
	}
        
        // FINANCEIRO COMEÇO      
        function financeiro() {

           // DATAS
           $status = $this->data['Contrato']['status']; 
           $data111 = $this->data['Contrato']['data1']; 
           $data222 = $this->data['Contrato']['data2'];           
           $data11 = str_replace("/","-",$data111);
           $data22 = str_replace("/","-",$data222);           
           $data1 = date('Y-m-d', strtotime($data11));
           $data2 = date('Y-m-d', strtotime($data22));
           
           $valorContrato = $this->Contrato->valorContrato($status, $data1, $data2);
           $valorRetirada = $this->Contrato->valorRetirada($data1, $data2);
           
           $qtdContrato = count($valorContrato);
           $qtdRetirada = count($valorRetirada);
           
           //print_r($valorReal);
           
           // CONTRATO
           for($i = 0; $i < $qtdContrato; $i++){
           $valor_contrato = $valorContrato[$i]['contratos']['valor_pago'];
           
           //$valor_contrato = str_replace("R$","",$valor_contrato);
           $valor_contrato = str_replace(".","",$valor_contrato);
           $valor_contrato = str_replace(",","",$valor_contrato);
           
           $totalContrato = $totalContrato + $valor_contrato; 
           
           //$totalRealInvestido = number_format($totalRealInvestido,2,",",".");
           //$totalRealResgatado = number_format($totalRealResgatado,2,",",".");
           
           }
           
           // RETIRADAS
           for($i = 0; $i < $qtdRetirada; $i++){
           $valor_retiradas = $valorRetirada[$i]['retiradas']['valor_pago'];
           
           $valor_retiradas = str_replace(".","",$valor_retiradas);
           $valor_retiradas = str_replace(",","",$valor_retiradas);
           
           $totalRetirada = $totalRetirada + $valor_retiradas; 
           
           //$totalDolarInvestido = number_format($totalDolarInvestido,2, ',','');
           //$totalDolarResgatado = number_format($totalDolarResgatado,2, ',','');
           
           }        

           // QUANTIDADE DE STATUS
           $ativo2 = $this->Contrato->ativo($status, $data1, $data2);
           $vencido2 = $this->Contrato->vencido($status, $data1, $data2);         
           $ativo = count($ativo2);
           $vencido = count($vencido2);

           $this->set(compact('totalContrato', 'totalRetirada', 'ativo', 'vencido', 'qtdRetirada'));
      
	}     
        // FINANCEIRO FIM
        
        
        function email($id = null) {
            
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Cliente inválido', true));
			$this->redirect(array('controller' => 'contratos', 'action'=>'index'));
		}
           
		if (!empty($this->data)) {
			//$this->Cliente->create();

                        //$nome_destinatario = $this->data['Cliente']['nome'];
                        $nome_remetente = $this->data['Contrato']['nomeremetente'];
                        $email_remetente = $this->data['Contrato']['emailremetente'];
                        $email_destinatario = $this->data['Cliente']['email'];
                        $assunto = $this->data['Contrato']['assunto'];
                        $mensagem = $this->data['Contrato']['mensagem'];
                        
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
	$this->redirect(array('controller' => 'contratos', 'action'=>'index'));
    }
    // Se mensagem não foi enviada pelo servidor…
    else
    {
        //echo "Mensagem não enviada!";
        $this->addMessageError(__('Ocorreu um erro, o e-mail não foi enviado. verifique se os campos foram preenchidos corretamente.', true));
    }          

    }
                    
    if (empty($this->data)) {
		$this->data = $this->Contrato->read(null, $id);
		}
                
		//$this->set('acao', 'add');    
        }
        
	function index() {
            
            // VERIFICA SE O CONTRATO ESTÁ ATIVO OU VENCIDO PELA DATA FINAL DA VIGENCIA
            $datasContratosVencidos = $this->Contrato->pegaTerminoVigencia();
            $dataHoje = date("d-m-Y");            
            $tamanho = count($datasContratosVencidos);

            for ($i = 0; $i < $tamanho; $i++) {                                
            $contratosVencidos2 = $datasContratosVencidos[$i]['contratos']['termino_vigencia'];            
            $contratosVencidos = str_replace("/","-",$contratosVencidos2);            
            // Comparando as Datas
            if(strtotime($dataHoje) >= strtotime($contratosVencidos)){
            //echo 'contrato vencido.';                        
            $expiraContrato = $this->Contrato->expiraContrato($contratosVencidos2);                           
            }                                                    
            }         
            
               ( !empty($this->data['Cliente']['nome']) ) ? $cliente_id = 'Cliente.nome LIKE \'%'.$this->data['Cliente']['nome'].'%\'' : $cliente_id = '';
               ( !empty($this->data['Contrato']['status']) ) ? $status = 'Contrato.status LIKE \'%'.$this->data['Contrato']['status'].'%\'' : $status = '';
               ( !empty($this->data['Contrato']['inicio_vigencia']) ) ? $inicio_vigencia = 'Contrato.inicio_vigencia LIKE \'%'.$this->data['Contrato']['inicio_vigencia'].'%\'' : $inicio_vigencia = '';
               ( !empty($this->data['Contrato']['termino_vigencia']) ) ? $termino_vigencia = 'Contrato.termino_vigencia LIKE \'%'.$this->data['Contrato']['termino_vigencia'].'%\'' : $termino_vigencia = '';
               //( !empty($this->data['Cliente']['aniversario']) ) ? $aniversario = 'Cliente.aniversario LIKE \'%'.$this->data['Cliente']['aniversario'].'%\'' : $aniversario = '';
               
                $this->paginate = array('fields' => array('id', 'email', 'cliente_id', 'plano_id', 'Cliente.nome', 'Plano.nome', 'inicio_vigencia', 'termino_vigencia', 'status', 'data', 'created'), 'order'=>'data desc', 'conditions' => array($cliente_id,$status,$inicio_vigencia,$termino_vigencia));
		$contratos = $this->paginate(null);
		$this->set(compact('contratos'));
	}
    
        function add() {
		if (!empty($this->data)) {
			$this->Contrato->create();  
                        
                        $this->data['Contrato']['data'] = date('d/m/Y'); 
                        
                        if ($this->Contrato->save($this->data)) { 
                            
                            $cliente_id = $this->data['Contrato']['cliente_id'];
                            $plano_id = $this->data['Contrato']['plano_id'];
                            $inicio_vigencia = $this->data['Contrato']['inicio_vigencia'];
                            $termino_vigencia = $this->data['Contrato']['termino_vigencia'];
                            $status = 'CONTRATADO';
                            //$cliente = $this->data['Contrato']['cliente_id'];

                            $this->Contrato->salvaHistorico($cliente_id,$plano_id,$inicio_vigencia,$termino_vigencia,$status);
                            //$this->Historico->saveField('plano_id', $plano_id);
                            
				$this->addMessageSucess(__('Contrato salvo com sucesso.', true));
				$this->redirect(array('controller' => 'contratos', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao salvar o Contrato. Tente novamente.', true));
			}
                    }
                    $clientes = $this->Contrato->Cliente->find('list' , array('order'=>'nome ASC'));
                    $this->set(compact('clientes'));
                    $planos = $this->Contrato->Plano->find('list' , array('order'=>'nome ASC'));
                    $this->set(compact('planos'));
		$this->set('acao', 'add');	
	}
        
        function edit($id = null) {  
                if (!$id && empty($this->data)) {
			$this->addMessageError(__('Contrato inválido', true));
			$this->redirect(array('controller' => 'contratos', 'action'=>'index'));
		}
                if (!empty($this->data)) {
                    
                    $this->data['Contrato']['data'] = date('d/m/Y');
                    
                    if(!empty($this->data['Contrato']['renovar'])){
                    $this->data['Contrato']['status'] = $this->data['Contrato']['renovar'];    
                    }
                    
                        if ($this->Contrato->save($this->data)) {
                            
                            $cliente_id = $this->data['Contrato']['cliente_id'];
                            $plano_id = $this->data['Contrato']['plano_id'];
                            $inicio_vigencia = $this->data['Contrato']['inicio_vigencia'];
                            $termino_vigencia = $this->data['Contrato']['termino_vigencia'];
                            $status = 'RENOVADO';
                            //$cliente = $this->data['Contrato']['cliente_id'];

                            $this->Contrato->salvaHistorico($cliente_id,$plano_id,$inicio_vigencia,$termino_vigencia,$status);
                            //$this->Historico->saveField('plano_id', $plano_id);
                            
				$this->addMessageSucess(__('Contrato alterado com sucesso.', true));
				$this->redirect(array('controller' => 'contratos', 'action'=>'index'));
			} else {
				$this->addMessageError(__('Ocorreu um erro ao alterar o Contrato. Tente novamente.', true));
			}
		
                     }
                
		if (empty($this->data)) {
			$this->data = $this->Contrato->read(null, $id);
		}
                
                $idCliente = $this->data['Contrato']['cliente_id'];
                $status = $this->data['Contrato']['status'];
                //$this->set(compact('status'));                
                $clientes = $this->Contrato->Cliente->find('list' , array('order'=>'nome ASC'));
                //$this->set(compact('clientes'));
                $planos = $this->Contrato->Plano->find('list' , array('order'=>'nome ASC'));
                $this->set(compact('idCliente', 'status','clientes','planos'));
		$this->set('acao', 'edit');
		$this->render('add');                
	}    
        
        function delete( $id = null) {
            if ( !$id ) {
			$this->addMessageError(__('Id inválido para o Contrato', true));
			$this->redirect(array('action'=>'index'));
		}  
			if ($this->Contrato->del($id)) {  
                            $this->addMessageSucess(__('Contrato excluido com sucesso.', true));
                            $this->redirect(array('action'=>'index'));
			}

        }
}
?>