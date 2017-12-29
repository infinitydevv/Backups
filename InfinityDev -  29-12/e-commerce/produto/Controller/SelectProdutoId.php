<?php

	require_once('../Class/Produto.php');
	require_once('../DAO/ProdutoDAO.php');
	require_once('../../Conexao/Conexao.php');
	
	$p = new Produto();
	$pDAO = new ProdutoDAO();
	$c = new Conexao();

	$id = isset($_GET['id']) ? addslashes($_GET['id']) : '';

	if(is_numeric($id) || strlen($id) <= 6){

		$p->setId_p($id);
		$rs = $pDAO->selectProd($p, 1);
		$json = json_encode($rs);
		print_r($json);

	}else{

		exit;

	}

?>