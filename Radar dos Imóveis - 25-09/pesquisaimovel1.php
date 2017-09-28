<?php 
  //$nomeBanco = "radari";
 // $conexao = @mysql_connect("localhost","root","");
 // mysql_select_db($nomeBanco, $conexao);
 
 include"conectar.php";  
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="shadowbox/jquery.js" ></script>
    <script type="text/javascript" src="shadowbox/shadowbox.js" ></script>
    <link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css" />

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet" >

	<!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

   
<script>
	$('.carousel').carousel({
		interval: 3000
	})
</script>

<script type="text/javascript">
    Shadowbox.init({
    language: 'pt',
    players: ['img'],
    });
</script>
</head>


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
<body>


	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 text-center">
				<div class="caixapes">
          
					<H3>Resultado de sua consulta !!</H3>  
					
					  <?php
						$codigo = $_POST["codigo"];
						$tipo = $_POST["tipo"];
						$cidade = $_POST["cidade"];
						$bairro = $_POST["bairro"];
						$valor = $_POST["valores"];
						if($codigo !="" && $tipo !="" && $cidade!="" && $bairro!="" && $valor!=""){
							$sql = "SELECT * FROM imovel WHERE tipo like '%$tipo' or cidade like '%$cidade' or bairro like '%$bairro' or valorvendaimo between $valor";
						}else if ($codigo!=""){
							$sql = "select * from imovel where idimo = '$codigo'";
						}else if($tipo!=""){
							$sql = "SELECT * FROM imovel WHERE tipoimo like '%$tipo'";
						}else if($cidade != ""){
							$sql = "SELECT * FROM imovel WHERE cidade like '%$cidade'";
							
						}else if($bairro!=""){
							$sql = "SELECT * FROM imovel WHERE bairro like '%$bairro'";
						}else if($valor!=""){
						  if($valor == '<50000.00'){
						    $sql = "SELECT * FROM imovel WHERE  valorvendaimo $valor ORDER BY valorvendaimo ASC";
							
					      }else if($valor == '50000.00 and 100000.00'){
						    $sql = "SELECT * FROM imovel WHERE  valorvendaimo between $valor ORDER BY valorvendaimo ASC";
						  }else if($valor =='101000.00 and 200000.00'){
  						    $sql = "SELECT * FROM imovel WHERE valorvendaimo between $valor ORDER BY valorvendaimo ASC";
							//var_dump($sql);
					      }else if($valor =='201000.00 and 400000.00'){
						    $sql = "SELECT * FROM imovel WHERE valorvendaimo between $valor ORDER BY valorvendaimo ASC";
							
					      }else if($valor =='>400000.00'){
					        $sql = "SELECT * FROM imovel WHERE  valorvendaimo $valor ORDER BY valorvendaimo ASC";
					
						  }else{
						    $sql = "SELECT * FROM imovel";
					
					      }
						}
	   
						$res = mysql_query($sql,$conexao); 
						$linha = mysql_num_rows($res);
						 
							   
							   if($linha>0){
								while($dados = @mysql_fetch_object($res)){
					if($dados->ativo != 0){               
							   echo"<div class='ci'>";   
							   
						  
							//echo "<center><a href='$dados->foto1' ><img src='$dados->foto1' heigth='40%' width='30%' class='foto' alt='Foto de exibição'/></a></center><br>";	
							
							   echo "<style>.tip{text-size:24pt;}</style><center><span class='tip'>".$dados->tipoimo."</center></span><br>";   
							   if($dados->empreendimento == 1){
								    echo "<center>".$dados->nomeempreendimento."</center><br>";
							   }
							   
							   echo "<center><a href='".$dados->foto1."'rel='shadowbox[vocation]; width=750px; height=400px'  ><img src='".$dados->foto1."' width='35%' heigth='35%' class='foto' alt='Foto de exibição'/></a></center><br>";
							   echo "Código:".$dados->idimo."<br>";
							   echo "<span class='cidade'> $dados->cidade.</span><br>  ";
							   echo "Bairro:".$dados->bairro."<br>";               
							   if($dados->tipoimo == 'Casa' || $dados->tipoimo == 'Apartamento' )
  							   echo "Dormitórios:".$dados->numdormimo."<br>";
							   echo "Área: $dados->areaimo m² <br>";
							   if($dados->tipoimo == 'Terreno'){
									echo "Medidas: $dados->medidasimo <br>";
					           }
							   echo "Valor: R$ ".number_format($dados->valorvendaimo, 2,',','.')."";
									$id=$dados->idimo;
									echo "<center><br><a href='pesquisaimovel.php?id=$id'alt='Clique e veja mais detalhes deste imóvel!'> <img src='img/lupaimo.png' width='50px' heigth='60px' /></a> ";//src='img/buscar.png'
									//echo"  <a href='index.php' alt='Retorne a pagina inicial e pesquise outro!'><img src='img/voltar.png' /></center></a>";
									
								 echo"</div>";

							   }}
							   echo"<div class='ci'>";         
								  echo "<style>.ci {  margin:10px 20px 10px 20px; text-size:14pt; text-align:justify;width:250px;heigth:350px; }</style><p><b><center>NÃO ENCONTROU O QUE PROCURAVA?</center></b><p>";
								  echo " <br><p>Solicite o imóvel desejado ao Corretor, clicando no icone abaixo:<p> ";
								  echo" <center> <a href='formulariocomprador.php'alt ='Formulario de compra'><img src='img/rel.png' width=40px heigth=40px/></center></a>";
								echo"</div>";
							   
							   
							   }else{

								echo"<div class='ci'>";         
								  echo "<style>.ci {  margin:10px 20px 10px 20px; text-size:14pt; text-align:justify;width:250px;heigth:200px; }</style><p><b><center>NÃO ENCONTROU O QUE PROCURAVA?</center></b><p>";
								  echo " <br><p>Solicite o imóvel desejado ao Corretor, clicando no icone abaixo:<p> ";
								  echo" <center> <a href='formulariocomprador.php'alt ='Formulario de compra'><img src='img/rel.png' width=40px heigth=40px/></center></a>";
								echo"</div>";
							  }
						?>
        
				</div>
			</div>
		</div>
	</div>
   <!--   FIM-->
     

  

  

    <!-- Footer -->
<footer>
<?php include "rodape.php"; ?>
    <!-- fim footer -->
    <!-- jQuery 
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript 
    <script src="js/bootstrap.min.js"></script>
-->
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
</footer>
</body>

</html>
