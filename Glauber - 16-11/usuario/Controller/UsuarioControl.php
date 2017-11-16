<?php
	session_start();
	require_once('../Class/Usuario.php');
	require_once('../../conexao/Conexao.php');

	$user = new Usuario();

	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	$botao = isset($_POST['botao']) ? $_POST['botao'] : '';


	if($botao == 'cadastrar'){

		$pass = password_hash(md5($senha), PASSWORD_BCRYPT);

		$user->setNome_u($nome);
		$user->setEmail_u($email);
		$user->setSenha_u($pass);
		$user->setLogin_u($login);

		$rs = $user->addUsuario();


		if(!empty($rs)){
			$_SESSION['msgUsu'] = '<div class="alert alert-success" role="alert">
		  Cadastrado!
		</div>';
		}else{
			$_SESSION['msgUsu'] = '<div class="alert alert-danger" role="alert">
		  Erro ao cadastrar!
		</div>';
		}
		header('Location: ../index.php');
	}else if($botao == 'editar'){

		$pass = password_hash(md5($senha), PASSWORD_BCRYPT);

		$user->setId_u($id);
		$user->setNome_u($nome);
		$user->setEmail_u($email);
		$user->setSenha_u($pass);
		$user->setLogin_u($login);

		$rs = $user->updateUsuario();


		if(!empty($rs)){
			$_SESSION['msgUsu'] = '<div class="alert alert-warning" role="alert">
		  Alterado!
		</div>';
		
		}else{
			$_SESSION['msgUsu'] = '<div class="alert alert-danger" role="alert">
		  Erro ao atualizar!
		</div>';
		
		}
		header('Location: ../index.php');
	}else if($botao == 'excluir'){
		$user->setId_u($id);

		$rs = $user->deleteUsuario();


		if(!empty($rs)){
			$_SESSION['msgUsu'] = '<div class="alert alert-danger" role="alert">
		  Deletado!
		</div>';
		}else{
			$_SESSION['msgUsu'] = '<div class="alert alert-danger" role="alert">
		  Erro!
		</div>';
		}
		header('Location: ../index.php');
	}
	else if($botao == 'editarA'){

		$pass = password_hash(md5($senha), PASSWORD_BCRYPT);

		$user->setId_u($id);
		$user->setNome_u($nome);
		$user->setEmail_u($email);
		$user->setSenha_u($pass);
		$user->setLogin_u($login);

		$rs = $user->updateUsuario();


		if(!empty($rs)){
			echo'<div class="alert alert-warning" role="alert">
		  Alterado!
		</div>';
		}else{
			echo'<div class="alert alert-danger" role="alert">
		  Erro ao atualizar!
		</div>';
		}
	}
	
	
?>