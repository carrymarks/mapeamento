<?php

if(isset($_POST["txt_etec"])){
$etec=$_POST["txt_etec"];	}

if(isset($_GET['us'])){
$us=$_GET['us'];	
	}
	
	echo $us;

header("Location:listaequipamento.php?us=$us&etec=$etec");

?>