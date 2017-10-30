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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Lista Cadastro Laboratório - Mapeamento</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	color: #666;
}
-->
</style>
<style type="text/css" title="currentStyle">
			@import "Listagem Arquivos/media/css/demo_page.css";
			@import "Listagem Arquivos/media/css/demo_table_jui.css";
			@import "Listagem Arquivos/themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>
		<script type="text/javascript" language="javascript" src="Listagem Arquivos/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="Listagem Arquivos/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>

</head><?php 
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

$us= base64_decode($us);

mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

		
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];



?>
<body>
<div class="demo_jui" style="max-width:933px">
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0" class="display" id="example">
  <thead>
	<tr>
      <th width="881"><strong>Laboratório</strong></th>
      <th width="42"><strong>Editar</strong></th>
    </tr>
   </thead>
   <tbody> 
    <?php 

	
	$sql="select * from  tbl_cadastrolaboratorio order by Nome_Laboratorio";
  $comando=mysql_query($sql)or die(mysql_error());
  $us= base64_encode($us);
  while($linha=mysql_fetch_array($comando)){
  
	?>
    <tr class="gradeU" align="left">
      <td><font size="-1"><?php echo $linha["Nome_Laboratorio"];?></font></td>
      <td><strong><a href="frm_Cadastrolab.php?us=<?php echo $us ?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodLaboratorio'] ; ?>"><img src="editar.png" alt="" width="24" height="24" /></a></strong></td>
    </tr>
    <?php } ?>
    <tr class="gradeU" align="left">
      <td>&nbsp;</td>
      <td><a href="frm_Cadastrolab.php?us=<?php echo $us ?>&amp;acao=adc&amp;cod=<?php echo $linha['PK_CodLaboratorio'] ; ?>"><img src="novo.png" alt="" width="24" height="24" /></a></td>
    </tr>
  </table>
<?php 

include "footer.html";
?>   
  </div>
</form>
</body>
</html>