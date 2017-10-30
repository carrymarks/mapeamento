<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Relatório - Mapeamento</title>
<head><?php include "conexao.php";
include "topo.php";
include "testemenu.php";
include "menu.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
}
-->
</style></head>

<body>
<?php 
$sqll="select * from tbl_cadastro_equipamento";
$comandoo=mysql_query($sqll);
$linhaa=mysql_fetch_array($comandoo);

$equipamento=$linhaa['Tipo_Equipamento'];

?>
<form id="form1" name="form1" method="post" action="op_relatorioetecequipamento.php?us=<?php //$us= base64_decode($us); 
echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td width="924" align="left"><strong>Relatório Equipamento</strong></td>
    </tr>
    <tr>
      <td align="left"><select name="txt_equipamento" id="txt_equipamento" style="width:800px">
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
      <td align="left"><input type="submit" name="Relatório" id="Relatório" value="Pesquisar" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
<?php include "footer.html"; ?>
</html>