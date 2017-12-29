<?php

@session_start();

require_once('../Conexao/Conexao.php');
require_once('../adm/DAO/AdmDAO.php');
require_once('../adm/Class/Adm.php');
require_once('../usuario/DAO/UsuarioDAO.php');
require_once('../usuario/Class/Usuario.php');


$c = new Conexao();
$aDAO = new AdmDAO();
$a = new Adm();
$uDAO = new UsuarioDAO();
$u = new Usuario();


$email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
$senha = isset($_POST['senha']) ? addslashes($_POST['senha']) : '';

if(!empty($email) && !empty($senha)){


	$u->setEmail_u($email);
	$rs = $uDAO->logar($u);

	if(count($rs) > 0){
		foreach ($rs as $r) {
			if(password_verify($senha, $r->senha_u)){
				$_SESSION['idUser'] = $r->id_u;
				$_SESSION['nomeUser'] = $r->nome_u;
				$_SESSION['emailUser'] = $r->email_u;
				$_SESSION['cpfUser'] = $r->cpf_u;
				$_SESSION['statusUser'] = 'ativo';
				header('Location: ../index.php');
				exit;
			}
		}
	}

	$a->setEmail_a($email);
	$rs2 = $aDAO->logar($a);

	if(count($rs2) > 0){
		foreach ($rs2 as $r2) {
			if(password_verify($senha, $r2->senha_a)){
				$_SESSION['idAdm'] = $r2->id_a;
				$_SESSION['nomeAdm'] = $r2->nome_a;
				$_SESSION['emailAdm'] = $r2->email_a;
				$_SESSION['loginAdm'] = $r2->login_a;
				$_SESSION['statusAdm'] = 'ativo';
				header('Location: ../area-adm.php');
				exit;					
			}else{
				$_SESSION['msgLogin'] = 'Login ou senha incorretos.';
				header('Location: login.php');
				exit;
			}
		}
	}else{
		$_SESSION['msgLogin'] = 'Login ou senha incorretos.';
		header('Location: login.php');
		exit;
	}
}else{

	$_SESSION['msgLogin'] = 'Preencha todos os campos.';
	header('Location: login.php');
	exit;

}

?>