<?php 
@session_start();

require_once('function.php');

if(logadoUsuario() || logadoAdm()){
  header('Location: ../index.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/color.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body >
  <?php require_once('../navbar-index.php'); ?>
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col s12 ">
          <ul class="tabs center">
            <li class="tab col s6"><a class="active"  href="#test1">Já sou cadastrado</a></li>
            <li class="tab col s6"><a href="#test2">Quero criar minha conta</a></li>
          </ul>
        </div>
        <div id="test1" class="col s12">
          <div class="card-panel">
            <div class="card-content">
              <?php if($_SESSION['msgLogin'] != ''): ?>
                <p id='retorno'><?php echo $_SESSION['msgLogin']; unset($_SESSION['msgLogin']); ?></p>
              <?php endif; ?>
              <h4 class="card-title center">Já sou cliente</h4>
              <div class="row">
                <form class="col s12" method="POST" action="logar.php">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" type="email" name="email" class="validate">
                      <label for="email">E-mail</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="senha" type="password" name="senha" class="validate">
                      <label for="senha">Senha</label>
                    </div>
                    <div class="input-field col s12 m12 right-align">
                      <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Enviar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="test2" class="col s12">
          <div class="card-panel">
            <div class="card-content">
              <h4 class="card-title center">Quero criar minha conta</h4>
              <div class="row">
                <div class="col s12">
                  <br>
                  <span>Dados</span>
                </div>
                <div class="input-field col s12 m12">
                  <input id="nomeCad" required type="text" class="validate verifyEach">
                  <label for="nomeCad">Nome</label>
                </div>
                <div class="input-field col s12 m8">
                  <input id="emailCad"  required type="email" class="validate verifyEach">
                  <label for="emailCad">Email</label>
                  <div id='emailConf'></div>
                </div>
                <div class="input-field col s12 m4">
                  <input id="cpfCad"  required size="11" maxlength="11" type="number" class="validate verifyEach">
                  <label for="cpfCad">CPF</label>
                  <div id='cpfConf'></div>
                </div>
                <div class="input-field col s12">
                  <input id="senhaCad"  required type="password" class="validate verifyEach">
                  <label for="senhaCad">Senha</label>
                </div>
                <div class="input-field col s12">
                  <input id="senhaConfCad"  required type="password" class="validate verifyEach">
                  <label for="senhaConfCad" id='msgSenha'>Confirmar senha</label>
                </div>
                <div class="col s12">
                  <br>
                  <div class="divider"></div>
                  <span>Endereço</span>
                </div>
                <div class="input-field col s12 m8">
                  <input id="cepCad"  required  size="9" maxlength="9" onkeyup="verificarCEP();" type="number" class="validate">
                  <label for="cepCad">CEP</label>
                </div>
                <div class="input-field col s12 m4">
                  <input id="estadoCad" required placeholder="" readonly type="text" class="validate verifyEach">
                  <label for="estadoCad">UF</label>
                </div>
                <div class="input-field col s12 m9">
                  <input id="cidadeCad" required placeholder="" readonly type="text" class="validate verifyEach">
                  <label for="cidadeCad">Cidade</label>
                </div>
                <div class="input-field col s12 m3">
                  <input id="numeroCad" required type="text" class="validate verifyEach">
                  <label for="numeroCad">Número</label>
                </div>
                <div class="input-field col s12">
                  <input id="logradouroCad" required placeholder="" readonly type="text" class="validate verifyEach">
                  <label for="logradouroCad">Logradouro</label>
                </div>
                <div class="input-field col s12 right-align">
                  <button class="btn waves-effect waves-light red darken-4" id="enviar">Cadastrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../footer.php'); ?>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../bibliotecas/materialize/js/materialize.min.js"></script>
    <script>
    $(".button-collapse").sideNav();
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      var nome = $('#nomeCad').val();
      var email = $('#emailCad').val();
      var cpf = $('#cpfCad').val();
      var senha = $('#senhaCad').val();
      var cep = $('#cepCad').val();
      var estado = $('#estadoCad').val();
      var cidade = $('#cidadeCad').val();
      var numero = $('#numeroCad').val();
      var endereco = $('#logradouroCad').val();

      if(nome != '' || email != '' || cpf != '' || senha != '' || cep != '' || estado != '' || cidade != '' || numero != '' || endereco != ''){
        $('#enviar').attr('disabled', true);
      }else{
       $('#enviar').attr('disabled', false);
     }
   });
 </script>
 <script type="text/javascript">
   $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
</script>
<script type="text/javascript">
  function verificarCEP(){
    var cep = $('#cepCad').val();
    $.ajax({
      url:'../usuario/Controller/cep.php',
      method: 'GET',
      data: {cep: cep},
      dataType: 'json'
    }).done(function(json){
      if(typeof json === "object"){
        $('#logradouroCad').val("");
        $('#cidadeCad').val("");
        $('#estadoCad').val("");

        $('#logradouroCad').val(json['logradouro']);
        $('#cidadeCad').val(json['localidade']);
        $('#estadoCad').val(json['uf']);
      }
    });
  }
</script>
<script>
	$('#senhaConfCad').keyup(function(){
		var senha = $('#senhaCad').val();
		var senhaConf = $('#senhaConfCad').val();

		if(senha != ''){
			if(senha == senhaConf){
        $('#senhaCad').removeClass("errado");
        $('#msgSenha').removeAttr("data-error");
        $('#msgSenha').removeAttr("data-success");
        $('#senhaConfCad').removeClass("valid");
        $('#msgSenha').attr("data-success", "OK");
			}else{
        $('#senhaCad').removeClass("errado");
        $('#msgSenha').removeAttr("data-error");
        $('#senhaConfCad').removeClass("valid");
        $('#msgSenha').removeAttr("data-success");
        $('#senhaCad').addClass("errado");
        $('#msgSenha').attr("data-error", "As senhas não correspondem");
			}
		}

	});
</script>
<script>
  $('#senhaCad').keyup(function(){
    var senha = $('#senhaCad').val();
    var senhaConf = $('#senhaConfCad').val();

    if(senha != ''){
      if(senha == senhaConf){
        $('#senhaCad').removeClass("errado");
        $('#msgSenha').removeAttr("data-error");
        $('#msgSenha').removeAttr("data-success");
        $('#senhaConfCad').removeClass("valid");
        $('#msgSenha').attr("data-success", "OK");
      }else{
        $('#senhaCad').removeClass("errado");
        $('#msgSenha').removeAttr("data-error");
        $('#senhaConfCad').removeClass("valid");
        $('#msgSenha').removeAttr("data-success");
        $('#senhaCad').addClass("errado");
        $('#msgSenha').attr("data-error", "As senhas não correspondem");
      }
    }

  });
</script>
<script>
  $('#emailCad').keyup(function(){
    var email = $('#emailCad').val();
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(filter.test(email)){
      $.ajax({
        url: '../usuario/Controller/EmailandLogin.php',
        method: 'GET',
        data: {email: email},
        dataType: 'html'
      }).done(function(html){
        if(html == 'Disponível'){
          $('#emailCad').removeClass('errado');
          $('#emailConfirmar').remove();
          $('#emailConf').append("<p id='emailConfirmar' class='green-text'>"+html+"</p>");
        }else{
          $('#emailCad').removeClass('errado');
          $('#emailConfirmar').remove();
          $('#emailConf').append("<p id='emailConfirmar' class='red-text'>"+html+"</p>");
          $('#emailCad').addClass('errado');
        }
      });
    }else{
      $('#emailCad').removeClass('errado');
      $('#emailConfirmar').remove();
      $('#emailConf').append("<p id='emailConfirmar' class='red-text'>Formato de email inválido.</p>");
      $('#emailCad').addClass('errado');
    }
  });
</script>
<script>
  $('#cpfCad').keyup(function(){
    var cpf = $('#cpfCad').val();

    $.ajax({
      url: '../usuario/Controller/EmailandLogin.php',
      method: 'GET',
      data: {cpf: cpf},
      dataType: 'html'
    }).done(function(html){
      if(html == 'Disponível'){
        $('#cpfCad').removeClass('errado');
        $('#cpfConfirmar').remove();
        $('#cpfConf').append("<p id='cpfConfirmar' class='green-text'>"+html+"</p>");
      }else{
        $('#cpfCad').removeClass('errado');
        $('#cpfConfirmar').remove();
        $('#cpfConf').append("<p id='cpfConfirmar' class='red-text'>"+html+"</p>");
        $('#cpfCad').addClass('errado');
      }
      
    });
  });
</script>
<script>
  $('#enviar').click(function(){
    var nome = $('#nomeCad').val();
    var email = $('#emailCad').val();
    var cpf = $('#cpfCad').val();
    var senha = $('#senhaCad').val();
    var cep = $('#cepCad').val();
    var estado = $('#estadoCad').val();
    var cidade = $('#cidadeCad').val();
    var numero = $('#numeroCad').val();
    var endereco = $('#logradouroCad').val();
    var botao = 'Salvar';

    if(nome != '' || senha != '' || cpf != '' || email != '' || cep != '' || estado != '' || numero != '' || cidade != '' || endereco != ''){
      if($('#cpfCad').hasClass('errado') || $('#emailCad').hasClass('errado') || $('#senhaCad').hasClass('errado')){
       Materialize.toast('Os campos devem estar corretos!', 4000);
     }else{
      $.ajax({
        url: '../usuario/Controller/Controller.php',
        method: 'POST',
        dataType: 'html',
        data: {nome: nome, email: email, cpf: cpf, senha: senha, cep: cep, estado: estado, cidade: cidade, numero: numero, endereco: endereco, botao: botao}
      }).done(function(html){
        location.reload();
      });
    }
  }else{
    Materialize.toast('Preencha todos os campos!', 4000);
  }
});
</script>
</body>
</html>