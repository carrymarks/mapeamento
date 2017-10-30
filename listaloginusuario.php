<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
  
  header ("Location: index.php");
  
  
  
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Login - Mapeamento</title><?php
if(!isset($_GET['us'])){
  header ("Location: index.php");
             } 
  ?>
<?php
include"topo.php";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body,td,th {
  font-family: Times New Roman, Times, serif;
  color: #666;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="933" border="0">
    <tr align="center" bgcolor="#D6D6D6">
      <td width="277"><strong>Etec</strong></td>
      <td width="174"><strong>Login</strong></td>
      <td width="179"><strong>Nível de Acesso</strong></td>
      <td><strong>Ação</strong></td>
    </tr>
    <?php   
  $sql="select * from tbl_usuario where `PK_Login`='$us' order by Login";
  $comando=mysql_query($sql);
  $us= base64_encode($us);  
  while($linha=mysql_fetch_array($comando)){
  
  ?>
    <tr align="center">
      <?php 

$fketec=$linha["FK_Etec"];
mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

  $sqletec="select * from tbl_etec where`PK_CodEtec`='$fketec'";
  $comandoetec=mysql_query($sqletec);
  $linhaetec=mysql_fetch_array($comandoetec);
  mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
    
  ?>
      <td><?php echo $linhaetec["Etec"];?></td>
      <td><?php echo $linha["Login"];?></td>
      <td><?php echo $linha["Nivel_Acesso"];?></td>
      <td><strong><a href="frm_loginusuario.php?us=<?php echo $us?>&amp;acao=edt&amp;cod=<?php echo $linha['PK_Login'] ; ?>"><img src="editar.gif" alt="" width="36" height="36" /></a></strong></td>
    </tr>
    <?php } ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>