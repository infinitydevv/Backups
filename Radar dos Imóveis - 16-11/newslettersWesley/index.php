<?php

 include"../conexoes/conectar.php";
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
    <!-- CSS da página --><link href="../css/index1.css" rel="stylesheet">
    <!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
    <!-- Bootstrap Core CSS --><link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
   <!-- Biblioteca CSS para animação da logo --><link rel="stylesheet" href="../css/ animate.css">
    <link rel="icon" href="../img/logo.png">
      <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    
    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-top.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->


    <!-- BOTÃO PIXADO WHATSAPP -->
    <a href="https://api.whatsapp.com/send?phone=5551995513505" target="_blank" class="btn-fixado section-hide"><button type="button" class="btn btn-success btn-circle btn-lg"><img src="img/whats.png" class="right-block wpp"></button></a>
    <!-- BOTÃO PIXADO WHATSAPP -->


    <!-- SECTION PARA MOBILE -->
    <div class="section section-hide">
      <div class="container" id="container-pesquisa-logo">
        <div class="row"  id="row-pesquisa-logo">
          <div class="col-sm-12 col-md-4 centered ">
            <center>
               <img class="animated zoomIn img-radar" src="img/logo.png" width="60%" heigth="60%" alt="Radar dos Imóveis" title="" />
            </center>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="panel-group" id="paineis-sobre">
              <h3>Você quer,  </h3>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title" data-toggle="collapse" id="comprar" data-target="#1p" data-parent="#paineis-sobre"><legend class="font-laranja-click">Comprar?</legend></h3>
                </div>
                <div id="1p" class="collapse">
                  <div class="panel-body">
                    <fieldset>
                      <form class="pesquisa texto-laranja" name="pesquisa" method="POST" action="pesquisarimovel.php">
                        <div class="row">
                          <div class="col-xs-12">
                            <label for="Valor">Código:</label>
                            <input type="text" name="codigo" maxlength="5" size="10" placeholder="Informe Cód.">
                          </div>
                          <div class="col-xs-6">
                            <label for="tipo">Imóvel:</label>
                            <select name="tipo" class="form-control input-sm" id="tipo">
                              <?php
                                $sql = "select DISTINCT tipoimo  from imovel";
                                $resultado = mysql_query($sql,$conexao);
                                echo"<option value = ''>Selecione</option>";
                                while($dados = mysql_fetch_array($resultado)){
                                  $nome = $dados['tipoimo'];
                                  echo"<option value = '$nome'>$nome</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="col-xs-6">
                            <label  for="cidade">Cidade:</label>
                            <select name="cidade"  class="form-control input-sm" id="cidade">
                              <?php
                                $sql = "select DISTINCT i.cidade, c.idcity, c.nomecity from imovel i inner join cidade c on i.cidade = c.idcity";
                                $resultado1 = mysql_query($sql,$conexao);
                                echo"<option value = ''>Selecione</option>";
                                while($dados = mysql_fetch_array($resultado1)){
                                  $nome = $dados['nomecity'];
                                  echo"<option value = '$nome'>$nome</option>";
                                }
                              ?>

                            </select>
                          </div>
                          <div class="col-xs-6">
                            <label for="Bairro">Bairro:</label>
                              <select  name="bairro"  class="form-control input-sm" id="cidade">
                                <?php
                                  $sql = "select DISTINCT bairro  from imovel ";
                                  $resultado2 = mysql_query($sql,$conexao);
                                  echo"<option value = ''>Selecione</option>";
                                  while($dados = mysql_fetch_array($resultado2)){
                                    $nome = $dados['bairro'];
                                    echo"<option value = '$nome'>$nome</option>";
                                  }
                                ?>
                              </select>
                          </div>
                          <div class="col-xs-6">
                            <label for="Valor">Valores:</label>
                            <select name="valores" class="form-control input-sm" id="valores">
                              <option value = ">=0">Selecione</option>";
                              <option value = "<50000.00">Abaixo de 50 mil</option>";
                              <option value = "50000.00 and 100000.00">entre 50 mil e 100 mil </option>";
                              <option value = "101000.00 and 200000.00">entre 101 mil e 200 mil </option>";
                              <option value = "201000.00 and 400000.00">entre 201 mil e 400 mil </option>";
                              <option value = "400000.01 and 60000000.01">Acima de 400 mil </option>";
                            </select><br>
                          </div>
                          <div class="col-xs-12 col-sm-12">
                            <input class="btn btn-warning btn-md" type="submit" value="Pesquisar" />
                          </div>
                        </div>
                     </form><br>
                    </fieldset>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="panel-group" id="paineis-sobre">
            <h3>Você quer,  </h3>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title" data-toggle="collapse" id="vender" data-target="#2p" data-parent="#paineis-sobre"><legend class="font-laranja-click">Vender?</legend></h3>
                </div>
                <div id="2p" class="collapse">
                  <div class="panel-body">
                    <form  method="POST" action="formulariovenda1.php" class="texto-laranja">
                    <br>
                      <input type="hidden" name="cod" id="cod" value="<?php echo $id ?>" />
                      <select name="corr" class="form-control" id="corr" style="width:150px">
                        <?php
                          $sql = "select * from usuario where (funcao = 'Corretor' or funcao = 'Avaliador' or funcao = 'Franqueado')";
                          $resultado1 = mysql_query($sql,$conexao);
                          echo"<option value = ''>Selecione</option>";
                          while($dados = mysql_fetch_array($resultado1)){
                          $id=$dados['idusu'];
                          $nome = $dados['cidade'];
                          echo"<option value = '$id'>$nome</option>";
                          }
                        ?>
                      </select>
                      <br>
                      <input class="btn btn-warning btn-md" type="submit" value="Vender" />
                    </form><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
      <!-- FIM SECTION PARA MOBILE -->



      
      <!-- SECTION PARA DESKTOP -->
      <div class="section section-show">
        <div class="container" id="container-pesquisa-logo">
          <div class="row"  id="row-pesquisa-logo">
            <div class="col-xs-12 col-sm-3 centered img-logo-radar">
            <center>
              <img src="img/logo-1.png" class="radar-linhas radar-gira img-responsive">
              <img src="img/logo-2.png" class="radar-letras img-responsive">
            </center>
            </div>
            <div class="col-xs-12 col-sm-4 col-pesquisar">
                <h3><legend class="font-laranja-click" id="comprar">Você quer Comprar?</legend></h3>
                <fieldset>
                  <form class="pesquisa texto-laranja" name="pesquisa" method="POST" action="pesquisarimovel.php">
                    <div class="row">
                      <div class="col-xs-12">
                        <label for="Valor">Código:</label>
                        <input type="text" name="codigo" maxlength="5" size="10" placeholder="Informe Cód.">
                      </div>
                      <div class="col-xs-6">
                        <label for="tipo">Imóvel:</label>
                        <select name="tipo" class="form-control input-lg" id="tipo">
                          <?php
                            $sql = "select DISTINCT tipoimo  from imovel";
                            $resultado = mysql_query($sql,$conexao);
                            echo"<option value = ''>Selecione</option>";
                            while($dados = mysql_fetch_array($resultado)){
                            $nome = $dados['tipoimo'];
                            echo"<option value = '$nome'>$nome</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-xs-6">
                        <label  for="cidade">Cidade:</label>
                        <select name="cidade"  class="form-control input-lg" id="cidade">
                          <?php
                            $sql = "select DISTINCT i.cidade, c.idcity, c.nomecity from imovel i inner join cidade c on i.cidade = c.idcity";
                                $resultado1 = mysql_query($sql,$conexao);
                                echo"<option value = ''>Selecione</option>";
                                while($dados = mysql_fetch_array($resultado1)){
                                  $nome = $dados['nomecity'];
                                  echo"<option value = '$nome'>$nome</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="col-xs-6">
                        <label for="Bairro">Bairro:</label>
                          <select  name="bairro"  class="form-control input-lg" id="cidade">
                            <?php
                              $sql = "select DISTINCT bairro  from imovel ";
                              $resultado2 = mysql_query($sql,$conexao);
                              echo"<option value = ''>Selecione</option>";
                              while($dados = mysql_fetch_array($resultado2)){
                              $nome = $dados['bairro'];
                                echo"<option value = '$nome'>$nome</option>";
                              }
                            ?>
                          </select>
                      </div>
                      <div class="col-xs-6">
                        <label for="Valor">Valores:</label>
                        <select name="valores" class="form-control input-lg" id="valores">
                          <option value = ">=0">Selecione</option>";
                          <option value = "<50000.00">Abaixo de 50 mil</option>";
                          <option value = "50000.00 and 100000.00">entre 50 mil e 100 mil </option>";
                          <option value = "101000.00 and 200000.00">entre 101 mil e 200 mil </option>";
                          <option value = "201000.00 and 400000.00">entre 201 mil e 400 mil </option>";
                          <option value = "400000.01 and 60000000.01">Acima de 400 mil </option>";
                        </select><br>
                      </div>
                      <div class="col-xs-12 col-sm-12">
                        <input class="btn btn-warning btn-lg btn-block" type="submit" value="Pesquisar" />
                       <!-- <a href="pesquisarimovel2.php" class="btn btn-warning btn-lg btn-block">Pesquisar</a>-->
                      </div>
                    </div>
                  </form><br>
                </fieldset>
              </div>
              <div class="col-xs-12 col-sm-4 col-pesquisar col-vender">
                    <h3><legend class="font-laranja-click" id="vender" >Você quer Vender?</legend></h3>
                      <form  method="POST" action="formulariovenda1.php" class="texto-laranja">
                      <br>
                      <label for="">Cidade:</label>
                        <input type="hidden" name="cod" id="cod" value="<?php echo $id ?>" />
                        <select name="corr" class="form-control input-lg" id="corr">
                        
                          <?php
                            $sql = "select * from usuario where (funcao = 'Corretor' or funcao = 'Avaliador' or funcao = 'Franqueado')";
                            $resultado1 = mysql_query($sql,$conexao);
                            echo"<option value = ''>Selecione</option>";
                            while($dados = mysql_fetch_array($resultado1)){
                            $id=$dados['idusu'];
                            $nome = $dados['cidade'];
                            echo"<option value = '$id'>$nome</option>";
                            }  
                          ?>
                        </select>
                        <br>
                        <input class="btn btn-warning btn-lg btn-block" type="submit" value="Vender" />
                       <!-- <a href="pesquisarimovel2.php" class="btn btn-warning btn-lg btn-block">Vender</a>-->
                      </form>
                    </div>
                </div>
              </div>
            </div>
            <!-- SECTION PARA DESKTOP -->
	
   <!-- SLIDER -->        
   <div class="">
     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
       <ol class="carousel-indicators">
         <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
         <li data-target="#carousel-example-generic" data-slide-to="2"></li>
         <li data-target="#carousel-example-generic" data-slide-to="3"></li>
       </ol>
       <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox">
         <div class="item active">
           <img src="img/slider/slider4.png" alt="...">
         <div class="carousel-caption">

         </div>
       </div>
       <div class="item">
         <img src="img/slider/slider4.png" alt="...">
         <div class="carousel-caption">

         </div>
       </div>
       <div class="item">
         <img src="img/slider/slider4.png" alt="...">
         <div class="carousel-caption">

         </div>
       </div>
       <div class="item">
         <img src="img/slider/slider4.png" alt="...">
         <div class="carousel-caption">

         </div>
       </div>
     </div>
         <!-- Controls -->
     <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
    </div>
  </div>
  <!-- FIM SLIDER --> 

    <!-- DESTAQUES DA SEMANA -->
    <div id="destaquesSem">
    </div>
    <br>
    <br>


    <div class="container" id="">
      <div class="row">
            <h3 class="txtLaranja destaq">Destaques da Semana</h3>
            <?php 
              $sql = "SELECT * FROM imovel i inner join cidade c on i.cidade = c.idcity where destaqueimo ORDER BY datacadimo DESC LIMIT 6";

              $res = mysql_query($sql,$conexao);
              $linha = mysql_num_rows($res);

              if($linha>0){
                while($dados = @mysql_fetch_object($res)){
                  if($dados->destaqueimo != 0){
                  echo "<div class='col-xs-12 col-sm-6 col-md-4'>
                        <div class='thumbnail cor-fundo'>
                          <img src=' ".$dados->foto1."'  class='img-imovel-pesquisa'>
                            <div class='caption'>
                              <div class='row'>
                                <div class='col-xs-12'>";
                                if($dados->empreendimento == 1){
                                echo "<h4 class='ipoimovel-pesquisa text-center empreend'>".$dados->nomeempreendimento."</h4>
                                      <div class='row'>
                                        <div class='col-xs-12 text-center'>
                                          <h4 class=''>".$dados->tipoimo."</h4>
                                        </div>
                                      </div>
                                      <div class='col-xs-12 col-sm-12 col-md-12 text-left'>
                                        <h4 class='valor'>R$ ".number_format($dados->valorvendaimo, 2,',','.')."</h4>
                                      </div>
                                      <div class='col-xs-12'>
                                        <h4 class='cod-texto'>"
                                          .$dados->nomecity."  - Bairro ".$dados->bairro.
                                        "</h4>
                                      </div>
                                      <div class='col-xs-6 col-sm-6 col-md-6'>
                                          <h4 class='texto-laranja cod-texto'>Código: ".$dados->idimo."</h4>
                                      </div>
                                      <div class='col-xs-6'>
                                        <a href='imovelselecionado.php?id=".$dados->idimo."' class='btn btn-warning btn-md btn-block'>Ver mais</a>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                            ";
                        }else{
                          echo "<div class='row'>
                                  <div class='col-xs-12 text-center'>
                                     <h4 class=''>".$dados->tipoimo."</h4>
                                  </div>
                                </div>
                                <div class='col-xs-12 col-sm-12 col-md-12 text-left'>
                                  <h4 class='valor'>R$ ".number_format($dados->valorvendaimo, 2,',','.')."
                                </div>

                                <div class='col-xs-12'>
                                </h4>
                                  <h4 class='cod-texto'>"
                                    .$dados->nomecity."  - Bairro ".$dados->bairro.
                                  "</h4>
                                </div>
                                <div class='col-xs-6 col-sm-6 col-md-6'>
                                    <h4 class='texto-laranja cod-texto'>Código: ".$dados->idimo."</h4>
                                </div>
                                <div class='col-xs-6'>
                                  <a href='imovelselecionado.php?id=".$dados->idimo."' class='btn btn-warning btn-md btn-block'>Ver mais</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>";
                        }
                      }
                }
              }
            ?>
        </div>
    </div>
    <!-- FIM DESTAQUES DA SEMANA -->


    <!-- About -->
    <br id="about" >
    <br>
    <br>
      <section class="about">
        <div class="jumbotron" id="section-about">
          <div class="container">
            <div id="texto-about">
              <h2 class="texto-laranja">Quem somos?</h2> <!--class="lead"-->
              <p class="texto-laranja">O Radar dos Imóveis representa a organização de corretores de imóveis autônomos unidos para promover resultados.</p>
              <h3 class="texto-laranja">Este esforço conjunto passa a oferecer uma gama de serviços diferenciados para a promoção de negócios imobiliários, disponibilizando aos clientes:</h3>
              <ul>
                <li class="">Presença em toda a região metropolitana de Porto Alegre para encontrar ou vender o seu imóvel;</li>
                <li>Força de venda qualificada e multiplicada pela ação direta dos corretores de imóveis em cada município da região de forma ágil e comprometida pela busca das melhores oportunidades;</li>
                <li>Site de busca de ofertas e de corretores de imóveis por município;</li>
                <li>Serviço de ponta a ponta: profissionais habilitados para lhe auxiliar na resolução de problemas com documentação, compra, venda e para prestar todo o suporte relativo ao financiamento imobiliário.</li>
              </ul>
              <p class="texto-laranja">O Radar dos Imóveis surgiu da experiência comercial e de gestão do professor Dalmo Souza, Especialista em Administração e Mestre em Educação, na busca em desenvolver um modelo de negócios imobiliários de  forma direta, simples e eficaz, envolvendo pessoas e promovendo resultados. </p>
              <p class="texto-laranja">O Radar dos Imóveis não possui sede física. Está presente em todos os lugares em
              <a target="_blank" href="http://www.radardosimoveis.com.br/">Radar dos Imóveis</a> e em diversos municípios por seus corretores autônomos. </p>
              <br><br>
            </div>
          </div>
        </div>
      </section>
      <!-- FIM About -->

      <!-- SERVIÇOS -->
      <div id="services">
      </div>
      <br>
      <br>
      <section class="servicos" >
        <div class="container">
          <h2 class="texto-laranja text-center">Serviços</h2><br>
          <div class="row">
            <div class="col-xs-12 col-sm-4 colunas-servicos">
              <div class="">
                <img class="center-block img-circle" src="img/Compra e venda.jpg" width="140px" height="140px">
              </div>
              <div class="text-center">
                <h4 class="texto-laranja"><strong>COMPRA E VENDA</strong></h4>
                <p>Representação na compra e venda de imóveis residenciais e comerciais.</p>
                <a href="representacao.php" class="btn btn-default">Descubra mais</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 colunas-servicos">
              <div class="">
                <img class="center-block img-circle" src="../img/documentacao.jpg" width="140px" height="140px">
              </div>
              <div class="text-center">
                <h4 class="texto-laranja"><strong>DOCUMENTAÇÃO</strong></h4>
                <p>Regularização documentos: escrituras, inventários, IPTU, registros e toda documentação do seu imóvel.</p>
                <a href="suporte.php" class="btn btn-default">Descubra mais</a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 colunas-servicos">
              <div class="">
                <img class="center-block img-circle" src="img/avaliacao-imovel.jpg" width="140px" height="140px">
              </div>
              <div class="text-center">
                <h4 class="texto-laranja"><strong>AVALIAÇÃO DE IMÓVEIS</strong></h4>
                <p>Avaliação para compra e venda, inclusive em processos judiciais.</p>
                <a href="doci.php" class="btn btn-default">Descubra mais</a>
              </div>
            </div>
          </div>
        </div>
      </section>
        <div class="window" id="janela1">
            <a href="#" class="fechar">X Fechar</a>
            <h4>TESTE</h4>
            <p>TENTE NOVAMENTE</p>
        </div>
        <!-- mascara para cobrir o site -->  
        <div id="mascara"></div>
      <!-- FIM SERVIÇOS -->
      <script type="text/javascript" src="script.js"></script>
       <!-- footer.php e footer.css no head -->
        <?php include('../footer.php'); ?>
       <!-- FIM footer.php e footer.css no head -->
</body>
</html>
