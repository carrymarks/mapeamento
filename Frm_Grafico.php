<script>

function enviar() {
	document.forms['form1'].submit();
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Relatório de Ociosidade</title>
<?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";


	if (isset($_GET['us'])){
		$us=$_GET['us'];
		}

	$us=base64_decode($us);

	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$etec =$linha['FK_Etec'];
	$medio=$linha['Nivel_Acesso'];
$fketec=$linha['FK_Etec'];
$us=base64_encode($us);
$us=base64_encode($us);
if($medio!="Administrador"){

include ("menu_usuario.php");


	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
?>

</head>

<body>
<?php
include "phplot.php";

if(isset($_POST['lstFiltro'])){
$tipoFiltro = $_POST['lstFiltro'];}else{
$tipoFiltro='';	
	}
	
	
if(isset($_GET['codetec'])){
$etec=$_GET['codetec'];	
	}
		

$laboratorio='';

if(isset($_GET['esfis'])){
$espacofisico=$_GET['esfis'];	
	}else{
$espacofisico='';		
		}	
		
	

if (isset($_POST['txt_etec'])){
$etec=$_POST['txt_etec'];

/*echo "<script>location.href='Frm_Grafico.php?us=$us&codetec=$etec'</script>";*/

//Header("Location:");
	}

if(isset($_POST['txt_espacofisico'])){
$espacofisico=$_POST['txt_espacofisico'];	

echo "<script>location.href='Frm_Grafico.php?us=$us&codetec=$etec&esfis=$espacofisico'</script>";
//header("Location:Frm_Grafico.php?us=$us&codetec=$etec&esfis=$espacofisico");
}	



 ?>
<form id="form1" name="form1" method="post" action="">
  <table width="930">
    <tr>
      <td colspan="2" align="center" bgcolor="#D6D6D6"><strong>Gráfico de Ociosidade</strong></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="518"><strong>Etec</strong></td>
      <td width="390">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><select name="txt_etec" style="width:500px" id="txt_etec" title="Nome da etec e município" onchange="enviar()" >
        <?php 
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		
		$us=base64_decode($us);

		if($medio!="Administrador"){
			
		$sqlex="select * from tbl_etec where `PK_CodEtec`='$fketec'";
		$comandoex=mysql_query($sqlex);
		 $us= base64_encode($us);
		$linhaex=mysql_fetch_array($comandoex); 
		$codigoSede=$linhaex['Codigo_etecsede'];
		
		
		$sqlEtec="select * from tbl_etec where Codigo_etecsede='$codigoSede' order by Etec";
		$qrySede=mysql_query($sqlEtec);
		 $us= base64_encode($us);
		while($linhaSede=mysql_fetch_array($qrySede)){
		
		?>
        <option value="<?php echo $linhaSede['PK_CodEtec']?>" <?php if (!(strcmp($linhaSede['PK_CodEtec'],$etec))) {echo "selected=\"selected\"";} ?>><?php echo $linhaSede['Etec']?></option>
        <?php } ?>
      </select> </label></td>
      <?php       
        }else{
			
			////////////////////////////////
			// se for adiministrador
		
		
			////////////////////////////////
			
		$sqlex="select * from tbl_etec order by Etec";
		$comandoex=mysql_query($sqlex);
		 $us= base64_encode($us); }
		while($linhaex=mysql_fetch_array($comandoex)){
		if (isset($_get['codetec'])){
			$nome=$_get['codetec'];
			}
		?>
		
   <option value="<?php echo $linhaex['PK_CodEtec']?>"<?php if (!(strcmp($linhaex['PK_CodEtec'],$etec))) {echo "selected=\"selected\"";} ?>><?php echo $linhaex['Etec']?></option>
        <?php } ?>
      <td width="1">&nbsp;</td>
      <td width="1">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong>Espaço Físico</strong></td>
    </tr>
    <tr>
      <td><select name="txt_espacofisico" id="txt_espacofisico" style="width:500px">
        <option value=""></option>
        <?php
		  	      mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
			  
	$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where tbl_espaco_fisico.FK_Instituicao='$etec'";
	$comando=mysql_query($sql) ;
	

	
  $linhaa=mysql_fetch_array($comando);
	  
	 $fkespacofisico=$linhaa['FK_Laboratorio'];
	
	$sqlaqui="select * from tbl_espaco_fisico where FK_Instituicao='$etec'";
	$comandoaqui=mysql_query($sqlaqui);
	while($linha=mysql_fetch_array($comandoaqui)){
		?>
        <option value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$espacofisico))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Descricao']?></option>
        <?php  }?>
      </select></td>
      <td><input type="submit" name="button" id="button" value="Gráfico" />
      <input name="lstFiltro" type="hidden" id="lstFiltro" value="<?php echo $tipoFiltro; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#D6D6D6"><strong>Relatório de Ociosidade - Segunda Feira</strong></td>
    </tr>
    <tr>
        <?php
	
		
		$sqlpesquisa="select * from tbl_etec inner join tbl_espaco_fisico on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where tbl_espaco_fisico.PK_CodLaboratorio='$espacofisico'";
		$qrypesquisa= @mysql_query($sqlpesquisa) or die(mysql_error());
		$UsabilidadeGrafico = array();
		$cont = 0;
		
		

		while($linhaPesquisa = mysql_fetch_array($qrypesquisa)){
		
		//--------------------Segunda-----------------------//
		if ($linhaPesquisa['Mseg']=='2'){
		$Mseg=0;	
			}else{
		$Mseg=1;		
				}
			
		if($linhaPesquisa['Tseg']=='2'){
		$Tseg=0;	
			}else{
		$Tseg=1;		
				}	
				
		if($linhaPesquisa['Seg10']=='2'){
		$Seg10=0;	
			}else{
		$Seg10=1;		
				}
				
		if($linhaPesquisa['Seg11']=='2'){
		$Seg11=0;	
			}else{
		$Seg11=1;		
				}
				
		if($linhaPesquisa['Seg12']=='2'){
		$Seg12=0;	
			}else{
		$Seg12=1;		
				}
				
		if($linhaPesquisa['Seg13']=='2'){
		$Seg13=0;	
			}else{
		$Seg13=1;		
				}
				
		if($linhaPesquisa['Seg14']=='2'){
		$Seg14=0;	
			}else{
		$Seg14=1;		
				}		
			
		if($linhaPesquisa['Seg15']=='2'){
		$Seg15=0;	
			}else{
		$Seg15=1;		
				}
				
		if($linhaPesquisa['Seg16']=='2'){
		$Seg16=0;	
			}else{
		$Seg16=1;		
				}
				
		if($linhaPesquisa['Seg17']=='2'){
		$Seg17=0;	
			}else{
		$Seg17=1;		
				}
				
		if($linhaPesquisa['Seg18']=='2'){
		$Seg18=0;	
			}else{
		$Seg18=1;		
				}
				
		if($linhaPesquisa['Seg19']=='2'){
		$Seg19=0;	
			}else{
		$Seg19=1;		
				}	
				
		if($linhaPesquisa['Seg20']=='2'){
		$Seg20=0;	
			}else{
		$Seg20=1;		
				}
				
		if($linhaPesquisa['Seg21']=='2'){
		$Seg21=0;	
			}else{
		$Seg21=1;		
				}
				
		if($linhaPesquisa['Seg22']=='2'){
		$Seg22=0;	
			}else{
		$Seg22=1;		
				}	
		
		
		$totalSim=$Mseg+$Tseg+$Seg10+$Seg11+$Seg12+$Seg13+$Seg14+$Seg15+$Seg16+$Seg17+$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;		
				
		$UsabilidadeGrafico += array_fill($cont, 1, array('Horas Previstas', '16',));
		$UsabilidadeGrafico += array_fill($cont, 2, array('Horas Ultilizadas','', $totalSim));
		
		$cont=$cont+1;
		}

		if (count($UsabilidadeGrafico) > 0) {	
		$UsGraf= new PHPlot(740,500);
		$UsGraf->SetPrintImage(False);
		$UsGraf->SetPlotType('bars');
		$UsGraf->SetYDataLabelPos('plotin');
		$UsGraf->SetDataType('text-data');
		$UsGraf->SetDataValues($UsabilidadeGrafico);
		$UsGraf->SetLegend(array('Horas Previstas', 'Horas Ultilizadas'));
		$UsGraf->SetRGBArray('large');
		$UsGraf->SetDataColors(array('gray','OrangeRed3'));
		$UsGraf->DrawGraph();
		}
		
		
		?>
      <td colspan="2"><?php if (count($UsabilidadeGrafico) > 0) { ?>        <img src="<?php echo $UsGraf->EncodeImage();?>" alt="Selecionar Filtro"/>
      <?php }  else { echo "Nenhum dado retornado para os parâmetros Selecionados!";}?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>