<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imagem</title>
</head>
<a href="<?php echo $linha["Imagem"];?>">aeee
</a>
<?php 
include "conexao.php";
if(isset($_GET['us'])){
$us=$_GET['us'];
if(isset($_GET['cod'])){
$cod=$_GET['cod'];	}

$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];


$sql="select * from tbl_espaco_fisico where `FK_Instituicao`='$usu'";
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);
 
 <body>
 aeee
</body>
<?php }else{ header ("Location: index.php");} ?>
</html>