<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
  
  //header ("Location: index.php");  
  }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Cadastro Equipamento - Mapeamento</title><?php 
include "topo.php";
include("testemenu.php");



?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
function Verificar(){
  
  var especifica=document.getElementById('txt_especificacao').value;
  
  if(especifica==""){
    alert("Campo Especificação Equipamento precisa ser preenchido!");
    return false;
    }
    
  var desc=document.getElementById('txt_descricao').value;  
  
  if(desc==""){
    alert("Campo Marca precisa ser preenchido!");
    return false;
    }
    
    
  var ambien=document.getElementById('txt_ambiente').value;  
  
  if(ambien==""){
    alert("Campo Ambiente Alocado precisa ser preenchido!");
    return false;
    }
  
  var model=document.getElementById('txt_modelo').value;
  
  if(model==""){
    alert("Campo Modelo precisa ser preenchido!");
    return false;
    }
  
  
  var atualiza=document.getElementById('txt_atualizacaotecnologica').value;
  
  if(atualiza==""){
    alert("Campo Atualização Tecnológica precisa ser preenchido!");
    return false;
    }
    
  var qnt=document.getElementById('txt_quantidade').value;  
  
  if(qnt==""){
    alert("Campo Quantidade precisa ser preenchido!");
    return false;
    }
  
  var aquisic=document.getElementById('txt_aquisicao').value;
  
  if(aquisic==""){
    alert("Campo Forma de Aquisição precisa ser preenchido!");
    return false;
    }
  
  }


function simfoto(){
  document.form1.txt_imagemeqp.disabled=false;  
  }
function naofoto(){
  document.form1.txt_imagemeqp.disabled=true;  
  }  
  
function codigoetec(){
    document.getElementById('validacao').value=1;
    document.getElementById('txt_ambiente').value="";
  document.forms["form1"].submit();
  
  }
  
function restartform(){
  document.getElementById('validacao').value=1;
  document.forms["form1"].submit();
  }

</script>

<script>
function detalhetec(){

  var cabecalho = document.getElementById('txt_Equipamento');
  valorcabecalho=cabecalho.options[cabecalho.selectedIndex].value;
  
  
  }
</script>

<script type="text/javascript">

function achei(){
  
  var ociooo=document.getElementById('txt_ociosidade');
  valorociooo=ociooo.options[ociooo.selectedIndex].value;
  
  if(valorociooo==2){
  document.getElementById('txt_justificativa').style.visibility='hidden';
  document.getElementById('txt_just').style.visibility='hidden';
  document.getElementById('txt_motivo').style.visibility='hidden';
    }else{
  document.getElementById('txt_justificativa').style.visibility='visible';    
  document.getElementById('txt_just').style.visibility='visible';
  document.getElementById('txt_motivo').style.visibility='visible';
      }
  
    document.getElementById('txt_baixa').style.visibility ='hidden';
  document.getElementById('txt_baixapatrimonial').style.visibility ='hidden';
  document.getElementById('txt_oco').style.visibility ='hidden';
  document.getElementById('txt_ocorrencia').style.visibility ='hidden';
  
  document.form1.txt_imagemeqp.disabled=true;
  document.getElementById('txt_especificacaoorgao2').style.visibility='hidden';
  document.getElementById('txt_especificacaoorgao').style.visibility='hidden';
  

  
  var outro = document.getElementById('txt_Equipamento');
  value = outro.options[outro.selectedIndex].value;
  var teste = document.getElementById('txt_atualizacaotecnologica');
  valor = teste.options[teste.selectedIndex].value;
  var usa = document.getElementById('txt_usabilidade');
  val = usa.options[usa.selectedIndex].value;
  var aqui = document.getElementById('txt_aquisicao');
  valu = aqui.options[aqui.selectedIndex].value;
  var org = document.getElementById('txt_detalheaquisicao');
  vv = org.options[org.selectedIndex].value;
  //baixa patrimonial
  
  

    
  if (valor != 4){
  //zerando valores
  document.getElementById('txt_usabilidadee').value="";
  document.getElementById('txt_usabilidade').value="";
  document.getElementById('txt_baixa').value="";
  document.getElementById('txt_baixapatrimonial').value="";
  document.getElementById('txt_oco').value="";
  document.getElementById('txt_ocorrencia').value="";
  var val="";
    
  document.getElementById('txt_usabilidadee').style.visibility ='hidden';
  document.getElementById('txt_usabilidade').style.visibility ='hidden';
  document.getElementById('txt_baixa').style.visibility ='hidden';
  document.getElementById('txt_baixapatrimonial').style.visibility ='hidden';
  document.getElementById('txt_oco').style.visibility ='hidden';
  document.getElementById('txt_ocorrencia').style.visibility ='hidden';  


    
    }else{  
  document.getElementById('txt_usabilidadee').style.visibility ='visible';
  document.getElementById('txt_usabilidade').style.visibility ='visible';
  
    }
    if (val != "sem uso"){
  document.getElementById('txt_baixa').style.visibility ='hidden';
  document.getElementById('txt_baixapatrimonial').style.visibility ='hidden';
  document.getElementById('txt_oco').style.visibility ='hidden';
  document.getElementById('txt_ocorrencia').style.visibility ='hidden';  
  document.getElementById('txt_baixa').value="";
  document.getElementById('txt_baixapatrimonial').value="";
  document.getElementById('txt_oco').value="";
  document.getElementById('txt_ocorrencia').value="";
    }else{
  
    }
    
    if ((valu != 1) && (valu!=2) && (valu!=3) && (valu!=4) && (valu!="")){
document.getElementById('txt_detalheaquisicao').style.visibility ='visible';


    }else{
      
  document.getElementById('txt_detalheaquisicao').style.visibility ='hidden';  
  document.getElementById('txt_orgaoclasse').style.visibility ='hidden';  
  document.getElementById('txt_classe').style.visibility ='hidden';
  document.getElementById('txt_detalheaquisicao').value="";  
  document.getElementById('txt_orgaoclasse').value="";
  document.getElementById('txt_classe').value="";
  document.getElementById('txt_especificacaoorgao2').value="";
  document.getElementById('txt_especificacaoorgao').value="";
  var vv="";
  }
  if (vv == "Orgaos de Classe"){
  document.getElementById('txt_orgaoclasse').style.visibility ='visible';  
  document.getElementById('txt_classe').style.visibility ='visible';  
  document.getElementById('txt_especificacaoorgao2').style.visibility='visible';
  document.getElementById('txt_especificacaoorgao').style.visibility='visible';
  
    
  }
  else if(vv == ""){
    
  }else{
  document.getElementById('txt_orgaoclasse').style.visibility ='hidden';  
  document.getElementById('txt_classe').style.visibility ='hidden';
  document.getElementById('txt_orgaoclasse').value="";
  document.getElementById('txt_classe').value="";
  document.getElementById('txt_especificacaoorgao2').style.visibility='visible';
  document.getElementById('txt_especificacaoorgao').style.visibility='visible';
  
    }  
    
  
  //pegando valor se houve ou não transferência
  var transf=document.getElementById('txt_optransferencia');
  valortransf=transf.options[transf.selectedIndex].value;
  
  if(valortransf==0){
    document.getElementById('transferencia').style.visibility='hidden';
    }else{
    document.getElementById('transferencia').style.visibility='visible';
      }
  
  }
  


  
function formatar_mascara(src, mascara) {
  var campo = src.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(campo);
  if(texto.substring(0,1) != saida) {
    src.value += texto.substring(0,1);
  }
  
  
  
}  
  


</script>
<style type="text/css">

h5 {
  font-size: 9px;
}

</style></head>

<body onload="achei()" >
<?php 
include "conexao.php";

  $us=base64_decode($us);
  $sql="select * from tbl_usuario where `PK_Login`='$us'";
  $comando=mysql_query($sql);
  $linha=mysql_fetch_array($comando);
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
 
<?php
if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['codetec'])){
$codetec=$_GET['codetec'];  }

if (isset($_GET['cod'])){
$cod=$_GET['cod'];
    }
  if(isset($_GET["acao"])){
    $acao=$_GET["acao"];
    }
    
    
    
    if ($acao != "adc"){
      
      $sql="select * from tbl_material where `PK_CodMaterial`='$cod'";
    $comando=mysql_query($sql);
    $linha=mysql_fetch_array($comando);
        if (isset($_GET['codetec'])){
  
  $etec=$_GET['codetec'];
  
  }else{
    $etec=$linha['FK_Instituicao'];
    }
    
    $equipamento=$linha['FK_Equipamento'];
    $modelo=$linha['Modelo'];
    $especificacaoorgao=$linha['Especificacao_Orgao'];
    $atualizacaotecnologica=$linha['FK_AtualizacaoTecnologia'];
    $baixapatrimonial=$linha['Baixa_Patrimonial'];
    $orgaoclasse=$linha['Orgao_Classe'];
    $aquisicao=$linha['FK_FormaAquisicao'];
    $anoaquisicao=$linha['Ano_Aquisicao'];
    $outraunidade=$linha['Outra_Unidade'];
    $especificacao=$linha['Especificacao'];
    $nome_imagem=$linha['Imagem'];
    $patrimonio=$linha['Numero_Patrimonio'];
    $ociosidade=$linha['Ociosidade'];
    $ambiente=$linha['FK_EspacoFisico'];
    $usabilidade=$linha['Usabilidade'];
    $historico=$linha['Historico'];
    $ocorrencia=$linha['Ocorrencia'];
    $detalheaquisicao=$linha['Detalhe_Aquisicao'];
    $quantidade=$linha['Quantidade'];
    $descricao=$linha['Descricao'];
    $justificativa=$linha['justificativa'];
    $motivo=$motivo['motivo'];
    $transferencia=$linha['Transferencia'];
    $potencia=$linha['Potencia'];
    $dimensaoaltura=$linha['DimensaoAltura'];
    $dimensaolargura=$linha['DimensaoLargura'];
    $dimensaocomprimento=$linha['DimensaoComprimento'];
    $tipotomada=$linha['TipoTomada'];
    $peso=$linha['Peso'];
    
    
    
    
    } else{
    $cod='';
    if (isset($_GET['codetec'])){
  
  $etec=$_GET['codetec'];
  
  }else{
      $etec='';}
    
    $equipamento='';
    $modelo='';
    $especificacaoorgao='';
    $atualizacaotecnologica='';
    $baixapatrimonial='';
    $orgaoclasse='';
    $aquisicao='';
    $anoaquisicao='';
    $outraunidade='';
    $especificacao='';
    $nome_imagem='';
    $patrimonio='';
      $ociosidade='';
    $ambiente='';
    $usabilidade='';
      $historico='';
    $ocorrencia='';
    $detalheaquisicao='';
    $quantidade='';
    $descricao='';
    $justificativa='';
    $motivo='';
    $transferencia='';
    $potencia='';
    $dimensaoaltura='';
    $dimensaolargura='';
    $dimensaocomprimento='';
    $tipotomada='';
    $peso='';
      }
      if(isset($_SESSION['dados_equipamento'])){    
      $equipamento = $_SESSION['dados_equipamento']['equipamento'];
      $modelo = $_SESSION['dados_equipamento']['modelo'];
      $especificacaoorgao = $_SESSION['dados_equipamento']['especificacaoorgao'];
      $atualizacaotecnologica = $_SESSION['dados_equipamento']['atualizacaotecnologica'];
      $baixapatrimonial = $_SESSION['dados_equipamento']['baixapatrimonial'];
      $orgaoclasse = $_SESSION['dados_equipamento']['orgaoclasse'];
      $aquisicao = $_SESSION['dados_equipamento']['aquisicao'];
      $anoaquisicao = $_SESSION['dados_equipamento']['anoaquisicao'];
      $outraunidade= $_SESSION['dados_equipamento']['outraunidade'];
      $especificacao = $_SESSION['dados_equipamento']['especificacao'];
      $nome_imagem = $_SESSION['dados_equipamento']['nome_imagem'];
      $patrimonio = $_SESSION['dados_equipamento']['patrimonio'];
      $ociosidade = $_SESSION['dados_equipamento']['ociosidade'];
      $ambiente = $_SESSION['dados_equipamento']['ambiente'];
      $usabilidade = $_SESSION['dados_equipamento']['usabilidade'];
      $historico = $_SESSION['dados_equipamento']['historico'];
      $detalheaquisicao = $_SESSION['dados_equipamento']['detalheaquisicao'];
      if(isset($_SESSION['dados_equipamento']['quantidade'])){
      $quantidade = $_SESSION['dados_equipamento']['quantidade'];}else{
        $quantidade = $linha['Quantidade'];
      }
        $descricao= $_SESSION['dados_equipamento']['descricao'];
        $justificativa= $_SESSION['dados_equipamento']['justificativa'];
        $motivo= $_SESSION['dados_equipamento']['motivo'];
        
      
      
      
      
      }  
?>

<form id="form1" name="form1" method="post" onsubmit="Verificar()" enctype="multipart/form-data" action="op_equipamento.php?us=<?php  $us= base64_decode($us); 
echo $us ?>">
<table width="933" align="center">
  <tr align="center">
    <td colspan="8" bgcolor="#D6D6D6"><strong>Cadastro Equipamentos</strong></td>
  </tr>
  <tr>
    <td width="39">&nbsp;</td>
    <td width="168" align="left"><strong>Etec</strong></td>
    <td colspan="5" align="left"><select name="txt_etec" id="txt_etec" title="Nome da etec e município" onchange="codigoetec()" style="width:500px" <?php
     if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
      <?php 
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    
    $us=base64_decode($us);


    if($medio!="Administrador"){
      
    $sqlex="select * from tbl_etec where `PK_CodEtec`='$fketec'";
    $comandoex=mysql_query($sqlex);
    $linhaex=mysql_fetch_array($comandoex);
    $codigoSede=$linhaex['Codigo_etecsede'];
    
    
    $sqlEtec="select * from tbl_etec where Codigo_etecsede='$codigoSede'";
    $qrySede=mysql_query($sqlEtec);
     $us= base64_encode($us);
    while($linhaSede=mysql_fetch_array($qrySede)){
    
     ?>
      <option value="<?php echo $linhaSede['PK_CodEtec']?>" <?php if (!(strcmp($linhaSede['PK_CodEtec'],$etec))) {echo "selected=\"selected\"";} ?>><?php echo $linhaSede['Etec']?></option>
      <?php } ?>
    </select></td>
    <?php       
        }else{
      
      ////////////////////////////////
      // se for adiministrador
    
    
      ////////////////////////////////
      
    $sqlex="select * from tbl_etec order by Etec";
    $comandoex=mysql_query($sqlex);
     $us= base64_encode($us); }
    while($linhaex=mysql_fetch_array($comandoex)){
    
    ?>
    
   <option value="<?php echo $linhaex['PK_CodEtec']?>"<?php if (!(strcmp($linhaex['PK_CodEtec'],$etec))) {echo "selected=\"selected\"";} ?>><?php echo $linhaex['Etec']?></option>
        <?php } ?>
      <td width="15"></select>
  </tr>
    <tr>
    <?php 
 if (isset($_GET['codetec'])){
   
   
   $fketec=$_GET['codetec'];}else
   {
       if ($acao != "adc"){
        $fketec=$etec;}
     }
 $sqlex="select * from tbl_etec where PK_CodEtec='$fketec'";
    $comandoex=mysql_query($sqlex);  
    $linhaex=mysql_fetch_array($comandoex);

?>
    <td width="39"></td>
    <td width="168"></td>
    <td width="169"></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="left"><strong>Código</strong></td>
    <td colspan="5" align="left"><?php echo $linhaex['Codigo_etec'];
    ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><strong>Município</strong></td>
    <td colspan="5" align="left"><?php echo $linhaex['Municipio'];
    ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><strong>Tipo de Atendimento</strong></td>
    <td colspan="5" align="left"><?php echo $linhaex['TipoAtendimento'];
    ?></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp; </td>
  </tr>
  <tr align="center">
    <td colspan="8" bgcolor="#D6D6D6"><strong>Descrição do Equipamento</strong></td>
  </tr>
  <tr>
    <td height="21" align="left" colspan="8"><strong>Equipamento</strong></td>
  </tr>
  <tr>
    <td height="27" colspan="5" align="left"><select name="txt_Equipamento" id="txt_Equipamento" onchange="achei()" style="width:350px" title="Escolha na lista abaixo o equipamento que deseja cadastrar" <?php
     if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
      <?php
         mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
      $sqlequip="select * from tbl_cadastro_equipamento order by Tipo_Equipamento";
      $comando=mysql_query($sqlequip);
  while($linhaequip=mysql_fetch_array($comando)){
    ?>
      <option value="<?php echo $linhaequip['PK_CadastroEquipamento']?>"<?php if (!(strcmp($linhaequip['PK_CadastroEquipamento'],$equipamento))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp($linhaequip['PK_CadastroEquipamento'], $equipamento))) {echo "selected=\"selected\"";} ?>> <?php echo $linhaequip['Tipo_Equipamento']?></option>
      <?php } ?>
      </select>
    <font color="#FF0000">*</font></td>
    <td width="296" colspan="1" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left"><strong>Transferência de uma outra Unidade</strong></td>
    <td width="210" align="left" colspan="1" valign="bottom"><strong>Ano de Aquisição</strong></td>
    <td align="left"><strong>Imagem
        <label>
          <input type="radio" name="radio" id="radio" value="Sim" onclick="simfoto()"/>
          Sim </label>
        <label>
          <input type="radio" name="radio" id="radio" value="Não" onclick="naofoto()" checked="checked"/>
        </label>
Não</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="left"><label>
      <select name="txt_optransferencia" id="txt_optransferencia" onchange="achei()">
        <option value="0" <?php if (!(strcmp(0, $transferencia))) {echo "selected=\"selected\"";} ?>>Não</option>
        <option value="1" <?php if (!(strcmp(1, $transferencia))) {echo "selected=\"selected\"";} ?>>Sim</option>
      </select>
    </label></td>
    <td align="left"><label>
      <select name="txt_anoaquisicao" id="txt_anoaquisicao">
        <option value="anterior 2005" <?php if (!(strcmp("anterior 2005", $anoaquisicao))) {echo "selected=\"selected\"";} ?>>Anterior a 2005</option>
        <option value="2006" <?php if (!(strcmp(2006, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2006</option>
        <option value="2007" <?php if (!(strcmp(2007, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2007</option>
        <option value="2008" <?php if (!(strcmp(2008, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2008</option>
        <option value="2009" <?php if (!(strcmp(2009, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2009</option>
        <option value="2010" <?php if (!(strcmp(2010, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2010</option>
        <option value="2011" <?php if (!(strcmp(2011, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2011</option>
        <option value="2012" <?php if (!(strcmp(2012, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2012</option>
        <option value="2013" <?php if (!(strcmp(2013, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2013</option>
        <option value="2014" <?php if (!(strcmp(2014, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2014</option>
        <option value="2015" <?php if (!(strcmp(2015, $anoaquisicao))) {echo "selected=\"selected\"";} ?>>2015</option>
          
        </select>
      </label>
    <font color="#FF0000">*</font></td>
    <td colspan="1" align="left"><input type="file" name="txt_imagemeqp" style="width:200px" title="Inserir foto do equipamento – tamanho máximo de 100KB" id="txt_imagemeqp" size="50" value="<?php echo $nome_imagem;?>" /></td>
  </tr>
  <tr>
    <td colspan="4" align="left"><table width="385" border="0" id="transferencia">
      <tr>
        <td width="375"><select name="txt_outraunidade" style="width:350px" id="txt_outraunidade">
          <?php 
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    
    $sqlseleciona="select * from tbl_etec";
    $comandoseleciona=mysql_query($sqlseleciona);
    while($linhaseleciona=mysql_fetch_array($comandoseleciona)){
    $pketec=$linhaseleciona['PK_CodEtec'];
    $pketec="";
    
    ?>
          <option value="<?php echo $linhaseleciona['PK_CodEtec'];?>" <?php if (!(strcmp($linhaseleciona['PK_CodEtec'], $outraunidade))) {echo "selected=\"selected\"";} ?>><?php echo $linhaseleciona['Etec']; ?></option>
          <?php } ?>
        </select>
          <font color="#FF0000">*</font></td>
      </tr>
    </table></td>
    <td colspan="1" valign="bottom" align="left"  ><strong>Modelo</strong></td>
    <td align="left"><strong>Forma de Aquisição</strong></td>
  </tr>
  <tr>
    <td height="24" colspan="4" align="left"><strong>Especificação Equipamento</strong></td>
    <td colspan="1" valign="bottom" align="left"  ><input name="txt_modelo" title="Informe aqui o modelo do equipamento" type="text" id="txt_modelo" value="<?php echo $modelo;?>" />
    <font color="#FF0000">*</font></td>
    <td align="left"><select name="txt_aquisicao" onchange="achei()" id="txt_aquisicao" title="Informe aqui  de que forma o equipamento foi adquirido">
      <option value="" <?php if (!(strcmp("", $aquisicao))) {echo "selected=\"selected\"";} ?>></option>
      <option value="1" <?php if (!(strcmp(1, $aquisicao))) {echo "selected=\"selected\"";} ?>>a) CPS</option>
      <option value="2" <?php if (!(strcmp(2, $aquisicao))) {echo "selected=\"selected\"";} ?>>b) FAT</option>
      <option value="3" <?php if (!(strcmp(3, $aquisicao))) {echo "selected=\"selected\"";} ?>>c) APM</option>
      <option value="4" <?php if (!(strcmp(4, $aquisicao))) {echo "selected=\"selected\"";} ?>>d) Cooperativa Escola</option>
      <option value="5" <?php if (!(strcmp(5, $aquisicao))) {echo "selected=\"selected\"";} ?>>e) Doação</option>
      <option value="6" <?php if (!(strcmp(6, $aquisicao))) {echo "selected=\"selected\"";} ?>>f) Empréstimo</option>
      <option value="7" <?php if (!(strcmp(7, $aquisicao))) {echo "selected=\"selected\"";} ?>>g) Cessão</option>
      <option value="8" <?php if (!(strcmp(8, $aquisicao))) {echo "selected=\"selected\"";} ?>>h) Compartilhamento</option>
    </select>
    <font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><input name="txt_especificacao" type="text" id="txt_especificacao" title="Informe aqui a especificação técnica do equipamento" value="<?php echo $especificacao;?>" />
      <font color="#FF0000">*</font></td>
    <td colspan="0" valign="bottom" align="left">&nbsp;</td>
    <td align="left"><select name="txt_detalheaquisicao" onchange="achei()" id="txt_detalheaquisicao">
      <option value="" <?php if (!(strcmp("", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>></option>
      <option value="Prefeitura" <?php if (!(strcmp("Prefeitura", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>a) Prefeitura</option>
      <option value="ONG" <?php if (!(strcmp("ONG", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>b) ONG</option>
      <option value="Sindicato" <?php if (!(strcmp("Sindicato", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>c) Sindicato</option>
      <option value="Fundacao" <?php if (!(strcmp("Fundacao", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>d) Fundação</option>
      <option value="Associacao" <?php if (!(strcmp("Associacao", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>e) Associação</option>
      <option value="Orgaos de Classe" <?php if (!(strcmp("Orgaos de Classe", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>f) Órgãos de Classe</option>
      <option value="Outro Orgao Publico" <?php if (!(strcmp("Outro Orgao Publico", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>g) Outro Orgão Público</option>
      <option value="Empresa Privada" <?php if (!(strcmp("Empresa Privada", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>h) Empresa Privada</option>
      <option value="Outros" <?php if (!(strcmp("Outros", $detalheaquisicao))) {echo "selected=\"selected\"";} ?>>i) Outros</option>
    </select></td>
    <td width="1" align="left" ><label><br />
    </label></td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom" align="left"><strong>Marca</strong></td>
    <td colspan="1" valign="bottom" align="left"><strong>Quantidade</strong></td>
    <td valign="bottom" align="left" ><table width="186" border="0" id="txt_classe">
      <tr>
        <td width="176" align="left"><strong>Órgão de Classe</strong></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" valign="top" align="left" ><input name="txt_descricao" title="Informe aqui a marca do equipamento" type="text" id="txt_descricao" value="<?php echo $descricao;?>" />
      <font color="#FF0000">*</font></td>
    <td valign="top" align="left"><input name="txt_quantidade" title="Informe aqui a quantidade existente do equipamento" type="text" id="txt_quantidade" onchange="restartform()" value="<?php echo $quantidade ;?>" <?php
     if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> />
    <font color="#FF0000">*</font></td>
    <td align="left" valign="top"><select name="txt_orgaoclasse" id="txt_orgaoclasse">
      <option value="" <?php if (!(strcmp("", $orgaoclasse))) {echo "selected=\"selected\"";} ?>></option>
      <option value="COREN" <?php if (!(strcmp("COREN", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>a) COREN</option>
      <option value="CRA" <?php if (!(strcmp("CRA", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>b) CRA</option>
      <option value="CRC" <?php if (!(strcmp("CRC", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>c) CRC</option>
      <option value="CREA" <?php if (!(strcmp("CREA", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>d) CREA</option>
      <option value="CRESCI" <?php if (!(strcmp("CRESCI", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>e) CRESCI</option>
      <option value="CRM" <?php if (!(strcmp("CRM", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>f) CRM</option>
      <option value="CRQ" <?php if (!(strcmp("CRQ", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>g) CRQ</option>
      <option value="OAB" <?php if (!(strcmp("OAB", $orgaoclasse))) {echo "selected=\"selected\"";} ?>>h) OAB</option>
    </select></td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom" align="left"><strong>Ocioso</strong></td>
    <td colspan="1" valign="bottom" align="left"><strong>Atualizaçao Tecnológica</strong></td>
    <td><table width="122" border="0" align="left" id="txt_especificacaoorgao2">
      <tr>
        <td width="112" align="left"><strong>Especificação</strong></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom" align="left"><strong>
      <select name="txt_ociosidade" id="txt_ociosidade" onchange="achei()" title="Informe aqui se o equipamento não esta sendo utilizado">
        <option value="1" <?php if (!(strcmp(1, $ociosidade))) {echo "selected=\"selected\"";} ?>>Sim</option>
        <option value="2" <?php if (!(strcmp(2, $ociosidade))) {echo "selected=\"selected\"";} ?>>Não</option>
      </select>
      <font color="#FF0000">*</font></strong></td>
    <td colspan="1" valign="bottom" align="left"><select name="txt_atualizacaotecnologica"  style="width:150px" title="Informe aqui a situação do equipamento" onchange="achei()" id="txt_atualizacaotecnologica">
      <option value="" <?php if (!(strcmp("", $atualizacaotecnologica))) {echo "selected=\"selected\"";} ?>></option>
      <option value="1" <?php if (!(strcmp(1, $atualizacaotecnologica))) {echo "selected=\"selected\"";} ?>>a) Tecnologia de Ponta</option>
      <option value="2" <?php if (!(strcmp(2, $atualizacaotecnologica))) {echo "selected=\"selected\"";} ?>>b) Atual</option>
      <option value="3" <?php if (!(strcmp(3, $atualizacaotecnologica))) {echo "selected=\"selected\"";} ?>>c) Antigo, mas não obsoleto</option>
      <option value="4" <?php if (!(strcmp(4, $atualizacaotecnologica))) {echo "selected=\"selected\"";} ?>>d) Obsoleto</option>
      </select>
    <font color="#FF0000">*</font></td>
    <td valign="bottom" align="left"><strong>
      <input name="txt_especificacaoorgao" align="left" type="text" id="txt_especificacaoorgao" value="<?php echo $especificacaoorgao;?>" />
    </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><table width="69" border="0" id="txt_just">
      <tr>
        <td width="59"><strong align="left">Justificativa</strong></td>
      </tr>
    </table></td>
    <td valign="bottom" align="left"><table width="124" border="0" align="left" id="txt_usabilidadee">
      <tr>
        <td width="118" align="left"><strong>Usabilidade</strong></td>
        </tr>
      </table>
    <label> </label></td>
    <td>&nbsp;</td>
    <td valign="bottom">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom" align="left">
    <select id="txt_justificativa" name="txt_justificativa" title="Justifique aqui se o equipamento é ocioso e porque" style="width:350px;max-width:350px">
    <option value="<?php echo $justificativa;?>"><?php echo $justificativa;?></option>
    <option> ÁREA ISOLADA (REFORMA, OU MANUTENÇÃO DO ESPAÇO FÍSICO) </option>
    <option> EQUIPAMENTO NÃO INSTALADO </option>
    <option> FALTA DE MANUTENÇÃO </option>
    <option> INSERVÍVEL </option>
    <option> NÃO OFERTA HABILITAÇÃO NO EIXO DO EQUIPAMENTO </option>
    <option> SEM CONHECIMENTO TÉCNICO </option>
    <option> SEM INFRAESTRUTURA ADEQUADA AO FUNCIONAMENTO (BANCADA, ELÉTRICA, HIDRÁULICA E CIVIL). </option>
    
    </select><br><textarea id="txt_motivo" style="width:345px;max-width:345px" placeholder="Motivo..."><?php echo $motivo;?></textarea>
    </td>
    <td valign="bottom" align="left"><select name="txt_usabilidade" onchange="" id="txt_usabilidade">
        <option value="" <?php if (!(strcmp("", $usabilidade))) {echo "selected=\"selected\"";} ?>></option>
        <option value="em uso" <?php if (!(strcmp("em uso", $usabilidade))) {echo "selected=\"selected\"";} ?>>a) Em uso</option>
        <option value="sem uso" <?php if (!(strcmp("sem uso", $usabilidade))) {echo "selected=\"selected\"";} ?>>b) Sem uso</option>
    </select></td>
    <td>&nbsp;</td>
    <td valign="bottom">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><strong>Potência (em W)</strong></td>
    <td valign="bottom"><strong>Dimensão (altura)</strong></td>
    <td valign="bottom" align="left">&nbsp;</td>
    <td rowspan="8" valign="bottom" align="left">&nbsp;</td>
    <td rowspan="8" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><label>
      <input name="txt_potencia" type="text" id="txt_potencia" value="<?php echo $potencia; ?>" />
    </label></td>
    <td valign="bottom"><label>
      <input name="txt_dimensaoaltura" type="text" id="txt_dimensaoaltura" value="<?php echo $dimensaoaltura; ?>" />
    </label></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><strong>Tipo de Tomada</strong></td>
    <td valign="bottom"><strong>Dimensão (largura)</strong></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><label>
      <select name="txt_tipotomada" id="txt_tipotomada">
        <option value="110" <?php if (!(strcmp(110, $tipotomada))) {echo "selected=\"selected\"";} ?>>110</option>
        <option value="220" <?php if (!(strcmp(220, $tipotomada))) {echo "selected=\"selected\"";} ?>>220</option>
        <option value="220tri" <?php if (!(strcmp("220tri", $tipotomada))) {echo "selected=\"selected\"";} ?>>220tri</option>
      </select>
    </label></td>
    <td valign="bottom"><label>
      <input name="txt_dimensaolargura" type="text" id="txt_dimensaolargura" value="<?php echo $dimensaolargura; ?>" />
    </label></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><strong>Peso (em Kg)</strong></td>
    <td valign="bottom"><strong>Dimensão (comprimento)</strong></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><label>
      <input name="txt_pesokg" type="text" id="txt_pesokg" value="<?php echo $peso; ?>" />
    </label></td>
    <td valign="bottom"><label>
      <input name="txt_dimensaocomprimento" type="text" id="txt_dimensaocomprimento" value="<?php echo $dimensaocomprimento; ?>" />
    </label></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><strong>Ambiente Alocado</strong></td>
    <td valign="bottom"><label><strong>N° Patrimônio</strong><br />
    </label></td>
    <td valign="bottom" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><strong>
      <select name="txt_ambiente" style="width:200px" title="Informe aqui em qual laboratório o equipamento se encontra" id="txt_ambiente" <?php
     if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
        <?php 
      if (isset($_GET['codetec'])){
   
   
   $fketec=$_GET['codetec'];}else {
    if ($acao != "adc"){
    $fketec=$etec; 
     }
     }
      mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
      
    
       $sqllabo="select * from  tbl_espaco_fisico where `FK_Instituicao`='$fketec'";
    
      $comando=mysql_query($sqllabo) or die (mysql_error());
      ?>
        <option value=""></option>
        <?php
  while($linha=mysql_fetch_array($comando)){
      ?>
        <option value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$ambiente))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Descricao']?></option>
        <?php } ?>
      </select>
    </strong><font color="#FF0000">*</font></td>
    <td valign="bottom" align="left">
    <div style="overflow:auto;height:100px;width:210px ">
    <table width="190" border="0">
      <tr>
        <td><?php if(isset($_SESSION['dados_equipamento']['quantidade']) && $_GET['acao']=="adc")
  {
  $i=$_SESSION['dados_equipamento']['quantidade'];
  while($i > 0){ ?>
          <input name="txt_patrimonio<?php echo $i ?>" title="Informe aqui o nº do patrimônio fornecido pela UGAF-Centro Paula Souza" type="text" id="txt_patrimonio" value=""  />
          <font color="#FF0000">*</font><br />
          <?php
  $i=$i-1;
}  
  }
  
  if($_GET['acao']!="adc"){
    $i=0;
    $sql_patrimonio = "SELECT*FROM tbl_patrimonio WHERE FK_equipamento = '$cod'";
    $qry_patrimonio = mysql_query($sql_patrimonio);
    $i=$quantidade;
    $i2 = 0;
    while($i>0){?>
          <input name="txt_patrimonio<?php echo $i ?>" title="Informe aqui o nº do patrimônio fornecido pela UGAF-Centro Paula Souza" type="text" id="txt_patrimonio" value="<?php echo @mysql_result($qry_patrimonio,$i2,'patrimonio'); ?>"  />
          <font color="#FF0000">*</font><br />
          <?php
    $i--;
    $i2++;
    }}?></td>
      </tr>
    </table>
    </div>
    </td>
    <td valign="bottom">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="bottom"><p><strong>Observações Gerais</strong></p>
      <p>
        <textarea title="Comentários" name="txt_historico" cols="40" rows="5" id="txt_historico"><?php echo $historico;?></textarea>
      </p></td>
    <td height="26" colspan="3" align="left"><table width="127" border="0" id="txt_baixa" align="left">
      <tr>
        <td width="121" align="left"><strong>Baixa Patrimonial</strong></td>
      </tr>
    </table>
      <p>&nbsp;</p>
      <p>
        <select name="txt_baixapatrimonial" onchange="achei()" id="txt_baixapatrimonial">
          <option value="" <?php if (!(strcmp("", $baixapatrimonial))) {echo "selected=\"selected\"";} ?>></option>
          <option value="Sim" <?php if (!(strcmp("Sim", $baixapatrimonial))) {echo "selected=\"selected\"";} ?>>Sim</option>
          <option value="Nao" <?php if (!(strcmp("Nao", $baixapatrimonial))) {echo "selected=\"selected\"";} ?>>Não</option>
        </select>
    </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom"><h5>É necessário preencher todos os campos que estajam marcado com (<font color="#FF0000">*</font>)</h5></td>
    <td colspan="3"><table width="10" border="0" id="txt_oco">
      <tr>
        <td><strong>Ocorrência</strong></td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="bottom" align="left"><p>
    <?php if($supervisor!="S"){ ?>
      <input type="submit" name="Salvar" id="Salvar" value="Salvar" />
      <input type="reset" name="button2" id="button2" value="Limpar" />
   <?php } ?>   
      <input name="acao" type="hidden" id="acao" value="<?php echo $acao ?>" />
      <?php if (isset($_GET['cod'])){ ?>
      <input name="cod" type="hidden" id="cod" value="<?php echo $_GET['cod']; ?>" />
      <?php } ?>
    </p></td>
    <td colspan="3" valign="bottom"><input name="txt_ocorrencia" type="text" id="txt_ocorrencia" value="<?php echo $ocorrencia;?>" />
    <input name="validacao" type="hidden" id="validacao" value="if(isset($_GET['val'])){$validacao=$_GET['val']; echo $validacao;} ?&gt;" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
  <table width="83%" align="center">
    
  </table>

  <?php include "footer.html"; ?>
<p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>

