<?php

require_once('../Class/Produto.php');
require_once('../DAO/ProdutoDAO.php');
require_once('../../Conexao/Conexao.php');

$p = new Produto();
$pDAO = new ProdutoDAO();
$c = new Conexao();

$id = isset($_POST['id']) ? addslashes($_POST['id']) : '';
$nome = isset($_POST['nome']) ? addslashes($_POST['nome']) : '';
$desc = isset($_POST['desc']) ? addslashes($_POST['desc']) : '';
$preco = isset($_POST['preco']) ? addslashes($_POST['preco']) : '';
$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
$imagem = $_FILES['imagem']['name'];
$imgAtual = isset($_POST['imgAtual']) ? addslashes($_POST['imgAtual']) : '';
$botao = isset($_POST['botao']) ? addslashes($_POST['botao']) : '';

	$n = strrchr($imagem, "."); //pega a extensão do arquivo
	$extpermitida = array('.jpg', '.jpeg', '.png', 'gif');


	if($botao == 'Salvar'){

		if($_FILES['imagem']['name']){
			if(in_array($n, $extpermitida)){

				$nomefoto = md5(uniqid(time())).$n;

				if(!file_exists($nomefoto)){

					if(move_uploaded_file($_FILES['imagem']['tmp_name'], '../img/'.$nomefoto)){

						$nome_foto = $nomefoto;

					}else{
						echo "Erro ao enviar";
					}
				}else{
					$nomefoto = sha1(md5(uniqid(time()))).$n;

					if(file_exists($nomefoto)){
						if(move_uploaded_file($_FILES['imagem']['tmp_name'], '../img/'.$nomefoto)){

							$nome_foto = $nomefoto;

						}else{
							echo "errou ao enviar";
						}
					}
				}

			}else{
				echo "Extensão inválida";
			}
		}else{
			$nome_foto = 'padrao.png';
		}

		$p->setNome_p($nome);
		$p->setDesc_p($desc);
		$p->setPreco_p($preco);
		$p->setImagem_p($nome_foto);
		$p->setStatus_p($status);

		$pDAO->addProduto($p);
		echo 'OK Salvar';
		exit;
	}else if($botao == 'Editar'){

		if($_FILES['imagem']['name']){
			if(in_array($n, $extpermitida)){

				$nomefoto = md5(uniqid(time())).$n;

				if(!file_exists($nomefoto)){

					if(move_uploaded_file($_FILES['imagem']['tmp_name'], '../img/'.$nomefoto)){

						unlink("../img/".$imgAtual);
						$nome_foto = $nomefoto;
						$p->setImagem_p($nome_foto);

					}else{
						echo "Erro ao enviar";
					}
				}else{
					$nomefoto = sha1(md5(uniqid(time()))).$n;

					if(file_exists($nomefoto)){
						if(move_uploaded_file($_FILES['imagem']['tmp_name'], '../img/'.$nomefoto)){

							unlink("../img/".$imgAtual);
							$nome_foto = $nomefoto;
							$p->setImagem_p($nome_foto);

						}else{
							echo "errou ao enviar";
						}
					}
				}

			}else{
				echo "Extensão inválida";
			}
		}else{
			$p->setImagem_p($imgAtual);
		}

		
		$p->setId_p($id);
		$p->setNome_p($nome);		
		$p->setDesc_p($desc);
		$p->setPreco_p($preco);
		$p->setStatus_p($status);

		$pDAO->editProduto($p);

		echo 'OK Editar';

	}else if($botao == 'Excluir'){

		$p->setId_p($id);
		$p->setStatus_p(0);

		$pDAO->editStatusProduto($p);
		echo "OK Excluir";
		exit;
	}

	?>