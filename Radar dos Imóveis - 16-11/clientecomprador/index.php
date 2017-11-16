<?php
	require_once '../conexoes/conexao.php';
    @session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=login.php'/>";
      exit;
    }

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM clientecomprador cl inner join cidade c on cl.cidade = c.idcity where 1';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

else:
	$termo1 = (isset($_GET['combo'])) ? $_GET['combo'] : '';
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * from clientecomprador cl inner join cidade c on cl.cidade = c.idcity';

	if($termo1 == 1){
		$sql .= ' where nome like :nome order by idcliven';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(":nome", $termo.'%');
	}else if($termo1 == 2){
		$sql .= ' where email like :email order by idcliven';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':email', $termo.'%');
	}else if($termo1 == 3){
		$sql .= ' where celular like :celular order by idcliven';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':celular', $termo.'%');
	}
	else if($termo1 == 4){
		$sql .= ' where cidade like :cidade order by idcliven';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':cidade', $termo.'%');
	}
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
	<title>Listagem de Clientes Comprador</title>
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
</head>
<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
	<div class='container cabe'>
		<h1 class="text-center text-laranja">Clientes Comprador</h1>
		<fieldset>
			<!-- Cabeçalho da Listagem -->
			<legend><a href='../area.php' class="btn btn-voltar btn-success pull-right">Retornar</a><br><br></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-center">
						<label class=" control-label text-laranja" for="termo" style="font-size: 14pt;">Pesquisar</label>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
				    	<input type="text" class="form-control text-laranja" id="termo" name="termo" placeholder="Infome o Código ou Tipo ou Cidade ou Corretor ou Proprietário ou Valor"><br>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 div-mar'>
						<select size="1" name="combo" class="form-control text-laranja">
							<option selected value="1">Selecione!</option>
							<option value="1">Nome</option>
							<option value="2">E-mail</option>
							<option value="3">Celular</option>
							<option value="4">Cidade</option>
						</select>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-left div-mar">
					    <button type="submit" class="btn show btn-md btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn show btn-md btn-primary">Ver Todos</a>

					    <button type="submit" class="btn hide btn-md btn-block btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn hide btn-md btn-block  btn-primary">Ver Todos</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-right">
						<a href='cadastro.php' class="btn show btn-md btn-success">Cadastrar Cliente Comprador</a>
						<a href='cadastro.php' class="btn hide btn-md btn-block btn-success">Cadastrar Cliente Comprador</a>
					</div>
				   </div>
					
			</form>

			<!-- Link para página de cadastro -->


		</fieldset>

	</div>
	<div class="container show2">
	<?php if(!empty($clientes)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-hover">
					<tr class='warning'>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Celular</th>
						<th>Cidade</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<?php if($cliente->status == "Ativo"): ?>
						<tr class="success">
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->email?></td>
							<td><?=$cliente->celular?></td>
							<td><?=$cliente->nomecity?></td>
							<td>
								<a href='editar.php?idcliven=<?=$cliente->idclicom?>' class="show btn btn-md show btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
								<a href='javascript:void(0)' onclick="confirmaExclusao(<?=$cliente->idclicom?>);" class="show btn btn-md btn-danger" rel="<?=$cliente->idclicom?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
								<button class="show btn btn-sm btn-primary btn-modal" id="btn-modal" onclick="modal(<?php echo $cliente->idclicom; ?>);" rel="<?php echo $cliente->idimo; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></button>

							</td>
						</tr>
					<?php else: ?>
						<tr class="danger">
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->email?></td>
							<td><?=$cliente->celular?></td>
							<td><?=$cliente->nomecity?></td>
							<td>
								<a href='editar.php?idcliven=<?=$cliente->idclicom?>' class="show btn btn-md show btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
								<a href='javascript:void(0)' onclick="confirmaExclusao(<?=$cliente->idclicom?>);" class="show btn btn-md btn-danger" rel="<?=$cliente->idclicom?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
								<button class="show btn btn-sm btn-primary btn-modal" id="btn-modal" onclick="modal(<?php echo $cliente->idclicom; ?>);" rel="<?php echo $cliente->idimo; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></button>

							</td>
						</tr>
					<?php endif; ?>
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem imóveis cadastrados!</h3>
			<?php endif; ?>
		</div>
		<div class="hide">
			<?php if(!empty($clientes)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-striped">
					<tr class='warning'>
						<th>Nome</th>
						<th>Celular</th>
						<th>Cidade</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<?php if($cliente->status == "Ativo"): ?>
							<tr class="success">
								<td><?=$cliente->nome?></td>
								<td><?=$cliente->celular?></td>
								<td><?=$cliente->nomecity?></td>
								<td>
									<a href='editar.php?idcliven=<?=$cliente->idclicom?>' class="hide btn btn-xs btn-warning btn-block "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
									<a href='javascript:void(0)' onclick="confirmaExclusao(<?=$cliente->idclicom?>);" class="hide btn btn-xs btn-danger btn-block" rel="<?=$cliente->idclicom?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
									<button class="hide btn btn-xs btn-primary btn-block btn-modal" id="btn-modal" onclick="modal(<?php echo $cliente->idclicom; ?>);" rel="<?php echo $cliente->idimo; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></button>
								</td>
							</tr>					
						<?php else: ?>
							<tr class="danger">
								<td><?=$cliente->nome?></td>
								<td><?=$cliente->celular?></td>
								<td><?=$cliente->nomecity?></td>
								<td>
									<a href='editar.php?idcliven=<?=$cliente->idclicom?>' class="hide btn btn-xs btn-warning btn-block "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
									<a href='javascript:void(0)' onclick="confirmaExclusao(<?=$cliente->idclicom?>);" class="hide btn btn-xs btn-danger btn-block" rel="<?=$cliente->idclicom?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
									<button class="hide btn btn-xs btn-primary btn-block btn-modal" id="btn-modal" onclick="modal(<?php echo $cliente->idclicom; ?>);" rel="<?php echo $cliente->idimo; ?>" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></button>
								</td>
							</tr>					
						<?php endif; ?>
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Clientes cadastrados!</h3>
			<?php endif; ?>
		</div>

		<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="gridSystemModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Descrição do Cliente</h4>
					      </div>
					      <div class="modal-body">
					        <p id="retorno"></p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div>
		<script src="script.js"></script>
		<script src="js/custom.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


