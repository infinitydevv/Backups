<?php  
@session_start();
$id = $_POST['id'];
$btn = $_POST['botao'];


if($btn == 'rItem'){

	for ($i=0; $i < count($_SESSION['carrinho']) ; $i++) { 
		if($_SESSION['carrinho'][$i]['id'] == $id){
			unset($_SESSION['carrinho'][$i]);
			$_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
			echo 'Item removido';
			exit;
		}
	}

}else if($btn == 'rTodos'){
	unset($_SESSION['carrinho']);
	echo 'Carrinho limpo';
	exit;
}

?>