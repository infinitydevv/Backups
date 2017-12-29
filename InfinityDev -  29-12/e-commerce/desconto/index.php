<?php
@session_start();
  ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
 require_once('Class/Desconto.php');
 require_once('DAO/DescontoDAO.php');
 require_once('../Conexao/Conexao.php');
  require_once('../login/function.php');
 $c = new Conexao();
 $d = new Desconto();
 $dDAO = new DescontoDAO();

 if(!logadoAdm()){

    header('location: ../index.php');
    exit; 

}else{

 $valor = isset($_GET['valor']) ? $_GET['valor'] : '';
 $termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

 if($termo == 0){
  $rs = $dDAO->selectDesconto($d, $termo); 
 }else if($termo == 1){
  $d->setId_des($valor);
  $rs = $dDAO->selectDesconto($d, $termo); 
 }else if($termo == 2){
  $d->setCod_des($valor);
  $rs = $dDAO->selectDesconto($d, $termo); 
 }else if($termo == 3){
  $d->setStatus_des($valor);
  $rs = $dDAO->selectDesconto($d, $termo); 
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
  <title>E-Commerce - Descontos</title>
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
      <li><a class="modal-trigger btn-floating green darken-1 tooltipped" data-target="modalCadastro" data-position="left" data-delay="50" data-tooltip="Cadastrar desconto"><i class="material-icons">person_add</i></a></li>
    </ul>
  </div>

  <div class="container">
   <div class="section">
    <div class="row">
      <div class="col s12">
        <h4><i class="medium material-icons">attach_money</i> Descontos</h4>
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
                <option value="2">Código</option>
                <option value="3">Status</option>
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
        <th>Código</th>
        <th>Status</th>
        <th>Valor</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rs as $r){?>
        <tr>
          <th><?php echo $r->id_des; ?></th>
          <th><?php echo $r->cod_des; ?></th>
          <th><?php 
          if($r->status_des == 1){
            echo "Ativo";
          }else{
            echo "Desativo";
          } ?></th>
          <th>R$<?php echo number_format($r->valor_des, 2, ',', '.'); ?></th>
          <th>
            <button class="btn-floating waves-effect waves-light yellow" onclick="editarSelect(<?php echo $r->id_des; ?>);" type="submit" name="action"><i class="material-icons right">create</i></button>
            <button class="btn-floating waves-effect waves-light red" onclick="excluirSelect(<?php echo $r->id_des; ?>);" type="submit" name="action"><i class="material-icons right">close</i></button>
          </th>
        </tr>
        <?php } ?>
      <?php }else{ ?>
        <h3>Nenhum desconto cadastrado.</h3>
      <?php } ?>
    </tbody>
  </table>
</div>
<br>
<?php require_once('../footer.php'); ?>
<!-- Modal de cadastro do administrador -->
<div id="modalCadastro" class="modal">
  <div class="modal-content">
    <h4>Cadastro de Descontos</h4>
    <form class="col">
      <div class="row">
        <div class="col s12">
          <span>Dados</span>
        </div>
        <div class="input-field col s6">
          <input id="cod" type="text" class="validate">
          <label for="cod">Código</label>
        </div>
        <div class="input-field col s6">
          <input id="valor" type="number" class="validate">
          <label for="valor">Valor</label>
        </div>
        <div class="input-field col s12">
          <select id="status">
            <option value="1" selected>Ativo</option>
            <option value="0">Desativo</option>
          </select>
          <label>Status</label>
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
    <h4>Edição de Desconto</h4>
    <form class="col">
      <div class="row">
        <div class="col s12">
          <span>Dados</span>
        </div>
        <div class="input-field col s6">
          <input type="hidden" id="idEdit">
          <input id="codEdit" type="text" placeholder="" class="validate">
          <label for="cod">Código</label>
        </div>
        <div class="input-field col s6">
          <input id="valorEdit" type="number"  placeholder="" class="validate">
          <label for="valor">Valor</label>
        </div>
        <div class="input-field col s12">
          <select id="statusEdit">
            <option value="1" selected>Ativo</option>
            <option value="0">Desativo</option>
          </select>
          <label>Status</label>
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
    <h4>Deseja excluir este Desconto?</h4>
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
       Materialize.toast('Desconto Excluído<br>Aguarde 1 segundos', 1000);
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
      url: 'Controller/SelectDescontoId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'json'
    }).done(function(json){
      $('#idEdit').val(json[0]['id_des']);
      $('#codEdit').val(json[0]['cod_des']);
      $('#valorEdit').val(json[0]['valor_des']);
      $('#modalEdicao').modal('open');
    });
  }

  $('#botaoEdit').click(function(){
    var id = $('#idEdit').val();
    var status = $('#statusEdit').val();
    var cod = $('#codEdit').val();
    var valor = $('#valorEdit').val();
    var botao = $('#botaoEdit').val();
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{id: id, cod: cod, status: status, valor: valor, botao: botao},
      dataType:'html'
    }).done(function(html){
      if(html == 'OK Editar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Desconto alterado<br>Aguarde 1 segundos', 1000);
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
    var cod = $('#cod').val();
    var valor = $('#valor').val();
    var status = $('#status').val();
    var botao = $('#botao').val();
    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data:{cod: cod, valor: valor, status: status, botao: botao},
      dataType:'HTML'
    }).done(function(html){
      if(html == 'OK Salvar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 1000);
       Materialize.toast('Desconto cadastrado<br>Aguarde 1 segundos', 1000);
       $('#modalCadastro').modal('close');
     }else{
     // Materialize.toast('Error', 1000);
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
