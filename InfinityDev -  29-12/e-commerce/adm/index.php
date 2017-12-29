<?php
@session_start();
 require_once('Class/Adm.php');
 require_once('DAO/AdmDAO.php');
 require_once('../Conexao/Conexao.php');
  require_once('../login/function.php');
 $c = new Conexao();
 $a = new Adm();
 $aDAO = new AdmDAO();

 if(!logadoAdm()){

    header('location: ../index.php');
    exit; 

}else{

 $valor = isset($_GET['valor']) ? $_GET['valor'] : '';
 $termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

 if($termo == 0){
  $rs = $aDAO->selectAdmAll(); 
 }else if($termo == 1){
  $a->setId_a($valor);
  $rs = $aDAO->selectAdm($a, $termo); 
 }else if($termo == 2){
  $a->setNome_a($valor);
  $rs = $aDAO->selectAdm($a, $termo); 
 }else if($termo == 3){
  $a->setEmail_a($valor);
  $rs = $aDAO->selectAdm($a, $termo); 
 }else if($termo == 4){
  $a->setLogin_a($valor);
  $rs = $aDAO->selectAdm($a, $termo); 
 }
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
  <title>E-Commerce - Administradores</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  
  <?php require_once('../navbar-adm.php'); ?>
  
  <div class="fixed-action-btn vertical">
    <a class="btn-floating btn-large grey darken-4 pulse">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a class="modal-trigger btn-floating green darken-1 tooltipped" data-target="modalCadastro" data-position="left" data-delay="50" data-tooltip="Cadastrar administrador"><i class="material-icons">person_add</i></a></li>
    </ul>
  </div>

  <div class="container">
   <div class="section">
    <div class="row">
      <div class="col s12">
        <h4><i class="medium material-icons">account_circle</i> Administradores</h4>
      </div>
      <div class="col s12">
        <form action='' method="GET">
          <div class="row">
            <div class="input-field col s12 m6">
              <input id="first_name" type="text" name='valor' class="validate">
              <label for="first_name">Pesquisar</label>
            </div>
            <div class="input-field col s12 m4">
              <select name='termo'>
                <option value="0" disabled selected>Selecione o método de busca</option>
                <option value="1">ID</option>
                <option value="2">Nome</option>
                <option value="3">E-mail</option>
                <option value="4">Login</option>
              </select>
              <label>Método de busca</label>
            </div>
            <div class="col s12 m2 center">
              <button class="btn waves-effect waves-light red" type="submit">
                <i class="material-icons">search</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="divider"></div>
</div>
<div class="container">
  <?php if(count($rs) > 0){ ?>
  <table class="responsive-table striped bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Login</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rs as $r){?>
        <tr>
          <th><?php echo $r->id_a; ?></th>
          <th><?php echo $r->nome_a; ?></th>
          <th><?php echo $r->email_a; ?></th>
          <th><?php echo $r->login_a; ?></th>
          <th>
            <button class="btn-floating waves-effect waves-light yellow" onclick="editarSelect(<?php echo $r->id_a; ?>);" type="submit" name="action"><i class="material-icons right">create</i></button>
            <button class="btn-floating waves-effect waves-light red" onclick="excluirSelect(<?php echo $r->id_a; ?>);" type="submit" name="action"><i class="material-icons right">close</i></button>
          </th>
        </tr>
        <?php } ?>
      <?php }else{ ?>
        <h3>Nenhum administrador cadastrado.</h3>
      <?php } ?>
    </tbody>
  </table>
</div>
<br>
<?php require_once('../footer.php'); ?>
<!-- Modal de cadastro do administrador -->
<div id="modalCadastro" class="modal">
  <div class="modal-content">
    <h4>Cadastro de Administrador</h4>
    <form class="col">
      <div class="row">
        <div class="col s12">
          <span>Dados</span>
        </div>
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6">
          <input id="login" type="text" class="validate">
          <label for="login">Login</label>
        </div>
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botao' value="Salvar" class='btn waves-effect waves-white red'>Salvar</button>
  </div>
</div>
<!--FIM Modal de cadastro do administrador -->

<!-- Modal de edição do administrador -->
<div id="modalEdicao" class="modal">
  <div class="modal-content">
    <h4>Edição de administrador</h4>
    <form class="col">
      <div class="row">
        <div class="col s12">
          <br>
          <span>Dados</span>
        </div>
        <div class="input-field col s6">
          <input id="nomeEdit" placeholder="" type="text" class="validate">
          <input id="idEdit" type="hidden">
          <label for="nomeEdit">Nome</label>
        </div>
        <div class="input-field col s6">
          <input id="loginEdit" placeholder="" type="text" class="validate">
          <label for="loginEdit">Login</label>
        </div>
        <div class="input-field col s12">
          <input id="emailEdit" placeholder="" type="email" class="validate">
          <label for="emailEdit">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="senhaEdit" placeholder="" type="password" class="validate">
          <label for="senhaEdit">Senha</label>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botaoEdit' value="Editar" class='btn waves-effect waves-white red'>Salvar Alterações</button>
  </div>
</div>
<!-- FIM Modal de edição do administrador -->

<!-- Modal de exclusão do administrador -->
<div id="modalExclusao" class="modal">
  <div class="modal-content">
    <h4>Deseja excluir este administrador?</h4>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botaoExc' class='btn waves-effect waves-white red'>Excluir</button>
  </div>
</div>
<!-- FIM Modal de exclusão do administrador -->

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../bibliotecas/materialize/js/materialize.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js'></script>
<!-- Método de ativar o modal no Materialize -->     
<script>
 $(".button-collapse").sideNav();
 $(document).ready(function(){
  $('.modal').modal();
});
</script>
<!-- Método de exclusão com modal -->
<script>
  function excluirSelect(id){
    $('#modalExclusao').modal('open');
    $('#botaoExc').click(function(){
    var botao = 'Excluir';
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{id: id, botao: botao},
      dataType:'HTML'
    }).done(function(html){
      if(html == 'OK Excluir'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Administrador Excluído<br>Aguarde 1 segundos', 1000);
       $('#modalExclusao').modal('close');
     }else{
      Materialize.toast('Erro', 1000);
    }
  });
  });
  }
</script>
<!-- Método de edição com modal -->
<script type="text/javascript">
  function editarSelect(id){
    $.ajax({
      url: 'Controller/SelectAdmId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'json'
    }).done(function(json){
      $('#idEdit').val(json[0]['id_a']);
      $('#nomeEdit').val(json[0]['nome_a']);
      $('#emailEdit').val(json[0]['email_a']);
      $('#loginEdit').val(json[0]['login_a']);
      $('#modalEdicao').modal('open');
    });
  }

  $('#botaoEdit').click(function(){
    var id = $('#idEdit').val();
    var nome = $('#nomeEdit').val();
    var email = $('#emailEdit').val();
    var senha = $('#senhaEdit').val();
    var login = $('#loginEdit').val();
    var botao = $('#botaoEdit').val();
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{id: id, nome: nome, email: email, senha: senha, login: login, botao: botao},
      dataType:'html'
    }).done(function(html){
      if(html == 'OK Editar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Administrador alterado<br>Aguarde 1 segundos', 1000);
       $('#modalEdicao').modal('close');
     }else{
      Materialize.toast(html, 1000);
    }
  });
  });
</script>
<!-- Método de cadastro com modal -->
<script type="text/javascript">
  $('#botao').click(function(){
    var nome = $('#nome').val();
    var login = $('#login').val();
    var email = $('#email').val();
    var senha = $('#senha').val();
    var botao = $('#botao').val();
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{nome: nome, email: email, senha: senha, login: login, botao: botao},
      dataType:'HTML'
    }).done(function(html){
      if(html == 'OK Salvar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Administrador cadastrado<br>Aguarde 1 segundos', 1000);
       $('#modalCadastro').modal('close');
     }else{
      //Materialize.toast('html', 1000);
      console.log(html);
    }
  });
  });
</script>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
</body>
</html>
