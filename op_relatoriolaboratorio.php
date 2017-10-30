<?php
if(isset($_GET['us'])){?><?php 
include "conexao.php";


if (isset($_GET['us'])){
$us=$_GET['us'];}



if (isset($_POST["txt_espacofisico"])){
$laboratorio=$_POST["txt_espacofisico"];
}



if ($laboratorio==NULL){
	
	header ("Location:frm_relatoriolaboratorio.php?us=$us&codetec=$codetec");

	}	
	
	

	else{

$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:Relatorio_laboratorio.php?us=$us&codetec=$codetec&lab=$laboratorio");
	
	}




	
?>
<?php }}else{ header ("Location: index.php");} 







?>