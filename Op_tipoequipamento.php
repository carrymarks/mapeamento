<?php
if(isset($_GET['us'])){?><?php 
include "Conexao.php";
include "tipoequipamento.class.php";

		  
if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if (isset($_POST["cod"])){
$cod=$_POST["cod"];}

if (isset($_POST["txt_eqp"]))
$eqp=$_POST["txt_eqp"];

if(isset($_POST["acao"])){
$acao=$_POST["acao"];}

if(isset($_GET['us'])){
$us=$_GET['us'];	}


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

if(isset($_GET['us'])){
$us=$_GET['us'];	}


$tipoequipamento = new TipoEquipamento();

if($acao=="adc"){
 $us= base64_encode($us);
		$tipoequipamento->Inserir($eqp,$cadastro);
		header("Location:listatipoequipamento.php?us=$us");
		}
if ($acao=="edt"){	
 $us= base64_encode($us);
	$tipoequipamento->Editar($eqp,$cadastro,$cod);
		header("Location:listatipoequipamento.php?us=$us");
					
			}
?>
<?php }else{ header ("Location: index.php");} ?>