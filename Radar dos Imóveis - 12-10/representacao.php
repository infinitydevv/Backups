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
        <h1 class="hh1 text-center">COMPRA E VENDA</h1>
        <p class="texto-laranja">Os corretores do Radar dos Imóveis são especializados na compra e venda de imóveis residenciais, comerciais e rurais e lhe prestam toda a segurança no momento da negociação.</p>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h1  class="hh1 text-center">SE A SUA NECESSIDADE FOR COMPRAR</h1>
                <p class="texto-laranja">Selecione um município e escolha o imóvel da sua preferência entre as ofertas. Verifique que cada 
                município possui um corretor responsável pelo atendimento. Contate-o, agende uma vista ao imóvel e abra 
                as negociações. Caso não encontre o imóvel desejado, contate o corretor e solicite a busca de um novo 
                imóvel que atenda as suas necessidades.</p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h1 class="hh1 text-center">SE A SUA NECESSIDADE FOR VENDER</h1>
                <p class="texto-laranja">Indique a cidade onde deseja vender e envie mensagem ao corretor para disponibilizar sua oferta no 
                Radar dos Imóveis.</p>
            </div>
        </div>
        <div class="text-center">
            <h1 class="hh1">O QUE VOCÊ DESEJA?</h1>
            <a href="index.php" class="btn btn-warning btn-lg">Comprar</a><span  class="hhh1"> ou </span>
            <a href="formulariovenda1.php" class="btn btn-warning btn-lg">Vender</a>
        </div>
    </div>
        <!-- footer.php e footer.css no head -->
        <?php include('footer.php'); ?>
       <!-- FIM footer.php e footer.css no head -->
</body>
</html>
