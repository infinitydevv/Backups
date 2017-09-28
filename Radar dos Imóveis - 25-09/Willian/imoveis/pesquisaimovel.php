<?php 
  //$nomeBanco = "radari";
 // $conexao = @mysql_connect("localhost","root","");
 // mysql_select_db($nomeBanco, $conexao);
 
 include"conectar.php";  
 ?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Radar dos Imóveis</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jCarousel.js" ></script>
	  <script type="text/javascript" src="js/jCarouself.js" ></script>
    <script type="text/javascript" src="shadowbox/jquery.js" ></script>
<script type="text/javascript" src="shadowbox/shadowbox.js" ></script>
<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css" />
	 
  
	<!-- <link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css" />
	<link href="css/lightbox.css" rel="stylesheet" />

    Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet" >

	<!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
	$('.carousel').carousel({
		interval: 3000
	})
</script>

 <script type="text/javascript">
		Shadowbox.init({
		language: 'pt',
		players: ['img','html'],
		handleOversize: "drag",
		autoplayMovies: true,
		displayNav:  true
		});
</script>


</head>

<body>
<!-- inicio do segundo menu-->
      <!-- Menu da aplicação -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand" href="index.php">Radar dos Imóveis
                </a>
            </div>  
            
            <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#page-top"></a></li>
                    <li>
                        <a href="index.php" onclick = $("#menu-close").click();>Home</a>
                    </li>             
                    <li>
                        <a href="login.php" onclick = $("#menu-close").click();>Administrativo</a>
                    </li>
                  
                </ul>
            </div>
            
        </div>
      </nav>
      <br>
	 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
	<li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
	<li data-target="#carousel-example-generic" data-slide-to="6"></li>
	<li data-target="#carousel-example-generic" data-slide-to="7"></li>
    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
    <li data-target="#carousel-example-generic" data-slide-to="10"></li>
    <li data-target="#carousel-example-generic" data-slide-to="11"></li>
	
	</ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/slider/faixa1.jpg" alt="...">
      <div class="carousel-caption">
      	<h3> </h3>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/faixa2.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/faixa3.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
	 <div class="item">
      <img src="img/slider/faixa4.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
	 <div class="item">
      <img src="img/slider/faixa5.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
	 <div class="item">
      <img src="img/slider/faixa6.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
	 <div class="item">
      <img src="img/slider/faixa7.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
	 <div class="item">
      <img src="img/slider/faixa8.jpg" alt="...">
      <div class="carousel-caption">
      	<h3></h3>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/faixa9.jpg" alt="...">
      <div class="carousel-caption">
        <h3></h3>
      </div>
    </div>
     <div class="item">
      <img src="img/slider/faixa10.jpg" alt="...">
      <div class="carousel-caption">
        <h3></h3>
      </div>
    </div>
    <div class="item">
      <img src="img/slider/faixa11.jpg" alt="...">
      <div class="carousel-caption">
        <h3></h3>
      </div>
    </div>
     <div class="item">
      <img src="img/slider/faixa12.jpg" alt="...">
      <div class="carousel-caption">
        <h3></h3>
      </div>
    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> 
<!--fim do slider -->

  <div class="caixapes1">
          
    <!--<img class="rap" src="img/logonovo.png" width="100px" heigth="100px" alt="Radar dos Imóveis" title=""  />
        <img class="ra" src="img/RADAR.jpg" alt="Radar dos Imóveis" title=""  />
    
    PESQUISA DOS IMOVEIS -->
	
      <?php
	 
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM imovel WHERE idimo = $id";
      
       
        $res = mysql_query($sql,$conexao); 
        $dados = @mysql_fetch_object($res);
        echo"<div class='ci1'>";   
       
         echo "<div id='conteudo'>";
		 
		@header('Content-Type: text/html; charset=utf-8');
		@mysql_query("SET NAMES 'utf8'");
		@mysql_query('SET character_set_connection=utf8');
		@mysql_query('SET character_set_client=utf8');
		@mysql_query('SET character_set_results=utf8');
		
			echo "<span class='tipo'>$dados->tipoimo</span> <br><br>";   
			echo "<span class='codigo'>Código:".$dados->idimo."</span> <br>";   
			echo "<span class='cidade'>$dados->cidade</span><br>";

			echo "<span class='bairro'>Bairro:".$dados->bairro."</span> <br><br>";   
			
			echo "<span class='valor'>R$ ".number_format($dados->valorvendaimo, 2, ',', '.')."</span><br><hr>";       
			echo "<span class='cara'>CARACTERÍSTICAS DO IMÓVEL</span><br><br>";
			//echo "$dados->tipoimo";
			if( $dados->tipoimo!="Terreno" && $dados->tipoimo!="Comercial") {
				echo "<span class='dorm'><img src='img/yes.png'/>Nº Dormitórios:".$dados->numdormimo."</span><br>";
			}
			
			echo "<span class=''><img src='img/yes.png'/> Área do Imóvel: ".$dados->areaimo." m²</span> <br>";   
			if($dados->churrasqueiraimo=="Sim"){
				echo "<span class='churra'><img src='img/yes.png'/> Churrasqueira</span><br>";   
			}
			
			if($dados->salaofestaimo=="Sim" && !empty($dados->salaofestaimo)){
				echo "<span class='churra'><img src='img/yes.png'/> Salão de Festa</span><br>";   
			}
			if($dados->portariaimo=="Sim" && !empty($dados->portariaimo)){
				echo "<span class='churra'><img src='img/yes.png'/> Portaria 24h</span><br>";   
			}
			if($dados->areaservicoimo=="Sim" && !empty($dados->areaservicoimo)){
				echo "<span class='churra'><img src='img/yes.png'/> Área de Serviço</span><br>";   
			}
			if($dados->piscinaimo=="Sim" && !empty($dados->piscinaimo)){
				echo "<span class='churra'><img src='img/yes.png'/> Piscina</span><br>";   
			}
			if($dados->academiaimo=="Sim" && !empty($dados->academiaimo)){
				echo "<span class='churra'><img src='img/yes.png'/> Academia</span><br>";   
			}
	        if($dados->tipoimo != "Terreno" && $dados->tipoimo != "Comercial" ){
				$piso = $dados->piso;
			   echo "<span class='churra'><img src='img/yes.png'/> Piso: $piso</span><br>";  
			   $teto = $dados->tetoimo;
			   echo "<span class='churra'><img src='img/yes.png'/> Teto: $teto</span><br>";  
			   $parede = $dados->paredesimo;
			   echo "<span class='churra'><img src='img/yes.png'/> Paredes: $parede</span><br>";  
			   $hidro = $dados->hidraulicaimo;
			   echo "<span class='churra'><img src='img/yes.png'/> Hidraulica: $hidro</span><br>"; 
			if($dados->arcondicionadoimo=="Sim"){   
			   $ar = $dados->arcondicionadoimo;
			   echo "<span class='churra'><img src='img/yes.png'/> Ar Condicionado: $ar</span><br>";  
			}
			if($dados->armariosimo=="Sim" && !empty($dados->armariosimo)){
			   $arma = $dados->armariosimo;
			   echo "<span class='churra'><img src='img/yes.png'/> Armário Embutido: $arma</span><br>";
			}
	        }	
		
		
		
		
		
		
			   $obs =$dados->observacao1;
			   echo "<hr><span class='churra'> FACILIDADES DE NEGOCIAÇÃO<br>
			   $obs</span><br>";  
			   $corr = $dados->idusu;
	           

		


		echo "</div>";	 
		 
     	 
		 
		 echo "<div id='paineld'>";
		  
			
		    echo "<div class='btnp'>";
			echo "<a href='http://www.radardosimoveis.com.br/formulariocomprador.php?cod=$corr'> Contate o Corretor </a>"; 
  		    echo "</div>";
			echo "<div class='btn1'>";
			  echo"<a href='javascript:window.print();'> Imprimir </a>";
			echo "</div>";
			echo "<div class='btn2'>";
			
		      echo "<a href='javascript:window.history.go(-1)'> Voltar </a>";
  		    echo "</div>";
		    		 
		 echo "</div>";	 
		/*
		 echo "<div id='paineldb'>";
		  
			
		    echo "<div class='btnpb'>";
			echo "<a href='http://www.radardosimoveis.com.br/formulariocomprador.php?cod=$corretor'> Contate o Corretor </a>";
  		    echo "</div>";
			
			echo "<div class='btn1b'>";
			  echo"<a href='javascript:window.print();'> Imprimir </a>";
			echo "</div>";
			
			echo "<div class='btn2b'>";
		      echo "<a href='javascript:window.history.go(-1)'> Voltar </a>";
  		    echo "</div>";
		    		 
		 echo "</div>";	 
		
	*/
		echo"<div id='fotos1'>";	
			if($dados->foto1 != "")  
				echo "<a href='".$dados->foto1."'rel='shadowbox[vocation]; width=500; height=400'  ><img src='".$dados->foto1."' width='500px' heigth='700px' class='foto' alt='Foto de exibição'/></a>";
			else echo'Sem Foto';  
	    echo"</div>";
		
		echo"<div id='fotos2'>";
			if($dados->foto2 != "") 
				echo "<a href='".$dados->foto2."'rel='shadowbox[vocation]; width=500; height=400' ><img src='".$dados->foto2."'  width='100px' heigth='120px' class='foto' alt='Foto de exibição'/></a>";
			else echo'Sem Foto';  
		echo"</div>";	
		
		echo"<div id='fotos3'>";	
			if($dados->foto3 != "") 
				echo "<a href='".$dados->foto3."' rel='shadowbox[vocation]; width=500; height=400'><img src='".$dados->foto3."'  width='100px' heigth='120px'class='foto' alt='Foto de exibição'/></a>";
			else echo'Sem Foto';
        echo"</div>";
		
		echo"<div id='fotos4'>";			
			if($dados->foto4 != "") 
				echo "<a href='".$dados->foto4."' rel='shadowbox[vocation]; width=500; height=400'><img src='".$dados->foto4."'  width='100px' heigth='120px' class='foto' alt='Foto de exibição'/></a>";
			else echo'Sem Foto';  
		echo"</div>";
		
		echo"<div id='fotos5'>";
  		    if($dados->foto5 != "")
				echo "<a href='".$dados->foto5."' rel='shadowbox[vocation]; width=500; height=400'><img src='".$dados->foto5."'  width='100px' heigth='120px' class='foto' alt='Foto de exibição'/></a>";
			else echo'Sem Foto';   
 
        echo"<div class='mapa' style='height: 500px; width: 700px'>";
        
		echo"<div id='map_canvas'>";
        echo"</div>";
	
        echo"</div>";      
	  echo"</div>";
      
 
      
        ?>
        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=ColoqueASuaKeyAqui&amp;sensor=false"></script>
 
        <!-- Arquivo de inicialização do mapa -->
        <script src="js/mapa.js"></script>  
        
</div>
   <!--FIM-->
     
    <!-- Footer -->
<footer>
<?php include "rodape.php"; ?>
    <!-- fim footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-294778-1']);
	_gaq.push(['_trackPageview', document.location.pathname + document.location.search + document.location.hash]);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
	
</footer>
</body>

</html>
