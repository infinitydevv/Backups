<?php

 @session_start();
 ini_set('display_errors',1);
 ini_set('display_startup_erros',1);
 error_reporting(E_ALL);
 require_once('Class/Usuario.php');
 require_once('DAO/UsuarioDAO.php');
 require_once('../Conexao/Conexao.php');
 require_once('../login/function.php');
 $c = new Conexao();
 $u = new Usuario();
 $uDAO = new UsuarioDAO();

 if(!logadoAdm()){

    header('location: ../index.php');
    exit; 

}else{

   $valor = isset($_GET['valor']) ? addslashes($_GET['valor']) : '';
   $termo = isset($_GET['termo']) ? addslashes($_GET['termo']) : 0;

   if($termo == 0){
    $rs = $uDAO->selectUserAll(); 
  }else if($termo == 1){
    $u->setId_u($valor);
    $rs = $uDAO->selectUser($u, $termo); 
  }else if($termo == 2){
    $u->setNome_u($valor);
    $rs = $uDAO->selectUser($u, $termo); 
  }else if($termo == 3){
    $u->setEmail_u($valor);
    $rs = $uDAO->selectUser($u, $termo); 
  }else if($termo == 4){
    $u->setCpf_u($valor);
    $rs = $uDAO->selectUser($u, $termo); 
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
  <title>E-Commerce - Usuários</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <?php require_once('../navbar-adm.php'); ?>
  
  <div class="fixed-action-btn vertical">
    <a class="btn-floating btn-large grey darken-4">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a class="modal-trigger btn-floating green darken-1 tooltipped" data-target="modalCadastro" data-position="left" data-delay="50" data-tooltip="Cadastrar usuário"><i class="material-icons">person_add</i></a></li>
    </ul>
  </div>

  <div class="container">
   <div class="section">
    <div class="row">
      <div class="col s12">
        <h1><i class="medium material-icons">face</i> Usuários</h1>
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
                <option value="4">CPF</option>
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
        <th>CPF</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rs as $r){?>
      <tr>
        <th><?php echo htmlspecialchars($r->id_u); ?></th>
        <th><?php echo htmlspecialchars($r->nome_u); ?></th>
        <th><?php echo htmlspecialchars($r->email_u); ?></th>
        <th><?php echo htmlspecialchars($r->cpf_u); ?></th>
        <th>
          <button class="btn-floating waves-effect waves-light yellow" onclick="editarSelect(<?php echo $r->id_u; ?>);" type="submit" name="action"><i class="material-icons right">create</i></button>
          <button class="btn-floating waves-effect waves-light red" onclick="excluirSelect();" type="submit" name="action"><i class="material-icons right">close</i></button>
        </th>
      </tr>
      <?php } ?>
      <?php }else{ ?>
      <h3>Nenhum usuário cadastrado.</h3>
      <?php } ?>
    </tbody>
  </table>
</div>
<br>
<?php require_once('../footer.php'); ?>
<!-- Modal de cadastro do usuário -->
<div id="modalCadastro" class="modal">
  <div class="modal-content">
    <h4>Cadastro de usuário</h4>
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
          <input id="cpf" type="text" class="validate">
          <label for="cpf">CPF</label>
        </div>
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
        <div class="col s12">
          <br>
          <span>Endereço</span>
        </div>
        <div class="input-field col s12">
          <input id="cep" type="text" maxlength="8" class="validate" onkeyup="verificarCEP();">
          <label for="cep">CEP</label>
          <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Não sabe seu CEP?</a>
        </div>
        <div class="input-field col s6">
          <input id="estado" type="text" placeholder="" readonly class="validate">
          <label for="estado">Estado</label>
        </div>
        <div class="input-field col s6">
          <input id="cidade" type="text" placeholder="" readonly class="validate">
          <label for="cidade">Cidade</label>
        </div>
        <div class="input-field col s6">
          <input id="rua" type="text" placeholder="" readonly class="validate">
          <label for="rua">Rua</label>
        </div>
        <div class="input-field col s6">
          <input id="numero" type="number" class="validate">
          <label for="numero">Número</label>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botao' value="Salvar" class='btn waves-effect waves-white red'>Salvar</button>
  </div>
</div>
<!--FIM Modal de cadastro do usuário -->

<!-- Modal de edição do usuário -->
<div id="modalEdicao" class="modal">
  <div class="modal-content">
    <h4>Edição de usuário</h4>
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
          <input id="cpfEdit" placeholder="" type="text" class="validate">
          <label for="cpfEdit">CPF</label>
        </div>
        <div class="input-field col s12">
          <input id="emailEdit" placeholder="" type="email" class="validate">
          <label for="emailEdit">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="senhaEdit" placeholder="" type="password" class="validate">
          <label for="senhaEdit">Senha</label>
        </div>
        <div class="col s12">
          <br>
          <span>Endereço</span>
        </div>
        <div class="input-field col s12">
          <input id="cepEdit" type="text" maxlength="8" class="validate" onkeyup="verificarCEPEdit();">
          <label for="cepEdit">CEP</label>
          <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Não sabe seu CEP?</a>
        </div>
        <div class="input-field col s6">
          <input id="estadoEdit" placeholder="" type="text" placeholder="" readonly class="validate">
          <label for="estadoEdit">Estado</label>
        </div>
        <div class="input-field col s6">
          <input id="cidadeEdit" placeholder="" type="text" placeholder="" readonly class="validate">
          <label for="cidadeEdit">Cidade</label>
        </div>
        <div class="input-field col s6">
          <input id="ruaEdit" placeholder="" type="text" placeholder="" readonly class="validate">
          <label for="ruaEdit">Rua</label>
        </div>
        <div class="input-field col s6">
          <input id="numeroEdit" placeholder="" type="number" class="validate">
          <label for="numeroEdit">Número</label>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botaoEdit' value="Editar" class='btn waves-effect waves-white red'>Salvar Alterações</button>
  </div>
</div>
<!-- FIM Modal de edição do usuário -->

<!-- Modal de exclusão do usuário -->
<div id="modalExclusao" class="modal">
  <div class="modal-content">
    <h4>Deseja excluir este usuário?</h4>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botaoExc' value="<?php echo $r->id_u; ?>" class='btn waves-effect waves-white red'>Excluir</button>
  </div>
</div>
<!-- FIM Modal de exclusão do usuário -->

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
<script>
  function verificarCEP(){
    var cep = $('#cep').val();
    $.ajax({
      url:'Controller/cep.php',
      method: 'GET',
      data: {cep: cep},
      dataType: 'json'
    }).done(function(json){
      if(typeof json === "object"){
        $('#rua').val("");
        $('#cidade').val("");
        $('#estado').val("");

        $('#rua').val(json['logradouro']);
        $('#cidade').val(json['localidade']);
        $('#estado').val(json['uf']);
      }
    });
  }
  function verificarCEPEdit(){
    var cep = $('#cepEdit').val();
    $.ajax({
      url:'Controller/cep.php',
      method: 'GET',
      data: {cep: cep},
      dataType: 'json'
    }).done(function(json){
      if(typeof json === "object"){
        $('#ruaEdit').val("");
        $('#cidadeEdit').val("");
        $('#estadoEdit').val("");

        $('#ruaEdit').val(json['logradouro']);
        $('#cidadeEdit').val(json['localidade']);
        $('#estadoEdit').val(json['uf']);
      }
    });
  }
</script>
<!-- Método de exclusão com modal -->
<script>
  function excluirSelect(){
    $('#modalExclusao').modal('open');
  }
  $('#botaoExc').click(function(){
    var botao = 'Excluir';
    var id = $('#botaoExc').val();
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
       Materialize.toast('Usuário Excluído<br>Aguarde 1 segundos', 1000);
       $('#modalExclusao').modal('close');
     }else{
      Materialize.toast('Erro', 1000);
    }
  });
  });
</script>
<!-- Método de edição com modal -->
<script type="text/javascript">
  function editarSelect(id){
    $.ajax({
      url: 'Controller/SelectUsuarioId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'json'
    }).done(function(json){
      $('#idEdit').val(json[0]['id_u']);
      $('#nomeEdit').val(json[0]['nome_u']);
      $('#emailEdit').val(json[0]['email_u']);
      $('#cpfEdit').val(json[0]['cpf_u']);
      $('#cepEdit').val(json[0]['cep_u']);
      $('#cidadeEdit').val(json[0]['cidade_u']);
      $('#estadoEdit').val(json[0]['estado_u']);
      $('#numeroEdit').val(json[0]['numero_u']);
      $('#ruaEdit').val(json[0]['endereco_u']);
      $('#modalEdicao').modal('open');
    });
  }

  $('#botaoEdit').click(function(){
    var id = $('#idEdit').val();
    var nome = $('#nomeEdit').val();
    var cpf = $('#cpfEdit').val();
    var email = $('#emailEdit').val();
    var senha = $('#senhaEdit').val();
    var cep = $('#cepEdit').val();
    var cidade = $('#cidadeEdit').val();
    var estado = $('#estadoEdit').val();
    var numero = $('#numeroEdit').val();
    var endereco = $('#ruaEdit').val();
    var botao = $('#botaoEdit').val();
    $.ajax({
      url:'../Controller/Controller.php',
      method:'POST',
      data:{id: id, nome: nome, cpf: cpf, email: email, senha: senha, cep: cep, cidade: cidade, estado: estado, endereco: endereco, numero: numero, botao: botao},
      dataType:'html'
    }).done(function(html){
      if(html == 'OK Editar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Usuário alterado<br>Aguarde 1 segundos', 1000);
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
    var cpf = $('#cpf').val();
    var email = $('#email').val();
    var senha = $('#senha').val();
    var cep = $('#cep').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();
    var numero = $('#numero').val();
    var endereco = $('#rua').val();
    var botao = $('#botao').val();
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{nome: nome, cpf: cpf, email: email, senha: senha, cep: cep, cidade: cidade, estado: estado, endereco: endereco, numero: numero, botao: botao},
      dataType:'HTML'
    }).done(function(html){
      if(html == 'OK Salvar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Usuário cadastrado<br>Aguarde 1 segundos', 1000);
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
