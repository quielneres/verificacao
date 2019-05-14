<?php
class Mensagem extends AppModel {

	var $name = 'Mensagem';
        //var $displayField = 'mensagem';

        	var $validate = array(                     
                'mensagem' => array(
                    'notEmpty' => array('rule' => 'notEmpty', 'message' => 'Preenchimento obrigatorio', 'last' => true))                    
                );
              
}
?>