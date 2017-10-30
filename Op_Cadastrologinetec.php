<?php
if(isset($_GET['us'])){?><?php 
include "conexao.php";
include "loginetec.class.php";

if(isset($_GET['us'])){
$us=$_GET['us'];}

//$us=base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$fketec=$linhap['FK_Etec'];

echo $medio;

if (isset($_GET['ex'])){	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$Cadastro = new Cadastrologin();

$Cadastro->Excluir($cod);
		header("Location:listaloginetec.php?us=$us");
}else{	

if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if (isset($_POST["cod"])){
	$cod=$_POST["cod"];}

if (isset($_POST["acao"])){
$acao=$_POST["acao"];}

if (isset($_POST["Etec"])){
$eteclogin=$_POST["Etec"];}

if (isset($_POST["txt_loginetec"])){
$login=$_POST["txt_loginetec"];}
	
if (isset($_POST["txt_senhaetec"])){
$senha=$_POST["txt_senhaetec"];}
	
if (isset($_POST["txt_nível"])){
$nivel=$_POST["txt_nível"];}

if($nivel=="Supervisor"){
$nivel="Administrador";
$supervisor="S";	
	}else{
$supervisor='';		
		}

$Cadastro= new CadastroLogin();

if ($acao=="adc"){
	$Cadastro->Inserir($cod,$login,$senha,$eteclogin,$nivel,$supervisor);
	header("Location:listaloginetec.php?us=$us");
	
	}
if ($acao=="edt"){
	if($medio=="Comum"){
	$us=base64_encode($us);
	$nivel="Comum";	
	$Cadastro->Editar($login,$senha,$eteclogin,$nivel,$cod,$supervisor);
		}else{
	echo $us;
	$Cadastro->Editar($login,$senha,$eteclogin,$nivel,$cod,$supervisor);		
			}


	header("Location:listaloginetec.php?us=$us");
	}	
if ($acao=="del"){
	$us= base64_encode($us);
	$Cadastro->Excluir($cod);
	header("Location:listaloginetec.php?us=$us");
	}	
}
?><?php }else{ header ("Location: index.php");} ?>