<?php 
if(isset($_GET['us'])){
	
?><?php 
include "conexao.php";
include "cadastrolab.class.php";


if (isset($_GET['ex'])){	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$Cadlab = new Lab();

$Cadlab->Excluir($cod);
		//header("Location:listacadastrolaboratorio.php");
}else{	

if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if (isset($_POST["cod"])){
	$cod=$_POST["cod"];}

if (isset($_POST["acao"])){
$acao=$_POST["acao"];}

if (isset($_POST["txt_cadastrolab"])){
$lab=$_POST["txt_cadastrolab"];}


if(isset($_GET['us'])){
$us=$_GET['us'];	}

	$us=base64_decode($us);

	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$etec =$linha['FK_Etec'];
	$medio=$linha['Nivel_Acesso'];
$fketec=$linha['FK_Etec'];
$us=base64_encode($us);

if($medio!="Administrador"){

$cadastro=1;
	}else{	
	
$cadastro=0;	
		}	


$Cadlabo = new Lab();

if ($acao=="adc"){
	$Cadlabo->Inserir($cod,$lab,$cadastro);
	header("Location:listacadastrolaboratorio.php?us=$us");
	
	}
if ($acao=="edt"){
	$Cadlabo->Editar($lab,$cadastro,$cod);
	header("Location:listacadastrolaboratorio.php?us=$us");
	}	
if ($acao=="del"){
	$Cadlabo->Excluir($cod);
	header("Location:listacadastrolaboratorio.php?us=$us");
	}	
}

?><?php }else{ header ("Location: index.php");} ?>