<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="mbcsmbmenu.css" type="text/css" />
</head>
<body>
<?php
include "conexao.php";
error_reporting(0);
ini_set("display_errors", 0 );
$usr=$_REQUEST['usr'] ;
    $us=base64_decode($us);

	$sqlSuper="select * from tbl_usuario where `PK_Login`='$us'";
	$comandoSuper=mysql_query($sqlSuper);
	$linhaSuper=mysql_fetch_array($comandoSuper) or die(mysql_error());
	$etec =$linhaSuper['FK_Etec'];
	$medio=$linhaSuper['Nivel_Acesso'];
	$supervisor=$linhaSuper['Supervisor'];
	
	$us=base64_encode($us);	

?>
<ul id="ebul_mbmenu_2" class="ebul_mbmenu" style="display: none;">
<?php if($medio!="Comum"){ ?><li><a title="">Tipo</a> 
  <ul id="ebul_mbmenu_2_1">
  <li><a <?php
  if($supervisor==""){  
  ?>href="listatipoequipamento.php?us=<?php echo $us ?>"<?php } ?> title="">Equipamento</a></li>
  <li><a 
  <?php
  if($supervisor==""){  
  ?>
  href="listacadastrolaboratorio.php?us=<?php echo $us ?>" <?php } ?> title="">Espaço Físico</a></li>
  </ul></li><?php } ?>
<li><a
<?php
  if($supervisor==""){  
  ?>
 href="listaequipamento.php?us=<?php  echo $us ?>" <?php } ?> title="">Equipamento</a></li>
<li><a
<?php
  if($supervisor==""){  
  ?>
 href="listaespacofisico.php?us=<?php echo $us ?>" <?php } ?> title="">Espaço Físico</a></li>
<li><a
<?php
  if($supervisor==""){  
  ?>
 href="frm_espaco_fisico_novo.php?us=<?php echo $us ?>" <?php } ?> title="">Espaço Físico (NOVO)</a></li>
<?php if($medio!="Comum"){ ?><li><a 
<?php
  if($supervisor==""){  
  ?>
href="listaunidade.php?us=<?php echo $us; ?>" <?php } ?> title="">Unidade</a></li><?php } ?>
<li><a
<?php
  if($supervisor==""){ 
      if($medio!="Comum"){  
  ?>
 href="listaloginetec.php?us=<?php echo $us ?>" <?php }else{ ?> href="listaloginusuario.php?us=<?php echo $us ?>"  <?php } } ?> title="">Login</a></li>
</ul>
<ul id="ebul_mbmenu_3" class="ebul_mbmenu" style="display: none;">
<li><a

 href="Frm_PesquisaEquipamento.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>"  title="">Equipamento</a></li>
<li><a

 href="frm_consultalaboratorio.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>"  title="">Espaço Físico</a></li>
</ul>
<ul id="ebul_mbmenu_4" class="ebul_mbmenu" style="display: none;">
<li><a title="">Equipamento</a>
  <ul id="ebul_mbmenu_4_9">
  <li><a href="frm_detalheEquipamento.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Relatório Detalhado</a></li>
  <li><a href="frm_equipamentoetec.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Equipamento por Etec</a></li>
  <li><a href="frm_relatorioeteclista.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Equipamento por Laboratório e Etec</a></li>
  <li><a href="frm_relatorioetecequipamento.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Relatório Etec por  Equipamento</a></li>
  </ul></li>
<li><a title="">Espaço Físico</a>
  <ul id="ebul_mbmenu_4_14">
  <li><a href="frm_relatoriocurso.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Laboratório por Cursos</a></li>
  <li><a href="frm_relatorioeteclaboratorio.php?us=<?php echo $us ?>&usr=<?php echo $_SESSION['user'] ?>" title="">Laboratórios por Etec</a></li>
  <li><a href="frm_relatoriolaboratorio.php?us=<?php echo $us?>&usr=<?php echo $_SESSION['user'] ?>" title="">Etec por Laboratório</a></li>
   <li><a href="Frm_QuantidadeRelLaboratorio.php?us=<?php echo $us?>&usr=<?php echo $_SESSION['user'] ?>" title="">Quantidade de Laboratórios</a></li>
   <li><a href="Frm_QuantidadePorLab.php?us=<?php echo $us?>&usr=<?php echo $_SESSION['user'] ?>" title="">Quantidade de Determinados Laboratórios</a></li>
  
  </ul></li>
</ul>
<center>
<ul id="mbmenuebul_table" class="mbmenuebul_menulist" style="width: 938px; height: 35px;">
  <li class="spaced_li"><a href="home.php?us=<?php echo $us; ?>&usr=<?php echo $_SESSION['user'] ?>"><img id="mbi_mbmenu_1" src="mb_home.png" name="mbi_mbmenu_1" width="100" height="35" style="vertical-align: bottom;" border="0" alt="Home" title="" /></a></li>

  <li class="spaced_li"><?php if($supervisor==""){ ?><a><img id="mbi_mbmenu_2" src="mb_cadastro.png" name="mbi_mbmenu_2" width="100" height="35" style="vertical-align: bottom;" border="0" alt="Cadastro" title="" /><?php } ?></a></li>
  <li class="spaced_li"><a><img id="mbi_mbmenu_3" src="mb_consulta.png" name="mbi_mbmenu_3" width="100" height="35" style="vertical-align: bottom;" border="0" alt="Consulta" title="" /></a></li>

  <li class="spaced_li"><a><img id="mbi_mbmenu_4" src="mb_relat_rio.png" name="mbi_mbmenu_4" width="100" height="35" style="vertical-align: bottom;" border="0" alt="Relatório" title="" /></a></li>
  <li class="spaced_li"><a><img id="mbi_mbmenu_5" src="ebbtmbmenu5.png" name="mbi_mbmenu_5" <?php if($supervisor!=""){ ?>width="530" <?php }else{ ?> width="430" <?php } ?> height="35" style="vertical-align: bottom;" border="0" alt="" title="" /></a></li>
  <li><a href="index.php"><img id="mbi_mbmenu_6" src="mb_sair.png" name="mbi_mbmenu_6" width="100" height="35" style="vertical-align: bottom;" border="0" alt="Sair" title="" /></a></li>
</ul>
<script type="text/javascript" src="mbjsmbmenu.js"></script></body>
</html>
