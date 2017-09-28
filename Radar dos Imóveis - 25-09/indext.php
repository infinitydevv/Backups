<?php
 include"conectar.php";  
 ini_set('default_charset','UTF-8');
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">

    <title>Radar dos Imóveis</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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


</head>

<body>
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
                        <a href="#top" onclick = $("#menu-close").click();>Home</a>
                    </li>
                    <li>
                        <a href="#about" onclick = $("#menu-close").click();>Sobre</a>
                    </li>
                    <li>
                        <a href="#services" onclick = $("#menu-close").click();>Serviços</a>
                    </li>
                    <li>
                        <a href="login.php" onclick = $("#menu-close").click();>Administrativo</a>
                    </li>
                  
                </ul>
            </div>
            
        </div>
      </nav>
<!-- <header id="top" class="header"> -->
	<div class="container">	
		<div class="form-group row">
			<div class="col-xs-12">
				<span class="comprar"><br><br> <h2>QUER COMPRAR? <br>Faça a pesquisa:</h2></span>
				
			</div>
		</div>
						
		
		<div class="form-group row">
			<form class="pesquisa" name="pesquisa" method="POST" action="pesquisaimovel1.php">

				<div class="form-group col-xs-2">
					<!--<label for="Codigo">Código:</label-->
					<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
				</div>
			
				<!--<div class="col-xs-2">
					<label for="Valor">Código:</label><br>
					<input type="text" name="codigo" maxlength="5"size="10" placeholder="Informe Cód.">
				</div> -->
				<div class="col-xs-2">
					<!--label for="tipo">Imóvel:</label-->
					<select name="tipo" class="form-control" id="tipo" placeholder="Imóvel">
						<?php
							$sql = "select DISTINCT tipoimo  from imovel";
							$resultado = mysql_query($sql,$conexao); 
							echo"<option value = ''>Imóvel</option>";
							while($dados = mysql_fetch_array($resultado)){
								$nome = $dados['tipoimo'];
								echo"<option value = '$nome'>$nome</option>";
							}       
						?>
					</select>
				</div>
				<div class="col-xs-2">
					<!--label  for="cidade">Cidade:</label-->
					<select name="cidade"  class="form-control" id="cidade" placeholder="Cidade">
						<?php
							$sql = "select DISTINCT cidade  from imovel";
							$resultado1 = mysql_query($sql,$conexao); 
							echo"<option value = ''>Cidade</option>";
							while($dados = mysql_fetch_array($resultado1)){
								$nome = $dados['cidade'];
								echo"<option value = '$nome'>$nome</option>";
							}       
						?>

					</select>
				</div>
				<div class="col-xs-2">
					<!--label for="Bairro">Bairro:</label-->
					<select  name="bairro"  class="form-control" id="bairro" placeholder="Bairro">
						<?php
							$sql = "select DISTINCT bairro  from imovel ";
							$resultado2 = mysql_query($sql,$conexao); 
							echo"<option value = ''>Bairro</option>";
							while($dados = mysql_fetch_array($resultado2)){
								$nome = $dados['bairro'];
								echo"<option value = '$nome'>$nome</option>";
							}       
						?>
					</select>
				</div>
				<div class="col-xs-2">
					<!--label for="Valor">Valores:</label-->
					<select name="valores" class="form-control" id="valores" placeholder="Valor">
						<option value = ">=0">Valor</option>";
						<option value = "<50000.00">Abaixo de 50 mil</option>";
						<option value = "50000.00 and 100000.00">entre 50 mil e 100 mil </option>";
						<option value = "101000.00 and 200000.00">entre 101 mil e 200 mil </option>";
						<option value = "201000.00 and 400000.00">entre 201 mil e 400 mil </option>";
						<option value = ">400000.00">Acima de 400 mil </option>";
					</select>
				</div>
				
				<div class="col-xs-2">
					<input class="btn btn-success" type="submit" value="Pesquisar" />   
				</div>
				
			</form>
		</div>
	</div>
		
	<div class="container">		
		<div class="row">
			<div class = "col-xs-8 col-md-8">
				
					
					<h2>QUER VENDER ? <BR>Selecione a cidade: </h2>
			</div>
			<div class="col-xs-4">	
					<img class="log" src="img/logonovo.png" width="30%" heigth="30%" alt="Radar dos Imóveis" title=""  />
				</div>
		</div>		
			
		<div class="form-group row">
			<div class="col-xs-3">
				<form class="corretor1" name="corretor1" method="POST" action="formulariovenda.php">
					<input type="hidden" name="cod" id="cod" value="<?php echo $id ?>" />
					<select name="corr" class="form-control" id="corr" style="width:150px">
						<option value = '0'>Selecione</option>
						<option value = '1'>Canoas</option>
						<option value = '2'>Esteio</option>
						<option value = '3'>Sapucaia do Sul</option>
						<option value = '4'>São Leopoldo</option>
						<option value = '5'>Novo Hamburgo</option>
						<option value = '6'>Dois Irmão</option>
						<option value = '7'>Ivoti</option>
						<?php/*
							$sql = "select * from usuario where (funcao = 'Corretor' or funcao = 'Avaliador' or funcao = 'Franqueado')";
							$resultado1 = mysql_query($sql,$conexao); 
							echo"<option value = ''>Selecione</option>";
							while($dados = mysql_fetch_array($resultado1)){
								$id=$dados['idusu'];
								$nome = $dados['cidade'];
								echo"<option value = '$id'>$nome</option>";	
							}  */
					   ?>
					</select>
					
			</div>
			<div class="row">
				<div class="col-xs-2">
					<input type="submit" class="btn btn-success"  value="Vender" />
				</form>
				</div>
			
			
				
			</div>
		</div>
			
				
	
		
	</div>
   <!--FIM-->
  
<!--</header> -->
	<div class="container-fluid">
		<div class="row">
            <div class="col-xs-12 col-lg-12 text-center">
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
					  <a href='http://www.radardosimoveis.com.br/formulariocomprador.php'> <img src="img/slider/faixa4.jpg" alt="...">
					 </a>
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
					  <a href='http://www.radardosimoveis.com.br/formulariovenda.php'><img src="img/slider/faixa6.jpg" alt="..."></a>
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
			</div>
		</div>
	</div>

    
    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Quem somos?</h2> <!--class="lead"-->
                    <p >O Radar dos Imóveis é a organização de corretores de imóveis para promover resultados.
						Este esforço conjunto passa a oferecer uma gama de serviços diferenciados para a promoção 
						de negócios imobiliários, disponibilizando aos clientes:
					</p>

                  
					<ul>
					<li>Presença em toda a região metropolitana de Porto Alegre para encontrar ou vender o seu imóvel;</li>
					<li>Força de venda qualificada e multiplicada pela ação direta dos corretores de imóveis em 
						cada município da região de forma ágil e comprometida pela busca das melhores oportunidades;</li>
					<li>Site de busca de ofertas e de corretores de imóveis por município;</li>
					<li>Serviço de ponta a ponta: profissionais habilitados para lhe auxiliar na resolução de problemas com 
					documentação, compra, venda, avaliação e para prestar todo o suporte relativo ao financiamento imobiliário.</li>
					</ul>
					<p>O Radar dos Imóveis surgiu da experiência comercial e de gestão do professor Dalmo Souza, Especialista
					 em Administração e Mestre em Educação, na busca por desenvolver um modelo de negócios imobiliários de 
					 forma direta, simples e eficaz, envolvendo pessoas e promovendo resultados. </p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Serviços</h2>
                    <hr class="small">
				</div>
			</div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
							 <img class="" src="img/representacaop.png"> <br><br>
                        </span>
                        <h4><strong>COMPRA E VENDA</strong></h4>
                        <p>Representação na compra e venda de imóveis residenciais e comerciais.</p>
                        <a href="representacao.php" class="btn btn-light">Descubra mais</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
							<img class="" src="img/suporte.png"> <br><br>
                        </span>
                            <h4><strong>DOCUMENTAÇÃO</strong></h4>
                            <p>Regularização documentos: escrituras, inventários, IPTU, registros e toda documentação do seu imóvel.</p>
                            <a href="suporte.php" class="btn btn-light">Descubra mais</a>
                    </div>
                </div>
				
				<div class="col-md-4">
                    <div class="service-item">
						<span class="fa-stack fa-4x"> 
						   <i class="fa fa-circle fa-stack-2x"></i>
						   <i class="fa fa-shield fa-stack-1x text-primary"></i>
						</span>
						<h4><strong>AVALIAÇÃO DE IMÓVEIS</strong></h4>
						<p>Avaliação para compra e venda, inclusive em processos judiciais.</p>
						<a href="doci.php" class="btn btn-light">Descubra mais</a>
					</div>
                </div>
            </div>
		</div>
    </section>

   <!--  Footer -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Radar dos Imóveis</strong>
                    </h4></br>
                    <p>Esteio - RS</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>(51)9551-3505</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:dalmo@radardosimoveis.com.br">dalmo@radardosimoveis.com.br</a></li>
                        </li>
                    </ul>
                    
                    <ul class="list-inline">
                        <li>
                            <a href="www.facebook.com/radardosimoveis"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                       
                    </ul>
                    <hr class="small">
                    
					<p class="text-muted">Todos os direitos Reservados &copy; </br>Por Jeferson Leon - 2015</p>
                </div>
            </div>
        </div>
    </footer> 
<!-- <?php// include "rodape.php"; ?>-->
    <!-- jQuery 
    <script src="js/jquery.js"></script>
-->
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

</body>

</html>
