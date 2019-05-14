<?php

class Usuario extends AppModel
{

    var $name     = 'Usuario';
    var $actsAs   = array('Validacao');
    var $useTable = 'usuarios';

    var $validate = array(
        'username' => array(
            'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
            'isUnique' => array('rule' => array('isUnique'), 'message' => 'Campo já foi cadastrado.')
        ),
        'senha' => array('rule' => 'checaSenha', 'message' => 'Campo de preenchimento obrigatório.'),
        'NomeUsuario' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'cpf' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'email' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'dataNascimento' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'Ativo' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'plano' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'endereco' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'cidade' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'estado' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'telefone' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'cep' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'idade' => array('rule' => 'notEmpty', 'message' => 'Você precisa ser maior de idade.'),
        'termo' => array('rule' => 'notEmpty', 'message' => 'Você precisa aceitar.'),
        'usuario_id' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
        'Sexo' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
    );

    function pegaSaldo($usuario_id)
    {
        $pega = $this->query("SELECT saldo FROM saques WHERE usuario_id = " . $usuario_id . " ORDER BY usuario_id DESC LIMIT 1");
        return $pega;
    }

    function checaSenha()
    {
        if ($this->data['Usuario']['Obrigatorio'] && empty($this->data['Usuario']['senha']))
            return false;
        return true;
    }

    function grupo()
    {
        $retorno = $this->query("SELECT MAX(id) as id FROM usuarios");
        $id      = $retorno[0][0]['id'];
        $pega    = $this->query(" INSERT INTO grupos_usuarios (usuario_id,grupo_id) VALUES ('$id',2) ");
        return $pega;
    }

    function nome($id)
    {
        $pega = $this->query(" SELECT NomeUsuario FROM usuarios WHERE id = " . $id);
        return $pega;
    }

    function pegaTipoBanco()
    {
        $pega = $this->query("SELECT banco FROM bancos WHERE usuario_id = 1");
        return $pega;
    }

    function plano($id_usuario)
    {
        $pega = $this->query(" SELECT plano FROM usuarios WHERE id = " . $id_usuario);
        return $pega;
    }


    function N1($id_usuario)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuario . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N2($id_usuarios_n1)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n1 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N3($id_usuarios_n2)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n2 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N4($id_usuarios_n3)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n3 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N5($id_usuarios_n4)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n4 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N6($id_usuarios_n5)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n5 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N7($id_usuarios_n6)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n6 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }

    function N8($id_usuarios_n7)
    {
        $pega = $this->query(" SELECT id,NomeUsuario,plano,Ativo FROM usuarios WHERE usuario_id = " . $id_usuarios_n7 . " AND Ativo = 1 order by Ativo ASC");
        return $pega;
    }


    //ATIVOS
    function totalContas($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE Ativo = 1 AND id <> 1 " . $data);
        return $pega;
    }

    // INATIVOS
    function totalContas2($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE Ativo = 2 AND id <> 1 " . $data);
        return $pega;
    }

    function plano1($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 1 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano2($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 2 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano3($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 3 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano4($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 4 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano5($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 5 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano6($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 6 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano7($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 7 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function plano8($data)
    {
        $pega = $this->query("SELECT plano FROM usuarios WHERE plano = 8 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }


    function ativos($data)
    {
        $pega = $this->query("SELECT Ativo FROM usuarios WHERE Ativo = 1 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function inativos($data)
    {
        $pega = $this->query("SELECT Ativo FROM usuarios WHERE Ativo = 2 AND id <> 1 AND id <> 1 " . $data);
        return $pega;
    }

    function somaSaques($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor) FROM saques WHERE usuario_id =" . $id_usuario);
        return $pega;
    }

    function somaTransferencias($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_transferido) FROM transferencias WHERE usuario_id =" . $id_usuario);
        return $pega;
    }

    function somaComissao($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_comissao) FROM comissoes WHERE destinatario_id =" . $id_usuario);
        return $pega;
    }

    function somaTaxaManuntencao($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_tarifa) FROM tarifas WHERE id_usuario =" . $id_usuario);
        return $pega;
    }

    function somaRecebido($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_transferido) FROM transferencias WHERE destinatario_id =" . $id_usuario);
        return $pega;
    }

    function somaSaquesPagos()
    {
        $pega = $this->query("SELECT SUM(valor) FROM saques WHERE status = 2 ");
        return $pega;
    }

    function somaSaquesPendentes()
    {
        $pega = $this->query("SELECT SUM(valor) FROM saques WHERE status = 1 ");
        return $pega;
    }

    function noticiasCadastro($descricao, $usuario_id, $created)
    {
        $salva = $this->query("INSERT INTO noticias (usuario_id, saque_id, descricao, status, created, modified) VALUES (" . $usuario_id . ", 0, '" . $descricao . "', 0, '" . $created . "', '" . $created . "')");
        return $salva;
    }

    function ativaConta($usuario_id)
    {
        $salva = $this->query("DELETE FROM noticias WHERE usuario_id = " . $usuario_id);
        return $salva;
    }

    function RecuperaSenhaLogin($email)
    {
        $pega = $this->query("select senha,username,NomeUsuario from usuarios WHERE email = '" . $email . "' ");
        return $pega;
    }

    function somaTaxaMudanca($id_usuario)
    {
        $pega = $this->query("SELECT SUM(valor_taxa) FROM mudancas WHERE usuario_id =" . $id_usuario);
        return $pega;
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasAndBelongsToMany = array(
        'Grupo' => array(
            'className' => 'Grupo',
            'joinTable' => 'grupos_usuarios',
            'foreignKey' => 'usuario_id',
            'associationForeignKey' => 'grupo_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}

?>