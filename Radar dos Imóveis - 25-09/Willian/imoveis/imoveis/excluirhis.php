<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
	
	

    $crud = new crud('historico'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro //****************************************************OPA***********************************************
    $id = $_GET['idhistorico']; //pega id para exclusao caso exista
	
		
    $crud->excluir("idhistorico = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao

    header("Location: historico.php"); // redireciona para a listagem
	
?>