<?php 
	
	require_once('../../Conexao/Conexao.php');
	require_once('../Class/Usuario.php');
	require_once('../DAO/UsuarioDAO.php');

	$id = isset($_POST['id']) ? addslashes($_POST['id']) : '';
	$nome = isset($_POST['nome']) ? addslashes($_POST['nome']) : '';
	$email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
	$senha = isset($_POST['senha']) ? addslashes($_POST['senha']) : '';
	$cpf = isset($_POST['cpf']) ? addslashes($_POST['cpf']) : '';
	$estado = isset($_POST['estado']) ? addslashes($_POST['estado']) : '';
	$cidade = isset($_POST['cidade']) ? addslashes($_POST['cidade']) : '';
	$cep = isset($_POST['cep']) ? addslashes($_POST['cep']) : '';
	$endereco = isset($_POST['endereco']) ? addslashes($_POST['endereco']) : '';
	$numero = isset($_POST['numero']) ? addslashes($_POST['numero']) : '';
	$botao = isset($_POST['botao']) ? addslashes($_POST['botao']) : '';

	$c = new Conexao();
	$u = new Usuario();
	$uDAO = new UsuarioDAO();

	if($botao == 'Salvar'){
		$u->setNome_u($nome);
		$u->setEmail_u($email);
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		$u->setSenha_u($senhaCript);
		$u->setCpf_u($cpf);
		$u->setEstado_u($estado);
		$u->setCidade_u($cidade);
		$u->setCep_u($cep);
		$u->setEndereco_u($endereco);
		$u->setNumero_u($numero);
		$uDAO->addUser($u);
		echo 'OK Salvar';
		exit;
	}else if($botao == 'Editar'){
		$u->setId_u($id);
		$u->setNome_u($nome);
		$u->setEmail_u($email);
		$u->setCpf_u($cpf);
		$u->setEstado_u($estado);
		$u->setCidade_u($cidade);
		$u->setCep_u($cep);
		$u->setEndereco_u($endereco);
		$u->setNumero_u($numero);
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		if($senha != ''){
			$u->setSenha_u($senhaCript);
			$uDAO->editUser($u);
		}else{
			$uDAO->editUserSS($u);
		}

		echo 'OK Editar';
		exit;
	}else if($botao == 'Excluir'){
		$u->setId_u($id);
		$uDAO->excUser($u);
		echo 'OK Excluir';
		exit;
	}
?>