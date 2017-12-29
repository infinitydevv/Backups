<?php

	class Desconto{
		private $id_des;
		private $cod_des;
		private $status_des;
		private $valor_des;


		public function setId_des($id){
			$this->id_des = $id;
		}
		public function getId_des(){
			return $this->id_des;	
		}

		public function setCod_des($cod){
			$this->cod_des = $cod;
		}
		public function getCod_des(){
			return $this->cod_des;	
		}

		public function setStatus_des($status){
			$this->status_des = $status;
		}
		public function getStatus_des(){
			return $this->status_des;	
		}

		public function setValor_des($valor){
			$this->valor_des = $valor;
		}
		public function getValor_des(){
			return $this->valor_des;	
		}
	}

?>