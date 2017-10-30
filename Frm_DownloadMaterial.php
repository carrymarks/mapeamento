<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	//header ("Location: index.php");	
	}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Download Material</title>
<?php 
include "topo.php";
include("testemenu.php");



?>
<link href="css/class.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
include "conexao.php";

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
		
	
?>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0" align="center">
    <tr>
      <td width="51%" align="center" bgcolor="#666666" style="color: #FFF"><strong>Apresentaçao do Projeto</strong></td>
      <td width="49%" align="center" bgcolor="#666666" style="color: #FFF"><strong>Planilha Coleta</strong></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#D6D6D6"><a href="baixar.php?arquivo=Apresentacao.ppt&us=<?php echo $us; ?>"><img src="powerpoint.png" width="30" height="30" border="0" /></a></td>
      <td align="center" bgcolor="#D6D6D6"><a href="baixar.php?arquivo=Coleta.xlsx&us=<?php echo $us; ?>"><img src="excel.png" width="30" height="30" border="0" /></a></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#666666" style="color: #FFF; font-weight: bold;">Ofícios e listas de presença</td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="left" bgcolor="#F3F3F3"><a href="arquivos/oficio_242_2012.pdf" target="_blank"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" style="font-family:Verdana, Geneva, sans-serif" /></a><a href="arquivos/manual.pdf" target="_blank">Manual do mapeamento</a></tr>
    <tr>
      <td height="35" colspan="2" align="left" bgcolor="#D6D6D6"><a href="arquivos/oficio_242_2012.pdf" target="_blank"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" style="font-family:Verdana, Geneva, sans-serif" /></a><a href="arquivos/oficio_090_2013.pdf" target="_blank">Oficio  090/2013 – GFAC</a></tr>
    <tr>
      <td height="35" colspan="2" align="left" bgcolor="#F3F3F3"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" style="font-family:Verdana, Geneva, sans-serif" /><a href="arquivos/oficio_091_2013.pdf">Oficio  091/2013 – GFAC</a></tr>
    <tr>
    <td height="35" colspan="2" align="left" bgcolor="#D6D6D6"><a href="arquivos/oficio_242_2012.pdf" target="_blank"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" style="font-family:Verdana, Geneva, sans-serif" /></a><a href="arquivos/oficio_242_2012.pdf" target="_blank">Ofício 242.2012 - Cetec Grupos com lista de presença</a></tr>
    <tr>
      <td height="35" colspan="2" align="left" bgcolor="#F3F3F3"><a href="arquivos/oficio_243_2012.pdf" target="_blank"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" /></a><a href="arquivos/oficio_243_2012.pdf" target="_blank">Ofício 243.2012 - Cetec Grupos - com lista de presença</a></tr>
    <tr>
      <td height="35" colspan="2" align="left" bgcolor="#D6D6D6"><a href="arquivos/oficio_244_2012.pdf" target="_blank"><img src="imagens/pdf.png" alt=".PDF" width="32" height="32" border="0" /></a><a href="arquivos/oficio_244_2012.pdf" target="_blank">Ofício 244.2012 - Cetec.Grupos - com lista de presença </a>
      <?php include "footer.html"; ?></td>
    </tr>
  </table>
</form>
</body>
</html>