<?php
    include 'conectar.php';	
	$login = mysql_real_escape_string($_POST['login']);
	$senha = mysql_real_escape_string($_POST['senha']);
	
	
	
	$sql = mysql_query("select * from usuario where login = '$login'");
																
	while($linha = mysql_fetch_array($sql)){
		$senha_db = $linha['senha'];
		$nomecompleto = $linha['nome'];
		$id = $linha['id'];
		
		
		
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
			$_SESSION['id'] = $id;
			
		   
			
			
			echo"
		<meta http-equiv='refresh' content='0; url=area.php' />";
		}
	}
//mysql_close($db);
?>