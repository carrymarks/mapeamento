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
<title>Relatório - Mapeamento</title>
</head>

<body>
<?php 
include "topo.php";
include "testemenu.php";

include "conexao.php";

if (isset($_GET['acao']))
$acao=$_GET['acao'];

if(isset($_GET['us'])){
$us=$_GET['us'];}

$us=base64_decode($us);




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

$sqlUsuario="select * from tbl_usuario where `PK_Login`=$us";
$qryUsuario=mysql_query($sqlUsuario);
$linhaUsuario=mysql_fetch_array($qryUsuario);
$fkinst=$linhaUsuario['FK_Etec'];

$us=base64_encode($us);
$us=base64_encode($us);
include "menu_usuario.php";

?>
<table width="933" border="0">
  <tr>
    <td colspan="6" align="center" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
  </tr>
  <tr>
    <td width="14">&nbsp;</td>
    <td width="188"><h2><strong>Equipamento</strong></h2></td>
    <td width="236"><h2>&nbsp;</h2></td>
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
  <tr align="center">
    <td>&nbsp;</td>
    <td bgcolor="#F7F7F6"><strong>Quantidade Equipamento</strong></td>
    <td colspan="4" bgcolor="#F7F7F6"><strong>Local Alocado</strong></td>
  </tr>
  <?php   	
	$sqlMaterial="select * from tbl_material where FK_Instituicao=$fkinst and FK_Equipamento=$equipamento";
	$qryMaterial=mysql_query($sqlMaterial);
	while($linhaMaterial=mysql_fetch_array($qryMaterial)){
		
	 

	?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php echo $linhaMaterial["Quantidade"]; ?></td>
    <td colspan="4" align="center"><?php echo $linhaMaterial["Descricao"];?></td>
  </tr>
  <?php } ?>
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
    <td>&nbsp;<a href="frm_laboratorioequipamento.php?us=<?php echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
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
    <td></td>
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