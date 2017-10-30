<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");	
	}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento - Suporte</title>
<?php 
include "topo.php";
include("testemenu.php");



?>
</head>

<body><?php
include "conexao.php";

if(isset($_GET["acao"]))
$acao=$_GET["acao"];

if(isset($_GET['cod'])){
$cod=$_GET['cod'];	
	}

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
		
if($acao!="adc"){
$sql="select * from tbl_suporte where PK_CodSuporte='$cod'";
$comando=mysql_query($sql);
$linha=mysql_fetch_array($comando);

$ocorrencia=$linha['Erro'];
$assunto=$linha['Assunto'];
$mensagem=$linha['Mensagem'];
$email=$linha['Email'];
$situacao=$linha['Situacao'];
$dataenviado=$linha['Data_Enviado'];
$dataanalise=$linha['Data_Analise'];
$datarespondido=$linha['Data_Respondido'];
	}else{
$ocorrencia='';
$assunto='';
$mensagem='';	
$email='';
$situacao='';
$dataenviado='';
$dataanalise='';
$datarespondido='';
	}
		
?>

<form id="form1" name="form1" method="post" action="op_suporte.php?us=<?php $us=base64_decode($us); echo $us;?>">
  <table width="933" border="0">
    <tr>
      <td colspan="2">&nbsp;</td>
      <td><strong>Suporte </strong></td>
    </tr>
      <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
      <tr>
      <td>&nbsp;</td>
      <td><?php  

      echo "<b>Situação:</b>";

        

       ?> </td>
      <td><?php 
    if($medio!="Administrador"){ 
        if($situacao=='0'){
      echo "<b>Em análise</b>";
        }else if($situacao=='1'){
      echo "<b>Respondido para o e-mail informado</b>";
        }else{
      echo "<b>".$situacao."</b>"; 
        }
    }else{   
      ?>
      <label for="txt_situacao"></label>
        <select name="txt_situacao" id="txt_situacao">
          <option value="0" <?php if (!(strcmp(0, $situacao))) {echo "selected=\"selected\"";} ?>>Em análise</option>
          <option value="1" <?php if (!(strcmp(1, $situacao))) {echo "selected=\"selected\"";} ?>>Respondido para o e-mail informado</option>
      </select>

      <?php
    }
       ?></td>
    </tr>
    <tr>
      <td width="49">&nbsp;</td>
      <td width="122" align="left"><strong>Local do Ocorrido</strong></td>
      <td width="748" align="left"><label>
        <input name="txt_erro" type="text" id="txt_erro" value="<?php echo $ocorrencia;?>" />
      </label></td>
    </tr>
  
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Assunto</strong></td>
      <td align="left"><label for="txt_assunto"></label>
        <select name="txt_assunto" id="txt_assunto">
          <option value="0" <?php if (!(strcmp(0, $assunto))) {echo "selected=\"selected\"";} ?>>Funcionamento do Sistema</option>
          <option value="1" <?php if (!(strcmp(1, $assunto))) {echo "selected=\"selected\"";} ?>>Suporte para o Sistema</option>
          <option value="2" <?php if (!(strcmp(2, $assunto))) {echo "selected=\"selected\"";} ?>>Dúvida sobre Preenchimento</option>
          <option value="3" <?php if (!(strcmp(3, $assunto))) {echo "selected=\"selected\"";} ?>>Dúvida sobre o Projeto</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>E-mail</strong></td>
      <td align="left"><label for="txt_assunto"></label>
      <input name="txt_email" type="text" id="txt_email" value="<?php echo $email;?>" />
          </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><strong>Mensagem</strong></td>
      <td align="left"><label>
        <textarea name="txt_mensagem" rows="5" style="width:500px" id="txt_mensagem"><?php echo $mensagem;?></textarea>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left"><label>
      <?php
      if($supervisor==""){  
      ?>
        <input type="submit" name="button" id="button" value="Enviar" />
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao;?>" />
        <?php } if(isset($_GET['cod'])){?><input name="cod" type="hidden" id="cod" value="<?php echo $cod;?>" /><?php } ?>
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table border="1" cellspacing="0" cellpading="0" width="933">
    <tr style="background-color:#D6D6D6;font-family:verdana">
      <td width="615">Situação</td>
      <td width="215">Data</td>
    </tr>
    <tr>
      <td>Enviado</td>
      <td><?php
        $y = substr($dataenviado,0,4); 
        $m = substr($dataenviado,5,2);
        $d = substr($dataenviado,8,2); 
        echo $d."/".$m."/".$y;
       ?></td>
    </tr>
    <tr>
      <td>Em análise</td>
      <td><?php 
        $y2 = substr($dataanalise,0,4); 
        $m2 = substr($dataanalise,5,2);
        $d2 = substr($dataanalise,8,2); 
        echo $d2."/".$m2."/".$y2;
          ?></td>
    </tr>
    <tr>
      <td>Respondido para o e-mail informado</td>
      <td><?php 
        $y3 = substr($datarespondido,0,4); 
        $m3 = substr($datarespondido,5,2);
        $d3 = substr($datarespondido,8,2); 
        echo $d3."/".$m3."/".$y3;
      ?></td>
    </tr>
  </table>
</form>
</body>
</html>