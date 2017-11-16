<?php 
	session_start();
	
	function logado(){
		if(empty($_SESSION['idUser']) || empty($_SESSION['nomeUser']) || empty($_SESSION['loginUser'])){
			return false;
		}else{
			return true;
		}
	}

	function sair(){
		session_start();
		unset($_SESSION['idUser']);
		unset($_SESSION['nomeUser']);
		unset($_SESSION['loginUser']);
		session_destroy();
	}
?>