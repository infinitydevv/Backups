<?php 
	require_once("conexao.php");
	require_once("usuario.php");

	$u = new Usuario();

	$users = $u->pesquisarUser();

	foreach ($users as $user) {
		echo "ID: " . $user->iduser. "<br>";
		echo "Nome: " . $user->nomeuser. "<br>";
		echo "Login: " . $user->loginuser. "<br>";
		echo "Senha: " . $user->senhauser. "<br>";
		echo "<a href='excluirUser.php?idExcluir=".$user->iduser."&nomeExcluir=".$user->nomeuser."&loginExcluir=".$user->loginuser."&senhaExcluir=".$user->senhauser."'>Excluir</a>";
		echo "<a href='alterarUser.php?idAlterar=".$user->iduser."'>Editar</a>";
		echo "<br>=================================<br>";
	}
?>

<form action="action.php" method="POST">
	Nome:<input type="text" name="nome"><br><br>
	Login:<input type="text" name="login"><br><br>
	Senha:<input type="text" name="senha"><br><br>
	<input type="submit" name="botao" value="Gravar">
</form>