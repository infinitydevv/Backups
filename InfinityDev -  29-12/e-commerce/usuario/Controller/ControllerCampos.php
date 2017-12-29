<?php 
	@session_start();
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	require_once('../../Conexao/Conexao.php');
	require_once('../Controller/cpf.php');
	require_once('../Class/Usuario.php');
	require_once('../DAO/UsuarioDAO.php');

	$c = new Conexao();
	$u = new Usuario();
	$uDAO = new UsuarioDAO();

	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
	$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
	$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
	$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
	$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
	$rua = isset($_POST['rua']) ? $_POST['rua'] : '';

	$btn = isset($_POST['btn']) ? $_POST['btn'] : '';

	if($btn == "cadNome"){
		$u->setNome_u($nome);
		$u->setId_u($id);
		$uDAO->editNomeUsuario($u);
		$_SESSION['nomeUser'] = $nome;
		echo 'OK Nome';
	}else if($btn == "cadEmail"){
		$u->setEmail_u($email);
		$u->setId_u($id);
		$uDAO->editEmailUsuario($u);
		$_SESSION['emailUser'] = $email;
		echo "OK Email";
	}else if($btn == "cadSenha"){
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		$u->setSenha_u($senhaCript);
		$u->setId_u($id);
		$uDAO->editSenhaUsuario($u);
		echo "OK Senha";
	}else if($btn == "cadCPF"){
		$u->setCpf_u($cpf);
		$u->setId_u($id);
		$uDAO->editCpfUsuario($u);
		$_SESSION['cpfAdm'] = $cpf;
		echo "OK CPF";
	}else if($btn == "cadEndereco"){
		$u->setEstado_u($estado);
		$u->setCep_u($cep);
		$u->setCidade_u($cidade);
		$u->setNumero_u($numero);
		$u->setEndereco_u($rua);
		$u->setId_u($id);

		$uDAO->editEnderecoUsuario($u);
		echo "OK ENDERECO";
	}
?>