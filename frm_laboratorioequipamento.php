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

<body>
<?php 
include "conexao.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];
$us=base64_decode($us);
$etecrel='';
	
$sqll="select * from tbl_cadastro_equipamento";
$comandoo=mysql_query($sqll);
$linhaa=mysql_fetch_array($comandoo);

$equipamento=$linhaa['Tipo_Equipamento'];

?>
<form id="form1" name="form1" method="post" action="Op_laboratorioequipamento.php?us=<?php $us=base64_encode($us);echo $us ?>">
  <table width="933" border="0">
    <tr align="center">
      <td colspan="2"><strong>Relatório Laboratório por Equipamento</strong></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="100"><strong>Equipamentos</strong></td>
      <td width="817">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><select name="txt_equipamento" id="txt_equipamento" style="width:500px">
        <?php 
	  $sql="select * from tbl_cadastro_equipamento order by Tipo_Equipamento";
	  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	  $comando=mysql_query($sql);
	  while($linha=mysql_fetch_array($comando)){	  
	  ?>
        <option value="<?php echo $linha['PK_CadastroEquipamento']?>" <?php if (!(strcmp($linha['PK_CadastroEquipamento'],$equipamento))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Tipo_Equipamento']?></option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="button" id="button" value="Pesquisar" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
  </table>
</form>
</body>
</html>