<?php 
include "conexao.php";



if(isset($_GET['us'])){
$us=$_GET['us'];	}

if(isset($_POST["txt_data1"])){
$txt_data1=$_POST["txt_data1"];	
	}else{
$txt_data1="";		
	}



if($txt_data1!=""){
$data=explode("/",$txt_data1);
$txt_data1=$data[2].'-'.$data[1].'-'.$data[0];
}



	
if(isset($_POST['txt_data2'])){
$txt_data2=$_POST['txt_data2'];	
}else{
$txt_data2="";	
}

if($txt_data2!=""){
$data2=explode("/",$txt_data2);
$txt_data2=$data2[2].'-'.$data2[1].'-'.$data2[0];
}


if (isset($_POST["cod"])){
	$cod=$_POST["cod"];}	
	


$data=date("Y-m-d");

	
//excluindo ocorrencia
if (isset($_GET['ex'])){	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$us=base64_decode($us);
$sql="delete from tbl_abertura where PK_Abertura='$cod'";
		$comando=mysql_query($sql)or die(mysql_error());
		$us=base64_encode($us);
		header("Location:Lst_fechamentoabertura.php?us=$us");
}
//ocorrencia exluida


if(isset($_GET['acao'])){
$acao=$_GET['acao'];	}

if(isset($_POST["acao"])){
$acao=$_POST["acao"];	}


	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$etec =$linha['FK_Etec'];
	$medio=$linha['Nivel_Acesso'];



$sqlusuario="select * from tbl_usuario where PK_Login='$us'";
$queryusuario=mysql_query($sqlusuario);
$linhausuario=mysql_fetch_array($queryusuario);
$fketec=$linhausuario['FK_Etec'];




if($acao=="adc"){

	$sql="insert into tbl_abertura (Data_Inicio,Data_Fim) values ('$txt_data1','$txt_data2')";
	mysql_query($sql) or die(mysql_error());

}else if($acao=="edt"){

	$sql="update tbl_abertura set Data_Inicio='$txt_data1',Data_Fim='$txt_data2' where PK_Abertura='$cod'";
	mysql_query($sql) or die(mysql_error());

}


header("Location:Lst_fechamentoabertura.php?us=$us");



?>