<?php 
	
	$cep = $_GET['cep'];
	$link = "https://viacep.com.br/ws/$cep/json/";

	$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$rs = curl_exec($ch);

	curl_close($ch);

	print_r($rs);

?>