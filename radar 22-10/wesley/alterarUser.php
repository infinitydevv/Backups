<?php 
	require_once("conexao.php");
	require_once("usuario.php");

	$idAlterar = isset($_GET['idAlterar']) ? $_GET['idAlterar'] : '';
		try{
			$conexao = Connection::getConnection();

			$sql = "SELECT * from tbusuario where iduser = :iduser";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':iduser', $idAlterar);
			$stm->execute();

			$users = $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(PDOException $e){
			echo "Erro ao pesquisar usuario no alterar: ".$e;
		}
	foreach ($users as $user) {
		echo '<form method="POST" action="action.php">
			<input type="hidden" name="idAlt" value="'.$idAlterar.'">
			Nome:<input type="text" name="nomeAlt" value="'.$user->nomeuser.'"><br><br>
			Login:<input type="text" name="loginAlt" value="'.$user->loginuser.'"><br><br>
			Senha:<input type="text" name="senhaAlt" value="'.$user->senhauser.'"><br><br>
			<input type="submit" value="Editar" name="botao">
		</form>';
	}
?>


