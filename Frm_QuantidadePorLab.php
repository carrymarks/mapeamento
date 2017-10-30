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

?>

<body>
<table border='1' width='930' border="1" cellpadding="0" cellspacing="0">
  <tr style="background-color:#D6D6D6;color:#FFFFFF;font-family:verdana">
    <td>Código Etec</td>
    <td>Instituição</td>
    <td>Nome Espaço Físico</td>
    <td width='80px'>Qnt. de Laboratórios</td>
  </tr>
  <?php

 
  $sqllab="select distinct(tbl_espaco_fisico.FK_Laboratorio),tbl_etec.Etec,tbl_etec.Codigo_etec,tbl_espaco_fisico.FK_Laboratorio,tbl_cadastrolaboratorio.Nome_Laboratorio,tbl_espaco_fisico.FK_Instituicao,tbl_cadastrolaboratorio.PK_CodLaboratorio from tbl_espaco_fisico inner join tbl_etec on tbl_espaco_fisico.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio order by tbl_etec.Etec";
  $qrylab=mysql_query($sqllab);
  $totaltotal=0;
  while($linhalab=mysql_fetch_array($qrylab)){

    $sqlcontlab="select count(tbl_espaco_fisico.FK_Laboratorio) as totaltotal from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where FK_Instituicao='".$linhalab['FK_Instituicao']."' and tbl_cadastrolaboratorio.PK_CodLaboratorio='".$linhalab['FK_Laboratorio']."'";
    $qrycontlab=mysql_query($sqlcontlab);
    $linhacontlab=mysql_fetch_array($qrycontlab);

    $TOTALLAB=$linhacontlab['totaltotal'];
    $totaltotal=$totaltotal+$TOTALLAB;
  ?>
  <tr>
    <td><?php echo $linhalab['Codigo_etec']; ?></td>
    <td><?php echo $linhalab['Etec']; ?></td>
    <td><?php echo $linhalab['Nome_Laboratorio'];?></td>
    <td><?php echo $TOTALLAB; ?></td>
  </tr> 
   <?php
}
?>
  <tr>
    <td></td>
    <td align="right" colspan="3">Total :<?php echo $totaltotal; ?></td>
  </tr> 
</table>

</body>
</html>