<?php
class Noticia extends AppModel {

	var $name = 'Noticia';        
        //var $actsAs = array('DateFormatter','Validacao');

        var $displayField = 'descricao';

        	var $validate = array(
                    'descricao' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatório.')
	);           
}