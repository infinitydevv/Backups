<?php
@session_start();
require_once('Class/Produto.php');
require_once('DAO/ProdutoDAO.php');
require_once('../Conexao/Conexao.php');
require_once('../login/function.php');
$c = new Conexao();
$p = new Produto();
$pDAO = new ProdutoDAO();

 if(!logadoAdm()){

    header('location: ../index.php');
    exit; 

}else{
  $valor = isset($_GET['valor']) ? addslashes($_GET['valor']) : '';
  $termo = isset($_GET['termo']) ? addslashes($_GET['termo']) : 0;

  if($termo == 0){
    $rs = $pDAO->selectProd($p, $termo); 
  }else if($termo == 1){
    $p->setId_p($valor);
    $rs = $pDAO->selectProd($p, $termo); 
  }else if($termo == 2){
    $p->setNome_p($valor);
    $rs = $pDAO->selectProd($p, $termo); 
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
  <title>E-Commerce - Produtos</title>
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
      <li><a class="modal-trigger btn-floating green darken-1 tooltipped" data-target="modalCadastro" data-position="left" data-delay="50" data-tooltip="Cadastrar produto"><i class="material-icons">person_add</i></a></li>
    </ul>
  </div>

  <div class="container">
   <div class="section">
    <div class="row">
      <div class="col s12">
        <h1><i class="medium material-icons">local_offer</i> Produtos</h1>
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
        <th><i class="material-icons">image</i></th>
        <th>#</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rs as $r){?>
      <tr>
        <th><img class='center materialboxed' src="img/<?php echo $r->imagem_p; ?>" width='30' alt=""></th>
        <th><?php echo $r->id_p; ?></th>
        <th><?php echo $r->nome_p; ?></th>
        <th><?php echo "R$ ".number_format($r->preco_p, 2, ',', '.'); ?></th>
        <th>
          <button class="btn-floating waves-effect waves-light yellow darken-2" onclick="editarSelect(<?php echo $r->id_p; ?>);" type="submit" name="action"><i class="material-icons right">create</i></button>
          <button class="btn-floating waves-effect waves-light red" onclick="excluirSelect(<?php echo $r->id_p; ?>);" type="submit" name="action"><i class="material-icons right">close</i></button>
          <button class="btn-floating waves-effect waves-light blue" onclick="modalSelect(<?php echo $r->id_p; ?>);" type="submit" name="action"><i class="material-icons right">remove_red_eye</i></button>
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
    <h4>Cadastro de produtos</h4>
    <form class="col">
      <div class="row">
        <div class="input-field col s12">
          <input id="nome" data-length="150" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field col s12">
          <textarea name="desc" id="desc" class="materialize-textarea" cols="30" rows="10"></textarea>
          <label for="desc">Descição</label>
        </div>
        <div class="input-field col s12">
          <input id="preco" type="number" class="validate">
          <label for="preco">R$</label>
        </div>
        <div class="input-field col s12">
          <select id="status">
            <option value="1" id="ativo">Ativo</option>
            <option value="0" id="desativo">Desativo</option>
          </select>
          <label for="status" class="active">Status</label>
        </div>
        <div class="input-field col s12">
          <input type="file" id='imagem'>
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
    <h4>Edição de produtos</h4>
    <form class="col">
      <div class="row">
        <div class="input-field col s12">
          <input id="nomeEdit" placeholder="" type="text" class="validate">
          <input id="idEdit" type="hidden">
          <label for="nomeEdit">Nome</label>
        </div>
        <div class="input-field col s12">
          <textarea name="descEdit" id="descEdit" placeholder="" class="materialize-textarea" cols="30" rows="10"></textarea>
          <label for="descEdit" class="active">Descição</label>
        </div>
        <div class="input-field col s12">
          <input id="precoEdit" placeholder="" type="number" class="validate">
          <label for="precoEdit">R$</label>
        </div>
        <div class="input-field col s12">
          <select id="statusEdit">
            <option value="1" id="ativoEdit">Ativo</option>
            <option value="0" id="desativoEdit">Desativo</option>
          </select>
        </div>
        <div class="input-field center-align col s12">
          <input type="file" id='imagemEdit'>
          <input type="hidden" id='imagemAtual' value=''><br><br>
          <img class="responsive-img" width="100" id="imagemDemo" alt="">
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
    <h4>Deseja desativar este produto?</h4>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    <button id='botaoExc' class='btn waves-effect waves-white red'>Desativar</button>
  </div>
</div>
<!-- FIM Modal de exclusão do usuário -->

<!-- Modal de visualização -->
<div id="modalVisual" class="modal">
  <div class="modal-content">
    <div class="row">
      <div class="col s12 m6">
        <h4 id="nomeModal"></h4>
        <p id="idModal"></p>
        <p id="statusModal"></p>
        <p id="descModal"></p>
        <h4 id="precoModal"></h4>
      </div>
      <div class="col s12 m6">
        <img src="" class="responsive-img materialboxed" id="imgModal" width="350">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
  </div>
</div>
<!-- FIM Modal de visualização -->

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
<script type="text/javascript">
  function number_format( numero, decimal, decimal_separador, milhar_separador ){ 
    numero = (numero + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+numero) ? 0 : +numero,
    prec = !isFinite(+decimal) ? 0 : Math.abs(decimal),
    sep = (typeof milhar_separador === 'undefined') ? ',' : milhar_separador,
    dec = (typeof decimal_separador === 'undefined') ? '.' : decimal_separador,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
    // Fix para IE: parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }

    return s.join(dec);
  }
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
         }, 2000);
         Materialize.toast('Produto desativado<br>Aguarde 2 segundos', 2000);
         $('#modalExclusao').modal('close');
       }else{
        Materialize.toast('Error', 2000);
      }
    });
    });
  }
</script>
<!-- Método de edição com modal -->
<script type="text/javascript">
  function editarSelect(id){
    $.ajax({
      url: 'Controller/SelectProdutoId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'json'
    }).done(function(json){
      $('#idEdit').val(json[0]['id_p']);
      $('#nomeEdit').val(json[0]['nome_p']);
      $('#descEdit').text(json[0]['desc_p']);
      $('#precoEdit').val(json[0]['preco_p']);
      $('#imagemAtual').val(json[0]['imagem_p']);
      $('#imagemDemo').prop('src', 'img/'+json[0]['imagem_p']);
      $('#modalEdicao').modal('open');
    });
  }

  $('#botaoEdit').click(function(){
    var id = $('#idEdit').val();
    var nome = $('#nomeEdit').val();
    var desc = $('#descEdit').val();
    var preco = $('#precoEdit').val();
    var status = $('#statusEdit').val();
    var imgAtual = $('#imagemAtual').val();
    var botao = $('#botaoEdit').val();

    var formData = new FormData();
    formData.append("id", id);
    formData.append("nome", nome);
    formData.append("desc", desc);
    formData.append("preco", preco);
    formData.append('imgAtual', imgAtual);
    formData.append('status', status);
    formData.append("botao", botao);
    formData.append("imagem", $("#imagemEdit").prop('files')[0]);

    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data: formData,
      dataType:'html',
      cache: false,
      processData: false,
      contentType: false
    }).done(function(html){
      if(html == 'OK Editar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 2000);
       Materialize.toast('Produto alterado<br>Aguarde 2 segundos', 2000);
       $('#modalEdicao').modal('close');
     }else{
      Materialize.toast(html, 2000);
    }
  });
  });
</script>
<!-- Método de cadastro com modal -->
<script type="text/javascript">
  $('#botao').click(function(){
    var nome = $('#nome').val();
    var desc = $('#desc').val();
    var preco = $('#preco').val();
    var status = $('#status').val();
    var botao = $('#botao').val();

    var formData = new FormData();
    formData.append("nome", nome);
    formData.append("desc", desc);
    formData.append("preco", preco);
    formData.append("status", status);
    formData.append("botao", botao);
    formData.append("imagem", $("#imagem").prop('files')[0]);

    $.ajax({
      url:'Controller/Controller.php',
      method:'POST',
      data: formData,
      dataType:'HTML',
      cache: false,
      processData: false,
      contentType: false
    }).done(function(html){
      if(html == 'OK Salvar'){
       setTimeout(function(){
         window.location.reload(1);
       }, 2000);
       Materialize.toast('Produto cadastrado<br>Aguarde 2 segundos', 2000);
       $('#modalCadastro').modal('close');
     }else{
      Materialize.toast('Erro', 2000);
    }
  });
  });
</script>
<script>
  function modalSelect(id){
    $.ajax({
      url: 'Controller/SelectProdutoId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'json'
    }).done(function(json){
      $('#idm').remove();
      $('#idModal').append("<strong id='idm'>ID: "+json[0]['id_p']+"</strong>");
      $('#nomeModal').text(json[0]['nome_p']);
      $('#descModal').text(json[0]['desc_p']);
      if(json[0]['status_p'] == 1){
        $('#statusModal').text("Ativo");
      }else{
        $('#statusModal').text("Desativo");
      }
      $('#precoModal').text("R$ "+number_format(json[0]['preco_p'], 2, ',', '.'));
      $('#imgModal').prop('src', 'img/'+json[0]['imagem_p']);
      $('#modalVisual').modal('open');
    });
  }
</script>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
</body>
</html>