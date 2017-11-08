<?php 
  require_once('Class/Conto.php');
  require_once('../conexao/Conexao.php');

  $c = new Conto();

  $termo = isset($_GET['termo']) ? $_GET['termo'] : '';
  $valor = isset($_GET['valor']) ? $_GET['valor'] : '';

  $rs = $c->listarIndex($termo, $valor);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Listagem de Contos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
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
                  echo $_SESSION['msgConto'];
                  unset($_SESSION['msgConto']);
                ?>
                <div class="row mx-auto">
                  <div class="col-12 col-sm-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="valor" aria-describedby="emailHelp" placeholder="Pesquisar" name="valor">
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 marg-div">
                        <select class="form-control" id="termo" name="termo">
                          <option value="0">Opções de busca</option>
                          <option value="1">ID</option>
                          <option value="2">Título</option>
                          <option value="3">Descrição</option>
                          <option value="4">Usuário</option>
                        </select>
                      </div>
                      <div class="col-12 col-sm-2 marg-div">
                        <button type="submit" class="btn btn-default btn-block"><img src="../img/lupa.png" width="21"></button>
                        
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
        </div>
      </div>
        <div class="col-12 col-sm-12 sticky-top" id="col-central">
          <div class="container">
            <?php if(count($rs) > 0): ?>
              <table class="table table-dark">
                <h1 class="text-center">Contos</h1>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Função</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs as $r){
                    $novo = explode('/', $r->foto_c);
                    $novoURL = explode('.', $novo[3]);
                    $text = substr($r->paragrafo_c, 0, 20)."...";
                    $url = 'imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1];
                    echo '
                  <tr>
                    <th><p>'.$r->id_c.'</p></th>
                    <td><p>'.$r->titulo_c.'</p></td>
                    <td>'.wordwrap($text, 10, "<br>", true).'</td>
                    <td><p>'.$r->nome_u.'</p></td>
                    <td>
                      <a href="editar.php?id='.$r->id_c.'" class="btn btn-sm btn-warning btn-editar" data-toggle="tooltip" data-placement="top" title="Editar conto"><img src="../img/editar.png" alt="Editar conto"></a>
                      <a href="excluir.php?id='.$r->id_c.'" class="btn btn-sm btn-danger btn-excluir" data-toggle="tooltip" data-placement="top" title="Excluir conto"><img src="../img/excluir.png" alt="Excluir conto"></a>
                      <a href="imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1].'" class="btn btn-sm btn-primary btn-recortar" data-toggle="tooltip" data-placement="top" title="Recortar imagem"><img src="../img/recortar.png" alt="Recortar imagem"></a>
                    </td>
                  </tr>';
                  }
                  ?>
                </tbody>
              </table>
            <?php else: ?>
              <div class="alert alert-danger" role="alert">
                Nenhum conto cadastrado!
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
    <script>
      $('.btn-editar').tooltip('update');
      $('.btn-excluir').tooltip('update');
      $('.btn-recortar').tooltip('update');
    </script>
    <script>
      $('#hamburg').click(function(){
        if($('#col-lateral').find('.active')){
          $('#col-lateral').addClass('toggle');
          $('#col-lateral').removeClass('active');
        }else{
          $('#col-lateral').addClass('active');
          $('#col-lateral').removeClass('toggle');
        }
        
      });
    </script>
  </body>
</html>