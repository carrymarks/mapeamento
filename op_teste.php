<?php 

session_start();
$_SESSION['dados_efisico']['quantidade'] = $_POST["txt_quantidade"];

header("Location:Frm_EspacoFisico.php?us=MQ==&acao=adc");

?>