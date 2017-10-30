<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
ini_set('max_execution_time','999999999');

if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<title>Login Etec - Mapeamento</title>
<?php

	?>
<?php include"topo.php";
include("testemenu.php");
include "menu.php";
	include "conexao.php";
$us= base64_decode($us);

$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="right"><a href="frm_Cadastrologinetec.php?us=<?php echo base64_encode($us); ?>&amp;acao=adc"><img src="novo.png" alt="" width="24" height="24" border="0" /></a></td>
    </tr>
  </table>
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>  
    <tr align="center">
      <th width="277"><strong>Etec</strong></th>
      <th width="174"><strong>Login</strong></th>
      <th width="179"><strong>Nível de Acesso</strong></th>
      <th><strong>Editar</strong></th>
      <th><strong>Excluir</strong></th>
    </tr>
   </thead>
   <tbody> 	
	<?php   
if ($medio=="Administrador"){
	
 $sql="select * from tbl_usuario";
   $comando=mysql_query($sql);
    $us= base64_encode($us);	
  while($linha=mysql_fetch_array($comando)){
  
	?>
    <tr align="center" class="gradeU"><?php 

$fketec=$linha["FK_Etec"];
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

	$sqletec="select * from tbl_etec where`PK_CodEtec`='$fketec'";
	$comandoetec=mysql_query($sqletec);
	$linhaetec=mysql_fetch_array($comandoetec);
	mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
		
	?>
	 <td><?php echo $linhaetec["Etec"];?></td>
	
      <td><?php echo $linha["Login"];?></td>
      <td><?php echo $linha["Nivel_Acesso"];?></td>
      <td width="65"><strong><a href="frm_Cadastrologinetec.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_Login'] ; ?>"><img src="editar.png" alt="" width="24" height="24" border="0" /></a></strong></td>
      <td width="60"><a href="op_cadastrologinetec.php?us=<?php echo $us ?>&amp;ex=sim&amp;cod=<?php echo $linha['PK_Login'] ; ?>"><img src="icone_excluir.gif" width="17" height="17" border="0" /></a></td>
    </tr>
    <?php } ?>
 
      
      <?php   }else{ 
	  $us=base64_encode($us);
	 echo " <script language= 'JavaScript'>

location.href='listaloginusuario.php?us=$us'

</script>";
	 } ?>
  
  </table>
  </div>  
</form>
</body>
<?php include "footer.html"; ?>
</html>