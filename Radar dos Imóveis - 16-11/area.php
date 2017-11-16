<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
    <title>Radar dos Imóveis</title>
    <!-- CSS da página --><link href="css/area.css" rel="stylesheet">
    <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <!-- Biblioteca CSS para animação da logo --><link rel="stylesheet" href="css/animate.css">
    <link rel="icon" href="img/logo.png">
      <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?php 
    @session_start();
    require "login/functions.php";
    require "login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=login.php'/>";
      exit;
    }
    ?>
  </head>
  <body>
    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('navbar-area.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 bloco-left">
        <div class="row">
          <div class="col-xs-12">
            <div class="row center-block">
              <div class="col-xs-12 col-md-12 ">
                <div class="photo-avatar center-block">
                  <?php
                  echo "
                    <img src='usuario/fotos/".$imgusu."' class='photo-avatar center-block'>";
                  ?>
                </div>
              </div>
              <div class="col-xs-12 col-md-12">
                <p class="text-center">Seja bem vindo, <?php echo $logado . "."?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 hehe">
            <h4>Principais funções</h4>
          </div>
          <div class="col-xs-12 func">
            <ul>
              <li>
                <a href="radardosimoveis.com.br"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
              </li>
              <li>
                <a href="imoveis/index.php"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Imóveis</a>
              </li>
              <li>
                <a href="usuario/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuários</a>
              </li>
              <li>
                <a href="imoveis/index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Captador</a>
              </li>
              <li>
                <a href="mensagem/index.php"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagem</a>
              </li>
              <li>
                <a href="clientecomprador/index.php"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Cliente Comprador</a>
                </a>
              </li>
              <li>
                <a href="clientevendedor/index.php"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Cliente Vendedor</a>
                </a>
              </li>
              <li>
                <a href="uploadDocumentos/"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Documentos</a>
                </a>
              </li>
              <li>
                <a href="login/deslogar.php"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 bloco">

        <div class="row">
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="imoveis/index.php"><img src="img/icons/imovel-icon.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Imóveis</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="usuario/index.php"><img src="img/usuario.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Usuários</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="captador/index.php"><img src="img/captador.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Captador</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="mensagem/index.php"><img src="img/icons/mensagem.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Mensagem</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="clientecomprador/index.php"><img src="img/icons/comprador-icon.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Cliente Comprador</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
           <a href="clientevendedor/index.php"><img src="img/icons/vendor-icon.png" class="center-block img-icons"></a>
           <figcaption class="text-center text-fig">Cliente Vendedor</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="uploadDocumentos/"><img src="img/icons/upload-icon.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Documentos</figcaption>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-3 caixa">
            <a href="login/deslogar.php"><img src="img/icons/sair-icon.png" class="center-block img-icons"></a>
            <figcaption class="text-center text-fig">Sair</figcaption>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="laranja">
      <h3 class="text-center">Desenvolvido por </h3>
      <a href="infinitydev/index.html"><img src="infinitydev/img/logo-InfinityDev.png" class="center-block" width="120" height="auto"></a>
  </footer>
  </body>
</html>
