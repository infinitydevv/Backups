<?php 
  require_once('Class/Usuario.php');
  require_once('../conexao/Conexao.php');

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
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
    <div class="row">
      <div class="col-12 col-sm-3" id="col-lateral">
        <div class="container">
          <img src="../img/logoglauber3.png" class="img-fluid rounded mx-auto d-block" id="logo" width="200">
          <form method="GET" action="">
            <?php 
              session_start();
              echo $_SESSION['msgUsu'];
              unset($_SESSION['msgUsu']);
            ?>
            <div class="form-group">
              <label for="valor">Pesquisar</label>
              <input type="text" class="form-control" id="valor" aria-describedby="emailHelp" name="valor">
            </div>
            <div class="form-group">
              <label for="termo">Opção</label>
              <select class="form-control" id="termo" name="termo">
                <option value="0">Selecione!</option>
                <option value="1">ID</option>
                <option value="2">Nome</option>
                <option value="3">Email</option>
                <option value="4">Login</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Pesquisar</button>
            <a class="btn btn-primary btn-block" href="index.php">Ver todos</a>
             <a href="cadastro.php" class="btn btn-success btn-block">Cadastrar</a>
          </form>
        </div>
      </div>
      <div class="col-12 col-sm-9">
      	<div class="container">
          <?php if(count($rs) > 0): ?>
            <table class="table table-dark">
              <h1 class="text-center">Usuários</h1>
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Login</th>
                  <th scope="col">Função</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs as $r): ?>
                <tr>
                  <th><p><?php echo $r->id_u; ?></p></th>
                  <td><p><?php echo $r->nome_u; ?></p></td>
                  <td><p><?php echo $r->email_u; ?></p></td>
                  <td><p><?php echo $r->login_u; ?></p></td>
                  <td><p>
                    <a href="editar.php?id=<?php echo $r->id_c; ?>" class="btn btn-sm btn-warning"><img src="../img/editar.png" alt="Editar conto"></a>
                    <a href="excluir.php?id=<?php echo $r->id_c; ?>" class="btn btn-sm btn-danger"><img src="../img/excluir.png" alt="Excluir conto"></a>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js">
    </script>
  </body>
</html>