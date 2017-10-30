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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatório - Mapeamento</title>
<style type="text/css">
<!--
h2 {
	font-size: 18px;
	color: 666;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Times New Roman, Times, serif;
}
-->
</style></head>
<?php
?>
<body>
<?php 
include "topo.php";
include "conexao.php";
include "testemenu.php";

if (isset($_GET['acao']))
$acao=$_GET['acao'];

if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['codetec']))
$codetec=$_GET['codetec'];

if(isset($_POST['codetec']))
$codetec=$_POST['codetec'];	

if (isset($_GET['lab'])){
$laboratorio=$_GET['lab'];
}

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

$sql="select * from tbl_etec where `PK_CodEtec`='$codetec'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);
mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
$us= base64_decode($us);




?>


<div style="overflow:auto;height:1000px;width:930px "> 
<table width="4622" border="0">
  <tr align="left">
    <td colspan="23" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="198" align="left"><h2>Etec</h2></td>
    <td width="204">&nbsp;</td>
    <td width="166">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="14">&nbsp;</td>
    <td colspan="3" align="left"><strong>Etec: </strong><?php echo $linha["Etec"];?></td>
    <td width="112">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Código: </strong><?php echo $linha["Codigo_etec"];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Município: </strong><?php echo $linha["Municipio"];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Tipo de Atendimento: </strong><?php echo $linha["TipoAtendimento"];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <table width="4622" border="1" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td bgcolor="#F7F7F6"><strong>Laboratório</strong></td>
    <td bgcolor="#F7F7F6"><strong>Descrição</strong></td>
    <td bgcolor="#F7F7F6"><strong>Capacidade de alunos</strong></td>
    <td bgcolor="#F7F7F6"><strong>Área (m²)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tipo de Revestimento</strong></td>
    <td bgcolor="#F7F7F6"><strong>Nome do Ambiente Alocado</strong></td>
    <td bgcolor="#F7F7F6"><strong>Observações Gerais</strong></td>
    <td bgcolor="#F7F7F6"><strong>Medida da Porta (altura)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Medida da Porta (largura)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Quantidade de Portas</strong></td>
    <td bgcolor="#F7F7F6"><strong>Pé Direito (em metros)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tipo de Iluminação</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tipo de Construção</strong></td>
    <td bgcolor="#F7F7F6"><strong>Quantidade de Bancadas</strong></td>
    <td bgcolor="#F7F7F6"><strong>Quantidade de Luminárias</strong></td>
    <td bgcolor="#F7F7F6"><strong>Possui Exaustor</strong></td>
    <td bgcolor="#F7F7F6"><strong>Equipamentos de Segurança</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tomada 200v (trifase)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tomada 220v (bifase)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Tomada 110v (monofase)</strong></td>
    <td bgcolor="#F7F7F6"><strong>Quadro de Energia</strong></td>
    <td bgcolor="#F7F7F6"><strong>Cursos que Ultilizam</strong></td>
  </tr>
  <?php  
  
  $us=base64_encode($us);
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $sqllaboratorio="select * from tbl_espaco_fisico where `FK_Instituicao`='$codetec'";
  $comandolaboratorio=mysql_query($sqllaboratorio);
  while($linhalaboratorio=mysql_fetch_array($comandolaboratorio)){
  $fketec=$linhalaboratorio['FK_Instituicao'];
  $fkespacofisico=$linhalaboratorio['FK_Laboratorio'];
  $cursoultiliza=$linhalaboratorio['PK_CodLaboratorio'];
  
 
  
  $sqlcurso="select * from tbl_espaco_curso where `FK_espaco`='$cursoultiliza'";
  $comandocurso=mysql_query($sqlcurso);
  $linhacurso=mysql_fetch_array($comandocurso);
  $nomecurso=$linhacurso['FK_curso'];


  
  $sqltipolaboratorio="select * from tbl_cadastrolaboratorio where `PK_CodLaboratorio`='$fkespacofisico'";
  $comandotipolaboratorio=mysql_query($sqltipolaboratorio);
  $linhatipolaboratorio=mysql_fetch_array($comandotipolaboratorio);
  $pktipolaboratorio=$linhatipolaboratorio['PK_CodLaboratorio'];
	   
  
	  mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
	   
  $sqletec="select * from tbl_etec where `PK_CodEtec`='$fketec'";
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $comandoetec=mysql_query($sqletec);

  $linhaetec=mysql_fetch_array($comandoetec)
	  
	?>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhatipolaboratorio['Nome_Laboratorio'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['AmbienteDescricao'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Capacidade'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Area'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Tipo_Revestimento'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Descricao'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Obs_Geral'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Medida_PortaAltura'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Medida_PortaLargura'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Quantidade_Portas'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Pe_Direito'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Tipo_Iluminacao'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['tipo_construcao'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Quantidade_Bancadas'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Quantidade_Luminarias'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Exaustor'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php if($linhalaboratorio['Equipamento_Seguranca']==1){
		echo "Extintor";
		}elseif($linhalaboratorio['Equipamento_Seguranca']==2){
		echo "Luz de Emergência";
		}elseif($linhalaboratorio['Equipamento_Seguranca']==3){
		echo "Ambos";	
		}?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Tomada200v'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Tomada220v'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Tomada110v'];?></td>
    <td ><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhalaboratorio['FK_Instituicao'];?>"><?php echo $linhalaboratorio['Quadro_Energia'];?></td>
    <?php 
  $sqlcount="select COUNT('FK_espaco') from tbl_espaco_curso where `FK_espaco`='$cursoultiliza'";
  $comandocount=mysql_query($sqlcount);
  $linhacount=mysql_fetch_array($comandocount); ?>
 <td onclick="window.open('Frm_Curso.php?espaco=<?php echo $cursoultiliza;?>','janela1','toolbar=no,location=no,directories=no,status=no,scrollbars=yes,menubar=no,resizable=yes,copyhistory=no,width=200,height=200,screenX=300,screenY=300,left=700,top=300');"><a><?php echo $linhacount["COUNT('FK_espaco')"];?></a></td>
  </tr>
  <?php } ?>
  </table>
  <table width="4622" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;<a href="frm_relatorioeteclaboratorio.php?us=<?php  echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
    <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>