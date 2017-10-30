<?php 


$_host = "mysql02.cpscetec.com.br";
$_usuario = "mapeamento2015";
$_senha = "r2d2@42";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("mapeamento2015",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");

   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

?>