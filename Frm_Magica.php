<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="Mágica" />
<?php 
include "conexao.php";

$sqlesp="select * from tbl_espaco_fisico";
$qryesp=mysql_query($sqlesp);
while($line=mysql_fetch_array($qryesp)){
echo $line['PK_CodLaboratorio'];

$sql="SELECT COUNT( FK_curso ) as total FROM  `tbl_espaco_curso` INNER JOIN tbl_espaco_fisico ON tbl_espaco_curso.FK_espaco = tbl_espaco_fisico.PK_CodLaboratorio WHERE tbl_espaco_curso.FK_espaco =".$line['PK_CodLaboratorio'];
$qry=mysql_query($sql);
while($linha=mysql_fetch_array($qry)){
echo $tot=$linha['total'];	



$sqlEspaco="Update tbl_espaco_fisico set quantidade_curso='$tot' where PK_CodLaboratorio=".$line['PK_CodLaboratorio'];
mysql_query($sqlEspaco)or die(mysql_error());
	

}

}
 ?> 
</form>
</body>
</html>