<?php

	require_once('../Class/Desconto.php');
	require_once('../DAO/DescontoDAO.php');
	require_once('../../Conexao/Conexao.php');

	$d = new Desconto();
	$dDAO = new DescontoDAO();
	$c = new Conexao();

	$id = isset($_GET['id']) ? $_GET['id'] : '';

	$d->setId_des($id);
	$rs = $dDAO->selectDesconto($d, 1);
	$json = json_encode($rs);
	print_r($json);

?>