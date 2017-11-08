<?php 
    @session_start();
    require "login/functions.php";
    require "login/functions-cliente.php";
    if(isLoggedIn()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Administrador!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=area.php' />";
      exit;
    }else if(isLoggedInCli()){
      $logado = $_SESSION['nomecompleto_cliente'];
      $idcliven = $_SESSION['idcliente'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=login.php'/>";
      exit;
    }
    require_once "mensagem/class/Mensagem.php";
    require_once "conexoes/conexao.php";
    $m = new Mensagem();
    $m->setIdcliven($idcliven);
    $rs = $m->pesquisarImoveis();
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
      <!-- CSS da página --><link href="css/area-cliente.css" rel="stylesheet">
      <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
      <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
      <!-- Bootstrap Core CSS --><link href="css/css/bootstrap.css" rel="stylesheet">
      <link rel="icon" href="../img/logo.png">
        <!-- Custom Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-2 navbar-fixed-top col-lg-2 bloco-left can">
            <div class="row">
              <div class="col-xs-12">
                <div class="row center-block">
               	  <div class="col-xs-12 col-md-12">
                    <h4 class="text-center">Seja bem vindo, <?php echo $logado . "."?></h4>
                  </div>
                  <div class="col-xs-12 col-md-12 ">
                    <div class="photo-avatar center-block">
                      <?php
                      echo "
                        <img src='../usuario/fotos/padrao.jpg' class='photo-avatar center-block'>";
                      ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-12">
                    <h4 class="text-center"><a href="https://api.whatsapp.com/send?phone=5551995513505" target="_blank" class="btn btn-warning">Contate o seu Corretor</a></h4>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 hehe">
                <h4>Principais funções</h4>
              </div>
              <div class="col-xs-12 func">
              <ul>
                  <li>
                    <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                  </li>
                  <li>
                    <a href="index.php#destaqueSem"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Destaques da Semana</a>
                  </li>
                  <li>
                    <a href="usuario/index.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar senha</a>
                  </li>
                  <li>
                    <a href="../login/deslogar.php"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="footer">
                <br>
                <h4 class="text-center"><strong>Desenvolvido por</strong></h4>
                <a href="infinitydev/index.html" target="_blank"><img src="../infinitydev/img/logo-InfinityDev-Fundo-Preto.png" class="center-block" width="100" height="auto"></a>
                <br>
            </div>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 cun">
              <div class="func1">
                <nav class="navbar navbar-default bg-faded" style="background-color: #161616;">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                      <div class="row">
                        <div class="col-xs-12">
                          <div class="row center-block">
                            <div class="col-xs-12 col-md-12 ">
                              <div class="photo-avatar center-block">
                                <?php
                                echo "
                                  <img src='../usuario/fotos/padrao.jpg' class='photo-avatar center-block'>";
                                ?>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-12">
                              <h4 class="text-center">Seja bem vindo, <?php echo $logado . "."?></h4>
                            </div>
                           <div class="col-xs-12 col-md-12">
		                    <h4 class="text-center"><a href="#" class="btn btn-warning">Contate o seu Corretor</a></h4>
		                  </div>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li>
                          <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                          <a href="index.php#destaqueSem"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Destaques da Semana</a>
                        </li>
                        <li>
                          <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar senha</a>
                        </li>
                        <li>
                          <a href="../login/deslogar.php"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a>
                        </li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              </div>
            </div>
          <div class="col-xs-12 col-sm-3 col-md-2">
          </div>
          <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 bloco">
            <h1 class="text-center">Área do Cliente</h1>
            <p class="ps text-center">Consulte as ações empreendidas para venda do seu imóvel.</p>
            <div class="">
          <div class="header-mensagem">
          	<div class="row">
          		<div class="col-xs-12 col-sm-6">
            		<h4>Radar dos Imóveis</h4>
            	</div>
            	<div class="col-xs-12 col-sm-6 ">
            		<h4><strong>Selecione o imóvel e abra as mensagens enviadas por seu corretor</strong></h4>
            	</div>
            </div>
          </div>
        <div class="body-mensagem">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php
          if(count($rs) != 0){
	          foreach ($rs as $key) {
	          echo '
	          <div class="panel panel-default">
	            <div class="panel-heading" role="tab" id="headingOne">
	              <h4 class="panel-title">
	                <a class="imo-h4" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$key->idimo.'" aria-expanded="true" aria-controls="collapse'.$key->idimo.'">
	                  <h4 >'.$key->tipoimo. ' - '.$key->bairro.'. '.$key->lougradouro.' - '.$key->cidade.'       R$'.number_format($key->valorvendaimo, 2,',','.').'</h4>
	                </a>
	              </h4>
	            </div>
	            <div id="collapse'.$key->idimo.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
	              <div class="panel-body">
	                <ul class="nav nav-tabs" role="tablist">
	                  <li role="presentation" class="active"><a href="#mensagens'.$key->idimo.'" aria-controls="mensagens'.$key->idimo.'" role="tab" data-toggle="tab"><h4>Mensagens</h4></a></li>
	                   <li role="presentation" ><a href="#imovel'.$key->idimo.'" aria-controls="imovel'.$key->idimo.'" role="tab" data-toggle="tab"><h4>Imóvel</h4></a></li>
	                </ul>
	                <!-- Tab panes -->
	                <div class="tab-content">
	                  <div role="tabpanel" class="tab-pane" id="imovel'.$key->idimo.'">'; 

	                    echo '<div class="row">
	                            <div class="col-xs-12 col-sm-6">';
	                            if($key->foto1 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto1.'" width="150">';
	                            }
	                            if($key->foto2 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto2.'" width="150">';
	                            }
	                            if($key->foto3 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto3.'" width="150">';
	                            }
	                            if($key->foto4 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto4.'" width="150">';
	                            }
	                            if($key->foto5 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto5.'" width="150">';
	                            }
	                              if(!empty($key->observacao3)){
	                                      echo "<br>
	                                   <div class='info-imovel col-xs-6'>
	                                      <h3 class='descricao'>Descrição do Imóvel</h3>
	                                      <p>".$key->observacao3."</p>
	                                    </div>";
	                                }
	                                    if(!empty($key->observacao1)){
	                                      echo"
	                                    <div class='info-imovel col-xs-6'>
	                                        <h3>Facilidades de Negociação</h3>
	                                        <p>".$key->observacao1."</p>
	                                    </div>";
	                                  }
	                                  echo '
	                            </div>
	                            <div class="col-xs-12 col-sm-6">';
	                              if(!empty($key->nomeempreendimento)){
	                                echo "<h1>".$key->nomeempreendimento."</h1>";
	                              }
	                              echo "
	                                <h1>".$key->tipoimo."</h1>
	                                <span>Código: ".$key->idimo."</span><br>
	                                <span>".$key->cidade."</span><br>
	                                <span>Bairro: ".$key->bairro."</span><br>
	                                <h2 class='texto-laranja'>".number_format($key->valorvendaimo, 2,',','.')."</h2>
	                                <h3>Características do Imóvel:</h3>
	                                <div class='col-xs-6'>
	                                  <ul>";
	                                    if( $key->tipoimo!="Terreno" && $key->tipoimo!="Comercial"){
	                                    echo "<li><img src='img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$key->numdormimo."</span>.</li>";
	                                    }
	                                    echo "<li><img src='img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$key->areaimo." m²</span>.</li>";
	                                    if($key->tipoimo == 'Terreno'){
	                                       echo "<li><img src='img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$key->medidasimo."</span>.</li>";
	                                    }
	                                    if($key->churrasqueiraimo=="Sim"){
	                                      echo "
	                                      <li><img src='img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->salaofestaimo=="Sim" && !empty($key->salaofestaimo)){
	                                      echo "<li><img src='img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->portariaimo=="Sim" && !empty($key->portariaimo)){
	                                      echo "<li><img src='img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->areaservicoimo=="Sim" && !empty($key->areaservicoimo)){
	                                      echo "<li><img src='img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->piscinaimo=="Sim" && !empty($key->piscinaimo)){
	                                      echo "<li><img src='img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                   
	                                    echo "
	                                  </ul>
	                                </div>
	                                <div class='col-xs-6'>
	                                  <ul>";
	                                    if($key->academiaimo=="Sim" && !empty($key->academiaimo)){
	                                      echo "<li><img src='img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->tipoimo != "Terreno" && $key->tipoimo != "Comercial" ){
	                                      $piso = $key->piso;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
	                                       $teto = $key->tetoimo;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
	                                       $parede = $key->paredesimo;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
	                                       $hidro = $key->hidraulicaimo;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
	                                    if($key->arcondicionadoimo=="Sim"){
	                                       $ar = $key->arcondicionadoimo;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
	                                    }
	                                    if($key->armariosimo=="Sim" && !empty($key->armariosimo)){
	                                       $arma = $key->armariosimo;
	                                       echo "<li><img src='img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
	                                    }
	                                   }
	                                    echo "
	                                  </ul>
	                                </div>";

	                                echo "
	                            </div>
	                          </div>";

	                  echo '</div>
	                    <div role="tabpanel" class="tab-pane active" id="mensagens'.$key->idimo.'">';
	                      $m->setIdimo($key->idimo);
	                      $rsM = $m->pesquisarMensagem();
	                      $total = count($rsM);
	                      if($total != 0){
	                          foreach ($rsM as $keyM) {
	                             echo '
	                            <blockquote class="blockquote mensagem-mm">
	                              <h5>'.$keyM->assuntomens.'</h5>
	                              <p>'.$keyM->descricaomens.'</p>
	                              <footer>'.$keyM->datamens.' às '.$keyM->horamens.' - <cite title="Source Title">'.$keyM->nome.'.</cite></footer>
	                            </blockquote>';
	                          }
	                        }else{
	                          echo '
	                          <blockquote class="blockquote mensagem-mm">
	                            <p>Não há mensagens.</p>
	                            <footer>Radar dos imóveis. <cite title="Source Title">Dalmo Souza.</cite></footer>
	                          </blockquote>';
	                        }
	                    echo '
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>';
	            }
	        }else{
	        	echo "<h3>Você não tem imóveis cadastrados!</h3>";
	        }
            ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>