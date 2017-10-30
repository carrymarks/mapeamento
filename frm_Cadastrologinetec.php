<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
	
	header ("Location: index.php");
	
	
	
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Cadastro Login - Mapeamento</title><?php
?><?php include"topo.php";
include("testemenu.php");
include "menu.php";
;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<?php
include "conexao.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];

$acao=$_GET['acao'];


if ($acao!="adc"){
$sql="select * from tbl_usuario where PK_Login = '$cod' ";
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
<form id="form1" name="form1" method="post" action="Op_Cadastrologinetec.php?us=<?php echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td width="930" align="center" bgcolor="#CCCCCC"><strong>Cadastro Login Etec</strong></td>
    </tr>
    <tr align="left">
      <td><strong>Etec</strong></td>
    </tr>
    <tr align="left">
      <td><strong>
        <select name="Etec" id="Etec">
          <?php 
		   mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
		  $sql="select * from tbl_etec order by Etec";
		  $comando=mysql_query($sql);
  while($linha=mysql_fetch_array($comando)){
		  ?>
          <option value="<?php echo $linha['PK_CodEtec']?>"<?php if (!(strcmp($linha['PK_CodEtec'],$eteclogin))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Etec']?></option>
          <?php } ?>
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
        <input name="txt_senhaetec" type="password" id="txt_senhaetec" value="<?php echo $senha;?>" />
      </label></td>
    </tr>
    <tr align="left">
      <td><strong>Nível de Acesso</strong></td>
    </tr>
    <tr align="left">
      <td><label>
        <select name="txt_nível" id="txt_nível">
          <option value="Administrador" <?php if (!(strcmp("Administrador", $nivel))) {echo "selected=\"selected\"";} ?>>Administrador</option>
          <option value="Comum" <?php if (!(strcmp("Comum", $nivel))) {echo "selected=\"selected\"";} ?>>Usuário Comum</option>
          <option value="Supervisor" <?php if (!(strcmp("Supervisor", $nivel))) {echo "selected=\"selected\"";} ?>>Supervisor</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="Salvar" />
        <input name="acao" type="hidden" id="acao" value="<?php if(isset($_GET['acao'])){ $acao=$_GET['acao']; echo $acao; } ?>" />
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

