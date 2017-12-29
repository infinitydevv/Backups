<?php 

	class Usuario{
		private $id_u;
		private $nome_u;
		private $email_u;
		private $senha_u;
		private $cpf_u;

		private $estado_u;
		private $cidade_u;
		private $cep_u;
		private $numero_u;
		private $endereco_u;

		public function setId_u($id){
			$this->id_u = $id;
		}
		public function getId_u(){
			return $this->id_u;
		}
		public function setNome_u($nome){
			$this->nome_u = $nome;
		}
		public function getNome_u(){
			return $this->nome_u;
		}
		public function setEmail_u($email){
			$this->email_u = $email;
		}
		public function getEmail_u(){
			return $this->email_u;
		}
		public function setSenha_u($senha){
			$this->senha_u = $senha;
		}
		public function getSenha_u(){
			return $this->senha_u;
		}
		public function setCpf_u($cpf){
			$this->cpf_u = $cpf;
		}
		public function getCpf_u(){
			return $this->cpf_u;
		}

		
		public function setEstado_u($estado){
			$this->estado_u = $estado;
		}
		public function getEstado_u(){
			return $this->estado_u;
		}
		public function setCidade_u($cidade){
			$this->cidade_u = $cidade;
		}
		public function getCidade_u(){
			return $this->cidade_u;
		}
		public function setCep_u($cep){
			$this->cep_u = $cep;
		}
		public function getCep_u(){
			return $this->cep_u;
		}
		public function setNumero_u($numero){
			$this->numero_u = $numero;
		}
		public function getNumero_u(){
			return $this->numero_u;
		}
		public function setEndereco_u($endereco){
			$this->endereco_u = $endereco;
		}
		public function getEndereco_u(){
			return $this->endereco_u;
		}
	}

?>