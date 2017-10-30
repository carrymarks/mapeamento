<?php 
include "conexao.php";
if(isset($_GET['us'])){?><?php 
include "conexao.php";


if (isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_POST["txt_etec"])){
$etec=$_POST["txt_etec"];	}



$acao="pesquisar";



if ($acao=="pesquisar"){

header("Location:Relatorio_equipamentoetec.php?us=$us&etec=$etec");
	
	}
?>
<?php }else{ header ("Location: index.php");} 

?>