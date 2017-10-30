<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Relatório - Mapeamento</title>
<script>
function zerarparametro(){
	
	document.getElementById('txt_espacofisico').value="";
	document.getElementById('txt_equipamento').value="";
	document.forms["form1"].submit();
	}
	
	function zerarparametro2(){
	

	document.getElementById('txt_equipamento').value="";
	document.forms["form1"].submit();
	}
	


</script>
<?php

?>
<?php include "conexao.php";
include "topo.php";
include("testemenu.php");

if(isset($_GET['codetec'])){
$codetec=$_GET['codetec'];	
	
}else{
	
$codetec='';	
	}
$us= base64_decode($us);

$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$fketec=$linhap['FK_Etec'];
	$us=base64_encode($us);
if ($medio=="Administrador"){
	include "menu.php";
	}else{
	$us=base64_encode($us);
include ("menu_usuario.php");

		}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php 
include "conexao.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];

//if(isset($_GET['acao']))
//$acao =$_GET['acao'];


//if ($acao!="adc"){


$equipamento='';

$laboratorio='';

$etecrel='';
	
?>
<form id="form1" name="form1" method="post" action="op_detalhamentoequipamento.php?us=<?php //$us= base64_decode($us); 
echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td colspan="2" align="center"><strong>Relatório</strong></td>
    </tr>
    <tr>
      <td align="left"><strong>Etec</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left"><label>
        <select name="txt_etec" id="txt_etec"  onchange="zerarparametro()" >
          <option value="" <?php if (!(strcmp("", $codetec))) {echo "selected=\"selected\"";} ?>></option>
          <?php
 mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		
	
		
		if ($medio!="Administrador"){

		  
		  $sqletec="select * from tbl_etec where `PK_CodEtec`='$fketec' order by Etec";	
		  $qryetec=mysql_query($sqletec);
		  $linhaetec=mysql_fetch_array($qryetec);
		  $etecsede=$linhaetec['Codigo_etecsede'];	
		  	  
			
		  $sqletecre="select * from tbl_etec where Codigo_etecsede='$etecsede' order by Etec";
		  $comandoetecre=mysql_query($sqletecre);
		  $us= base64_encode($us);
		  }else{	
		  $sqletecre="select * from tbl_etec order by Etec";
		  $comandoetecre=mysql_query($sqletecre);
		  $us= base64_encode($us);
		  
			  
		  
			  }
  while($linhaetecre=mysql_fetch_array($comandoetecre)){
		?>
          <option value="<?php echo $linhaetecre['PK_CodEtec']?>" value="<?php echo $linhaetecre['PK_CodEtec']?>"<?php if (!(strcmp($linhaetecre['PK_CodEtec'],$etecrel))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp($linhaetecre['PK_CodEtec'], $codetec))) {echo "selected=\"selected\"";} ?>>
          <?php echo $linhaetecre['Etec']?>
          </option>
          <?php }
				
			?>
          </select>
      </label></td>
    </tr>
    <tr>
      <td align="left"><strong>Espaço Físico</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><label>
        <select name="txt_espacofisico" id="txt_espacofisico" onchange="zerarparametro2()">
          <option value=""></option>
          <?php
		  	         	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		  if($medio!="Administrador"){
	$sql="select * from tbl_espaco_fisico where `FK_Instituicao`='$codetec'";
	$comando=mysql_query($sql) ;			  
			  
			  }  else{
		  		
	$sql="select * from tbl_espaco_fisico where `FK_Instituicao`='$codetec'";
	$comando=mysql_query($sql) ;


		  $comando=mysql_query($sql);}
		  	if(isset($_GET['lab'])){
		
		$laboratorio=$_GET['lab'];
		}
  while($linha=mysql_fetch_array($comando)){
		?>
          <option value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$laboratorio))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Descricao']?></option>
          <?php } ?>
          </select>
      </label></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><strong>Nome Equipamento</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="667" align="left"><label>
        <select name="txt_equipamento" id="txt_equipamento" >
          <option value=""></option>
          <?php
		$sqlmaterial="select * from tbl_material where `FK_Instituicao`='$codetec'";
		if (isset($_GET['lab'])){
			$lab=$_GET['lab'];
			$sqlmaterial="select * from tbl_cadastro_equipamento inner join tbl_material on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where tbl_material.FK_Instituicao='$codetec' and tbl_material.FK_EspacoFisico='$lab'  group by tbl_cadastro_equipamento.PK_CadastroEquipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";
			
			}
		$comandomaterial=mysql_query($sqlmaterial);
		while($linhamaterial=mysql_fetch_array($comandomaterial)){
		$eqpfk=$linhamaterial['FK_Equipamento'];
		
		$sqlnome="select * from tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$eqpfk'";
		$comandonome=mysql_query($sqlnome);
		$linhanome=mysql_fetch_array($comandonome);
		?>
          <option value="<?php echo $linhamaterial['PK_CodMaterial']?>"<?php if (!(strcmp($linhamaterial['PK_CodMaterial'],$equipamento))) {echo "selected=\"selected\"";} ?>><?php echo $linhamaterial['Tipo_Equipamento']?></option>
          <?php } ?>        
          </select>
      </label></td>
      <td width="253">&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="Relatório" id="Relatório" value="Pesquisar" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
<?php
include "footer.html";
?>
</html>

