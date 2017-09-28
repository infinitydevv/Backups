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
      <title>Formuçário de Venda - Radar dos Imóveis</title>
      <!-- CSS da página --><link rel="stylesheet" href="css/pesquisarimovel3.css">
      <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
      <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
      <!-- Bootstrap CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/animate.css">
      <!-- Custom Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <link rel="icon" href="img/logo.png">
  </head>
  <body>
    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('navbar-top.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->

    <!-- BOTÃO PIXADO WHATSAPP -->
    <a href="https://api.whatsapp.com/send?phone=5551995513505" target="_blank" class="btn-fixado section-hide"><button type="button" class="btn btn-success btn-circle btn-lg"><img src="img/whats.png" class="right-block wpp"></button></a>
    <!-- BOTÃO PIXADO WHATSAPP -->

  <div class="container">
    <div class="row">

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
