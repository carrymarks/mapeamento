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
<title>Relatório Laboratório por Curso - Mapeamento</title>
<?php 
include "conexao.php";
include "topo.php";
include "testemenu.php";

if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['cod']))
$cod=$_GET['cod'];

$curso='';

$us= base64_decode($us);
$sqlp="select * from tbl_usuario where PK_Login='$us'";
$comandopesquisa=mysql_query($sqlp);
$linhap=mysql_fetch_array($comandopesquisa);
$medio=$linhap['Nivel_Acesso'];
$usu=$linhap['FK_Etec'];
$us=base64_encode($us);	
if($medio=="Administrador"){

include ("menu.php");

	}else{
$us=base64_encode($us);
include ("menu_usuario.php");

		}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<form id="form1" name="form1" method="post" action="op_relatoriocurso.php?us=<?php //$us= base64_decode($us); 
echo $us ?>">
  <table width="933" border="0" align="center">
    <tr>
      <td width="926" align="center"><strong>Relatório Laboratório por Curso</strong></td>
    </tr>
    <tr>
      <td align="left"><strong>Curso</strong></td>
    </tr>
    
    <tr>
      <td align="left"><label>
        <select name="txt_curso" id="txt_curso">
          <option value=""></option>
          <?php 
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
	$sql="select * from tbl_curso order by Nome_Curso";
	$comando=mysql_query($sql);
	while($linha=mysql_fetch_array($comando)){
	?>
          <option value="<?php echo $linha['PK_CodCurso']?>"<?php if (!(strcmp($linha['PK_CodCurso'],$curso))) {echo "selected=\"selected\"";} ?>><?php echo $linha['Nome_Curso']?></option>  
          <?php }?>
          </select>
        
      </label></td>
    </tr>
    <tr>
      <td align="left"><input type="submit" name="Relatório" id="Relatório" value="Pesquisar" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
<?php include "footer.html";?>
</html>