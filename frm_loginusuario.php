
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Login - Mapeamento</title>

<?php include"topo.php";
include("testemenu.php");
include "conexao.php";




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

<script type="text/javascript">
<!--
function achei(){
	var nivel= document.getElementById('txt_nível');
	valor = nivel.options[nivel.selectedIndex].value;
	
	if (valor !="Administrador"){
document.getElementById('txt_nível').style.visibility ='hidden';
document.getElementById('nivel').style.visibility ='hidden';	
		}
			   
}
	</script>
   <?php 
$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$fketec=$linhap['FK_Etec'];
;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

body,td,th {
	color: 666;
}

</style></head>

<body onload="achei()">
<?php


if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];

$acao=$_GET['acao'];


if ($acao!="adc"){
$sql="select * from tbl_usuario where PK_Login = $cod ";
$conect=mysql_query($sql) ;
$linha=mysql_fetch_array($conect);
$login=$linha['Login'];
$senha=$linha['Senha'];
$eteclogin=$linha['FK_Etec'];
$nivel=$linha['Nivel_Acesso'];
}else{
$login='';
$senha='';
$eteclogin='';	
$nivel='';
	}

?>
<form id="form1" name="form1" method="post" action="Op_Cadastrologinetec.php?us=<?php $us= base64_decode($us); echo $us ?>">
  <table width="933" border="0" align="center">
    <tr bgcolor="#FFFFFF">
      <td width="934" align="left" bgcolor="#CCCCCC"><strong>Cadastro Login Etec</strong></td>
    </tr>
    <tr align="left">
      <td><strong>Etec</strong></td>
    </tr>
    <tr align="left">
      <td><strong>
        <select name="Etec" id="Etec" >
          <?php 
		   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		  $sql="select * from tbl_etec where `PK_CodEtec`='$fketec'";
		  $comando=mysql_query($sql);
		  $linha=mysql_fetch_array($comando);
		  ?>
          <option value="<?php echo $linha['PK_CodEtec']?>"<?php if (!(strcmp($linha['PK_CodEtec'],$eteclogin))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Etec']?></option>
        </select>
      </strong></td>
    </tr>
    <tr align="left">
      <td><strong>Login</strong></td>
    </tr>
    <tr align="left">
      <td><label>
        <input name="txt_loginetec" type="text" id="txt_loginetec" value="<?php echo $login;?>" />
      </label></td>
    </tr>
    <tr align="left">
      <td><strong>Senha</strong></td>
    </tr>
    <tr align="left">
      <td><label>
        <input name="txt_senhaetec" type="text" id="txt_senhaetec" value="<?php echo $senha;?>" />
      </label></td>
    </tr>
    <tr align="left">
      <td><table width="200" border="0" id="nivel">
          <tr>
            <td><strong>Nível de Acesso</strong></td>
          </tr>
      </table></td>
    </tr>
    <tr align="left">
      <td><label>
        <select name="txt_nível" id="txt_nível" onchange="achei()">
          <option value="Comum" <?php if (!(strcmp("Comum", $nivel))) {echo "selected=\"selected\"";} ?>>Comum</option>
          <option value="Administrador" <?php if (!(strcmp("Administrador", $nivel))) {echo "selected=\"selected\"";} ?>>Administrador</option>
  </select>
      </label></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="button" id="button" value="Salvar" />
        <input name="acao" type="hidden" id="acao" value="<?php echo $acao ?>" />
      <input name="cod" type="hidden" id="cod" value="<?php echo $cod ?>" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
<?php 
include "footer.html";
?>
</html>

