<?php
if(isset($_GET['us'])){?><?php 
include "conexao.php";


if (isset($_GET['us'])){
$us=$_GET['us'];}


if (isset($_POST['txt_etec'])) 
{
	$codetec=$_POST['txt_etec'];
	}



$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:relatorio_eteclaboratorio.php?us=$us&codetec=$codetec");
	
	}




	
?>
<?php }else{ header ("Location: index.php");} 







?>