<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatórios - Mapeamento</title>

 <?php 
error_reporting(0);
ini_set("display_errors", 0 );
 ini_set('max_execution_time','999999999');
$totaltotalhoraprevista=0;
$totaltotalfinalhrnutilizadas=0;
$totaltotalhorasutilizadas=0;
$quantidadelinhas=0;
$cor=0;
$horatotalfinal=0;
$horatotalfinalutilizada=0;

$numerodehoras=0;
$contadorSegunda=0;
$contadorTerca=0;
$contadorQuarta=0;
$contadorQuinta=0;
$contadorSexta=0;
$contadorSabado=0;

//----------------variaveis total de horas utilizadas--------------------//
$horasutiSegunda=0;
$horasutiTerca=0;
$horasutiQuarta=0;
$horasutiQuinta=0;
$horasutiSexta=0;
$horasutiSabado=0;
$horastotalutilizada=0;

if(isset($_POST["txt_nomeunidade"])){
$nomeunidade=$_POST["txt_nomeunidade"];	
	}
	
if(isset($_POST["txt_diasemana"])){
$diasemana=$_POST["txt_diasemana"];	
	}

if(isset($_POST["txt_periodo"])){
$periodo=$_POST["txt_periodo"];	
	}
	
if(isset($_POST["txt_nomeespacofisico"])){
$nomeespaco=$_POST["txt_nomeespacofisico"];	
	}

if(isset($_POST["txt_ambientealocado"])){
$ambientealocado=$_POST["txt_ambientealocado"];	
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

if($nomeunidade!="Vazio"){
	
$sqlEtec="select * from tbl_etec where PK_CodEtec='$nomeunidade'";
$qryEtec=mysql_query($sqlEtec);
$linhaEtec=mysql_fetch_array($qryEtec);	
	
	}

?>
</head>

<body>

<?php


if(($diasemana!="Todos" and $ambientealocado=="Todos") or ($nomeunidade=="Todos" and $diasemana=="Todos" and $periodo!="Todos" and $nomeespaco=="Todos" and $ambientealocado=="Todos") or ($periodo!="Todos" and $diasemana=="Todos" and $ambientealocado=="Todos" and $nomeunidade!="Todos") or ($nomeunidade!="Todos" and $diasemana=="Todos" and $periodo!="Todos" and $nomeespaco!="Todos" and $ambientealocado!="Todos")){
$contsql='';



if($nomeunidade!="Todos"){
$contsql.=" and tbl_espaco_fisico.FK_Instituicao='$nomeunidade'";	
	}

/*if($diasemana!="Todos"){
$contsql.=" and tbl_espaco_fisico.FK_Instituicao='$nomeunidade'";	
	}*/	

if($nomeespaco!="Todos"){
$contsql.=" and tbl_espaco_fisico.FK_Laboratorio='$nomeespaco'";	
	}
	
if($ambientealocado!="Todos"){
$contsql.=" and tbl_espaco_fisico.Pk_CodLaboratorio='$ambientealocado'";	
	}
	
?>


<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example">
  <thead>
  <tr>
    <th bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Espaço Físico</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Período</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">%</font></th>
    </tr>
  </thead>
  <tbody>
  <?php
$sqltotaltotalhoranao=0;
$sqlTotaltotalhora=0;
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio inner join tbl_etec on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where 1".$contsql." order by tbl_etec.Etec";
$comando=mysql_query($sql);
while($linha=mysql_fetch_array($comando)){
$sqltotaltotal=0;  
$sqltotaltotalnaohora=0;


//------------------Geração por Dia da Semana Expessifico---------------

	if($diasemana=="Segunda" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$totalSegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	

	$sqltotaltotalhoranao=$sqltotaltotalhoranao+$sqltotaltotalnaohora;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	 
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$totalSegManha=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$totalSegManha=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}


}







//----------------------------------------------Terça - Feira -----------------------------------------------//

	if($diasemana=="Terca" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$totalSegManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$totalSegManha=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		
		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$totalSegManha=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}

}





















//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//


	if($diasemana=="Quarta" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$totalSegManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$horapevista=6;
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$totalSegManha=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$totalSegManha=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}

}





//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//

	if($diasemana=="Quinta" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$totalSegManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$totalSegManha=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$totalSegManha=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}

}



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//


	if($diasemana=="Sexta" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$totalSegManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$totalSegManha=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$totalSegManha=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}

}




//--------------------------------------------------Sábado---------------------------------------------------------//


	if($diasemana=="Sabado" or $diasemana=="Todos"){
	
	
	if($periodo=="Manha" or $periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$totalSegManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	}
	
	
	if($periodo=="Tarde" or $periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$totalSegManha=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	}


	if($periodo=="Noite" or $periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$totalSegManha=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
		$sqltotaltotalhoranao=$sqltotaltotalhoranao+$NaoutilizadaSegManha;
$sqlTotaltotalhora=$sqlTotaltotalhora+$totalSegManha;
	
	$sqltotaltotal=$sqltotaltotal+$totalSegManha;
	$sqltotaltotalnaohora=$sqltotaltotalnaohora+$NaoutilizadaSegManha;
	
	
	
	}
	}
	$quantidadelinhas=$quantidadelinhas+1;
	$totalhoranutilizada=$totalhoranutilizada+$NaoutilizadaSegManha;
	$numerodehoras=$numerodehoras+$horapevista;
	$totalhorautilizada=$totalhorautilizada+$totalSegManha;

	$porcmedia=$porcmedia+$porctotalSegManha;
	
	
	//---------------------*total final-----------------------//
	$horatotalfinal=$horatotalfinal+$sqltotaltotalnaohora;
	$horatotalfinalutilizada=$horatotalfinalutilizada+$sqltotaltotal;
	?>

  <tr align="center" class="gradeU">
    <td width="35"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td width="148"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td width="109"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td width="114"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td width="66"><font size="-1"><?php if($diasemana=="Terca"){
		  echo "Terça";
		  }
		  else if($diasemana=="Sabado"){
		  echo "Sábado";	  
			  }else{
		  echo $diasemana; } ?></font></td>
    <td width="61"><font size="-1"><?php if($periodo=="Manha"){
			  								echo "Manhã";
			  									}else{
											echo $periodo; } ?></font></td>
    <td width="108"><font size="-1"><?php if($periodo=="Todos"){ echo "16"; }
	else if($diasemana=="Todos"){
	echo $horapevista=$horapevista*6;	
		}
	 else { echo $horapevista; }  ?></font></td>
    <td width="70"><font size="-1"><?php 
	if($periodo=="Todos"){
	echo $sqltotaltotalnaohora;	
		}
	else if($diasemana=="Todos"){
	echo $sqltotaltotalnaohora;	
		}	
		else{
	echo $NaoutilizadaSegManha; } ?></font></td>
    <td width="68"><font size="-1"><?php 
	if($periodo=="Todos"){
	echo $sqltotaltotal;	
		}
	else if($diasemana=="Todos"){
	echo $sqltotaltotal;	
		}	
		else{
	echo $totalSegManha; } ?></font></td>
    <td width="38"><font size="-1"><?php
	if($periodo=="Todos"){
	echo (($sqltotaltotal/16)*100)."%";	
	}else if($periodo!="Todos"){
	
	echo round((($sqltotaltotal/$horapevista)*100),0)."%";	
		}
	else{
	 echo round($porctotalSegManha,0)."%"; } ?></font></td>
    </tr>
 

    <?php } ?>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">100%</font></td>
    <td align="center"><font size="-1"><?php
	if($diasemana=="Todos"){
		
		$numerodehoras=$numerodehoras*6;
	echo $number=number_format((($sqltotaltotalhoranao*100)/$numerodehoras),0)."%";	
		}else if($periodo!="Todos"){
	
	echo $horanaoutilizada=round((($sqltotaltotalhoranao/($horapevista*$quantidadelinhas))*100),0)."%";	
		}
		else{

	echo number_format($horanaoutilizada=(($sqltotaltotalhoranao/(16*$quantidadelinhas))*100),2)."%";
			
		}?></font></td>
    <td align="center"><font size="-1">
	<?php 
	if($periodo=="Todos"){
		
	echo $horautilizada=number_format((($sqlTotaltotalhora/(16*$quantidadelinhas))*100),2)."%";	
	
	}else if($diasemana!="Todos"){
 
 	echo $horautilizada=round((($sqlTotaltotalhora/($horapevista*$quantidadelinhas))*100),0)."%";	
	// echo $horautilizada=round((($sqltotaltotal/($horapevista*$quantidadelinhas))*100),0)."%aaa";	
		
		
	}else{
		
	echo $numbern=number_format((($sqlTotaltotalhora*100)/$numerodehoras),0)."%"; } ?>
	<?php /*
	if($diasemana=="Todos"){
		$numerodehoras=$numerodehoras*6;
	echo $numbern=(100-$number)."%";	
		}else{
	 echo $horautilizada=number_format((( $totalhorautilizada*100)/$numerodehoras),0)."%"; }*/ ?> </font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center">&nbsp;</td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1"><?php
		 if($periodo=="Todos"){ echo $horastotal=$quantidadelinhas*16;}
else if($diasemana=="Todos"){
	echo $numberber=$totalhoranutilizada=$totalhoranutilizada*6;	
		}
else{ echo $numerodehoras; }?></font></td>
    <td align="center"><font size="-1"><?php if($periodo=="Todos"){ echo $horatotalfinal;
	 }
else if($diasemana=="Todos"){
	echo $horatotalfinal;	
		}
else{ echo $totalhoranutilizada;} ?></font></td>
    <td align="center"><font size="-1"><?php 
	if($periodo=="Todos"){ 
	/*echo $numerodehoras;*/ 
	echo $horastotal-$horatotalfinal;
	}
else if($diasemana=="Todos"){
	
	echo $totalhorautilizada=$numberber-$horatotalfinal;	
		}
else{
	echo $totalhorautilizada; } ?></font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">Média</font></td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">
      <?php
	if($periodo=="Todos"){
	echo 16;
	}
else if($diasemana=="Todos"){
echo 	$numberber/$quantidadelinhas;
}
else{
	 echo $numerodehoras/$quantidadelinhas;} ?>
    </font></td>
    <td align="center"><font size="-1">
      <?php
	 if($periodo=="Todos"){ echo round($horatotalfinal/$quantidadelinhas,2); }
	 else if($diasemana=="Todos"){
	echo number_format($horatotalfinal/$quantidadelinhas,0);	 
		 }
	 else{  echo round($totalhoranutilizada/$quantidadelinhas,2); } ?>
    </font></td>
    <td align="center"><font size="-1">
      <?php
	   if($periodo=="Todos"){ echo round($horatotalfinalutilizada/$quantidadelinhas,2); }else if($diasemana=="Todos"){
		echo number_format($totalhorautilizada/$quantidadelinhas,0);   
		   }else{
	 echo round($totalhorautilizada/$quantidadelinhas,2); } ?>
    </font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php
  if($diasemana=="Todos" and $etec!="Todos" and $periodo!="Todos" and $nomeespaco=="Todos" and $ambientealocado=="Todos"){
	  
	$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($numbern,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($number,2)));  
  
  }
  else if ($diasemana=="Todos" and $etec!="Todos" and $periodo!="Todos" and $nomeespaco!="Todos" and $ambientealocado=="Todos") {
	  
	$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($numbern,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($number,2)));	  
	  
	  }
  else if($nomeunidade!="Todos" and $diasemana=="Todos" and $periodo!="Todos" and $nomeespaco!="Todos" and $ambientealocado!="Todos"){
		
		$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($numbern,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($number,2)));  
	  
	  }
  else{
  
	  	//--------------------Fechando Se não for todos ------------------------//
	
	$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($horautilizada,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($horanaoutilizada,2)));
  }
	 ?>
</table>
</div>
<p>

<div id="container" style="max-width:933px"></div>
<?php

}	
if ($diasemana!="Todos" and $ambientealocado!="Todos" and $periodo!="Todos"){  

?>
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example">
  <thead>
  <tr>
    <th bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Espaço Físico</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Período</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
    <th bgcolor="#E8E8E8"><font size="-1">%</font></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where tbl_espaco_fisico.FK_Instituicao='$nomeunidade' and tbl_espaco_fisico.PK_CodLaboratorio='$ambientealocado'";
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);

//------------------Geração por Dia da Semana Expessifico---------------

	if($diasemana=="Segunda"){
	
	
	if($periodo=="Manha"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$totalSegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$totalSegManha=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$totalSegManha=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}







//----------------------------------------------Terça - Feira -----------------------------------------------//

	if($diasemana=="Terca"){
	
	
	if($periodo=="Manha"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$totalSegManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$totalSegManha=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		
		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$totalSegManha=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}





















//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//


	if($diasemana=="Quarta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$totalSegManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$totalSegManha=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$totalSegManha=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}




//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//

	if($diasemana=="Quinta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$totalSegManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$totalSegManha=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$totalSegManha=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//


	if($diasemana=="Sexta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$totalSegManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$totalSegManha=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$totalSegManha=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}




//--------------------------------------------------Sábado---------------------------------------------------------//


	if($diasemana=="Sabado"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$totalSegManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$totalSegManha=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$totalSegManha=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}
	}
	


//--------------------Fechando Se não for todos ------------------------//
	
		$resultado[] = array('name' => "Horas Utilizadas", 'data' => array(round($porctotalSegManha,2)));
		$resultado[] = array('name' => "Horas Não Utilizadas", 'data' => array(round($porcNaoutilizadaSegManha,2)));
	

	?>
  <tr align="center" class="gradeU">
    <td width="35"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td width="148"><font size="-1"><?php echo $linhaEtec['Etec']; ?></font></td>
    <td width="109"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td width="114"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td width="66"><font size="-1">
      <?php if($diasemana=="Terca"){
		  echo "Terça";
		  }
		  else if($diasemana=="Sabado"){
		  echo "Sábado";	  
			  }else{
		  echo $diasemana; } ?>
    </font></td>
    <td width="61"><font size="-1">
      <?php if($periodo=="Manha"){
			  								echo "Manhã";
			  									}else{
											echo $periodo; } ?>
    </font></td>
    <td width="108"><font size="-1"><?php echo $horapevista; ?></font></td>
    <td width="70"><font size="-1"><?php echo $NaoutilizadaSegManha; ?></font></td>
    <td width="68"><font size="-1"><?php echo $totalSegManha; ?></font></td>
    <td width="38"><font size="-1"><?php echo round($porctotalSegManha,0)."%"; ?></font></td>
    </tr>
</table>
</div>
<p>
  <?php } 


			//--------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------TODOS PERÍODOS----------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
	
$clausula="";	
			
if($ambientealocado=="Todos" and $nomeespaco=="Todos" and $nomeunidade!="Todos"){
$clausula="  and tbl_espaco_fisico.PK_CodLaboratorio='$ambientealocado'";	
}

if($ambientealocado=="Todos" and $nomeespaco!="Todos" and $nomeunidade!="Todos"){
$clausula=" and tbl_espaco_fisico.FK_Laboratorio='$nomeespaco'";	
	}
	
if($ambientealocado!="Todos" and $nomeespaco!="Todos" and $nomeunidade!="Todos"){
$clausula=" and tbl_espaco_fisico.PK_CodLaboratorio='$ambientealocado'";	
	}	
	
			
		
			
	
if($periodo=="Todos" and $nomeunidade!="Todos" and $nomeespaco!="Todos" and $diasemana=="Todos"){
	
?>
<strong><center>Quadro de uso dos laboratórios</center></strong>
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example">
  <thead>
    <tr>
    <th width="32" align="center" bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
    <th width="137" align="center" bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
    <th width="130" align="center" bgcolor="#E8E8E8"><font size="-1">Nome do Espaço Físico</font></th>
    <th width="78" align="center" bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
    <th width="93" align="center" bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
    <th width="51" align="center" bgcolor="#E8E8E8"><font size="-1">Período</font></th>
    <th width="143" align="center" bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
    <th width="164" align="center" bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
    <th width="61" align="center" bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
    <th width="22" align="center" bgcolor="#E8E8E8"><font size="-1">%</font></th>
    </tr>
  </thead>
  <tbody>
  <?php
 
 
  //$erro=$novoarquivo=@fopen("temp.txt",'x');
//  if(!$erro){
	//unlink('temp.txt'); 
	//$novoarquivo=fopen("temp.txt",'x');  
	//  }
	  
	//fclose($novoarquivo);  
  
  
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio inner join tbl_etec on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where tbl_espaco_fisico.FK_Instituicao='$nomeunidade'".$clausula;  
$comando=mysql_query($sql);
$totallala=mysql_num_rows($comando);
$resultado = array();
while($linha=mysql_fetch_array($comando)){	

$numerodehoras=$numerodehoras+96;

$quantidadelinhas=$quantidadelinhas+1;
	
	if($diasemana=="Todos"){
	
	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$SegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$SegManha;
	
	$porcSegManha=(100/6)*$SegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$SegTarde=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$SegTarde;
	
	$porcSegTarde=(100/5)*$SegTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$SegNoite=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$SegNoite;
	
	$porctotalSegManha=(100/5)*$SegNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSegunda=$SegManha+$SegTarde+$SegNoite;
	$porctotalSegunda=(100/16)*$totalSegunda;
	$NutilizadaSegunda=16-$totalSegunda;
	$porcNutilizadaSegunda=(100/16)*$NutilizadaSegunda;

	

//----------------------------------------------Terça - Feira -----------------------------------------------//

	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$TerManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaSegManha=6-$TerManha;
	
	$porctotalSegManha=(100/6)*$TerManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$TerTarde=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaSegManha=5-$TerTarde;
	
	$porctotalSegManha=(100/5)*$TerTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	



	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		

		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$TerNoite=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaSegManha=5-$TerNoite;
	
	$porctotalSegManha=(100/5)*$TerNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalTerca=$TerManha+$TerTarde+$TerNoite;
	$porctotalTerca=(100/16)*$totalTerca;
	$NutilizadaTerca=16-$totalTerca;
	$porcNutilizadaTerca=(100/16)*$NutilizadaTerca;


//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//

	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$QuartaManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$QuartaManha;
	
	$porctotalSegManha=(100/6)*$QuartaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$QuartaTarde=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$QuartaTarde;
	
	$porctotalSegManha=(100/5)*$QuartaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$QuartaNoite=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$QuartaNoite;
	
	$porctotalSegManha=(100/5)*$QuartaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalQuarta=$QuartaManha+$QuartaTarde+$QuartaNoite;
	$porctotalQuarta=(100/16)*$totalQuarta;
	$NutilizadaQuarta=16-$totalQuarta;
	$porcNutilizadaQuarta=(100/16)*$NutilizadaQuarta;



//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//


	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$QuinManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$QuinManha;
	
	$porctotalSegManha=(100/6)*$QuinManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;

	
	
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$QuinTarde=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$QuinTarde;
	
	$porctotalSegManha=(100/5)*$QuinTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	


	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$QuinNoite=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$QuinNoite;
	
	$porctotalSegManha=(100/5)*$QuinNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	$totalQuinta=$QuinManha+$QuinTarde+$QuinNoite;
	$porctotalQuinta=(100/16)*$totalQuinta;
	$NutilizadaQuinta=16-$totalQuinta;
	$porcNutilizadaQuinta=(100/16)*$NutilizadaQuinta;



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//

	
	
	//--------------Sexta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$SextaManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$SextaManha;
	
	$porctotalSegManha=(100/6)*$SextaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$SextaTarde=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$SextaTarde;
	
	$porctotalSegManha=(100/5)*$SextaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$SextaNoite=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$SextaNoite;
	
	$porctotalSegManha=(100/5)*$SextaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSexta=$SextaManha+$SextaTarde+$SextaNoite;
	$porctotalSexta=(100/16)*$totalSexta;
	$NutilizadaSexta=16-$totalSexta;
	$porcNutilizadaSexta=(100/16)*$NutilizadaSexta;



//--------------------------------------------------Sábado---------------------------------------------------------//

	
	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$SabManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$SabManha;
	
	$porctotalSegManha=(100/6)*$SabManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$SabTarde=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$SabTarde;
	
	$porctotalSegManha=(100/5)*$SabTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$SabNoite=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$SabNoite;
	
	$porctotalSegManha=(100/5)*$SabNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalSabado=$SabManha+$SabTarde+$SabNoite;
	$porctotalSabado=(100/16)*$totalSabado;
	$NutilizadaSabado=16-$totalSabado;
	$porcNutilizadaSabado=(100/16)*$NutilizadaSabado;
	
	
	$horapevista=16;
	
	
	
	$media=($totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado)/6;
	$porcmedia=($porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado)/6;
	$horanutilizada=($NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado)/6;
	$porchoranutilizada=($porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado)/6;
	
	
	$totalhorautilizada=$totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado;
	$totalporchorautilizada=$totalporchorautilizada+$porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado;
	$totalhoranutilizada=$NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado;
	$totalporchoranutilizada=$porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado;
 $totalporchorautilizada=$totalporchorautilizada.' %';



		
	$resultado[] = array('name' => $linha['Descricao'], 'data' => array(round($porctotalSegunda,2),round($porctotalTerca,2),round($porctotalQuarta,2),round($porctotalQuinta),round($porctotalSexta,2),round($porctotalSabado,2),round($porcmedia)));


//--------------------Total de horas não utilizadas---------------------//			

	$contadorSegunda=$NutilizadaSegunda+$contadorSegunda;
	$contadorTerca=$NutilizadaTerca+$contadorTerca;
	$contadorQuarta=$NutilizadaQuarta+$contadorQuarta;
	$contadorQuinta=$NutilizadaQuinta+$contadorQuinta;
	$contadorSexta=$NutilizadaSexta+$contadorSexta;
	$contadorSabado=$NutilizadaSabado+$contadorSabado;
	
	$horasnaoutilizadas=$contadorSegunda+$contadorTerca+$contadorQuarta+$contadorQuinta+$contadorSexta+$contadorSabado;	


//----------------------Total de horas utilizadas ---------------------//
 	$horasutiSegunda=$totalSegunda+$horasutiSegunda;
	$horasutiTerca=$totalTerca+$horasutiTerca;
	$horasutiQuarta=$totalQuarta+$horasutiQuarta;
	$horasutiQuinta=$totalQuinta+$horasutiQuinta;
	$horasutiSexta=$totalSexta+$horasutiSexta;
	$horasutiSabado=$totalSabado+$horasutiSabado;
	
	$horastotalutilizada=$horasutiSegunda+$horasutiTerca+$horasutiQuarta+$horasutiQuinta+$horasutiSexta+$horasutiSabado;	


	
	}	
  ?>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Segunda-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSegunda,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Terça-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalTerca,2)."%"; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quarta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuarta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuarta;?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuarta,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quinta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuinta,2)."%"; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sexta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSexta,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sábado</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSabado,2)."%"; ?></font></td>
    </tr>
  <?php } if($totallala!=""){ ?>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">100%</font></td>
    <td align="center"><font size="-1"><?php echo number_format((($horasnaoutilizadas*100)/$numerodehoras),0)."%"; ?></font></td>
    <td align="center"><font size="-1"><?php echo number_format((( $horastotalutilizada*100)/$numerodehoras),0)."%"; ?></font></td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td>&nbsp;</font></td>
    <td>&nbsp;</font></td>
    <td align="right">&nbsp;</font></td>
    <td>&nbsp;</font></td>
    <td align="center">&nbsp;</font><font size="-1">Total</font></td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1"><?php echo $numerodehoras; ?></font></td>
    <td align="center"><font size="-1"><?php echo $horasnaoutilizadas; ?></font></td>
    <td align="center"><font size="-1"><?php echo $horastotalutilizada; ?></font></td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">Média</font></td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1"><?php
	$quantidadelinhas=$quantidadelinhas*6;
	 echo $numerodehoras/$quantidadelinhas; ?></font></td>
    <td align="center"><font size="-1"><?php
	 echo round($horasnaoutilizadas/$quantidadelinhas,2); ?></font></td>
    <td align="center"><font size="-1"><?php
	 echo round($horastotalutilizada/$quantidadelinhas,2); ?></font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php
  // Jogando dados para o Arquivo
  //echo $linha['Etec'];
  
  //file_put_contents('temp.txt','Segunda-Feira;'.$linhaEtec['Codigo_etec'].';'.$linha['Etec'].';'.$linha['Nome_Laboratorio'].';'.$linha['Descricao'].';'.'Todos;'.';'.'16;'.'100%;'.$totalSegunda.';'.round($porctotalSegunda,2).';'.$NutilizadaSegunda.';'.round($porcNutilizadaSegunda,2).';'.'|',FILE_APPEND);
 // file_put_contents('temp.txt','Terça;'.$totalhoranutilizada.';'.$totallala.'|',FILE_APPEND);
  
  }
  
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where tbl_espaco_fisico.FK_Instituicao='$nomeunidade' and tbl_espaco_fisico.PK_CodLaboratorio='$ambientealocado'";
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);

//------------------Geração por Dia da Semana Expessifico---------------

	if($diasemana=="Segunda"){
	
	
	if($periodo=="Manha"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$totalSegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$totalSegManha=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$totalSegManha=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}







//----------------------------------------------Terça - Feira -----------------------------------------------//

	if($diasemana=="Terca"){
	
	
	if($periodo=="Manha"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$totalSegManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$totalSegManha=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		
		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$totalSegManha=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}





















//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//


	if($diasemana=="Quarta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$totalSegManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$totalSegManha=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$totalSegManha=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}




//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//

	if($diasemana=="Quinta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$totalSegManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$totalSegManha=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$totalSegManha=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//


	if($diasemana=="Sexta"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$totalSegManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$totalSegManha=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$totalSegManha=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}

}




//--------------------------------------------------Sábado---------------------------------------------------------//


	if($diasemana=="Sabado"){
	
	
	if($periodo=="Manha"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$totalSegManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Tarde"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$totalSegManha=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}


	if($periodo=="Noite"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$totalSegManha=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$totalSegManha;
	
	$porctotalSegManha=(100/5)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	}
	}
	


//--------------------Fechando Se não for todos ------------------------//
	
		

	?>
</table>
</div>
<?php } 

if(($nomeunidade=="Todos" and $nomeespaco!="Todos" and $diasemana=="Todos" )or($nomeunidade=="Todos" and $diasemana=="Todos" and $periodo=="Todos" and $nomeespaco=="Todos" and $ambientealocado=="Todos")){
	
?>	

  <div class="demo_jui" style="max-width:933px">  
  <table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example">
<thead>
  <tr>
    <th width="31" align="center" bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
    <th width="104" align="center" bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
    <th width="97" align="center" bgcolor="#E8E8E8"><font size="-1">Nome do Espaço Físico</font></th>
    <th width="92" align="center" bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
    <th width="87" align="center" bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
    <th width="49" align="center" bgcolor="#E8E8E8"><font size="-1">Período</font></th>
    <th width="136" align="center" bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
    <th width="120" align="center" bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
    <th width="93" align="center" bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
    <th width="17" align="center" bgcolor="#E8E8E8"><font size="-1">%</font></th>
    </tr>
  </thead>
  <tbody>

  <?php
  if($nomeespaco!="Todos"){
 $clausula.=" and  tbl_espaco_fisico.FK_Laboratorio='$nomeespaco'" ;
  }
  	//--------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------TODOS PERÍODOS----------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//


$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio inner join tbl_etec on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where 1".$clausula."";
$comando=mysql_query($sql);
while($linha=mysql_fetch_array($comando)){		
			
	 $numerodehoras=$numerodehoras+96;

	if($diasemana=="Todos"){
	
	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$SegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$SegManha;
	
	$porcSegManha=(100/6)*$SegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$SegTarde=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$SegTarde;
	
	$porcSegTarde=(100/5)*$SegTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$SegNoite=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$SegNoite;
	
	$porctotalSegManha=(100/5)*$SegNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSegunda=$SegManha+$SegTarde+$SegNoite;
	$porctotalSegunda=(100/16)*$totalSegunda;
	$NutilizadaSegunda=16-$totalSegunda;
	$porcNutilizadaSegunda=(100/16)*$NutilizadaSegunda;

	

//----------------------------------------------Terça - Feira -----------------------------------------------//

	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$TerManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaTerManha=6-$TerManha;
	
	$porctotalTerManha=(100/6)*$TerManha;
	$porcNaoutilizadaTerManha=(100/6)*$NaoutilizadaTerManha;
	
	$horapevista=6;
	
	
	
	//--------------Terunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{

	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$TerTarde=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaTerManha=5-$TerTarde;
	
	$porctotalTerManha=(100/5)*$TerTarde;
	$porcNaoutilizadaTerManha=(100/5)*$NaoutilizadaTerManha;
	$horapevista=5;
	


	//--------------Terunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		

		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$TerNoite=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaTerManha=5-$TerNoite;
	
	$porctotalTerManha=(100/5)*$TerNoite;
	$porcNaoutilizadaTerManha=(100/5)*$NaoutilizadaTerManha;
	$horapevista=5;
	

	$totalTerca=$TerManha+$TerTarde+$TerNoite;
	$porctotalTerca=(100/16)*$totalTerca;
	$NutilizadaTerca=16-$totalTerca;
	$porcNutilizadaTerca=(100/16)*$NutilizadaTerca;

	

//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//

	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$QuartaManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$QuartaManha;
	
	$porctotalSegManha=(100/6)*$QuartaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$QuartaTarde=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$QuartaTarde;
	
	$porctotalSegManha=(100/5)*$QuartaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$QuartaNoite=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$QuartaNoite;
	
	$porctotalSegManha=(100/5)*$QuartaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalQuarta=$QuartaManha+$QuartaTarde+$QuartaNoite;
	$porctotalQuarta=(100/16)*$totalQuarta;
	$NutilizadaQuarta=16-$totalQuarta;
	$porcNutilizadaQuarta=(100/16)*$NutilizadaQuarta;



//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//


	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$QuinManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$QuinManha;
	
	$porctotalSegManha=(100/6)*$QuinManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$QuinTarde=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$QuinTarde;
	
	$porctotalSegManha=(100/5)*$QuinTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	


	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$QuinNoite=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$QuinNoite;
	
	$porctotalSegManha=(100/5)*$QuinNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	$totalQuinta=$QuinManha+$QuinTarde+$QuinNoite;
	$porctotalQuinta=(100/16)*$totalQuinta;
	$NutilizadaQuinta=16-$totalQuinta;
	$porcNutilizadaQuinta=(100/16)*$NutilizadaQuinta;



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//

	
	
	//--------------Sexta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$SextaManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$SextaManha;
	
	$porctotalSegManha=(100/6)*$SextaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$SextaTarde=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$SextaTarde;
	
	$porctotalSegManha=(100/5)*$SextaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$SextaNoite=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$SextaNoite;
	

	$porctotalSegManha=(100/5)*$SextaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSexta=$SextaManha+$SextaTarde+$SextaNoite;
	$porctotalSexta=(100/16)*$totalSexta;
	$NutilizadaSexta=16-$totalSexta;
	$porcNutilizadaSexta=(100/16)*$NutilizadaSexta;



//--------------------------------------------------Sábado---------------------------------------------------------//

	
	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$SabManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$SabManha;
	
	$porctotalSegManha=(100/6)*$SabManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$SabTarde=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$SabTarde;
	
	$porctotalSegManha=(100/5)*$SabTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$SabNoite=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$SabNoite;
	
	$porctotalSegManha=(100/5)*$SabNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalSabado=$SabManha+$SabTarde+$SabNoite;
	$porctotalSabado=(100/16)*$totalSabado;
	$NutilizadaSabado=16-$totalSabado;
	$porcNutilizadaSabado=(100/16)*$NutilizadaSabado;
	
	
	$horapevista=16;
	
	
	
	
	}			
			
	

  
  ?>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Segunda-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSegunda,2).'%'; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Terça-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalTerca,2).'%'; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quarta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuarta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuarta;?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuarta,2).'%'; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quinta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuinta,2).'%'; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sexta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSexta,2).'%'; ?></font></td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sábado</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSabado,2).'%'; ?></font></td>
    </tr>
    <?php 
  
  $quantidadelinhas=$quantidadelinhas+1;
  
  
  	$totalhorautilizada=$totalhorautilizada+$totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado;
	$totalporchorautilizada=$totalporchorautilizada+$porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado;
	$totalhoranutilizada=$totalhoranutilizada+$NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado;
	$totalporchoranutilizada=$porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado;
  
}
$media=($totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado)/6;
	$porcmedia=($porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado)/6;
	$horanutilizada=($NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado)/6;
	$porchoranutilizada=($porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado)/6;
	
	


?>
  <tr class="gradeU">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">100%</font></td>
    <td align="center"><font size="-1"><?php echo $porcentagemhoranutilizada=number_format((($totalhoranutilizada*100)/$numerodehoras),0)."%"; ?></font></td>
    <td align="center"><font size="-1"><?php echo $porcentagemhorautilizada=number_format((( $totalhorautilizada*100)/$numerodehoras),0)."%"; ?></font></td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr class="gradeU">
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center">&nbsp;</td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1"><?php echo $numerodehoras; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalhoranutilizada; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalhorautilizada; ?></font></td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">Média</font></td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1"><?php
	$quantidadelinhas=$quantidadelinhas*6;
	 echo $numerodehoras/$quantidadelinhas; ?></font></td>
    <td align="center"><font size="-1"><?php
	 echo round($totalhoranutilizada/$quantidadelinhas,2); ?></font></td>
    <td align="center"><font size="-1"><?php
	 echo round($totalhorautilizada/$quantidadelinhas,2); ?></font></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</div>
<?php 
	$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($porcentagemhorautilizada,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($porcentagemhoranutilizada,2)));

?>
</div>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<?php 

}

if($nomeunidade!="Todos" and $ambientealocado=="Todos" and $nomeespaco=="Todos" and $diasemana=="Todos" and $periodo=="Todos"){

	?>
<p><strong><center>Quadro de uso dos laboratórios </center></strong></p>
  <div class="demo_jui" style="max-width:933px">  
<table width="933" border="1" align="center" cellpadding="0" cellspacing="0" class="display" id="example">
<thead>
  <tr bgcolor="#E8E8E8">
    <th width="34" align="center"><font size="-1"><strong>Cód.</strong></font></th
    >
    <th width="154" align="center"><font size="-1"><strong>Unidade</strong></font></th
    ><th width="136" align="center"><font size="-1"><strong>Nome do Espaço Físico</strong></font></th
    ><th width="172" align="center"><font size="-1"><strong>Ambiente Alocado</strong></font></th
    ><th width="96" align="center"><font size="-1"><strong>Dia da Semana</strong></font></th
    ><th width="75" align="center"><font size="-1"><strong>Período</strong></font></th
    ><th width="75" align="center"><font size="-1"><strong> Horas Previstas</strong></font></th
    >
    <th width="91" align="center"><font size="-1"><strong>Horas Não Utilizadas</strong></font></th
    >
    <th width="53" align="center"><font size="-1"><strong>Horas Utilizadas</strong></font></th
    ><th width="25" align="center"><font size="-1"><strong>%</strong></font></th
    >
  </tr>
</thead>
<tbody>  
  <?php
  
  			//--------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------TODOS PERÍODOS----------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
			//-------------------------------------------------------------------------//
/*
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio inner join tbl_etec on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where tbl_espaco_fisico.FK_Laboratorio='$nomeespaco' and tbl_espaco_fisico.FK_Instituicao='$nomeunidade'";*/

$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio inner join tbl_etec on tbl_etec.PK_CodEtec=tbl_espaco_fisico.FK_Instituicao where tbl_espaco_fisico.FK_Instituicao='$nomeunidade'";
$comando=mysql_query($sql);
while($linha=mysql_fetch_array($comando)){		
	 $quantidadelinhas=$quantidadelinhas+1;			
	$numerodehoras=$numerodehoras+96;	

	if($diasemana=="Todos"){
	
	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$SegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$SegManha;
	
	$porcSegManha=(100/6)*$SegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$SegTarde=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegManha=5-$SegTarde;
	
	$porcSegTarde=(100/5)*$SegTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$SegNoite=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegManha=5-$SegNoite;
	
	$porctotalSegManha=(100/5)*$SegNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSegunda=$SegManha+$SegTarde+$SegNoite;
	$porctotalSegunda=(100/16)*$totalSegunda;
	$NutilizadaSegunda=16-$totalSegunda;
	$porcNutilizadaSegunda=(100/16)*$NutilizadaSegunda;

	

//----------------------------------------------Terça - Feira -----------------------------------------------//

	
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$TerManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaSegManha=6-$TerManha;
	
	$porctotalSegManha=(100/6)*$TerManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{

	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$TerTarde=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaSegManha=5-$TerTarde;
	
	$porctotalSegManha=(100/5)*$TerTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	


	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		

		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$TerNoite=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaSegManha=5-$TerNoite;
	
	$porctotalSegManha=(100/5)*$TerNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalTerca=$TerManha+$TerTarde+$TerNoite;
	$porctotalTerca=(100/16)*$totalTerca;
	$NutilizadaTerca=16-$totalTerca;
	$porcNutilizadaTerca=(100/16)*$NutilizadaTerca;


//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//

	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$QuartaManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaSegManha=6-$QuartaManha;
	
	$porctotalSegManha=(100/6)*$QuartaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$QuartaTarde=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaSegManha=5-$QuartaTarde;
	
	$porctotalSegManha=(100/5)*$QuartaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$QuartaNoite=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaSegManha=5-$QuartaNoite;
	
	$porctotalSegManha=(100/5)*$QuartaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalQuarta=$QuartaManha+$QuartaTarde+$QuartaNoite;
	$porctotalQuarta=(100/16)*$totalQuarta;
	$NutilizadaQuarta=16-$totalQuarta;
	$porcNutilizadaQuarta=(100/16)*$NutilizadaQuarta;



//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//


	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$QuinManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaSegManha=6-$QuinManha;
	
	$porctotalSegManha=(100/6)*$QuinManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$QuinTarde=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaSegManha=5-$QuinTarde;
	
	$porctotalSegManha=(100/5)*$QuinTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	


	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$QuinNoite=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaSegManha=5-$QuinNoite;
	
	$porctotalSegManha=(100/5)*$QuinNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	$totalQuinta=$QuinManha+$QuinTarde+$QuinNoite;
	$porctotalQuinta=(100/16)*$totalQuinta;
	$NutilizadaQuinta=16-$totalQuinta;
	$porcNutilizadaQuinta=(100/16)*$NutilizadaQuinta;



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//

	
	
	//--------------Sexta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$SextaManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSegManha=6-$SextaManha;
	
	$porctotalSegManha=(100/6)*$SextaManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$SextaTarde=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSegManha=5-$SextaTarde;
	
	$porctotalSegManha=(100/5)*$SextaTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	


	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$SextaNoite=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSegManha=5-$SextaNoite;
	

	$porctotalSegManha=(100/5)*$SextaNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	

	$totalSexta=$SextaManha+$SextaTarde+$SextaNoite;
	$porctotalSexta=(100/16)*$totalSexta;
	$NutilizadaSexta=16-$totalSexta;
	$porcNutilizadaSexta=(100/16)*$NutilizadaSexta;



//--------------------------------------------------Sábado---------------------------------------------------------//

	
	
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$SabManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSegManha=6-$SabManha;
	
	$porctotalSegManha=(100/6)*$SabManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$SabTarde=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSegManha=5-$SabTarde;
	
	$porctotalSegManha=(100/5)*$SabTarde;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$SabNoite=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSegManha=5-$SabNoite;
	
	$porctotalSegManha=(100/5)*$SabNoite;
	$porcNaoutilizadaSegManha=(100/5)*$NaoutilizadaSegManha;
	$horapevista=5;
	
	
	$totalSabado=$SabManha+$SabTarde+$SabNoite;
	$porctotalSabado=(100/16)*$totalSabado;
	$NutilizadaSabado=16-$totalSabado;
	$porcNutilizadaSabado=(100/16)*$NutilizadaSabado;
	
	
	$horapevista=16;
	
	
		
	
	$media=($totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado)/6;
	$porcmedia=($porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado)/6;
	$horanutilizada=($NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado)/6;
	$porchoranutilizada=($porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado)/6;
	
	
	$totalhorautilizada=$totalSegunda+$totalTerca+$totalQuarta+$totalQuinta+$totalSexta+$totalSabado;
	$totalporchorautilizada=$porctotalSegunda+$porctotalTerca+$porctotalQuarta+$porctotalQuinta+$porctotalSexta+$porctotalSabado;
	$totalhoranutilizada=$NutilizadaSegunda+$NutilizadaTerca+$NutilizadaQuarta+$NutilizadaQuinta+$NutilizadaSexta+$NutilizadaSabado;
	$totalporchoranutilizada=$porcNutilizadaSegunda+$porcNutilizadaTerca+$porcNutilizadaQuarta+$porcNutilizadaQuinta+$porcNutilizadaSexta+$porcNutilizadaSabado;
	
	

	
	}			
//--------------------Total de horas não utilizadas---------------------//			

	$contadorSegunda=$NutilizadaSegunda+$contadorSegunda;
	$contadorTerca=$NutilizadaTerca+$contadorTerca;
	$contadorQuarta=$NutilizadaQuarta+$contadorQuarta;
	$contadorQuinta=$NutilizadaQuinta+$contadorQuinta;
	$contadorSexta=$NutilizadaSexta+$contadorSexta;
	$contadorSabado=$NutilizadaSabado+$contadorSabado;
	
	$horasnaoutilizadas=$contadorSegunda+$contadorTerca+$contadorQuarta+$contadorQuinta+$contadorSexta+$contadorSabado;	


//----------------------Total de horas utilizadas ---------------------//
 	$horasutiSegunda=$totalSegunda+$horasutiSegunda;
	$horasutiTerca=$totalTerca+$horasutiTerca;
	$horasutiQuarta=$totalQuarta+$horasutiQuarta;
	$horasutiQuinta=$totalQuinta+$horasutiQuinta;
	$horasutiSexta=$totalSexta+$horasutiSexta;
	$horasutiSabado=$totalSabado+$horasutiSabado;
	
	$horastotalutilizada=$horasutiSegunda+$horasutiTerca+$horasutiQuarta+$horasutiQuinta+$horasutiSexta+$horasutiSabado;	 
  ?>
  <tr>
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Segunda-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSegunda; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSegunda,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Terça-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalTerca; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalTerca,2)."%"; ?></font></td>
    </tr>
  <tr>
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quarta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuarta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuarta;?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuarta,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Quinta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalQuinta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalQuinta,2)."%"; ?></font></td>
    </tr>
  <tr>
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sexta-Feira</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSexta; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSexta,2)."%"; ?></font></td>
    </tr>
  <tr bgcolor="#E8E8E8">
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Sábado</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">16</font></td>
    <td align="center"><font size="-1"><?php echo $NutilizadaSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo $totalSabado; ?></font></td>
    <td align="center"><font size="-1"><?php echo round($porctotalSabado,2)."%"; ?></font></td>
    </tr>
  <?php 
  
}
?>
  <tr>
    <td align="center"><font size="-1"><?php echo $linha['Codigo_etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Etec']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
    <td align="center"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">Todos</font></td>
    <td align="center"><font size="-1">100%</font></td>
    <td align="center"><font size="-1"><?php $porcentagemhoranutilizada=number_format((($horasnaoutilizadas*100)/$numerodehoras),0)."%"; echo $porcentagemhoranutilizada; ?></font></td>
    <td align="center"><font size="-1"><?php $porcentagemhorautilizada=number_format((($horastotalutilizada*100)/$numerodehoras),0)."%"; echo $porcentagemhorautilizada; ?></font></td>
    <td align="center">&nbsp;</td>
    </tr>
  <tr bgcolor="#E8E8E8">
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1">Total</font></td>
    <td align="center"><font size="-1">&nbsp;</font></td>
    <td align="center"><font size="-1"><?php echo $numerodehoras; ?></font></td>
    <td align="center"><font size="-1"><?php echo $horasnaoutilizadas; ?></td>
    <td align="center"><font size="-1"><?php echo $horastotalutilizada; ?></font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr bgcolor="#E8E8E8" class="gradeU">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">Média</font></td>
    <td>&nbsp;</td>
    <td align="center"><font size="-1">
      <?php
	
	 echo $numerodehoras/($quantidadelinhas*6); ?>
    </font></td>
    <td align="center"><font size="-1">
      <?php
	 echo round($horasnaoutilizadas/($quantidadelinhas*6),0); ?>
    </font></td>
    <td align="center"><font size="-1">
      <?php
	 echo round($horastotalutilizada/($quantidadelinhas*6),0); ?>
    </font></td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<?php 
	$resultado[] = array('name' => 'Horas Utilizadas', 'data' => array(round($porcentagemhorautilizada,2)));
	$resultado[] = array('name' => 'Horas Não Utilizadas', 'data' => array(round($porcentagemhoranutilizada,2)));

?>
</div>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

  
    

  <?php 
}


if($diasemana!="Todos" and $periodo=="Todos" and $nomeespaco!="Todos" and $ambientealocado!="Todos" and $nomeunidade=="Todos"){
?>


<div class="demo_jui" style="max-width:933px">
  <table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example2">
      <thead>
        <tr>
          <th bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Espaço Físico</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Período</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
          <th bgcolor="#E8E8E8"><font size="-1">%</font></th>
        </tr>
      </thead>
      <tbody>
        <?php
  
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where tbl_espaco_fisico.FK_Instituicao='$nomeunidade'";
$comando=mysql_query($sql);
while($linha=mysql_fetch_array($comando)){

//------------------Geração por Dia da Semana Expessifico---------------

	if($diasemana=="Segunda"){
	
	
	if($periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$totalSegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$totalSegTarde=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegTarde=5-$totalSegTarde;
	
	$porctotalSegTarde=(100/5)*$totalSegTarde;
	$porcNaoutilizadaSegTarde=(100/5)*$NaoutilizadaSegTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$totalSegNoite=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegNoite=5-$totalSegNoite;
	
	$porctotalSegNoite=(100/5)*$totalSegNoite;
	$porcNaoutilizadaSegNoite=(100/5)*$NaoutilizadaSegNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSegManha+$totalSegTarde+$totalSegNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSegManha+$NaoutilizadaSegTarde+$NaoutilizadaSegNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;
}







//----------------------------------------------Terça - Feira -----------------------------------------------//

	if($diasemana=="Terca"){
	
	
	if($periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$totalTerManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaTerManha=6-$totalTerManha;
	
	$porctotalTerManha=(100/6)*$totalTerManha;
	$porcNaoutilizadaTerManha=(100/6)*$NaoutilizadaTerManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$totalTerTarde=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaTerTarde=5-$totalTerTarde;
	
	$porctotalTerTarde=(100/5)*$totalTerTarde;
	$porcNaoutilizadaTerTarde=(100/5)*$NaoutilizadaTerTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		
		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$totalTerNoite=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaTerNoite=5-$totalTerNoite;
	
	$porctotalTerNoite=(100/5)*$totalTerNoite;
	$porcNaoutilizadaTerNoite=(100/5)*$NaoutilizadaTerNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalTerManha+$totalTerTarde+$totalTerNoite;
	$totaltotalhoranutilizada=$NaoutilizadaTerManha+$NaoutilizadaTerTarde+$NaoutilizadaTerNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}


//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//


	if($diasemana=="Quarta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$totalQuarManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaQuarManha=6-$totalQuarManha;
	
	
	$porctotaltotal=(100/6)*$totalQuarManha;
	$porcNaoutilizadaQuarManha=(100/6)*$NaoutilizadaQuarManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$totalQuarTarde=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaQuarTarde=5-$totalQuarTarde;
	
	$porctotalQuarTarde=(100/5)*$totalQuarTarde;
	$porcNaoutilizadaQuarTarde=(100/5)*$NaoutilizadaQuarTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$totalQuarNoite=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaQuarNoite=5-$totalQuarNoite;
	
	$porctotalQuarNoite=(100/5)*$totalQuarNoite;
	$porcNaoutilizadaQuarNoite=(100/5)*$NaoutilizadaQuarNoite;
	$horapevista=5;
	
	}
	
	
	$totaltotaldiasemana=$totalQuarManha+$totalQuarTarde+$totalQuarNoite;
	$totaltotalhoranutilizada=$NaoutilizadaQuarManha+$NaoutilizadaQuarTarde+$NaoutilizadaQuarNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}




//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//

	if($diasemana=="Quinta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$totalQuinManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaQuinManha=6-$totalQuinManha;
	
	$porctotalQuinManha=(100/6)*$totalQuinManha;
	$porcNaoutilizadaQuinManha=(100/6)*$NaoutilizadaQuinManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$totalQuinTarde=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaQuinTarde=5-$totalQuinTarde;
	
	$porctotalQuinTarde=(100/5)*$totalQuinTarde;
	$porcNaoutilizadaQuinTarde=(100/5)*$NaoutilizadaQuinTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$totalQuinNoite=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaQuinNoite=5-$totalQuinNoite;
	
	$porctotalQuinNoite=(100/5)*$totalQuinNoite;
	$porcNaoutilizadaQuinNoite=(100/5)*$NaoutilizadaQuinNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalQuinManha+$totalQuinTarde+$totalQuinNoite;
	$totaltotalhoranutilizada=$NaoutilizadaQuinManha+$NaoutilizadaQuinTarde+$NaoutilizadaQuinNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//


	if($diasemana=="Sexta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$totalSexManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSexManha=6-$totalSexManha;
	
	$porctotalSexManha=(100/6)*$totalSexManha;
	$porcNaoutilizadaSexManha=(100/6)*$NaoutilizadaSexManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$totalSexTarde=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSexTarde=5-$totalSexTarde;
	
	$porctotalSexTarde=(100/5)*$totalSexTarde;
	$porcNaoutilizadaSexTarde=(100/5)*$NaoutilizadaSexTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$totalSexNoite=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSexNoite=5-$totalSexNoite;
	
	$porctotalSexNoite=(100/5)*$totalSexNoite;
	$porcNaoutilizadaSexNoite=(100/5)*$NaoutilizadaSexNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSexManha+$totalSexTarde+$totalSexNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSexManha+$NaoutilizadaSexTarde+$NaoutilizadaSexNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}




//--------------------------------------------------Sábado---------------------------------------------------------//


	if($diasemana=="Sabado"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$totalSabManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSabManha=6-$totalSabManha;
	
	$porctotalSabManha=(100/6)*$totalSabManha;
	$porcNaoutilizadaSabManha=(100/6)*$NaoutilizadaSabManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$totalSabTarde=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSabTarde=5-$totalSabTarde;
	
	$porctotalSabTarde=(100/5)*$totalSabTarde;
	$porcNaoutilizadaSabTarde=(100/5)*$NaoutilizadaSabTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$totalSabNoite=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSabNoite=5-$totalSabNoite;
	
	$porctotalSabNoite=(100/5)*$totalSabNoite;
	$porcNaoutilizadaSabNoite=(100/5)*$NaoutilizadaSabNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSabManha+$totalSabTarde+$totalSabNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSabManha+$NaoutilizadaSabTarde+$NaoutilizadaSabNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;	
	}
	


//--------------------Fechando Se não for todos ------------------------//
	
		$resultado[] = array('name' => "Horas Utilizadas", 'data' => array(round($porctotaltotal,2)));
		$resultado[] = array('name' => "Horas Não Utilizadas", 'data' => array(round($porcNaoutilizadatotal,2)));
		
		
	
	$totaltotalhoraprevista=$totaltotalhoraprevista+1;
	
	$totaltotalfinalhrnutilizadas=$totaltotalfinalhrnutilizadas+$totaltotalhoranutilizada;
	
	$totaltotalhorasutilizadas=$totaltotalhorasutilizadas+$totaltotaldiasemana;
	

	if($cor=="#FFFFFF"){
	$cor="#CCCCCC";	
		}else{
	$cor="#FFFFFF";		
			}
	
	//-----------------Total de horas previstas

	?>
        <tr align="center" bgcolor="<?php echo $cor; ?>">
          <td width="35"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
          <td width="148"><font size="-1"><?php echo $linhaEtec['Etec']; ?></font></td>
          <td width="109"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
          <td width="114"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
          <td width="66"><font size="-1">
            <?php if($diasemana=="Terca"){
		  echo "Terça";
		  }
		  else if($diasemana=="Sabado"){
		  echo "Sábado";	  
			  }else{
		  echo $diasemana; } ?>
          </font></td>
          <td width="61"><font size="-1"><?php if($periodo=="Manha"){
			  								echo "Manhã";
			  									}else{
											echo $periodo; } ?></font></td>
          <td width="108"><font size="-1"><?php echo "16"; ?></font></td>
          <td width="70"><font size="-1"><?php echo $totaltotalhoranutilizada; ?></font></td>
          <td width="68"><font size="-1"><?php echo $totaltotaldiasemana; ?></font></td>
          <td width="38"><font size="-1"><?php echo round($porctotaltotal,2)."%"; ?></font></td>
        </tr>
         <?php } ?>
        <tr align="center" class="gradeU">
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong><font size="-1">Total</font></strong></td>
          <td><?php echo $horaprevistatotal=$totaltotalhoraprevista*16; ?></td>
          <td><?php echo $totaltotalfinalhrnutilizadas; ?></td>
          <td><?php echo $totaltotalhorasutilizadas; ?></td>
          <td><?php
		  	//----------------porcentagem de uso-----------------//
	$porctotalhorautilizada=($totaltotalhorasutilizadas*100)/$horaprevistatotal;
		   echo round($porctotalhorautilizada,2)." %"; ?></td>
        </tr>
       
  </table>
  <?php } ?>
  
 <?php
if($nomeunidade!="Todos" and $diasemana!="Todos" and $periodo=="Todos" and $nomeespaco!="Todos" and $ambientealocado!="Todos"){
 ?>
<table width="933" border="1" cellpadding="0" cellspacing="0"  class="display" id="example3">
  <thead>
    <tr>
      <th bgcolor="#E8E8E8"><font size="-1">Cód.</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Unidade</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Espaço Físico</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Ambiente Alocado</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Dia da Semana</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Período</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Total de Horas Previstas</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Horas Não Utilizadas</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">Horas Utilizadas</font></th>
      <th bgcolor="#E8E8E8"><font size="-1">%</font></th>
    </tr>
  </thead>
  <tbody>
    <?php
  
 if($ambientealocado!="Todos"){
$contsql.=" and tbl_espaco_fisico.PK_CodLaboratorio='$ambientealocado'";	 
	 } 
  
$sql="select * from tbl_espaco_fisico inner join tbl_cadastrolaboratorio on tbl_espaco_fisico.FK_Laboratorio=tbl_cadastrolaboratorio.PK_CodLaboratorio where 1 and tbl_espaco_fisico.FK_Instituicao='$nomeunidade'".$contsql;
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);

//------------------Geração por Dia da Semana Expessifico---------------

	if($diasemana=="Segunda"){
	
	
	if($periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mseg']=='1'){
	$Mseg=1;	
		}else{
	$Mseg=0;		
			}
		
	if($linha['Tseg']=='1'){
	$Tseg=1;	
		}else{
	$Tseg=0;		
			}

	if($linha['Nseg']=='1'){
	$Nseg=1;	
		}else{
	$Nseg=0;		
			}		
		
	if($linha['Seg10']=='1'){
	$Seg10=1;	
		}else{
	$Seg10=0;		
			}		
		
	if($linha['Seg11']=='1'){
	$Seg11=1;	
		}else{
	$Seg11=0;		
			}
		
	if($linha['Seg12']=='1'){
	$Seg12=1;	
		}else{
	$Seg12=0;		
			}				
				
	$totalSegManha=$Mseg+$Tseg+$Nseg+$Seg10+$Seg11+$Seg12;
	$NaoutilizadaSegManha=6-$totalSegManha;
	
	$porctotalSegManha=(100/6)*$totalSegManha;
	$porcNaoutilizadaSegManha=(100/6)*$NaoutilizadaSegManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg13']=='1'){
	$Seg13=1;	
		}else{
	$Seg13=0;		
			}
		
	if($linha['Seg14']=='1'){
	$Seg14=1;	
		}else{
	$Seg14=0;		
			}

	if($linha['Seg15']=='1'){
	$Seg15=1;	
		}else{
	$Seg15=0;		
			}		
		
	if($linha['Seg16']=='1'){
	$Seg16=1;	
		}else{
	$Seg16=0;		
			}		
		
	if($linha['Seg17']=='1'){
	$Seg17=1;	
		}else{
	$Seg17=0;		
			}
				
	$totalSegTarde=$Seg13+$Seg14+$Seg15+$Seg16+$Seg17;
	$NaoutilizadaSegTarde=5-$totalSegTarde;
	
	$porctotalSegTarde=(100/5)*$totalSegTarde;
	$porcNaoutilizadaSegTarde=(100/5)*$NaoutilizadaSegTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Seg18']=='1'){
	$Seg18=1;	
		}else{
	$Seg18=0;		
			}
		
	if($linha['Seg19']=='1'){
	$Seg19=1;	
		}else{
	$Seg19=0;		
			}

	if($linha['Seg20']=='1'){
	$Seg20=1;	
		}else{
	$Seg20=0;		
			}		
		
	if($linha['Seg21']=='1'){
	$Seg21=1;	
		}else{
	$Seg21=0;		
			}		
		
	if($linha['Seg22']=='1'){
	$Seg22=1;	
		}else{
	$Seg22=0;		
			}
				
	$totalSegNoite=$Seg18+$Seg19+$Seg20+$Seg21+$Seg22;
	$NaoutilizadaSegNoite=5-$totalSegNoite;
	
	$porctotalSegNoite=(100/5)*$totalSegNoite;
	$porcNaoutilizadaSegNoite=(100/5)*$NaoutilizadaSegNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSegManha+$totalSegTarde+$totalSegNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSegManha+$NaoutilizadaSegTarde+$NaoutilizadaSegNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;
}







//----------------------------------------------Terça - Feira -----------------------------------------------//

	if($diasemana=="Terca"){
	
	
	if($periodo=="Todos"){
	
	//--------------Segunda  Manhã------------------//
	if($linha['Mter']=='1'){
	$Mter=1;	
		}else{
	$Mter=0;		
			}
		
	if($linha['Tter']=='1'){
	$Tter=1;	
		}else{
	$Tter=0;		
			}

	if($linha['Nter']=='1'){
	$Nter=1;	
		}else{
	$Nter=0;		
			}		
		
	if($linha['Ter10']=='1'){
	$Ter10=1;	
		}else{
	$Ter10=0;		
			}		
		
	if($linha['Ter11']=='1'){
	$Ter11=1;	
		}else{
	$Ter11=0;		
			}
		
	if($linha['Ter12']=='1'){
	$Ter12=1;	
		}else{
	$Ter12=0;		
			}				
				
	$totalTerManha=$Mter+$Tter+$Nter+$Ter10+$Ter11+$Ter12;
	$NaoutilizadaTerManha=6-$totalTerManha;
	
	$porctotalTerManha=(100/6)*$totalTerManha;
	$porcNaoutilizadaTerManha=(100/6)*$NaoutilizadaTerManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter13']=='1'){
	$Ter13=1;	
		}else{
	$Ter13=0;		
			}
		
	if($linha['Ter14']=='1'){
	$Ter14=1;	
		}else{
	$Ter14=0;		
			}

	if($linha['Ter15']=='1'){
	$Ter15=1;	
		}else{
	$Ter15=0;		
			}		
		
	if($linha['Ter16']=='1'){
	$Ter16=1;	
		}else{
	$Ter16=0;		
			}		
		
	if($linha['Ter17']=='1'){
	$Ter17=1;	
		}else{
	$Ter17=0;		
			}
				
	$totalTerTarde=$Ter13+$Ter14+$Ter15+$Ter16+$Ter17;
	$NaoutilizadaTerTarde=5-$totalTerTarde;
	
	$porctotalTerTarde=(100/5)*$totalTerTarde;
	$porcNaoutilizadaTerTarde=(100/5)*$NaoutilizadaTerTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Segunda  Tarde------------------//
	if($linha['Ter18']=='1'){
	$Ter18=1;	
		}else{
	$Ter18=0;		
			}
		
	if($linha['Ter19']=='1'){
	$Ter19=1;	
		}else{
	$Ter19=0;		
			}

	if($linha['Ter20']=='1'){
	$Ter20=1;	
		}else{
	$Ter20=0;		
			}		
		
	if($linha['Ter21']=='1'){
	$Ter21=1;	
		}else{
	$Ter21=0;		
			}		
		
	if($linha['Ter22']=='1'){
	$Ter22=1;	
		}else{
	$Ter22=0;		
			}
				
	$totalTerNoite=$Ter18+$Ter19+$Ter20+$Ter21+$Ter22;
	$NaoutilizadaTerNoite=5-$totalTerNoite;
	
	$porctotalTerNoite=(100/5)*$totalTerNoite;
	$porcNaoutilizadaTerNoite=(100/5)*$NaoutilizadaTerNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalTerManha+$totalTerTarde+$totalTerNoite;
	$totaltotalhoranutilizada=$NaoutilizadaTerManha+$NaoutilizadaTerTarde+$NaoutilizadaTerNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}


//--------------------------------------------------Quarta - Feira ----------------------------------------------------------//


	if($diasemana=="Quarta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Mqua']=='1'){
	$Mqua=1;	
		}else{
	$Mqua=0;		
			}
		
	if($linha['Tqua']=='1'){
	$Tqua=1;	
		}else{
	$Tqua=0;		
			}

	if($linha['Nqua']=='1'){
	$Nqua=1;	
		}else{
	$Nqua=0;		
			}		
		
	if($linha['Quar10']=='1'){
	$Quar10=1;	
		}else{
	$Quar10=0;		
			}		
		
	if($linha['Quar11']=='1'){
	$Quar11=1;	
		}else{
	$Quar11=0;		
			}
		
	if($linha['Quar12']=='1'){
	$Quar12=1;	
		}else{
	$Quar12=0;		
			}				
				
	$totalQuarManha=$Mqua+$Tqua+$Nqua+$Quar10+$Quar11+$Quar12;
	$NaoutilizadaQuarManha=6-$totalQuarManha;
	
	
	$porctotaltotal=(100/6)*$totalQuarManha;
	$porcNaoutilizadaQuarManha=(100/6)*$NaoutilizadaQuarManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Quarta  Tarde------------------//
	if($linha['Quar13']=='1'){
	$Quar13=1;	
		}else{
	$Quar13=0;		
			}
		
	if($linha['Quar14']=='1'){
	$Quar14=1;	
		}else{
	$Quar14=0;		
			}

	if($linha['Quar15']=='1'){
	$Quar15=1;	
		}else{
	$Quar15=0;		
			}		
		
	if($linha['Quar16']=='1'){
	$Quar16=1;	
		}else{
	$Quar16=0;		
			}		
		
	if($linha['Quar17']=='1'){
	$Quar17=1;	
		}else{
	$Quar17=0;		
			}
				
	$totalQuarTarde=$Quar13+$Quar14+$Quar15+$Quar16+$Quar17;
	$NaoutilizadaQuarTarde=5-$totalQuarTarde;
	
	$porctotalQuarTarde=(100/5)*$totalQuarTarde;
	$porcNaoutilizadaQuarTarde=(100/5)*$NaoutilizadaQuarTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quar18']=='1'){
	$Quar18=1;	
		}else{
	$Quar18=0;		
			}
		
	if($linha['Quar19']=='1'){
	$Quar19=1;	
		}else{
	$Quar19=0;		
			}

	if($linha['Quar20']=='1'){
	$Quar20=1;	
		}else{
	$Quar20=0;		
			}		
		
	if($linha['Quar21']=='1'){
	$Quar21=1;	
		}else{
	$Quar21=0;		
			}		
		
	if($linha['Quar22']=='1'){
	$Quar22=1;	
		}else{
	$Quar22=0;		
			}
				
	$totalQuarNoite=$Quar18+$Quar19+$Quar20+$Quar21+$Quar22;
	$NaoutilizadaQuarNoite=5-$totalQuarNoite;
	
	$porctotalQuarNoite=(100/5)*$totalQuarNoite;
	$porcNaoutilizadaQuarNoite=(100/5)*$NaoutilizadaQuarNoite;
	$horapevista=5;
	
	}
	
	
	$totaltotaldiasemana=$totalQuarManha+$totalQuarTarde+$totalQuarNoite;
	$totaltotalhoranutilizada=$NaoutilizadaQuarManha+$NaoutilizadaQuarTarde+$NaoutilizadaQuarNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}




//--------------------------------------------------Quinta - Feira ----------------------------------------------------------//

	if($diasemana=="Quinta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quinta  Manhã------------------//
	if($linha['Mqui']=='1'){
	$Mqui=1;	
		}else{
	$Mqui=0;		
			}
		
	if($linha['Tqui']=='1'){
	$Tqui=1;	
		}else{
	$Tqui=0;		
			}

	if($linha['Nqui']=='1'){
	$Nqui=1;	
		}else{
	$Nqui=0;		
			}		
		
	if($linha['Quin10']=='1'){
	$Quin10=1;	
		}else{
	$Quin10=0;		
			}		
		
	if($linha['Quin11']=='1'){
	$Quin11=1;	
		}else{
	$Quin11=0;		
			}
		
	if($linha['Quin12']=='1'){
	$Quin12=1;	
		}else{
	$Quin12=0;		
			}				
				
	$totalQuinManha=$Mqui+$Tqui+$Nqui+$Quin10+$Quin11+$Quin12;
	$NaoutilizadaQuinManha=6-$totalQuinManha;
	
	$porctotalQuinManha=(100/6)*$totalQuinManha;
	$porcNaoutilizadaQuinManha=(100/6)*$NaoutilizadaQuinManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin13']=='1'){
	$Quin13=1;	
		}else{
	$Quin13=0;		
			}
		
	if($linha['Quin14']=='1'){
	$Quin14=1;	
		}else{
	$Quin14=0;		
			}

	if($linha['Quin15']=='1'){
	$Quin15=1;	
		}else{
	$Quin15=0;		
			}		
		
	if($linha['Quin16']=='1'){
	$Quin16=1;	
		}else{
	$Quin16=0;		
			}		
		
	if($linha['Quin17']=='1'){
	$Quin17=1;	
		}else{
	$Quin17=0;		
			}
				
	$totalQuinTarde=$Quin13+$Quin14+$Quin15+$Quin16+$Quin17;
	$NaoutilizadaQuinTarde=5-$totalQuinTarde;
	
	$porctotalQuinTarde=(100/5)*$totalQuinTarde;
	$porcNaoutilizadaQuinTarde=(100/5)*$NaoutilizadaQuinTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Quinta  Tarde------------------//
	if($linha['Quin18']=='1'){
	$Quin18=1;	
		}else{
	$Quin18=0;		
			}
		
	if($linha['Quin19']=='1'){
	$Quin19=1;	
		}else{
	$Quin19=0;		
			}

	if($linha['Quin20']=='1'){
	$Quin20=1;	
		}else{
	$Quin20=0;		
			}		
		
	if($linha['Quin21']=='1'){
	$Quin21=1;	
		}else{
	$Quin21=0;		
			}		
		
	if($linha['Quin22']=='1'){
	$Quin22=1;	
		}else{
	$Quin22=0;		
			}
				
	$totalQuinNoite=$Quin18+$Quin19+$Quin20+$Quin21+$Quin22;
	$NaoutilizadaQuinNoite=5-$totalQuinNoite;
	
	$porctotalQuinNoite=(100/5)*$totalQuinNoite;
	$porcNaoutilizadaQuinNoite=(100/5)*$NaoutilizadaQuinNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalQuinManha+$totalQuinTarde+$totalQuinNoite;
	$totaltotalhoranutilizada=$NaoutilizadaQuinManha+$NaoutilizadaQuinTarde+$NaoutilizadaQuinNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}



//--------------------------------------------------Sexta - Feira ----------------------------------------------------------//


	if($diasemana=="Sexta"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msex']=='1'){
	$Msex=1;	
		}else{
	$Msex=0;		
			}
		
	if($linha['Tsex']=='1'){
	$Tsex=1;	
		}else{
	$Tsex=0;		
			}

	if($linha['Nsex']=='1'){
	$Nsex=1;	
		}else{
	$Nsex=0;		
			}		
		
	if($linha['Sex10']=='1'){
	$Sex10=1;	
		}else{
	$Sex10=0;		
			}		
		
	if($linha['Sex11']=='1'){
	$Sex11=1;	
		}else{
	$Sex11=0;		
			}
		
	if($linha['Sex12']=='1'){
	$Sex12=1;	
		}else{
	$Sex12=0;		
			}				
				
	$totalSexManha=$Msex+$Tsex+$Nsex+$Sex10+$Sex11+$Sex12;
	$NaoutilizadaSexManha=6-$totalSexManha;
	
	$porctotalSexManha=(100/6)*$totalSexManha;
	$porcNaoutilizadaSexManha=(100/6)*$NaoutilizadaSexManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex13']=='1'){
	$Sex13=1;	
		}else{
	$Sex13=0;		
			}
		
	if($linha['Sex14']=='1'){
	$Sex14=1;	
		}else{
	$Sex14=0;		
			}

	if($linha['Sex15']=='1'){
	$Sex15=1;	
		}else{
	$Sex15=0;		
			}		
		
	if($linha['Sex16']=='1'){
	$Sex16=1;	
		}else{
	$Sex16=0;		
			}		
		
	if($linha['Sex17']=='1'){
	$Sex17=1;	
		}else{
	$Sex17=0;		
			}
				
	$totalSexTarde=$Sex13+$Sex14+$Sex15+$Sex16+$Sex17;
	$NaoutilizadaSexTarde=5-$totalSexTarde;
	
	$porctotalSexTarde=(100/5)*$totalSexTarde;
	$porcNaoutilizadaSexTarde=(100/5)*$NaoutilizadaSexTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Sexta  Tarde------------------//
	if($linha['Sex18']=='1'){
	$Sex18=1;	
		}else{
	$Sex18=0;		
			}
		
	if($linha['Sex19']=='1'){
	$Sex19=1;	
		}else{
	$Sex19=0;		
			}

	if($linha['Sex20']=='1'){
	$Sex20=1;	
		}else{
	$Sex20=0;		
			}		
		
	if($linha['Sex21']=='1'){
	$Sex21=1;	
		}else{
	$Sex21=0;		
			}		
		
	if($linha['Sex22']=='1'){
	$Sex22=1;	
		}else{
	$Sex22=0;		
			}
				
	$totalSexNoite=$Sex18+$Sex19+$Sex20+$Sex21+$Sex22;
	$NaoutilizadaSexNoite=5-$totalSexNoite;
	
	$porctotalSexNoite=(100/5)*$totalSexNoite;
	$porcNaoutilizadaSexNoite=(100/5)*$NaoutilizadaSexNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSexManha+$totalSexTarde+$totalSexNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSexManha+$NaoutilizadaSexTarde+$NaoutilizadaSexNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;

}




//--------------------------------------------------Sábado---------------------------------------------------------//


	if($diasemana=="Sabado"){
	
	
	if($periodo=="Todos"){
	
	//--------------Quarta  Manhã------------------//
	if($linha['Msab']=='1'){
	$Msab=1;	
		}else{
	$Msab=0;		
			}
		
	if($linha['Tsab']=='1'){
	$Tsab=1;	
		}else{
	$Tsab=0;		
			}

	if($linha['Nsab']=='1'){
	$Nsab=1;	
		}else{
	$Nsab=0;		
			}		
		
	if($linha['Sab10']=='1'){
	$Sab10=1;	
		}else{
	$Sab10=0;		
			}		
		
	if($linha['Sab11']=='1'){
	$Sab11=1;	
		}else{
	$Sab11=0;		
			}
		
	if($linha['Sab12']=='1'){
	$Sab12=1;	
		}else{
	$Sab12=0;		
			}				
				
	$totalSabManha=$Msab+$Tsab+$Nsab+$Sab10+$Sab11+$Sab12;
	$NaoutilizadaSabManha=6-$totalSabManha;
	
	$porctotalSabManha=(100/6)*$totalSabManha;
	$porcNaoutilizadaSabManha=(100/6)*$NaoutilizadaSabManha;
	
	$horapevista=6;
	}
	
	
	if($periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab13']=='1'){
	$Sab13=1;	
		}else{
	$Sab13=0;		
			}
		
	if($linha['Sab14']=='1'){
	$Sab14=1;	
		}else{
	$Sab14=0;		
			}

	if($linha['Sab15']=='1'){
	$Sab15=1;	
		}else{
	$Sab15=0;		
			}		
		
	if($linha['Sab16']=='1'){
	$Sab16=1;	
		}else{
	$Sab16=0;		
			}		
		
	if($linha['Sab17']=='1'){
	$Sab17=1;	
		}else{
	$Sab17=0;		
			}
				
	$totalSabTarde=$Sab13+$Sab14+$Sab15+$Sab16+$Sab17;
	$NaoutilizadaSabTarde=5-$totalSabTarde;
	
	$porctotalSabTarde=(100/5)*$totalSabTarde;
	$porcNaoutilizadaSabTarde=(100/5)*$NaoutilizadaSabTarde;
	$horapevista=5;
	
	}


	if($periodo=="Todos"){
	//--------------Sabta  Tarde------------------//
	if($linha['Sab18']=='1'){
	$Sab18=1;	
		}else{
	$Sab18=0;		
			}
		
	if($linha['Sab19']=='1'){
	$Sab19=1;	
		}else{
	$Sab19=0;		
			}

	if($linha['Sab20']=='1'){
	$Sab20=1;	
		}else{
	$Sab20=0;		
			}		
		
	if($linha['Sab21']=='1'){
	$Sab21=1;	
		}else{
	$Sab21=0;		
			}		
		
	if($linha['Sab22']=='1'){
	$Sab22=1;	
		}else{
	$Sab22=0;		
			}
				
	$totalSabNoite=$Sab18+$Sab19+$Sab20+$Sab21+$Sab22;
	$NaoutilizadaSabNoite=5-$totalSabNoite;
	
	$porctotalSabNoite=(100/5)*$totalSabNoite;
	$porcNaoutilizadaSabNoite=(100/5)*$NaoutilizadaSabNoite;
	$horapevista=5;
	
	}
	
	$totaltotaldiasemana=$totalSabManha+$totalSabTarde+$totalSabNoite;
	$totaltotalhoranutilizada=$NaoutilizadaSabManha+$NaoutilizadaSabTarde+$NaoutilizadaSabNoite;
	$porctotaltotal=($totaltotaldiasemana*100)/16;
	$porcNaoutilizadatotal=100-$porctotaltotal;	
	}
	


//--------------------Fechando Se não for todos ------------------------//
	
		$resultado[] = array('name' => "Horas Utilizadas", 'data' => array(round($porctotaltotal,2)));
		$resultado[] = array('name' => "Horas Não Utilizadas", 'data' => array(round($porcNaoutilizadatotal,2)));
		
		
	
	$totaltotalhoraprevista=$totaltotalhoraprevista+1;
	
	$totaltotalfinalhrnutilizadas=$totaltotalfinalhrnutilizadas+$totaltotalhoranutilizada;
	
	$totaltotalhorasutilizadas=$totaltotalhorasutilizadas+$totaltotaldiasemana;
	

	if($cor=="#FFFFFF"){
	$cor="#CCCCCC";	
		}else{
	$cor="#FFFFFF";		
			}
			

	

	?>
    <tr align="center" class="gradeU">
      <td width="35"><font size="-1"><?php echo $linhaEtec['Codigo_etec']; ?></font></td>
      <td width="148"><font size="-1"><?php echo $linhaEtec['Etec']; ?></font></td>
      <td width="109"><font size="-1"><?php echo $linha['Nome_Laboratorio']; ?></font></td>
      <td width="114"><font size="-1"><?php echo $linha['Descricao']; ?></font></td>
      <td width="66"><font size="-1"><?php if($diasemana=="Terca"){
		  echo "Terça";
		  }
		  else if($diasemana=="Sabado"){
		  echo "Sábado";	  
			  }else{
		  echo $diasemana; } ?></font></td>
      <td width="61"><font size="-1">
        <?php if($periodo=="Manha"){
			  								echo "Manhã";
			  									}else{
											echo $periodo; } ?>
      </font></td>
      <td width="108"><?php echo "16" ; ?></td>
      <td width="70"><font size="-1"><?php echo $totaltotalhoranutilizada; ?></font></td>
      <td width="68"><font size="-1"><?php echo $totaltotaldiasemana; ?></font></td>
      <td width="38"><font size="-1"><?php echo round($porctotaltotal,2)."%"; ?></font></td>
    </tr>
</table>
<?php } ?> 
  
  
</div>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title></title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  
  
  
<?php 

	
if($diasemana!="Todos" and $periodo=="Todos" and $nomeespaco!="Todos" and $ambientealocado=="Todos"){
	
?>   
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
                text: '<?php echo $linhaEtec['Etec']; ?>'
            },
            xAxis: {
                categories: ['Horas Utilizadas','Horas não utilizadas']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total de Horas Utilizadas e não Utilizadas'
                }
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +' ('+ Math.round(this.percentage) +'%)';
                }
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [{
                name: 'Horas Utilizadas',
                data: [<?php if($periodo=="Todos"){ echo round($horautilizada,2); }else{ echo round($porctotalhorautilizada,2);} ?>]
            }, {
                name: 'Horas Não Utilizadas',
                data: [<?php if($periodo=="Todos"){ echo round($horanaoutilizada,2); }else{ echo round(100-$porctotalhorautilizada,2);} ?>]
            }]
        });
    });
    
});      
      
</script>      

<?php }else{ ?>       
        
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
				var valores = jQuery.parseJSON('<?php echo json_encode($resultado); ?>');
        chart = new Highcharts.Chart({	
            chart: {
                renderTo: 'container',
                <?php 
                if($nomeunidade!="Todos" and $nomeespaco!="Todos" and $diasemana=="Todos" and $periodo=="Todos"){
                ?>
                type: 'bar'
                <?php }else{ ?>
                type: 'column'	
                <?php } ?>	
            },
            title: {
                text: '<?php echo "Quadro de uso dos laboratórios -".$linhaEtec['Etec']; ?>'
            },
            subtitle: {
                text: '<?php
				if($periodo=="Manha"){ $periodo="Manhã"; };
				
				if($diasemana=="Terca"){
		  $diasemana="Terça";
		  }
		  if($diasemana=="Sabado"){
		  $diasemana="Sábado";	  
			  } 
				
				 echo $diasemana." - ".$periodo;	 ?>'
            },
            xAxis: {
                categories: [
				<?php if(($nomeunidade!="Todos" and $nomeespaco!="Todos" and $diasemana!="Todos") or ($nomeunidade!="Todos" and $nomeespaco!="Todos"  and $diasemana=="Todos" and $periodo!="Todos") or ($diasemana=="Todos" and $nomeespaco=="Todos") or (  $nomeespaco!="Todos" and $diasemana!="Todos" and $periodo!="Todos") or ($nomeunidade=="Todos" and $nomeespaco=="Todos" and $diasemana!="Todos" and $periodo=="Todos") or ($nomeunidade=="Todos" and $nomeespaco!="Todos" and $diasemana=="Todos" and $periodo=="Todos") or ($nomeunidade=="Todos" and $nomeespaco=="Todos" and $diasemana!="Todos" and $periodo!="Todos") or ($periodo!="Todos")){ ?>
                    'Horas Utilizadas e Não Utilizadas'
					<?php }else{ ?>
					'Segunda - Feira',
					'Terça - Feira',
					'Quarta - Feira',
					'Quinta - Feira',
					'Sexta - Feira',
					'Sábado',
					'Média'
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
                        this.series.name +': '+ this.y +' %';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: valores

    
        });
    });
    
});
		</script>
<script type="text/javascript">
	
	var hash = {
	<?php
		while ($row=mysql_fetch_array($resultado)){
		printf("'".$row[0]);	
		if(count($row>$i)){echo "',";} else{echo "'";}
      	};
			?>
          };

	  	}
			
 	document.write(hash[1])

	</script>
<?php }
?>
	<body>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<?php if($diasemana!="Todos"){ ?>
<div id="container" style="width:933px;min-width: 400px; height: 400px; margin: 0 auto"></div>
<?php } if($diasemana=="Todos" and $nomeespaco!="Todos"){ ?>
<div id="container" style="width:933px;min-width: 400px; height: 1000px; margin: 0 auto"></div>
<?php } ?>
</body>
</html>

<p><?php include "footer.html"; ?></p>
