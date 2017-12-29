<?php

	require_once('../Class/Desconto.php');
	require_once('../DAO/DescontoDAO.php');
	require_once('../../Conexao/Conexao.php');

	$d = new Desconto();
	$dDAO = new DescontoDAO();
	$c = new Conexao();

	$cod = isset($_GET['cod']) ? $_GET['cod'] : '';

	$d->setCod_des($cod);
	$rs = $dDAO->selectCupom($d);

	if(count($rs) > 0){
		foreach ($rs as $r) {
			echo '<div id="retornoCupomChip" class="chip">'.$r->cod_des.' - R$'.number_format($r->valor_des, 2, ',', '.').'<i class="close material-icons">close</i></div>';
		}
	}else{
		echo '<div id="retornoCupomChip" class="chip red">Cupom inválido<i class="close material-icons">close</i></div>';
	}

?>