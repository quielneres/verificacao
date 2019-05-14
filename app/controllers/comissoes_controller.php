<?php

class ComissoesController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $name    = 'Comissoes';


    function index($id = null)
    {
        if ($id) {
            $this->loadModel('Usuario');
            $usuarios = $this->Usuario->find('all', array('conditions' => array(
                'Ativo' => 1,
                'plano >=' => 4
            )));

            foreach ($usuarios as $usuario) {

                $dataCadastro        = date('Y-m-d', strtotime($usuario['Usuario']['created']));
                $dataCadastroExplode = explode("-", $dataCadastro);
                $dia_data_cadastro   = $dataCadastroExplode[2];
                $mes_data_cadastro   = $dataCadastroExplode[1];
                $ano_data_cadastro   = $dataCadastroExplode[0];

                $dias_vencimento = 365;
                $data_vencimento = date("Y-m-d h:i:s", mktime(0, 0, 0, $mes_data_cadastro, $dia_data_cadastro + $dias_vencimento, $ano_data_cadastro));

                $data_atual = date('Y-m-d H:i:s');
                $data_final = $data_vencimento;
                $diferenca  = strtotime($data_final) - strtotime($data_atual);


                $dias     = intval($diferenca / 86400);
                $marcador = $diferenca % 86400;
                $hora     = intval($marcador / 3600);
                $marcador = $marcador % 3600;
                $minuto   = intval($marcador / 60);
                $segundos = $marcador % 60;

                $dataAtual = date('Y-m-d');


                $dataAtualExplode = explode("-", $dataAtual);
                $dia_data_atual   = $dataAtualExplode[2];
                $mes_data_atual   = $dataAtualExplode[1];
                $ano_data_ataual  = $dataAtualExplode[0];

                if ($dias > 0 && $dias < 340) {

                    if ($dia_data_atual === $dia_data_cadastro) {

                        $plano = $usuario['Usuario']['plano'];


                        switch ($plano) {
                            case 4:
                                $comissao = 100;

                                break;
                            case 5:
                                $comissao = 200;

                                break;
                            case 6:
                                $comissao = 600;
                                break;
                            case 7:
                                $comissao = 1000;
                                break;
                            case 8:
                                $comissao = 2000;
                                break;
                            default:
                                $comissao = 0;
                                break;
                        }


                        $data = array(
                            'destinatario_id' => $usuario['Usuario']['id'],
                            'valor_comissao' => $comissao,
                            'nome_beneficiario' => $usuario['Usuario']['NomeUsuario'],
                            'categoria' => 1,
                        );

                        $this->Comissao->create();
                        $this->Comissao->save($data);
                    }

                }
            }
            $this->addMessageSucess(__('Operaçao realizada com sucesso.', true));
            $this->redirect(array('controller' => 'comissoes', 'action' => 'index'));
        }

        $comissoes = $this->Comissao->find('all', array(
            'order' => 'id DESC'
        ));

        $this->set(compact('comissoes'));

    }

    public function pagaComissao()
    {
        $this->loadModel('Usuario');
        $usuarios = $this->Usuario->find('all', array('conditions' => array(
            'Ativo' => 1,
            'plano >=' => 4
        )));

        foreach ($usuarios as $usuario) {

            $dataCadastro        = date('Y-m-d', strtotime($usuario['Usuario']['created']));
            $dataCadastroExplode = explode("-", $dataCadastro);
            $dia_data_cadastro   = $dataCadastroExplode[2];
            $mes_data_cadastro   = $dataCadastroExplode[1];
            $ano_data_cadastro   = $dataCadastroExplode[0];

            $dias_vencimento = 365;
            $data_vencimento = date("Y-m-d h:i:s", mktime(0, 0, 0, $mes_data_cadastro, $dia_data_cadastro + $dias_vencimento, $ano_data_cadastro));

            $data_atual = date('Y-m-d H:i:s');
            $data_final = $data_vencimento;
            $diferenca  = strtotime($data_final) - strtotime($data_atual);


            $dias     = intval($diferenca / 86400);
            $marcador = $diferenca % 86400;
            $hora     = intval($marcador / 3600);
            $marcador = $marcador % 3600;
            $minuto   = intval($marcador / 60);
            $segundos = $marcador % 60;

            $dataAtual = date('Y-m-d');


            $dataAtualExplode = explode("-", $dataAtual);
            $dia_data_atual   = $dataAtualExplode[2];
            $mes_data_atual   = $dataAtualExplode[1];
            $ano_data_ataual  = $dataAtualExplode[0];

            if ($dias > 0 && $dias < 336) {

                if ($dia_data_atual == $dia_data_cadastro) {

                    $plano = $usuario['Usuario']['plano'];


                    switch ($plano) {
                        case 4:
                            $comissao = 100;

                            break;
                        case 5:
                            $comissao = 200;

                            break;
                        case 6:
                            $comissao = 600;
                            break;
                        case 7:
                            $comissao = 1000;
                            break;
                        case 8:
                            $comissao = 2000;
                            break;
                        default:
                            $comissao = 0;
                            break;
                    }


                    $data = array(
                        'destinatario_id' => $usuario['Usuario']['id'],
                        'valor_comissao' => $comissao,
                        'nome_beneficiario' => $usuario['Usuario']['NomeUsuario'],
                    );

                    $this->Comissao->create();
                    $this->Comissao->save($data);
                }


            }
        }
        $this->addMessageSucess(__('Saque excluido com sucesso.', true));
        $this->redirect(array('controller' => 'comissoes', 'action' => 'index'));
    }

    public function pagarComissaoInvestiemnto()
    {
        $this->loadModel('Investimento');
        $investimentos = $this->Investimento->find('all', array(
            'conditions' => array(
                'ativo' => 1
            ),
        ));

        foreach ($investimentos as $investimento) {

            $dataCadastro        = date('Y-m-d', strtotime($investimento['Investimento']['created']));
            $dataCadastroExplode = explode("-", $dataCadastro);
            $dia_data_cadastro   = $dataCadastroExplode[2];
            $mes_data_cadastro   = $dataCadastroExplode[1];
            $ano_data_cadastro   = $dataCadastroExplode[0];

            $dias_vencimento = 365;
            $data_vencimento = date("Y-m-d h:i:s", mktime(0, 0, 0, $mes_data_cadastro, $dia_data_cadastro + $dias_vencimento, $ano_data_cadastro));

            $data_atual = date('Y-m-d H:i:s');
            $data_final = $data_vencimento;
            $diferenca  = strtotime($data_final) - strtotime($data_atual);


            $dias     = intval($diferenca / 86400);
            $marcador = $diferenca % 86400;
            $hora     = intval($marcador / 3600);
            $marcador = $marcador % 3600;
            $minuto   = intval($marcador / 60);
            $segundos = $marcador % 60;

            $dataAtual = date('Y-m-d');


            $dataAtualExplode = explode("-", $dataAtual);
            $dia_data_atual   = $dataAtualExplode[2];
            $mes_data_atual   = $dataAtualExplode[1];
            $ano_data_ataual  = $dataAtualExplode[0];

            if ($dias > 0 && $dias < 336) {

                if ($dia_data_atual == $dia_data_cadastro) {

                }
            }

        }
    }


    public function tarifa($id = null)
    {
        if($id){
            $this->loadModel('Usuario');
            $usuarios = $this->Usuario->find('all', array('conditions' => array(
                'Ativo' => 1,
            )));

            $dataAtual = date('Y-m-d');


            $dataAtualExplode = explode("-", $dataAtual);
            $dia_data_atual   = $dataAtualExplode[2];
            $mes_data_atual   = $dataAtualExplode[1];
            $ano_data_ataual  = $dataAtualExplode[0];

            if($dia_data_atual == 9){
                foreach ($usuarios as $usuario){

                    $this->loadModel('Tarifa');

                    $tarifa = $this->Tarifa->find(array('id_usuario' =>$usuario['Usuario']['id']));

                    $dataCadastroTarifa = date('Y-m-d', strtotime($tarifa['Tarifa']['created']));

                    if($dataAtual != $dataCadastroTarifa){
                        $data = array(
                            'id_usuario' => $usuario['Usuario']['id'],
                            'nome_usuario' => $usuario['Usuario']['NomeUsuario'],
                            'valor_tarifa' => 27,
                        );
                        $this->Tarifa->create();
                        $this->Tarifa->save($data);
                    }
                }

                $this->addMessageSucess(__('tarifa applicada com sucesso!', true));
                $this->redirect(array('controller' => 'comissoes', 'action' => 'tarifa'));
            }
            $this->addMessageError(__('A cobrança de tarifa sera cobrada apena no dia 05 de cada mes!', true));
            $this->redirect(array('controller' => 'comissoes', 'action' => 'tarifa'));

        }

    }


    }