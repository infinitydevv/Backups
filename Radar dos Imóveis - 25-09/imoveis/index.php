<?php
require 'conexao.php';
@session_start();
      if((!isset ($_SESSION['login_usuario']) == true) and (!isset ($_SESSION['senha_usuario']) == true)) {   
        unset($_SESSION['login_usuario']); 
        unset($_SESSION['senha_usuario']); 
        echo"<script type='text/javascript'> alert('Necessario fazer o Login!!'); </script>";
        echo"<meta http-equiv='refresh' content='0; url=../login.php' />";
           //header('location: index.php'); 
      }else{
        @session_start();
        $logado = $_SESSION['nomecompleto_usuario'];
        $imgusu = $_SESSION['img_usuario'];
      }
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	
	/*$sql = 'SELECT i.idimo, i.tipo, i.cidade, u.nome, 
	        c.nome, i.valorvendaimo FROM imovel i INNER JOIN usuario u on i.idimo = u.idusu 
			INNER JOIN clientevendedor c on i.idimo = c.idcliven';*/
			
	$sql = 'SELECT i.idimo, i.tipoimo, i.cidade, i.bairro, u.nome, 
	        i.valorvendaimo, c.nomecap FROM imovel i INNER JOIN usuario u on i.idusu = u.idusu inner join captador c on i.idcap = c.idcap where 1 order by i.idimo';		
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	
	
	//$sql = 'SELECT idimo,  tipoimo, cidade, valorvendaimo, idusu FROM imovel';
	$sql = 'SELECT i.idimo, i.tipoimo, i.cidade, i.bairro, u.nome, 
	        i.valorvendaimo, c.nomecap FROM imovel i INNER JOIN usuario u on i.idusu = u.idusu inner join captador c on i.idcap = c.idcap';
	$termo1 = (isset($_GET['combo'])) ? $_GET['combo'] : '';
          
		  if($termo1 == 1 ){
			$sql .= ' WHERE i.tipoimo LIKE :tipo order by i.idimo';
		    $stm = $conexao->prepare($sql);
	        $stm->bindValue(':tipo', $termo.'%');
    }else if($termo1 == 2 ){
			$sql .= ' WHERE i.cidade LIKE :cidade order by i.idimo';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':cidade', $termo.'%');
	}else if($termo1 == 3 ){
			$sql .= ' WHERE i.idimo = :idimo order by i.idimo';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':idimo', $termo);
	}else if($termo1 == 4 ){
			$sql .= ' WHERE i.valorvendaimo >= :valorvendaimo order by i.idimo';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':valorvendaimo', $termo);
	}else if($termo1 == 5){
		$sql .= ' WHERE u.nome LIKE :nome order by i.idimo';
		    $stm = $conexao->prepare($sql);
	        $stm->bindValue(':nome', $termo.'%');
		
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
	<title>Listagem de Imóveis</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
</head>
<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
	<div class='container cabe'>
		<h1 class="text-center text-laranja">Imóveis</h1>
		<fieldset>
			<!-- Cabeçalho da Listagem -->
			<legend><a href='../are.php' class="btn btn-voltar btn-success pull-right">Retornar</a><br><br></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal">
				<div class="row">
					<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 text-center">
						<label class=" control-label text-laranja" for="termo" style="font-size: 14pt;">Pesquisar</label>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
				    	<input type="text" class="form-control text-laranja" id="termo" name="termo" placeholder="Infome o Código ou Tipo ou Cidade ou Corretor ou Proprietário ou Valor"><br>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 div-mar'>
						<select size="1" name="combo" class="form-control text-laranja">
							<option selected value="1">Selecione!</option>
							<option value="1">Tipo de imóvel</option>
							<option value="2">Cidade</option>
							<option value="3">Código</option>
							<option value="4">Valor Imóvel acima de </option>
							<option value="5">Vendedor</option>	
						</select>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-left div-mar">
					    <button type="submit" class="btn show btn-md btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn show btn-md btn-primary">Ver Todos</a>
					    

					    <button type="submit" class="btn hide btn-md btn-block btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn hide btn-md btn-block  btn-primary">Ver Todos</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-right">
						<a href='pdf.php?termo1=<?=$termo1 ?>&termo=<?=$termo ?>' class="btn show btn-md btn-primary">Imprimir</a>
						<a href='pdf.php?termo1=<?=$termo1 ?>&termo=<?=$termo ?>' class="btn hide btn-md btn-block  btn-primary">Imprimir</a><br><br>
						<a href='cadastro.php' class="btn show btn-md btn-success">Cadastrar Imóvel</a>
						<a href='cadastro.php' class="btn hide btn-md btn-block btn-success">Cadastrar Imóvel</a>
					</div>
				   </div>
					
			</form>

			<!-- Link para página de cadastro -->


		</fieldset>

	</div>
	<div class="container show2">
	<?php if(!empty($clientes)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-striped">
					<tr class='active'>
						<th>Código</th>
						<th>Tipo</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Valor</th>
						<th>Corretor</th>
						<th>Captador</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><?=$cliente->idimo?></td>
							<td><?=$cliente->tipoimo?></td>
							<td><?=$cliente->bairro?></td>
							<td><?=$cliente->cidade?></td>
							<td><?='R$' . number_format($cliente->valorvendaimo,2, ',', '.');?></td>
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->nomecap?></td>
							<td>
								<a href='cadastro.php?idimo=<?=$cliente->idimo?>' class="show btn btn-sm show btn-warning">Editar</a>
								<a href='excluir.php?idimo=<?=$cliente->idimo?>' class="show btn btn-sm btn-danger">Excluir</a>
								
                               	<a href='cadastro.php?idimo=<?=$cliente->idimo?>' class="hide btn btn-xs btn-warning btn-block ">Editar</a>
								<a href='excluir.php?idimo=<?=$cliente->idimo?>' class="hide btn btn-xs btn-danger btn-block ">Excluir</a>
								
                           
							</td>
						</tr>	
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
					<tr class='active'>

						<th>Tipo</th>
						<th>Cidade</th>
						<th>Valor</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><?=$cliente->tipoimo?></td>
							<td><?=$cliente->cidade?></td>
							<td><?='R$' . number_format($cliente->valorvendaimo,2, ',', '.');?></td>
							<td>
								<a href='pdf.php?idimo=<?=$cliente->idimo?>' class="show btn btn-md btn-primary">Imprimir</a>
								<a href='cadastro.php?idimo=<?=$cliente->idimo?>' class="show btn btn-md show btn-warning">Editar</a>
								<a href='excluir.php?idimo=<?=$cliente->idimo?>' class="show btn btn-md btn-danger">Excluir</a>
								<a href='pdf.php?idimo=<?=$cliente->idimo?>' class="hide btn btn-xs btn-primary btn-block ">Imprimir</a>
                               	<a href='cadastro.php?idimo=<?=$cliente->idimo?>' class="hide btn btn-xs  btn-warning btn-block ">Editar</a>
								<a href='excluir.php?idimo=<?=$cliente->idimo?>' class="hide btn btn-xs btn-danger btn-block ">Excluir</a>
                           
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem imóveis cadastrados!</h3>
			<?php endif; ?>
		</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>