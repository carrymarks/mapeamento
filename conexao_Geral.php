<?php 
error_reporting(0);
ini_set("display_errors", 0 );

// $_host = "#";
// $_usuario = "#";
// $_senha = "#";

if(!isset($_SESSION)){
  session_start();
}

$periodo2=$_SESSION['periodo'];

if($periodo2=='2012'){

// $_host = "#";
// $_usuario = "#";
// $_senha = "#@#";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("mapeamento",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");


}elseif($periodo2=='2013'){

// $_host = "#";
// $_usuario = "#";
// $_senha = "#";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("mapeamento2013",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");


}elseif($periodo2=='2015'){

// $_host = "#";
// $_usuario = "#";
// $_senha = "#";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("mapeamento2015",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");


  }
  else{

// $_host = "#";
// $_usuario = "#";
// $_senha = "#";
$_db      = mysql_connect($_host,$_usuario,$_senha) or die ("Não foi possivel Conectar so Servidor");
mysql_select_db("mapeamento",$_db) or die ("Não Foi Possivel Conectar ao Banco de Dados");



}




   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

?>