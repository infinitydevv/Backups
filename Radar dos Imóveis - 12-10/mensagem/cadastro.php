<?php 
	@session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
      $id = $_SESSION['iduser'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    }

    $idimo = isset($_GET['i']) ? $_GET['i'] : '';
    $idcliven = isset($_GET['c']) ? $_GET['c'] : '';
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="Radar dos Imóveis" content="">
		<title>Cadastro de Mensagem</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
	</head>
	<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
		<div class="container"><br><br><br>
			<h1 class="text-center">Cadastro de Mensagem</h1>
			<a href='javascript:window.history.go(-1)' class="btn btn-voltar btn-success pull-right">Retornar</a>
			<form action="mensagem.php" method="POST">
				<div class="row">
				    <input type="hidden" class="form-control" value="<?php echo $idcliven ?>"  id="idcli" name="idcli">
				    <input type="hidden" class="form-control" value="<?php echo $id ?>" id="idusu" name="idusu">
				    <input type="hidden" class="form-control" value="<?php echo $idimo ?>" id="idimo" name="idimo">
				  	<div class="form-group col-xs-12 col-sm-12">
				    	<label for="assuntomens">Assunto:</label>
				    	<input type="text" class="form-control" id="assuntomens" name="assuntomens">
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-12">
				    	<label for="descricaomens">Descrição:</label>
				    	<textarea class="form-control" id="descricaomens" name="descricaomens" rows="3"></textarea>
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-6">
				    	<label for="datamens">Data:</label>
				    	<input type="date" class="form-control" id="datamens" name="datamens">
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-6">
				    	<label for="horamens">Hora:</label>
				    	<input type="text" class="form-control" id="horamens" name="horamens">
				  	</div>
				  	<div class="col-xs-12 col-sm-6">
				  		<input class="btn btn-block btn-warning" type="submit" name="botao" value="Salvar">
				  	</div>
				  	<div class="col-xs-12 col-sm-6">
				  		<button class="btn btn-block btn-warning" type="reset">Limpar</button>
				  	</div>
				</div>
			</form>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>