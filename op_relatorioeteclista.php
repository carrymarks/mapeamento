<?php
if(isset($_GET['us'])){?><?php 
include "conexao.php";


if (isset($_GET['us'])){
$us=$_GET['us'];}



if (isset($_POST["txt_espacofisico"])){
$laboratorio=$_POST["txt_espacofisico"];
}



if (isset($_POST["txt_equipamento"])){
$equipamento=$_POST["txt_equipamento"];}

if (isset($_POST['txt_etec'])) 
{
	header ("Location:frm_detalheEquipamento");
	$codetec=$_POST['txt_etec'];
	}

if ($laboratorio==NULL){
	
if (isset($_POST['txt_etec'])) 
{
		$codetec=$_POST['txt_etec'];
	header ("Location:frm_relatorioeteclista.php?us=$us&codetec=$codetec&lab=$laboratorio");

	}	
	
	
	
	}
	else{

$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:Relatorio_eteclista.php?us=$us&codetec=$codetec&lab=$laboratorio");
	
	}




	
?>
<?php }}else{ header ("Location: index.php");} 







?>