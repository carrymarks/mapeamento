<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script language=javascript>
function Exc(){
alert("Cadastro excluído com sucesso.");}
</script> 
<?php 
ini_set('max_execution_time','999999999');
error_reporting(0);
ini_set("display_errors", 0 );



if(!isset($_SESSION)) 
{ session_start(); } 

unset($_SESSION['dados_efisico']);
if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Laboratório - Mapeamento</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
include "topo.php";
include("testemenu.php");
include "conexao.php";

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];
 	$us=base64_encode($us);
	$us=base64_encode($us);
if($medio!="Administrador"){

include ("menu_usuario.php");
	//$us=base64_decode($us);

	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	
		
		
		
/*		

   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
  $excel=new ExcelWriter("BD_EspacoFisico.xls");

    if($excel==false){
        echo $excel->error;
   }
$myArr=array('Instituição','Descrição Laboratório','Capacidade','Area','Tipo de Construção','Quantidade de Curso','Ociosidade','Quantidade de Bancadas','Mseg','Mter','Mqua','Mqui','Msex','Msab','Tseg','Tter','Tqua','Tqui','Tsex','Tsab','Nseg','Nter','Nqua','Nqui','Nsex','Nsab','Seg10','Seg11','Seg12','Seg13','Seg14','Seg15','Seg16','Seg17','Seg18','Seg19','Seg20','Seg21','Seg22','Ter10','Ter11','Ter12','Ter13','Ter14','Ter15','Ter16','Ter17','Ter18','Ter19','Ter20','Ter21','Ter22','Quar10','Quar11','Quar12','Quar13','Quar14','Quar15','Quar16','Quar17','Quar18','Quar19','Quar20','Quar21','Quar22','Quin10','Quin11','Quin12','Quin13','Quin14','Quin15','Quin16','Quin17','Quin18','Quin19','Quin20','Quin21','Quin22','Sex10','Sex11','Sex12','Sex13','Sex14','Sex15','Sex16','Sex17','Sex18','Sex19','Sex20','Sex21','Sex22','Sab10','Sab11','Sab12','Sab13','Sab14','Sab15','Sab16','Sab17','Sab18','Sab19','Sab20','Sab21','Sab22','Obs_Geral','AmbienteDescricao','Quadro de Energia','Tomada110v','Tomada220v','Tomada200v','Tipo_Iluminacao','Quantidade_Luminarias','Pe_Direito','Tipo_Revestimento','Quantidade_Portas','Medida_PortaLargura','Medida_PortaAltura','Equipamento_Seguranca','Exaustor');
   $excel->writeLine($myArr);  
   
$_host		=		"mysql02.cpscetec.com.br";
$_usuario	=		"mapeamento";
$_senha		=		"r2d2@42";   

 //Seleciona os campos de uma tabela
	$conn = mysql_connect($_host,$_usuario,$_senha) or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
	if($conn)
	{
	mysql_select_db("mapeamento", $conn);
	}
	
	if($medio=="Administrador"){
   $consulta = "select * from tbl_espaco_fisico inner join tbl_etec on tbl_espaco_fisico.FK_Instituicao=tbl_etec.PK_CodEtec";
   }else{
	$consulta = "select * from tbl_espaco_fisico inner join tbl_etec on tbl_espaco_fisico.FK_Instituicao=tbl_etec.PK_CodEtec where tbl_espaco_fisico.FK_Instituicao=$usu)";   
	   }
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
 $myArr=array($linha['Etec'],$linha['Descricao'],$linha['Capacidade'],$linha['Area'],$linha['tipo_construcao'],$linha['quantidade_curso'],$linha['Ociosidade'],$linha['Quantidade_Bancadas'],$linha['Mseg'],$linha['Mter'],$linha['Mqua'],$linha['Mqui'],$linha['Msex'],$linha['Msab'],$linha['Tseg'],$linha['Tter'],$linha['Tqua'],$linha['Tqui'],$linha['Tsex'],$linha['Tsab'],$linha['Nseg'],$linha['Nter'],$linha['Nqua'],$Linha['Nqui'],$linha['Nsex'],$linha['Nsab'],$linha['Seg10'],$linha['Seg11'],$linha['Seg12'],$linha['Seg13'],$linha['Seg14'],$linha['Seg15'],$linha['Seg16'],$linha['Seg17'],$linha['Seg18'],$linha['Seg19'],$linha['Seg20'],$linha['Seg21'],$linha['Seg22'],$linha['Ter10'],$linha['Ter11'],$linha['Ter12'],$linha['Ter13'],$linha['Ter14'],$linha['Ter15'],$linha['Ter16'],$linha['Ter17'],$linha['Ter18'],$linha['Ter19'],$linha['Ter20'],$linha['Ter21'],$linha['Ter22'],$linha['Quar10'],$linha['Quar11'],$linha['Quar12'],$linha['Quar13'],$linha['Quar14'],$linha['Quar15'],$linha['Quar16'],$linha['Quar17'],$linha['Quar18'],$linha['Quar19'],$linha['Quar20'],$linha['Quar21'],$linha['Quar22'],$linha['Quin10'],$linha['Quin11'],$linha['Quin12'],$linha['Quin13'],$linha['Quin14'],$linha['Quin15'],$linha['Quin16'],$linha['Quin17'],$linha['Quin18'],$linha['Quin19'],$linha['Quin20'],$linha['Quin21'],$linha['Quin22'],$linha['Sex10'],$linha['Sex11'],$linha['Sex12'],$linha['Sex13'],$linha['Sex14'],$linha['Sex15'],$linha['Sex16'],$linha['Sex17'],$linha['Sex18'],$linha['Sex19'],$linha['Sex20'],$linha['Sex21'],$linha['Sex22'],$linha['Sab10'],$linha['Sab11'],$linha['Sab12'],$linha['Sab13'],$linha['Sab14'],$linha['Sab15'],$linha['Sab16'],$linha['Sab17'],$linha['Sab18'],$linha['Sab19'],$linha['Sab20'],$linha['Sab21'],$linha['Sab22'],$linha['Obs_Geral'],$linha['AmbienteDescricao'],$linha['Quadro_Energia'],$linha['Tomada110v'],$linha['Tomada220v'],$linha['Tomada200v'],$linha['Tipo_Iluminacao'],$linha['Quantidade_Luminarias'],$linha['Pe_Direito'],$linha['Tipo_Revestimento'],$linha['Quantidade_Portas'],$linha['Medida_PortaLargura'],$linha['Medida_PortaAltura'],$linha['Equipamento_Seguranca'],$linha['Exaustor']);
         $excel->writeLine($myArr);}
		 
		 $excel->close();
	  
   }

   

//-----------finally --------------//

*/

?>

<style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
	color: #666;
}
-->
</style>
<style type="text/css" title="currentStyle">
			@import "Listagem Arquivos/media/css/demo_page.css";
			@import "Listagem Arquivos/media/css/demo_table_jui.css";
			@import "Listagem Arquivos/themes/smoothness/jquery-ui-1.8.4.custom.css";
		</style>
		<script type="text/javascript" language="javascript" src="Listagem Arquivos/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="Listagem Arquivos/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				oTable = $('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			} );
		</script>
</head>
<?php 
//include "index.php";
?>

<body>
<table width="933" align="center">
  <tr align="center" bgcolor="#FFFFFF">
    <td colspan="7" align="left"><form id="form1" name="form1" method="post" action="op_filtroespacofisico.php?us=<?php echo $us ?>">
      <table width="810" border="0" cellpadding="0">
        <tr>
          <td width="113"><strong>Selecionar Etec</strong></td>
          <td width="681"><select name="txt_etec" id="txt_etec" style="width:500px">
            <?php 
			
		 if($medio=="Administrador"){ 
		 
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

			
		$sqlex="select * from tbl_etec order by Etec";
		}else{
			
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		
		$sqlteste="select * from tbl_etec where PK_CodEtec='$usu'";
		$qryteste=mysql_query($sqlteste);
		$linhateste=mysql_fetch_array($qryteste);	
		$fksede=$linhateste['Codigo_etecsede'];
			
		$sqlex="select * from tbl_etec where Codigo_etecsede='$fksede' order by Etec";			
			
			}
		$comandoex=mysql_query($sqlex);
		
		while($linhaex=mysql_fetch_array($comandoex)){ ?>
            <option value="<?php echo $linhaex['PK_CodEtec']?>" <?php if (!(strcmp($linhaex['PK_CodEtec'],""))) {echo "selected=\"selected\"";} ?>><?php echo $linhaex['Etec']?></option>
            <?php } ?>
          </select>
            <input type="submit" name="button" id="button" value="Pesquisar" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr align="center">
    <td width="52">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="552">&nbsp;</td>
    <td width="62"><a href="DownloadEspacoFisico.php?us=<?php echo $us; ?>" title="Download Espaço Físico."><img src="page_excel.png" width="16" height="16" border="0" /></a></td>
    <td width="25" colspan="2"><strong><a href="frm_espacoFisico.php?us=<?php echo $us ?>&amp;acao=adc"><img src="novo.png" width="24" height="24" border="0" /></a></strong></td>
  </tr>
  </table>

<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>  
  <tr align="center">
    <th width="113"><strong>Etec</strong></th>
    <th width="121"><strong>Laboratório</strong></th>
    <th width="60"><strong>Área</strong></th>
    <th width="100"><strong>Capacidade de Alunos</strong></th>
    <th width="172"><strong>Quantidade de Bancadas</strong></th>
    <th><strong>Editar</strong></th>
    <th>Excluir</th>
  </tr>
  </thead>
  <tbody>  
  <?php 

  
if ($medio=="Administrador"){
			if(isset($_GET['etec'])){
		
	$etec=$_GET['etec'];
	}else{

	$etec="";	
		}  

		
		if(($etec=="")or($etec=="Código")){
 $sql="select * from tbl_espaco_fisico order by FK_Instituicao";
   $comando=mysql_query($sql);
	} else {
 $sql="select * from tbl_espaco_fisico where FK_Instituicao='$etec'";
   $comando=mysql_query($sql);		
		}
  

  
  }else{?> 
  <?php 
  
  		if(isset($_GET['etec'])){
		
	$etec=$_GET['etec'];
	}else{

	$etec=$usu;	
		}    
 
  $sql="select * from tbl_espaco_fisico where `FK_Instituicao`='$etec' order by FK_Instituicao";
   $comando=mysql_query($sql);
  // $us= base64_encode($us);
  }
  while($linha=mysql_fetch_array($comando)){
  	  if (($linha['FK_Laboratorio']==NULL)or($linha['quantidade_curso']==NULL)or($linha['Descricao']==NULL)or($linha['Tipo_Revestimento']==NULL)or($linha['Tomada110v']==NULL)or($linha['Tomada220v']==NULL)or($linha['Tomada200v']==NULL) or($linha['Quantidade_Luminarias']==NULL)or($linha['Capacidade']==NULL)or($linha['Quantidade_Bancadas']==NULL)or($linha['tipo_construcao']==NULL)or($linha['Area']==NULL)or($linha['Pe_Direito']==NULL) or($linha['Quantidade_Portas']==NULL)or($linha['Medida_PortaLargura']==NULL)or($linha['Medida_PortaAltura']==NULL)){
	$cor="gradeX";	
	}else{
	$cor="gradeU";
		}
  ?>
  <tr align="center" class="<?php echo $cor; ?>" ><?php 

$fklab=$linha["FK_Laboratorio"];
	mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');

	$sqllab="select * from tbl_cadastrolaboratorio where`PK_CodLaboratorio`='$fklab'";
	$comandolab=mysql_query($sqllab);
	$linhalab=mysql_fetch_array($comandolab);
	$fklab=$linha["FK_Laboratorio"];

		
			mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	?>
    <?php 

	$fketec=$linha["FK_Instituicao"];
	$sqletec="select * from tbl_etec where`PK_CodEtec`='$fketec' order by Etec";
	$comandoetec=mysql_query($sqletec);
	$linhaetec=mysql_fetch_array($comandoetec);
	?>
    <td width="300"><font size="-1"><?php echo $linhaetec["Etec"];?></font></td>
    <td width="200"><font size="-1"><?php echo $linha["Descricao"];?></font></td>
    <td><font size="-1"><?php echo $linha["Area"];?></font></td>
    <td><font size="-1"><?php echo $linha["Capacidade"];?></font></td>
    <td><font size="-1"><?php echo $linha["Quantidade_Bancadas"];?></font></td>
    <td width="40"><strong><a href="frm_espacoFisico.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodLaboratorio'] ; ?>"><img src="editar.png" width="24" height="24" border="0" /></a></strong></td>
    <td width="30"><strong><a href="op_espacoFisico.php?us=<?php echo $us?>&amp;ex=sim&amp;cod=<?php echo $linha['PK_CodLaboratorio'] ; ?>"><img src="icone_excluir.gif" width="17" height="17" border="0" onclick="Exc()" /></a></strong></td>
  </tr>
  <?php } ?>
</table>
<?php 

include "footer.html";
?>  
</div>
</body>
</html>