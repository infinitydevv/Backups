<?php 
require_once('Class/Conto.php');
require_once('../conexao/Conexao.php');
require_once('../login/functions.php');
  
if(!logado()){
	header('Location: ../login.php');
	exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : '';

$u = new Conto();
$u->setId_c($id);
$rs = $u->listarContosId();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Excluir o Conto <?php echo $r->titulo_c; ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	<?php require_once('../nav-bar-logado.php'); ?>
	<?php foreach($rs as $r): ?>
		<div class="container">
			<div style="max-width: 500px;" class="mx-auto d-block">
				<h1 class="text-center">Editar o Conto <?php echo $r->titulo_c; ?></h1>
				<form action="Controller/ContoControl.php" method="POST">
					<input type="hidden" name='id'  value="<?php echo $r->id_c; ?>">
					<div class="form-group">
						<label for="titulo">Título:</label>
						<input type="text" class="form-control" disabled id="titulo" aria-describedby="emailHelp" value="<?php echo $r->titulo_c; ?>" placeholder="Título" name="titulo">
					</div>
					<div class="form-group">
						<label for="desc">Descrição:</label>
						<textarea class="form-control" disabled id="desc" name="desc" rows="3"><?php echo $r->paragrafo_c; ?></textarea>
					</div>
					<div class="form-group">
						<label for="img">Imagem:</label>
						<img id="imgimg" width="150" src="<?php echo $r->foto_c; ?>" class="mx-auto d-block">
						<input type="hidden" value="<?php echo $r->foto_c; ?>" name="imagem">
					</div>

					<div class="row">
						<div class="col-6">
							<button type="reset" class="btn btn-block btn-primary">Limpar</button>
						</div>
						<div class="col-6">
							<input type="hidden" name="botao" value="excluir">
							<button type="submit" class="btn btn-block btn-danger">Excluir</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php endforeach ?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<!--<script type="text/javascript" src="script.js"></script>-->
	<script type="text/javascript" src="script.js">
	</script>
</body>
</html>