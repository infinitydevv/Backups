<?php
require '../conexoes/conexao.php';
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
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    }
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM captador c inner join cidade ci on c.cidade = ci.idcity where 1';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM captador c inner join cidade ci on c.cidade = ci.idcity';
	$termo1 = (isset($_GET['combo'])) ? $_GET['combo'] : '';
	if($termo1 == 1 ){
			$sql .= ' WHERE nomecap LIKE :nome order by idusu';
		    $stm = $conexao->prepare($sql);
	        $stm->bindValue(':nome', $termo.'%');
    }else if($termo1 == 2 ){
			$sql .= ' WHERE email LIKE :email order by idusu';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':email', $termo.'%');
	}else if($termo1 == 3 ){
			$sql .= ' WHERE fonecel LIKE :fonecel order by idusu';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':fonecel', $termo.'%');
	}else if($termo1 == 4 ){
			$sql .= ' WHERE funcao LIKE :funcao order by idusu';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':funcao', $termo.'%');
	}else if($termo1 == 5){
		$sql .= ' WHERE cidade LIKE :cidade order by idusu';
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
	<title>Listagem de Captador</title>
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
		<h1 class="text-center text-laranja">Captador</h1>
		<fieldset>
			<!-- Cabeçalho da Listagem -->
			<legend><a href='../area.php' class="btn btn-voltar btn-success pull-right">Retornar</a><br><br></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-center ">
						<label class="control-label text-laranja" for="termo" style="font-size: 14pt;">Pesquisar</label>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
				    	<input type="text" class="form-control text-laranja" id="termo" name="termo" placeholder="Infome o Nome, E-mail, Celular, Função ou Cidade"><br>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 div-mar'>
						<select size="1" name="combo" class="form-control text-laranja">
							<option selected value="1">Selecione!</option>
							<option value="1">Nome</option>
							<option value="2">E-mail</option>
							<option value="3">Celular</option>
							<option value="4">Função</option>
							<option value="5">Cidade</option>	
						</select>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-left div-mar">
					    <button type="submit" class="btn show btn-md btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn show btn-md btn-primary">Ver Todos</a>

					    <button type="submit" class="btn hide btn-md btn-block btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn hide btn-md btn-block  btn-primary">Ver Todos</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-right">
						<a href='cadastro.php' class="btn show btn-md btn-success">Cadastrar Captador</a>
						<a href='cadastro.php' class="btn hide btn-md btn-block btn-success">Cadastrar Captador</a>
					</div>
				   </div>
			</form>
			<!-- Link para página de cadastro -->
		</fieldset>
	</div>
	<div class="container show2 ">
		<?php if(!empty($clientes)):?>
				<!-- Tabela de Clientes -->
				<table class="table table-hover">
					<tr class="warning">
						<th>Foto</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Celular</th>
						<th>Cidade</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<?php if($cliente->status == 1): ?>
						<tr class="success">
							<td><img src='fotos/<?=$cliente->foto?>' height='40' width='40'></td>
							<td><?=$cliente->nomecap?></td>
							<td><?=$cliente->email?></td>
							<td><?=$cliente->fonecel?></td>
							<td><?=$cliente->nomecity?></td>
							<td>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="hide btn btn-xs  btn-warning btn-block ">Editar</a>
								<a href='javascript:void(0)' class="hide btn btn-xs btn-danger btn-block link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="show btn btn-sm show btn-warning">Editar</a>
								<a href='javascript:void(0)' class="show btn btn-sm btn-danger link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
							</td>
						</tr>
						<?php else: ?>
							<tr class="danger">
							<td><img src='fotos/<?=$cliente->foto?>' height='40' width='40'></td>
							<td><?=$cliente->nomecap?></td>
							<td><?=$cliente->email?></td>
							<td><?=$cliente->fonecel?></td>
							<td><?=$cliente->nomecity?></td>
							<td>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="hide btn btn-xs  btn-warning btn-block ">Editar</a>
								<a href='javascript:void(0)' class="hide btn btn-xs btn-danger btn-block link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="show btn btn-sm show btn-warning">Editar</a>
								<a href='javascript:void(0)' class="show btn btn-sm btn-danger link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
							</td>
						</tr>
					<?php endif; ?>
					<?php endforeach;?>
				</table>
			<?php else: ?>
				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Captadores cadastrados!</h3>
			<?php endif; ?>
		</div>
		<div class="hide">
			<?php if(!empty($clientes)):?>
				<!-- Tabela de Clientes -->
				<table class="table table-hover">
					<tr class='active'>
						<th>Foto</th>
						<th>Nome</th>
						<th>Cidade</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><img src='fotos/<?=$cliente->foto?>' height='40' width='40'></td>
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->nomecity?></td>
							<td>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="hide btn btn-xs  btn-warning btn-block ">Editar</a>
								<a href='javascript:void(0)' class="hide btn btn-xs btn-danger btn-block link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
								<a href='editar.php?idcap=<?=$cliente->idcap?>' class="show btn btn-md show btn-warning">Editar</a>
								<a href='javascript:void(0)' class="show btn btn-md btn-danger link_exclusao" rel="<?=$cliente->idcap?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>
			<?php else: ?>
				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Captadores cadastrados!</h3>
			<?php endif; ?>
		</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>