<?php 

	class Adm{
		private $id_a;
		private $nome_a;
		private $login_a;
		private $email_a;
		private $senha_a;

		public function setId_a($id){
			$this->id_a = $id;
		}
		public function getId_a(){
			return $this->id_a;
		}
		public function setNome_a($nome){
			$this->nome_a = $nome;
		}
		public function getNome_a(){
			return $this->nome_a;
		}
		public function setLogin_a($login){
			$this->login_a = $login;
		}
		public function getLogin_a(){
			return $this->login_a;
		}
		public function setEmail_a($email){
			$this->email_a = $email;
		}
		public function getEmail_a(){
			return $this->email_a;
		}
		public function setSenha_a($senha){
			$this->senha_a = $senha;
		}
		public function getSenha_a(){
			return $this->senha_a;
		}
	}

?>