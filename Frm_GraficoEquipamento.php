<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Relatório de Equipamentos</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	</head>

</head>

<body>
<p>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  
  <?php 
include "conexao.php";


$totalequipamentocps=0;
$totalequipamentofat=0;
$totalequipamentoapm=0;
$totalequipamentocooperativaescola=0;
$totalequipamentodoacao=0;
$totalequipamentoemprestimo=0;
$totalequipamentocessao=0;
$totalequipamentocompartilhamento=0;
$totalequipamentototal=0;

//------------variaveis da porcentagem----------------//
$porccpstotal=0;
$porcfattotal=0;
$porcapmtotal=0;
$porccoopescolartotal=0;
$porcdoacaototal=0;
$porcemprestimototal=0;
$porccessaototal=0;
$porccompartilhamentototal=0;


//-----------------Variaveis totais em ano de aquisição-------------------//

$total2005=0;
$total2006=0;
$total2007=0;
$total2008=0;
$total2009=0;
$total2010=0;
$total2011=0;
$total2012=0;
$totaltotal=0;

//-----------------------Variaveis utilizadas para Aquisições especiais--------------------//
$totalPrefeitura=0;
$totalONG=0;
$totalSindicato=0;
$totalFundacao=0;
$totalAssociacao=0;
$totalOrgaoClasse=0;
$totalOrgaoPublico=0;
$totalEmpresaPrivada=0;
$totalOutros=0;
$totaltotalaquisicaoespecial=0;

//--------------------Total de Ociosidade------------------------//
$totalociososim=0;
$totalociosonao=0;
$totaltotalociosidade=0;


//--------------------Total de Atualizações tecnologicas variaveis----------//
$totalTecnologiaPonta=0;
$totalatual=0;
$totalantigonobsoleto=0;
$totalobsoleto=0;	
$totaltotalatualizacao=0;

//-----------------porcentagem de cada valor de aquisição especial-------------//
$porcTecnologiaPonta=0;
$porcatual=0;
$porcAntigonObsoleto=0;
$porcObsoleto=0;

set_time_limit(999999999999);
$cor="#FFFFFF";

if(isset($_POST['txt_equipamento2'])){
$txt_equipamento2=$_POST['txt_equipamento2'];	
}

if(isset($_POST['txt_nomeunidade2'])){
$nomeunidade=$_POST['txt_nomeunidade2'];	
	}

if(isset($_POST['txt_tipodeinformacao'])){
$tipoinformacao=$_POST['txt_tipodeinformacao'];	
	}

if(isset($_POST['txt_equipamento2'])){
$periodo=$_POST['txt_equipamento2'];	
	}	

if(isset($_POST['txt_ambientealocado2'])){
$ambientealocado=$_POST['txt_ambientealocado2'];	
	}

if(isset($_POST['txt_formaaquisicao'])){
$formaaquisicao=$_POST['txt_formaaquisicao'];	
	}	

if($formaaquisicao=='CPS'){
$formaaquisicao=1;	
	}
	
if($formaaquisicao=='FAT'){
$formaaquisicao=2;	
	}
	
if($formaaquisicao=='APM'){
$formaaquisicao=3;	
	}
	
if($formaaquisicao=='CooperativaEscola'){
$formaaquisicao=4;	
	}	
	
if($formaaquisicao=='Doacao'){
$formaaquisicao=5;	
	}	
	
if($formaaquisicao=='Emprestimo'){
$formaaquisicao=6;	
	}
	
if($formaaquisicao=='Cessao'){
$formaaquisicao=7;	
	}	
	
if($formaaquisicao=='Compartilhamento'){
$formaaquisicao=8;	
	}						
	
	
if(isset($_POST['txt_aquisicaoespecial'])){
$aquisicaoespecial=$_POST['txt_aquisicaoespecial'];	
	}

if(isset($_POST['txt_ano'])){
$ano2=$_POST['txt_ano'];	
	}	

if($ano2=="Anterior2005"){
$ano2="anterior 2";	
	}



	
if(isset($_POST['txt_ociosidade'])){
$ociosidade=$_POST['txt_ociosidade'];	
	}	
	
if($ociosidade=="Sim"){
$ociosidade=1;	
	}	

if($ociosidade=="Nao"){
$ociosidade=2;	
	}	

if(isset($_POST['txt_atualizacaotecnologica'])){
$atualizacaotecnologica=$_POST['txt_atualizacaotecnologica'];	
	}
	
if($atualizacaotecnologica=="TecnologiaPonta"){
$atualizacaotecnologica=1;	
	}	
	
if($atualizacaotecnologica=="Atual"){
$atualizacaotecnologica=2;	
	}		
	
if($atualizacaotecnologica=="AntigoObsoleto"){
$atualizacaotecnologica=3;	
	}		
	
if($atualizacaotecnologica=="Obsoleto"){
$atualizacaotecnologica=4;	
	}		
	


	include"topo.php";
include("testemenu.php");
// include "menu.php";
include "conexao.php";
$us= base64_decode($us);

$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];


if($medio!="Administrador"){
$us=base64_encode($us);
include "menu_usuario.php";

  }else{  
//echo "$us"; 
$us=base64_encode($us);
$us=base64_encode($us);
$us=base64_decode($us);

include ("menu.php"); 

    } 

$sqlEquipamentoTitle="select * from tbl_cadastro_equipamento where PK_CadastroEquipamento='$periodo'";
$qryEquipamentoTitle=mysql_query($sqlEquipamentoTitle);
$linhaEquipamentoTitle=mysql_fetch_array($qryEquipamentoTitle);
$equipamento=$linhaEquipamentoTitle['Tipo_Equipamento'];


$sqletec="select * from tbl_etec where PK_CodEtec='$nomeunidade'";
$qryetec=mysql_query($sqletec);
$linhaetec=mysql_fetch_array($qryetec);

if($tipoinformacao=="FormaAquisicao"){
?>
<strong><center>Forma de Aquisição</center></strong>
<div class="demo_jui" style="max-width:1500px">  
<table width="933" border="1" cellpadding="0" cellspacing="0" class="display" id="example">
<thead>
  <tr>
    <th align="center"><font size="-1">Instituição</font></th>
    <th><font size="-1">Equipamento</font></th>
    <th><font size="-1">CPS</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">FAT</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">APM</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Coop. Escolar</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Doação</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Empréstimo</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Cessão</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Compart.</font></th>
    <th><font size="-1">%</font></th>
    <th><font size="-1">Total</font></th>
    </tr>
</thead>
<tbody>  
  <?php 
  $clausula='';
  $cor="#FFFFFF";
  if($nomeunidade!="Todos"){
	$clausula.=" and tbl_material.FK_Instituicao='$nomeunidade'";  
	  }
	  
  if($ambientealocado!="Todos"){
	$clausula.=" and tbl_material.FK_EspacoFisico='$ambientealocado'";  
	  }
	  
 
  if($txt_equipamento2!="Todos"){
	$clausula.=" and tbl_material.FK_Equipamento='$txt_equipamento2'";  
	  } 
	  
  if($formaaquisicao!="Todos"){
	$clausula.=" and tbl_material.FK_FormaAquisicao='$formaaquisicao'";  
	  }		  
 

 

 
   $sqlEquipamento="select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." group by tbl_material.FK_Equipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
	$resultado = array();
  $qryEquipamento=mysql_query($sqlEquipamento)or die(mysql_error());
  while($linhaEquipamento=mysql_fetch_array($qryEquipamento)){
  
$sqlEquipamento2="select *,sum(tbl_material.Quantidade) as TotalCPS from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=1";
  $qryEquipamento2=mysql_query($sqlEquipamento2);
  $linhaEquipamento2=mysql_fetch_array($qryEquipamento2);
  
 
$sqlEquipamento3="select *,sum(tbl_material.Quantidade) as TotalFat from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=2";
  $qryEquipamento3=mysql_query($sqlEquipamento3);
  $linhaEquipamento3=mysql_fetch_array($qryEquipamento3);  
  
$sqlEquipamento4="select *,sum(tbl_material.Quantidade) as TotalAPM from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=3";
$qryEquipamento4=mysql_query($sqlEquipamento4);
$linhaEquipamento4=mysql_fetch_array($qryEquipamento4);  
  
  
$sqlEquipamento5="select *,sum(tbl_material.Quantidade) as TotalCooperativaEscola from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=4";
$qryEquipamento5=mysql_query($sqlEquipamento5);
$linhaEquipamento5=mysql_fetch_array($qryEquipamento5);


$sqlEquipamento6="select *,sum(tbl_material.Quantidade) as TotalDoacao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=5";
$qryEquipamento6=mysql_query($sqlEquipamento6);
$linhaEquipamento6=mysql_fetch_array($qryEquipamento6);


$sqlEquipamento7="select *,sum(tbl_material.Quantidade) as TotalEmprestimo from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=6";
$qryEquipamento7=mysql_query($sqlEquipamento7);
$linhaEquipamento7=mysql_fetch_array($qryEquipamento7);


$sqlEquipamento8="select *,sum(tbl_material.Quantidade) as TotalCessao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=7";
$qryEquipamento8=mysql_query($sqlEquipamento8);
$linhaEquipamento8=mysql_fetch_array($qryEquipamento8);


$sqlEquipamento9="select *,sum(tbl_material.Quantidade) as TotalCompartilhamento from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao=8";
$qryEquipamento9=mysql_query($sqlEquipamento9);
$linhaEquipamento9=mysql_fetch_array($qryEquipamento9);
 
 
$sqlEquipamento10="select *,sum(tbl_material.Quantidade) as Total from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']."";
$qryEquipamento10=mysql_query($sqlEquipamento10);
$linhaEquipamento10=mysql_fetch_array($qryEquipamento10); 

if($cor=="#FFFFFF"){
$cor="#E8E8E8";	
	}else{
$cor="#FFFFFF";		
		}

//------------Últimas linhas total das colunas---------------------------//
$totalequipamentocps=$totalequipamentocps+$linhaEquipamento2['TotalCPS'];

$totalequipamentofat=$totalequipamentofat+$linhaEquipamento3['TotalFat'];

$totalequipamentoapm=$totalequipamentoapm+$linhaEquipamento4['TotalAPM'];

$totalequipamentocooperativaescola=$totalequipamentocooperativaescola+$linhaEquipamento5['TotalCooperativaEscola'];

$totalequipamentodoacao=$totalequipamentodoacao+$linhaEquipamento6['TotalDoacao'];

$totalequipamentoemprestimo=$totalequipamentoemprestimo+$linhaEquipamento7['TotalEmprestimo'];

$totalequipamentocessao=$totalequipamentocessao+$linhaEquipamento8['TotalCessao'];

$totalequipamentocompartilhamento=$totalequipamentocompartilhamento+$linhaEquipamento9['TotalCompartilhamento'];

$totalequipamentototal=$totalequipamentototal+$linhaEquipamento10['Total'];


//-----------------------------Totais de porcentagem
$porccpstotal=($totalequipamentocps*100)/$totalequipamentototal;
$porcfattotal=($totalequipamentofat*100)/$totalequipamentototal;
$porcapmtotal=($totalequipamentoapm*100)/$totalequipamentototal;
$porccoopescolartotal=($totalequipamentocooperativaescola*100)/$totalequipamentototal;
$porcdoacaototal=($totalequipamentodoacao*100)/$totalequipamentototal;
$porcemprestimototal=($totalequipamentoemprestimo*100)/$totalequipamentototal;
$porccessaototal=($totalequipamentocessao*100)/$totalequipamentototal;
$porccompartilhamentototal=($totalequipamentocompartilhamento*100)/$totalequipamentototal;



		$resultado[] = array('name' => "CPS", 'data' => array(round($porccpstotal,2)));
		$resultado[] = array('name' => "FAT", 'data' => array(round($porcfattotal,2)));
		$resultado[] = array('name' => "APM", 'data' => array(round($porcapmtotal,2)));
		$resultado[] = array('name' => "Coop. Escolar", 'data' => array(round($porccoopescolartotal,2)));
		$resultado[] = array('name' => "Doação", 'data' => array(round($porcdoacaototal,2)));
		$resultado[] = array('name' => "Empréstimo", 'data' => array(round($porcemprestimototal,2)));
		$resultado[] = array('name' => "Cessão", 'data' => array(round($porccessaototal,2)));
		$resultado[] = array('name' => "Compartilhamento", 'data' => array(round($porccompartilhamentototal,2)));
		
		
?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center"><font size="-1"><?php echo $linhaEquipamento['Etec']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento['Tipo_Equipamento']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento2['TotalCPS']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento2['TotalCPS']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento3['TotalFat']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento3['TotalFat']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento4['TotalAPM']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento4['TotalAPM']*100)/$linhaEquipamento10['Total'],2)." %"; }?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento5['TotalCooperativaEscola']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento5['TotalCooperativaEscola']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento6['TotalDoacao']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento6['TotalDoacao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento7['TotalEmprestimo']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento7['TotalEmprestimo']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento8['TotalCessao']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento8['TotalCessao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento9['TotalCompartilhamento']; ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento9['TotalCompartilhamento']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center" bgcolor="<?php echo $cor; ?>"><font size="-1"><?php echo $linhaEquipamento10['Total']; ?></font></td>
    </tr>
   <?php } ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center">&nbsp;</td>
    <td align="center"><font size="-1"><strong>Total</strong></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentocps,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porccpstotal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentofat,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcfattotal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentoapm,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcapmtotal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentocooperativaescola,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porccoopescolartotal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentodoacao,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcdoacaototal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentoemprestimo,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcemprestimototal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentocessao,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porccessaototal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($totalequipamentocompartilhamento,0); ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porccompartilhamentototal,2).'%'; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalequipamentototal; ?></font></td>
    </tr>
 
</table>
</div>

  <p>
    <?php }
  
 if($tipoinformacao=="AquisicaoEspecial"){
   ?>
    
  <strong><center>Forma de aquisição nos casos de Doação, Empréstimo, Cessão e Compartilhamento</center></strong>
<div class="demo_jui" style="max-width:933px">  
<table width="933" border="1" cellpadding="0" cellspacing="0" class="display" id="example">
<thead>
  <tr>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Instituição</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Equipamento</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Prefeitura</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">ONG</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Sindicato</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Fundação</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Associação</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Órgãos de Classe</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Outro Órgão   Público</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Empresa Privada</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Outros</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th align="center" bgcolor="#D6D6D6"><font size="-1">Total</font></th>
    </tr>
</thead>
<tbody>
  <?php 
  $clausula='';
  if($nomeunidade!="Todos"){
	$clausula.=" and tbl_material.FK_Instituicao='$nomeunidade'";  
	  }
	  
  if($ambientealocado!="Todos"){
	$clausula.=" and tbl_material.FK_EspacoFisico='$ambientealocado'";  
	  }
	  
  if($periodo!="Todos"){

	$clausula.=" and tbl_material.FK_Equipamento='$periodo'";  
	  } 
 
 
 
  $sqlEquipamento="select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_FormaAquisicao>=5 group by tbl_material.FK_Equipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
  $qryEquipamento=mysql_query($sqlEquipamento)or die(mysql_error());
  while($linhaEquipamento=mysql_fetch_array($qryEquipamento)){
  
$sqlEquipamento2="select *,sum(tbl_material.Quantidade) as TotalCPS from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Prefeitura'";
  $qryEquipamento2=mysql_query($sqlEquipamento2);
  $linhaEquipamento2=mysql_fetch_array($qryEquipamento2);
  
 
$sqlEquipamento3="select *,sum(tbl_material.Quantidade) as TotalFat from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='ONG'";
  $qryEquipamento3=mysql_query($sqlEquipamento3);
  $linhaEquipamento3=mysql_fetch_array($qryEquipamento3);  
  
$sqlEquipamento4="select *,sum(tbl_material.Quantidade) as TotalAPM from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Sindicato'";
$qryEquipamento4=mysql_query($sqlEquipamento4);
$linhaEquipamento4=mysql_fetch_array($qryEquipamento4);  
  
  
$sqlEquipamento5="select *,sum(tbl_material.Quantidade) as TotalCooperativaEscola from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Fundacao'";
$qryEquipamento5=mysql_query($sqlEquipamento5);
$linhaEquipamento5=mysql_fetch_array($qryEquipamento5);


$sqlEquipamento6="select *,sum(tbl_material.Quantidade) as TotalDoacao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Associacao'";
$qryEquipamento6=mysql_query($sqlEquipamento6);
$linhaEquipamento6=mysql_fetch_array($qryEquipamento6);


$sqlEquipamento7="select *,sum(tbl_material.Quantidade) as TotalEmprestimo from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Orgaos de Classe'";
$qryEquipamento7=mysql_query($sqlEquipamento7);
$linhaEquipamento7=mysql_fetch_array($qryEquipamento7);


$sqlEquipamento8="select *,sum(tbl_material.Quantidade) as TotalCessao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Outro Orgao Publico'";
$qryEquipamento8=mysql_query($sqlEquipamento8);
$linhaEquipamento8=mysql_fetch_array($qryEquipamento8);


$sqlEquipamento9="select *,sum(tbl_material.Quantidade) as TotalCompartilhamento from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Empresa Privada'";
$qryEquipamento9=mysql_query($sqlEquipamento9);
$linhaEquipamento9=mysql_fetch_array($qryEquipamento9);

$sqlEquipamento11="select *,sum(tbl_material.Quantidade) as TotalOutros from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Detalhe_Aquisicao='Outros'";
$qryEquipamento11=mysql_query($sqlEquipamento11);
$linhaEquipamento11=mysql_fetch_array($qryEquipamento11);


 
 
$sqlEquipamento10="select *,sum(tbl_material.Quantidade) as Total from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_FormaAquisicao>=5 ";
$qryEquipamento10=mysql_query($sqlEquipamento10);
$linhaEquipamento10=mysql_fetch_array($qryEquipamento10); 

  if($cor=="#FFFFFF"){
$cor="#E8E8E8";	
	}else{
$cor="#FFFFFF";		
		}
$totalPrefeitura=$totalPrefeitura+$linhaEquipamento2['TotalCPS'];
$totalONG=$totalONG+$linhaEquipamento3['TotalFat'];
$totalSindicato=$totalSindicato+$linhaEquipamento4['TotalAPM'];
$totalFundacao=$totalFundacao+$linhaEquipamento5['TotalCooperativaEscola'];
$totalAssociacao=$totalAssociacao+$linhaEquipamento6['TotalDoacao'];
$totalOrgaoClasse=$totalOrgaoClasse+$linhaEquipamento7['TotalEmprestimo'];
$totalOrgaoPublico=$totalOrgaoPublico+$linhaEquipamento8['TotalCessao'];
$totalEmpresaPrivada=$totalEmpresaPrivada+$linhaEquipamento9['TotalCompartilhamento'];
$totalOutros=$totalOutros+$linhaEquipamento11['TotalOutros'];
$totaltotalaquisicaoespecial=$totaltotalaquisicaoespecial+$linhaEquipamento10['Total'];

//----------------------Valores em porcentagem-------------------------//
$porcPrefeitura=($totalPrefeitura*100)/$totaltotalaquisicaoespecial;
$porcONG=($totalONG*100)/$totaltotalaquisicaoespecial;
$porcSindicato=($totalSindicato*100)/$totaltotalaquisicaoespecial;
$porcfundacao=($totalFundacao*100)/$totaltotalaquisicaoespecial;
$porcAssociacao=($totalAssociacao*100)/$totaltotalaquisicaoespecial;
$porcOrgaoclasse=($totalOrgaoClasse*100)/$totaltotalaquisicaoespecial;
$porcOrgaopublico=($totalOrgaoPublico*100)/$totaltotalaquisicaoespecial;
$porcempresprivada=($totalEmpresaPrivada*100)/$totaltotalaquisicaoespecial;
$porcoutros=($totalOutros*100)/$totaltotalaquisicaoespecial;


  ?>
  <tr bgcolor="<?php echo $cor; ?>">
  	<td height="23" align="center"><font size="-1"><?php echo $linhaEquipamento['Etec']; ?></font></td>
    <td height="23" align="center"><font size="-1"><?php echo $linhaEquipamento['Tipo_Equipamento']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento2['TotalCPS']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento2['TotalCPS']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento3['TotalFat']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento3['TotalFat']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento4['TotalAPM']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento4['TotalAPM']*100)/$linhaEquipamento10['Total'],2)." %"; }?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento5['TotalCooperativaEscola']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento5['TotalCooperativaEscola']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento6['TotalDoacao']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento6['TotalDoacao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento7['TotalEmprestimo']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento7['TotalEmprestimo']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento8['TotalCessao']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento8['TotalCessao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento9['TotalCompartilhamento']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento9['TotalCompartilhamento']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento11['TotalOutros']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento11['TotalOutros']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento10['Total']; ?></font></td>
    </tr>
    <?php } ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td height="23" align="center"><strong><font size="-1">Total</font></strong></td>
    <td align="center"><font size="-1"><?php echo $totalPrefeitura; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcPrefeitura,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalONG; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcONG,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSindicato; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcSindicato,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalFundacao; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcfundacao,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalAssociacao; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcAssociacao,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalOrgaoClasse; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcOrgaoclasse,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalOrgaoPublico; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcOrgaopublico,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalEmpresaPrivada; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcempresprivada,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalOutros; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcoutros,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totaltotalaquisicaoespecial; ?></font></td>
    </tr>

</table>
</div>
 
    <?php }
  
  if($tipoinformacao=="AnoAquisicao"){
   ?>
<strong><center>Ano Aquisição</center></strong>
  <div class="demo_jui" style="max-width:933"> 
<table width="933" border="1" cellpadding="0" cellspacing="0" class="display" id="example">
  <thead>
  <tr>
    <th width="68" align="center" bgcolor="#D6D6D6"><font size="-1">Instituição</font></th>
    <th width="116" align="center" bgcolor="#D6D6D6"><font size="-1">Equipamento</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">Anterior a 2005</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2006</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2007</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2008</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2009</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2010</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2011</font></th>
    <th width="35" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="48" align="center" bgcolor="#D6D6D6"><font size="-1">2012</font></th>
    <th width="30" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="50" align="center" bgcolor="#D6D6D6"><font size="-1">Total</font></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $clausula='';
  if($nomeunidade!="Todos"){
	$clausula.=" and tbl_material.FK_Instituicao='$nomeunidade'";  
	  }
	  
  if($ambientealocado!="Todos"){
	$clausula.=" and tbl_material.FK_EspacoFisico='$ambientealocado'";  
	  }
	  
  if($periodo!="Todos"){
	$clausula.=" and tbl_material.FK_Equipamento='$periodo'";  
	  } 
 
   if($ano2!="Todos"){
	$clausula.=" and tbl_material.Ano_Aquisicao='$ano2'";  
	  }
 
    $sqlEquipamento="select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." group by tbl_material.FK_Equipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
  $qryEquipamento=mysql_query($sqlEquipamento)or die(mysql_error());
  while($linhaEquipamento=mysql_fetch_array($qryEquipamento)){
  
$sqlEquipamento2="select *,sum(tbl_material.Quantidade) as TotalCPS from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='anterior 2'";
  $qryEquipamento2=mysql_query($sqlEquipamento2);
  $linhaEquipamento2=mysql_fetch_array($qryEquipamento2);
  
 
$sqlEquipamento3="select *,sum(tbl_material.Quantidade) as TotalFat from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2006'";
  $qryEquipamento3=mysql_query($sqlEquipamento3);
  $linhaEquipamento3=mysql_fetch_array($qryEquipamento3);  
  
$sqlEquipamento4="select *,sum(tbl_material.Quantidade) as TotalAPM from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2007'";
$qryEquipamento4=mysql_query($sqlEquipamento4);
$linhaEquipamento4=mysql_fetch_array($qryEquipamento4);  
  
  
$sqlEquipamento5="select *,sum(tbl_material.Quantidade) as TotalCooperativaEscola from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2008'";
$qryEquipamento5=mysql_query($sqlEquipamento5);
$linhaEquipamento5=mysql_fetch_array($qryEquipamento5);


$sqlEquipamento6="select *,sum(tbl_material.Quantidade) as TotalDoacao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2009'";
$qryEquipamento6=mysql_query($sqlEquipamento6);
$linhaEquipamento6=mysql_fetch_array($qryEquipamento6);


$sqlEquipamento7="select *,sum(tbl_material.Quantidade) as TotalEmprestimo from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2010'";
$qryEquipamento7=mysql_query($sqlEquipamento7);
$linhaEquipamento7=mysql_fetch_array($qryEquipamento7);


$sqlEquipamento8="select *,sum(tbl_material.Quantidade) as TotalCessao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2011'";
$qryEquipamento8=mysql_query($sqlEquipamento8);
$linhaEquipamento8=mysql_fetch_array($qryEquipamento8);


$sqlEquipamento9="select *,sum(tbl_material.Quantidade) as TotalCompartilhamento from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2012'";
$qryEquipamento9=mysql_query($sqlEquipamento9);
$linhaEquipamento9=mysql_fetch_array($qryEquipamento9);


 
 
$sqlEquipamento10="select *,sum(tbl_material.Quantidade) as Total from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']."";
$qryEquipamento10=mysql_query($sqlEquipamento10);
$linhaEquipamento10=mysql_fetch_array($qryEquipamento10); 

   if($cor=="#FFFFFF"){
$cor="#E8E8E8";	
	}else{
$cor="#FFFFFF";		
		}
		
$total2005=$total2005+$linhaEquipamento2['TotalCPS'];
$total2006=$total2006+$linhaEquipamento3['TotalFat'];
$total2007=$total2007+$linhaEquipamento4['TotalAPM'];
$total2008=$total2008+$linhaEquipamento5['TotalCooperativaEscola'];
$total2009=$total2009+$linhaEquipamento6['TotalDoacao'];
$total2010=$total2010+$linhaEquipamento7['TotalEmprestimo'];
$total2011=$total2011+$linhaEquipamento8['TotalCessao'];
$total2012=$total2012+$linhaEquipamento9['TotalCompartilhamento'];
$totaltotal=$totaltotal+$linhaEquipamento10['Total'];

//-------------------Valor total de porcentagem-------------------//
$porc2005=($total2005*100)/$totaltotal;
$porc2006=($total2006*100)/$totaltotal;
$porc2007=($total2007*100)/$totaltotal;
$porc2008=($total2008*100)/$totaltotal;
$porc2009=($total2009*100)/$totaltotal;
$porc2010=($total2010*100)/$totaltotal;
$porc2011=($total2011*100)/$totaltotal;
$porc2012=($total2012*100)/$totaltotal;

  ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center"><font size="-1"><?php echo $linhaEquipamento['Etec']; ?></font></td>
    <td height="23" align="center"><font size="-1"><?php echo $linhaEquipamento['Tipo_Equipamento']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento2['TotalCPS']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento2['TotalCPS']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento3['TotalFat']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento3['TotalFat']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento4['TotalAPM']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento4['TotalAPM']*100)/$linhaEquipamento10['Total'],2)." %"; }?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento5['TotalCooperativaEscola']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento5['TotalCooperativaEscola']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento6['TotalDoacao']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento6['TotalDoacao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento7['TotalEmprestimo']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento7['TotalEmprestimo']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento8['TotalCessao']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento8['TotalCessao']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento9['TotalCompartilhamento']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento9['TotalCompartilhamento']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento10['Total']; ?></font></td>
    </tr>
      <?php } ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center">&nbsp;</td>
    <td height="23" align="center"><font size="-1"><strong>Total</strong></font></td>
    <td align="center"><font size="-1"><?php echo $total2005;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2005,2)." %"; ?></td>
    <td align="center"><font size="-1"><?php echo $total2006;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2006,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2007;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2007,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2008;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2008,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2009;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2009,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2010;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2010,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2011;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2011,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $total2012;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porc2012,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totaltotal; ?></font></td>
    </tr>

</table>
</div>
     <?php }

  if($tipoinformacao=="OciosidadeEquipamento"){
   ?>
    <center><strong>Ociosidade do Equipamento</strong></center>
  <div class="demo_jui" style="max-width:933px"> 
<table width="933" border="1" cellpadding="0" cellspacing="0" class="display" id="example">
  <thead>
  <tr>
    <th width="334" align="center" bgcolor="#D6D6D6"><font size="-1">Instituição</font></th>
    <th width="720" align="center" bgcolor="#D6D6D6"><font size="-1">Equipamento</font></th>
    <th width="81" align="center" bgcolor="#D6D6D6"><font size="-1">Sim</font></th>
    <th width="58" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="56" align="center" bgcolor="#D6D6D6"><font size="-1">Não</font></th>
    <th width="42" align="center" bgcolor="#D6D6D6"><font size="-1">%</font></th>
    <th width="95" align="center" bgcolor="#D6D6D6"><font size="-1">Total</font></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $clausula='';
  if($nomeunidade!="Todos"){
	$clausula.=" and tbl_material.FK_Instituicao='$nomeunidade'";  
	  }
	  
  if($ambientealocado!="Todos"){
	$clausula.=" and tbl_material.FK_EspacoFisico='$ambientealocado'";  
	  }
	  
  if($periodo!="Todos"){
	$clausula.=" and tbl_material.FK_Equipamento='$periodo'";  
	  } 
	  
  if($ociosidade!="Todos"){
	$clausula.=" and tbl_material.Ociosidade='$ociosidade'";  
	  }		  
 
 
 
    $sqlEquipamento="select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." group by tbl_material.FK_Equipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
  $qryEquipamento=mysql_query($sqlEquipamento)or die(mysql_error());
  while($linhaEquipamento=mysql_fetch_array($qryEquipamento)){
  
$sqlEquipamento2="select *,sum(tbl_material.Quantidade) as TotalCPS from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ociosidade='1'";
  $qryEquipamento2=mysql_query($sqlEquipamento2);
  $linhaEquipamento2=mysql_fetch_array($qryEquipamento2);
  
 
$sqlEquipamento3="select *,sum(tbl_material.Quantidade) as TotalFat from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ociosidade='2'";
  $qryEquipamento3=mysql_query($sqlEquipamento3);
  $linhaEquipamento3=mysql_fetch_array($qryEquipamento3);  
  
$sqlEquipamento4="select *,sum(tbl_material.Quantidade) as TotalAPM from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2007'";
$qryEquipamento4=mysql_query($sqlEquipamento4);
$linhaEquipamento4=mysql_fetch_array($qryEquipamento4);  
  
  
$sqlEquipamento5="select *,sum(tbl_material.Quantidade) as TotalCooperativaEscola from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2008'";
$qryEquipamento5=mysql_query($sqlEquipamento5);
$linhaEquipamento5=mysql_fetch_array($qryEquipamento5);


$sqlEquipamento6="select *,sum(tbl_material.Quantidade) as TotalDoacao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2009'";
$qryEquipamento6=mysql_query($sqlEquipamento6);
$linhaEquipamento6=mysql_fetch_array($qryEquipamento6);


$sqlEquipamento7="select *,sum(tbl_material.Quantidade) as TotalEmprestimo from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2010'";
$qryEquipamento7=mysql_query($sqlEquipamento7);
$linhaEquipamento7=mysql_fetch_array($qryEquipamento7);


$sqlEquipamento8="select *,sum(tbl_material.Quantidade) as TotalCessao from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2011'";
$qryEquipamento8=mysql_query($sqlEquipamento8);
$linhaEquipamento8=mysql_fetch_array($qryEquipamento8);


$sqlEquipamento9="select *,sum(tbl_material.Quantidade) as TotalCompartilhamento from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.Ano_Aquisicao='2012'";
$qryEquipamento9=mysql_query($sqlEquipamento9);
$linhaEquipamento9=mysql_fetch_array($qryEquipamento9);


 
 
$sqlEquipamento10="select *,sum(tbl_material.Quantidade) as Total from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']."";
$qryEquipamento10=mysql_query($sqlEquipamento10);
$linhaEquipamento10=mysql_fetch_array($qryEquipamento10); 

    if($cor=="#FFFFFF"){
$cor="#E8E8E8";	
	}else{
$cor="#FFFFFF";		
		}

$totalociososim=$totalociososim+$linhaEquipamento2['TotalCPS'];
$totalociosonao=$totalociosonao+$linhaEquipamento3['TotalFat'];
$totaltotalociosidade=$totaltotalociosidade+$linhaEquipamento10['Total'];


$porcociososim=($totalociososim*100)/$totaltotalociosidade;
$porcociosonao=($totalociosonao*100)/$totaltotalociosidade;
		

  ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center"><font size="-1"><?php echo $linhaEquipamento['Etec']; ?></font></td>
    <td height="23" align="center"><font size="-1"><?php echo $linhaEquipamento['Tipo_Equipamento']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento2['TotalCPS']; ?></font></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento2['TotalCPS']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento3['TotalFat']; ?></font></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento3['TotalFat']*100)/$linhaEquipamento10['Total'],2)." %";} ?></font></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento10['Total']; ?></font></td>
    </tr>  <?php } ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center">&nbsp;</td>
    <td height="23" align="center"><strong><font size="-1">Total</font></strong></td>
    <td align="center"><font size="-1"><?php echo $totalociososim;?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcociososim,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalociosonao; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcociosonao,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totaltotalociosidade; ?></font></td>
    </tr>

</table>
</div>
  
    <?php }
  
  if($tipoinformacao=="AtualizacaoTecnologica"){
   ?>
    
  <strong><center>Atualização Tecnológica</center></strong>
    <div class="demo_jui" style="max-width:933px"> 
<table width="933" border="1" cellpadding="0" cellspacing="0" class="display" id="example">
  <thead>
  <tr>
    <th align="center"><font size="-1">Instituição</font></th>
    <th align="center" ><font size="-1"><font size="-1">Equipamento</font></th>
    <th align="center" ><font size="-1">Tecnologia de    Ponta</font></th>
    <th align="center" ><font size="-1">%</font></th>
    <th align="center" ><font size="-1">Atual</font></th>
    <th align="center" ><font size="-1">%</font></th>
    <th align="center" ><font size="-1">Antigo, mas não    obsoleto</font></th>
    <th align="center" ><font size="-1">%</font></th>
    <th align="center" ><font size="-1">Obsoleto</font></th>
    <th align="center" ><font size="-1">%</font></th>
    <th align="center" ><font size="-1">Total</font></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $clausula='';
  if($nomeunidade!="Todos"){
	$clausula.=" and tbl_material.FK_Instituicao='$nomeunidade'";  
	  }
	  
  if($ambientealocado!="Todos"){
	$clausula.=" and tbl_material.FK_EspacoFisico='$ambientealocado'";  
	  }
	  
  if($periodo!="Todos"){
	$clausula.=" and tbl_material.FK_Equipamento='$periodo'";  
	  } 
 
  if($atualizacaotecnologica!="Todos"){
	$clausula.=" and tbl_material.FK_AtualizacaoTecnologia='$atualizacaotecnologica'";  
	  } 
 
 
    $sqlEquipamento="select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." group by tbl_material.FK_Equipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
  $qryEquipamento=mysql_query($sqlEquipamento)or die(mysql_error());
  while($linhaEquipamento=mysql_fetch_array($qryEquipamento)){
  
$sqlEquipamento2="select *,sum(tbl_material.Quantidade) as TotalCPS from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_AtualizacaoTecnologia=1";
  $qryEquipamento2=mysql_query($sqlEquipamento2);
  $linhaEquipamento2=mysql_fetch_array($qryEquipamento2);
  
 
$sqlEquipamento3="select *,sum(tbl_material.Quantidade) as TotalFat from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_AtualizacaoTecnologia=2";
  $qryEquipamento3=mysql_query($sqlEquipamento3);
  $linhaEquipamento3=mysql_fetch_array($qryEquipamento3);  
  
$sqlEquipamento4="select *,sum(tbl_material.Quantidade) as TotalAPM from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_AtualizacaoTecnologia=3";
$qryEquipamento4=mysql_query($sqlEquipamento4);
$linhaEquipamento4=mysql_fetch_array($qryEquipamento4);  
  
  
$sqlEquipamento5="select *,sum(tbl_material.Quantidade) as TotalCooperativaEscola from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']." and tbl_material.FK_AtualizacaoTecnologia=4";
$qryEquipamento5=mysql_query($sqlEquipamento5);
$linhaEquipamento5=mysql_fetch_array($qryEquipamento5);


$sqlEquipamento10="select *,sum(tbl_material.Quantidade) as Total from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where 1 ".$clausula." and tbl_material.FK_Equipamento=".$linhaEquipamento['FK_Equipamento']."";
$qryEquipamento10=mysql_query($sqlEquipamento10);
$linhaEquipamento10=mysql_fetch_array($qryEquipamento10); 

   if($cor=="#FFFFFF"){
$cor="#E8E8E8";	
	}else{
$cor="#FFFFFF";		
		}

$totalTecnologiaPonta=$totalTecnologiaPonta+$linhaEquipamento2['TotalCPS'];
$totalatual=$totalatual+$linhaEquipamento3['TotalFat'];
$totalantigonobsoleto=$totalantigonobsoleto+$linhaEquipamento4['TotalAPM'];
$totalobsoleto=$totalobsoleto+$linhaEquipamento5['TotalCooperativaEscola'];	
$totaltotalaquisicaoespecial=$totaltotalaquisicaoespecial+$linhaEquipamento10['Total'];

//-----------------porcentagem de cada valor de aquisição especial-------------//
$porcTecnologiaPonta=($totalTecnologiaPonta*100)/$totaltotalaquisicaoespecial;
$porcatual=($totalatual*100)/$totaltotalaquisicaoespecial;
$porcAntigonObsoleto=($totalantigonobsoleto*100)/$totaltotalaquisicaoespecial;
$porcObsoleto=($totalobsoleto*100)/$totaltotalaquisicaoespecial;

  ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center"><font size="-1"><?php echo $linhaEquipamento['Etec']; ?></font></td>
    <td height="23" align="center"><font size="-1"><?php echo $linhaEquipamento['Tipo_Equipamento']; ?></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento2['TotalCPS']; ?></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento2['TotalCPS']*100)/$linhaEquipamento10['Total'],2)." %";} ?></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento3['TotalFat']; ?></td>
    <td align="center"><font size="-1"><?php
	if ($linhaEquipamento10['Total']!=0){
	 echo round(($linhaEquipamento3['TotalFat']*100)/$linhaEquipamento10['Total'],2)." %";} ?></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento4['TotalAPM']; ?></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento4['TotalAPM']*100)/$linhaEquipamento10['Total'],2)." %"; }?></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento5['TotalCooperativaEscola']; ?></td>
    <td align="center"><font size="-1"><?php 
	if ($linhaEquipamento10['Total']!=0){
	echo round(($linhaEquipamento5['TotalCooperativaEscola']*100)/$linhaEquipamento10['Total'],2)." %";} ?></td>
    <td align="center"><font size="-1"><?php echo $linhaEquipamento10['Total']; ?></td>
    </tr>  <?php } ?>
  <tr bgcolor="<?php echo $cor; ?>">
    <td align="center">&nbsp;</td>
    <td height="23" align="center"><font size="-1"><strong>Total</strong></font></td>
    <td align="center"><font size="-1"><?php echo $totalTecnologiaPonta; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcTecnologiaPonta,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalatual; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcatual,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalantigonobsoleto; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcAntigonObsoleto,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalobsoleto; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format($porcObsoleto,2)." %"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totaltotalaquisicaoespecial; ?></font></td>
    </tr>

</table>
<p>
  <?php } ?>
  

  
  <script type="text/javascript">
		$(function () {
    var chart;
    $(document).ready(function() {	
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: '<?php echo $linhaetec['Etec']; ?>'
            },
            xAxis: {
                categories: [
<?php 
		if($tipoinformacao=="AnoAquisicao"){
?>	
				'Anterior a 2005',
				'2006',
				'2007',
				'2008',
				'2009',
				'2010',
				'2011',
				'2012'
	
	
<?php 
}

		if($tipoinformacao=="OciosidadeEquipamento"){  
?>
				'Sim',
				'Não'
			
<?php }

		if($tipoinformacao=="AtualizacaoTecnologica"){  
?>
				'Tecnologia de Ponta',
				'Atual',
				'Antigo, mas não obsoleto',
				'Obsoleto'
			
<?php
			}
	
		if($tipoinformacao=="FormaAquisicao"){ 
		
?>
				'CPS',
				'FAT',
				'APM',
				'Coop. Escolar',
				'Doação',
                'Empréstimo',
				'Cessão',
				'Compartilhamento' 
				
		<?php
		}
		if( $tipoinformacao=="AquisicaoEspecial"){	
		?>
				'Prefeitura',
				'ONG',
				'Sindicato',
				'Fundação',
				'Associação',
                'Órgãos de Classe',
				'Outro Órgão Público',
				'Empresa Privada',
				'Outros' 
		<?php } ?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '%'
                }
            },
            legend: {
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' %';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
			
			
                series: [{
                name: '<?php 
				if( $tipoinformacao=="AtualizacaoTecnologica"){  
				echo "Atualização Tecnologica";	
					}
				
				
				if( $tipoinformacao=="AquisicaoEspecial"){
					echo "Forma de Aquisição Especial"; }
				
				if( $tipoinformacao=="FormaAquisicao"){
				echo "Forma de Aquisição";}
				
				if( $tipoinformacao=="AnoAquisicao"){
				echo "Ano de Aquisição";}
				
				if( $tipoinformacao=="OciosidadeEquipamento"){  
				echo "Ociosidade";
				}
				
				 ?>',
                data: [<?php 
					if( $tipoinformacao=="AtualizacaoTecnologica"){  
				
					echo number_format($porcTecnologiaPonta,2);
					?>,<?php
					
					echo number_format($porcatual,2);
					?>,<?php
					
					echo number_format($porcAntigonObsoleto,2);
					?>,<?php
					
					echo number_format($porcObsoleto,2);
					
					}
				
				
					
					if( $tipoinformacao=="OciosidadeEquipamento"){  
					echo number_format($porcociososim,2);
					?>,<?php
					
					echo number_format($porcociosonao,2);
					
					
					
					}
				
				
					if( $tipoinformacao=="AnoAquisicao"){
					
					echo number_format($porc2005,2);
					?>,<?php
					
					echo number_format($porc2006,2);
					?>,<?php
					
					echo number_format($porc2007,2);
					?>,<?php
					
					echo number_format($porc2008,2);
					?>,<?php
					
					echo number_format($porc2009,2);
					?>,<?php
					
					echo number_format($porc2010,2);
					?>,<?php 
					
					echo number_format($porc2011,2);
					?>,<?php
					
					echo number_format($porc2012,2);	
						
						
					}
				
				
				
				
					if( $tipoinformacao=="AquisicaoEspecial"){
						echo number_format($porcPrefeitura,2);
						?>,<?php
						
						echo number_format($porcONG,2);
						?>,<?php 
						
						echo number_format($porcSindicato,2);
						?>,<?php
						
						echo number_format($porcfundacao,2);
						?>,<?php
						
						echo number_format($porcAssociacao,2);
						?>,<?php
						
						echo number_format($porcOrgaoclasse,2);
						?>,<?php
						
						echo number_format($porcOrgaopublico,2);
						?>,<?php
						
						echo number_format($porcempresprivada,2);
						?>,<?php
						
						echo number_format($porcoutros,2);
					
					}
					
					if( $tipoinformacao=="FormaAquisicao"){		
					echo number_format($porccpstotal,2);
					?>,<?php
					
					echo number_format($porcfattotal,2);
					?>,<?php
					
					echo number_format($porcapmtotal,2);
					?>,<?php 
					
					echo number_format($porccoopescolartotal,2); 
					?>,<?php
					
					echo number_format($porcdoacaototal,2);
					?>,<?php
					
					echo number_format($porcemprestimototal,2); 
					?>,<?php
					
					echo number_format($porccessaototal,2);
					?>,<?php
					
					echo number_format($porccompartilhamentototal,2);
					}
					?>
				
				]
		

				
			
	
    
            }]
    
            
        });
    });
    
});

		
		
		
	
		</script>        
        

<div id="container" style="width:933px;min-width: 400px; height: 400px; margin: 0 auto"></div>
<?php include "footer.html";?>
</body>
</html>