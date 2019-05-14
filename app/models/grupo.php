<?php
class Grupo extends AppModel {

	var $name = 'Grupo';
	var $displayField = 'Descricao';
	var $validate = array(
		'Descricao' => array(
			'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
            'isUnique' => array('rule' => array('isUnique'), 'message' => 'Campo já foi cadastrado.')
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'joinTable' => 'grupos_usuarios',
			'foreignKey' => 'grupo_id',
			'associationForeignKey' => 'usuario_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Permissao' => array(
			'className' => 'Permissao',
			'joinTable' => 'grupos_permissoes',
			'foreignKey' => 'grupo_id',
			'associationForeignKey' => 'permissao_id',
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