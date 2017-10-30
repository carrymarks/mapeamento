<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cursos - Mapeamento</title>
</head>

<body>
<?php include ("conexao.php");


if(isset($_GET['espaco'])){
$espaco=$_GET['espaco'];	}

?>
<table width="200" border="0" align="center">
  <tr bgcolor="#d6d6d6">
    <td align="center"><strong>Curso</strong></td>
  </tr>
  <?php 
$sql="select * from tbl_espaco_curso where FK_espaco='$espaco'";
$query=mysql_query($sql);
while($linha=mysql_fetch_array($query)){
$curso=$linha['FK_curso'];

$cursosql="select * from tbl_curso where PK_CodCurso='$curso'";
$cursoqry=mysql_query($cursosql);
$linhacurso=mysql_fetch_array($cursoqry);
?>
  <tr align="center">
    <td><?php echo $linhacurso['Nome_Curso'];?></td>
  </tr><?php } ?>
</table>
</body>
</html>