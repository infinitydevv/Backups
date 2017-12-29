<?php  
	@session_start();
	$id = $_POST['id'];
	$quantidade = $_POST['quant'];
	for ($i=0; $i < count($_SESSION['carrinho']) ; $i++) { 
		if($_SESSION['carrinho'][$i]['id'] == $id){
			$_SESSION['carrinho'][$i]['quantidade'] = $quantidade;
			echo "Quantidade atualizada";
			exit;
		}
	}

?>