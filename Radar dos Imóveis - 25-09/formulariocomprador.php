<?php
$nomeBanco = "radardosimovei";
$conexao = @mysql_connect("mysql.radardosimoveis.com.br","radardosimovei","Radar2015");
mysql_select_db($nomeBanco, $conexao);
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
    <!-- CSS da página --><link href="css/formulariovenda1.css" rel="stylesheet">
    <!-- CSS do footer.php --><link rel="stylesheet" href="css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="css/navbar-top.css">
    <!-- Bootstrap Core CSS --><link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Biblioteca CSS para animação da logo --><link rel="stylesheet" href="css/
   animate.css">

    <link rel="icon" href="img/logo.png">
      <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>

    <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('navbar-top.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->

  <div class="section-principal-show">
    <div class="container">
      <h1 class="text-center texto-laranja">Quero Comprar</h1>
      <div class="row">
        <div class="col-xs-12 col-sm-8
        col-md-8 gg">
          <h2 class="text-center">Por favor, preencha o formulario e nos envie seu contato!
Iremos contata-lo em horário comercial.</h2>
          <form action="formularioC.php" method="post">
            <div class="form-group">
              <label for="nome" class="texto-laranja" >Nome completo:</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
              <label for="fone" class="texto-laranja">Fone(WhatsApp/Celular/Residêncial):</label>
              <input type="text" class="form-control" id="fome" name="fone" placeholder="+55 (51)99999-9999 ">
            </div>
            <div class="form-group">
              <label for="email" class="texto-laranja">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@gmail.com">
            </div>
            <div class="form-group">
              <label for="obs1" class="texto-laranja">Configuração do imóvel (casa, terreno, apto, rural, nº dormitórios, tamanho...):</label>
              <textarea class="form-control" rows="4" maxlength="500" name="obs1"></textarea>
            </div>
            <div class="form-group">
              <label for="obs2" class="texto-laranja">Localização do imóvel (cidade, bairro, referências, rua, número...):</label>
              <textarea class="form-control" rows="4" maxlength="500" name="obs2"></textarea>
            </div>
            <div class="form-group">
              <label for="obs3" class="texto-laranja">Valores e condições (à vista, parcelamentos, trocas...):</label>
              <textarea class="form-control" rows="4" maxlength="500" name="obs3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning btn-lg btn-block">Enviar</button>
          </form>
        </div>
        <div class="col-xs-12 col-sm-4
        col-md-4">
          <h2 class="text-center">Corretores</h2>
          <?php
            $id = $_POST["corr"];
            if($id != 0){
              $sql = "SELECT * FROM usuario WHERE idusu = $id";
              $res = mysql_query($sql,$conexao);
              $dados = @mysql_fetch_object($res);

                echo "
                  <div class='cartao text-center center-block'>
                    <h3>Corretor em ".$dados->cidade."</h3>
                    <img src='usuario/fotos/".$dados->foto."' class='avatar' alt='Avatar'>
                    <h3>".$dados->nome."</h3>
                    <a href='https://api.whatsapp.com/send?phone=55".$dados->fonecel."' target='_blank'><img src='img/whats.png' width='30px'> ".$dados->fonecel."</a><br><br>
                    <img src='img/icons/mail.png' width='30px'><span> ".$dados->email."</span>
                  </div>";
            }else{
              $sql = "SELECT * FROM usuario WHERE idusu = 4";
              $res = mysql_query($sql,$conexao);
              echo $id;
              $dados = @mysql_fetch_object($res);

                echo "
                  <div class='cartao text-center center-block'>
                    <h3>Corretor em ".$dados->cidade."</h3>
                    <img src='usuario/fotos/".$dados->foto."' class='avatar' alt='Avatar'>
                    <h3>".$dados->nome."</h3>
                    <a href='https://api.whatsapp.com/send?phone=55".$dados->fonecel."' target='_blank'><img src='img/whats.png' width='30px'> ".$dados->fonecel."</a><br><br>
                    <img src='img/icons/mail.png' width='30px'><span> ".$dados->email."</span>
                  </div>";
            }
          ?>
        </div>
      </div>
    </div>
  </div>


    <!-- footer.php e footer.css no head -->
    <?php include('footer.php'); ?>
    <!-- FIM footer.php e footer.css no head -->

</body>
</html>

          <!--        <form action="formularioC.php" method="post">

                   <input type="hidden" name="var" id="var" value="<?php print $dados['email'] ?>" />         
                    <div class="form-group">
                      <label for="nome">Nome Completo</label>
                      <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    
                    <div class="form-group">
                       <label for="telefone">Telefone Celular:</label>
                       <input type="tel" class="form-control" id="fone" name="fone">
                    </div>

                    <div class="form-group">
                       <label for="fixo">Telefone Fixo:</label>
                       <input type="tel" class="form-control" id="fone" name="fone">
                    </div>
                    
                    <div class="form-group">
                       <label for="email">E-mail:</label>
                       <input type="text" class="form-control" id="email" name="email">
                    </div>
                    
                   ENDEREÇO 
                  
                    <div class="form-group">
                      <label for="obs1">Descrição do Imóvel Desejado (casa, terreno, apto, rural, nº dormitórios, tamanho...):</label>
                       <textarea rows="10" cols="160" maxlength="500" name="obs1"></textarea>
                    </div>
              
                  
                  <br />              
            
                   <div class="form-group">
                     <label for="obs2">Localização do imóvel (cidade, bairro, referências, rua, número...):</label>
                       <textarea rows="10" cols="160" maxlength="500" name="obs2"></textarea>
                    </div>
                  
                    <div class="form-group">
                       <label for="obs3">Valores e condições (à vista, parcelamentos, trocas...):</label>
                       <textarea rows="10" cols="160" maxlength="500" name="obs3"></textarea>
                    </div>

                  
                  <br />
                    <div class="form-group">
                       <input type="submit">
                       <input type="reset" value="Limpar">
                    </div>-->