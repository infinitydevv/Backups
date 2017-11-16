  <?php 
  require_once('Class/Usuario.php');
  require_once('../conexao/Conexao.php');
  require_once('../login/functions.php');

  if(!logado()){
    header('Location: ../login.php');
    exit;
  }

  $u = new Usuario();

  $termo = isset($_GET['termo']) ? $_GET['termo'] : '';
  $valor = isset($_GET['valor']) ? $_GET['valor'] : '';

  $rs = $u->listarIndex($termo, $valor);
  ?>
  <!doctype html>
  <html lang="pt-br">
  <head>
    <title>Listagem de Usuários</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../canto-do-conto/css/index.css">
  </head>
  <body>
    <?php require_once('../nav-bar-logado.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12" id="col-lateral">
          <div class="container">
            <div class="col-12">
              <img src="../img/logoglauber3.png" class="img-fluid rounded mx-auto d-block" id="logo" width="150">
              <h1 class='text-center'>Prof. Glauber Gonçalves</h1>
            </div>
            <br>
            <form method="GET" action="">
              <?php 
              session_start();
              echo $_SESSION['msgUsu'];
              unset($_SESSION['msgUsu']);
              ?>
              <div class="row mx-auto">
                <div class="col-12 col-sm-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="valor" aria-describedby="emailHelp" name="valor">
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6 marg-div">
                      <div class="form-group">
                        <select class="form-control" id="termo" name="termo">
                          <option value="0">Selecione!</option>
                          <option value="1">ID</option>
                          <option value="2">Nome</option>
                          <option value="3">Email</option>
                          <option value="4">Login</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-2 marg-div">
                      <button type="submit" class="btn btn-light btn-block"><img src="../img/lupa.png" width="21"></button> 
                    </div>
                    <div class="col-12 col-sm-2 marg-div">
                      <a class="btn btn-dark btn-block" href="index.php">Ver todos</a> 
                    </div>
                    <div class="col-12 col-sm-2 marg-div">
                      <a href="cadastro.php" class="btn btn-success btn-block">Cadastrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-sm-12 sticky-top" id="col-central">
          <div class="container">
            <?php if(count($rs) > 0): ?>
              <table class="table table-dark">
                <h1 class="text-center">Usuários</h1>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col" id='email-remove'>Email</th>
                    <th scope="col">Login</th>
                    <th scope="col">Função</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs as $r): ?>
                    <tr>
                      <th><p><?php echo $r->id_u; ?></p></th>
                      <td><p><?php echo $r->nome_u; ?></p></td>
                      <td class='email-remove1'><p><?php echo $r->email_u; ?></p></td>
                      <td><p><?php echo $r->login_u; ?></p></td>
                      <td><p>
                        <a href="editar.php?id=<?php echo $r->id_u; ?>" class="btn btn-block btn-sm btn-warning"><img src="../img/editar.png" alt="Editar conto"></a>
                        <a href="excluir.php?id=<?php echo $r->id_u; ?>" class="btn btn-block btn-sm btn-danger"><img src="../img/excluir.png" alt="Excluir conto"></a>
                      </p>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-danger" role="alert">
              Nenhum usuário cadastrado!
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script type="text/javascript" src="script.js">
  </script>
  <script>
    $(document).ready(function() {
       var tamanho = $(document).width();

       if(tamanho < 576){
        $('#email-remove').remove();
        $('.email-remove1').remove();
       }
     });
  </script>
</body>
</html>