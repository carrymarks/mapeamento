<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); }   

if ($_SESSION['logado'] == 1) {
  
  //header ("Location: index.php");
  
    
  }
  
  
  

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Cadastro Espaço Físico - Mapeamento</title>
<meta charset="UTF-8">
<script>
function Verificar(){
    var descricao=document.getElementById('txt_descricao').value;  
    
    if(descricao==""){
      alert("Campo Descrição precisa ser preenchido!");
      return true;
 }
  
  
  var tiporevest=document.getElementById('txt_revestimento').value;
  if(tiporevest==""){
    alert("Campo Tipo de Revestimento precisa ser preenchido!");
 }
  
  var tomanda220=document.getElementById('txt_tomada220').value;

  if(tomanda220==""){
    alert("Campo Tomada 220v (bifase) precisa ser preenchido!");
 }
  
  
  var tomada110=document.getElementById('txt_tomada110').value;
  
  if(tomada110==""){
    alert("Campo Tomada 110v(monofase) precisa ser preenchido!");
 }
  
  var tomada200=document.getElementById('txt_tomada200').value;
  
  if(tomada200==""){
    alert("Campo Tomada 200v(trifase) precisa ser preenchido!");
 }
    
  var qntluminarias=document.getElementById('txt_qntluminarias').value;  
  
  if(qntluminarias==""){
    alert("Campo Quantidade Luminárias precisa ser preenchido!");
 }
    
  if(qntluminarias==0){
    alert("Campo Quantidade Luminárias precisa ser preenchido com um valor diferente de '0'!");
 }  
    
  var qtdcurso=document.getElementById('txt_quantidade').value;
  
  if(qtdcurso==""){
    alert("Campo Qtde de cursos que ultilizam o lab. precisa ser preenchido!");
 }
  
  
  
  var capaluno=document.getElementById('txt_CapacidadeAluno').value;
  
  if(capaluno==""){
    alert("Campo Capacidade(n° de Alunos) precisa ser preenchido!");
 }
    
    
  var qntbancadas=document.getElementById('txt_QuantidadeBancadas').value;
  
  if(qntbancadas==""){
    alert("Campo Quantidade de bancadas precisa ser preenchido!");
 }
    
  var tpconstrucao=document.getElementById('txt_TipoConstrucao').value;  
  
  if(tpconstrucao==""){
    alert("Campo Tipo de Construção precisa ser preenchido!");
 }
    
  var areaval=document.getElementById('txt_Area').value;
  
  if(areaval==""){
    alert("Campo Área(m²) precisa ser preenchido!");
 }
    
  
  var pedireito=document.getElementById('txt_pedireito').value;
  
  if(pedireito=="") {
    alert("Campo Pé Direito(em metros) precisa ser preenchido!");
 }
    
  if(pedireito==0){
    alert("Campo Pé Direito(em metros) precisa ser preenchido com um valor diferente de '0'!");
 }  
    
  
  var qtdportas=document.getElementById('txt_qntdportas').value;
  
  if(qtdportas==""){
    alert("Campo Quantidade de Portas precisa ser preenchido!");
 }
    
  if(qtdportas==0){
    alert("Campo Quantidade de Portas precisa ser preenchido com um valor diferente de '0'!");
 }  
    
  var portlargura=document.getElementById('txt_portalargura').value;  
  
  if(portlargura==""){
    alert("Campo Medida da Porta(largura) precisa ser preenchido!");
 }
  
  if(portlargura==0){
    alert("Campo Medida da Porta(largura) precisa ser preenchido com um valor diferente de '0'!");
 }
    
  var portaaltura=document.getElementById('txt_portaaltura').value;  
  
  if(portaaltura==""){
    alert("Campo Medida da Porta(altura) precisa ser preenchido!");
 }
    
  if(portaaltura==0){
    alert("Campo Medida da Porta(altura) precisa ser preenchido com um valor diferente de '0'!");
 }
           
  

  }




function cadastro(){
alert("Cadastro efetuado com sucesso.");
}

function edicao(){
alert("Alteração efetuada com sucesso.");  
  }

function simfoto(){
  document.form1.txt_imagem.disabled=false;  
  }
function naofoto(){
  document.form1.txt_imagem.disabled=true;  
  }  

function codigoetec(){
  document.getElementById('validacao').value=1;
  document.getElementById('txt_TipoConstrucao').value="";
  document.forms["form1"].submit();
  
  }
  
  function restartform(){
  document.getElementById('validacao').value=1;
  document.forms["form1"].submit();
  }



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
  
</script>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<style type="text/css">
<!--
h3 {
  font-size: 16px;
}
h1 {
  font-size: 14px;
}
h1,h2,h3,h4,h5,h6 {
  font-weight: bold;
}
.dim {
  max-width: 1024px;
  min-with: 800px;}
-->
</style></head>

<body onload="start()"><?php 


if(isset($_GET['us'])){
$us=$_GET['us'];}

if(isset($_GET['codetec'])){
$codetec=$_GET['codetec'];  }

if (isset($_GET['cod']))
$cod=$_GET['cod'];

if(isset($_GET["acao"])){
$acao=$_GET["acao"];
}else{
  $acao=$_GET["acao"];
  }

if ($acao!="adc"){

$sql="select * from tbl_espaco_fisico where `PK_CodLaboratorio`=$cod ";
$conect=mysql_query($sql) ;
$linha=mysql_fetch_array($conect);

        if (isset($_GET['codetec'])){
  
  $etec=$_GET['codetec'];
  
  }else{
    $etec=$linha['FK_Instituicao'];
    }


$laboratorio=$linha['FK_Laboratorio'];
$Mseg=$linha['Mseg'];
$Mter=$linha['Mter'];
$Mqua=$linha['Mqua'];
$Mqui=$linha['Mqui'];
$Msex=$linha['Msex'];
$Msab=$linha['Msab'];
$Tseg=$linha['Tseg'];
$Tter=$linha['Tter'];
$Tqua=$linha['Tqua'];
$Tqui=$linha['Tqui'];
$Tsex=$linha['Tsex'];
$Tsab=$linha['Tsab'];

$Nseg=$linha['Nseg'];
$Nter=$linha['Nter'];
$Nqua=$linha['Nqua'];
$Nqui=$linha['Nqui'];
$Nsex=$linha['Nsex'];
$Nsab=$linha['Nsab'];
$quadroenergia=$linha['Quadro_Energia'];
$tomanda110=$linha['Tomada110v'];
$tomada220=$linha['Tomada220v'];
$tomada200=$linha['Tomada200v'];
$tipoiluminacao=$linha['Tipo_Iluminacao'];
$qntluminarias=$linha['Quantidade_Luminarias'];
$pedireito=$linha['Pe_Direito'];
$revestimento=$linha['Tipo_Revestimento'];
$qntportas=$linha['Quantidade_Portas'];
$portalargura=$linha['Medida_PortaLargura'];
$portaaltura=$linha['Medida_PortaAltura'];
$seguranca=$linha['Equipamento_Seguranca'];
$exaustor=$linha['Exaustor'];
$seg10=$linha['Seg10'];
$seg11=$linha['Seg11'];
$seg12=$linha['Seg12'];
$seg13=$linha['Seg13'];
$seg14=$linha['Seg14'];
$seg15=$linha['Seg15'];
$seg16=$linha['Seg16'];
$seg17=$linha['Seg17'];
$seg18=$linha['Seg18'];
$seg19=$linha['Seg19'];
$seg20=$linha['Seg20'];
$seg21=$linha['Seg21'];
$seg22=$linha['Seg22'];
$ter10=$linha['Ter10'];
$ter11=$linha['Ter11'];
$ter12=$linha['Ter12'];
$ter13=$linha['Ter13'];
$ter14=$linha['Ter14'];
$ter15=$linha['Ter15'];
$ter16=$linha['Ter16'];
$ter17=$linha['Ter17'];
$ter18=$linha['Ter18'];
$ter19=$linha['Ter19'];
$ter20=$linha['Ter20'];
$ter21=$linha['Ter21'];
$ter22=$linha['Ter22'];
$quar10=$linha['Quar10'];
$quar11=$linha['Quar11'];
$quar12=$linha['Quar12'];
$quar13=$linha['Quar13'];
$quar14=$linha['Quar14'];
$quar15=$linha['Quar15'];
$quar16=$linha['Quar16'];
$quar17=$linha['Quar17'];
$quar18=$linha['Quar18'];
$quar19=$linha['Quar19'];
$quar20=$linha['Quar20'];
$quar21=$linha['Quar21'];
$quar22=$linha['Quar22'];
$quin10=$linha['Quin10'];
$quin11=$linha['Quin11'];
$quin12=$linha['Quin12'];
$quin13=$linha['Quin13'];
$quin14=$linha['Quin14'];
$quin15=$linha['Quin15'];
$quin16=$linha['Quin16'];
$quin17=$linha['Quin17'];
$quin18=$linha['Quin18'];
$quin19=$linha['Quin19'];
$quin20=$linha['Quin20'];
$quin21=$linha['Quin21'];
$quin22=$linha['Quin22'];
$sex10=$linha['Sex10'];
$sex11=$linha['Sex11'];
$sex12=$linha['Sex12'];
$sex13=$linha['Sex13'];
$sex14=$linha['Sex14'];
$sex15=$linha['Sex15'];
$sex16=$linha['Sex16'];
$sex17=$linha['Sex17'];
$sex18=$linha['Sex18'];
$sex19=$linha['Sex19'];
$sex20=$linha['Sex20'];
$sex21=$linha['Sex21'];
$sex22=$linha['Sex22'];
$sab10=$linha['Sab10'];
$sab11=$linha['Sab11'];
$sab12=$linha['Sab12'];
$sab13=$linha['Sab13'];
$sab14=$linha['Sab14'];
$sab15=$linha['Sab15'];
$sab16=$linha['Sab16'];
$sab17=$linha['Sab17'];
$sab18=$linha['Sab18'];
$sab19=$linha['Sab19'];
$sab20=$linha['Sab20'];
$sab21=$linha['Sab21'];
$sab22=$linha['Sab22'];
$obsgeral=$linha['Obs_Geral'];
$ambientedescricao=$linha['AmbienteDescricao'];


$descricao=$linha['Descricao'];
$capacidade=$linha['Capacidade'];
$area=$linha['Area'];
$nome_imagem=$linha['Imagem'];
$construcao=$linha['tipo_construcao'];
$quantidadebancadas=$linha['Quantidade_Bancadas'];  
$justificativa=$linha['justificativa']; 
$motivo=$linha['motivo']; 

$quantidade=$linha['quantidade_curso'];

  }
else{
if (isset($_GET['codetec'])){
  
  $etec=$_GET['codetec'];
  
  }else{
      $etec='';}  
  
$nome='';  
$laboratorio='';
$descricao='';
$capacidade='';
$area='';
$nome_imagem='';
$construcao='';

$quantidadebancadas='';  
$quantidade='';
$Mseg='';
$Mter='';
$Mqua='';
$Mqui='';
$Msex='';
$Msab='';
$Tseg='';
$Tter='';
$Tqua='';
$Tqui='';
$Tsex='';
$Tsab='';

$Nseg='';
$Nter='';
$Nqua='';
$Nqui='';
$Nsex='';
$Nsab='';
$quadroenergia='';
$tomanda110='';
$tomada220='';
$tomada200='';
$tipoiluminacao='';
$qntluminarias='';
$pedireito='';
$revestimento='';
$qntportas='';
$portalargura='';
$portaaltura='';
$seguranca='';
$exaustor='';
$seg10='';
$seg11='';
$seg12='';
$seg13='';
$seg14='';
$seg15='';
$seg16='';
$seg17='';
$seg18='';
$seg19='';
$seg20='';
$seg21='';
$seg22='';
$ter10='';
$ter11='';
$ter12='';
$ter13='';
$ter14='';
$ter15='';
$ter16='';
$ter17='';
$ter18='';
$ter19='';
$ter20='';
$ter21='';
$ter22='';
$quar10='';
$quar11='';
$quar12='';
$quar13='';
$quar14='';
$quar15='';
$quar16='';
$quar17='';
$quar18='';
$quar19='';
$quar20='';
$quar21='';
$quar22='';
$quin10='';
$quin11='';
$quin12='';
$quin13='';
$quin14='';
$quin15='';
$quin16='';
$quin17='';
$quin18='';
$quin19='';
$quin20='';
$quin21='';
$quin22='';
$sex10='';
$sex11='';
$sex12='';
$sex13='';
$sex14='';
$sex15='';
$sex16='';
$sex17='';
$sex18='';
$sex19='';
$sex20='';
$sex21='';
$sex22='';
$sab10='';
$sab11='';
$sab12='';
$sab13='';
$sab14='';
$sab15='';
$sab16='';
$sab17='';
$sab18='';
$sab19='';
$sab20='';
$sab21='';
$sab22='';
$obsgeral='';
$ambientedescricao='';
    }
if(isset($_SESSION['dados_efisico'])){
  //$nome = $_SESSION['dados_efisico']['nome'];
  $laboratorio = $_SESSION['dados_efisico']['laboratorio'];
  $descricao = $_SESSION['dados_efisico']['descricao'];
  $capacidade = $_SESSION['dados_efisico']['capacidade'];
  $area = $_SESSION['dados_efisico']['area'];
  $nome_imagem = $_SESSION['dados_efisico']['nome_imagem'];
  $construcao = $_SESSION['dados_efisico']['construcao'];
    $quantidade = $_SESSION['dados_efisico']['quantidade'];  
  $quantidadebancadas = $_SESSION['dados_efisico']['quantidadebancadas'];
   $justificativa = $_SESSION['dados_efisico']['justificativa'];
    $motivo = $_SESSION['dados_efisico']['motivo'];
  
  }
  
?>


<td></td>
    </tr>
    <tr>
</form>
<form id="form1" name="form1" method="post" onsubmit="return Verificar()" enctype="multipart/form-data" action="op_espacoFisico.php?us=<?php $us= base64_decode($us); echo $us ?>">
    <table width="930" border="0">
    <tr>
      <td colspan="7" align="center" bgcolor="#D6D6D6"><strong>Cadastro Laboratórios </strong></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="25">&nbsp;</td>
      <td width="169" align="left"><strong>Etec</strong></td>
    
      <td colspan="3" align="left"><select name="txt_etec" style="width:500px" id="txt_etec" title="Nome da etec e município" onchange="codigoetec()" <?php if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
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
        </select>        </label></td>
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
      <td width="27"></select><td width="20"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
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
      <td align="left"><strong>Código</strong></td>
      <td width="324" align="left"><?php echo $linhaex['Codigo_etec'];
    ?></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Município</strong></td>
      <td align="left"><?php echo $linhaex['Municipio'];
    ?></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Tipo de Atendimento</strong></td>
      <td align="left"><?php echo $linhaex['TipoAtendimento'];
    ?></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="19" colspan="6" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7" align="center" bgcolor="#D6D6D6"><strong>Descrição do Laboratório</strong></td>
    </tr>
    <tr>
      <td colspan="6" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><strong>Laboratório</strong></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><select name="txt_Laboratorio" id="txt_Laboratorio" style="width:200px" title="Informe aqui o nome do laboratório a ser cadastrado" <?php if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
        <?php
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
      $sql="select * from tbl_cadastrolaboratorio order by Nome_Laboratorio";
      $comando=mysql_query($sql);
  while($linha=mysql_fetch_array($comando)){
    ?>
        <option value="<?php echo $linha['PK_CodLaboratorio']?>" value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$laboratorio))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp($linha['PK_CodLaboratorio'], $laboratorio))) {echo "selected=\"selected\"";} ?>>
        <?php echo $linha['Nome_Laboratorio']?>
        </option>
        <?php } ?>
      </select>
        <font color="#FF0000">*</font></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><strong>Quantidade de cursos que utilizam o laboratório</strong></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><input type="text" name="txt_quantidade" id="txt_quantidade" onchange="restartform()" value="<?php echo $quantidade; ?>" <?php if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> />
        <font color="#FF0000">*</font></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><strong>Cursos</strong></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" rowspan="2" align="left">
         <div style="overflow:auto;height:140px;width:250px ">
      <table width="225" border="0">
        <tr>
          <td width="215"><?php
    
    
    //------------------------------------------------insercao--------------------------
           if($acao == "adc"){ 
       if(isset($_SESSION['dados_efisico']['quantidade'])){
           $quantidade = $_SESSION['dados_efisico']['quantidade'];
       }else{ $quantidade = 0;
         }
         
       $i = $quantidade;
       
       while($i>0){//contador para criar os textbox
        
         $sql = "SELECT * FROM tbl_curso order by Nome_Curso";
         $qry = mysql_query($sql);
        
        ?>
            <select name="txt_curso<?php echo $i; ?>" style="width:200px" id="select" title="Informe aqui todos os cursos que utilizam o laboratório">
              <option value = "">Selecione o Curso</option>
              <?php while($linha = mysql_fetch_array($qry)){ ?>
              <option value = "<?php echo $linha['PK_CodCurso']; ?>"><?php echo $linha['Nome_Curso']; ?></option>
              <?php } ?>
            </select>
            <font color="#FF0000">*</font><br />
            <?php $i--;}}
    
    //---------------------------------------começao edicao
    if($_GET['acao'] != "adc"){
    $sql = "SELECT*FROM tbl_curso order by Nome_Curso";
    $qry_curso = mysql_query($sql);    
    $sql = "SELECT*FROM tbl_espaco_curso WHERE FK_espaco = '$cod'";
    $qry_espcur = mysql_query($sql);
        $iepc = 0;
    $iqtde = $quantidade;
    
    while($iqtde>0){
      $i=0; ?>
            <select name="txt_curso<?php echo $iqtde; ?>" style="width:200px" id="select" title="Informe aqui todos os cursos que utilizam o laboratório">
            <option value = "">Selecione o Curso</option>
              <?php $numrows = mysql_num_rows($qry_curso);
        
        
        while($i<$numrows){?>
              <option value = "<?php echo @mysql_result($qry_curso,$i,'PK_codCurso'); ?>"<?php if(@mysql_result($qry_espcur,$iepc,'FK_curso')==@mysql_result($qry_curso,$i,'PK_CodCurso')){ echo "selected";} ?>><?php echo @mysql_result($qry_curso,$i,'Nome_Curso'); ?></option>
              <?php $i++;
     
      } ?>
              ><br />
            </select>
            <?php  $iqtde--;
           $iepc++;
  
  }
  
  }?></td>
        </tr>
      </table>
      </div>
      </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><p><strong>Nome do ambiente alocado do Espaço Físico</strong></p></td>
      <td align="left"><strong>Capacidade (n° de Alunos)</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <input name="txt_descricao" title="Informe aqui o nome do
ambiente que a escola dá ao laboratório em questão. Exemplo: Laboratório de
Informática I." type="text" id="txt_descricao" value="<?php echo $descricao;?>" />
        </label>
        <font color="#FF0000">*</font></td>
      <td align="left"><input name="txt_CapacidadeAluno" title="Informe aqui quantidade de alunos possíveis no laboratório" type="text" id="txt_CapacidadeAluno" value="<?php echo $capacidade;?>" />
        <font color="#FF0000">*</font></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Descrição do Ambiente</strong></td>
      <td align="left"><strong>Quantidade de bancadas</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left">
        <label>
          <input title="Descreva aqui outras características físicas
desse ambiente." name="txt_ambientedescricao" type="text" id="txt_ambientedescricao" value="<?php echo $ambientedescricao; ?>" />
        </label></td>
      <td align="left"><input name="txt_QuantidadeBancadas" title="Informe aqui a quantidade de bancadas" type="text" id="txt_QuantidadeBancadas" value="<?php echo $quantidadebancadas?>" />
        <font color="#FF0000">*</font></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Tipo de revestimento</strong></td>
      <td align="left"><strong>Tipo de Construção</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <input name="txt_revestimento" title="Informe o revestimento utilizado para este ambiente." type="text" id="txt_revestimento" value="<?php echo $revestimento;?>" />
        <font color="#FF0000">*</font></label></td>
      <td align="left"><input name="txt_TipoConstrucao" title="Informe o tipo de construção empregada para este
ambiente." type="text" id="txt_TipoConstrucao" value="<?php echo $construcao?>"  />
        <font color="#FF0000">*</font></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Possui Quadro de Energia:</strong></td>
      <td align="left"><strong>Área (m²)</strong>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <select name="txt_quadroenergia" id="txt_quadroenergia">
          <option value="Nao" <?php if (!(strcmp("Nao", $quadroenergia))) {echo "selected=\"selected\"";} ?>>Não</option>
          <option value="Sim" <?php if (!(strcmp("Sim", $quadroenergia))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select>
        <font color="#FF0000">*</font></label></td>
      <td align="left"><strong>
        <input name="txt_Area" type="text" id="txt_Area" title="Informe aqui área construída do laboratório" value="<?php echo $area?>" />
        <font color="#FF0000">*</font></strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Tomada 110V (monofásica)</strong></td>
      <td align="left"><strong>Tipo Iluminação</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <input name="txt_tomada110" title="Informe aqui a quantidade de tomadas de 110V
existentes no ambiente." type="text" id="txt_tomada110" value="<?php echo $tomanda110;?>" />
        <font color="#FF0000">*</font></label></td>
      <td align="left"><label>
        <select name="txt_tipoiluminacao" id="txt_tipoiluminacao">
          <option value="Fluorescente" <?php if (!(strcmp("Fluorescente", $tipoiluminacao))) {echo "selected=\"selected\"";} ?>>Fluorescente</option>
          <option value="Incandescente" <?php if (!(strcmp("Incandescente", $tipoiluminacao))) {echo "selected=\"selected\"";} ?>>Incandescente</option>
          <option value="Incandescente" <?php if (!(strcmp("Incandescente", $tipoiluminacao))) {echo "selected=\"selected\"";} ?>>LED</option>
        </select>
        <font color="#FF0000">*</font></label></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Tomada 220V (bifásica)</strong></td>
      <td align="left"><strong>Pé Direito (em metros)</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <input name="txt_tomada220" title="Informe aqui a quantidade de tomadas de 220V
(bifase) existentes no ambiente." type="text" id="txt_tomada220" value="<?php echo $tomada220; ?>" />
        <font color="#FF0000">*</font></label></td>
      <td align="left"><label>
        <input name="txt_pedireito" type="text" id="txt_pedireito" value="<?php echo $pedireito;?>" />
        <font color="#FF0000">*</font></label></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Tomada 200V (trifásica)</strong></td>
      <td align="left"><strong>Quantidade de Portas</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <input name="txt_tomada200" title="Informe aqui a quantidade de tomadas de 220V
(trifase) existentes no ambiente." type="text" id="txt_tomada200" value="<?php echo $tomada200; ?>" />
        <font color="#FF0000">*</font></label></td>
      <td align="left"><label>
        <input name="txt_qntdportas" title="Informe a quantidade de portas desse ambiente." type="text" id="txt_qntdportas" value="<?php echo $qntportas;?>" />
        <font color="#FF0000">*</font></label></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Equipamentos de Segurança</strong></td>
      <td align="left"><strong>Medida da Porta (largura)</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><select name="txt_seguranca" id="txt_seguranca">
        <option value="0" <?php if (!(strcmp(0, $seguranca))) {echo "selected=\"selected\"";} ?>>N/A</option>
        <option value="1" <?php if (!(strcmp(1, $seguranca))) {echo "selected=\"selected\"";} ?>>Extintor</option>
        <option value="2" <?php if (!(strcmp(2, $seguranca))) {echo "selected=\"selected\"";} ?>>Luz de Emergência</option>
        <option value="3" <?php if (!(strcmp(3, $seguranca))) {echo "selected=\"selected\"";} ?>>Ambos</option>
        </select>
        <font color="#FF0000">*</font></td>
      <td align="left"><input name="txt_portalargura" title="Informe a largura da porta." type="text" id="txt_portalargura" value="<?php echo $portalargura;?>" />
        <font color="#FF0000">*</font></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Possui Exaustor</strong></td>
      <td align="left"><strong>Medida da Porta (altura)</strong></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><label>
        <select name="txt_exaustor" id="txt_exaustor">
          <option value="Sim" <?php if (!(strcmp("Sim", $exaustor))) {echo "selected=\"selected\"";} ?>>Sim</option>
          <option value="Nao" <?php if (!(strcmp("Nao", $exaustor))) {echo "selected=\"selected\"";} ?>>Não</option>
          </select>
        <font color="#FF0000">*</font></label></td>
      <td align="left"><label>
        <input name="txt_portaaltura" title="Informe a altura da porta." type="text" id="txt_portaaltura" value="<?php echo $portaaltura;?>" />
        <font color="#FF0000">*</font></label></td>
      </tr>
    <tr>
      <td colspan="4" align="left"><strong>Quantidade de Luminárias</strong></td>
      <td align="left"><strong>Observações Gerais</strong></td>
      </tr>
  
      <td colspan="4" align="left"><label>
        <input name="txt_qntluminarias" title="As luminárias referem-se ao objeto de suporte às lâmpadas
afixadas ao teto. Informe aqui quantas dessas caixas que comportam as lâmpadas
existem neste ambiente." type="text" id="txt_qntluminarias" value="<?php echo $qntluminarias;?>" />
        <font color="#FF0000">*</font></label></td>
      <td rowspan="2" align="left"><textarea name="txt_obsgeral" rows="3" id="txt_obsgeral"><?php echo $obsgeral; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="4" align="left">&nbsp;</td>
      </tr>
    

<tr>
</tr>



<tr>
<td align="left"><strong>Espaço Ocioso: </strong></td>  <br>    
      <td colspan="4" align="left"><label>
          <select name="valorocioso" id="valorocioso">
          <option value="Nao" <?php if (!(strcmp("Nao", $valorocioso))) {echo "selected=\"selected\"";} ?>>Não</option>
          <option value="Sim" <?php if (!(strcmp("Sim", $valorocioso))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select>
    </tr>





























    <tr>
      <td colspan="4" align="left"><strong>Imagem</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="left"><input type="radio" name="radio" id="radio" value="Sim" onclick="simfoto()"/>
        <strong>Sim
        <input type="radio" name="radio" id="radio" value="Nao" checked="checked" onclick="naofoto()"/>
Não</strong></td>
      
      
      
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="4" align="left"><input type="file" name="txt_imagem" title="Inserir foto do equipamento – tamanho máximo de 100KB" id="txt_imagem" size="50"/></td>
      <td>&nbsp;</td>
    </tr>
            <tr>
            <td colspan="4" valign="bottom" align="left">
             <strong> Laboratorio Ocisoso</strong><br><br>
             <select name="txt_exaustor" id="txt_exaustor">
          <option value="Sim" <?php if (!(strcmp("Sim", $exaustor))) {echo "selected=\"selected\"";} ?>>Sim</option>
          <option value="Nao" <?php if (!(strcmp("Nao", $exaustor))) {echo "selected=\"selected\"";} ?>>Não</option>
          </select>
        <font color="#FF0000">*</font><br><br>
              <strong> Justificativa</strong><br><br>
    <select id="txt_justificativa" name="txt_justificativa" title="Justifique aqui se o Laboratório é ocioso e porque" style="width:350px;max-width:350px">
    <option value="<?php echo $justificativa;?>"><?php echo $justificativa;?></option>
    <option> ÁREA ISOLADA (REFORMA) </option>
    <option> NÃO OFERTA HABILITAÇÃO NO EIXO DO EQUIPAMENTO </option>
    <option> EQUIPAMENTO NÃO INSTALADO </option>
    <option> SEM INFRAESTRUTURA ADEQUADA AO FUNCIONAMENTO ( ELÉTRICA, HIDRÁULICA E CIVIL). </option>
    </select><br>
              <textarea id="txt_motivo" style="width:345px;max-width:345px" placeholder="Motivo..."><?php echo $motivo;?></textarea>
              
    </td>
            
            </tr>
    <tr>
      <td colspan="5" align="left">&nbsp;</td>
    </tr>
    <tr align="center">
      <td colspan="5"><strong>Utilização do Laboratório </strong></td>
    </tr>
    <tr>
      <td colspan="5"><table width="933" border="0" align="center" id="tbl_ociosidade">
        <tr align="center" bgcolor="#E2E2DE">
          <td width="98"><strong> Período </strong></td>
          <td width="133"><strong>Segunda-Feira</strong></td>
          <td width="119"><strong>Terça-Feira</strong></td>
          <td width="126"><strong>Quarta-Feira</strong></td>
          <td width="125"><strong>Quinta-Feira</strong></td>
          <td width="114"><strong>Sexta-Feira</strong></td>
          <td width="99"><strong>Sábado</strong></td>
          </tr>
        <tr align="center">
          <td><strong>07:00 as 8:00</strong></td>
          <td><label>
            <select name="manha" id="manha">
              <option value="2" <?php if (!(strcmp(2, $Mseg))) {echo "selected=\"selected\"";} ?>>Não</option>
              <option value="1" <?php if (!(strcmp(1, $Mseg))) {echo "selected=\"selected\"";} ?>>Sim</option>
            </select>
          </label></td>
          <td><select name="manha2" id="manha2">
            <option value="2" <?php if (!(strcmp(2, $Mter))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Mter))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="manha3" id="manha3">
            <option value="2" <?php if (!(strcmp(2, $Mqua))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Mqua))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="manha4" id="manha4">
            <option value="2" <?php if (!(strcmp(2, $Mqui))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Mqui))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="manha5" id="manha5">
            <option value="2" <?php if (!(strcmp(2, $Msex))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Msex))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="manha6" id="manha6">
            <option value="2" <?php if (!(strcmp(2, $Msab))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Msab))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>08:00 as 09:00</strong></td>
          <td><label>
            <select name="tarde" id="tarde">
              <option value="2" <?php if (!(strcmp(2, $Tseg))) {echo "selected=\"selected\"";} ?>>Não</option>
              <option value="1" <?php if (!(strcmp(1, $Tseg))) {echo "selected=\"selected\"";} ?>>Sim</option>
            </select>
          </label></td>
          <td><select name="tarde2" id="tarde2">
            <option value="2" <?php if (!(strcmp(2, $Tter))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Tter))) {echo "selected=\"selected\"";} ?>>Sim</option>
            </select></td>
          <td><select name="tarde3" id="tarde3">
            <option value="2" <?php if (!(strcmp(2, $Tqua))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Tqua))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="tarde4" id="tarde4">
            <option value="2" <?php if (!(strcmp(2, $Tqui))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Tqui))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="tarde5" id="tarde5">
            <option value="2" <?php if (!(strcmp(2, $Tsex))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Tsex))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="tarde6" id="tarde6">
            <option value="2" <?php if (!(strcmp(2, $Tsab))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Tsab))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>09:00 as 10:00</strong></td>
          <td><select name="noite" id="MSEG">
            <option value="2" <?php if (!(strcmp(2, $Nseg))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nseg))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="noite2" id="noite">
            <option value="2" <?php if (!(strcmp(2, $Nter))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nter))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="noite3" id="noite2">
            <option value="2" <?php if (!(strcmp(2, $Nqua))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nqua))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="noite4" id="noite3">
            <option value="2" <?php if (!(strcmp(2, $Nqui))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nqui))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="noite5" id="noite4">
            <option value="2" <?php if (!(strcmp(2, $Nsex))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nsex))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="noite6" id="noite5">
            <option value="2" <?php if (!(strcmp(2, $Nsab))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $Nsab))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>10:00 as 11:00</strong></td>
          <td><label>
            <select name="seg10" id="seg10">
              <option value="2" <?php if (!(strcmp(2, $seg10))) {echo "selected=\"selected\"";} ?>>Não</option>
              <option value="1" <?php if (!(strcmp(1, $seg10))) {echo "selected=\"selected\"";} ?>>Sim</option>
            </select>
          </label></td>
          <td><select name="ter10" id="ter10">
            <option value="2" <?php if (!(strcmp(2, $ter10))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter10))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar10" id="select4">
            <option value="2" <?php if (!(strcmp(2, $quar10))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar10))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin10" id="select5">
            <option value="2" <?php if (!(strcmp(2, $quin10))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin10))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex10" id="select2">
            <option value="2" <?php if (!(strcmp(2, $sex10))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex10))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab10" id="select3">
            <option value="2" <?php if (!(strcmp(2, $sab10))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab10))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>11:00 as 12:00</strong></td>
          <td><select name="seg11" id="select6">
            <option value="2" <?php if (!(strcmp(2, $seg11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter11" id="select7">
            <option value="2" <?php if (!(strcmp(2, $ter11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar11" id="select8">
            <option value="2" <?php if (!(strcmp(2, $quar11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin11" id="select9">
            <option value="2" <?php if (!(strcmp(2, $quin11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex11" id="select10">
            <option value="2" <?php if (!(strcmp(2, $sex11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab11" id="select11">
            <option value="2" <?php if (!(strcmp(2, $sab11))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab11))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>12:00 as 13:00</strong></td>
          <td><select name="seg12" id="select12">
            <option value="2" <?php if (!(strcmp(2, $seg12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter12" id="select13">
            <option value="2" <?php if (!(strcmp(2, $ter12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar12" id="select14">
            <option value="2" <?php if (!(strcmp(2, $quar12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin12" id="select15">
            <option value="2" <?php if (!(strcmp(2, $quin12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex12" id="select16">
            <option value="2" <?php if (!(strcmp(2, $sex12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab12" id="select17">
            <option value="2" <?php if (!(strcmp(2, $sab12))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab12))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>13:00 as 14:00</strong></td>
          <td><select name="seg13" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter13" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar13" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin13" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex13" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab13" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab13))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab13))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>14:00 as 15:00</strong></td>
          <td><select name="seg14" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter14" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar14" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin14" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex14" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab14" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab14))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab14))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>15:00 as 16:00</strong></td>
          <td><select name="seg15" id="select12">
            <option value="2" <?php if (!(strcmp(2, $seg15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter15" id="select13">
            <option value="2" <?php if (!(strcmp(2, $ter15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar15" id="select14">
            <option value="2" <?php if (!(strcmp(2, $quar15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin15" id="select15">
            <option value="2" <?php if (!(strcmp(2, $quin15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex15" id="select16">
            <option value="2" <?php if (!(strcmp(2, $sex15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab15" id="select17">
            <option value="2" <?php if (!(strcmp(2, $sab15))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab15))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          
          <td><strong>16:00 as 17:00</strong></td>
          <td><select name="seg16" id="seg16">
            <option value="2" <?php if (!(strcmp(2, $seg16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter16" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar16" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin16" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex16" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab16" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab16))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab16))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>17:00 as 18:00</strong></td>
          <td><select name="seg17" id="seg17">
            <option value="2" <?php if (!(strcmp(2, $seg17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter17" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar17" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin17" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex17" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab17" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab17))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab17))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>18:00 as 19:00</strong></td>
          <td><select name="seg18" id="select12">
            <option value="2" <?php if (!(strcmp(2, $seg18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter18" id="select13">
            <option value="2" <?php if (!(strcmp(2, $ter18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar18" id="select14">
            <option value="2" <?php if (!(strcmp(2, $quar18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin18" id="select15">
            <option value="2" <?php if (!(strcmp(2, $quin18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex18" id="select16">
            <option value="2" <?php if (!(strcmp(2, $sex18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab18" id="select17">
            <option value="2" <?php if (!(strcmp(2, $sab18))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab18))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>19:00 as 20:00</strong></td>
          <td><select name="seg19" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter19" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar19" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin19" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex19" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab19" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab19))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab19))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>20:00 as 21:00</strong></td>
          <td><select name="seg20" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter20" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar20" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin20" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex20" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab20" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab20))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab20))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>21:00 as 22:00</strong></td>
          <td><select name="seg21" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter21" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar21" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin21" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex21" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab21" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab21))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab21))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
        <tr align="center">
          <td><strong>22:00 as 23:00</strong></td>
          <td><select name="seg22" id="select18">
            <option value="2" <?php if (!(strcmp(2, $seg22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $seg22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="ter22" id="select19">
            <option value="2" <?php if (!(strcmp(2, $ter22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $ter22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quar22" id="select20">
            <option value="2" <?php if (!(strcmp(2, $quar22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quar22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="quin22" id="select21">
            <option value="2" <?php if (!(strcmp(2, $quin22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $quin22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sex22" id="select22">
            <option value="2" <?php if (!(strcmp(2, $sex22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sex22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          <td><select name="sab22" id="select23">
            <option value="2" <?php if (!(strcmp(2, $sab22))) {echo "selected=\"selected\"";} ?>>Não</option>
            <option value="1" <?php if (!(strcmp(1, $sab22))) {echo "selected=\"selected\"";} ?>>Sim</option>
          </select></td>
          </tr>
      </table></td>
      </tr>
    <tr>
      <td colspan="4" align="left">
    <?php if($supervisor!="S"){ ?>
      <input type="submit" name="Salvar" id="Salvar" value="Salvar" onclick="" />
        <input type="reset" name="button2" id="button2" value="Limpar" />
        <?php } ?>
        <?php if (isset($_GET['cod'])){ ?>
        <input name="cod" type="hidden" id="cod" value="<?php echo $cod ;?>" />
        <?php } ?>
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao; ?>" /></td>
      <td><input name="validacao" type="hidden" id="validacao" value="0" /></td>
    </tr>
    </table>
  </td>
  </form>
<p>&nbsp;</p>
</form>
</body>
<?php
include "footer.html";
?>
</html>    