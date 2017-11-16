<?php 
function db_connect(){
	$conn = new PDO("mysql:host=localhost;dbname=radardos_imoveis", "radardosimoveisc", "Alterar1234");
	return $conn;
}
db_connect();
?>