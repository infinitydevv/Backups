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

    $idmens = isset($_GET['m']) ? $_GET['m'] : '';
    require_once "class/Mensagem.php";
    require_once "../conexoes/conexao.php";

    $m = new Mensagem();
    $m->setIdmens($idmens);
    $results = $m->pesquisarMensagemM();

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="Radar dos Imóveis" content="">
		<title>Deletar Mensagem</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
	</head>
	<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
		<div class="container"><br><br><br>
			<h1 class="text-center">Deletar Mensagem</h1>
			<?php  
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            ?>
            <a href='javascript:window.history.go(-1)' class="btn btn-voltar btn-success pull-right">Retornar</a>
			<form action="mensagem.php" method="POST">
				<div class="row">
					<div class="container-la">
					<?php foreach ($results as $result): ?>
				    <input type="hidden" class="form-control" value="<?php echo $idmens; ?>" id="idmens" name="idmens">
				  	<div class="form-group col-xs-12 col-sm-12">
				    	<label for="assuntomens">Assunto:</label>
				    	<input type="text" class="form-control" id="assuntomens" disabled value="<?php echo $result->assuntomens; ?>" name="assuntomens">
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-12">
				    	<label for="descricaomens">Descrição:</label>
				    	<textarea class="form-control" id="descricaomens" disabled name="descricaomens" rows="3"><?php echo $result->descricaomens; ?></textarea>
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-4">
				    	<label for="datamens">Data:</label>
				    	<input type="date" class="form-control" disabled value="<?php echo $result->datamens; ?>" id="datamens" name="datamens">
				  	</div>
				  	<div class="form-group col-xs-12 col-sm-4">
				    	<label for="horamens">Hora:</label>
				    	<input type="text" class="form-control" disabled id="horamens" value="<?php echo $result->horamens; ?>" name="horamens">
				  	</div>
				  	<div class="col-xs-12 col-sm-4">
				  		<label for="horamens">     </label>
				  		<input class="btn btn-block btn-danger" type="submit" name="botao" value="Deletar">
				  	</div>
				  	</div>
				</div>
				<?php endforeach;?>
			</form>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>