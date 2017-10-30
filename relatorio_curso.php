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
<title>Relatório Laboratório - Mapeamento</title>

<style type="text/css">
<!--
body,td,th {
	color: 666;
}
h2 {
	font-size: 18px;
	color: 666;
}
-->
</style></head>
<?php
?>
<body>
<?php 
include "topo.php";
include "testemenu.php";

include "conexao.php";

if (isset($_GET['acao']))
$acao=$_GET['acao'];

if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['crs']))
$curso=$_GET['crs'];

if(isset($_POST['codetec']))
$codetec=$_POST['codetec'];	

if (isset($_GET['lab'])){
$laboratorio=$_GET['lab'];
} 
$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];
$us=base64_encode($us);	
if($medio=="Administrador"){

include ("menu.php");

	}else{
$us=base64_encode($us);
include ("menu_usuario.php");

		}

?>

<body>
<table width="933" border="0" >
  <tr>
    <td colspan="6" align="center" bgcolor="#D6D6D6"><strong>Relatório Laboratório - Mapeamento</strong></td>
  </tr>
  <tr>
    <td width="29">&nbsp;</td>
    <td width="169"><h2><strong>Curso</strong></h2></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="97">&nbsp;</td>
    <td width="178">&nbsp;</td>
  </tr>
  <?php 
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  
  $sql="select * from tbl_curso where `PK_CodCurso`='$curso'";
  $comando=mysql_query($sql);
  $linha=mysql_fetch_array($comando);
  
 
  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="left"><?php echo $linha['Nome_Curso'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <table width="933" border="1" cellpadding="0" cellspacing="0" >
  <tr align="center" bgcolor="#D6D6D6">
    <td colspan="2" bgcolor="#F7F7F6"><strong>Nome do ambiente alocado</strong></td>
    <td width="285" bgcolor="#F7F7F6"><strong>Etec</strong></td>
    <td width="149" bgcolor="#F7F7F6"><strong>Capacidade de Alunos</strong></td>
    <td bgcolor="#F7F7F6"><strong>Área (m²)</strong></td>

  </tr><?php 
  
  		if($medio=="Administrador"){

  
  $sqllaboratorio="select * from tbl_espaco_fisico as f inner join tbl_espaco_curso as c on f.PK_CodLaboratorio=c.FK_espaco where c.FK_curso='$curso' order by FK_Instituicao";
  $comandolaboratorio=mysql_query($sqllaboratorio);}
  else{

  
  
  $sqllaboratorio="select * from tbl_espaco_fisico as f inner join tbl_espaco_curso as c on f.PK_CodLaboratorio=c.FK_espaco where c.FK_curso='$curso' and `FK_Instituicao`='$usu' order by FK_Instituicao";
  $comandolaboratorio=mysql_query($sqllaboratorio);
	  }
	  
	    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  while($linhalaboratorio=mysql_fetch_array($comandolaboratorio)){
  $fketec=$linhalaboratorio['FK_Instituicao'];
  $fkespacofisico=$linhalaboratorio['FK_Laboratorio'];
  
  
	   
  
	  mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
	   
  $sqletec="select * from tbl_etec where `PK_CodEtec`='$fketec'";
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $comandoetec=mysql_query($sqletec);

  $linhaetec=mysql_fetch_array($comandoetec);
	  
	?>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td colspan="2" align="center"><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio["Descricao"];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhaetec["Etec"];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio["Capacidade"];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio["Area"];?></td>

  </tr>
  <?php } ?>
  <tr>
  </table>
  <table width="933" border="0" >
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="frm_relatoriocurso.php?us=<?php //$us=base64_encode($us); 
	echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
    <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>