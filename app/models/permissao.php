<?php
class Permissao extends AppModel {

	var $name = 'Permissao';
	var $displayField = 'Alias';
	var $validate = array(
		'Alias' => array(
			'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.', 'last' => true),
            'isUnique' => array('rule' => array('isUnique'), 'message' => 'Campo já foi cadastrado.')
		),
		'Controllers' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.'),
		'Actions' => array('rule' => 'notEmpty', 'message' => 'Campo de preenchimento obrigatório.')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Grupo' => array(
			'className' => 'Grupo',
			'joinTable' => 'grupos_permissoes',
			'foreignKey' => 'permissao_id',
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