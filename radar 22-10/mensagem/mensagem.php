<?php  
	session_start();
	require_once "class/Mensagem.php";
	require_once "../conexoes/conexao.php";

	$idcli = isset($_POST['idcli']) ? $_POST['idcli'] : '';
	$idusu = isset($_POST['idusu']) ? $_POST['idusu'] : '';
	$idimo = isset($_POST['idimo']) ? $_POST['idimo'] : '';
	$idmens = isset($_POST['idmens']) ? $_POST['idmens'] : '';
	$descricao = isset($_POST['descricaomens']) ? $_POST['descricaomens'] : '';
	$assunto = isset($_POST['assuntomens']) ? $_POST['assuntomens'] : '';
	$data = isset($_POST['datamens']) ? $_POST['datamens'] : '';
	$hora = isset($_POST['horamens']) ? $_POST['horamens'] : '';

	$botao = isset($_POST['botao']) ? $_POST['botao'] : '';


	$men = new Mensagem();

	if($botao == "Salvar"){
		$men->setIdcliven($idcli);
		$men->setIdusu($_SESSION['iduser']);
		$men->setIdimo($idimo);
		$men->setAssuntomens($assunto);
		$men->setDescricaomens($descricao);
		$men->setDatamens($data);
		$men->setHoramens($hora);

		$men->inserirMens();
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Mensagem adicionada.</div>';
		header('Location: index.php');
		exit;
	}else if($botao == "Editar"){
		$men->setIdmens($idmens);
		$men->setAssuntomens($assunto);
		$men->setDescricaomens($descricao);
		$men->setDatamens($data);
		$men->setHoramens($hora);

		$men->editarMens();
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Mensagem editada.</div>';
		header("Location: editar.php?m=$idmens");
		exit;
	}else if($botao == "Deletar"){
		$men->setIdmens($idmens);

		$men->deletarMens();
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Mensagem deletada.</div>';
		header('Location: index.php');
		exit;
	}


?>