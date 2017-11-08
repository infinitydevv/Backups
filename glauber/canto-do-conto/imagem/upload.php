<?php 
  session_start();
  $data = $_POST['image'];
  $img = $_POST['name'];
  $ext = $_POST['ext'];

  $caminho = '../fotos/'.$img.'.'.$ext;

  list($type, $data) = explode(';', $data);
  list(, $data)      = explode(',', $data);

  $data = base64_decode($data);

	if(file_put_contents($caminho, $data)){
		$_SESSION['msgConto'] = '<div class="alert alert-success" role="alert">
		Cadastrado!
		</div>';
	}else{
		$_SESSION['msgConto'] = '<div class="alert alert-danger" role="alert">
		Erro ao cadastrar!
		</div>';
	}

?>