<?php
 @session_start();
    require "login/functions.php";
    require "login/functions-cliente.php";
    if(isLoggedIn()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Administrador!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=area.php' />";
      exit;
    }else if(isLoggedInCli()){
      echo"<meta http-equiv='refresh' content='0; url=area-cliente.php' />";
      exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
    <title>Radar dos Imóveis</title>
    <!-- CSS da página --><link href="css/login.css" rel="stylesheet">
    <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
    <!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Biblioteca CSS para animação da logo --><link rel="stylesheet" href="css/animate.css">
    <link rel="icon" href="img/logo.png">
      <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('navbar-top.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->

    <div class="container">
      <div class="bloco center-block">
        <div class="row">
          <div class="col-xs-12">
            <img src="img/logo.png" class="center-block" alt="Radar dos Imóveis" title="" width="150" height="150" />
          </div>
          <div class="col-xs-12">
            <h1 class="text-center sombra-texto">Redefinição de senha</h1>
          </div>
        </div>
        <div class="bloco-login">
        	<form id="log" name="logar" method="POST" action="login/esqueci-senha-cliente.php">
    			  <div class="form-group">
    			    <label for="email">Digite seu e-mail:</label>
    			    <input type="text" class="form-control" name="email" id="email" placeholder="exemplo@radardosimoveis.com.br">
    			  </div>
    			  <div class="form-group text-right">
              <input type="submit" value="Enviar" class="btn btn-warning btn-lg" id="btnEnviar">
    			  </div>
            <!--<div class="col-xs-12 ">
    	        <div class="g-recaptcha" data-sitekey="6Lee4DAUAAAAAKwcMwgGcD45nh9RD7sOB0udZv76"></div>
    				</div>-->
          </form>
        </div>
      </div>
    </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- footer.php e footer.css no head -->
    <?php include('footer.php'); ?>
    <!-- FIM footer.php e footer.css no head -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>