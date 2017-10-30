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
include "menu.php";

if (isset($_GET['acao']))
$acao=$_GET['acao'];

if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['codetec']))
$codetec=$_GET['codetec'];

if(isset($_POST['codetec']))
$codetec=$_POST['codetec'];	

if (isset($_GET['etec'])){
$etec=$_GET['etec'];
}


$sql="select * from tbl_etec where `PK_CodEtec`='$etec'";
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
<table width="4471" border="0">
     
  <tr>
    <td colspan="22" align="left" bgcolor="#D6D6D6"><strong>Relatório Etec - Mapeamento</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="198" align="left"><h2>Etec</h2></td>
    <td width="204" align="left">&nbsp;</td>
    <td width="166" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="184">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td width="14">&nbsp;</td>
    <td colspan="3" align="left"><strong>Etec: </strong><?php echo $linha["Etec"];?></td>
    <td width="112">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="251">&nbsp;</td>
    <td width="225">&nbsp;</td>
    <td width="163">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="459">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td width="213">&nbsp;</td>
    <td>&nbsp;</td>
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
  </tr>
    </table>
 <table width="4471" cellpadding="0" cellspacing="0" border="1"> 
  <tr align="center">
    <td bgcolor="#d6d6d6"><strong>Instituição</strong></td>
    <td bgcolor="#d6d6d6"><strong>Equipamento</strong></td>
    <td bgcolor="#d6d6d6"><strong>Marca</strong></td>
    <td bgcolor="#d6d6d6"><strong>N° Patrimônio</strong></td>
    <td bgcolor="#d6d6d6"><strong>Ambiente Alocado</strong></td>
    <td bgcolor="#d6d6d6"><strong>Tansferência Para Outra Unidade</strong></td>
    <td bgcolor="#d6d6d6"><strong>Especificação do Equipamento</strong></td>
    <td bgcolor="#d6d6d6"><strong>Justificativa</strong></td>
    <td bgcolor="#d6d6d6"><strong>Potência</strong></td>
    <td bgcolor="#d6d6d6"><strong>Tipo de Tomada</strong></td>
    <td bgcolor="#d6d6d6"><strong>Peso em (kg.)</strong></td>
    <td bgcolor="#d6d6d6"><strong>Observações Gerais</strong></td>
    <td bgcolor="#d6d6d6"><strong>Ano de Aquisição</strong></td>
    <td bgcolor="#d6d6d6"><strong>Modelo</strong></td>
    <td bgcolor="#d6d6d6"><strong>Atualização Técnológica</strong></td>
    <td bgcolor="#d6d6d6"><strong>Usabilidade</strong></td>
    <td bgcolor="#d6d6d6"><strong>Dimensão (altura)</strong></td>
    <td bgcolor="#d6d6d6"><strong>Dimensão (largura)</strong></td>
    <td bgcolor="#d6d6d6"><strong>Dimensão (comprimento)</strong></td>
    <td bgcolor="#d6d6d6"><strong>Forma de Aquisição</strong></td>
  </tr>
  <?php
    
  $us=base64_encode($us); 
     
  $sqllaboratorio="select * from tbl_material where `FK_Instituicao`='$etec'";
  $comandolaboratorio=mysql_query($sqllaboratorio);
  while($linhalaboratorio=mysql_fetch_array($comandolaboratorio)){
  $fkmaterial=$linhalaboratorio['FK_Equipamento'];
  $espacofisico=$linhalaboratorio['FK_EspacoFisico'];
  $codmaterial=$linhalaboratorio['PK_CodMaterial'];

  
  $sqlpatrimonio="select * from tbl_patrimonio where FK_equipamento='$codmaterial'";
  $querypatrimonio=mysql_query($sqlpatrimonio);
  while($linhapatrimonio=mysql_fetch_array($querypatrimonio)){
  

  $sqlcontpatrimonio="select COUNT('FK_equipamento') from tbl_patrimonio where FK_equipamento='$codmaterial'";
  $querycontpatrimonio=mysql_query($sqlcontpatrimonio);
  $linhacontpatrimonio=mysql_fetch_array($querycontpatrimonio);
 
  
  $sqlambiente="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$espacofisico'";
    mysql_query("SET NAMES 'utf8' ");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $comandoambiente=mysql_query($sqlambiente);
  $linhaambiente=mysql_fetch_array($comandoambiente);
  $linhaambiente2=$linhaambiente['Descricao'];

  
  $sqltipolaboratorio="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$fkmaterial'";
  $comandotipolaboratorio=mysql_query($sqltipolaboratorio);
  $linhatipolaboratorio=mysql_fetch_array($comandotipolaboratorio);
  //$pktipolaboratorio=$linhatipolaboratorio['PK_CodMaterial'];
	   
  
	  mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
		 $sqlambiente="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$espacofisico'";
  $comandoambiente=mysql_query($sqlambiente);
  $linhaambiente=mysql_fetch_array($comandoambiente);
	   
  $sqletec="select * from tbl_etec where `PK_CodEtec`='$etec'";
  mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $comandoetec=mysql_query($sqletec);

  $linhaetec=mysql_fetch_array($comandoetec);

	 
	?>
  <tr align="center" align="center" align="center" style="cursor:default" onMouseOver="javascript:this.style.backgroundColor='#F3F3F3'" onMouseOut="javascript:this.style.backgroundColor=''">
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linha['Etec'];?></a></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhatipolaboratorio['Tipo_Equipamento'];?></a></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo utf8_encode($linhalaboratorio['Descricao']);?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhapatrimonio['patrimonio'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhaambiente2;?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php 
	if($linhalaboratorio['Transferencia']==0){
	echo "Não" ;}else{echo "Sim";}?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Especificacao'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['justificativa'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Potencia'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['TipoTomada'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Peso'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Historico'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php if($linhalaboratorio['Ano_Aquisicao']=="anterior 2"){
		echo "anterior 2005";
	}else{ echo $linhalaboratorio['Ano_Aquisicao'];}
	?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Modelo'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php if($linhalaboratorio['FK_AtualizacaoTecnologia']==1){
		echo "Tecnologia de Ponta";
		}elseif($linhalaboratorio['FK_AtualizacaoTecnologia']==2){
		echo "Atual";	
			}elseif($linhalaboratorio['FK_AtualizacaoTecnologia']==3){
		echo "Antigo, mas não obsoleto";
		}elseif($linhalaboratorio['FK_AtualizacaoTecnologia']==4){
		echo "Obsoleto";	
			}
		?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['Usabilidade'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['DimensaoAltura'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['DimensaoLargura'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php echo $linhalaboratorio['DimensaoComprimento'];?></td>
    <td><a style="color:#333" href="Frm_Equipamento.php?us=<?php echo $us; ?>&acao=edt&cod=<?php echo $linhalaboratorio['PK_CodMaterial'] ; ?>"><?php if($linhalaboratorio['FK_FormaAquisicao']==1){
		echo "CPS";
		}elseif($linhalaboratorio['FK_FormaAquisicao']==2){
		echo "FAT";	
			}elseif($linhalaboratorio['FK_FormaAquisicao']==3){
		echo "APM";		
			}elseif($linhalaboratorio['FK_FormaAquisicao']==4){
		echo "Cooperativa Escola";		
				}elseif($linhalaboratorio['FK_FormaAquisicao']==5){
		echo "Doação";			
				}elseif($linhalaboratorio['FK_FormaAquisicao']==6){
		echo "Empréstimo";				
				}elseif($linhalaboratorio['FK_FormaAquisicao']==7){
		echo "Cessão";			
				}elseif($linhalaboratorio['FK_FormaAquisicao']==8){
		echo "Compartilhamento";			
				}?></td>
  </tr>
  <?php }} ?>
  <tr>
  </tr>
  <table width="4471" border="0">
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
    <td>&nbsp;<a href="frm_equipamentoetec.php?us=<?php echo $us ?>"><img src="voltar.gif" width="64" height="24" /></a></td>
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
  </tr>

</table>

</body>
</html>