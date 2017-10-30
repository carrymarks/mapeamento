<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)){
	session_start(); 
	unset($_SESSION['dados_equipamento']);
} 
if ($_SESSION['logado'] == 1) {
	header ("Location: index.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Home - Mapeamento</title>
<?php
include "conexao_Geral.php";
include "topo.php";
include("testemenu.php");
include ("menu.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Mapeamento</title>
<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>
<script language="javascript" type="text/javascript">
function seleciona_submenu(a){
	$("#submenu th").addClass("inativo");
	$("#submenu a").removeAttr("href");
	$($("#submenu th").get(a)).addClass("selecionado");
	$($("#submenu th").get(a)).removeClass("inativo");
}
</script>
<style type="text/css">
#submenu .selecionado, #submenu .selecionado a, #submit{background-color: #96211a;color: white;}
#submit{width:100px}
#submenu .inativo, #submenu .inativo a{background-color: #f5f5f4;color: white;}
#submenu th{background-color: #E2E2DE;color: black;}
#ln_justificativa{display:none;}
#submenu a{color:black;text-decoration: none;}
</style></head>
<body>
	<br />
	<br />
	<table style="width:700px; margin:0; padding:0;" id="submenu" align="center">
		<tr align="center" bgcolor="#E2E2DE">
			<th width="140px"><a href="frm_espaco_fisico_novo_identificacao.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>">Identifica&ccedil;&atilde;o</a></th>
			<th width="140px"><a href="frm_espaco_fisico_novo_eletrica.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>">El&eacute;trica</a></th>
			<th width="140px"><a href="frm_espaco_fisico_novo_civil.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>">Civil</a></th>
			<th width="140px"><a href="frm_espaco_fisico_novo_seguranca.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>">Seguran&ccedil;a</a></th>
			<th width="140px"><a href="frm_espaco_fisico_novo_utilizacao.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>">Utiliza&ccedil;&atilde;o</a></th>
		</tr>
	</table>
	<br />
	<br />
	<br />