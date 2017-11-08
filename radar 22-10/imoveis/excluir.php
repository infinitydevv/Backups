<?php


	/*@session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
	if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    }*/
      



   	require_once '../conexoes/conexao.php';
    $conn = conexao::getInstance();

	$id = isset($_GET['idimo']) ? $_GET['idimo'] : '';
	$sql = "SELECT * FROM imovel WHERE idimo = :id;";;
	$stm = $conn->prepare($sql);
	$stm->bindValue(':id', $id);
	$stm->execute();
	$rs = $stm->fetchAll(PDO::FETCH_ASSOC);


		
		foreach ($rs as $key) {

			$foto1=$key['foto1'];
			$foto2=$key['foto2'];
			$foto3=$key['foto3'];
			$foto4=$key['foto4'];
			$foto5=$key['foto5'];

			/*******************************/
			$arquivo1= (string)$foto1;
			$arquivo2= (string)$foto2;
			$arquivo3= (string)$foto3;
			$arquivo4= (string)$foto4;
			$arquivo5= (string)$foto5;


			$deletar1 = "";
			$deletar2 = "";
			$deletar3 = "";
			$deletar4 = "";
			$deletar5 = "";

			/********************************/
			
			if($arquivo1 != '../imoveis/fotosprodutos/padrao.png'){
				$deletar1=unlink($arquivo1);
			}else{
				$deletar1=$arquivo1;		
			}

			if($arquivo2 != '../imoveis/fotosprodutos/padrao.png'){
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
			
				
				$sql = "DELETE FROM imovel where idimo = :id;";
				$stm = $conn->prepare($sql);
				$stm->bindValue(':id', $id);
				$stm->execute();



		   
		}
		header("Location: index.php");
	
?>