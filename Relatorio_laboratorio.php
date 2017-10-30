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
include "menu.php";
include "conexao.php";

if (isset($_GET['acao']))
$acao=$_GET['acao'];

if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['codetec']))
$codetec=$_GET['codetec'];

if(isset($_POST['codetec']))
$codetec=$_POST['codetec'];	

if (isset($_GET['lab'])){
$laboratorio=$_GET['lab'];
} ?>

<body>
<table width="933" border="0" >
  <tr>
    <td colspan="6" align="center" bgcolor="#D6D6D6"><strong>Relatório Laboratório - Mapeamento</strong></td>
  </tr>
  <tr>
    <td width="29">&nbsp;</td>
    <td width="94"><h2><strong>Laboratório</strong></h2></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="134">&nbsp;</td>
    <td width="178">&nbsp;</td>
  </tr>
  <?php 
  
  $sqltipolaboratorio="select * from tbl_cadastrolaboratorio where `PK_CodLaboratorio`='$laboratorio'";
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $comandotipolaboratorio=mysql_query($sqltipolaboratorio);
  $linhatipolaboratorio=mysql_fetch_array($comandotipolaboratorio);
  $pktipolaboratorio=$linhatipolaboratorio['PK_CodLaboratorio'];
  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="left"><?php echo $linhatipolaboratorio['Nome_Laboratorio'];?></td>
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
    <td bgcolor="#F7F7F6"><strong>Código Etec</strong></td>
    <td width="290" bgcolor="#F7F7F6"><strong>Etec</strong></td>
    <td width="182" bgcolor="#F7F7F6"><strong>Capacidade de Alunos</strong></td>
    <td bgcolor="#F7F7F6"><strong>Área (m²)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Cursos</strong></td>
  </tr><?php 
  
    mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
  
  $sqllaboratorio="select * from tbl_espaco_fisico where `FK_Laboratorio`='$pktipolaboratorio' order by FK_Instituicao";
  $comandolaboratorio=mysql_query($sqllaboratorio);
  while($linhalaboratorio=mysql_fetch_array($comandolaboratorio)){
  $fketec=$linhalaboratorio['FK_Instituicao'];
  $fkespacofisico=$linhalaboratorio['FK_Laboratorio'];
  $cursolab=$linhalaboratorio['PK_CodLaboratorio'];
  
   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $sqlcurso="select * from tbl_espaco_curso where `FK_espaco`='$cursolab'";
  $comandocurso=mysql_query($sqlcurso);
  $linhacurso=mysql_fetch_array($comandocurso);
  $codcur=$linhacurso['FK_curso'];

$sqlcur="select * from tbl_curso where PK_CodCurso='$codcur'";
$comandocur=mysql_query($sqlcur);
$linhacur=mysql_fetch_array($comandocur);
	   
  
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

  $linhaetec=mysql_fetch_array($comandoetec)
	  
	?>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td><?php if($supervisor==""){ ?><a style="color:#333" href="Frm_EspacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php } echo $linhaetec["Codigo_etec"];?></td>
    <td><?php if($supervisor==""){ ?><a style="color:#333" href="Frm_EspacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php } echo $linhaetec["Etec"];?></td>
    <td><?php if($supervisor==""){ ?><a style="color:#333" href="Frm_EspacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php } echo $linhalaboratorio["Capacidade"];?></td>
    <td><?php if($supervisor==""){ ?><a style="color:#333" href="Frm_EspacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php } echo utf8_encode($linhalaboratorio["Area"]);?></td>
   <?php
  $sqlcount="select COUNT('FK_espaco') from tbl_espaco_curso where `FK_espaco`='$cursolab'";
  $comandocount=mysql_query($sqlcount);
  $linhacount=mysql_fetch_array($comandocount); ?>
 <td onclick="window.open('Frm_Curso.php?espaco=<?php echo $cursolab;?>','janela1','toolbar=no,location=no,directories=no,status=no,scrollbars=yes,menubar=no,resizable=yes,copyhistory=no,width=200,height=200,screenX=300,screenY=300,left=700,top=300');"><a><?php echo $linhacount["COUNT('FK_espaco')"];?></a></td>
  </tr>
  <?php } ?>
    </table>
  <table width="933" border="0" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="frm_relatoriolaboratorio.php?us=<?php //$us=base64_encode($us); 
	echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
    <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>