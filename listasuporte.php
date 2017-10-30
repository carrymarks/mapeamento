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
      <td width="343"><strong>Local do Ocorrido</strong></td>
      <td width="158"><strong>Assunto</strong></td>
      <td width="217"><strong>Mensagem</strong></td>
      <td colspan="2"><strong>Ação</strong></td>
    </tr>
    <?php 
	$sqldados="select * from tbl_suporte where FK_Etec='$etec'";
	$comandodados=mysql_query($sqldados);
	while($linhadados=mysql_fetch_array($comandodados)){
	?>
    <tr>
      <td><?php echo $linhadados["Erro"];?></td>
      <td><?php 
	        if($linhadados["Assunto"]==0){
		  echo "Funcionamento do Sistema";
		  }
		  if($linhadados["Assunto"]==1){
		  echo "Suporte para o Sistema";
		  }
		  if($linhadados["Assunto"]==2){
		  echo "Dúvida sobre Preenchimento";
		  }
		  if($linhadados["Assunto"]==3){
		  echo "Dúvida sobre o Projeto";
		  }
	  ?></td>
      <td><?php echo $linhadados["Mensagem"];?></td>
      <td width="41" align="center"><strong><a href="frm_suporte.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linhadados['PK_CodSuporte'] ; ?>"><img src="editar.gif" alt="" width="36" height="36" /></a></strong></td>
      <td width="22" align="center"><strong><a href="op_suporte.php?us=<?php echo $us?>&amp;ex=sim&amp;cod=<?php echo $linhadados['PK_CodSuporte'] ; ?>"><img src="icone_excluir.gif" alt="" width="17" height="17" /></a></strong></td>
      <?php } ?>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><strong><a href="frm_suporte.php?us=<?php echo $us ?>&amp;acao=adc"><img src="NOVO.gif" alt="" width="38" height="33" /></a></strong></td>
    </tr>
  </table>
</form>
</body>
</html>