<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
error_reporting(0); 
if(!isset($_SESSION)) 
{ session_start(); } 

if ($_SESSION['logado'] == 1) {
  
  //header ("Location: index.php");  
  }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Sala de Aula - Mapeamento</title>

<?php
include ("conexao.php"); 

$codigoetec=$_POST['codigoetec'];
$nomeetec=$_POST['nomeetec'];
$municipioetec=$_POST['municipioetec'];
$salasexistentes=$_POST['salasexistentes'];
$salasmanha=$_POST['salasmanha'];
$salastarde=$_POST['salastarde'];
$salasnoite=$_POST['salasnoite'];
$salasmanhasabado=$_POST['salasmanhasabado'];
$salastardesabado=$_POST['salastardesabado'];

$sql ='INSERT INTO saladeaula (
idcadastrosaladeaula,
codigoetec,
nomeetec,
municipioetec,
salasexistentes,
salasmanha, 
salastarde, 
salasnoite, 
salasmanhasabado,
salastardesabado
) VALUES (
 null, 
'.$codigoetec.',
'.$nomeetec.',
'.$municipioetec.',
'.$salasexistentes.', 
'.$salasmanha.',
'.$salastarde.',
'.$salasnoite.',    
'.$salasmanhasabado.',
'.$salastardesabado.')';

if ($_POST['codigoetec']){
mysql_query($sql) or die(mysql_error());  
}
?>

<body>


<?php
include ("topo.php");
include("testemenu.php");
include ("menu.php");  
 ?>

<br><br><br><br><br>
<b> Salas de Aula na unidade de Ensino </b><br><br><br>
            
<form name="saladeaula" method="POST" action="#">
  
  
  CÓDIGO ETEC: <input type="text" name="codigoetec"/><br><br>
  ETEC: <input type="text" name="nomeetec"/><br><br>
  MUNICÍPIO: <input type="text" name="municipioetec"/><br><br><br><br>
  Quantidade de salas de aulas existentes na U.E.: <input type="text" name="salasexistentes"/><br><br>
  Quantidade de salas de aulas utilizadas no periodo da manhã: <input type="text" name="salasmanha"/><br><br>
  Quantidade de salas de aulas utilizadas no periodo da tarde: <input type="text" name="salastarde"/><br><br>
  Quantidade de salas de aulas utilizadas no periodo da noite: <input type="text" name="salasnoite"/><br><br>
  Quantidade de salas de aulas utilizadas no periodo da manhã aos sabádos: <input type="text" name="salasmanhasabado"/><br><br>
  Quantidade de salas de aulas utilizadas no periodo da tarde aos sabádos: <input type="text" name="salastardesabado"/><br><br>
  <input type="submit" value="SALVAR" />


  <?php include "footer.html"; ?>
<p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>