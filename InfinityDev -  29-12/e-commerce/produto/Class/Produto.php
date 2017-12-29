<?php

	class Produto{
		private $id_p;
		private $nome_p;
		private $desc_p;
		private $preco_p;
		private $imagem_p;
		private $status_p;

		public function setId_p($id){
			$this->id_p = $id;
		}
		public function getId_p(){
			return $this->id_p;
		}

		public function setNome_p($nome){
			$this->nome_p = $nome;
		}
		public function getNome_p(){
			return $this->nome_p;
		}

		public function setDesc_p($desc){
			$this->desc_p = $desc;
		}
		public function getDesc_p(){
			return $this->desc_p;
		}

		public function setPreco_p($preco){
			$this->preco_p = $preco;
		}
		public function getPreco_p(){
			return $this->preco_p;
		}

		public function setImagem_p($imagem){
			$this->imagem_p = $imagem;
		}
		public function getImagem_p(){
			return $this->imagem_p;
		}

		public function setStatus_p($status){
			$this->status_p = $status;
		}
		public function getStatus_p(){
			return $this->status_p;
		}
	}

?>