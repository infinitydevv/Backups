<?php
	@session_start();
	require_once('../Class/Adm.php');
	require_once('../DAO/AdmDAO.php');
	require_once('../../Conexao/Conexao.php');

	$a = new Adm();
	$aDAO = new AdmDAO();
	$c = new Conexao();

	$login = isset($_GET['login']) ? $_GET['login'] : '';
	$email = isset($_GET['email']) ? $_GET['email'] : '';
	$btn = isset($_GET['btn']) ? $_GET['btn'] : '';

	if($btn == "login"){
		$a->setLogin_a($login);
		$rs = $aDAO->selectLogin($a);
		if(count($rs) > 0){
			foreach ($rs as $r) {
				if($_SESSION['loginAdm'] == $r->login_a){
					echo "Login válido.";
				}else{
					echo "Login ja cadastrado.";
				}
			}
		}else{
			echo "Login válido.";
		}
	}else if($btn == "email"){
		$a->setEmail_a($email);
		$rs = $aDAO->selectEmail($a);
		if(count($rs) > 0){
			foreach ($rs as $r) {
				if($_SESSION['emailAdm'] == $r->email_a){
					echo "E-mail válido.";
				}else{
					echo "E-mail ja cadastrado.";
				}
			}
		}else{
			echo "E-mail válido.";
		}
	}

?>