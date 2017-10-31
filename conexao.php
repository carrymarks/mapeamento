<?php 


$_host = "#";
$_usuario = "#";
$_senha = "#";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("#",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");

   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

?>