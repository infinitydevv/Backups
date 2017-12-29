<?php

	require_once('../Class/Usuario.php');
	require_once('../DAO/UsuarioDAO.php');
	require_once('../../Conexao/Conexao.php');

	$u = new Usuario();
	$uDAO = new UsuarioDAO();
	$c = new Conexao();

	$id = isset($_GET['id']) ? addslashes($_GET['id']) : '';

	$u->setId_u($id);
	$rs = $uDAO->selectUser($u, 1);
	$json = json_encode($rs);
	print_r($json);

?>