<?php
include "conexao.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}




if(isset($_POST["txt_equipamento"])){
$equipamento=$_POST["txt_equipamento"];
	}
	
	


if ($equipamento==NULL){
	
		
	header ("Location:frm_relatorioetecequipamento.php?us=$us&codetec=$codetec&lab=$laboratorio");
	
	}
	else{

$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:Relatorio_laboratorioporquipamento.php?us=$us&eqp=$equipamento");
	}
	}


?>