<?php 
ini_set('max_execution_time','999999999');
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?><head> 
<title>Lista Equipamento - Mapeamento</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
</head>
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
	$us=base64_decode($us);

	}else{	
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");		
		}	

?>

<script language="JavaScript">
function abrir(URL) {

  var width = 250;
  var height = 250;

  var left = 99;
  var top = 99;

  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}

</script>

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

<form name="form1" method="post" action="OP_Pesquisaeqp.php">
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>  
    <tr align="center" bgcolor="#D6D6D6">
      <th width="116"><strong>Etec</strong></th>
      <th width="143"><strong>Equipamento</strong></th>
      <th width="106"><strong>Ano Aquisicao</strong></th>
      <th width="102"><strong>Quantidade</strong></th>
      <th width="143"><strong>Ambiente Alocado</strong></th>
      <th width="63"><strong>Foto</strong></th>
      <th width="69"><strong>Visualizar</strong></th>

    </tr>
    </thead>
    <tbody>
  
    <?php 

   
   if (isset($_GET['us'])){
	$us=$_GET['us'];   }
  $us= base64_decode($us);
  
  if(!isset($_SESSION)) 
{ 
session_start(); 
} 
	
if ($medio=="Administrador"){
	 $pesquisaa = $_SESSION['pesquisa'];
	if ($pesquisaa!=""){
	$sql="SELECT * FROM tbl_material as m inner join  tbl_cadastro_equipamento as e on m.FK_Equipamento = e.PK_CadastroEquipamento where 
 e.Tipo_Equipamento like '".$pesquisaa."%' order by FK_Instituicao";
	$comando=mysql_query($sql) or die (mysql_error());
		 $us= base64_encode($us);
	
	 }else{
	$sql="select * from tbl_material order by FK_Instituicao";
	$comando=mysql_query($sql);
	 $us= base64_encode($us);
	}
	
	
}else{
	 $pesquisaa = $_SESSION['pesquisa'];
 
 if ($pesquisaa!=""){
	$sql="SELECT * FROM tbl_material as m inner join  tbl_cadastro_equipamento as e on m.FK_Equipamento = e.PK_CadastroEquipamento where 
 e.Tipo_Equipamento like '".$pesquisaa."%' and m.FK_Instituicao ='$usu'";
	$comando=mysql_query($sql);
		 $us= base64_encode($us);
	 }else{

	$sql="select * from tbl_material where `FK_Instituicao`='$usu' order by FK_Equipamento";
	$comando=mysql_query($sql);
	 $us= base64_encode($us);
	}
	}
	
   while($linha=mysql_fetch_array($comando)){
	   $pkmaterial=$linha['PK_CodMaterial'];
	   $eteclab=$linha["FK_EspacoFisico"];
	 	mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	   $sqllabo="select * from tbl_espaco_fisico where PK_CodLaboratorio='$eteclab'";
	   $comandolabo=mysql_query($sqllabo);
	   $linhalabo=mysql_fetch_array($comandolabo);
	  ?>
    <tr align="center" class="gradeU">
    <?php 
	$fketec=$linha["FK_Instituicao"];
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	$sqletec="select * from tbl_etec where `PK_CodEtec`='$fketec'";
	$comandoetec=mysql_query($sqletec);
	$linhaetec=mysql_fetch_array($comandoetec);
	//mysql_query("SET NAMES 'latin1'");
      //  mysql_query('SET character_set_connection=latin1');
        //mysql_query('SET character_set_client=latin1');
        //mysql_query('SET character_set_results=latin1');
	?>
      <?php 
	  
	$fk=$linha["FK_Equipamento"];
	$sqleqp="select * from  tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$fk'";
	$comandoeqp=mysql_query($sqleqp);
	$linhaeqp=mysql_fetch_array($comandoeqp);
	
	$sqlpatrimonio="select * from tbl_patrimonio where FK_equipamento='$pkmaterial'";
	$comandopatrimonio=mysql_query($sqlpatrimonio);
	$linhapatrimonio=mysql_fetch_array($comandopatrimonio);
	?>
    
      <td width="300"><font size="-1"><?php echo $linhaetec["Etec"];?></font></td>
      <td><font size="-1"><?php echo $linhaeqp["Tipo_Equipamento"];?></font></td>
      <td><font size="-1"><?php echo $linha["Ano_Aquisicao"];?></font></td>
      <td><font size="-1"><?php echo $linha["Quantidade"];?></font></td>
      <td><font size="-1"><?php echo $linhalabo["Descricao"];?></font></td>
      <td><a href="<?php if($linha["Imagem"]==''){echo "Sem_imagem.gif";}else{echo $linha["Imagem"];}?>" rel="lightbox"><img src="iconeAlbum.gif" alt="" width="50" height="32" border="0" /></a>
      <td><label> 
    <a href="Frm_Equipamento.php?us=<?php echo $us ?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodMaterial'] ; ?>"><img src="editar.png" alt="" width="24" height="24" border="0" /></a></label></td>

    </tr>
    <?php } ?>
  </table>
 </div>
 <?php include "footer.html"; ?> 
</form>
