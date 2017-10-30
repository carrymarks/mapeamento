<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Pesquisa Laboratório - Mapeamento</title><?php
?><?php include "topo.php";
include "conexao.php";
include("testemenu.php");
$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];
$us=base64_encode($us);	


if($medio=="Administrador"){
include "menu.php";}else{
$us=base64_encode($us);	


include "menu_usuario.php";	
	}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<form id="form1" name="form1" method="post" action="Op_consultalaboratorio.php?us=<?php  $us= base64_decode($us);echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td width="929" align="left"><strong>Consulta Espaço Físico</strong></td>
    </tr>
    <tr>
      <td align="left"><label>
        <input type="text" name="txt_consultafisico" id="txt_consultafisico" />
      </label></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="acao" id="acao" value="Pesquisar" /></td>
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
?>
</html>