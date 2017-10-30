<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Pesquisa Equipamento - Mapeamento</title><?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";




	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$medio=$linha['Nivel_Acesso'];
$us=base64_encode($us);
$us=base64_encode($us);
if($medio!="Administrador"){

include ("menu_usuario.php");


	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<form id="form3" name="form3" method="post" action="op_pesquisaeqp.php?us=<?php $us= base64_decode($us); echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td width="331" align="left"><strong>Pesquisa Equipamento</strong></td>
    </tr>
    <tr>
      <td align="left"><input type="text" name="txt_pesquisaeqp" id="txt_pesquisaeqp" /></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="Pesquisar" id="Pesquisar" value="Pesquisar" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
<?php
include "footer.html";
?></html>