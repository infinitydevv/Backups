<?php 
  require_once('Class/Conto.php');
  require_once('../conexao/Conexao.php');
  require_once('../login/functions.php');
  
  if(!logado()){
    header('Location: ../login.php');
    exit;
  }

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
                    <th scope="col">Usuário</th>
                    <th scope="col">Função</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs as $r):
                    $novo = explode('/', $r->foto_c);
                    $novoURL = explode('.', $novo[3]);
                    $url = 'imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1];
                    echo '
                  <tr>
                    <td><p>'.$r->id_c.'</p></td>
                    <td><p>'.$r->titulo_c.'</p></td>
                    <td><p>'.$r->nome_u.'</p></td>
                   
                    <td>
                      <a href="editar.php?id='.$r->id_c.'" class="btn btn-mudar btn-sm btn-warning btn-editar" data-toggle="tooltip" data-placement="right" title="Editar conto"><img src="../img/editar.png" alt="Editar conto"/></a>

                      <a href="excluir.php?id='.$r->id_c.'" class="btn btn-mudar btn-sm btn-danger btn-excluir" data-toggle="tooltip" data-placement="right" title="Excluir conto"><img src="../img/excluir.png" alt="Excluir conto"/></a>';

                      if(!empty($r->foto_c)){
                        echo '
                      <a href="imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1].'" class="btn btn-mudar btn-sm btn-primary btn-recortar" data-toggle="tooltip" data-placement="right" title="Recortar imagem"><img src="../img/recortar.png" alt="Recortar imagem"></a>';
                      }else{
                        echo '
                        <a href="#" class="btn btn-mudar btn-sm btn-secondary btn-recortar" data-toggle="tooltip" data-placement="right" title="Conto sem imagem para recortar" disabled><img src="../img/recortar.png" alt="Recortar imagem"></a>';
                      }
                      echo '<a href="#" class="btn btn-mudar btn-sm btn-primary btn-modal" onclick="modalConto('.$r->id_c.');"  data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="right" title="Ver conto"><img src="../img/modal.png" alt="Ver conto"></a>
                    </td>
                  </tr>';
                  endforeach
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Preview Conto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="retorno"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script>
      $('.btn-editar').tooltip('update');
      $('.btn-excluir').tooltip('update');
      $('.btn-recortar').tooltip('update');
      $('.btn-modal').tooltip('update');
    </script>
    <script>
      function modalConto(id){
        $.ajax({
            url: "modalConto.php",
            method: "POST",
            data: {id: id},
            dataType: "html",
            beforeSend : function(){
            	$('.loading').remove();
            	$('.conto').remove();
                $('#retorno').append('<div class="loading"><img id="load" src="../img/load.gif" width="200"> <span style="color: #000;">Carregando...</span></div>');
              }
        }).done(function(html){
			$('.loading').remove();
        	$('.conto').remove();
            $('#retorno').append(html);
        });
      }
    </script>
    <script>
	    $(document).ready(function() {
	       var tamanho = $(document).width();

	       if(tamanho < 576){
	        $('.btn-mudar').addClass('btn-block');
	        
	       }else{$('.btn-mudar').removeClass('btn-block');}
		});
	</script>
  </body>
</html>