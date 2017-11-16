<?php 
    require_once "../conexoes/conexao.php";
    @session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url= ../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url= ../login.php' />";
      exit;
    }

    require_once "class/Mensagem.php";
    $m = new Mensagem();
    $termo = isset($_GET['termo']) ? $_GET['termo'] : '';
    $termo1 = isset($_GET['combo']) ? $_GET['combo'] : '';
    $rs = $m->pesquisarMensagemAll($termo, $termo1);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
  <title>Listagem de Mensagens</title>
  <link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../usuario/css/index.css">
  <!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
</head>
<body>
  <!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
  <div class='container cabe'>
    <h1 class="text-center text-laranja">Mensagens</h1>
    <fieldset>
      <!-- Cabeçalho da Listagem -->
      <legend><a href='../area.php' class="btn btn-voltar btn-success pull-right">Retornar</a><br><br></legend>

      <!-- Formulário de Pesquisa -->
      <form action="" method="get" id='form-contato' class="form-horizontal">
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-center ">
            <label class="control-label text-laranja" for="termo" style="font-size: 14pt;">Pesquisar</label>
          </div>
          <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
              <input type="text" class="form-control text-laranja" id="termo" name="termo" placeholder="Infome o Código do imóvel, Assunto da Mensagem e Cliente."><br>
          </div>
          <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 div-mar'>
            <select size="1" name="combo" class="form-control text-laranja">
              <option selected value="1">Selecione!</option>
              <option value="2">Código do Imóvel</option>
              <option value="3">Assunto da Mensagem</option>
              <option value="4">Cliente</option>
            </select>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-left div-mar">
              <button type="submit" class="btn show btn-md btn-primary">Pesquisar</button>
              <a href='index.php' class="btn show btn-md btn-primary">Ver Todos</a>

              <button type="submit" class="btn hide btn-md btn-block btn-primary">Pesquisar</button>
              <a href='index.php' class="btn hide btn-md btn-block  btn-primary">Ver Todos</a>
          </div>
        </div>
      </form>
      <!-- Link para página de cadastro -->
    </fieldset>
  </div>
  <div class="container show2 ">
  <?php  
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  ?>
    <?php if(!empty($rs)):?>
        <!-- Tabela de Clientes -->
        <table class="table table-striped">
          <tr class='active'>
            <th>ID</th>
            <th>Assunto</th>
            <th>Descrição</th>
            <th>Cliente</th>
            <th>Usuário</th>
            <th>Ação</th>
          </tr>
          <?php foreach($rs as $men):?>
            <tr>
              <td><?php echo $men->idmens?></td>
              <td><?php echo $men->assuntomens?></td>
              <td><?php echo $men->descricaomens?></td>
              <td><?php echo $men->nomecliven?></td>
              <td><?php echo $men->nome?></td>
              <td>
                <a href='editar.php?m=<?php echo $men->idmens?>' class="hide btn btn-xs  btn-warning btn-block "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href='deletar.php?m=<?php echo $men->idmens?>' class="hide btn btn-xs btn-danger btn-block"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                <a href='editar.php?m=<?php echo $men->idmens?>' class="show btn btn-sm show btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href='deletar.php?m=<?php echo $men->idmens?>' class="show btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr> 
          <?php endforeach;?>
        </table>
      <?php else: ?>
        <!-- Mensagem caso não exista clientes ou não encontrado  -->
        <h3 class="text-center text-primary">Não existem Mensagens cadastradas!</h3>
      <?php endif; ?>
    </div>
    <div class="hide">
        <?php  
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        ?>
      <?php if(!empty($rs)):?>
        <!-- Tabela de Clientes -->
        <table class="table table-striped">
          <tr class='active'>
            <th>Assunto</th>
            <th>Descrição</th>
            <th>Cliente</th>
            <th>Usuário</th>
            <th>Ação</th>
          </tr>
          <?php foreach($rs as $men):?>
            <tr>
              <td><?php echo $men->assuntomens?></td>
              <td><?php echo $men->descricaomens?></td>
              <td><?php echo $men->nomecliven?></td>
              <td><?php echo $men->nome?></td>
              <td>
                <a href='editar.php?m=<?php echo $men->idmens?>' class="hide btn btn-xs  btn-warning btn-block "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href='deletar.php?m=<?php echo $men->idmens?>' class="hide btn btn-xs btn-danger btn-block"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                <a href='editar.php?m=<?php echo $men->idmens?>' class="show btn btn-md show btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href='deletar.php?m=<?php echo $men->idmens?>' class="show btn btn-md btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr> 
          <?php endforeach;?>
        </table>
      <?php else: ?>
        <!-- Mensagem caso não exista clientes ou não encontrado  -->
        <h3 class="text-center text-primary">Não existem Mensagens cadastradas!</h3>
      <?php endif; ?>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>