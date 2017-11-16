<?php 

	require_once('../conexao/Conexao.php');

	$c = new Conexao();

	$login = $_GET['login'];
	$email = $_GET['email'];

	if(!empty($login)){

		$rs = $c->select("SELECT * FROM tbusuario where login_u = :login", array(":login"=>$login));

		$rs1 = count($rs);

		if($rs1 > 0){
			echo "is-invalid";
		}else{
			echo "is-valid";
		}
	}else if(!empty($email)){

		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

		if(preg_match($regex, $email)){
			$rs = $c->select("SELECT * FROM tbusuario where email_u = :email", array(":email"=>$email));

			$rs1 = count($rs);

			if($rs1 > 0){
				echo "is-invalid";
			}else{
				echo "is-valid";
			}
		}else{
			echo "is-invalid";
		}

	}
?>