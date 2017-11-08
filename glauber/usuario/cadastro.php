<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Usuários</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container">
  		<div style="max-width: 500px;" class="mx-auto d-block">
  			<h1 class="text-center">Cadastro de Usuários</h1>
	  		<form action="Controller/UsuarioControl.php" method="POST">
			  <div class="form-group">
			    <label for="nome">Nome:</label>
			    <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Nome" name="nome">
			  </div>
			  <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" name="email">
			    <div id="rs"></div>
			  </div>
			  <div class="form-group">
			    <label for="login">Login:</label>
			    <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Login" name="login">
			    <div id="rs1"></div>
			  </div>
			  <div class="form-group">
			    <label for="senha">Senha:</label>
			    <input type="password" class="form-control" id="senha" aria-describedby="emailHelp" placeholder="************" name="senha">
			    <div id="forca"></div>
			  </div>
			  <div class="form-group">
			    <label for="senha">Confirmar senha:</label>
			    <input type="password" class="form-control" id="senhaC" aria-describedby="emailHelp" placeholder="************" name="senhaC">
			    <div id="conf"></div>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js">
    </script>
  </body>
</html>