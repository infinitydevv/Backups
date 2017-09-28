<?php 
  //$nomeBanco = "radari";
  //$conexao = @mysql_connect("localhost","root","");
  //mysql_select_db($nomeBanco, $conexao);
 
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

    <!-- Custom CSS -->
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
<div class="caixapes">
          <?php
                 
                 
                 // import_request_variables("P");
                // if(!isset($_POST["botao"])){
                      $cod = $_POST['corr'];
                                 
                          $sql = "select * from usuario where tipo = $cod";
                          $resultado2 = mysql_query($sql,$conexao); 
                        
                          $dados = mysql_fetch_array($resultado2); 
                          $nome = $dados['nome'];
                          $fone = $dados['fonecel'];                    
                        if($nome != ""){
                    
                          echo" O corretor que poderá auxilia-lo neste processo é:  $nome <br>";
                          echo "Ligue ou envie uma mensagem via WhatsApp para  $fone";

                    }else{
                      echo "<br>Por favor preencha o formulario e nos envie seu contato! <br>Iremos ajuda-lo o mais rápido possível!";
}
                    //  echo "não Clicou!";}
          ?>
          <!--
          <?php
              $msg=0;
              @$msg=$_REQUEST['msg'];
          ?>
          <?php if($msg==enviado): ?>
            <h1>Mensagem Enviada, agradecemos seu contato"</h1>
          <?php else: ?>
-->
  <fieldset>
    <legend> Formulário de Contato </legend>
    <form action="enviar.php" name="envia" id="envia" method="post">
      <br><br>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"> <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone"><br>
        <label for="assunto">Assunto</label>
        <input type="text" name="assunto" id="assunto"><br>
        <label for="mensagem">Mensagem</label>
        <textarea name="assunto" id="assunto" cols="30" rows="10"></textarea><br>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
        <input type="reset" name="limpar" id="limpar" value="Limpar">
    </form>
    </fieldset>
   <!-- <?php endif; ?>-->
    <!-- <a href="#" >VENDER</a> -->
    
   
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
</footer>
</body>

</html>