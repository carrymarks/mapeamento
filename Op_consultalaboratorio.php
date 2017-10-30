<?php
if(isset($_GET['us'])){?><?php 
if (isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_POST["txt_consultafisico"]))
$pesquisaa=$_POST["txt_consultafisico"];

	 	 if(!isset($_SESSION)) 
{ 
session_start(); 

} 

	 $_SESSION['pesquisa']=$pesquisaa;
	 	 $us= base64_encode($us);
header ("Location: listaconsultalaboratorio.php?us=$us"); 



?><?php }else{ header ("Location: index.php");} ?>