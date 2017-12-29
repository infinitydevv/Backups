<?php 
	@session_start();
	require_once('../../Conexao/Conexao.php');
	require_once('../../usuario/Controller/cpf.php');
	require_once('../Class/Adm.php');
	require_once('../DAO/AdmDAO.php');

	$c = new Conexao();
	$a = new Adm();
	$aDAO = new AdmDAO();

	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$btn = isset($_POST['btn']) ? $_POST['btn'] : '';

	if($btn == "cadNome"){
		$a->setNome_a($nome);
		$a->setId_a($id);
		$aDAO->editNomeAdm($a);
		$_SESSION['nomeAdm'] = $nome;
		echo 'OK Nome';
	}else if($btn == "cadEmail"){
		$a->setEmail_a($email);
		$a->setId_a($id);
		$aDAO->editEmailAdm($a);
		$_SESSION['emailAdm'] = $email;
		echo "OK Email";
	}else if($btn == "cadSenha"){
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		$a->setSenha_a($senhaCript);
		$a->setId_a($id);
		$aDAO->editSenhaAdm($a);
		echo "OK Senha";
	}else if($btn == "cadLogin"){
		$a->setLogin_a($login);
		$a->setId_a($id);
		$aDAO->editLoginAdm($a);
		$_SESSION['loginAdm'] = $login;
		echo "OK Login";
	}
?>