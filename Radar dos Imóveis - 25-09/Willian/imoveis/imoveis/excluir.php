<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao();  // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
	$getId = $_GET['idimo'];
	$consulta = mysql_query("SELECT * FROM imovel WHERE idimo =  $getId "); 
	$campo = mysql_fetch_array($consulta);
		
	$foto1=$campo['foto1'];
	
	$foto2=$campo['foto2'];
	$foto3=$campo['foto3'];
	$foto4=$campo['foto4'];
	$foto5=$campo['foto5'];
	/*******************************/
	$arquivo1=$foto1;
	$arquivo2=$foto2;
	$arquivo3=$foto3;
	$arquivo4=$foto4;
	$arquivo5=$foto5;
	/********************************/
	
	if($arquivo1 != '../imoveis/fotosprodutos/padrao.png'){
		$deletar1=unlink($arquivo1);
	}else{
		$deletar1=$arquivo1;		
	}
	if($arquivo1 != '../imoveis/fotosprodutos/padrao.png'){
	$deletar2=unlink($arquivo2);
	}else{
		$deletar2=$arquivo2;		
	}
	if($arquivo2 != '../imoveis/fotosprodutos/padrao.png'){
	$deletar3=unlink($arquivo3);
	}else{
		$deletar3=$arquivo3;		
	}
	if($arquivo4 != '../imoveis/fotosprodutos/padrao.png'){
	$deletar4=unlink($arquivo4);
	}else{
		$deletar4=$arquivo4;		
	}
	if($arquivo5 != '../imoveis/fotosprodutos/padrao.png'){
	$deletar5=unlink($arquivo5);
	}else{
		$deletar5=$arquivo5;		
	}
	/*********************************/
	if($deletar1 && $deletar2 && $deletar3 && $deletar4 && $deletar5  ){
	

    $crud = new crud('imovel'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro //****************************************************OPA***********************************************
    $id = $_GET['idimo']; //pega id para exclusao caso exista
	
		
    $crud->excluir("idimo = $id"); // exclui o registro com o id que foi passado

    $con->disconnect(); // fecha a conexao

   
	}
?>