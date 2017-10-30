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
<title>Lista Suporte - Mapeamento</title>
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
</head>

<body>
<?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";

if(isset($_GET['us'])){
$us=$_GET['us'];	}

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$etec =$linha['FK_Etec'];
	$medio=$linha['Nivel_Acesso'];
$fketec=$linha['FK_Etec'];
$us=base64_encode($us);
$us=base64_encode($us);

if($medio!="Administrador"){

include "menu_usuario.php";
	}else{	
//echo "$us"; 
$us=base64_decode($us);

include ("menu.php");	

		}	
?>

  <table align="center" width="927" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" align="right"><strong><a href="frm_suporte.php?us=<?php echo $us ?>&amp;acao=adc"><img src="novo.png" alt="" width="24" height="24" border="0" /></a></strong></td>
    </tr>
  </table>

<div class="demo_jui" style="max-width:933px">  
  <table width="100%" border="0" class="display" id="example">
  <thead>  
      <tr>
      <th><strong>Etec</strong></th>
      <th><strong>Usuário</strong></th>
      <th width="208"><strong>Local do Ocorrido</strong></th>
      <th width="62"><strong>Assunto</strong></th>
      <th width="83"><strong>Mensagem</strong></th>
      <th><strong>Editar</strong></th>
      <th><strong>Excluir</strong></th>
      </tr>
    </thead>
    <tbody>
       <?php 
	$sqldados="select * from tbl_suporte";
	$comandodados=mysql_query($sqldados);
	while($linhadados=mysql_fetch_array($comandodados)){
	$suporteetec=$linhadados['FK_Etec'];
	$usuario=$linhadados['FK_Usuario'];
	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		
	$sqletec="select * from tbl_etec where PK_CodEtec='$suporteetec'";
	$comandoetec=mysql_query($sqletec);
	$linhaetec=mysql_fetch_array($comandoetec);
	
	
	$sqlusuario="select * from tbl_usuario where PK_Login='$usuario'";
	$comandousuario=mysql_query($sqlusuario);
	$linhausuario=mysql_fetch_array($comandousuario);
	
	?>
    <tr class="gradeU">
      <td><font size="-1"><?php echo $linhaetec["Etec"];?></font></td>
      <td><font size="-1"><?php echo $linhausuario["Login"];?></font></td>
      <td><font size="-1"><?php echo $linhadados["Erro"];?></font></td>
      <td><font size="-1"><?php
      if($linhadados["Assunto"]==0){
		  echo "Funcionamento do Sistema";
		  }
		  if($linhadados["Assunto"]==1){
		  echo "Suporte para o Sistema";
		  }
		  if($linhadados["Assunto"]==2){
		  echo "Dúvida sobre Preenchimento";
		  }
		  if($linhadados["Assunto"]==3){
		  echo "Dúvida sobre o Projeto";
		  }?></font></td>
      <td><font size="-1"><?php echo $linhadados["Mensagem"];?></font></td>
      <td width="49" align="center"><strong><a href="frm_suporte.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linhadados['PK_CodSuporte'] ; ?>"><img src="editar.png" alt="" width="24" height="24" border="0" /></a></strong></td>
      <td width="52" align="center"><strong><a href="op_suporte.php?us=<?php echo $us?>&amp;ex=sim&amp;cod=<?php echo $linhadados['PK_CodSuporte'] ; ?>"><img src="icone_excluir.gif" alt="" width="17" height="17" border="0" /></a></strong></td>
    </tr>
    <?php } ?>
    </table>
</div>
   <?php include "footer.html"; ?> 

</body>
</html>