<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista Ocorrência - Mapeamento</title>
<?php 
include "conexao.php";
include "topo.php";
include("testemenu.php");

if(isset($_GET['us'])){
$us=$_GET['us'];	
	}

$us= base64_decode($us);

mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$fketec=$linhap['FK_Etec'];

	if($medio!="Administrador"){

include ("menu_usuario.php");


	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
?>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0" align="center">
    <tr bgcolor="#F1F1EF">
      <td><strong>Local da Ocorrência</strong></td>
      <td><strong>Assunto</strong></td>
      <td colspan="2"><strong>Ação</strong></td>
    </tr>
    <?php 
	if ($medio=="Administrador"){
	$sql="select * from tbl_suporte";
	  $comando=mysql_query($sql)or die(mysql_error());}
	  else{
	$sql="select * from tbl_suporte where FK_Etec='$fketec'";
	  $comando=mysql_query($sql)or die(mysql_error());	  
		  }
  while($linha=mysql_fetch_array($comando)){
	?>
    <tr>
      <td><?php echo $linha["Erro"];?></td>
      <td><?php echo $linha["Assunto"];?></td>
      <td><strong><a href="frm_suporte.php?us=<?php echo $us ?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodSuporte'] ; ?>"><img src="editar.gif" alt="" width="36" height="36" /></a></strong></td>
      <td><strong><a href="op_suporte.php?us=<?php echo $us?>&amp;ex=sim&amp;cod=<?php echo $linha['PK_CodSuporte'] ; ?>"><img src="icone_excluir.gif" alt="" width="17" height="17" /></a></strong></td>
    </tr>
    <?php } ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><strong><a href="frm_suporte.php?us=<?php echo $us ?>&amp;acao=adc"><img src="NOVO.gif" alt="" width="38" height="33" /></a></strong></td>
    </tr>
  </table>
</form>	
</body>
</html>