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
<title>Relatório Laboratório - Mapeamento</title>
<style type="text/css">
<!--
body,td,th {
	color: 666;
	font-family: Times New Roman, Times, serif;
}
h2 {
	font-size: 18px;
	color: 666;
}
h3 {
	color: 666;
}
-->
</style></head>
<?php
?>
<body>
<?php 
include "topo.php";
include "testemenu.php";
include "conexao.php";

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

mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$sqlespaco="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$laboratorio'";
$comandoespaco=mysql_query($sqlespaco);
$linhaespaco=mysql_fetch_array($comandoespaco);
$fk=$linhaespaco['FK_Laboratorio'];
$nomefkcurso=$linhaespaco['PK_CodLaboratorio'];



$sqlnome="select * from tbl_espaco_curso where `FK_espaco`='$nomefkcurso'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$nomecomando=mysql_query($sqlnome);
$quantidadecurso=mysql_num_rows($nomecomando);


$linhanome=mysql_fetch_array($nomecomando);
$fkcurso=$linhanome['FK_curso'];


$sqlnome="select * from tbl_curso where PK_CodCurso='$fkcurso'";
$querynome=mysql_query($sqlnome);
$linhacursonome=mysql_fetch_array($querynome);



?>

<body>
<table width="933" border="0">
  <tr>
    <td colspan="6" align="center" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="191" align="left"><h2>Etec</h2></td>
    <td width="144">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="13">&nbsp;</td>
    <td colspan="3" align="left"><strong>Etec: </strong><?php echo $linha["Etec"];?></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Código: </strong><?php echo $linha["Codigo_etec"];?></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Município: </strong><?php echo $linha["Municipio"];?></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="left"><strong>Tipo de Atendimento: </strong><?php echo $linha["TipoAtendimento"];?></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  
  $us=base64_encode($us);
  
   $sqlquantidade="select * from tbl_material where `FK_Instituicao`='$codetec' and `FK_EspacoFisico`='$laboratorio'";
	 $comandoquantidade=mysql_query($sqlquantidade);
	 $contador=0;
	 while($linhaquantidade=mysql_fetch_array($comandoquantidade)){
		 $contador=$linhaquantidade["Quantidade"]+$contador;
		 }
	 ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td width="3" align="left">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <?php if ($linhaespaco['Imagem']!=""){?>
    <td align="left"><img width="150" src="<?php echo $linhaespaco['Imagem']; ?>" /></td>
    <?php }else{ 
	?>
    <td align="left"><img width="100" src="no_picture.jpg" /></td>
    <?php } ?>
    <td colspan="3" align="left"><h3>&nbsp;</h3>
      <h3><?php echo $linhaespaco['Descricao'];?>
      </h3>
    <h2>&nbsp;</h2></td>
    <td align="left">&nbsp;</td>
  </tr>
  </table>
<table width="933" border="1" cellpadding="0" cellspacing="0">  
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" bgcolor="#d6d6d6"><strong>Quantidade de cursos que utilizam</strong></td>
    <td align="left" bgcolor="#d6d6d6"><strong>Área (m²)</strong></td>
    <td align="left" bgcolor="#d6d6d6"><strong>Tipo de construção</strong></td>
    <td width="170" align="left" bgcolor="#d6d6d6"><strong>Quantidade de Bancadas</strong></td>
    <td width="156" align="left" bgcolor="#d6d6d6"><strong>Capacidade de n° de alunos</strong></td>
  </tr>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $quantidadecurso; ?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Area'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['tipo_construcao'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Quantidade_Bancadas'];?></td>
    <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Capacidade'];?></td>
  </tr>
  </table>
  <table width="933" border="0">
  <tr align="center" bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left"><strong>Equipamentos alocados:</strong><?php if($contador==""){ echo "Nenhum Equipamento Alocado";}else{ echo $contador;}?></td>
    <td align="left"><strong>Equipamentos ociosos</strong>:<?php 
    $sqlOciosidade="select * from tbl_material where `FK_EspacoFisico`='$laboratorio' and Ociosidade='2'";
    $qryOciosidade=mysql_query($sqlOciosidade);
    $contociosidade=0;
    while($linhaOciosidade=mysql_fetch_array($qryOciosidade)){
    $contociosidade=$contociosidade+$linhaOciosidade['Quantidade'];
    }
    echo $contociosidade;?></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
  </tr>
  </table>
  <table width="933" border="1" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td bgcolor="#d6d6d6"><strong>Equipamento</strong></td>
    <td bgcolor="#d6d6d6"><strong>Modelo</strong></td>
    <td bgcolor="#d6d6d6"><strong>Ano de aquisição</strong></td>
    <td colspan="2" bgcolor="#d6d6d6"><strong>N° do patrimônio</strong></td>
  </tr>
  
     
     <?php

  $sqlequipamento="select * from tbl_material where `FK_Instituicao`='$codetec' and `FK_EspacoFisico`='$laboratorio'";
  $comandoequipamento=mysql_query($sqlequipamento);
 while($linhaequipamento=mysql_fetch_array($comandoequipamento)){
	$fkmaterial=$linhaequipamento['FK_Equipamento']; 
	$pkequipamento=$linhaequipamento['PK_CodMaterial'];
	
	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	 $sqleqp="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$fkmaterial'";
	 $comandoeqp=mysql_query($sqleqp);
	 $linhaeqp=mysql_fetch_array($comandoeqp);
	 $pkk=$linhaeqp['PK_CadastroEquipamento'];
	  
	$sqlpatrimonio="select * from tbl_patrimonio where FK_equipamento='$pkequipamento'";
	$querypatrimonio=mysql_query($sqlpatrimonio);
  while($linhapatrimonio=mysql_fetch_array($querypatrimonio)){
  	?>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhaeqp['Tipo_Equipamento'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhaequipamento['Modelo'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php if($linhaequipamento['Ano_Aquisicao']=="anterior 2") {
		echo "anterior a 2005";
		}else{	
	echo $linhaequipamento['Ano_Aquisicao'];}
	?></td>
    <td colspan="2"><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhapatrimonio['patrimonio'];?></td>
  </tr>
<?php }} ?>
</table>

  <table width="933" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;<a href="frm_relatorioeteclista.php?us=<?php echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
    <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>