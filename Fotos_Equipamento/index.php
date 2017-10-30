<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mapeamento</title>
</head>
<body>
<!--<table width="100%">-->

<?php
session_start();	
$_SESSION['logado']=1;?>
  <!--<td><?php //include "topo.php";?></td> 
<tr><td><?php // include("menu.php"); ?></td></tr>
<tr><td> 
-->
 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Sistema de Mapeamento</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body >
    
    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		<!-- Teste -->
		<img class="logoHome" src="assets/img/logo.png" width=100 height=77>
		<!-- Teste -->
                <a class="navbar-brand" href=""> <i><font color="#FFFFFF" face="Arial Rounded MT Bold" size="6">Sistema de Mapeamento</font></i></a>
		
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.cpscetec.com.br/mapeamento/index.php">HOME</a></li>
                    <li><a href="services.html">SOBRE</a></li>
                    
                </ul>
            </div>
           
        </div>
    </div>
   <!--/.NAVBAR END-->

        
       <section id="home" class="text-center">

         
                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="assets/img/1.jpg" alt="building1" width=" " height=" "/>
                            <div class="carousel-caption" >
                                <h4 class="back-light">Etec Santa Ifigênia, Santa Ifigênia - Capital.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/2.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light"> Etec de Esportes Curt Walter Otto Baumgart, Parque Novo Mundo.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/4.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec Jorge Street, São Caetano do Sul.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/5.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec Jorge Street, São Caetano do Sul.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/6.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Laboratório do Técnico em Edificações</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/11.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec de Heliópolis.</h4>
                            </div>
                        </div>
                        <!-- <div class="item">
                            <img src="assets/img/8.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/8.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/9.jpg" alt="building1" width=" " height=" " />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/10.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/11.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                       <div class="item">
                            <img src="assets/img/12.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/13.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/14.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>
                         <div class="item">
                            <img src="assets/img/15.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Etec.</h4>
                            </div>
                        </div>-->

                    </div>

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                        <li data-target="#carousel-example" data-slide-to="3"></li>
						<li data-target="#carousel-example" data-slide-to="4"></li>
                        <li data-target="#carousel-example" data-slide-to="5"></li>
                        <li data-target="#carousel-example" data-slide-to="6"></li>
                       <!-- <li data-target="#carousel-example" data-slide-to="7"></li>                        
                        <li data-target="#carousel-example" data-slide-to="8"></li>
                        <li data-target="#carousel-example" data-slide-to="9"></li>
                        <li data-target="#carousel-example" data-slide-to="10"></li>
                        <li data-target="#carousel-example" data-slide-to="11"></li>
                        <li data-target="#carousel-example" data-slide-to="12"></li>
                        <li data-target="#carousel-example" data-slide-to="13"></li>
                        <li data-target="#carousel-example" data-slide-to="14"></li>-->
                    </ol>
                </div>
           
       </section>
    <!--/.SLIDESHOW END-->


        <section id="intro">
            <div class="container">
           <div class="row text-center" >
            <div class="col-md-12">
             
                 <div class="row text-center pad-row  ">
<div class="col-md-4 col-sm-4 ">
                        <img class="img-circle" src="assets/img/team1.png" alt="" />
                           <h3><strong>Datas importantes</strong> </h3>
                       <p>
                                Acompanhe as datas do Sistema de Mapeamento.
                           
                            </p>
                           <!-- <a href="#" class="btn btn-primary" >Clique aqui!</a>-->
                    </div>
                     <div class="col-md-4 col-sm-4 ">
                        <img class="img-circle" src="assets/img/team2.jpg" alt="" />
                           <h3><strong>Instruções iniciais</strong> </h3>
                       <p>
                                Leia o manual do Sistema e assista os tutoriais.
                           
                            </p>
                            <!--<a href="#" class="btn btn-primary" >Clique aqui!</a>-->
                    </div>

                    <div class="col-md-4 col-sm-4 ">
                        <img class="img-circle" src="assets/img/team3.png" alt="" />
                           <h3><strong>Recuperação de Senha</strong> </h3>
                       <p>
                                O Diretor da U.E. deverá encaminhar a solicitação pelo e-mail instituioal para mapeamento@cps.sp.gov.br Assunto Recuperação de Senha. No corpo do e-mail informar Código da U.E., Nome da U.E., Nome Diretor.
                          
                            </p>
                            <!--<a href="#" class="btn btn-primary" >Clique aqui!</a>-->
                    </div>
                      <!--/. <div class="col-md-4 col-sm-4" >
                         <div class="alert alert-success">
                           <div class="skill-name">CLIENT SATISFACTION 100%</div> 
                            <div class="progress progress-striped active progress-adjust">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
                        </div>
                         <div class="alert alert-danger">
                           <div class="skill-name">PERFORMANCE DELIVERED 100%</div> 
                            <div class="progress progress-striped active progress-adjust">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>

                        </div>
                         <div class="alert alert-info">
                           <div class="skill-name">DELIVERY DONE 100%</div> 
                            <div class="progress progress-striped active progress-adjust">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100% Complete</span>
  </div>
</div>
                        </div>
                     </div>
                      
                 </div>
                
            </div>
               
               </div>
        </div>-->
        </section>

    <!--/.INTRO END-->
     <!-- <section id="offer"  >
           <div class="container">
           <div class="row   alert alert-info" >
                 <div class="col-md-8 col-sm-8">
                      <h1>  Download Deatils Now For Latest Offers</h1>
                 </div>
                 <div class="col-md-4 col-sm-4" style="padding-top: 15px;">
                     <a href="#" class=" btn btn-primary btn-lg">GRAB IT HERE NOW</a> 
                 </div>
                          
               </div>
               </div>
      </section>
     -->
      <!--/.OFFFER END-->
        <!-- <section id="just-intro">
             <div class="container">
             <div class="row text-center pad-row">
            <div class="col-md-4  col-sm-4">
                 <i class="fa fa-desktop fa-5x"></i>
                            <h4> <strong>Sure Quique Menu</strong> </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                       <a href="#" class="btn btn-primary" >Read Details</a>    
                </div>
             <div class="col-md-4  col-sm-4">
                 <i class="fa fa-flask  fa-5x"></i>
                            <h4> <strong>Sure Quique Menu</strong> </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                           <a href="#" class="btn btn-primary" >Read Details</a>
                </div>
            <div class="col-md-4  col-sm-4">
                  <i class="fa fa-pencil  fa-5x"></i>
                            <h4> <strong>Sure Quique Menu</strong> </h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                       <a href="#" class="btn btn-primary" >Read Details</a>    
                </div>
                    
            </div>
                 </div>
         </section>
      -->
     <!--/.JUST-INTRO END-->
     <section  class="note-sec" >
         
               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 ">
                <i class="fa fa-quote-left fa-3x"></i>
               <p>
                                Visão Centro Paula Souza - 
                                Consolidar-se como centro de excelência e estímulo ao desenvolvimento 
                                humano e tecnológico, adaptado às necessidades da sociedade.
                            </p>
                </div>
               </div>
            </div>   
           
       </section>
    <!--/.NOTE END-->
     <section id="clients"  >
        
                
            <div class="container">
           <div class="row text-center pad-bottom" >
            <div class="col-md-12">

            	   </td>
   					 </tr>
   					 <tr><td><?php include "frm_login.php"; ?>
    				</td></tr></table>
    				<br>
    				<br>
                <img src="assets/img/clients.png" alt="" class="img-responsive" />
            </div>
               
               </div>
        </div>
        </section>
     <!--/.CLIENTS END-->
    <<section id="footer-sec" >
             
            <div class="container">
           <div class="row  pad-bottom" >
            <div class="col-md-4">
                <h4> <strong>Missão CPS</strong> </h4>
                            <p>
                                Promover a educação profissional pública dentro de referenciais de excelência, 
                                visando ao atendimento das demandas sociais e do mundo do trabalho.
                            </p>
                <a href="http://www.centropaulasouza.sp.gov.br/quem-somos/missao-visao-objetivos-e-diretrizes/" >Leia mais</a>
                </div>
               
               <div class="col-md-4">
                 <!-- <h4> <strong>REDES SOCIAIS</strong> </h4>
                   <p>
                     <a href="#"><i class="fa fa-youtube-square fa-3x"  ></i></a>  
                        <a href="#"><i class="fa fa-twitter-square fa-3x"  ></i></a>  
                        <a href="#"><i class="fa fa-linkedin-square fa-3x"  ></i></a>  
                       <a href="#"><i class="fa fa-instagram-square fa-3x"  ></i></a>  
                   </p>-->
                </div>
               <div class="col-md-4">
                   <h4> <strong>LOCALIZAÇÃO</strong> </h4>
                            <p>
                               GFAC Cetec - Centro Paula Souza, <br />
                               Rua Andradas, 140  <br />
                               São Paulo - 01208-000
                            </p>
                  <!--  <a href="#" class="btn btn-primary" >SEND QUERY</a>
                </div>
                  -->
               </div>
            </div>
    </section>  
           
    <!--/.FOOTER END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

    
    </html>