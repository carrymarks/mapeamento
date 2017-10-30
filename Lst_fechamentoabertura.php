<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");	
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista Suporte - Mapeamento</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	color: #666;
}
-->
</style></head>

<body>
<?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";

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
$us=base64_encode($us);

if($medio!="Administrador"){

include "menu_usuario.php";
	}else{	
//echo "$us"; 
$us=base64_decode($us);

include ("menu.php");	

		}	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0">
    <tr bgcolor="#D6D6D6">
      <td width="383"><strong>Data de Abertura</strong></td>
      <td width="425"><strong>Data de Fechamento</strong></td>
      <td colspan="2"><strong>Ação</strong></td>
    </tr>
    <?php 
	$sqldados="select * from tbl_abertura order by Data_Inicio";
	$comandodados=mysql_query($sqldados);
	while($linhadados=mysql_fetch_array($comandodados)){
	?>
    <tr>
      <td><?php $txt_data1=explode("-",$linhadados['Data_Inicio']);
	  	echo $txt_data1[2].'/'.$txt_data1[1].'/'.$txt_data1[0];
	   ?></td>
      <td><?php $txt_data2=explode("-",$linhadados['Data_Fim']); 
	  echo $txt_data2[2].'/'.$txt_data2[1].'/'.$txt_data2[0];
	  ?></td>
      <td width="68" align="center"><strong><a href="Frm_fechamentoabertura.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linhadados['PK_Abertura'] ; ?>"><img src="editar.gif" alt="" width="36" height="36" /></a></strong></td>
      <td width="39" align="center"><strong><a href="Op_fechamentoabertura.php?us=<?php echo $us?>&amp;ex=sim&amp;cod=<?php echo $linhadados['PK_Abertura'] ; ?>"><img src="icone_excluir.gif" alt="" width="17" height="17" /></a></strong></td>
      <?php } ?>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><strong><a href="Frm_fechamentoabertura.php?us=<?php echo $us ?>&amp;acao=adc"><img src="NOVO.gif" alt="" width="38" height="33" /></a></strong></td>
    </tr>
  </table>
</form>
</body>
</html>