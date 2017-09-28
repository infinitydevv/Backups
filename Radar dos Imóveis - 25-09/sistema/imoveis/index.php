<?php
require '../conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	
	/*$sql = 'SELECT i.idimo, i.tipo, i.cidade, u.nome, 
	        c.nome, i.valorvendaimo FROM imovel i INNER JOIN usuario u on i.idimo = u.idusu 
			INNER JOIN clientevendedor c on i.idimo = c.idcliven';*/
			
	$sql = 'SELECT * FROM imovel';		
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	
	
	$sql = 'SELECT idimo, tipo, cidade, valorvendaimo FROM imovel';
	$termo1 = (isset($_GET['combo'])) ? $_GET['combo'] : '';
          
		  if($termo1 == 1 ){
			$sql .= ' WHERE tipoimo         LIKE :tipo';
		    $stm = $conexao->prepare($sql);
	        $stm->bindValue(':tipo', $termo.'%');
    }else if($termo1 == 2 ){
			$sql .= ' WHERE cidade        LIKE :cidade';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':cidade', $termo.'%');
	}else if($termo1 == 3 ){
			$sql .= ' WHERE idimo = :idimo';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':idimo', $termo);
	}else {
			$sql .= ' WHERE valorvendaimo >= :valorvendaimo ';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':valorvendaimo', $termo);
	}		
	  
		          
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Listagem de Imóveis</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Listagem de Imóveis</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-3'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Código ou Tipo ou Cidade ou Corretor ou Proprietário ou Valor">
						
				</div>
				<div class='col-md-3'>
						<select size="1" name="combo" class="form-control">
							<option selected value="1">Selecione!</option>
							
							<option value="1">Tipo de imóvel</option>
							<option value="2">cidade</option>
							<option value="3">Código</option>
							<option value="4">Valor Imóvel acima de </option>
							
						</select>
						</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='index.php' class="btn btn-primary">Ver Todos</a>
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro.php' class="btn btn-success pull-right">Cadastrar Imóvel</a>
			<div class='clearfix'></div>

			<?php if(!empty($clientes)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-striped">
					<tr class='active'>

						<th>Código</th>
						<th>Tipo</th>
						<th>Cidade</th>
						<th>Valor</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><?=$cliente->idimo?></td>
							<td><?=$cliente->tipo?></td>
							<td><?=$cliente->cidade?></td>
							<td><?=$cliente->valorvendaimo?></td>
							<td>
								<a href='cadastro.php?idimo=<?=$cliente->idimo?>' class="btn btn-primary">Editar</a>
								<a href='excluir.php?idimo=<?=$cliente->idimo?>' class="btn btn-danger">Excluir</a>
                               
                           
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem imóveis cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>