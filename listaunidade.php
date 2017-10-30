<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento Lista de Unidades</title>
<style type="text/css">
body,td,th {
	font-family: "Times New Roman", Times, serif;
	color: #666;
}
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
</head>

<body>
<?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";

ini_set('max_execution_time','999999999');
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

$sqlEtec="select * from tbl_etec order by Etec";
$qryEtec=mysql_query($sqlEtec);




?>
<form id="form1" name="form1" method="post" action="">
  <table width="933">
    <tr bgcolor="#D6D6D6">
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="right" bgcolor="#FFFFFF"><strong><a href="Frm_CadastroEtec.php?acao=adc&amp;us=<?php echo $us; ?>"><img src="novo.png" alt="" width="24" height="24" border="0" /></a></strong></td>
    </tr>
    </table>
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>    
    <tr>
      <th width="393" align="center"><strong>Unidade</strong></th>
      <th width="264" align="center"><strong>Municipio</strong></th>
      <th width="167" align="center"><strong>Tipo de Atendimento</strong></th>
      <th width="89" align="center"><strong>Editar</strong></th>    
    </tr>
   </thead>
   <tbody>   
  
    <?php 
	while($linhaEtec=mysql_fetch_array($qryEtec)){
	?>
    <tr class="gradeU">
      <td align="center"><?php echo $linhaEtec['Etec']; ?></td>
      <td align="center"><?php echo $linhaEtec['Municipio']; ?></td>
      <td align="center"><?php echo $linhaEtec['TipoAtendimento']; ?></td>
      <td align="center"><strong><a href="Frm_CadastroEtec.php?acao=edt&amp;us=<?php echo $us; ?>&amp;cod=<?php echo $linhaEtec['PK_CodEtec']; ?>"><img src="editar.png" alt="" width="24" height="24" border="0" /></a></strong></td>
    </tr>
    <?php } ?>
  </table>
 <?php 

include "footer.html";
?>   
  </div>
</form>
</body>
</html>