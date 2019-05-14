<?php


class SaquesController extends AppController
{

    var $name           = 'Saques';
    var $actionsFilters = array('index');

    //var $uses = array('Noticia');

    function index()
    {

        (!empty($this->data['Saque']['valor'])) ? $valor = 'Saque.valor LIKE \'%' . $this->data['Saque']['valor'] . '%\'' : $valor = '';
        //( !empty($this->data['Saque']['cpf_cnpj']) ) ? $cpf_cnpj = 'Saque.cpf_cnpj LIKE \'%'.$this->data['Saque']['cpf_cnpj'].'%\'' : $cpf_cnpj = '';
        $this->paginate = array('fields' => array('id', 'valor', 'created', 'created'), 'order' => 'created desc', 'conditions' => array($valor));
        $saques         = $this->paginate(null);
        $this->set(compact('saques'));
    }

    function add($total_geral = null, $transferencia = null)
    {


        if (!empty($this->data)) {
            $this->Saque->create();

            $saque = $this->data['Saque']['valor'];

            $valor1 = str_replace(",", "", $this->data['Saque']['valor']);
            $valor  = str_replace(".", "", $valor1);

            $saldo1 = str_replace(",", "", $this->data['Saque']['saldo']);
            $saldo  = str_replace(".", "", $saldo1);

            $id = $this->Session->read('Auth.Usuario.id');

            if ($transferencia == 1 || $this->data['Saque']['transferencia'] == 1) {

                if ($valor <= $saldo) {
                    $id_usuario_destinatario = $this->params['form']['usuario'];
                    $valor_tranferencia      = $this->data['Saque']['valor'];

                    if ($id_usuario_destinatario && $valor_tranferencia) {

                        if ($valor >= 10000) {
                            $salva = $this->transferencia($id, $id_usuario_destinatario, $valor_tranferencia);

                            $this->addMessageSucess(__('Transferencia realizada com sucesso. O Valor ja foi adicionado ao saldo do destinatario', true));
                            $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));

                        } else {
                            $this->addMessageError(__('Erro. O valor mínimo para Transferencia é de R$ 100,00', true));
                            $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                        }
                    } else {
                        $this->addMessageError(__('Erro. Todos os campos são obrigatórios', true));
                        $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                    }

                } else {
                    $this->addMessageError(__('Erro. Saldo insuficiente para trasferencia', true));
                    $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                }

            } else {

                if ($valor <= $saldo) {

                    if ($valor >= 10000) {

                        //$id = $this->Session->read('Auth.Usuario.id');
                        $banco = $this->Saque->pegaBanco($id);
                        if (!empty($banco)) {

                            $this->data['Saque']['valor'] = str_replace(".", "", $this->data['Saque']['valor']);
                            $this->data['Saque']['valor'] = str_replace(",", ".", $this->data['Saque']['valor']);

                            $this->data['Saque']['saldo'] = $saldo - $valor;

                            if ($this->Saque->save($this->data)) {

                                $saque_id = mysql_insert_id();

                                $date       = date('d/m/Y H:i');
                                $created    = date('Y-m-d H:i:s');
                                $usuario_id = $this->Session->read('Auth.Usuario.id');
                                $nome       = $this->Session->read('Auth.Usuario.NomeUsuario');
                                $descricao  = $date . ' - ' . $nome . ' Solicitou saque no valor de R$ ' . $saque;

                                $salvaNoticias = $this->Saque->noticias($descricao, $usuario_id, $saque_id, $created);

                                //$this->Saque->Noticia->saveField('usuario_id', $usuario_id);

                                $this->addMessageSucess(__('Solicitação realizada com sucesso. Aguarde o depósito do valor em sua conta bancária', true));
                                $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                                //$this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
                            } else {
                                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
                                $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                                //$this->redirect(array('controller'=> 'saques', 'action'=>'add/'.$this->data['Saque']['saldo']));
                            }
                        } else {
                            $this->addMessageError(__('Erro. Falta preencher as informacoes da conta bancaria no menu Financeiro.', true));
                            $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                            //$this->redirect(array('controller'=> 'saques', 'action'=>'add/'.$this->data['Saque']['saldo']));
                        }
                    } else {
                        $this->addMessageError(__('Erro. O valor mínimo para saque é de R$ 100,00', true));
                        $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                        //$this->redirect(array('controller'=> 'saques', 'action'=>'add/'.$this->data['Saque']['saldo']));
                    }
                } else {
                    $this->addMessageError(__('Erro. Saldo insuficiente para saque', true));
                    $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
                    //$this->redirect(array('controller'=> 'saques', 'action'=>'add/'.$this->data['Saque']['saldo']));
                }
            }

        }
        if ($total_geral >= 100) {

            $id = $this->Session->read('Auth.Usuario.id');


            $this->loadModel('Usuario');
//        $usuarios = $this->Usuario->query("SELECT * FROM `usuarios` WHERE usuario_id =".$id);
            $usuarios = $this->Usuario->find('all',
                                             array(
                                                 'conditions' => array(
                                                     'id <>' => 1,
                                                     'id <>' => $id),
                                                 'order' => 'NomeUsuario ASC',
                                             )
            );

            $this->set('usuarios', $usuarios);
            $this->set('total_geral', $total_geral);
            $this->set('transferencia', $transferencia);

            //$this->set('acao', 'add');
        } else {
            $id = $this->Session->read('Auth.Usuario.id');
            $this->addMessageError(__('Erro. O saldo mínimo necessário para essa operação é de R$ 100,00', true));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id));
        }

    }

    public function transferencia($usuario, $destinatario, $valor)
    {

        $valorTiraPonto = str_replace('.', '', $valor);
        $valorAmericano = str_replace(',', '.', $valorTiraPonto);


        $data = array(
            'valor_transferido' => $valorAmericano,
            'destinatario_id' => $destinatario,
            'usuario_id' => $usuario,
            'status' => 2
        );

        $this->loadModel('Transferencia');
        $this->Transferencia->create();
        $this->Transferencia->save($data);

    }

    function edit($id = null)
    {

        if (!$id && empty($this->data)) {
            $this->addMessageError(__('id inválido', true));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
        }

        //$this->Saque->saveField('status', 2);

        if (!empty($this->data)) {
            if ($this->Saque->save($this->data)) {

                $id       = $this->data['Saque']['id'];
                $modified = date('Y-m-d H:i:s');
                $this->Saque->alteraNoticia($id, $modified);
                $this->addMessageSucess(__('Pagamento Confirmado.', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
            } else {
                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
            }

        }

        if (empty($this->data)) {
            $this->data = $this->Saque->read(null, $id);
        }

        //$this->set('acao', 'edit');
        //$this->render('add');
    }

    function delete($id = null)
    {
        if (!$id) {
            $this->addMessageError(__('Id inválido para o Saque', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Saque->del($id)) {
            $this->addMessageSucess(__('Saque excluido com sucesso.', true));
            $this->redirect(array('action' => 'index'));
        }

    }
}