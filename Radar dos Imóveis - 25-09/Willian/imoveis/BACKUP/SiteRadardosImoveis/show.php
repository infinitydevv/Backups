<?php

//conexão com o banco de dados
@mysql_connect("localhost","root","");
@mysql_select_db("radari");
// Seleciona todos os usuários
$sql = mysql_query("SELECT * FROM usuario ORDER BY nome");

// Exibe as informações de cada usuário
while ($usuario = mysql_fetch_object($sql)) {
	// Exibimos a foto
	echo "<img src='fotos/".$usuario->foto."' alt='Foto de exibição' /><br />";
	// Exibimos o nome e email
	echo "<b>Nome:</b> " . $usuario->nome . "<br />";
	echo "<b>Email:</b> " . $usuario->email . "<br /><br />";
}


?>