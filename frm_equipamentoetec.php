<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Relatório - Mapeamento</title>
<?php

?>
<?php include "conexao.php";
include "topo.php";
include("testemenu.php");

if(isset($_GET['codetec'])){
$codetec=$_GET['codetec'];	
	
}else{
	
$codetec='';	
	}
$us= base64_decode($us);

$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$fketec=$linhap['FK_Etec'];
	$us=base64_encode($us);
if ($medio=="Administrador"){
	include "menu.php";
	}else{
	$us=base64_encode($us);
include ("menu_usuario.php");

		}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php 
include "conexao.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];

$etecrel='';
	

?>
<form id="form1" name="form1" method="post" action="op_equipamentoetec.php?us=<?php //$us= base64_decode($us); 
echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><strong>Relatório Equipamento Etec</strong></td>
    </tr>
    <tr>
      <td width="665" align="left"><strong>Etec</strong></td>
      <td width="253">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><label>
        <select name="txt_etec" id="txt_etec" >
          <option value="" <?php if (!(strcmp("", $codetec))) {echo "selected=\"selected\"";} ?>></option>
          <?php
 mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		if ($medio!="Administrador"){
		  $sqletecre="select * from tbl_etec where `PK_CodEtec`='$fketec' order by Etec";
		  $comandoetecre=mysql_query($sqletecre);
		  $us= base64_encode($us);
		  $linhaetecre=mysql_fetch_array($comandoetecre);
		  }else{	
		  $sqletecre="select * from tbl_etec order by Etec";
		  $comandoetecre=mysql_query($sqletecre);
		  $us= base64_encode($us);
		  
			  
		  
			  }
  while($linhaetecre=mysql_fetch_array($comandoetecre)){
		?>
          <option value="<?php echo $linhaetecre['PK_CodEtec']?>" value="<?php echo $linhaetecre['PK_CodEtec']?>"<?php if (!(strcmp($linhaetecre['PK_CodEtec'],$etecrel))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp($linhaetecre['PK_CodEtec'], $codetec))) {echo "selected=\"selected\"";} ?>>
          <?php echo $linhaetecre['Etec']?>
          </option>
          <?php }
				
			?>
          </select>
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="Relatório" id="Relatório" value="Pesquisar" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
<?php 
include "footer.html";
?>
</html>

