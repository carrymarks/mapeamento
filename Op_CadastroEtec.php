<?php
include "conexao.php";

if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_POST['us'])){
$us=$_POST['us'];}

echo $us;

if(isset($_GET['acao'])){
$acao=$_GET['acao'];	
	}
	
if(isset($_POST['acao'])){
$acao=$_POST['acao'];	
	}	
	
if(isset($_POST['cod'])){
$cod=$_POST['cod'];	
	}	
	
if(isset($_GET['cod'])){
$cod=$_GET['cod'];	
	}	

if(isset($_POST["txt_unidade"])){
$Unidade=$_POST["txt_unidade"];	
	}

if(isset($_POST["txt_municipio"])){
$municipio=$_POST["txt_municipio"];	
	}
	
if(isset($_POST["txt_codigounidade"])){
$codunidade=$_POST["txt_codigounidade"];	
	}	
	
if(isset($_POST["txt_etecsede"])){
$etecsede=$_POST["txt_etecsede"];	
	}	

if(isset($_POST["txt_tipoatendimento"])){
$tipoatendimento=$_POST["txt_tipoatendimento"];	
	}
	
	
echo $acao;

if($acao=="adc"){
$sqlEtec="insert tbl_etec (Codigo_etec,Codigo_etecsede,TipoAtendimento,Etec,Municipio) values ('$codunidade','$etecsede','$tipoatendimento','$Unidade','$municipio')"	;
mysql_query($sqlEtec) or die (mysql_error());
	
	}	
	
if($acao=="edt"){
$sqlEtec="Update tbl_etec set Codigo_etec='$codunidade',Codigo_etecsede='$etecsede',TipoAtendimento='$tipoatendimento',Etec='$Unidade',Municipio='$municipio' where PK_CodEtec='$cod'"	;
mysql_query($sqlEtec) or die (mysql_error());	
	
	}	

header("Location:listaunidade.php?us=$us");
	
 ?>