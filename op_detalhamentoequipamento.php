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

if ($equipamento==NULL){
	
if (isset($_POST['txt_etec'])) 
{
		$codetec=$_POST['txt_etec'];
	header ("Location:frm_detalheEquipamento.php?us=$us&codetec=$codetec");

	}	
	
	
	
	}
	if (($laboratorio!=NULL)and($equipamento==NULL)){
		$codetec=$_POST['txt_etec'];
		
		header ("Location:frm_detalheEquipamento.php?us=$us&codetec=$codetec&lab=$laboratorio");
		}
	if ($equipamento!=NULL){

$acao="pesquisar";



if ($acao=="pesquisar"){

$sql="select * from tbl_espaco_fisico,tbl_material where PK_CodLaboratorio=FK_EspacoFisico";
header("Location:relatorio_equipamento.php?us=$us&codetec=$codetec&lab=$laboratorio&eqp=$equipamento");
	
	}




	
?>
<?php }}else{ header ("Location: index.php");} 







?>