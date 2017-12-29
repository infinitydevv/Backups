<?php 
	
	function logadoUsuario(){
		if($_SESSION['statusUser'] != ""){
			return true;
		}else{
			return false;
		}
	}

	function logadoAdm(){
		$status = isset($_SESSION['statusAdm']) ? $_SESSION['statusAdm'] : '';
		if($status != ""){
			return true;
		}else{
			return false;
		}
	}

?>