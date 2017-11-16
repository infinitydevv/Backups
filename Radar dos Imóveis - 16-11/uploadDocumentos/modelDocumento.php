<?php 
/* 
*	@Autor: Bruno França
*	@Descrição: Define todos os dados do registro a ser enviado ao banco
*/
	class modelDocumento{
		private $id;
		private $descricaodoc;
		private $urldoc;
		private $idusu;

		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = strip_tags(addslashes($id));
		}
		public function getDescricao(){
			return $this->descricaodoc;
		}
		public function setDescricao($descricaodoc){
			$this->descricaodoc = strip_tags(addslashes($descricaodoc));
		}
		public function getUrl(){
			return $this->urldoc;
		}
		public function setUrl($urldoc){
			$this->urldoc = $urldoc;
		}
		public function getIdUsu(){
			return $this->idusu;
		}
		public function setIdUsu($idusu){
			$this->idusu = $idusu;
		}
	}
?>