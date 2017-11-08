<?php 
	require_once("conexao.php");
	require_once("usuario.php");
	$u = new Usuario();

	$botao = isset($_POST['botao']) ? $_POST['botao'] : '';
	

	if($botao == "Gravar"){
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$login = isset($_POST['login']) ? $_POST['login'] : '';
		$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
		if(!empty($nome) || !empty($login) || !empty($senha)){
			$u->setNomeUser($nome);
			$u->setLoginUser($login);
			$u->setSenhaUser($senha);

			$u->addUser();
			echo '<meta http-equiv="refresh" content="2; index.php">';
		}else{
			echo "Preencha todos os campos de texto, você será redirecionado!";
			echo '<meta http-equiv="refresh" content="4; index.php">';
		}
	}else if($botao == "Excluir"){
		$idExc = isset($_POST['idExc']) ? $_POST['idExc'] : '';
		if(!empty($idExc)){
			$u->setIdUser($idExc);
			$u->deleteUser();
			echo '<meta http-equiv="refresh" content="2; index.php">';
		}else{
			echo 'Erro ao Excluir o usuário!';
		}
	}else if($botao == "Editar"){
		$idAlt = isset($_POST['idAlt']) ? $_POST['idAlt'] : '';
		$nomeAlt = isset($_POST['nomeAlt']) ? $_POST['nomeAlt'] : '';
		$loginAlt = isset($_POST['loginAlt']) ? $_POST['loginAlt'] : '';
		$senhaAlt = isset($_POST['senhaAlt']) ? $_POST['senhaAlt'] : '';
		if(!empty($nomeAlt) || !empty($loginAlt) || !empty($senhaAlt) || !empty($idAlt)){
			$u->setNomeUser($nomeAlt);
			$u->setLoginUser($loginAlt);
			$u->setSenhaUser($senhaAlt);
			$u->setIdUser($idAlt);

			$u->editUser();
			echo '<meta http-equiv="refresh" content="4; index.php">';
		}else{
			echo "Erro ao Editar o usuário!";
		}
	}
?>