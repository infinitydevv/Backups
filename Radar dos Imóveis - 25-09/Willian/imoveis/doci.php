<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">

    <title>Radar dos Imóveis</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio1.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--adicione esta linha. Note que dei o nome de Projeto para o arquivo e que o mesmo possui extensão .css-->
    <link href="Projeto.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<!--Referencia ao Jquery-->
<script type="text/javascript" src="Projeto.js"></script><!--Referencia ao arquivo externo Javascript-->

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <a href="#representa" onclick = $("#menu-close").click();>Suporte</a>
                    </li>
                   
                  
                </ul>
            </div>
            
        </div>
      </nav>
      <!-- // Menu da aplicação -->

    <!-- Header -->
    <header id="top" class="header1">
        <div class="text-vertical-center">
            <img src="img/bgC1.png" alt="Radar dos Imóveis" title="" width="50" height="50" />
    </header>

<section id="representa" class="representa">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
				<br><br>
                    <h1>AVALIAÇÃO DE IMÓVEIS</h1> <!--class="lead"-->
                    <p >O Radar dos Imóveis possui corretores com formação específica e registro no Cadastro 
					Nacional de Avaliadores de Imóveis – CNAI para realizar a avaliação do seu imóvel.</p>
					<p >Se a sua necessidade for vender, mas está inseguro sobre o quanto vale o seu imóvel 
					ou se deseja comprar, mas quer saber se o preço está de acordo com o mercado, chame o 
					Radar dos Imóveis.</p>

               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
	<center>
	<h1>AGENDE UM CONTATO</h1>
			<br/>
            <a href="formularioavaliacao.php" class="btn btn-dark btn-lg">Solicite Contato</a></center>
        </div>
	
	
	
    <!-- Footer -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Radar dos Imóveis</strong>
                    </h4>
                    <p>Esteio - RS</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>(51)9551-3505</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:dalmo@radardosimoveis.com.br">dalmo@radardosimoveis.com.br</a>
                        </li>
                    </ul>
                    <br><br>
                    <ul class="list-inline">
                        <li>
                            <a href="http://www.facebook.com/radardosimoveis"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                      
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Por Jeferson Leon - 2015</p>
                </div>
            </div>
        </div>
    </footer>

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

</body>

</html>
