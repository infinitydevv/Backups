<?php
session_start();
require_once('../Class/Conto.php');
require_once('../../conexao/Conexao.php');


$id= isset($_POST['id']) ? $_POST['id'] : '';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
$foto = isset($_POST['imagem']) ? $_POST['imagem'] : '';
$descricao =  isset($_POST['desc']) ? $_POST['desc'] : '';
$imagem = $_FILES['foto']['name'];
$imgtemp = $_FILES['foto']['tmp_name'];
$ext = strtolower(substr($_FILES['foto']['name'],-4));
$ext1 = strtolower(substr($_FILES['foto']['name'],-3));
$botao = isset($_POST['botao']) ? $_POST['botao'] : '';


if($botao == 'cadastrar'){

	$c = new Conto();
	$cc = Conexao::getConnection();
	$new1 = '';
	if($imagem != ''){
		if($ext == '.png' || $ext == '.jpg' || $ext == '.gif'){

			$new2 = md5(uniqid(time()));
			$new1 = $new2.$ext;
				
			if(move_uploaded_file($imgtemp, "../fotos/".$new1)){
				
		          $new = "../canto-do-conto/fotos/".$new1;
		          $c->setFoto_c($new);
		          $url = '../imagem/cropImage.php?foto='.$new2.'&ext='.$ext1;
				
			}else{
				echo "errou ao enviar";
			}

		}else{
			echo "Extensão inválida";
		}
	}else{
		$c->setFoto_c('');
		$url = "../index.php";
	}

	$c->setTitulo_c($titulo);
	$c->setParagrafo_c($descricao);
	$c->setId_u($_SESSION['idUser']);
	$rs = $c->inserirConto();
	header('Location: '.$url);
}else if($botao == 'editar'){
    
	$c = new Conto(); 
	$new = '';
	if(!empty($imagem)){
		if($ext == '.png' || $ext == '.jpg' || $ext == '.gif'){

			$new = md5(uniqid(time())).$ext;
				
			if(move_uploaded_file($imgtemp, '../fotos/'.$new)){
				
		          $new = "../canto-do-conto/fotos/".$new;
		          if(!empty($foto)){
		          	unlink('../'.$foto);
		          	$c->setFoto_c($new);
		          	$novo = explode('/', $new);
					$novoURL = explode('.', $novo[3]);
					$url = '../imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1];
		          }else{
		          	$c->setFoto_c($new);
		          	$novo = explode('/', $new);
					$novoURL = explode('.', $novo[3]);
		          	$url = '../imagem/cropImage.php?foto='.$novoURL[0].'&ext='.$novoURL[1];
		          }
			}else{
				echo "errou ao enviar";
			}

		}else{
			echo "Extensão inválida";
		}
	}else if(!empty($foto)){
		$c->setFoto_c($foto);
		$url = "../index.php";
	}else{
		$c->setFoto_c('');
		$url = "../index.php";
	}

	$c->setTitulo_c($titulo);
	$c->setParagrafo_c($descricao);
	$c->setId_u($_SESSION['idUser']);
	$c->setId_c($id);
	$rs = $c->updateConto();
	if(!empty($rs)){
		$_SESSION['msgConto'] = '<div class="alert alert-success" role="alert">
		Atualizado!
		</div>';

	}else{
		$_SESSION['msgConto'] = '<div class="alert alert-danger" role="alert">
		Erro ao atualizar!
		</div>';
	}
	header('Location: '.$url);
}else if($botao == 'excluir'){
	$u = new Conto();
	$u->setId_c($id);

	$re = $u->listarContosId();

	foreach ($re as $r) {
		if($r->foto_c != ''){
			if(!unlink('../'.$r->foto_c)){
				$_SESSION['msgConto'] = '<div class="alert alert-danger" role="alert">Erro ao deletar, foto.</div>';
				echo "erro na foto";
				exit;
			}
		}
	}
	$rs = $u->deleteConto();

	if(!empty($rs)){
		$_SESSION['msgConto'] = '<div class="alert alert-danger" role="alert">
		Excluído com Sucesso!
		</div>';
	}else{
		$_SESSION['msgConto'] = '<div class="alert alert-danger" role="alert">
		Erro ao excluir!
		</div>';
	}
	header('Location: ../index.php');
}



?>