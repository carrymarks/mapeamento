<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Cadastro Laboratório - Mapeamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "conexao.php"; 
include "topo.php";
include("testemenu.php");
include "conexao.php";

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];
	$us=base64_encode($us);
	$us=base64_encode($us);
if($medio!="Administrador"){

include ("menu_usuario.php");
	//$us=base64_decode($us);

	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
		

$sqlp="select * from tbl_usuario where PK_Login='$us'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];



?>


<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
}
-->
</style></head>

<body>
<?php


if (isset($_GET['cod']))
$cod=$_GET['cod'];

if(isset($_GET['us']))
$us=$_GET['us'];

$acao=$_GET['acao'];


if ($acao!="adc"){
$sql="select * from tbl_cadastrolaboratorio where PK_CodLaboratorio = $cod ";
$conect=mysql_query($sql) ;
$linha=mysql_fetch_array($conect);
$Cadlab=$linha['Nome_Laboratorio'];

}else{
$Cadlab='';
	}

?>
<form id="form1" name="form1" method="post" action="Op_cadastrolab.php?us=<?php echo $us ?>">
  <table width="933" border="0">
    <tr align="left">
      <td bgcolor="#D6D6D6"><strong>Cadastro Laboratório</strong></td>
    </tr>
    <tr>
      <td align="left"><label>
        <input name="txt_cadastrolab" type="text" id="txt_cadastrolab" value="<?php echo $Cadlab ?>" />
      </label></td>
    </tr>
    <tr>
      <td align="left"><label>
        <input type="submit" name="button" id="button" value="Salvar" />
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao ?>" />
        <input name="cod" type="hidden" id="cod" value="<?php echo $cod ?>" />
      </label></td>
    </tr>
  </table>
</form>
</body>
<?php 
include "footer.html";
?>
</html>