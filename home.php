<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
error_reporting(0);
ini_set("display_errors", 0 );

if(!isset($_SESSION)) 
{ session_start(); 
  unset($_SESSION['dados_equipamento']);
} 

if ($_SESSION['logado'] == 1) {
  
  header ("Location: index.php");
  
  $logado=$_SESSION['logado'];
  
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Home - Mapeamento</title>
<?php
include "conexao_Geral.php";
include "topo.php";
include("testemenu.php");
$usr=$_REQUEST['usr'] ;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Mapeamento</title>
<style type="text/css">

h2 {
  font-size: 9px;
}

</style>
<script>
function gera_protocolo()
{

<?php

$data=date("d/m/Y H:i:s");
$usr=$_REQUEST['usr'] ;
$ger= "INSERT INTO tbl_protocolo (usuario,data) VALUES ('$usr','$data')";
$qry=mysql_query($ger);
?>

<?php 
$select="Select id_proc,data,usuario from tbl_protocolo
Order By id_proc DESC
limit 1";
$qry2=mysql_query($select);
$arr=mysql_fetch_array($qry2);
$prot=$arr['id_proc'];
$data=$arr['data'];
?>

alert("Gerado o Protocolo <?php echo $prot; ?>  em  <?php echo $data; ?>."); // this is the message in ""
}
</script>
</head>
<body>
<?php 



  $us=base64_decode($us);
$sql="select * from tbl_usuario where `PK_Login`='$us'";
  $comando=mysql_query($sql);
  $linha=mysql_fetch_array($comando);
  $etec =$linha['FK_Etec'];
  $medio=$linha['Nivel_Acesso'];
$fketec=$linha['FK_Etec'];
$supervisor=$linha['Supervisor'];
$us=base64_encode($us);
$us=base64_encode($us);


if($medio!="Administrador"){

include "menu_usuario.php";
  }else{  
//echo "$us"; 
$us=base64_decode($us);

include ("menu.php");  

    }  
?>
<?php 

$sqle="select * from tbl_etec where PK_CodEtec='$etec'";

$comandoe=mysql_query($sqle);
$linhae=mysql_fetch_array($comandoe);

?>

<form id="form1" name="form1" method="post" action="">
  <table width="860" border="0">

    <tr align="center">
      <td colspan="7" align="right"><h2><?php if($medio=="Comum"){?><a href="listasuporte.php?us=<?php echo $us;?>">
        <img src="suporte_icone.jpg" alt="" width="19" height="19" /><b> Suporte</a></h2><?php } if($medio=="Administrador" and $supervisor!="S"){ ?><a href="listasuporteadm.php?us=<?php echo $us;?>"><img src="suporte_icone.jpg" alt="" width="19" height="19" /><b> Suporte</a></h2><?php } ?></td>
    </tr>
    <tr align="center">
      <td colspan="6"><strong>Home</strong></td>
      <td width="46"><a href="Frm_Relatorio.php?us=<?php echo $us; ?>"><img src="chart_bar.png" width="32" height="32" /></a></td>
    </tr>
    <tr>
      <td width="33">&nbsp;</td>
      <td colspan="5" rowspan="14" valign="top">
    O objetivo do projeto é realizar um mapeamento contendo informações sobre
os espaços fisicos e equipamentos existentes nos laboratórios das Etecs, e
também verificar as necessidades de atualização e auxiliar no
desenvolvimento de procedimentos pedagógicos.<p>

O Sistema de Mapeamento dos laboratórios consiste em identificar:<p>

- os equipamentos e a quantidade real em condições de uso;<p>
- ano de aquisição dos equipamentos;<p>
- forma de aquisição (VITAE, APM, Centro Paula Souza, Programa Brasil
Profissionalizado, doações, etc....);<p>
- equipamentos e espaços fisicos compartilhados por diferentes habilitações;<p>
- soluções encontradas pelas Etecs para otimização dos recursos.<p>

Os resultados obtidos com o mapeamento, possibilitará atualizações
tecnológicas das unidades de ensino, assim como, no desenvolvimento de
modelos de uso e orientações.</p>
      <p><img src="etecimagem.jpg" width="373" height="135" /></p></td>
      <td align="center" title="Download Arquivos Mapeamento"><a href="Frm_DownloadMaterial.php?us=<?php echo $us; ?>"><img src="downloadd.png" alt="" width="32" height="32" /></a></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td align="center">
      <?php if($medio=="Administrador" and $supervisor!="S"){ ?>
        <a href="protocolos.php?us=<?php echo $us; ?>&usr=<?php echo $usr; ?>"><img src="protocolo.png"  alt="" width="32" height="32" />
          <h2>Protocolos</h2>
        </a>
        <a href="Lst_fechamentoabertura.php?us=<?php echo $us; ?>"><h2>Abertura e Fechamento</h2></a>
      <?php } else { ?>
        <a href="protocolos.php?us=<?php echo $us; ?>&usr=<?php echo $usr; ?>"><img src="check.png"  alt="" width="32" height="32" /><h2>Confirmar Atualização</h2></a>
      <?php } ?>  
      </td>
    </tr>

    <tr align="center">
      <td colspan="7" align="right"><h2><?php if($medio=="Comum"){?><a href="saladeaula.php?us=<?php echo $us;?>"><img src="saladeaula.png" alt="" width="19" height="19" /><b> Sala de Aula</a></h2><?php } if($medio=="Administrador" and $supervisor!="S"){ ?><a href="saladeaula.php?us=<?php echo $us;?>"><img src="saladeaula.png" alt="" width="19" height="19" /><b> Sala de Aula</a></h2><?php } ?></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>
<span class="tarja_tabela"><a href="frm_suporte.php?us=<?php echo $us;?>"></a></span></p>
<p>&nbsp;</p>

</body>
<?php 

include "footer.html";
?>


</html>
