<?php

//App::import('Core', array('HttpSocket','Xml'));
class UsuariosController extends AppController
{

    var $name = 'Usuarios';
    //var $layout = 'ajax';
    //var $components = array('Attachment' => array('only_image' => true, 'images_size' => array('usuario' => array(51, 64, false))));

    //var $components = array('Email');
    var $uses = array('Usuario');
    //var $uses = array('Noticia');


    /*
function beforeFilter() {
    parent::beforeFilter();
    if (array_key_exists('data', $this->Auth->params)) {
        $mensagem = $this->Usuario->findByUsername($this->Auth->params['data']['Usuario']['username']);
            if(!empty($mensagem) && ($mensagem['Usuario']['Ativo'] == 2))
                //$this->Auth->loginError = 'Doador inativo, entre em contato com o administrador do sistema.';
                                    $this->addMessageAlert(__('Doador inativo, entre em contato com o administrador do sistema.', true));
    }
}
    */

    function email()
    {

        if (!empty($this->data)) {
            //$this->Cliente->create();

            //$nome_destinatario = $this->data['Cliente']['nome'];

            $email = $this->data['Usuario']['email'];

            $nome_remetente  = 'Toop Life';
            $email_remetente = 'tooplifeconvenios@gmail.com';

            $recupera = $this->Usuario->RecuperaSenhaLogin($email);

            if (count($recupera) > 0) {

                $senha       = $recupera[0]['usuarios']['senha'];
                $login       = $recupera[0]['usuarios']['username'];
                $NomeUsuario = $recupera[0]['usuarios']['NomeUsuario'];

                $assunto = "Recuperação de Login e Senha para o Sistema Toop Life";

                $mensagem = " <img src='http://tooplife.com.br/sistema/app/webroot/img/tooplife.jpg'> <br><br> Caro(a) " . $NomeUsuario . "<br><br>Você solicitou a recuperação de sua Senha e Login de acesso ao sistema Toop Life. <br>Segue abaixo informações da solicitação: <br><br>Login: " . $login . " <br>Senha: " . $senha . " <br><br> Suporte e dúvidas: <br>E-mail: " . $email_remetente . " <br> ";

                //print_r($recupera);
                //exit;

                $cabecalho = "MIME-Version: 1.0\n";
                $cabecalho .= "Content-Type: text/html; charset=UTF-8\n";
                $cabecalho .= "From: \"{$nome_remetente}\" <{$email_remetente}>\n";

                // Dispara e-mail e retorna status para variável

                $status_envio = @mail($email, $assunto, $mensagem, $cabecalho);

                // Se mensagem foi enviada pelo servidor…

                if ($status_envio) {
                    //echo "Mensagem enviada!";
                    $this->addMessageSucess(__('Um E-mail com Login e Senha foi enviado para o E-mail informado.', true));
                    //$this->redirect(array('controller' => 'usuarios', 'action'=>'login'));
                } // Se mensagem não foi enviada pelo servidor…
                else {
                    //echo "Mensagem não enviada!";
                    $this->addMessageError(__('Ocorreu um erro, o e-mail não foi enviado. verifique se digitou o e-mail corretamente.', true));
                }

            } else {
                $this->addMessageError(__('Não existe conta no sistema para o E-mail informado. verifique se digitou corretamente.', true));
            }

        }

        /*
        if (empty($this->data)) {
        $this->data = $this->Usuario->read(null, $id);
        }
        */

        //$this->set('acao', 'add');
    }

    function saque($id = null)
    {


        echo 'Pagina em manutencao <BR>';

        /*
        if (!$id && empty($this->data)) {
    $this->addMessageError(__('Conta inválida', true));
    $this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
}
        if (!empty($this->data)) {
            if(!empty($this->data['Usuario']['senha']))
    $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);
                if ($this->Usuario->save($this->data)) {
        $this->addMessageSucess(__('Conta alterada com sucesso.', true));
        $this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
    } else {
        $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
    }

             }

if (empty($this->data)) {
    $this->data = $this->Usuario->read(null, $id);
}
        */


    }

    function financeiro2($id = null, $verifica_saldo = null)
    {

        if (!($this->RequestHandler->isAjax())) {
            Configure::write('debug', 0);
            $this->layout = 'default';
        }

        if (!$id) {
            $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
            $this->redirect(array('action' => 'principal'));
        }

        $id_usuario    = $id;
        $plano_usuario = $this->Usuario->plano($id_usuario);
        $plano_user    = $plano_usuario[0]['usuarios']['plano'];

        function plano30($plano)
        {
            if ($plano == 1) {
                $n30 = 22.5;
            }
            if ($plano == 2) {
                $n30 = 15;
            }
            if ($plano == 3) {
                $n30 = 45;
            }
            if ($plano == 4) {
                $n30 = 75;
            }
            if ($plano == 5) {
                $n30 = 150;
            }
            if ($plano == 6) {
                $n30 = 450;
            }
            if ($plano == 7) {
                $n30 = 375;
            }
            if ($plano == 8) {
                $n30 = 750;
            }
            return $n30;
        }

        function plano3($plano)
        {
            if ($plano == 1) {
                $n3 = 1.5;
            }
            if ($plano == 2) {
                $n3 = 3;
            }
            if ($plano == 3) {
                $n3 = 9;
            }
            if ($plano == 4) {
                $n3 = 15;
            }
            if ($plano == 5) {
                $n3 = 30;
            }
            if ($plano == 6) {
                $n3 = 90;
            }
            if ($plano == 7) {
                $n3 = 150;
            }
            if ($plano == 8) {
                $n3 = 300;
            }
            return $n3;
        }

        $n1   = $this->Usuario->N1($id_usuario);
        $qtd1 = count($n1);
        for ($i1 = 0; $i1 < $qtd1; $i1++) {
            $id_usuarios_n1 = $n1[$i1]['usuarios']['id'];
            $n1id           = $id_usuarios_n1 . ',' . $n1id;

            $plano    = $n1[$i1]['usuarios']['plano'];
            $n1_plano = $plano . ',' . $n1_plano;


            $n30  = plano30($plano);
            $n3   = plano3($plano);
            $n130 = $n30 + $n130;
            $n13  = $n3 + $n13;
            $n130 = number_format($n130, 2, ',', '');
            $n13  = number_format($n13, 2, ',', '');


            if ($plano_user > 1) {
                $n2   = $this->Usuario->N2($id_usuarios_n1);
                $qtd2 = count($n2);
                for ($i2 = 0; $i2 < $qtd2; $i2++) {
                    $id_usuarios_n2 = $n2[$i2]['usuarios']['id'];
                    $n2id           = $id_usuarios_n2 . ',' . $n2id;

                    $plano    = $n2[$i2]['usuarios']['plano'];
                    $n2_plano = $plano . ',' . $n2_plano;


                    $n30  = plano30($plano);
                    $n3   = plano3($plano);
                    $n230 = $n30 + $n230;
                    $n23  = $n3 + $n23;
                    $n230 = number_format($n230, 2, ',', '');
                    $n23  = number_format($n23, 2, ',', '');


                    if ($plano_user > 2) {
                        $n3   = $this->Usuario->N3($id_usuarios_n2);
                        $qtd3 = count($n3);
                        for ($i3 = 0; $i3 < $qtd3; $i3++) {
                            $id_usuarios_n3 = $n3[$i3]['usuarios']['id'];
                            $n3id           = $id_usuarios_n3 . ',' . $n3id;

                            $plano    = $n3[$i3]['usuarios']['plano'];
                            $n3_plano = $plano . ',' . $n3_plano;


                            $n30  = plano30($plano);
                            $n3   = plano3($plano);
                            $n330 = $n30 + $n330;
                            $n33  = $n3 + $n33;
                            $n330 = number_format($n330, 2, ',', '');
                            $n33  = number_format($n33, 2, ',', '');


                            if ($plano_user > 3) {
                                $n4   = $this->Usuario->N4($id_usuarios_n3);
                                $qtd4 = count($n4);
                                for ($i4 = 0; $i4 < $qtd4; $i4++) {
                                    $id_usuarios_n4 = $n4[$i4]['usuarios']['id'];
                                    $n4id           = $id_usuarios_n4 . ',' . $n4id;

                                    $plano    = $n4[$i4]['usuarios']['plano'];
                                    $n4_plano = $plano . ',' . $n4_plano;


                                    $n30  = plano30($plano);
                                    $n3   = plano3($plano);
                                    $n430 = $n30 + $n430;
                                    $n43  = $n3 + $n43;
                                    $n430 = number_format($n430, 2, ',', '');
                                    $n43  = number_format($n43, 2, ',', '');


                                    if ($plano_user > 4) {
                                        $n5   = $this->Usuario->N5($id_usuarios_n4);
                                        $qtd5 = count($n5);
                                        for ($i5 = 0; $i5 < $qtd5; $i5++) {
                                            $id_usuarios_n5 = $n5[$i5]['usuarios']['id'];
                                            $n5id           = $id_usuarios_n5 . ',' . $n5id;

                                            $plano    = $n5[$i5]['usuarios']['plano'];
                                            $n5_plano = $plano . ',' . $n5_plano;


                                            $n30  = plano30($plano);
                                            $n3   = plano3($plano);
                                            $n530 = $n30 + $n530;
                                            $n53  = $n3 + $n53;
                                            $n530 = number_format($n530, 2, ',', '');
                                            $n53  = number_format($n53, 2, ',', '');


                                            if ($plano_user > 5) {
                                                $n6   = $this->Usuario->N6($id_usuarios_n5);
                                                $qtd6 = count($n6);
                                                for ($i6 = 0; $i6 < $qtd6; $i6++) {
                                                    $id_usuarios_n6 = $n6[$i6]['usuarios']['id'];
                                                    $n6id           = $id_usuarios_n6 . ',' . $n6id;

                                                    $plano    = $n6[$i6]['usuarios']['plano'];
                                                    $n6_plano = $plano . ',' . $n6_plano;


                                                    $n30  = plano30($plano);
                                                    $n3   = plano3($plano);
                                                    $n630 = $n30 + $n630;
                                                    $n63  = $n3 + $n63;
                                                    $n630 = number_format($n630, 2, ',', '');
                                                    $n63  = number_format($n63, 2, ',', '');


                                                    if ($plano_user > 6) {
                                                        $n7   = $this->Usuario->N7($id_usuarios_n6);
                                                        $qtd7 = count($n7);
                                                        for ($i7 = 0; $i7 < $qtd7; $i7++) {
                                                            $id_usuarios_n7 = $n7[$i7]['usuarios']['id'];
                                                            $n7id           = $id_usuarios_n7 . ',' . $n7id;

                                                            $plano    = $n7[$i7]['usuarios']['plano'];
                                                            $n7_plano = $plano . ',' . $n7_plano;


                                                            $n30  = plano30($plano);
                                                            $n3   = plano3($plano);
                                                            $n730 = $n30 + $n730;
                                                            $n73  = $n3 + $n73;
                                                            $n730 = number_format($n730, 2, ',', '');
                                                            $n73  = number_format($n73, 2, ',', '');


                                                            if ($plano_user > 7) {
                                                                $n8   = $this->Usuario->N8($id_usuarios_n7);
                                                                $qtd8 = count($n8);
                                                                for ($i8 = 0; $i8 < $qtd8; $i8++) {
                                                                    $id_usuarios_n8 = $n8[$i8]['usuarios']['id'];
                                                                    $n8id           = $id_usuarios_n8 . ',' . $n8id;

                                                                    $plano    = $n8[$i8]['usuarios']['plano'];
                                                                    $n8_plano = $plano . ',' . $n8_plano;


                                                                    $n30  = plano30($plano);
                                                                    $n3   = plano3($plano);
                                                                    $n830 = $n30 + $n830;
                                                                    $n83  = $n3 + $n83;
                                                                    $n830 = number_format($n830, 2, ',', '');
                                                                    $n83  = number_format($n83, 2, ',', '');


                                                                }

                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }


        $n1id = substr($n1id, 0, -1);
        $n2id = substr($n2id, 0, -1);
        $n3id = substr($n3id, 0, -1);
        $n4id = substr($n4id, 0, -1);
        $n5id = substr($n5id, 0, -1);
        $n6id = substr($n6id, 0, -1);
        $n7id = substr($n7id, 0, -1);
        $n8id = substr($n8id, 0, -1);

        $qtd1 = substr_count($n1_plano, ',');
        $qtd2 = substr_count($n2_plano, ',');
        $qtd3 = substr_count($n3_plano, ',');
        $qtd4 = substr_count($n4_plano, ',');
        $qtd5 = substr_count($n5_plano, ',');
        $qtd6 = substr_count($n6_plano, ',');
        $qtd7 = substr_count($n7_plano, ',');
        $qtd8 = substr_count($n8_plano, ',');

        if ($qtd1 != 1 && $qtd1 % 2 != 0) {
            $qtdN1 = $qtd1 - 1;
        } else {
            $qtdN1 = $qtd1;
        }
        if ($qtd2 != 1 && $qtd2 % 2 != 0) {
            $qtdN2 = $qtd2 - 1;
        } else {
            $qtdN2 = $qtd2;
        }
        if ($qtd3 != 1 && $qtd3 % 2 != 0) {
            $qtdN3 = $qtd3 - 1;
        } else {
            $qtdN3 = $qtd3;
        }
        if ($qtd4 != 1 && $qtd4 % 2 != 0) {
            $qtdN4 = $qtd4 - 1;
        } else {
            $qtdN4 = $qtd4;
        }
        if ($qtd5 != 1 && $qtd5 % 2 != 0) {
            $qtdN5 = $qtd5 - 1;
        } else {
            $qtdN5 = $qtd5;
        }
        if ($qtd6 != 1 && $qtd6 % 2 != 0) {
            $qtdN6 = $qtd6 - 1;
        } else {
            $qtdN6 = $qtd6;
        }
        if ($qtd7 != 1 && $qtd7 % 2 != 0) {
            $qtdN7 = $qtd7 - 1;
        } else {
            $qtdN7 = $qtd7;
        }
        if ($qtd8 != 1 && $qtd8 % 2 != 0) {
            $qtdN8 = $qtd8 - 1;
        } else {
            $qtdN8 = $qtd8;
        }

        $qtdN1 = ($qtdN1 / 2);
        $qtdN2 = ($qtdN2 / 2);
        $qtdN3 = ($qtdN3 / 2);
        $qtdN4 = ($qtdN4 / 2);
        $qtdN5 = ($qtdN5 / 2);
        $qtdN6 = ($qtdN6 / 2);
        $qtdN7 = ($qtdN7 / 2);
        $qtdN8 = ($qtdN8 / 2);

        $binarioN1 = $qtdN1 * 2;
        $binarioN2 = $qtdN2 * 2;
        $binarioN3 = $qtdN3 * 2;
        $binarioN4 = $qtdN4 * 2;
        $binarioN5 = $qtdN5 * 2;
        $binarioN6 = $qtdN6 * 2;
        $binarioN7 = $qtdN7 * 2;
        $binarioN8 = $qtdN8 * 2;

        //$binario = $binarioN1 + $binarioN2 + $binarioN3 + $binarioN4 + $binarioN5 + $binarioN6 + $binarioN7 + $binarioN8;

        /*
        $this->Session->write('binario', $binario);

        $this->Session->write('n1id', $n1id);
        $this->Session->write('n2id', $n2id);
        $this->Session->write('n3id', $n3id);
        $this->Session->write('n4id', $n4id);
        $this->Session->write('n5id', $n5id);
        $this->Session->write('n6id', $n6id);
        $this->Session->write('n7id', $n7id);
        $this->Session->write('n8id', $n8id);

        $this->Session->write('n130', $n130);
        $this->Session->write('n230', $n230);
        $this->Session->write('n330', $n330);
        $this->Session->write('n430', $n430);
        $this->Session->write('n530', $n530);
        $this->Session->write('n630', $n630);
        $this->Session->write('n730', $n730);
        $this->Session->write('n830', $n830);

        $this->Session->write('n13', $n13);
        $this->Session->write('n23', $n23);
        $this->Session->write('n33', $n33);
        $this->Session->write('n43', $n43);
        $this->Session->write('n53', $n53);
        $this->Session->write('n63', $n63);
        $this->Session->write('n73', $n73);
        $this->Session->write('n83', $n83);
        */


        /*
        echo 'p 1: '.$n130;
        echo '<br><br>';
        echo 'p 2: '.$n230;
        echo '<br><br>';
        echo 'p 3: '.$n330;
        echo '<br><br>';
        echo 'p 4: '.$n430;
        echo '<br><br>';
        echo 'p 5: '.$n530;
        echo '<br><br>';
        echo 'p 6: '.$n630;
        echo '<br><br>';
        echo 'p 7: '.$n730;
        echo '<br><br>';
        echo 'p 8: '.$n830;
        echo '<br><br>';
        echo '<br><br>';
        echo '<br><br>';
        */


        /*
        echo 'p 1: '.$qtd1;
        echo '<br><br>';
        echo 'p 2: '.$qtd2;
        echo '<br><br>';
        echo 'p 3: '.$qtd3;
        echo '<br><br>';
        echo 'p 4: '.$qtd4;
        echo '<br><br>';
        echo 'p 5: '.$qtd5;
        echo '<br><br>';
        echo 'p 6: '.$qtd6;
        echo '<br><br>';
        echo 'p 7: '.$qtd7;
        echo '<br><br>';
        echo 'p 8: '.$qtd8;
        echo '<br><br>';
        echo '<br><br>';
        */

        //echo $n1id;
        //exit;
        //$this->set(compact('binario'));
        //$this->set(compact('n1id','n2id','n3id','n4id','n5id','n6id','n7id','n8id'));


        $total_comissao = $this->Usuario->somaComissao($id_usuario);
        $comissao       = $total_comissao[0][0]['SUM(valor_comissao)'];

        $total_recebido = $this->Usuario->somaRecebido($id_usuario);
        $totalRecebido  = $total_recebido[0][0]['SUM(valor_transferido)'];

        $total_transferido = $this->Usuario->somaTransferencias($id_usuario);
        $totalTransaferido = $total_transferido[0][0]['SUM(valor_transferido)'];

        $total_retirada = $this->Usuario->somaSaques($id_usuario);
        $totalRetirada  = $total_retirada[0][0]['SUM(valor)'];

        $total_taxa_mudanca = $this->Usuario->somaTaxaMudanca($id_usuario);
        $totalTaxaMudanca   = $total_taxa_mudanca[0][0]['SUM(valor_taxa)'];

        $total_taxa_manutencao = $this->Usuario->somaTaxaManuntencao($id_usuario);
        $totalTaxaManutencao  = $total_taxa_manutencao[0][0]['SUM(valor_tarifa)'];

        if ($verifica_saldo) {
            $totalValorDoador  = $n130 + $n23 + $n33 + $n43 + $n53 + $n63 + $n73 + $n83;
            $totalValorBinario = $binarioN1 + $binarioN2 + $binarioN3 + $binarioN4 + $binarioN5 + $binarioN6 + $binarioN7 + $binarioN8;

            $total_geral = $totalValorDoador + $totalValorBinario + $comissao + $totalRecebido - $totalRetirada - $totalTransaferido - $totalTaxaMudanca;

            return $total_geral;
        }

        $this->loadModel('Investimento');
        $investimentos = $this->Investimento->find('all', array(
            'conditions' => array(
                'id_usuario' => $id_usuario
            )));

        $total_ivestimentos = $this->Investimento->somaValorInvestimento($id_usuario);
        $totalInvestimentos = $total_ivestimentos[0][0]['SUM(valor_investimento)'];

        $comissao_investimento =  ( 20 / 100 ) * $totalInvestimentos;


        $this->set('comissao_investimento', $comissao_investimento);
        $this->set('taxaManutencao', $totalTaxaManutencao);
        $this->set(compact('investimentos'));
        $this->set(compact('totalTaxaMudanca'));
        $this->set(compact('comissao'));
        $this->set(compact('totalRetirada'));
        $this->set(compact('totalTransaferido'));
        $this->set(compact('totalRecebido'));
        $this->set(compact('n130', 'n230', 'n330', 'n430', 'n530', 'n630', 'n730', 'n830'));
        $this->set(compact('n13', 'n23', 'n33', 'n43', 'n53', 'n63', 'n73', 'n83'));
        $this->set(compact('qtd1', 'qtd2', 'qtd3', 'qtd4', 'qtd5', 'qtd6', 'qtd7', 'qtd8'));
        $this->set(compact('binarioN1', 'binarioN2', 'binarioN3', 'binarioN4', 'binarioN5', 'binarioN6', 'binarioN7', 'binarioN8'));
        $this->set(compact('qtdN1', 'qtdN2', 'qtdN3', 'qtdN4', 'qtdN5', 'qtdN6', 'qtdN7', 'qtdN8'));

    }

    function financeiro()
    {

        function plano($plano)
        {
            if ($plano == 1) {
                $valor = 150;
            }
            if ($plano == 2) {
                $valor = 250;
            }
            if ($plano == 3) {
                $valor = 300;
            }
            if ($plano == 4) {
                $valor = 500;
            }
            if ($plano == 5) {
                $valor = 1000;
            }
            if ($plano == 6) {
                $valor = 3000;
            }
            if ($plano == 7) {
                $valor = 5000;
            }
            if ($plano == 8) {
                $valor = 10000;
            }
            return $valor;
        }

        $totalContas = $this->Usuario->totalContas();
        $qtdContas   = count($totalContas);

        $totalContas2 = $this->Usuario->totalContas2();
        $qtdContas2   = count($totalContas2);

        for ($i = 0; $i < $qtdContas; $i++) {
            $plano      = $totalContas[$i]['usuarios']['plano'];
            $valorPlano = plano($plano);
            $valorTotal = $valorPlano + $valorTotal;
        }

        for ($i = 0; $i < $qtdContas2; $i++) {
            $plano       = $totalContas2[$i]['usuarios']['plano'];
            $valorPlano2 = plano($plano);
            $valorTotal2 = $valorPlano2 + $valorTotal2;
        }

        if (!empty($data1)) {
            $data = 'AND modified LIKE \'%' . $data1 . '%\'';
        } elseif (!empty($data2)) {
            $data = 'AND modified LIKE \'%' . $data2 . '%\'';
        } elseif (!empty($data1) && !empty($data2)) {
            $data = " AND STR_TO_DATE(modified,'%y-%m-%d%') BETWEEN '" . $data1 . "' and '" . $data2 . "' ";
        } else {
            $data = '';
        }

        $plano1    = $this->Usuario->plano1($data);
        $qtdPlano1 = count($plano1);

        $plano2    = $this->Usuario->plano2($data);
        $qtdPlano2 = count($plano2);

        $plano3    = $this->Usuario->plano3($data);
        $qtdPlano3 = count($plano3);

        $plano4    = $this->Usuario->plano4($data);
        $qtdPlano4 = count($plano4);

        $plano5    = $this->Usuario->plano5($data);
        $qtdPlano5 = count($plano5);

        $plano6    = $this->Usuario->plano6($data);
        $qtdPlano6 = count($plano6);

        $plano7    = $this->Usuario->plano7($data);
        $qtdPlano7 = count($plano7);

        $plano8    = $this->Usuario->plano8($data);
        $qtdPlano8 = count($plano8);


        $ativos    = $this->Usuario->ativos($data);
        $qtdativos = count($ativos);

        $inativos    = $this->Usuario->inativos($data);
        $qtdinativos = count($inativos);


        /*
        echo $valorTotal;

        echo '<br><br>';

        echo $qtdPlano1;
        echo '<br>';
        echo $qtdPlano2;
        echo '<br>';
        echo $qtdPlano3;
        echo '<br>';
        echo $qtdPlano4;
        echo '<br>';
        echo $qtdPlano5;
        echo '<br>';
        echo $qtdPlano6;
        echo '<br>';
        echo $qtdPlano7;
        echo '<br>';
        echo $qtdPlano8;

        exit;
         *
         */

        $Total_Saques_Pagos = $this->Usuario->somaSaquesPagos();
        $totalSaquesPagos   = $Total_Saques_Pagos[0][0]['SUM(valor)'];

        $Total_Saques_Pendentes = $this->Usuario->somaSaquesPendentes();
        $totalSaquesPendentes   = $Total_Saques_Pendentes[0][0]['SUM(valor)'];

        $this->set(compact('totalSaquesPagos', 'totalSaquesPendentes', 'valorTotal', 'valorTotal2', 'qtdPlano1', 'qtdPlano2', 'qtdPlano3', 'qtdPlano4', 'qtdPlano5', 'qtdPlano6', 'qtdPlano7', 'qtdPlano8', 'qtdativos', 'qtdinativos'));

    }


   function login()
    {
        $this->layout = 'default';
        if ($this->Session->read('Auth.Usuario')) {
            $grupos = $this->Usuario->find(array('Usuario.id' => $this->Auth->user('id')));
            foreach ($grupos['Grupo'] as $grupo) {
                $permissoes = $this->Usuario->Grupo->find(array('Grupo.id' => $grupo['id']));
                foreach ($permissoes['Permissao'] as $permissao) {
                    $acoes[] = $permissao['combinacao'];
                }
            }

            $this->Session->write('acoes', $acoes);
            $this->redirect(array('controller' => 'Usuarios', 'action' => 'principal'));

//            $secret = '6LfAepgUAAAAAEldjna7rbmQuQwffEj2ZZoxiDs_';
//            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $this->params['form']['g-recaptcha-response']);
//            $responseData = json_decode($verifyResponse);
//
//            if ($responseData->success) {
//            } else {
//                $this->addMessageError(__('A verificação do robô falhou. Tente novamente.', true));
//            }
        }


    }

    function logout()
    {
        $this->Session->destroy();
        //$this->Session->setFlash(__('Você foi desconectado!', true));
        $this->addMessageAlert('Você foi desconectado!');
        $this->redirect($this->Auth->logout());
    }

    function principal()
    {

        if (!($this->RequestHandler->isAjax())) {
            Configure::write('debug', 0);
            $this->layout = 'default';
        }

        if ($this->Session->check('acoes')) {
            $acoes    = $this->Session->read('acoes');
            $array_js = array();
            foreach ($acoes as $acao)
                if ($acao != '*:*')
                    $array_js[] = strtolower(str_replace(':', '/', $acao));

            $string_array = implode('|', $array_js);
            $this->Session->write('string_array', $string_array);

            $ativo = $this->Session->read('Auth.Usuario.Ativo');
            if ($ativo == 2) {
                $tipoBanco = $this->Usuario->pegaTipoBanco();
                $banco     = $tipoBanco[0]['bancos']['banco'];
                $this->set(compact('banco'));
            } else {

                $usuario_id = $this->Session->read('Auth.Usuario.id');
                $pegaSaldo  = $this->Usuario->pegaSaldo($usuario_id);
                $pegaSaldo  = $pegaSaldo[0]['saques']['saldo'];
                //$SaldoTotal = number_format($pegaSaldo,2,',','.');

                //$this->Session->write('SaldoTotal', $SaldoTotal);

                //echo $SaldoTotal;
                //exit;

                //$this->redirect(array('controller' => 'Noticias', 'action' => 'index'));

            }

            if ($acao == '*:*') {
                $this->redirect(array('controller' => 'Noticias', 'action' => 'index'));
            } else {
                $this->redirect(array('controller' => 'Mensagens', 'action' => 'index2'));
            }
        }

        /*
        $adm = 'id <> 1';
        ( !empty($this->data['Usuario']['NomeUsuario']) ) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%'.$this->data['Usuario']['NomeUsuario'].'%\'' : $NomeUsuario = '';
        ( !empty($this->data['Usuario']['plano']) ) ? $plano = 'Usuario.plano LIKE \'%'.$this->data['Usuario']['plano'].'%\'' : $plano = '';
        ( !empty($this->data['Usuario']['Ativo']) ) ? $Ativo = 'Usuario.Ativo LIKE \'%'.$this->data['Usuario']['Ativo'].'%\'' : $Ativo = '';

        $this->paginate = array('order'=>'created DESC', 'conditions' => array($NomeUsuario,$plano,$Ativo,$adm));

//$this->Usuario->recursive = 0;
$this->set('usuarios', $this->paginate(null));


        ( !empty($this->data['Noticia']['descricao']) ) ? $descricao = 'Noticia.descricao LIKE \'%'.$this->data['Noticia']['descricao'].'%\'' : $descricao = '';
       //( !empty($this->data['Noticia']['cpf_cnpj']) ) ? $cpf_cnpj = 'Noticia.cpf_cnpj LIKE \'%'.$this->data['Noticia']['cpf_cnpj'].'%\'' : $cpf_cnpj = '';
        $this->paginate = array('fields' => array('id', 'descricao', 'created', 'created'), 'order'=>'created desc', 'conditions' => array($descricao));
$noticias = $this->paginate(null);
$this->set(compact('noticias'));
         */

    }


    function index()
    {

        $adm = 'id <> 1';
        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        (!empty($this->data['Usuario']['plano'])) ? $plano = 'Usuario.plano LIKE \'%' . $this->data['Usuario']['plano'] . '%\'' : $plano = '';
        (!empty($this->data['Usuario']['Ativo'])) ? $Ativo = 'Usuario.Ativo LIKE \'%' . $this->data['Usuario']['Ativo'] . '%\'' : $Ativo = '';
        //$Ativo = 'Usuario.Ativo = 1';


        $this->paginate = array('order' => 'created DESC', 'conditions' => array($NomeUsuario, $plano, $Ativo, $adm));

        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
    }

    function index1($id = null)
    {


        ini_set('display_errors', 1);

        error_reporting(E_ALL);

        $from = "tatendimento@tooplife.com.br";

        $to = "quielneres@gmail.com";

        $subject = "Verificando o correio do PHP";

        $message = "O correio do PHP funciona bem";

        $headers = "De:". $from;

        mail($to, $subject, $message, $headers);

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';

        //$id = $this->Session->read('Auth.Usuario.id');

        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index2($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index3($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index4($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index5($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index6($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index7($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function index8($id = null)
    {

        (!empty($this->data['Usuario']['NomeUsuario'])) ? $NomeUsuario = 'Usuario.NomeUsuario LIKE \'%' . $this->data['Usuario']['NomeUsuario'] . '%\'' : $NomeUsuario = '';
        //( !empty($this->data['Usuario']['datanascimento']) ) ? $datanascimento = 'Usuario.datanascimento LIKE \'%/'.$this->data['Usuario']['datanascimento'].'/%\'' : $datanascimento = '';
        $retorno        = $this->Usuario->nome($id);
        $nome           = $retorno[0]['usuarios']['NomeUsuario'];
        $this->paginate = array('limit' => 100, 'order' => 'Ativo ASC', 'conditions' => array($NomeUsuario, 'usuario_id =' . $id));
        //$this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate(null));
        $this->set(compact('nome'));
    }

    function view($id = null)
    {
        if ($id) {

            if (!$id) {
                //$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
                $this->redirect(array('action' => 'index'));
            }
            $this->set('usuario', $this->Usuario->read(null, $id));
        }
        if ($this->params['url']['nome']) {
            var_dump(23);
            die;
        }
//
    }


    /*
function add() {
    if (!empty($this->data)) {
        if(!empty($this->data['Grupo']['Grupo'])) {
            if ($modify = $this->Attachment->upload($this->data['Usuario']['Attachment']))
                $this->data['Usuario']['Foto'] = $modify;

            if(!empty($this->data['Usuario']['senha']))
                $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);

            $this->Usuario->create();
            if ($this->Usuario->saveAll($this->data, array('validate'=>'first'))) {
                //$this->Session->setFlash('O registro foi incluído com sucesso.', 'flash_good');
                                    $this->addMessageSucess(__('O registro foi incluído com sucesso.', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Attachment->delete_files($modify);
                //$this->Session->setFlash('O registro não pode ser incluído. Tente novamente.', 'flash_bad');
                                    $this->addMessageError(__('O registro não pode ser incluído. Tente novamente.', true));
            }
        } else {
            //$this->Session->setFlash('É necessário incluir o doador em pelo menos um grupo. Tente novamente.', 'flash_bad');
                            $this->addMessageError(__('É necessário incluir o doador em pelo menos um grupo. Tente novamente.', true));
        }
    }

    if(array_key_exists('NaoSelecionado', $this->data['Grupo']))
        $grupos = '';
    else $grupos = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC'));

    if(!empty($this->data['Grupo']['NaoSelecionado']))
        $grupos = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('Grupo.id' => $this->data['Grupo']['NaoSelecionado'])));

    if(!empty($this->data['Grupo']['Grupo']))
        $gruposelecionado = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('Grupo.id' => $this->data['Grupo']['Grupo'])));
    else $gruposelecionado = '';

    $this->set(compact('grupos','gruposelecionado'));
}

function edit($id = null) {
    if (!$id && empty($this->data)) {
        //$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
                    $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
        $this->redirect(array('action'=>'index'));
    }
    if (!empty($this->data)) {
        if(!empty($this->data['Grupo']['Grupo'])) {
            $apaga_arquivo = $this->Usuario->findById($id);
            if ($modify = $this->Attachment->upload($this->data['Usuario']['Attachment'])) {
                $this->Attachment->delete_files($apaga_arquivo['Usuario']['Foto']);
                $this->data['Usuario']['Foto'] = $modify;
            } else {
                unset($this->data['Usuario']['Attachment']);
            }

            if(!empty($this->data['Usuario']['senha']))
                $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);

            if ($this->Usuario->saveAll($this->data, array('validate'=>'first'))) {
                //$this->Session->setFlash('O registro foi atualizado com sucesso.', 'flash_good');
                                    $this->addMessageSucess(__('O registro foi atualizado com sucesso.', true));
                $this->redirect(array('action'=>'index'));
            } else {
                //$this->Session->setFlash('O registro não pode ser atualizado. Tente novamente.', 'flash_bad');
                                    $this->addMessageError(__('O registro não pode ser atualizado. Tente novamente.', true));
            }
        } else {
            //$this->Session->setFlash('É necessário incluir o doador em pelo menos um grupo. Tente novamente.', 'flash_bad');
                            $this->addMessageError(__('É necessário incluir o doador em pelo menos um grupo. Tente novamente.', true));
        }
    }
    if (empty($this->data)) {
        $this->data = $this->Usuario->read(null, $id);
    }

    if(array_key_exists('NaoSelecionado', $this->data['Grupo']))
        $grupos = '';
    else $grupos = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC'));

    if(!empty($this->data['Grupo']) && !(array_key_exists('Grupo', $this->data['Grupo'])) && !(array_key_exists('NaoSelecionado', $this->data['Grupo']))) {
        foreach($this->data['Grupo'] as $grupo)
            $ids_grupos[] = $grupo['id'];
        $gruposelecionado = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('Grupo.id' => $ids_grupos)));
        $grupos = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('NOT' => array('Grupo.id' => $ids_grupos))));
    } else {
        if(!empty($this->data['Grupo']['Grupo']))
        $gruposelecionado = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('Grupo.id' => $this->data['Grupo']['Grupo'])));
        else $gruposelecionado = '';

        if(!empty($this->data['Grupo']['NaoSelecionado']))
        $grupos = $this->Usuario->Grupo->find('list', array('order'=>'Descricao ASC', 'conditions' => array('Grupo.id' => $this->data['Grupo']['NaoSelecionado'])));
    }

    $this->set(compact('grupos','gruposelecionado'));
}
    */


    function add($id = null)
    {

        $retorno = $this->Usuario->nome($id);
        $nome    = $retorno[0]['usuarios']['NomeUsuario'];

        if (!empty($this->data)) {

            if (!empty($this->data['Usuario']['senha']))
                $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);

            $this->Usuario->create();

            $this->data['Usuario']['Ativo'] = 2;

            if ($this->Usuario->save($this->data)) {

                $usuario_id = $this->Usuario->id;
                $date       = date('d/m/Y H:i');
//                $created    = date('Y-m-d H:i:s');
                $nome      = $this->data['Usuario']['NomeUsuario'];
                $nome2     = $this->data['Usuario']['nome2'];
                $descricao = $date . ' - ' . $nome . ' Entrou na Rede de ' . $nome2;

                $data = array(
                    'usuario_id' => $usuario_id,
                    'saque_id' => 0,
                    'descricao' => $descricao,
                    'status' => 0,
                );

                $this->loadModel('Noticia');
                $this->Noticia->create();
                $this->Noticia->save($data);
//                $this->Usuario->noticiasCadastro($descricao, $usuario_id, $created);
                $this->Usuario->grupo();

                $this->addMessageSucess(__('Conta cadastrada com sucesso. Entre no sistema com seu Login e Senha.', true));

                //$this->Session->destroy();
                //$this->Session->setFlash(__('Você foi desconectado!', true));
                //$this->addMessageAlert('Você foi desconectado!');
                $this->redirect($this->Auth->logout());

                //$this->redirect(array('controller' => 'usuarios', 'action'=>'principal'));
            } else {
                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
            }
        }
        //$this->set('acao', 'add');

        //$usuarios = $this->Usuario->find('list' , array('order'=>'id'));
        //$this->set(compact('usuarios','id'));
        $this->set(compact('id', 'nome'));
    }


    function add2($id = null)
    {

        $retorno = $this->Usuario->nome($id);
        $nome    = $retorno[0]['usuarios']['NomeUsuario'];

        if (!empty($this->data)) {

            if (!empty($this->data['Usuario']['senha']))
                $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);

            $this->Usuario->create();

            $this->data['Usuario']['Ativo'] = 2;

            if ($this->Usuario->save($this->data)) {

                $usuario_id = mysql_insert_id();
                $date       = date('d/m/Y H:i');
                $created    = date('Y-m-d H:i:s');
                $nome       = $this->data['Usuario']['NomeUsuario'];
                $nome2      = $this->data['Usuario']['nome2'];
                $descricao  = $date . ' - ' . $nome . ' Entrou na Rede de ' . $nome2;
                $this->Usuario->noticiasCadastro($descricao, $usuario_id, $created);

                $this->Usuario->grupo();

                $this->addMessageSucess(__('Conta cadastrada com sucesso.', true));

                //$this->Session->destroy();
                //$this->Session->setFlash(__('Você foi desconectado!', true));
                //$this->addMessageAlert('Você foi desconectado!');
                //$this->redirect($this->Auth->logout());

                $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
            } else {
                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
            }
        }
        //$this->set('acao', 'add');
        //$usuarios = $this->Usuario->find('list' , array('order'=>'id'));
        //$this->set(compact('usuarios','id'));
        $this->set(compact('id'));
    }

    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->addMessageError(__('Conta inválida', true));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
        }
        if (!empty($this->data)) {
            if (!empty($this->data['Usuario']['senha']))
                $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);
            if ($this->Usuario->save($this->data)) {
                $this->addMessageSucess(__('Conta alterada com sucesso.', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
            } else {
                $this->addMessageError(__('Ocorreu um $usuarioserro. Tente novamente.', true));
            }

        }

        if (empty($this->data)) {
            $this->data = $this->Usuario->read(null, $id);
        }

        $this->set(compact('id', 'nome', 'cadastro'));

    }


    function edit2($id = null)
    {
        if ($this->params['form']['investimento']) {
            $id_usuario = $this->params['form']['idUsuario'];
            if (!$valor_investimento = $this->params['form']['valorInvestimento'] == "") {
                $valor_investimento = $this->params['form']['valorInvestimento'];
                $fazerInevstimento  = $this->fazerInevstimento($id_usuario, $valor_investimento);

                $this->addMessageSucess(__('Siliciatçao enviada com sucesso. Por favor aguarde confirmaçao do administrador!', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id_usuario));

            } else {
                $this->addMessageError(__('Por favor, escolha um valor para investir!', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'financeiro2/' . $id_usuario));
            }

        }

        if ($novo_plano = $this->params['form']['plano']) {

            $id_usuario    = $this->params['form']['id_usuario'];
            $plano_usuario = $this->params['form']['plano_usuario'];

            switch ($plano_usuario) {
                case 1:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 2:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 3:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 4:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 5:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 6:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;
                case 7:
                    $saldo = $this->financeiro2($id_usuario, $plano_usuario);
                    $taxa  = $this->verificaTaxa($plano_usuario, $novo_plano);
                    break;

            }

            if ($saldo >= $taxa) {
                $this->mudaPlano($id_usuario, $plano_usuario, $novo_plano, $taxa);
                $this->addMessageSucess(__('Conta alterada com sucesso. Por favor reinicie a conta', true));

                $this->redirect(array('controller' => 'usuarios', 'action' => 'edit2/' . $id_usuario));

            } else {
                $this->addMessageError(__('Para migrar para esse plano é necessário ter no mínimoR$' . number_format($taxa, 2, ',', '.') . ' de saldo.', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'edit2/' . $id_usuario));
            }

        }


        $tipoBanco = $this->Usuario->pegaTipoBanco();
        $banco     = $tipoBanco[0]['bancos']['banco'];

        $usuario  = $this->Usuario->find('all',
                                         array(
                                             'conditions' => array('id' => $id),
                                         )
        );
        $cadastro = $usuario[0]['Usuario']['created'];

        $data = explode("-", $cadastro);
        $dia  = $data[2];
        $mes  = $data[1];
        $ano  = $data[0];

        $dias_vencimento = 365;

        $data_vencimento = date("Y-m-d h:i:s", mktime(0, 0, 0, $mes, $dia + $dias_vencimento, $ano));

        $data_atual = date('Y-m-d H:i:s');
        $data_final = $data_vencimento;

        $diferenca = strtotime($data_final) - strtotime($data_atual);


        $dias     = intval($diferenca / 86400);
        $marcador = $diferenca % 86400;
        $hora     = intval($marcador / 3600);
        $marcador = $marcador % 3600;
        $minuto   = intval($marcador / 60);
        $segundos = $marcador % 60;


        if (!$id && empty($this->data)) {
            $this->addMessageError(__('Conta inválida', true));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
        }
        if (!empty($this->data)) {

            /*
            if(!empty($this->data['Usuario']['senha']))
    $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);
            */

            if ($this->Usuario->save($this->data)) {

                if ($this->data['Usuario']['Ativo'] == 1) {
                    $usuario_id = $this->data['Usuario']['id'];
                    $this->Usuario->ativaConta($usuario_id);
                }

                $this->addMessageSucess(__('Alterado com sucesso.', true));
                //$this->redirect(array('controller' => 'usuarios', 'action'=>'logout'));
            } else {
                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
            }

        }

        if (empty($this->data)) {
            $this->data = $this->Usuario->read(null, $id);
        }

        $this->loadModel('Investimento');
        $investimentos = $this->Investimento->find('all', array(
            'conditions' => array(
                'id_usuario' => $id
            )));


        $this->set(compact('id'));
        $this->set(compact('banco'));
        $this->set(compact('cadastro'));
        $this->set(compact('dias'));
        $this->set(compact('hora'));
        $this->set(compact('minuto'));
        $this->set(compact('segundos'));
        $this->set(compact('investimentos'));
        $this->set('data_vencimento', $data_vencimento);
    }

    function edit3($id = null)
    {
        $tipoBanco = $this->Usuario->pegaTipoBanco();
        $banco     = $tipoBanco[0]['bancos']['banco'];

        if (!$id && empty($this->data)) {
            $this->addMessageError(__('Conta inválida', true));
            $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
        }
        if (!empty($this->data)) {

            /*
            if(!empty($this->data['Usuario']['senha']))
    $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['senha']);
            */

            if ($this->Usuario->save($this->data)) {
                $this->addMessageSucess(__('Conta alterada com sucesso.', true));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'principal'));
            } else {
                $this->addMessageError(__('Ocorreu um erro. Tente novamente.', true));
            }

        }

        if (empty($this->data)) {
            $this->data = $this->Usuario->read(null, $id);
        }
        //$this->set('acao', 'edit');
        //$this->render('add');

        //$usuarios = $this->Usuario->find('list' , array('order'=>'id'));
        //$this->set(compact('usuarios'));
        $this->set(compact('id'));
        $this->set(compact('banco'));
    }

    public function mudaPlano($id_usuario, $plano_anterior, $novo_plano, $taxa)
    {
        $data = [
            'id' => $id_usuario,
            'plano' => $novo_plano
        ];
        if ($this->Usuario->save($data)) {
            $data = [
                'usuario_id' => $id_usuario,
                'valor_taxa' => $taxa,
                'plano_anterior' => $plano_anterior,
                'novo_plano' => $novo_plano
            ];
            $this->loadModel('Mudanca');
            $this->Mudanca->create();
            $this->Mudanca->save($data);
        }
    }

    public function fazerInevstimento($id, $valor)
    {

        $valorTiraPonto = str_replace('.', '', $valor);
        $valorAmericano = str_replace(',', '.', $valorTiraPonto);

        $usuario     = $this->Usuario->findById($id);
        $nomeUsuario = $usuario['Usuario']['NomeUsuario'];

        $data = array(
            'id_usuario' => $id,
            'nome_usuario' => $nomeUsuario,
            'valor_investimento' => $valorAmericano,
            'ativo' => 0
        );

        $this->loadModel('Investimento');
        $this->Investimento->create();
        $this->Investimento->save($data);
    }

    public function verificaTaxa($plano_usuario, $novo_plano)
    {
        if ($plano_usuario == 1) {

            switch ($novo_plano) {
                case 2;
                    $valor_taxa = 50;
                    break;
                case 3;
                    $valor_taxa = 250;
                    break;
                case 4;
                    $valor_taxa = 450;
                    break;
                case 5;
                    $valor_taxa = 950;
                    break;
                case 6;
                    $valor_taxa = 2950;
                    break;
                case 7;
                    $valor_taxa = 4950;
                    break;
                case 8;
                    $valor_taxa = 9950;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 2) {

            switch ($novo_plano) {
                case 3;
                    $valor_taxa = 200;
                    break;
                case 4;
                    $valor_taxa = 400;
                    break;
                case 5;
                    $valor_taxa = 900;
                    break;
                case 6;
                    $valor_taxa = 2900;
                    break;
                case 7;
                    $valor_taxa = 4900;
                    break;
                case 8;
                    $valor_taxa = 9900;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 3) {
            switch ($novo_plano) {
                case 4;
                    $valor_taxa = 200;
                    break;
                case 5;
                    $valor_taxa = 700;
                    break;
                case 6;
                    $valor_taxa = 2700;
                    break;
                case 7;
                    $valor_taxa = 4700;
                    break;
                case 8;
                    $valor_taxa = 9700;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 4) {
            switch ($novo_plano) {
                case 5;
                    $valor_taxa = 500;
                    break;
                case 6;
                    $valor_taxa = 2500;
                    break;
                case 7;
                    $valor_taxa = 4500;
                    break;
                case 8;
                    $valor_taxa = 9500;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 5) {
            switch ($novo_plano) {
                case 6;
                    $valor_taxa = 2000;
                    break;
                case 7;
                    $valor_taxa = 4000;
                    break;
                case 8;
                    $valor_taxa = 9000;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 6) {
            switch ($novo_plano) {
                case 7;
                    $valor_taxa = 2000;
                    break;
                case 8;
                    $valor_taxa = 7000;
                    break;
            }

            return $valor_taxa;

        } elseif ($plano_usuario == 7) {
            $valor_taxa = 5000;

            return $valor_taxa;
        }

    }


    function delete($id = null)
    {
        if (!$id) {
            //$this->Session->setFlash('O registro informado é inválido ou não existe.', 'flash_bad');
            $this->addMessageError(__('O registro informado é inválido ou não existe.', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Usuario->del($id)) {
            //$this->Session->setFlash('O registro foi apagado com sucesso.', 'flash_good');
            $this->addMessageSucess(__('O registro foi excluido com sucesso.', true));
            $this->redirect(array('action' => 'index'));
        }

    }


}

?>