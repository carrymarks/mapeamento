<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatórios - Mapeamento</title>
<script type="text/javascript" src="jQuery.js"></script>
<script type="text/javascript">

function Recarregar2(){
var ccetec2=document.getElementById('txt_nomeunidade2').value;
var ccespaco=document.getElementById('txt_ambientealocado2').value;

location.href='Frm_Relatorio.php?us=<?php if(isset($_GET['us'])){echo $_GET['us'];} ?>&ccetec=' + ccetec2 +'&ccespaco='+ ccespaco;
	
	}


function Recarregar(){
var ccetec=document.getElementById('txt_nomeunidade').value;
var ccespaco=document.getElementById('txt_nomeespacofisico').value;

location.href='Frm_Relatorio.php?us=<?php if(isset($_GET['us'])){echo $_GET['us'];} ?>&codigoetec=' + ccetec +'&codigoespaco='+ ccespaco;
	
	}

function FormaAquisicao(){
var formaaquisicao=document.getElementById('txt_formaaquisicao').value;
var tipodeinformacao=document.getElementById('txt_tipodeinformacao').value;


$('#txt_aquisicaoespecial').hide();	
$('#formaaquisicao').hide();
$('#txt_formaaquisicao').hide();
$('#firstform').hide();
$('#txt_ano').hide();
$('#ano').hide();	
$('#txt_ociosidade').hide();
$('#ociosidade').hide();
$('#txt_atualizacaotecnologica').hide();
$('#atualizacaotecnologica').hide();



if(formaaquisicao=="Doacao" || formaaquisicao=="Emprestimo" || formaaquisicao=="Cessao" || formaaquisicao=="Compartilhamento"){
//$('#txt_aquisicaoespecial').show();
//$('#formaaquisicao').show();
	}
	
if(tipodeinformacao=="FormaAquisicao"){
$('#txt_formaaquisicao').show();
$('#firstform').show();	
	}	
	
if(tipodeinformacao=="AnoAquisicao"){
$('#txt_ano').show();
$('#ano').show();	
	}

if(tipodeinformacao=="OciosidadeEquipamento"){
$('#txt_ociosidade').show();
$('#ociosidade').show();	
	}
	
if(tipodeinformacao=="AtualizacaoTecnologica"){
$('#txt_atualizacaotecnologica').show();
$('#atualizacaotecnologica').show();	
	}	

}
</script>
<?php 
include"topo.php";
include("testemenu.php");
// include "menu.php";
include "conexao.php";

if(isset($_GET['us'])){
$us=$_GET['us'];	
	}

$us= base64_decode($us);

$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];



if($medio!="Administrador"){

include "menu_usuario.php";
  }else{  
//echo "$us"; 

$us=base64_encode($us);


include ("menu.php"); 
$us= base64_decode($us);
    } 




if(isset($_GET['codigoetec'])){
$ccetec=$_GET['codigoetec'];

?>
<script>$(function(){
	$('#txt_nomeunidade').val('<?php echo $ccetec; ?>');
	});  </script>
<?php	
	}else{
$ccetec="";		
		}
		
		
if(isset($_GET['codigoespaco'])){
$ccespaco=$_GET['codigoespaco'];	
?>
<script>$(function(){
	$('#txt_nomeespacofisico').val('<?php echo $ccespaco; ?>');
	});  </script>
<?php
	}else{
$ccespaco='';		
		}		


if(isset($_GET['ccetec'])){
$ccespaco2=$_GET['ccetec'];	
?>
<script>$(function(){

	$('#txt_nomeunidade2').val('<?php echo $ccespaco2; ?>');
	});  </script>
<?php
	}else{
$ccespaco2="";		
		}
				
		
if(isset($_GET['ccespaco'])){
$ccalocado=$_GET['ccespaco'];
?>
<script>$(function(){

	$('#txt_ambientealocado2').val('<?php echo $ccalocado; ?>');
	});  </script>
<?php	
	}else{
$ccalocado="";		
		}	

?>
</head>

<body onload="FormaAquisicao()">
<table width="933" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#D6D6D6"><strong>Relatório de Laboratórios</strong></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><form id="form1" name="form1" method="post" action="Frm_GraficoLaboratorio.php?us=<?php if($medio=="Administrador"){ echo base64_encode($us); }else{ echo $us; } ?>">
      <table width="933" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
          <td>Nome unidade</td>
          <td width="588"><select name="txt_nomeunidade" id="txt_nomeunidade" onchange="Recarregar()">
            <option value="<?php echo "Vazio"; ?>" <?php if (!(strcmp("", "echo"))) {echo "selected=\"selected\"";} ?>></option>
      <?php
      if($medio=="Administrador"){             
        ?>
            <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
     <?php  

		$sqletec="select * from tbl_etec ORDER BY Etec";
    }else{
    $sqletec="select * from tbl_etec where PK_CodEtec='$usu'"; 
    }
		$comandoetec=mysql_query($sqletec);	
		while($linhaetec=mysql_fetch_array($comandoetec)){
		   ?>
            <option value="<?php echo $linhaetec['PK_CodEtec']; ?>" <?php if (!(strcmp($linhaetec['Etec'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaetec['Etec']; ?></option>
            <?php } ?>
            </select></td>
          <td width="185">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Nome do espaço físico</td>
          <td><label for="select5">
            <select name="txt_nomeespacofisico" id="txt_nomeespacofisico" style="width:150px" onchange="Recarregar()">
              <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
              <?php 
		
			  
			if($ccetec!="Todos"){
			$sqlEspacoDescricao="select distinct(tbl_cadastrolaboratorio.PK_CodLaboratorio),tbl_cadastrolaboratorio.Nome_Laboratorio from tbl_cadastrolaboratorio inner join tbl_espaco_fisico on tbl_cadastrolaboratorio.PK_CodLaboratorio=tbl_espaco_fisico.FK_Laboratorio where FK_Instituicao='$ccetec' order by tbl_cadastrolaboratorio.Nome_Laboratorio";				
				}else{
			$sqlEspacoDescricao="select * from tbl_cadastrolaboratorio order by Nome_Laboratorio";					
					}

			$qryEspacoDescricao=mysql_query($sqlEspacoDescricao);
			while($linhaEspacoDescricao=mysql_fetch_array($qryEspacoDescricao)){
			
			?>
              <option value="<?php echo $linhaEspacoDescricao['PK_CodLaboratorio']; ?>" <?php if (!(strcmp($linhaEspacoDescricao['Nome_Laboratorio'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaEspacoDescricao['Nome_Laboratorio']; ?></option>
              <?php } ?>
              </select>
            </select>
          </label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Ambiente alocado</td>
          <td><label for="select6">
            <select name="txt_ambientealocado" id="select5" >
              <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
              <?php 
			
			if($ccespaco!=''){
			$sqlEspaco="select * from tbl_espaco_fisico where FK_Laboratorio='$ccespaco' and FK_Instituicao='$ccetec' order by Descricao";	
				}else{
			$sqlEspaco="select * from tbl_espaco_fisico order by Descricao";		
					}
			
			$qryEspaco=mysql_query($sqlEspaco);
			while($linhaEspaco=mysql_fetch_array($qryEspaco)){
			
			?>
              <option value="<?php echo $linhaEspaco['PK_CodLaboratorio']; ?>" <?php if (!(strcmp($linhaEspaco['Descricao'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaEspaco['Descricao']; ?></option>
              <?php } ?>
              </select>
          </label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="15">&nbsp;</td>
          <td width="145">Dia da semana</td>
          <td><label for="txt_ambientealocado"></label>
            <select name="txt_diasemana" id="select2" style="width:150px">
              <option value="Todos">Todos</option>
              <option value="Segunda">Segunda-Feira</option>
              <option value="Terca">Terça-Feira</option>
              <option value="Quarta">Quarta-Feira</option>
              <option value="Quinta">Quinta-Feira</option>
              <option value="Sexta">Sexta-Feira</option>
              <option value="Sabado">Sábado</option>
            </select></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Período</td>
          <td><label for="txt_ambientealocado"></label>
            <select name="txt_periodo" id="select2" style="width:150px">
              <option value="Todos">Todos</option>
              <option value="Manha">Manhã</option>
              <option value="Tarde">Tarde</option>
              <option value="Noite">Noite</option>
            </select></td>
          <td><input type="submit" name="button" id="button" value="Relatório" /></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table>
    </form></td>
  </tr>
  <tr>
    <td width="467">&nbsp;</td>
    <td width="466">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
        <form id="form2" name="form2" method="post" action="Frm_GraficoEquipamento.php?us=<?php if($medio=="Administrador"){ echo base64_encode($us); }else{ echo $us; } ?>">
    <table width="933" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3" align="center" bgcolor="#D6D6D6"><strong>Relatório de Equipamentos</strong></td>
        </tr>
      <tr>
        <td>Nome unidade</td>
        <td width="182"><select name="txt_nomeunidade2" id="txt_nomeunidade2"  onchange="Recarregar2()">
          <option value="<?php echo "Vazio"; ?>" <?php if (!(strcmp("", "echo"))) {echo "selected=\"selected\"";} ?>></option>
        <?php
          if($medio=="Administrador"){   
            ?>
          <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
       <?php      
    $sqletec="select * from tbl_etec ORDER BY Etec";
    }else{
    $sqletec="select * from tbl_etec where PK_CodEtec='$usu'"; 
    }
		$comandoetec=mysql_query($sqletec);	
		while($linhaetec=mysql_fetch_array($comandoetec)){
		   ?>
          <option value="<?php echo $linhaetec['PK_CodEtec']; ?>" <?php if (!(strcmp($linhaetec['Etec'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaetec['Etec']; ?></option>
          <?php } ?>
          </select></td>
        <td width="68">&nbsp;</td>
        </tr>
      <tr>
        <td width="170">Tipo de informação</td>
        <td><label for="txt_ambientealocado2"></label>
          <select name="txt_tipodeinformacao" id="txt_tipodeinformacao" style="width:250px" onchange="FormaAquisicao()" >
            <option value="FormaAquisicao">Forma de Aquisição</option>
            <option value="AquisicaoEspecial">Forma de Aquisição Especial</option>
            <option value="AnoAquisicao">Ano de Aquisição</option>
            <option value="OciosidadeEquipamento">Ociosidade do Equipamento</option>
            <option value="AtualizacaoTecnologica">Atualização Tecnologica</option>
          </select></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Ambiente alocado</td>
        <td><label for="select2">
          </select>
          </label>
          <label for="txt_formaaquisicao"></label>
          <select name="txt_ambientealocado2" id="txt_ambientealocado2" onchange="Recarregar2()">
            <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
            <?php 
			if($ccespaco2!=''){
			$sqlEspaco="select * from tbl_espaco_fisico where FK_Instituicao='$ccespaco2' order by Descricao";	
				}else{
			$sqlEspaco="select * from tbl_espaco_fisico order by Descricao";		
					}
					
			$qryEspaco=mysql_query($sqlEspaco);
			while($linhaEspaco=mysql_fetch_array($qryEspaco)){
			
			?>
            <option value="<?php echo $linhaEspaco['PK_CodLaboratorio']; ?>" <?php if (!(strcmp($linhaEspaco['Descricao'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaEspaco['Descricao']; ?></option>
            <?php } ?>
          </select></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Nome do equipamento</td>
        <td><label for="txt_equipamento2"></label>
          <select name="txt_equipamento2" id="txt_equipamento2" style="width:620px">
            <option value="<?php echo "Todos"; ?>" <?php if (!(strcmp("Todos", "echo"))) {echo "selected=\"selected\"";} ?>>Todos</option>
            <?php 
			if($ccalocado!=""){
			$sqlEtec="select * from tbl_cadastro_equipamento inner join tbl_material on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento where tbl_material.FK_Instituicao='$ccespaco2' and tbl_material.FK_EspacoFisico='$ccalocado'  group by tbl_cadastro_equipamento.PK_CadastroEquipamento order by tbl_cadastro_equipamento.Tipo_Equipamento";	
				}else{
			$sqlEtec="select * from tbl_cadastro_equipamento order by Tipo_Equipamento";}
			$qryEtec=mysql_query($sqlEtec);
			while($linhaetec=mysql_fetch_array($qryEtec)){
			
			?>
            <option value="<?php echo $linhaetec['PK_CadastroEquipamento']; ?>" <?php if (!(strcmp($linhaetec['Tipo_Equipamento'], "echo"))) {echo "selected=\"selected\"";} ?>><?php echo $linhaetec['Tipo_Equipamento']; ?></option>
            <?php } ?>
            </select>
          </select></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><div id="formaaquisicao">Forma de Aquisição Especial</div>
          <div id="ano">Ano de Aquisição</div>
          <div id="ociosidade">Ociosidade do Equipamento</div>
          <div id="atualizacaotecnologica">Atualização Tecnológica</div>
          <div id="firstform">Forma de aquisição</div></td>
        <td>
          <label for="txt_aquisicaoespecial"></label>
          <select name="txt_aquisicaoespecial" id="txt_aquisicaoespecial" style="width:150px">
            <option value="Todos">Todos</option>
            <option value="Prefeitura">Prefeitura</option>
            <option value="ONG">ONG</option>
            <option value="Sindicato">Sindicato</option>
            <option value="Fundacao">Fundação</option>
            <option value="Associacao">Associação</option>
            <option value="OrgaosClasse">Órgãos de Classe</option>
            <option value="OrgaoPublico">Outro Órgão Público</option>
            <option value="EmpresaPrivada">Empresa Privada</option>
            <option value="Outros">Outros</option>
            </select>
          <label for="txt_ano"></label>
          <select name="txt_ano" id="txt_ano" style="width:150px">
            <option value="Todos">Todos</option>
            <option value="Anterior2005">Anterior a 2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            </select>
          <label for="txt_ociosidade"></label>
          <select name="txt_ociosidade" id="txt_ociosidade" style="width:150px">
            <option value="Todos">Todos</option>
            <option value="Sim">Sim</option>
            <option value="Nao">Não</option>
            </select>
          <label for="txt_atualizacaotecnologica"></label>
          <select name="txt_atualizacaotecnologica" id="txt_atualizacaotecnologica" style="width:150px">
            <option value="Todos">Todos</option>
            <option value="TecnologiaPonta">Tecnologia de Ponta</option>
            <option value="Atual">Atual</option>
            <option value="AntigoObsoleto">Antigo, mas não obsoleto</option>
            <option value="Obsoleto">Obsoleto</option>
            </select>
          <select name="txt_formaaquisicao" id="txt_formaaquisicao" style="width:150px" onchange="FormaAquisicao()">
            <option value="Todos">Todos</option>
            <option value="CPS">CPS</option>
            <option value="FAT">FAT</option>
            <option value="APM">APM</option>
            <option value="CooperativaEscola">Cooperativa Escola</option>
            <option value="Doacao">Doação</option>
            <option value="Emprestimo">Empréstimo</option>
            <option value="Cessao">Cessão</option>
            <option value="Compartilhamento">Compartilhamento</option>
            </select>
          </td>
        <td valign="top"><input type="submit" name="button2" id="button2" value="Relatório" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    </table>
  
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>