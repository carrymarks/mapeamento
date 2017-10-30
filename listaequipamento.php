<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script language=javascript>
function Exc(){
alert("Cadastro excluído com sucesso.");}
</script> 
<?php 

ini_set('max_execution_time','999999999');

if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
  
  header ("Location: index.php");
  
  
  
  }
  unset($_SESSION['dados_equipamento']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Equipamento - Mapeamento</title>
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

<body>
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


  }else{  
//echo "$us"; 
$us=base64_decode($us);
include ("menu.php");    
    }  
    



/*
   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
  $excel=new ExcelWriter("BD_Equipamento.xls");
  


    if($excel==false){
        echo $excel->error;
   }
$myArr=array('Instituicao','Numero de Patrimonio','Modelo','Ano_Aquisicao','Outro_Equipamento','Quantidade de Curso','Ociosidade','Baixa_Patrimonial','Ocorrencia','Especificacao_Orgao','Orgao_Classe','Outra_Unidade','Especificacao','Historico','Usabilidade','Detalhe_Aquisicao','Quantidade','Descricao','justificativa','Transferencia','Potencia','DimensaoAltura','DimensaoLargura','DimensaoComprimento','TipoTomada','Peso');
   $excel->writeLine($myArr);  
   
$_host    =    "mysql02.cpscetec.com.br";
$_usuario  =    "mapeamento";
$_senha    =    "r2d2@42";   

 //Seleciona os campos de uma tabela
  $conn = mysql_connect($_host,$_usuario,$_senha) or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
  if($conn)
  {
  mysql_select_db("mapeamento", $conn);
  }
  
  if($medio=="Administrador"){
   $consulta = "select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec";
   }else{
  $consulta = "select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec where tbl_espaco_fisico.FK_Instituicao=$usu)";   
     }
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linhaaa = mysql_fetch_array($resultado)){
 $myArr=array($linhaaa['Etec'],$linhaaa['Numero_Patrimonio'],$linhaaa['Modelo'],$linhaaa['Ano_Aquisicao'],$linhaaa['Outro_Equipamento'],$linhaaa['Ociosidade'],$linhaaa['Ociosidade'],$linhaaa['Baixa_Patrimonial'],$linhaaa['Ocorrencia'],$linhaaa['Especificacao_Orgao'],$linhaaa['Orgao_Classe'],$linhaaa['Outra_Unidade'],$linhaaa['Especificacao'],$linhaaa['Historico'],$linhaaa['Usabilidade'],$linhaaa['Detalhe_Aquisicao'],$linhaaa['Quantidade'],$linhaaa['Descricao'],$linhaaa['justificativa'],$linhaaa['Transferencia'],$linhaaa['Potencia'],$linhaaa['DimensaoAltura'],$linhaaa['DimensaoLargura'],$linhaaa['DimensaoComprimento'],$linhaaa['TipoTomada'],$linhaaa['Peso']);
         $excel->writeLine($myArr);}
     
     $excel->close();
    
   }

   */

//-----------finally --------------//


?>
<table width="933" border="0">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="785"  align="left"><form id="form1" name="form1" method="post" action="op_filtroequipamento.php?us=<?php echo $us ?>">
      <table width="785" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="131" align="center"><strong>Selecionar Etec</strong></td>
          <td width="654"><label>
            <select name="txt_etec" id="txt_etec" style="width:500px">
            <?php 
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');



    if($medio=="Administrador"){
      
    $sqlex="select * from tbl_etec order by etec";
    $comandoex=mysql_query($sqlex);
    
  }else{
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
            <input type="submit" name="button" id="button" value="Pesquisar" />
          </label></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="62"><a href="DownloadEquipamento.php?us=<?php echo $us; ?>" title="Download Equipamento."><img src="page_excel.png" width="16" height="16" border="0" /></a></td>
    <td width="30" ><strong><a href="Frm_Equipamento.php?us=<?php echo $us ?>&amp;acao=adc"><img src="novo.png" width="24" height="24" border="0" /></a></strong></td>
  </tr>
  </table>
  
  
  
<div class="demo_jui" style="max-width:933px">  
  <table width="933" border="0"  class="display" id="example">
  <thead>
  <tr>
    <th width="149"><strong>Etec</strong></th>
    <th width="125"><strong>Equipamento</strong></th>
    <th width="100"><strong>Ano Aquisição</strong></th>
    <th width="78"><strong>Modelo</strong></th>
    <th width="149"><strong>Ambiente Alocado</strong></th>
    <th><strong>Editar</strong></th>
    <th><strong>Excluir</strong></th>
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
 $sql="select * from tbl_material order by FK_Instituicao";
   $comando=mysql_query($sql);
  } else {
 $sql="select * from tbl_material where FK_Instituicao='$etec'";
   $comando=mysql_query($sql);    
    }
  
  }else{?>
<?php 

  if(isset($_GET['etec'])){
  $etec=$_GET['etec'];
  }else{
  $etec=$usu;  
    }
  

  
  $sql="select * from tbl_material where `FK_Instituicao`='$etec' order by FK_Equipamento";
   $comando=mysql_query($sql);
  }
  while($linha=mysql_fetch_array($comando)){
    if (($linha['FK_Equipamento']==NULL)or($linha['Especificacao']==NULL)or($linha['Descricao']==NULL)or($linha['Modelo']==NULL)or($linha['FK_FormaAquisicao']==NULL)or($linha['Quantidade']==NULL)or($linha['FK_AtualizacaoTecnologia']==NULL)or($linha['FK_EspacoFisico']==NULL)){
  $cor="gradeX";  
  }else{
  $cor="gradeU";  
    }
    
    
    $pkmaterial=$linha['PK_CodMaterial'];
    ?>
  <tr align="center" class="<?php echo $cor; ?>"  ><?php 
  mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');

$fkeqp=$linha["FK_EspacoFisico"];
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  $sqllabo="select * from tbl_espaco_fisico where`PK_CodLaboratorio`='$fkeqp'";
  $comandolabo=mysql_query($sqllabo);
  $linhalabo=mysql_fetch_array($comandolabo);
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
  ?>
    <?php 
  $fketec=$linha["FK_Instituicao"];
  $sqletec="select * from tbl_etec where `PK_CodEtec`='$fketec'";
  $comandoetec=mysql_query($sqletec);
  $linhaetec=mysql_fetch_array($comandoetec);
  ?>
    <?php
  $fkequipamento=$linha["FK_Equipamento"];
  $sqlequipamento="select * from  tbl_cadastro_equipamento where `PK_CadastroEquipamento`='$fkequipamento'";
  $comandoequipamento=mysql_query($sqlequipamento);
  $linhaequipamento=mysql_fetch_array($comandoequipamento);
  
  $sqlpat="select * from tbl_patrimonio where FK_equipamento='$pkmaterial'";
  $querypat=mysql_query($sqlpat);
  $linhapat=mysql_fetch_array($querypat);
  
  

  ?>
    <td><font size="-1"><?php echo $linhaetec["Etec"];?></font></td>
    <td><font size="-1"><?php echo $linhaequipamento["Tipo_Equipamento"];?></font></td>
    <td><font size="-1"><?php 
  if($linha["Ano_Aquisicao"]=="anterior 2"){
    echo "anterior á 2005";
    }else{
  echo $linha["Ano_Aquisicao"];}?></font></td>
    <td><font size="-1"><?php echo $linha["Modelo"];?></font></td>  
    <td><font size="-1"><?php echo $linhalabo["Descricao"];?></font></td>
    <td width="59"><strong><a href="Frm_Equipamento.php?us=<?php echo $us ?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_CodMaterial'] ; ?>&codetec=<?php echo $linha['FK_Instituicao'];?>"><img src="editar.png" width="24" height="24" border="0" /></a></strong></td>
    <td width="62"><strong><a href="op_equipamento.php?us=<?php echo $us ?>&amp;ex=sim&amp;cod=<?php echo $linha['PK_CodMaterial'] ; ?>"><img src="icone_excluir.gif" width="17" height="17" border="0" onclick="Exc()" /></a></strong></td>
  </tr>
  <?php } ?>
</table>
<?php 

include "footer.html";
?>  
</div>
</body>

</html>