<?php
	session_start();
	// COMEÇA AQUI O DOCUMENTO
	require_once 'modelDocumento.php';
	require_once 'controllerDocumento.php';
	$controller = new controllerDocumento;
	$model = new modelDocumento;

	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : ''; //descrição do documento
	$idUsu = $_SESSION['iduser']; //id do usuário que enviou documento
	$nomearquivo = $_FILES['inputArquivo']['name']; //nome do arquivo
	$tempname = $_FILES['inputArquivo']['tmp_name']; //nome temporário do arquivo
	$extpermitida = array('.ptf', '.ppt', '.pptx', '.xls', '.xlsx', '.doc', '.docx', '.txt', '.7z', 
	'.rar', '.zip', '.jpg', '.png', '.gif', '.bmp', '.rtf'); //extensões permitidas para upload
	
	$acao = isset($_POST['acao']) ? $_POST['acao'] : "visualizar"; //pega a ação a ser executada
	
	$n = strrchr($nomearquivo, "."); //pega a extensão do arquivo

	if($acao == "cadastrar"){
		if($_FILES['inputArquivo']['name']){
			if(in_array($n, $extpermitida)){
				$destino = 'documentos/'.md5(uniqid(time())).$n;
				if(move_uploaded_file($tempname, $destino)) {
					$urldocumento = '/uploadDocumentos/'.$destino;
					$model->setId("default");
					$model->setDescricao($descricao);
					$model->setUrl($urldocumento);
					$model->setIdUsu($idUsu);
				} else {
					echo "Erro ao enviar";
				}
			} else {
				echo "Extensão Não Permitida!";
			}
		}
		//Seta informações no Model
		

		if($controller->inserirDados($model)){
			echo "<div class='alert alert-success' role='alert'>Documento enviado com sucesso, aguarde você está sendo redirecionado ...</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Erro ao enviar documento!</div>";
		}
		echo "<meta http-equiv=refresh content='3;URL=index.php'>";
	}

	if($acao == "remover"){
		$model->setId(addslashes($_POST['idDocumento']));
		$arquivoAnt = $_POST['arquivoAnt'];
		if($controller->removerDados($model, $arquivoAnt)){
			unlink($_SERVER['DOCUMENT_ROOT'].$arquivoAnt);
			return true;
		} else {
			return false;
		}
	}

	if($acao == "editar"){
		$arquivoAnt = $_POST['arquivoAntigo'];
		if($_FILES['inputArquivo']){
			if(in_array($n, $extpermitida)){
				$destino = 'documentos/'.md5(uniqid(time())).$n;
				if(move_uploaded_file($tempname, $destino)){
					$urldocumento = '/uploadDocumentos/'.$destino;
					$model->setId($_POST['idDocumento']);
					$model->setDescricao($descricao);
					$model->setUrl($urldocumento); //UPLOAD DOCUMENTO
					$model->setIdUsu($idUsu);
					$controller->atualizarDados($model);
					unlink($_SERVER['DOCUMENT_ROOT'].$arquivoAnt);
				} else {
					return "Erro ao enviar!";

				}
			} else {
				return "Tipo de Arquivo não permitido";
			}
		} else {
			$model->setId($_POST['idDocumento']);
			$model->setDescricao($descricao);
			$model->setIdUsu($idUsu);
			$model->setUrl($arquivoAnt);
			$controller->atualizarDados($model);
		}
	}


?>