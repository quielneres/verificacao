<?php
    
  $host = "localhost";
  $usuario = "inove132_root";
  $senha = "sistemasweb123";
  $bd = "inove132_friend";
 
  mysql_connect($host, $usuario, $senha) or die ('Nao foi possivel se conectar ao banco');
  mysql_select_db($bd);

?>