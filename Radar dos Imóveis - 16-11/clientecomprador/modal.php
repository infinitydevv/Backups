<?php  
	require_once "../conexoes/conexao.php";
	$pdo = conexao::getInstance();;
	if($_GET){
		$id = $_GET['id'];

		$sql = "SELECT * FROM clientecomprador where idclicom = :id";


		$stm = $pdo->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_OBJ);

		foreach ($result as $key) {
			echo '<div class="row">
				<div class="col-xs-6">
					<h2>Dados do Cliente Comprador</h2>
					<ul>
						<li>ID: '.$key->idclicom.'</li>
						<li>Nome: '.$key->nome.'</li>
						<li>CPF: '.$key->cpf.'</li>
						<li>Email: '.$key->email.'</li>
						<li>Celular: '.$key->celular.'</li>
						<li>Telefone: '.$key->telefone.'</li>
					</ul>
					<strong>Endereço:</strong><br>
					'.$key->cidade.', '.$key->bairro.' rua '.$key->logradouro.', '.$key->numero.'<br>
					CEP: '.$key->cep.'
				</div>
				<div class="col-xs-6">
				 	<h2>Observações</h2>
				 	<p>'.$key->obs1.'</p>
				 	<p>'.$key->obs2.'</p>
				 	<p>'.$key->obs3.'</p>
				</div>
			</div>';
		}
					
	}else{
		echo "errão";
	}

?>