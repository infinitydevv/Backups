<?php 
require_once('../login/functions.php');
  
if(!logado()){
  header('Location: ../login.php');
  exit;
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Contos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 
  </head>
  <body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../bibliotecas/ckeditor/ckeditor.js"></script>
    <script src="../bibliotecas/ckeditor/adapters/jquery.js"></script>
    <?php require_once('../nav-bar-logado.php'); ?>
  	<div class="container">
  		<div style="max-width: 700px;" class="mx-auto d-block">
  			<h1 class="text-center">Cadastro de Contos</h1>
	  		<form action="Controller/ContoControl.php" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="titulo">Título:</label>
			    <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp" placeholder="Título" name="titulo">
			  </div>
			  <div class="form-group">
			    <label for="desc">Descrição:</label>
			    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="img">Imagem:</label>
          		<input type="file" name="foto" class="form-control-file" id="imgg">
              <img id="imgimg" width="200" src="" class="img-thumbnail mx-auto d-block">
			  </div>
			  <div class="row">
			  	<div class="col-6">
			  		<button type="reset" class="btn btn-block btn-primary">Limpar</button>
			  	</div>
			  	<div class="col-6">
			  		<input type="hidden" name="botao" value="cadastrar">
			  		<button type="submit" id="buttonn" class="btn btn-block btn-success">Cadastrar</button>
			  	</div>
			  </div>
			</form>
  		</div>
  	</div>
    <script>
      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#imgimg').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgg").change(function() {
        readURL(this);
      });
    </script>
    <script>
      $('#desc').ready( function() {
        $( 'textarea#desc' ).ckeditor();
      });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </script>
  </body>
</html>