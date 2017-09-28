<?php
	include 'conectar.php';	

	$login = mysql_real_escape_string($_POST['login']);
	$senha = mysql_real_escape_string($_POST['senha']);


	
		$sql = mysql_query("select * from usuario where login = '$login'");
																	
		while($linha = mysql_fetch_array($sql)){
			$senha_db = $linha['senha'];
			$nomecompleto = $linha['nome'];
			$id = $linha['id'];
			$foto = $linha['foto'];
			
			
			
		}

		$cont = mysql_num_rows($sql);

		if($cont == 0){
			echo"
			<meta http-equiv='refresh' content='0; url=login.php' />
			<script type='text/javascript'> alert('Login Invalido!!') </script>
			";
		}else{
			if($senha_db != $senha){
				echo"
				<meta http-equiv='refresh' content='0; url=login.php' />
				<script type='text/javascript'> alert('Senha Invalida!!') </script>
				";
			} else{
				session_start();
				$_SESSION['login_usuario'] =  $login;
				$_SESSION['senha_usuario'] =  $senha_db;
				$_SESSION['nomecompleto_usuario'] = $nomecompleto;
				$_SESSION['img_usuario'] = $foto;
				$_SESSION['id'] = $id;
				
			   
				
				
				echo"
			<meta http-equiv='refresh' content='0; url=are.php' />";
			}
		}
	
	

/*

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
		"secret"=>"	6Lee4DAUAAAAAJ98lEGD_OSAOoasmc3gOmaicOAu",
		"response"=>$_POST["g-recaptcha-response"],
		"remoteip"=>$_SERVER["REMOTE_ADDR"]
	)));

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$recaptcha = json_decode(curl_exec($ch), true);

	curl_close($ch);
	if($recaptcha["success"] === true){
		
		$sql = mysql_query("select * from usuario where login = '$login'");
																	
		while($linha = mysql_fetch_array($sql)){
			$senha_db = $linha['senha'];
			$nomecompleto = $linha['nome'];
			$id = $linha['id'];
			$foto = $linha['foto'];
			
			
			
		}

		$cont = mysql_num_rows($sql);

		if($cont == 0){
			echo"
			<meta http-equiv='refresh' content='0; url=login.php' />
			<script type='text/javascript'> alert('Login Invalido!!') </script>
			";
		}else{
			if($senha_db != $senha){
				echo"
				<meta http-equiv='refresh' content='0; url=login.php' />
				<script type='text/javascript'> alert('Senha Invalida!!') </script>
				";
			} else{
				session_start();
				$_SESSION['login_usuario'] =  $login;
				$_SESSION['senha_usuario'] =  $senha_db;
				$_SESSION['nomecompleto_usuario'] = $nomecompleto;
				$_SESSION['img_usuario'] = $foto;
				$_SESSION['id'] = $id;
				
			   
				
				
				echo"
			<meta http-equiv='refresh' content='0; url=are.php' />";
			}
		}

	}else {
    	
		header("Location: login.php");

	}*/
//mysql_close($db);
?>