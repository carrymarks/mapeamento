<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Cadastro Equipamento - Mapeamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
}
-->
</style></head>

<body>
<?php
include "conexao.php";
include "topo.php";
include("testemenu.php");
include "conexao.php";

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];
	$us=base64_encode($us);
	$us=base64_encode($us);
if($medio!="Administrador"){

include ("menu_usuario.php");
	//$us=base64_decode($us);

	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
		

if(isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod'])){
$cod=$_GET['cod'];
		}
	if(isset($_GET["acao"])){
		$acao=$_GET["acao"];
		}

if ($acao!="adc"){
		
	$sql="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$cod'";
	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		$comando=mysql_query($sql);
		$linha=mysql_fetch_array($comando);
		$eqp=$linha['Tipo_Equipamento'];
	
	}else {		
		$eqp='';
		
		}

?>
<form id="form3" name="form3" method="post" action="Op_tipoequipamento.php?us=<?php $us= base64_decode($us); echo $us ?>">
  <table width="933" border="0">
    <tr align="left" bgcolor="#D6D6D6">
      <td width="294"><strong>Cadastro Tipo Equipamento</strong></td>
    </tr>
    <tr>
      <td align="left"><label>
        <input name="txt_eqp" type="text" id="txt_eqp" value="<?php echo $eqp;?>" />

      </label></td>
    </tr>
    <tr>
      <td align="left"><label>
        <input type="submit" name="vvh" id="vvh" value="Salvar" />
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao ?>" />
             <?php if (isset($_GET['cod'])){ ?>
        <input name="cod" type="hidden" id="cod" value="<?php echo $cod ?>" />
        <?php } ?>
      </label></td>
    </tr>
  </table>
</form>

</body>
</html>