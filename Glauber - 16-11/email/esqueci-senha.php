<?php 
	session_start();
	require_once('../conexao/Conexao.php');
	require_once('functions.php');
	require_once('../usuario/Class/Usuario.php');

	$email = isset($_POST['email']) ? $_POST['email'] : '';

	$u = new Usuario();

	if(empty($email)){
		$_SESSION['msgEmail'] = 'Preencha o e-mail.';
		header('Location: ../login.php');
		exit;
	}
	if(validMail($email)){
		$u->setEmail_u($email);
		$rs = $u->listarUsuarioEmailV();
		if(count($rs) <= 0){
			$_SESSION['msgEmail'] = 'E-mail não existente.';
			header('Location: ../login.php');
			exit;
		}else{
			$senhaNova = str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz");
			$id = 0;
			$nome = '';
			foreach ($rs as $r) {
				$id = $r->id_u;
				$nome = $r->nome_u;
			}

			$pass = password_hash(md5($senhaNova), PASSWORD_BCRYPT);

			$u->setSenha_u($pass);
			$u->setId_u($id);
			$u->updateUsuarioSenha();

			if(enviarMail($email, "Sua senha foi alterada!", "Prezado senhor(a) ".$nome.", sua senha foi alterada com sucesso. Sua senha foi modificada para: ".$senhaNova, $nome)){
				$_SESSION['msgEmail'] = "Senha alterada, confira seu e-mail.";
			}else{
				$_SESSION['msgEmail'] = "Erro ao enviar o e-mail.";
			}

		}
		header('Location: ../login.php');
	}
?>