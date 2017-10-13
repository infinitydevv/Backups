<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro - Cliente Comprador</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../conexoes/conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$idcliven    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$cpf   = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';

		$email = (isset($_POST['email'])) ? $_POST['email'] : '';		
		$telefone = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
		$celular  = (isset($_POST['celular'])) ? str_replace(array('-', ' '), '', $_POST['celular']) : '';
		$logradouro   = (isset($_POST['logradouro'])) ? $_POST['logradouro'] : '';
		$numero   = (isset($_POST['numero'])) ? $_POST['numero'] : '';
		$cep   = (isset($_POST['cep'])) ? $_POST['cep'] : '';
		$cidade   = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
		$bairro   = (isset($_POST['bairro'])) ? $_POST['bairro'] : '';
	
		$status   = (isset($_POST['status'])) ? $_POST['status'] : '';
		$obs1   = (isset($_POST['obs1'])) ? $_POST['obs1'] : '';	
		$obs2   = (isset($_POST['obs2'])) ? $_POST['obs2'] : '';
		$obs3   = (isset($_POST['obs3'])) ? $_POST['obs3'] : '';
      

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $idcliven == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
		
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;


			if ($email == ''):
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)):
				  $mensagem .= '<li>Formato do E-mail inválido.</li>';
			endif;

/*
			if ($telefone == ''): 
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
			elseif(strlen($telefone) < 10):
				  $mensagem .= '<li>Formato do Telefone inválido.</li>';
		    endif;

			if ($celular == ''):
				$mensagem .= '<li>Favor preencher o Celular.</li>';
			elseif(strlen($celular) < 11):
				  $mensagem .= '<li>Formato do Celular inválido.</li>';
			endif;
*/
			if ($status == ''):
			   $mensagem .= '<li>Favor preencher o Status.</li>';
			endif;
			if ($logradouro == ''):
			   $mensagem .= '<li>Favor preencher o logradouro.</li>';
			endif;
			if ($numero == ''):
			   $mensagem .= '<li>Favor preencher o número.</li>';
			endif;
			if ($cep == ''):
			   $mensagem .= '<li>Favor preencher o cep.</li>';
			endif;
			if ($cidade == ''):
			   $mensagem .= '<li>Favor preencher o cidade.</li>';
			endif;
			if ($bairro == ''):
			   $mensagem .= '<li>Favor preencher o bairro.</li>';
			endif;
			
		
			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

			// Constrói a data no formato ANSI yyyy/mm/dd
			
		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			

			$sql = 'INSERT INTO clientecomprador (nome, cpf, email,celular,telefone,logradouro,numero,cep,cidade,bairro,status,obs1,obs2,obs3)
							   VALUES  (:nome,:cpf,:email,:celular,:telefone,:logradouro,:numero,:cep,:cidade,:bairro,:status,:obs1,:obs2,:obs3)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':obs1', $obs1);
			$stm->bindValue(':obs2', $obs2);
			$stm->bindValue(':obs3', $obs3);
		
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

		
																				
			$sql = 'UPDATE clientecomprador SET nome=:nome, cpf=:cpf, email=:email, celular=:celular,telefone=:telefone, logradouro=:logradouro, numero=:numero,cep=:cep,cidade=:cidade,bairro=:bairro,status=:status ,obs1=:obs1, obs2=:obs2, obs3=:obs3';
			$sql .= ' WHERE idclicom = :id';

			$stm = $conexao->prepare($sql);
			
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':cpf', $cpf);
		
			$stm->bindValue(':email', $email);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':obs1', $obs1);
			$stm->bindValue(':obs2', $obs2);
			$stm->bindValue(':obs3', $obs3);
			$stm->bindValue(':id', $idcliven);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
          

		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir'):
           

		

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM clientecomprador WHERE idclicom = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $idcliven);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
	
		?>

	</div>
</body>
</html>