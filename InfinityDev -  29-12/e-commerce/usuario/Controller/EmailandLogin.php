<?php
	@session_start();
	require_once('../../Conexao/Conexao.php');
	require_once('../DAO/UsuarioDAO.php');
	require_once('../Class/Usuario.php');
	require_once('cpf.php');

	$c = new Conexao();
	$u = new Usuario();
	$uDAO = new UsuarioDAO();

	$email  = isset($_GET['email']) ? addslashes($_GET['email']) : '';
	$cpf  = isset($_GET['cpf']) ? addslashes($_GET['cpf']) : '';


	if($email != ''){
		$u->setEmail_u($email);
		$rs = $uDAO->selectEmail($u);
		if(count($rs) > 0){
			foreach ($rs as $r) {
				if($_SESSION['emailUser'] == $r->email_u){
					echo 'Disponível';
					exit;
				}else{
					echo 'Indisponível';
					exit;
				}
			}
		}else{
			echo 'Disponível';
			exit;
		}
	}else if($cpf != ''){
		$cpfReal = chunk_split($cpf, 1, '-');
		if(cpf($cpfReal)){
			$u->setCpf_u($cpf);
			$rs = $uDAO->selectCpf($u);

			if(count($rs) > 0){
				foreach ($rs as $r) {
					if($_SESSION['cpfUser'] == $r->cpf_u){
						echo 'Disponível';
						exit;
					}else{
						echo 'Indisponível';
						exit;
					}
				}
			}else{
				echo 'Disponível';
				exit;
			}
		}else{
			echo 'Indisponível';
			exit;
		}
	}

?>