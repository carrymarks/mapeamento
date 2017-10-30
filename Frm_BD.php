<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 


if(!isset($_SESSION)) 
{ session_start(); 
unset($_SESSION['dados_equipamento']);
} 

if ($_SESSION['logado'] == 1) {
  
  header ("Location: index.php");

  
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Home - Mapeamento</title>
<?php
include "conexao_Geral.php";
include "topo.php";
include("testemenu.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Mapeamento</title>
<style type="text/css">
<!--
h2 {
  font-size: 9px;
}
-->
</style></head>
<body>
<?php 




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

include "menu_usuario.php";
  }else{  
//echo "$us"; 
$us=base64_decode($us);

include ("menu.php");  

    }  
?>
<?php 
$usr=$_REQUEST['usr'] ;
$sqle="select * from tbl_etec where PK_CodEtec='$etec'";

$comandoe=mysql_query($sqle);
$linhae=mysql_fetch_array($comandoe);


if(isset($_POST['txt_situacao'])){
$periodo=$_POST['txt_situacao'];

echo '<script>location.href="home.php?us='.$us.'&usr='.$usr.' ";</script>';

}else{
$periodo=""; 

}



$_SESSION['periodo']=$periodo;

?>


<br>
<form action="Frm_BD.php?us=<?php echo $us; ?>&usr=<?php echo $usr; ?>" method="post">

<label for="txt_situacao">Selecione o período a ser utilizado</label>
        <select name="txt_situacao" id="txt_situacao">
          <option value="2012" <?php if (!(strcmp(0, $situacao))) {echo "selected=\"selected\"";} ?>>Mapeamento 2012</option>
          <option value="2013">Mapeamento 2013/2014</option>
            <option value="2015">Mapeamento 2015</option>
            <option value="2015">Mapeamento 2016</option>
</select>
      <br>

      <input type="submit" value="Selecionar" />
</form>

</body>
<?php 

include "footer.html";
?>


</html>