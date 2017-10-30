<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Cadastro de Unidade</title>
</head>

<body>
<?php
include "topo.php";
include("testemenu.php");
include "conexao.php";


if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	header ("Location: index.php");	}
	
$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];	
	$us=base64_encode($us);

include ("menu.php");



if(isset($_GET['acao'])){
$acao=$_GET['acao'];	
	}
	
if(isset($_GET['cod'])){
$cod=$_GET['cod'];	
	}	


if($acao=="edt"){
$sqlEtec="select * from tbl_etec where PK_CodEtec='$cod'";
$qryEtec=mysql_query($sqlEtec);
$linhaEtec=mysql_fetch_array($qryEtec);

$CodEtec=$linhaEtec['Codigo_etec'];	
$CodEtecSede=$linhaEtec['Codigo_etecsede'];
$TipoAtendimento=$linhaEtec['TipoAtendimento'];
$Etec=$linhaEtec['Etec'];
$Municipio=$linhaEtec['Municipio'];
	
	}else{
		
$CodEtec="";	
$CodEtecSede="";	
$TipoAtendimento="";	
$Etec="";	
$Municipio="";	
		
		}

 ?>
<form id="form1" name="form1" method="post" action="Op_CadastroEtec.php">
  <table width="933" border="0" align="center">
    <tr>
      <td colspan="3" align="center" bgcolor="#D6D6D6"><strong>Cadastro Unidade</strong></td>
    </tr>
    <tr>
      <td width="38">&nbsp;</td>
      <td width="163">&nbsp;</td>
      <td width="718">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Unidade</strong></td>
      <td><label for="txt_unidade"></label>
      <input name="txt_unidade" type="text" id="txt_unidade" value="<?php echo $Etec; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Município</strong></td>
      <td><label for="txt_municipio"></label>
      <input name="txt_municipio" type="text" id="txt_municipio" value="<?php echo $Municipio; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Código da Unidade</strong></td>
      <td><label for="txt_codigounidade"></label>
      <input name="txt_codigounidade" type="text" id="txt_codigounidade" value="<?php echo $CodEtec; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Código Etec Sede</strong></td>
      <td><label for="txt_etecsede"></label>
      <input name="txt_etecsede" type="text" id="txt_etecsede" value="<?php echo $CodEtecSede; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Tipo de Atendimento</strong></td>
      <td><label for="txt_tipoatendimento"></label>
      <input name="txt_tipoatendimento" type="text" id="txt_tipoatendimento" value="<?php echo $TipoAtendimento; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Salvar" />
      <input type="reset" name="button2" id="button2" value="Limpar" />
      <input name="acao" type="hidden" id="acao" value="<?php if(isset($_GET['acao'])){$acao=$_GET['acao']; echo $acao;} ?>" />
      <input name="cod" type="hidden" id="cod" value="<?php if(isset($_GET['cod'])){$cod=$_GET['cod']; echo $cod;} ?>" /></td>
      <td><input name="us" type="hidden" id="us" value="<?php if(isset($_GET['us'])){$us=$_GET['us']; echo $us;} ?>" /></td>
    </tr>
</table>
  <center><?php include "footer.html"; ?>
</form>
</body>
</html>