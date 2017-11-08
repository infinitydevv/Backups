<?php 

	require_once('usuario/Class/Usuario.php');
	require_once('conexao/Conexao.php');

	$u = new Usuario();

	$login = isset($_POST['login']) ? $_POST['login'] : '';

?>