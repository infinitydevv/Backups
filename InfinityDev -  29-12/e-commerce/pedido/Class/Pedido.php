<?php

	class Pedido{
		private $id_pe;
		private $pag_pe;
		private $id_u;
		private $total_pe;
		private $status_pe;
		private $data_pe;
		private $nome_u;
		private $cpf_u;

		public function setId_pe($id){
			$this->id_pe = $id;
		}
		public function setPag_pe($pag){
			$this->pag_pe = $pag;
		}
		public function setId_u($id){
			$this->id_u = $id;
		}
		public function setNome_u($nome){
			$this->nome_u = $nome;
		}
		public function setCpf_u($cpf){
			$this->cpf_u = $cpf;
		}
		public function setTotal_pe($total){
			$this->total_pe = $total;
		}
		public function setStatus_pe($status){
			$this->status_pe = $status;
		}
		public function setData_pe($status){
			$this->data_pe = $data;
		}


		public function getData_pe(){
			return $this->data_pe;
		}
		public function getId_pe(){
			return $this->id_pe;
		}
		public function getId_u(){
			return $this->id_u;
		}
		public function getPag_pe(){
			return $this->pag_pe;
		}
		public function getNome_u(){
			return $this->nome_u;
		}
		public function getCpf_u(){
			return $this->cpf_u;
		}
		public function getTotal_pe(){
			return $this->total_pe;
		}
		public function getStatus_pe(){
			return $this->status_pe;
		}
	}

?>