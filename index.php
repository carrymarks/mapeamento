<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GFAC - Mapeamento 2017 | CEETEPS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!--Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php
session_start();	
$_SESSION['logado'] = 1;
?>

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
        <form class="form-inline justify-content-end" id="form-login" name="form-login" method="post" action="Op_Login.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Login" aria-label="Login" required
            name="txt_usuario" id="txt_usuario" title="e-mail corporativo: @centropaulasouza e/ou @etec – “informe aqui o seu e-mail de contato”">
          <input class="form-control mr-sm-2" type="password" placeholder="Senha" aria-label="Senha" required
            name="txt_senha" id="txt_senha" title="Alfanumérica (letras e números) – 8 caracteres – “informe aqui a sua senha”">
          <input class="btn btn-default" type="submit" value="Entrar">
        </form>
      </div>
    </div>

    <?php include_once("home.html"); ?>

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
