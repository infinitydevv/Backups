<?php 
function cpf($cpf){

	$cpfReal = explode("-", $cpf);
	$n = array(10 , 9, 8, 7, 6, 5, 4, 3, 2);
	$number = array();
	$soma = 0;
	for ($i=count($cpfReal) - 3; $i >= 0 ; $i--) {
		array_push($number, $cpfReal[$i] * $n[$i]);
	}

	for($i = 0; $i <= 9; $i++){
		$soma = $soma + $number[$i];
	}
	$resto = $soma % 11;
	$primeiro_digito = 11 - $resto;

	if($primeiro_digito > 9){
		$primeiro_digito = 0;
	}else{
		$primeiro_digito = $primeiro_digito;
	}

	$n2 = array(11, 10 , 9, 8, 7, 6, 5, 4, 3, 2);
	$number2 = array();
	$soma2 = 0;
	for ($i=count($cpfReal) - 2; $i >= 0 ; $i--) {
		array_push($number2, $cpfReal[$i] * $n2[$i]);
	}
	for($i = 0; $i <= 10; $i++){
		$soma2 = $soma2 + $number2[$i];
	}
	$resto = $soma2 % 11;
	$segundo_digito = 11 - $resto;

	if($segundo_digito > 9){
		$segundo_digito = 0;
	}else{
		$segundo_digito = $segundo_digito;
	}

	if($primeiro_digito == $cpfReal[9] && $segundo_digito == $cpfReal[10]){
		return true;
	}else{
		return false;
	}
}

?>