<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
ini_set('max_execution_time','999999999');
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Lista Laboratório - Mapeamento</title>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
</head>
<?php
?><?php  include "topo.php";
include("testemenu.php");
include "conexao.php";
 
 
$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];
$us=base64_encode($us);	
if($medio=="Administrador"){

include ("menu.php");

	}else{
$us=base64_encode($us);
include ("menu_usuario.php");

		}

?>
<script language="JavaScript">
function abrir(URL) {

  var width = 150;
  var height = 250;

  var left = 99;
  var top = 99;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
<form id="form1" name="form1" method="post" action="Op_consultalaboratorio.php">
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>  
    <tr align="center" bgcolor="#D6D6D6">
      <th width="144"><strong>Etec</strong></th>
      <th width="154"><strong>Laboratório</strong></th>
      <th width="77"><strong>Área</strong></th>
      <th width="153"><strong>Capacidade de Alunos</strong></th>
      <th width="194"><strong>Quantidade de Bancadas</strong></th>
      <th width="101"><strong>Foto</strong></th>
      <th width="78"><strong>Visualizar</strong></th>
      			
    </tr>
    </thead>
    <tbody>
    <?php 
 
   if (isset($_GET['us'])){
	$us=$_GET['us'];   }
  $us= base64_decode($us);
  
  if(!isset($_SESSION)) 
{ 
session_start(); 
} 
  if ($medio=="Administrador"){
	 $pesquisaa = $_SESSION['pesquisa'];
	if ($pesquisaa!=""){
	$sql="SELECT * FROM tbl_espaco_fisico as m inner join  tbl_cadastrolaboratorio as e on m.FK_Laboratorio = e.PK_CodLaboratorio where 
 m.Descricao like '".$pesquisaa."%' order by FK_Instituicao";
	$comando=mysql_query($sql) or die (mysql_error());
		 $us= base64_encode($us);
	 }else{
	$sql="select * from tbl_espaco_fisico order by FK_Instituicao";
	$comando=mysql_query($sql);
	 $us= base64_encode($us);
	}
	
	
}else{
	 $pesquisaa = $_SESSION['pesquisa'];
 
 if ($pesquisaa!=""){
	$sql="SELECT * FROM tbl_espaco_fisico as m inner join tbl_cadastrolaboratorio as e on m.FK_Laboratorio = e.PK_CodLaboratorio where 
 m.Descricao like '".$pesquisaa."%' and m.FK_Instituicao ='$usu' ";
	$comando=mysql_query($sql);
		 $us= base64_encode($us);
	 }else{

	$sql="select * from tbl_espaco_fisico where `FK_Instituicao`='$usu' order by FK_Laboratorio";
	$comando=mysql_query($sql);
	 $us= base64_encode($us);
	}
	}
	
   while($linha=mysql_fetch_array($comando)){
	  ?>
    <tr align="center" class="gradeU"><?php 
	$fkins=$linha["FK_Instituicao"];
	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	$sqlins="select * from tbl_etec where PK_CodEtec='$fkins'";
	$comandoins=mysql_query($sqlins);
	$linhains=mysql_fetch_array($comandoins);
		mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
	
	$fklab=$linha["FK_Laboratorio"];
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	$sqllab="select * from tbl_cadastrolaboratorio where PK_CodLaboratorio='$fklab'";
	$comandolab=mysql_query($sqllab);
	$linhalab=mysql_fetch_array($comandolab);

	?>
      <td width="300"><font size="-1"><?php echo $linhains["Etec"];?></font></td>
      <td width="200"><font size="-1"><?php echo $linhalab["Nome_Laboratorio"];?></font></td>
      <td><font size="-1"><?php echo $linha["Area"];?></font></td>
      <td><font size="-1"><?php echo $linha["Capacidade"];?></font></td>
      <td><font size="-1"><?php echo $linha["Quantidade_Bancadas"];?></font></td>
      <td><strong><a href="<?php if($linha["Imagem"]==''){echo "Sem_imagem.gif";}else{echo $linha["Imagem"];}?>" rel="lightbox"><img src="iconeAlbum.gif" alt="" width="50" height="32" border="0" /></a></strong></td>
                   <td><strong><a href="frm_espacoFisico.php?us=<?php echo $us ?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodLaboratorio'] ; ?>&amp;codetec=<?php echo $linha['FK_Instituicao']; ?>"><img src="editar.png" alt="" width="24" height="24" border="0" /></a></strong></td>
                   
    </tr>
    <?php } ?>
  </table>
  </div>
   <?php include "footer.html"; ?> 
</form>
</body>
</html>