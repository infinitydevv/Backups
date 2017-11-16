<?php
 include"conexoes/conectar.php";
 ini_set('default_charset','UTF-8');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
      <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="shadowbox/shadowbox.js" ></script>
    <link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      Shadowbox.init({
      language: 'pt',
      players: ['img'],
      });
    </script>

    <!-- CSS da página --><link rel="stylesheet" href="css/pesquisarimovel3.css">
    <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
    <title>Radar dos Imóveis - Resultado da Pesquisa</title>
    <link rel="icon" href="img/logo.png">
  </head>
  <body>

    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('navbar-top.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->

    <?php

      $id = $_GET["id"];

      $sql = "SELECT * FROM imovel i inner join cidade c on i.cidade = c.idcity WHERE i.idimo = $id";


      $res = mysql_query($sql,$conexao);
      $dados = @mysql_fetch_object($res);
      @header('Content-Type: text/html; charset=utf-8');
      @mysql_query("SET NAMES 'utf8'");
      @mysql_query('SET character_set_connection=utf8');
      @mysql_query('SET character_set_client=utf8');
      @mysql_query('SET character_set_results=utf8');

      echo "'<div class='section-principal-show'>
      <div class='container section-principal'>
        <div class='row'>
          <div class='col-xs-6'>
            <div class='imagem-imovel'>
              <div class='imagem-1'>";
            if($dados->foto1 != ""){
              echo"
              <a href='".$dados->foto1."' class='thumbnail' rel='shadowbox[vocation];'>
                <img src='".$dados->foto1."' class='img-responsive img-1 center-block'/></a>
              ";
            }
              echo "</div>
              <div class='row'>
                <div class='col-sm-6 col-md-3 col-lg-3'>";
                if($dados->foto2 !=""){
                  echo "<a href='".$dados->foto2."' class='thumbnail' rel='shadowbox[vocation];'>
                    <img src='".$dados->foto2."' class='img-responsive img-2 center-block'/>
                  </a>"
                  ;
                }
                echo "</div>
                <div class='col-sm-6 col-md-3 col-xs-3'>";
                if($dados->foto3 !=""){
                  echo "<a href='".$dados->foto3."' class='thumbnail' rel='shadowbox[vocation];'>
                    <img src='".$dados->foto3."'  class='img-responsive img-2 center-block'/>
                  </a>";
                }
                echo "</div>
                <div class='col-sm-6 col-md-3 col-xs-3'>";
                if($dados->foto4 !=""){
                  echo"
                  <a href='".$dados->foto4."' class='thumbnail' rel='shadowbox[vocation];'>
                    <img src='".$dados->foto4."' class='img-responsive img-2 center-block'/>
                  </a>";
                }
                echo "
                </div>
                <div class='col-sm-6 col-md-3 col-xs-3'>";
                if($dados->foto5 !=""){
                  echo "
                  <a href='".$dados->foto5."' class='thumbnail' rel='shadowbox[vocation];'>
                    <img src='".$dados->foto5."' class='img-responsive img-2 center-block'/>
                  </a>";
                }
                echo"
                </div>
              </div>
            </div>
          </div>
          <div class='col-xs-6'>
            <div class='info-imovel col-xs-6 col-md-6 col-lg-6'>";
            if(!empty($dados->nomeempreendimento)){
              echo "<h1>".$dados->nomeempreendimento."</h1>";
            }
            echo "
              <h1>".$dados->tipoimo."</h1>
              <span>Código: ".$dados->idimo."</span><br>
              <span>".$dados->nomecity."</span><br>
              <span>Bairro: ".$dados->bairro."</span><br>
              <h2 class='texto-laranja'>".number_format($dados->valorvendaimo, 2,',','.')."</h2>
            </div>
            <div class='info-imovel-but col-xs-6 col-md-6 col-lg-6'>
              <ul class='nav nav-pills nav-stacked'>
                <li role='presentation'><a href='http://www.radardosimoveis.com.br/formulariocomprador.php?cod=$corr' class='btn btn-warning btn-lg button-imovel button-imovel-1'>Contate o Corretor</a></li>
                <li role='presentation'><a href='pdf.php?id=<?php =$id?>' class='btn btn-warning btn-lg button-imovel'>Imprimir</a></li>
                <li role='presentation'><a href='javascript:window.history.go(-1)' class='btn btn-warning btn-lg button-imovel'>Voltar</a></li>
              </ul>
            </div>
            <div class='info-imovel col-xs-12'>
              <h3>Características do Imóvel:</h3>
              <div class='col-xs-6'>
	              <ul>";
	                if( $dados->tipoimo!="Terreno" && $dados->tipoimo!="Comercial"){
	                echo "<li><img src='img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$dados->numdormimo."</span>.</li>";
	                }
	                echo "<li><img src='img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$dados->areaimo." m²</span>.</li>";
	                if($dados->tipoimo == 'Terreno'){
	                   echo "<li><img src='img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$dados->medidasimo."</span>.</li>";
	                }
	                if($dados->churrasqueiraimo=="Sim"){
	                  echo "
	                  <li><img src='img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	                if($dados->salaofestaimo=="Sim" && !empty($dados->salaofestaimo)){
	                  echo "<li><img src='img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	                if($dados->portariaimo=="Sim" && !empty($dados->portariaimo)){
	                  echo "<li><img src='img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	                if($dados->areaservicoimo=="Sim" && !empty($dados->areaservicoimo)){
	                  echo "<li><img src='img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	                if($dados->piscinaimo=="Sim" && !empty($dados->piscinaimo)){
	                  echo "<li><img src='img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	               
	                echo "
	              </ul>
	            </div>
	            <div class='col-xs-6'>
	              <ul>";
	              	if($dados->academiaimo=="Sim" && !empty($dados->academiaimo)){
	                  echo "<li><img src='img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
	                }
	                if($dados->tipoimo != "Terreno" && $dados->tipoimo != "Comercial" ){
	                  $piso = $dados->piso;
	                   echo "<li><img src='img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
	                   $teto = $dados->tetoimo;
	                   echo "<li><img src='img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
	                   $parede = $dados->paredesimo;
	                   echo "<li><img src='img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
	                   $hidro = $dados->hidraulicaimo;
	                   echo "<li><img src='img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
	                if($dados->arcondicionadoimo=="Sim"){
	                   $ar = $dados->arcondicionadoimo;
	                   echo "<li><img src='img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
	                }
	                if($dados->armariosimo=="Sim" && !empty($dados->armariosimo)){
	                   $arma = $dados->armariosimo;
	                   echo "<li><img src='img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
	                }
	               }
	                echo "
	              </ul>
	            </div>
            </div>
          </div>";
          if(!empty($dados->observacao3)){
          	echo "
         <div class='info-imovel col-xs-6'>
            <h3 class='descricao'>Descrição do Imóvel</h3>
            <p>".$dados->observacao3."</p>
          </div>";
      }
          if(!empty($dados->observacao1)){
            echo"
          <div class='info-imovel col-xs-6'>
              <h3>Facilidades de Negociação</h3>
              <p>".$dados->observacao1."</p>
          </div>";
        }
        echo"
        </div>
      </div>
    </div>";

    echo "
    <div class='section-principal-hide'>
      <div class='container section-principal'>
        <a href='https://api.whatsapp.com/send?phone=5551995513505' target='_blank'class='btn-fixado btn-fixado-1 section-principal-hide'><button type='button' class='btn btn-success  btn-circle btn-lg'><img src='img/whats.png' class='right-block wpp'></button></a>
        <a href='javascript:window.history.go(-1)' target='_blank'class='btn-fixado2 btn-fixado-1 section-principal-hide btn btn-warning btn-circle btn-lg'>Voltar</a>

        <div class='row'>
        	<div class='col-xs-12 info-imovel'>
        	";
        	if(!empty($dados->nomeempreendimento)){
              echo "<h1>".$dados->nomeempreendimento."</h1>";
            }
        		echo "<h1>".$dados->tipoimo." - ".$dados->nomecity." - ".$dados->bairro."</h1>
              <h2 class='texto-laranja'>R$ ".number_format($dados->valorvendaimo, 2,',','.')." - Código: ".$dados->idimo."</h2>
        	</div>
        	<div class='col-xs-12'>
        		<div class='row'>";

        			
              echo "
                <div class='col-xs-12'>";
        			echo "
  		            <a href='#' class='thumbnail'>";

  		            if($dados->foto1 != ""){
              			echo"
                    <img src='".$dados->foto1."' class='img-responsive img-mobile-1 center-block'/>";
            		}
            		echo "
  		            </a>
  		        </div>
  		        <div class='col-xs-12'>
  		            ";
                  echo "
                  <a href='#' class='thumbnail'>";
  		            if($dados->foto2 != ""){
              			echo"<img src='".$dados->foto2."' class='img-responsive img-mobile-1 center-block'/>";
            		}
  		    		echo "
  		            </a>
  		        </div>
  		        <div class='col-xs-12'>
  		           ";
                 echo "
                  <a href='#' class='thumbnail'>";
  		            if($dados->foto3 != ""){
              			echo"<img src='".$dados->foto3."' class='img-responsive img-mobile-1 center-block'/>";
            		}
            		echo "
  		            </a>
  		        </div>
  		        <div class='col-xs-12'>
  		            ";
                  echo "
                  <a href='#' class='thumbnail'>";
  		            if($dados->foto4 != ""){
              			echo"<img src='".$dados->foto4."' class='img-responsive img-mobile-1 center-block'/>";
            		}
            		echo "
  		            </a>
  		        </div>
  		        <div class='col-xs-12'>
  		            ";
                  echo "
                  <a href='#' class='thumbnail'>";
  		            if($dados->foto5 != ""){
              			echo"<img src='".$dados->foto5."' class='img-responsive img-mobile-1 center-block'/>";
            		}
            		echo "
  		            </a>
  		        </div>
  	        </div>
        	</div>
        	<div class='col-xs-12 info-imovel'>
        		<h3>Características do Imóvel:</h3>
              <ul>";
                if( $dados->tipoimo!="Terreno" && $dados->tipoimo!="Comercial"){
                echo "<li><img src='img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$dados->numdormimo."</span>.</li>";
                }
                echo "<li><img src='img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$dados->areaimo." m²</span>.</li>";
                if($dados->tipoimo == 'Terreno'){
                   echo "<li><img src='img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$dados->medidasimo."</span>.</li>";
                }
                if($dados->churrasqueiraimo=="Sim"){
                  echo "
                  <li><img src='img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->salaofestaimo=="Sim" && !empty($dados->salaofestaimo)){
                  echo "<li><img src='img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->portariaimo=="Sim" && !empty($dados->portariaimo)){
                  echo "<li><img src='img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->areaservicoimo=="Sim" && !empty($dados->areaservicoimo)){
                  echo "<li><img src='img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->piscinaimo=="Sim" && !empty($dados->piscinaimo)){
                  echo "<li><img src='img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->academiaimo=="Sim" && !empty($dados->academiaimo)){
                  echo "<li><img src='img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
                }
                if($dados->tipoimo != "Terreno" && $dados->tipoimo != "Comercial" ){
                  $piso = $dados->piso;
                   echo "<li><img src='img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
                   $teto = $dados->tetoimo;
                   echo "<li><img src='img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
                   $parede = $dados->paredesimo;
                   echo "<li><img src='img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
                   $hidro = $dados->hidraulicaimo;
                   echo "<li><img src='img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
                if($dados->arcondicionadoimo=="Sim"){
                   $ar = $dados->arcondicionadoimo;
                   echo "<li><img src='img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
                }
                if($dados->armariosimo=="Sim" && !empty($dados->armariosimo)){
                   $arma = $dados->armariosimo;
                   echo "<li><img src='img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
                }
               }
                echo "
              </ul>
        	</div>";
        	
            if(!empty($dados->observacao3)){
            	echo "<div class='info-imovel col-xs-12 info-imovel'>
            <h3 class='descricao'>Descrição do Imóvel</h3>";
            	echo"<p>".$dados->observacao3."</p></div>";
        	}
          
            if(!empty($dados->observacao1)){
            	echo "<div class='info-imovel col-xs-12 info-imovel'>
              <h3>Facilidades de Negociação</h3>";
            	echo"<p>".$dados->observacao1."</p>
            	</div>";
        	}
        echo"
        </div>
      </div>
    </div>
    </div>";
    ?>
    <!-- footer.php e footer.css no head -->
    <?php include('footer.php'); ?>
    <!-- FIM footer.php e footer.css no head -->

  </body>
</html>
