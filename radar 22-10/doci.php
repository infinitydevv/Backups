<?php
 include"conectar.php";
 ini_set('default_charset','UTF-8');
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
    <!-- CSS da página --><link href="css/representacao.css" rel="stylesheet">
    <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
    <!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Biblioteca CSS para animação da logo --><link rel="stylesheet" href="css/ animate.css">
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


    <!-- BOTÃO PIXADO WHATSAPP -->
    <a href="https://api.whatsapp.com/send?phone=5551995513505" target="_blank" class="btn-fixado section-hide"><button type="button" class="btn btn-success btn-circle btn-lg"><img src="img/whats.png" class="right-block wpp"></button></a>
    <!-- BOTÃO PIXADO WHATSAPP -->


    <div class ="container principal">
        <h1 class="hh1 text-center">AVALIAÇÃO DE IMÓVEIS</h1>
        <p class="texto-laranja">O Radar dos Imóveis possui corretores com formação específica e registro no Cadastro 
                    Nacional de Avaliadores de Imóveis – CNAI para realizar a avaliação do seu imóvel. Se a sua necessidade for vender, mas está inseguro sobre o quanto vale o seu imóvel 
                    ou se deseja comprar, mas quer saber se o preço está de acordo com o mercado, chame o 
                    Radar dos Imóveis.</p>
        <div class="text-center">
            <h1 class="hh1">AGENDE UM CONTATO</h1>
            <a href="formularioavaliacao.php" class="btn btn-warning btn-lg">Solicite Contato</a>
        </div>
    </div>
        <!-- footer.php e footer.css no head -->
        <?php include('footer.php'); ?>
       <!-- FIM footer.php e footer.css no head -->
</body>
</html>