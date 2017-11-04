<!DOCTYPE html>
<?php 

include "conexao_Geral.php";

error_reporting(0);
ini_set("display_errors", 0 );

if(!isset($_SESSION)) { 
  session_start(); 
  unset($_SESSION['dados_equipamento']);
} 

$logado = $_SESSION['logado'];
if ($logado == 1) {
  header ("Location: index.php");
}

$us   = $_GET['us'];
$usr  = $_GET['usr'];

?>

<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GFAC - Mapeamento 2017 | CEETEPS - Protocolos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!--Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">
    <!-- container -->
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <img class="img-responsive" src="assets/img/eteclogo.png" alt="">
      </div>
      <div class="col-md-4 col-sm-4">
        <img class="img-responsive" src="assets/img/logocps.png" alt="">
      </div>
      <div class="col-md-4 col-sm-4">
        <img class="img-responsive" src="assets/img/logo_estado_sp.png" alt="">
      </div>
    </div>

    <div class="row header">
      <div class="col-md-6">
        <h4 class="alert-heading">SISTEMA DE MAPEAMENTO DE LABORATÓRIOS</h4>
      </div>
      <div class="col-md-6 form-login">
        <form class="form-inline">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Usuário</div>
              <input type="text" class="form-control" id="exampleInputAmount" value="<?php echo $usr; ?>" readonly>
            </div>
          </div>
          <a href="index.php" class="btn btn-primary btn-sm">SAIR</a>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
          <?php
            if ($usr == "Administrador") {
              echo "PROTOCOLOS";
            } else {
              echo "PROTOCOLAR";
            }
          ?>
          <a href="<?php echo "home.php?us=$us&usr=$usr"; ?>" class="btn btn-primary btn-xs pull-right">VOLTAR</a>
      </div>
      <?php
          $page = 'protocolo-register.php';
          if ($usr == "Administrador") {
            $page = 'protocolo-list.php';
          }
          include_once($page);
      ?>
    </div>

    <div class="bar_menu footer">
      <h5>Sistema de Mapeamento de Laboratórios | 2017 | GFAC</h5>
    </div>

    <!-- finish container -->

    <script src="assets/js/jquery-3.1.0.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost +
			"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-3595013-1");
		pageTracker._initData();
		pageTracker._trackPageview();
	</script>

</body>

</html>
