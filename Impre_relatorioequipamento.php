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
<title>Relatório Equipamento - Mapeamento</title>
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
if(isset($_GET['us'])){?>
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

if(isset($_GET['eqp'])){
$equipamento=$_GET['eqp'];}


$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];


$sql="select * from tbl_etec where `PK_CodEtec`='$codetec'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);
$us= base64_decode($us);


$sqlespaco="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$laboratorio'";
mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
$comandoespaco=mysql_query($sqlespaco);
$linhaespaco=mysql_fetch_array($comandoespaco);
$fk=$linhaespaco['FK_Laboratorio'];
$cursofk=$linhaespaco['FK_Curso_Ultiliza'];



$sqlcurso="select * from tbl_curso where `PK_CodCurso`='$cursofk'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

$comandocurso=mysql_query($sqlcurso);
$linhacurso=mysql_fetch_array($comandocurso);
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0">
    <tr>
      <td colspan="5" align="center" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="246"><h2>Etec</h2></td>
      <td width="133">&nbsp;</td>
      <td width="238">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="14">&nbsp;</td>
      <td colspan="3"><strong>Etec: </strong><?php echo $linha["Etec"];?></td>
      <td width="280">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><strong>Código: </strong><?php echo $linha["Codigo_etec"];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><strong>Município: </strong><?php echo $linha["Municipio"];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><strong>Região: </strong><?php echo $linha["Regiao_Governo"];?></td>
      <td>&nbsp;</td>
    </tr>
    <?php
  
  
   $sqlquantidade="select COUNT('FK_Equipamento') from tbl_material where `FK_Instituicao`='$codetec' and `FK_EspacoFisico`='$laboratorio'";
	 $comandoquantidade=mysql_query($sqlquantidade);
	 $linhaquantidade=mysql_fetch_array($comandoquantidade);
	 ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <?php if ($linhaespaco['Imagem']!=""){?>
      <td align="left"><img width="150" src="<?php echo $linhaespaco['Imagem']; ?>" /></td>
      <?php }else{ 
	?>
      <td align="left"><img width="100" src="no_picture.jpg" /></td>
      <?php } ?>
      <td colspan="2" align="left"><h3>&nbsp;</h3>
        <h3><?php echo $linhaespaco['Descricao'];?> </h3>
        <h2>&nbsp;</h2></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <td align="left"><strong>Curso que Ultiliza:</strong><?php echo $linhacurso['Nome_Curso'];?></td>
      <td colspan="2" align="left"><strong>Capacidade N° Alunos:</strong><?php echo $linhaespaco['Capacidade'];?></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <td align="left"><strong>Tipo Construção</strong>:<?php echo $linhaespaco['tipo_construcao'];?></td>
      <td align="left"><strong>Área (m²):</strong><?php echo $linhaespaco['Area'];?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <td align="left"><strong>Equipamentos Alocado:</strong><?php echo $linhaquantidade["COUNT('FK_Equipamento')"];?></td>
      <td align="left"><strong>Ocioso</strong>:<?php echo $linhaespaco['Ociosidade'];?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left"><strong>Quantidade deBancadas</strong>:<?php echo $linhaespaco['Quantidade_Bancadas'];?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php $sqlequipamentoimagem="select * from tbl_material where `PK_CodMaterial`='$equipamento' and `FK_EspacoFisico`='$laboratorio'"; 
	$comandoimagem=mysql_query($sqlequipamentoimagem);
	$linhaimagem=mysql_fetch_array($comandoimagem);
	


    $sqlequipamento="select * from tbl_material where `PK_CodMaterial`='$equipamento' and `FK_EspacoFisico`='$laboratorio'";

    $comandoequipamento=mysql_query($sqlequipamento);
 	$linhaequipamento=mysql_fetch_array($comandoequipamento);
	$fkmaterial=$linhaequipamento['FK_Equipamento']; 

	
	 $sqleqp="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$fkmaterial'";
	 $comandoeqp=mysql_query($sqleqp);
	 $linhaeqp=mysql_fetch_array($comandoeqp);
	 $pkk=$linhaeqp['PK_CadastroEquipamento'];
	  
	 
  	?>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left"><?php if ($linhaimagem['Imagem']!=""){?>
      <img width="150" src="<?php echo $linhaimagem['Imagem']; ?>" /></td>
      <td align="left"><h2><?php echo $linhaeqp['Tipo_Equipamento'];?></h2>        <h2>&nbsp;</h2></td>
      <?php }else{ 
	?>
      <td align="left"><img width="100" src="no_picture.jpg" /></td>
      <?php } ?>
      &nbsp;
      <td></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left"><strong>Descrição:</strong> <?php echo $linhaequipamento['Descricao'];?></td>
      <?php if($linhaequipamento['FK_AtualizacaoTecnologia']!=0){
      if($linhaequipamento['FK_AtualizacaoTecnologia']==1){
		  $mensagem = "Tecnologia de Ponta";
		  }
		if($linhaequipamento['FK_AtualizacaoTecnologia']==2){
			 $mensagem = "Atual";
		  }
		  if($linhaequipamento['FK_AtualizacaoTecnologia']==3){
			 $mensagem = "Antigo, mas não Obsoleto";
		  }
		  if($linhaequipamento['FK_AtualizacaoTecnologia']==4){
			 $mensagem = "Obsoleto";
		  }
		  ?>
      <td colspan="2" align="left"><strong>Atualização Tecnologica:</strong> <?php echo "$mensagem";?></td>
      <?php } ?>
      <td>&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left"><strong>Modelo: </strong><?php echo $linhaequipamento['Modelo'];?></td>
      <?php if($linhaequipamento['Usabilidade']!=""){?>
      <td colspan="2" align="left"><strong>Usabilidade:</strong> <?php echo $linhaequipamento['Usabilidade'];?></td>
      <?php } ?>
      <td>&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left"><strong>Ano Aquisição: </strong><?php echo $linhaequipamento['Ano_Aquisicao'];?></td><?php if($linhaequipamento['Baixa_Patrimonial']!=""){?>
      <td colspan="2" align="left"><strong>Baixa Patrimonial:</strong> <?php echo $linhaequipamento['Baixa_Patrimonial'];?></td>
      <?php } ?>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF"><strong>N° Patrimônio: </strong><?php echo $linhaequipamento['Numero_Patrimonio'];?></td>
      <?php if($linhaequipamento['Ocorrencia']!=""){?>
      <td colspan="2" align="left"><strong>Ocorrência:</strong> <?php echo $linhaequipamento['Ocorrencia'];?></td>
      <?php } ?>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Especificação</strong>: <?php echo $linhaequipamento['Especificacao'];?></td>
      <?php if($linhaequipamento['Quantidade']!=0){?>
      <td colspan="2"><strong>Quantidade:</strong> <?php echo $linhaequipamento['Quantidade'];?></td>
      <?php } ?>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td><?php if($linhaequipamento['Ociosidade']!=1){
		  $mens="Não";}else{
		  $mens="Sim";
		}
		  ?>
      <td><strong>Ocioso:</strong> <?php echo "$mens";?></td>
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
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
<?php } ?>
</html>