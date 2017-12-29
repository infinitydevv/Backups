<?php 
		ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
	require_once('../../Conexao/Conexao.php');
	require_once('../Class/Desconto.php');
	require_once('../DAO/DescontoDAO.php');

	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$cod = isset($_POST['cod']) ? $_POST['cod'] : '';
	$status = isset($_POST['status']) ? $_POST['status'] : '';
	$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
	$botao = isset($_POST['botao']) ? $_POST['botao'] : '';

	$c = new Conexao();
	$d = new Desconto();
	$dDAO = new DescontoDAO();

	if($botao == 'Salvar'){
		$d->setCod_des($cod);
		$d->setStatus_des($status);
		$d->setValor_des($valor);
		$dDAO->addDesconto($d);
		echo 'OK Salvar';
		exit;
	}else if($botao == 'Editar'){
		$d->setId_des($id);
		$d->setCod_des($cod);
		$d->setStatus_des($status);
		$d->setValor_des($valor);
		$dDAO->editDesconto($d);
		echo 'OK Editar';
		exit;
	}else if($botao == 'Excluir'){
		$d->setId_des($id);
		$dDAO->excDesconto($d);
		echo 'OK Excluir';
		exit;
	}
?>