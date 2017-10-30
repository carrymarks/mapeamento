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
<title>Relatório Equipamento- Mapeamento</title>
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

if(isset($_GET['eqp']))
$equipamento=$_GET['eqp'];


$sql="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$equipamento'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);
$codigoeqp=$linha['PK_CadastroEquipamento'];







?>

<body>
<table width="933" border="0">
  <tr>
    <td colspan="6" align="center" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
  </tr>
  <tr>
    <td width="14">&nbsp;</td>
    <td width="172"><h2><strong>Equipamento</strong></h2></td>
    <td width="252"><h2>&nbsp;</h2></td>
    <td width="70">&nbsp;</td>
    <td width="168">&nbsp;</td>
    <td width="231">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="left"><?php echo $linha['Tipo_Equipamento'];?></td>
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
<table width="933" border="1" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td bgcolor="#F7F7F6"><strong>Quantidade de Equipamentos</strong></td>
    <td bgcolor="#F7F7F6"><strong>Etec</strong></td>
    <td bgcolor="#F7F7F6"><strong>Código</strong></td>
    <td bgcolor="#F7F7F6"><strong>Município</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tipo de Atendimento</strong></td>
  </tr>
   <?php   	
  $sqll="select distinct FK_Instituicao from tbl_material where `FK_Equipamento`='$codigoeqp' order by FK_Instituicao";
$comandoo=mysql_query($sqll);
while($linhaa=mysql_fetch_array($comandoo)){
$etecinstituicao=$linhaa['FK_Instituicao'];

  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8'); 

		
 $sqlunica="select distinct (etec) from tbl_etec where `PK_CodEtec`='$etecinstituicao'";
 $comandounica=mysql_query($sqlunica);
 $linhaunica=mysql_fetch_array($comandounica);
		
  $sqletec="SELECT DISTINCT tbl_etec.PK_CodEtec,tbl_etec.Etec,tbl_etec.Municipio,tbl_etec.Codigo_etec,tbl_etec.TipoAtendimento FROM tbl_etec  where `PK_CodEtec`='$etecinstituicao' ";
  $comandoetec=mysql_query($sqletec);
 $linhaetec=mysql_fetch_array($comandoetec);
 mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
		
	 $sqlcont="select SUM(Quantidade) from tbl_material where `FK_Equipamento`='$codigoeqp' and `FK_Instituicao`='$etecinstituicao'";
	$comandocont=mysql_query($sqlcont);
	$linhacont=mysql_fetch_array($comandocont);	

	?>
  <tr>
    <td align="center"><?php echo $linhacont["SUM(Quantidade)"];?></td>
    <td><?php echo $linhaunica["etec"];?></td>
    <td><?php echo $linhaetec["Codigo_etec"];?></td>
    <td><?php echo $linhaetec["Municipio"];?></td>
    <td><?php echo $linhaetec["TipoAtendimento"];?></td>
  </tr>
 <?php } ?>
 </table>
 <table width="933" border="0">
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
    <td>&nbsp;<a href="frm_relatorioetecequipamento.php?us=<?php echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
    <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
</body>
</html>