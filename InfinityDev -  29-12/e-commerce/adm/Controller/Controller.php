<?php 
	
	require_once('../../Conexao/Conexao.php');
	require_once('../Class/Adm.php');
	require_once('../DAO/AdmDAO.php');

	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	$botao = isset($_POST['botao']) ? $_POST['botao'] : '';

	$c = new Conexao();
	$a = new Adm();
	$aDAO = new AdmDAO();

	if($botao == 'Salvar'){
		$a->setNome_a($nome);
		$a->setEmail_a($email);
		$a->setLogin_a($login);
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		$a->setSenha_a($senhaCript);
		$aDAO->addAdm($a);
		echo 'OK Salvar';
		exit;
	}else if($botao == 'Editar'){
		$a->setId_a($id);
		$a->setNome_a($nome);
		$a->setLogin_a($login);
		$a->setEmail_a($email);
		$senhaCript = password_hash($senha, PASSWORD_BCRYPT);
		if($senha != ''){
			$a->setSenha_a($senhaCript);
			$aDAO->editAdm($a);
		}else{
			$aDAO->editAdmSS($a);
		}

		echo 'OK Editar';
		exit;
	}else if($botao == 'Excluir'){
		$a->setId_a($id);
		$aDAO->excAdm($a);
		echo 'OK Excluir';
		exit;
	}
?>