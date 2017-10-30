<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");	
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Suporte</title>
<script language="javascript">
/*----------------------------------------------------------------------------
Formatação para qualquer mascara
-----------------------------------------------------------------------------*/
function formatar(src, mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
    src.value += texto.substring(0,1);
  }
}
</script>
<?php 
include "topo.php";
include("testemenu.php");



?>
</head>

<body><?php
include "conexao.php";

if(isset($_GET["acao"]))
$acao=$_GET["acao"];

if(isset($_GET['cod'])){
$cod=$_GET['cod'];	
	}

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$medio=$linha['Nivel_Acesso'];
	
$fketec=$linha['FK_Etec'];
$us=base64_encode($us);
$us=base64_encode($us);



if($medio!="Administrador"){

include ("menu_usuario.php");


	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
		
if($acao!="adc"){
$sql="select * from tbl_abertura where PK_Abertura='$cod'";
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);

$datainicio=explode("-",$linha['Data_Inicio']);
$datainicio=$datainicio[2].'/'.$datainicio[1].'/'.$datainicio[0];
$datafim=explode("-",$linha['Data_Fim']);
$datafim=$datafim[2].'/'.$datafim[1].'/'.$datafim[0];

	}else{
		
$datainicio='';
$datafim='';

	}
		
?>

<form id="form1" name="form1" method="post" action="Op_fechamentoabertura.php?us=<?php $us=base64_decode($us); echo $us;?>">
  <table width="933" border="0">
    <tr>
      <td colspan="2">&nbsp;</td>
      <td><strong>Abertura e Fechamento do Sistema </strong></td>
    </tr>
      <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="49">&nbsp;</td>
      <td width="122" align="left"><strong>Data Início</strong></td>
      <td width="748" align="left"><label>
        <input name="txt_data1" type="text" id="txt_data1" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $datainicio;?>" maxlength="10" />
      </label></td>
    </tr>
  
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Data de Fechamento</strong></td>
      <td align="left"><label for="txt_assunto"></label>
      <input name="txt_data2" type="text" id="txt_data2" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $datafim;?>" maxlength="10" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><label>
        <input type="submit" name="button" id="button" value="Enviar" />
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao;?>" /><input name="cod" type="hidden" id="cod" value="<?php echo $cod;?>" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>