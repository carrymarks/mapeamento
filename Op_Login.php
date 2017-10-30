<?php 


error_reporting(0);
ini_set("display_errors", 0 );


include "conexao.php";

if (isset ($_POST["txt_usuario"])) 
$usuario = $_POST["txt_usuario"];

if (isset ($_POST["txt_senha"])) 
$senha = $_POST["txt_senha"];

if (isset($_GET['cod']))
$cod=$_GET['cod'];


if (($senha=='')and($usuario=='')){

	header ("Location: index.php");
	
	}else{

$busca = "SELECT * FROM tbl_usuario WHERE login='$usuario'";
					$result= mysql_query($busca);
					$linha = mysql_fetch_array($result);	
$us=$linha["PK_Login"];					
	
	
if ($usuario ==$linha["Login"]  && $senha == $linha["Senha"] )	
{
//aqui vai entrar a novidade, antes de redirecionarmos
//vamos salvar algumas informações para utilizar depois
if(!isset($_SESSION)) 
{ session_start(); } 



$sqldata="select max(PK_Abertura) from tbl_abertura";
$qrydata=mysql_query($sqldata);
$linhadata=mysql_fetch_array($qrydata);




$sqldata2="select * from tbl_abertura where PK_Abertura=".$linhadata[0];
$qrydata2=mysql_query($sqldata2);
$linhadata2=mysql_fetch_array($qrydata2);

$datahoje=date('Y-m-d');

$busca2 = "SELECT * FROM tbl_usuario WHERE PK_Login='$us'";
					$result2= mysql_query($busca2);
					$linha2 = mysql_fetch_array($result2);

$_SESSION['logado']=2;
$us= base64_encode($us);
//$us= base64_decode($us);



if(($linha2['Nivel_Acesso']=='Comum')){

if($datahoje <= $linhadata2['Data_Fim'] or $linhadata2['Data_Fim']=='0000-00-00'){
 header ("Location: home.php?us=$us");
}else{
 echo "<script>alert('Sistema temporariamente fechado!');location.href='index.php';</script>";
}

		}else{
            $usr=$linha['Login'];
            $_SESSION['user']=$usr;
header ("Location: Frm_BD.php?us=$us&usr=$usr");			
		}



}
//senao
else
{
//exiba um alerta dizendo que a senha esta errada

if(!isset($_SESSION)) 
{ session_start(); } 

$_SESSION['logado']=1;

$_SESSION['usuario']=$usuario;

header ("Location: index.php");
}
					
					
								
	}





?>