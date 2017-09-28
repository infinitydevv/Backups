<!DOCTYPE html>
<html lang="pt-br">

<head>

<?php 

     @session_start();
	     if((!isset ($_SESSION['login_usuario']) == true) and (!isset ($_SESSION['senha_usuario']) == true)) { 
		 
		     unset($_SESSION['login_usuario']); 
			 unset($_SESSION['senha_usuario']); 
			 echo"<script type='text/javascript'> alert('Necessario fazer o Login!!'); </script>";
		echo"<meta http-equiv='refresh' content='0; url=index.php' />";
			 //header('location: index.php'); 
		} else{
		 @session_start();
		 $logado = $_SESSION['nomecompleto_usuario']; ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link href="css/stylish-portfolio.css" rel="stylesheet">
    
	<!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <center><img id="icone" width="100px" height="100px" src = "img/logonovo.png"/></center>
  

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        
		<?php include "cabecalho.php"; ?>
		
		
		
    </nav>
		
		
	
<!--


     </div>
        </div>
			</div>
				</div>
	
	
	-->
		<?php echo '<h1> Seja Bem Vindo, ' .$logado .'</h1>';}?>
	<?php include"rodape.php"; ?>
	<!--
	 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    
					<p>Todos os direitos reservados para <i>Radar dos Imóveis</i></p>
					
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	<style>
	#galeria img{width:100px;height:400px;display:block;}
	</style>

</body>

</html>
