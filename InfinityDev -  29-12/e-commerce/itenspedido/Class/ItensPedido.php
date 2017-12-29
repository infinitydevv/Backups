<?php

	class ItensPedido{
		private $id_i;
		private $id_p;
		private $id_pe;
		private $quant_i;

		public function setId_i($id){
			$this->id_i = $id;
		}
		public function getId_i(){
			return $this->id_i;	
		}

		public function setId_p($id){
			$this->id_p = $id;
		}
		public function getId_p(){
			return $this->id_p;	
		}

		public function setId_pe($id){
			$this->id_pe = $id;
		}
		public function getId_pe(){
			return $this->id_pe;	
		}

		public function setQuant_i($quant){
			$this->quant_i = $quant;
		}
		public function getQuant_i(){
			return $this->quant_i;	
		}
	}

?>