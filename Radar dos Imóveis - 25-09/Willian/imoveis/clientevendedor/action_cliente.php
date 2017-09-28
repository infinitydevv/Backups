<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
	<title>Sistema de Cadastro - Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$idcliven    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$cpf   = (isset($_POST['cpf'])) ? $_POST['cpf'] : '';
		$cnpj   = (isset($_POST['cnpj'])) ? $_POST['cnpj'] : '';
		$email = (isset($_POST['email'])) ? $_POST['email'] : '';		
		$telefone = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
		$celular  = (isset($_POST['celular'])) ? str_replace(array('-', ' '), '', $_POST['celular']) : '';
		$logradouro   = (isset($_POST['logradouro'])) ? $_POST['logradouro'] : '';
		$numero   = (isset($_POST['numero'])) ? $_POST['numero'] : '';
		$cep   = (isset($_POST['cep'])) ? $_POST['cep'] : '';
		$cidade   = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
		$bairro   = (isset($_POST['bairro'])) ? $_POST['bairro'] : '';
		$conjuge   = (isset($_POST['conjuge'])) ? $_POST['conjuge'] : '';
		$cpfconjuge   = (isset($_POST['cpfconjuge'])) ? $_POST['cpfconjuge'] : '';
		$pessoacontato   = (isset($_POST['pessoacontato'])) ? $_POST['pessoacontato'] : '';
		$login   = (isset($_POST['login'])) ? $_POST['login'] : '';
		$status   = (isset($_POST['status'])) ? $_POST['status'] : '';
		$senha   = (isset($_POST['senha'])) ? $_POST['senha'] : '';
		$obs   = (isset($_POST['obs'])) ? $_POST['obs'] : '';
      

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
/*
			if ($conjuge == ''):
			   $mensagem .= '<li>Favor preencher o conjuge.</li>';
			endif;
			if ($cpfconjuge == ''):
			   $mensagem .= '<li>Favor preencher o CPF conjuge.</li>';
			endif;			
			if ($pessoacontato == ''):
			   $mensagem .= '<li>Favor preencher a pessoa contato.</li>';
			endif;*/
			if ($obs == ''):
			   $mensagem .= '<li>Favor preencher o Observação.</li>';
			endif;
			if ($login == ''):
			   $mensagem .= '<li>Favor preencher o login.</li>';
			endif;
				if ($senha == ''):
			   $mensagem .= '<li>Favor preencher a senha.</li>';
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

			

			$sql = 'INSERT INTO clientevendedor (nome, cpf, cnpj,email,celular,telefone,logradouro,numero,cep,cidade,bairro,conjuge,cpfconjuge,pessoacontato,login,senha,status,obs)
							   VALUES  (:nome,:cpf,:cnpj,:email,:celular,:telefone,:logradouro,:numero,:cep,:cidade,:bairro,:conjuge,:cpfconjuge,:pessoacontato,:login,:senha,:status,:obs)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':cnpj', $cnpj);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':conjuge', $conjuge);
			$stm->bindValue(':cpfconjuge', $cpfconjuge);
			$stm->bindValue(':pessoacontato', $pessoacontato);
			$stm->bindValue(':login', $login);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':obs', $obs);
		
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

		
																				
			$sql = 'UPDATE clientevendedor SET nome=:nome, cpf=:cpf, cnpj=:cnpj, email=:email, celular=:celular,telefone=:telefone, logradouro=:logradouro, numero=:numero,cep=:cep,cidade=:cidade,bairro=:bairro,conjuge=:conjuge,cpfconjuge=:cpfconjuge,pessoacontato=:pessoacontato, login=:login, senha=:senha,	obs=:obs';
			$sql .= ' WHERE idcliven = :id';

			$stm = $conexao->prepare($sql);
			
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':cnpj', $cnpj);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':conjuge', $conjuge);
			$stm->bindValue(':cpfconjuge', $cpfconjuge);
			$stm->bindValue(':pessoacontato', $pessoacontato);
			$stm->bindValue(':login', $login);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':obs', $obs);
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
			$sql = 'DELETE FROM clientevendedor WHERE idcliven = :id';
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