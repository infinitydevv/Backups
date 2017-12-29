<?php 

	@session_start();
	require_once('function.php');

	if(logadoAdm()){
		unset($_SESSION['nomeAdm']);
		unset($_SESSION['idAdm']);
		unset($_SESSION['emailAdm']);
		unset($_SESSION['statusAdm']);
		header("Location: https://www.infinitydev.com.br/e-commerce/");
	}else if(logadoUsuario()){
		unset($_SESSION['nomeUser']);
		unset($_SESSION['emailUser']);
		unset($_SESSION['idUser']);
		unset($_SESSION['statusUser']);
		header("Location: https://www.infinitydev.com.br/e-commerce/");
	}

?>