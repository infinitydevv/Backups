<?php 
  session_start();
  require_once('conexao/Conexao.php');
  require_once('usuario/Class/Usuario.php');
  require_once('login/functions.php');
  
  if(!logado()){
    header('Location: login.php');
    exit;
  }

  $u = new Usuario();
  $u->setId_u($_SESSION['idUser']);
  $rs1 = $u->listarUsuarioId();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/perfil.css">
  </head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand" href="#"><img src="../img/logoglauber.png" width="55"><span style="color: #fff!important;" class="display-5 text-center" id="nome"><?php echo $_SESSION['nomeUser']; ?></span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#"><img src="../img/home.png"> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sobre"><img src="../img/iinfox.png"> Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php"><img src="../img/iserv.png"> Serviços</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#instagram"><img src="img/mail.png"> Instagram</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#conto"><img src="../img/ibook.png"> Canto do Conto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login/sair.php">Sair</a>
              </li>
        </ul>
      </div>
    </nav>
     <div class="container-fluid">
      <div class="row">
        <div class="col-3 fixed-top" id="col-3-menu">
          <div class="">
            <img src="../img/logoglauber.png" class="img-fluid rounded mx-auto d-block" id="logo" width="200">
            <h1 class="display-5 text-center" id="nome"><?php echo $_SESSION['nomeUser']; ?></h1>
            <hr class="hrs">
            <div id="re"></div>
            <ul class="nav flex-column">
              <li class="nav-item as">
                <a class="nav-link" href="#"><img src="../img/home.png"> Home</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#sobre"><img src="../img/iinfox.png"> Sobre</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="index.php"><img src="../img/iserv.png"> Serviços</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#instagram"><img src="../img/mail.png"> Instagram</a>
              </li>
              <li class="nav-item as">
                <a class="nav-link" href="#conto"><img src="../img/ibook.png"> Canto do Conto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login/sair.php">Sair</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-12 col-md-9 float-right">
          <div class="container bloco-container">
            <h1 style="color: #474747!important;" class="text-center">Este é seu Perfil, você pode gerenciar usuários e contos.</h1>
            <br>
            <div class="row text-center">
              <div class="col-12 col-sm-6 item-menuu">
                <a href="usuario/index.php"><img src="img/usuario-icon.png"><br><span class="text-center">Usuários</span></a>
              </div>
              <div class="col-12 col-sm-6 item-menuu">
                <a href="canto-do-conto/index.php"><img src="img/conto-icon.png"><br><span class="text-center">Contos</span></a>
              </div>
            </div>
            <div>
                  <h1 style="color: #474747!important;">Seus Dados</h1>
                  <div class="row">
                    <div class="col-12 col-sm-6">                
                  <?php 
                    foreach ($rs1 as $r) {
                      echo "<div class='form-group'>
                              <label for='nomeu'>Nome:</label>
                              <input class='form-control form-control-sm' type='text' name='nome' id='nomeu' value='$r->nome_u'>
                              <input type='hidden' value='$r->id_u' id='id'>
                              <input type='hidden' value='editarA' id='botao'>
                            </div>";
                      echo "<div class='form-group'>
                              <label for='email'>Email:</label>
                              <input class='form-control form-control-sm' type='email' name='email' id='email' value='$r->email_u'><div id='rs'></div>
                            </div>
                            <div class='form-group'>
                              <label for='login'>Login:</label>
                              <input class='form-control form-control-sm' type='text' name='login' id='login' value='$r->login_u'><div id='rs1'></div>
                            </div>";
                    }
                    ?>
                    </div>
                    <div class='col-12 col-sm-6'>
                    <?php
                     echo "
                            <div class='form-group'>
                              <label for='senha'>Senha:</label>
                              <input class='form-control form-control-sm' type='password' name='senha' id='senha'>
                            </div><div id='forca'></div>";
                      echo "<div class='form-group'>
                              <label for='senhaC'>Confirmar sua senha:</label>
                              <input class='form-control form-control-sm' type='password' id='senhaC'><div id='conf'></div>
                            </div>";
                    ?>
                  	<div class='form-group'>
                  		<label for=""></label>
                      	<input type="button" id="buttonn" class="btn btn-dark btn-block" value='Editar'>
                  	</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="usuario/script.js"></script>
    <script>
    	$('#buttonn').click(function (){
    		var id = $('#id').val();
    		var nome = $('#nomeu').val();
    		var email = $('#email').val();
    		var login = $('#login').val();
    		var senha = $('#senha').val();
    		var botao = $('#botao').val();
    		$.ajax({
            url: "usuario/Controller/UsuarioControl.php",
            method: "POST",
            data: { id: id, nome: nome, email: email, login: login, senha: senha, botao: botao },
            dataType: "html",
            beforeSend : function(){
              $('#re').append('<img id="load" src="img/load.gif" width="200">');
            }
          }).done(function(html){
            $('#load').remove();
            $('#re').append(html);
          });
    	});
    </script>
  </body>
</html>