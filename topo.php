<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
h1,h2,h3,h4,h5,h6 {
	font-family: Verdana, Geneva, sans-serif;
}
h1 {
	font-size: 12px;
	color: #FFF;
}
-->
</style></head>
<body>
<table width="857" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="topo.jpg" alt="" width="933" height="129" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#96211A">
        <td><h1><strong>
<?php

date_default_timezone_set( "America/Sao_Paulo" );

	if(!isset($_SESSION)) 
{ 
session_start(); 
} 
if(isset($_GET['codigo'])) 
{ $id= $_GET['codigo'];}
else
$id=1;


?>
          Bem Vindo
          <?php 
		  
		  if (isset($_GET["txt_usuario"])){
  $usuario=  $_SESSION['logado']; 
  echo $usuario;
  }else{
   ?>
          &nbsp;
          <?php 
$hr = date("H:i:s", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mês = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$dia_sem = date("w", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));  

$meses = array( 1=> "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"); 

$semanas = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");

echo "$semanas[$dia_sem], $dia de $meses[$mês] de $ano - $hr";
?>
<?php } ?>
        </strong></h1></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>