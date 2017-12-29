<?php
@session_start();
require_once('Class/Pedido.php');
require_once('DAO/PedidoDAO.php');
require_once('../Conexao/Conexao.php');
require_once('../login/function.php');
$c = new Conexao();
$p = new Pedido();
$pDAO = new PedidoDAO();

if(!logadoAdm()){
  header('location: ../index.php');
  exit; 
}else{

  $valor = isset($_GET['valor']) ? $_GET['valor'] : '';
  $termo = isset($_GET['termo']) ? $_GET['termo'] : 0;

  if($termo == 0){
    $rs = $pDAO->selectPedido($p, $termo); //Todos
  }else if($termo == 1){
    $p->setId_pe($valor);
    $rs = $pDAO->selectPedido($p, $termo); //ID do pedido
  }else if($termo == 2){
    $p->setId_u($valor);
    $rs = $pDAO->selectPedido($p, $termo); //ID do usuário
  }else if($termo == 3){
    $p->setPag_pe($valor);
    $rs = $pDAO->selectPedido($p, $termo); //Pagamento
  }else if($termo == 4){
    $p->setNome_u($valor);
    $rs = $pDAO->selectPedido($p, $termo); //Nome do usuário
  }else if($termo == 5){
    $p->setCpf_u($valor);
    $rs = $pDAO->selectPedido($p, $termo); //CPF do usuário
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
  <title>E-Commerce - Pedidos</title>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <?php require_once('../navbar-adm.php'); ?>

  <div class="container">
   <div class="section">
    <div class="row">
      <div class="col s12">
        <h1><i class="medium material-icons">shopping_basket</i> Pedidos</h1>
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
                <option value="1">ID do pedido</option>
                <option value="2">ID do usuário</option>
                <option value="3">Pagamento</option>
                <option value="4">Nome do usuário</option>
                <option value="5">CPF do usuário</option>
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
        <th>Pagamento</th>
        <th><i class="material-icons">date_range</i></th>
        <th>Status</th>
        <th><i class="material-icons">attach_money</i></th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rs as $r){?>
      <tr>
        <th><?php echo $r->id_pe; ?></th>
        <th><?php echo $r->pag_pe; ?></th>
        <th><?php echo $r->data_pe; ?></th>
        <th><?php if($r->status_pe != 0){echo "Pago";}else{echo "Pendente";} ?></th>
        <th><?php echo number_format($r->total_pe, 2, ',', '.'); ?></th>
        <th>
          <button class="btn-floating waves-effect waves-light blue" onclick="modalSelect(<?php echo $r->id_pe; ?>);" ><i class="material-icons right">remove_red_eye</i></button>
        </th>
      </tr>
      <?php } ?>
      <?php }else{ ?>
      <h3>Nenhum pedido cadastrado.</h3>
      <?php } ?>
    </tbody>
  </table>
</div>
<br>
<?php require_once('../footer.php'); ?>
<!-- Modal de visualização -->
<div id="modalVisual" class="modal">
  <div class="modal-content">
    <div class="row" id='mandaraqui'>
      
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
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
<script>
  function modalSelect(id){
    $.ajax({
      url: 'Controller/SelectPedidoId.php',
      method: 'GET',
      data: {id: id},
      dataType: 'html'
    }).done(function(html){
      $("#removeDepois").remove();
      $('#mandaraqui').append(html);
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