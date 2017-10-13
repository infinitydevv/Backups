<?php 
	require_once("conexao.php");
	require_once("usuario.php");

	$idExcluir = isset($_GET['idExcluir']) ? $_GET['idExcluir'] : '';
	$nomeExcluir = isset($_GET['nomeExcluir']) ? $_GET['nomeExcluir'] : '';
	$loginExcluir = isset($_GET['loginExcluir']) ? $_GET['loginExcluir'] : '';
	$senhaExcluir = isset($_GET['senhaExcluir']) ? $_GET['senhaExcluir'] : '';
?>
<form method="POST" action="action.php">
	<input type="hidden" name="idExc" value="<?php echo $idExcluir?>">
	Nome:<input type="text" name="nomeExc" value="<?php echo $nomeExcluir?>" disabled="true"><br><br>
	Login:<input type="text" name="loginExc" value="<?php echo $loginExcluir?>" disabled="true"><br><br>
	Senha:<input type="text" name="senhaExc" value="<?php echo $senhaExcluir?>" disabled="true"><br><br>
	<input type="submit" value="Excluir" name="botao">
</form>

