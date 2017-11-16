<?php
	
	require_once('Class/Conto.php');
	require_once('../conexao/Conexao.php');

	$c = new Conto();

	$id = $_POST['id'];

	$c->setId_c($id);
	$rs = $c->listarContosId();

	foreach ($rs as $r) {
		echo 
			"<div class='conto'>
				<div class='prlx'>
					<a id='btn-titulo'><h1 class='text-center' style='color: #000;'>".$r->titulo_c."</h1>
					<p class='text-center' style='color: #000;'>por ".$r->nome_u."</p></a>
				</div>
				<div id='id".$r->id_c."' class='conteudo' style='color: #000
				;'><div class='container'>
					".$r->paragrafo_c."
					<br>
					Imagem:
					<img src='".$r->foto_c."' width='150' class='img-thumbnail'>
					</div>
				</div>
			</div>'";
	}

?>