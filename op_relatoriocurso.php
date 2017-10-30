<?php 
include "conexao.php";
if(isset($_GET['us'])){?><?php 
include "conexao.php";


if(isset($_GET['us']));
$us=$_GET['us'];

if(isset($_POST["txt_curso"]));
$curso=$_POST["txt_curso"];


if ($curso==NULL){
	
	header ("Location:frm_relatoriocurso.php?us=$us&crs=$curso");

	}	
	else{

$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:relatorio_curso.php?us=$us&crs=$curso");
	
	}


	




	
?>
<?php }}else{ header ("Location: index.php");} 

?>