<?php 
	session_start();
	require_once('../usuario/Class/Usuario.php');
	require_once('../conexao/Conexao.php');

	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

	if(!empty($login) && !empty($senha)){
		$u = new Usuario();
		$u->setLogin_u($login);

		$r = $u->listarUsuarioLoginL();

		if(count($r) > 0){

			foreach ($r as $key) {
				if(password_verify(md5($senha), $key->senha_u)){

					$_SESSION['idUser'] = $key->id_u;
					$_SESSION['nomeUser'] = $key->nome_u;
					$_SESSION['loginUser'] = $key->login_u;
					echo 'success';
				}else{
					echo '<div id="alert" class="alert alert-danger" role="alert">
							Usuário ou senha incorretos.
						  </div>';
				}	
			}
		}else{
			echo '<div id="alert" class="alert alert-danger" role="alert">
							Usuário ou senha incorretos.
						  </div>';
		}
	}else{
		echo '<div id="alert" class="alert alert-danger" role="alert">
				Digite login e senha.
			  </div>';
	}

?>