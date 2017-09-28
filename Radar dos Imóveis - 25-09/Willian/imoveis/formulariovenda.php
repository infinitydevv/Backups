<?php 
 // $nomeBanco = "radari";
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

    

  <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">  <!--<h1> Formulário - Quero Vender</h1> <br />-->

<?php
function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}                 
                 
                 // import_request_variables("P");
            //   if(isset($_POST["botaoc"])){
				  if(isset($_POST['cod'])){
					  $cod = $_POST['cod'];
				  }
				  
                  $cod = $_POST['corr'];
                                  
				if(!empty($cod)){
                  $sql = "select * from usuario where idusu = $cod";
                  $resultado2 = mysql_query($sql,$conexao); 
                        
                  $dados = mysql_fetch_array($resultado2); 
                  $nome = $dados['nome'];
                  $fone = $dados['fonecel'];                    
                  $fone = Mask("(##)####-####",$fone);
                  $foto = $dados['foto'];
                  $email = $dados['email'];
                }
     
                  if(!empty($nome)){
                      echo"<style> .c1{ position:relative; border-radius:15px;left:10px; top:10px;color:white;
                                         font-family:helvetica;font-size:12pt;padding:5px;width:500px;
                                         height:auto;text-align:center; background-color: #FF8000;}
                                    .c1 p{text-align:justify; color:white;}
                                         </style>";
                  /* copia
                       <div class='c2'><img src='upload/foto1.jpg'width='150px'height='150px'>
                                         <span class='tex'>SEU CORRETOR<br><br>
                                         Dalmo Souza <br>
                                         <img src='img/wp.png'> (51)9551-3505 dalmo@radardosimoveis.com.br<br><br><br></span></div>";
                  */

                      echo"<div class='c1'> <h1>Quero Vender</h1><br>Por favor, preencha o formulario e nos envie seu contato!<br>Iremos contata-lo em horário comercial. <br><br></font></div>";
                      /*
                                    echo "<style> .c2{ position:absolute; border-radius:15px;left:700px; top:10px;color:white;
                                         font-family:helvetica;font-size:12pt;padding:5px;width:450px;
                                         height:170px;text-align:left; background-color: #FFA500;}
                                     .tex{position:absolute; left:160px; font-weight: bold;padding-top:10px;padding-bottom:25px;}
                                     .c2 img{padding:5px;}
                      */

                      echo "<style> .c2{ position:absolute; border-radius:15px;left:700px; top:10px;color:white;
                                         font-family:helvetica;font-size:12pt;padding:5px;width:450px;
                                         height:170px;text-align:left; background-color: #FF8000;}
                                     .tex{position:absolute; left:160px; font-weight: bold;padding-top:10px;padding-bottom:25px;}
                                     .c2 img{padding:5px;}
                                         </style>
                                         <div class='c2'><img src='../usuario/fotos/$foto'width='150px'height='150px'>
                                          <span class='tex'>SEU CORRETOR<br><br>
                                          $nome <br>
                                          <img src='img/wp.png' > $fone  $email<br><br><br></span></div>";

                  }else{
                    echo"<style> .c1{ position:relative;border-radius:15px; left:10px; top:10px;color:white;
                                         font-family:helvetica;font-size:12pt;padding:5px;width:500px;
                                         height:auto;text-align:center; font-weight: bold;background-color: #FF8000;}
                                    .c1 p{text-align:justify; color:white;font-weight: bold;}
                                         </style>";




                      echo"<div class='c1'> <h1> Quero Vender</h1><br>Por favor, preencha o formulario e nos envie seu contato!<br>Iremos contata-lo em horário comercial. <br><br></font></div>";
                      echo "<style> .c2{ position:absolute; border-radius:15px;left:700px; top:10px;color:white;
                                         font-family:helvetica;font-size:12pt;padding:5px;width:450px;
                                         height:170px;text-align:left; background-color: #FF8000;}
                                     .tex{position:absolute; left:160px; font-weight: bold;padding-top:10px;padding-bottom:25px;}
                                     .c2 img{padding:5px;}
                                     </style>
                                         <div class='c2'><img src='upload/foto1.jpg'width='150px'height='150px'>
                                         <span class='tex'>SEU CORRETOR<br><br>
                                         Dalmo Souza <br>
                                         <img src='img/wp.png'> (51)9551-3505 dalmo@radardosimoveis.com.br<br><br><br></span></div>";
                  }
          // }else{
          //  echo "<br>Por favor preencha o formulario e nos envie seu contato! <br>Iremos ajuda-lo o mais rápido possível!";
          // }
          ?>



<br>

                  <form action="formulario.php" method="post">

                   <input type="hidden" name="var" id="var" value="<?php print $dados['email'] ?>" />         
                    <div class="form-group">
                      <label for="nome">Nome Completo</label>
                      <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    
                    <div class="form-group">
                       <label for="telefone">Fone (whatsapp/Cel/Res):</label>
                       <input type="tel" class="form-control" id="fone" name="fone">
                    </div>
                    
                    <div class="form-group">
                       <label for="email">E-mail:</label>
                       <input type="text" class="form-control" id="email" name="email">
                    </div>
                    
                  <!-- ENDEREÇO -->
                  
                    <div class="form-group">
                      <label for="obs1">Configuração do imóvel (casa, terreno, apto, rural, nº dormitórios, tamanho...):</label>
                       <textarea rows="10" cols="160" maxlength="500" name="obs1"></textarea>
                    </div>
              
                  
                  <br />              
            
                   <div class="form-group">
                     <label for="obs2">Localização do imóvel (cidade, bairro, referências, rua, número...):</label>
                       <textarea rows="10" cols="160" maxlength="500" name="obs2"></textarea>
                    </div>
                  
                    <div class="form-group">
                       <label for="obs3">Valores e condições (à vista, parcelamentos, trocas...):</label><br>
                       <textarea rows="10" cols="160" maxlength="500" name="obs3"></textarea>
                    </div>

                  
                  <br />
                    <div class="form-group">
                       <input type="submit">
                       <input type="reset" value="Limpar">
                    </div>


                  
                  </form>

 </div>
</div>
  

  
  <?php include "rodape.php";?>

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