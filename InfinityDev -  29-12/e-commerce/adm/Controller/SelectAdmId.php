<?php

	require_once('../Class/Adm.php');
	require_once('../DAO/AdmDAO.php');
	require_once('../../Conexao/Conexao.php');

	$a = new Adm();
	$aDAO = new AdmDAO();
	$c = new Conexao();

	$id = isset($_GET['id']) ? $_GET['id'] : '';

	$a->setId_a($id);
	$rs = $aDAO->selectAdm($a, 1);
	$json = json_encode($rs);
	print_r($json);

?>