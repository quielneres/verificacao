<?php

class NoticiasController extends AppController
{

    var $name           = 'Noticias';
    var $actionsFilters = array('index');

    function index()
    {

        $id = $this->Session->read('Auth.Usuario.id');

        if ($id != 1) {
            $condicao       = 'usuario_id = ' . $id;
            $this->paginate = array('fields' => array(
                'id',
                'usuario_id',
                'saque_id',
                'descricao',
                'status',
                'created',
                'modified'
            ), 'order' => 'modified desc', 'conditions' => array($condicao));
            $noticias       = $this->paginate(null);
            $this->set(compact('noticias'));
        } else {
            $condicao       = '';
            $this->paginate = array('fields' => array(
                'id',
                'usuario_id',
                'saque_id',
                'descricao',
                'status',
                'created',
                'modified'
            ), 'order' => 'created desc', 'conditions' => array($condicao));
            $noticias       = $this->paginate(null);
            $this->set(compact('noticias'));
        }

    }

    function add()
    {
        if (!empty($this->data)) {
            $this->Noticia->create();
            if ($this->Noticia->save($this->data)) {
                $this->addMessageSucess(__('Noticia salvo com sucesso.', true));
                $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
            } else {
                $this->addMessageError(__('Ocorreu um erro ao salvar o Noticia. Tente novamente.', true));
            }
        }

        $this->set('acao', 'add');
    }

    function investimentos($id = null)
    {
        $this->loadModel('Investimento');
        if($id){
            $investimento = $this->Investimento->findById($id);
            if($investimento['Investimento']['ativo'] == 0){
                $data = [
                    'id' => $id,
                    'ativo' => true
                ];

            }else{
                $data = [
                    'id' => $id,
                    'ativo' => false
                ];
            }
            if($this->Investimento->save($data)){
                $this->addMessageSucess(__('Operaçao realizada com sucesso.', true));
                $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
            }else{
                $this->addMessageSucess(__('Erro na operaçao.', true));
                $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
            }


        }
        $investimentos = $this->Investimento->find('all');
        $this->set(compact('investimentos'));

    }

    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->addMessageError(__('Noticia inválido', true));
            $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Noticia->save($this->data)) {
                $this->addMessageSucess(__('Noticia alterado com sucesso.', true));
                $this->redirect(array('controller' => 'noticias', 'action' => 'index'));
            } else {
                $this->addMessageError(__('Ocorreu um erro ao alterar o Noticia. Tente novamente.', true));
            }

        }

        if (empty($this->data)) {
            $this->data = $this->Noticia->read(null, $id);
        }
        $this->set('acao', 'edit');
        $this->render('add');
    }

    function delete($id = null)
    {
        if (!$id) {
            $this->addMessageError(__('Id inválido para o Noticia', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Noticia->del($id)) {
            $this->addMessageSucess(__('Noticia excluido com sucesso.', true));
            $this->redirect(array('action' => 'index'));
        }

    }
}

?>