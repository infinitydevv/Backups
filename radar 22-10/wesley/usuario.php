<?php 
	class Usuario{
		//Váriaveis
		private $nomeUser;
		private $idUser;
		private $loginUser;
		private $senhaUser;
		//Fim Váriaveis
		
		//Setters e Getters
		public function setNomeUser($nome){
			$this->nomeUser = $nome;
		}
		public function setIdUser($id){
			$this->idUser = $id;
		}
		public function setLoginUser($login){
			$this->loginUser = $login;
		}
		public function setSenhaUser($senha){
			$this->senhaUser = $senha;
		}
		//Fim Setters e Getters

		//DAO
		public function pesquisarUser(){

			try {
				$conexao = Connection::getConnection();

				$sql = "SELECT * FROM tbusuario";
				$stm = $conexao->prepare($sql);
				$stm->execute();
				$rs = $stm->fetchALL(PDO::FETCH_OBJ);

				return $rs;
			} catch (PDOException $e) {
				echo "Erro ao pesquisar usuário: ".$e->getMessage()."<br>";

				return null;
			}
			
		}
		public function addUser(){
			try {

				$conexao = Connection::getConnection();

				$sql = "INSERT INTO tbusuario values (default, :nomeuser, :loginuser, :senhauser)";
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':nomeuser', $this->nomeUser);
				$stm->bindValue(':loginuser', $this->loginUser);
				$stm->bindValue(':senhauser', $this->senhaUser);
				$stm->execute();

				$stm->fetchAll(PDO::FETCH_OBJ);
				echo "Usuario adicionado com sucesso, você será redirecionado!";

			} catch (PDOException $e) {
				echo "Erro em adicionar o usuario: ".$e->getMessage();
			}
		}
		public function deleteUser(){
			try {
				$conexao = Connection::getConnection();

				$sql = "DELETE from tbusuario where iduser = :iduser";
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':iduser', $this->idUser);
				$stm->execute();

				$stm->fetchAll(PDO::FETCH_OBJ);
				echo "Usuario deletado com sucesso, você será redirecionado!";
			} catch (PDOException $e) {
				echo "Erro em Deletar o usuario: ".$e->getMessage();
			}
		}
		public function editUser(){
			try {
				$conexao = Connection::getConnection();

				$sql = "UPDATE tbusuario set nomeuser = :nomeuser, loginuser = :loginuser, senhauser = :senhauser where iduser = :iduser";
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':nomeuser', $this->nomeUser);
				$stm->bindValue(':loginuser', $this->loginUser);
				$stm->bindValue(':senhauser', $this->senhaUser);
				$stm->bindValue(':iduser', $this->idUser);

				$stm->execute();
				echo "Usuario alterado com sucesso, você será redirecionado!";

			} catch (PDOException $e) {
				echo "Erro ao alterar o usuário: ".$e->getMessage();
			}
		}
		//Fim DAO
	}
?>