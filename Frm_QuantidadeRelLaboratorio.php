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
<script>
function zerarparametro(){
	
	document.getElementById('txt_espacofisico').value="";
	document.forms["form1"].submit();
	}


</script>
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

//if(isset($_GET['acao']))
//$acao =$_GET['acao'];


//if ($acao!="adc"){


$equipamento='';

$laboratorio='';

$etecrel='';
	

?>
<form id="form1" name="form1" method="post" action="Frm_QuantidadeLaboratorio.php?us=<?php //$us= base64_decode($us); 
echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td align="center"><strong>Relatório</strong></td>
    </tr>
    <tr>
      <td align="left"><strong>Espaço Físico</strong></td>
    </tr>
    <tr>
      <td align="left"><label>
        <select name="txt_espacofisico" id="txt_espacofisico">
          <option value=""><?php echo "Todos";?></option>
          <?php
		  	      mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
			  
	$sql="select * from tbl_espaco_fisico";
	$comando=mysql_query($sql) ;
	$linhaa=mysql_fetch_array($comando);
	$fkespacofisico=$linhaa['FK_Laboratorio'];
	
	$sqlaqui="select * from tbl_cadastrolaboratorio";
	$comandoaqui=mysql_query($sqlaqui);
	
  while($linha=mysql_fetch_array($comandoaqui)){
		?>
          <option value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$laboratorio))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Nome_Laboratorio']?></option>
          
          <?php } ?>
          
          
          </select>
      </label></td>
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
  </table>
</form>
<p>&nbsp;</p>
</body>
<?php 
include "footer.html";
?>
</html>

