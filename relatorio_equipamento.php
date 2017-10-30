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
?>
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

if(isset($_GET['cod'])){
$cod=$_GET['cod'];	}

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
$us= base64_decode($us);


mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$sqlespaco="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$laboratorio'";
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
$comandoespaco=mysql_query($sqlespaco);
$linhaespaco=mysql_fetch_array($comandoespaco);
$fk=$linhaespaco['FK_Laboratorio'];
$codlaboratorio=$linhaespaco['PK_CodLaboratorio'];


$sqlespacocurso="select * from tbl_espaco_curso where PK_codEspaco_curso='$codlaboratorio'";
$queryespacocurso=mysql_query($sqlespacocurso);
$linhaespacocurso=mysql_fetch_array($queryespacocurso);
$cursofk=$linhaespacocurso['FK_curso'];


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
      <td colspan="7" align="center" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="203" align="left"><h2>Etec</h2></td>
      <td width="209" align="left">&nbsp;</td>
      <td width="133" align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="13">&nbsp;</td>
      <td align="left"><strong>Etec: </strong></td>
      <td align="left"><strong>Código: </strong></td>
      <td align="left"><strong>Município: </strong></td>
      <td width="103">&nbsp;</td>
      <td colspan="2"><strong>Tipo de Atendimento: </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><?php echo $linha["Etec"];?></td>
      <td align="left"><?php echo $linha["Codigo_etec"];?></td>
      <td colspan="2" align="left"><?php echo $linha["Municipio"];?></td>
      <td colspan="2"><?php echo $linha["TipoAtendimento"];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3" align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <?php
  
  
   $sqlquantidade="select COUNT('FK_Equipamento') from tbl_material where `FK_Instituicao`='$codetec' and `FK_EspacoFisico`='$laboratorio'";
	 $comandoquantidade=mysql_query($sqlquantidade);
	 $linhaquantidade=mysql_fetch_array($comandoquantidade);
	 ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center">&nbsp;</td>
      <?php if ($linhaespaco['Imagem']!=""){?>
      <td align="left"><img width="150" src="<?php echo $linhaespaco['Imagem']; ?>" /></td>
      <?php }else{ 
	?>
      <td align="left"><img width="100" src="no_picture.jpg" /></td>
      <?php } ?>
      <td colspan="4" align="left"><h3>&nbsp;</h3>
        <h3><?php echo $linhaespaco['Descricao'];?> </h3>
        <h2>&nbsp;</h2></td>
    </tr>
    </table>
<table width="933" border="1" cellpadding="0" cellspacing="0">
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center" bgcolor="#d6d6d6"><strong>Quantidade de Bancadas</strong></td>
      <td align="center" bgcolor="#d6d6d6"><strong>Capacidade N° Alunos</strong></td>
      <td align="center" bgcolor="#d6d6d6"><strong>Tipo de Construção</strong></td>
      <td align="center" bgcolor="#d6d6d6"><strong>Área (m²)</strong></td>
      <td width="158" align="center" bgcolor="#d6d6d6"><strong>Equipamentos Alocados</strong></td>
    </tr>
    <tr align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
      <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us=base64_encode($us); ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Quantidade_Bancadas'];?></a></td>
      <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Capacidade'];?></a></td>
      <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['tipo_construcao'];?></a></td>
      <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaespaco['Area'];?></a></td>
      <td><a style="color:#333" href="frm_espacoFisico.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhaespaco['PK_CodLaboratorio'] ; ?>&codetec=<?php echo $linhaespaco['FK_Instituicao'];?>"><?php echo $linhaquantidade["COUNT('FK_Equipamento')"];?></a></td>
    </tr>
    </table>
  <table width="933" border="0">
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
	$codmaterial=$linhaequipamento['PK_CodMaterial'];
	
	$sqlpatr="select * from tbl_patrimonio where FK_equipamento='$codmaterial'";
	$querypatr=mysql_query($sqlpatr);
	$linhapatr=mysql_fetch_array($querypatr);

	
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
      <td></td>
      <td></td>
    </tr>
  </table>
      <table width="933" border="1" cellpadding="0" cellspacing="0">
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center" bgcolor="#d6d6d6"><strong>Descrição</strong></td>
      <td align="center" bgcolor="#d6d6d6"><strong>Marca</strong></td>
      <?php 
 
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
      <td align="center" bgcolor="#d6d6d6"><strong>Atualização tecnológica</strong></td>
      <td align="center" bgcolor="#d6d6d6"><strong>Modelo</strong></td>
      
      <td align="center" bgcolor="#d6d6d6"><strong>Ano de aquisição </strong></td>
      </tr>
    <tr align="center" align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
      <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhaeqp['Tipo_Equipamento'];?></a></td>
      <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhaequipamento['Descricao'];?></a></td>
      <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php if($linhaequipamento['FK_AtualizacaoTecnologia']!=""){echo "$mensagem"; }else{ echo "";}?></td>
      <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php echo $linhaequipamento['Modelo'];?></td>

      <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php if($linhaequipamento['Ano_Aquisicao']=='anterior 2'){ echo "Anterior a 2005";}else{ echo $linhaequipamento['Ano_Aquisicao'];}?></td>
      <a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us ?>&acao=edt&cod=<?php echo $linhaequipamento['PK_CodMaterial'] ; ?>"><?php if($linhaequipamento['Ociosidade']!=1){
		  $mens="Não";}else{
		  $mens="Sim";
		}
		  ?></a>
      </tr>
    </table>
      <table width="933" border="0">
    <tr align="center" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td><?php if($linhaequipamento['Baixa_Patrimonial']!=""){?>
      <td colspan="2" align="left">&nbsp;</td>
      <?php } ?>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF"><strong>Quantidade:</strong> <?php echo $linhaequipamento['Quantidade'];?></td>
      <?php if($linhaequipamento['Ocorrencia']!=""){?>
      <td colspan="2" align="left"><strong></strong> <?php // echo $linhaequipamento['Ocorrencia'];?></td>
      <?php } ?>
      <td colspan="3">&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <?php if($linhaequipamento['Quantidade']!=0){?>
      <td colspan="2" align="left">&nbsp;</td>
      <?php } ?>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href="frm_detalheEquipamento.php?us=<?php  echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
      <td><a href="javascript:self.print()"><img src="icone_imprimir.gif" width="48" height="50" /></a></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>