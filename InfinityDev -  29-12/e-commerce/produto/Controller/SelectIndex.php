<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

	require_once('../DAO/ProdutoDAO.php');
	require_once('../../Conexao/Conexao.php');

	$pDAO = new ProdutoDAO();
	$c = new Conexao();

	$init = isset($_POST['init']) ? $_POST['init'] : 0;
	$final = isset($_POST['final']) ? $_POST['final'] : 0;
	$btn = isset($_POST['btn']) ? $_POST['btn'] : '';

	if($btn == 'um'){
		$rs = $pDAO->selectProdIndex($init, $final);
		foreach ($rs as $r) {
			echo '<div class="col s12 m4">
			      <div class="card">
			        <div class="card-image">
			          <img src="produto/img/'.$r->imagem_p.'" class="responsive-img">
			          <a class="btn-floating halfway-fab waves-effect waves-light red" onclick="carrinho('.$r->id_p.');"><i class="material-icons">add_shopping_cart</i></a>
			        </div>
			        <div class="card-content">
			        	<span class="card-title center-align" style="color: #d50000 !important; font-size: 12pt!important;"><strong>'.htmlspecialchars($r->nome_p).'</strong></span>
			        	<div class="row">
			        		<div class="col s6"><p class="right-align" style="font-size: 10pt!important;">R$ '.htmlspecialchars(number_format($r->preco_p, 2, ',', '.')).'</p></div>
			        		<div class="col s6"><a href="#" class="left-align">Ver mais</a></div>
			        	</div>
			        </div>
			      </div>
			    </div>';
		}
	}else if($btn == 'todos'){
		$rs = $pDAO->selectProdIndex($init, $final);
		if(count($rs) > 0){
			echo "Sim";
		}else{
			echo "Nao";
		}
	}

?>