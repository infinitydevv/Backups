<?php 

	class Mensagem{

		private $idcliven;
		private $idusu;
		private $idimo;
		private $idmens;
		private $assuntomens;
		private $descricaomens;
		private $datamens;
		private $horamens;


		public function setIdcliven($id){
			$this->idcliven = $id;
		}
		public function getIdcliven(){
			return $this->idcliven;
		}

		public function setIdusu($id){
			$this->idusu = $id;
		}
		public function getIdusu(){
			return $this->idusu;
		}

		public function setIdimo($id){
			$this->idimo = $id;
		}
		public function getIdimo(){
			return $this->idimo;
		}

		public function setIdmens($id){
			$this->idmens = $id;
		}
		public function getIdmens(){
			return $this->idmens;
		}

		public function setAssuntomens($id){
			$this->assuntomens = $id;
		}
		public function getAssuntomens(){
			return $this->assuntomens;
		}

		public function setDescricaomens($id){
			$this->descricaomens = $id;
		}
		public function getDescricaomens(){
			return $this->descricaomens;
		}

		public function setDatamens($id){
			$this->datamens = $id;
		}
		public function getDatamens(){
			return $this->datamens;
		}

		public function setHoramens($id){
			$this->horamens = $id;
		}
		public function getHoramens(){
			return $this->horamens;
		}


		public function inserirMens(){
			$conn = new conexao();
			$conn->query("INSERT INTO mensagem(idcliven, idusu, idimo, assuntomens, descricaomens, datamens, horamens) values(:idcliven, :idusu, :idimo, :assuntomens, :descricaomens, :datamens, :horamens)", array(":idcliven"=>$this->getIdcliven(), ":idusu"=>$this->getIdusu(), ":idimo"=>$this->getIdimo(), ":assuntomens"=>$this->getAssuntomens(), ":descricaomens"=>$this->getDescricaomens(), ":datamens"=>$this->getDatamens(), ":horamens"=>$this->getHoramens()));
		}

		public function editarMens(){
			$conn = new conexao();
			$conn->query("UPDATE mensagem SET assuntomens = :assuntomens, descricaomens = :descricaomens, datamens = :datamens, horamens = :horamens where idmens = :idmens", array(":assuntomens"=>$this->getAssuntomens(), ":descricaomens"=>$this->getDescricaomens(), ":datamens"=>$this->getDatamens(), ":horamens"=>$this->getHoramens(), ":idmens"=>$this->getIdmens()));
		}

		public function deletarMens(){
			$conn = new conexao();
			$conn->query("DELETE FROM mensagem where idmens = :idmens", array(":idmens"=>$this->getIdmens()));
		}

		public function pesquisarImoveis(){
			$conn = new conexao();
			$results = $conn->select("SELECT * FROM clientevendedor cv inner join imovel i on cv.idcliven = i.idcliven inner join cidade e on e.idcity = i.cidade where cv.idcliven = :id;", array(":id"=>$this->getIdcliven()));

			return $results;
		}
		public function pesquisarMensagem(){//Por Id do imóvel
			$conn = new conexao();
			$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven where m.idimo = :idimo order by m.idmens DESC", array(":idimo"=>$this->getIdimo()));
			
			return $results;
		}
		public function pesquisarMensagemM(){//Por Id da mensagem
			$conn = new conexao();
			$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven where m.idmens = :idmens order by m.idmens DESC", array(":idmens"=>$this->getIdmens()));
			
			return $results;
		}
		public function pesquisarMensagemAll($termo, $termo1){//Todas 
			$conn = new conexao();
			if($termo1 == 2){
				$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven where m.idimo = :idimo order by m.idmens", array(":idimo"=>$termo));
			}else if($termo1 == 3){
				$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven where m.assuntomens = :assunto order by m.idmens", array(":assunto"=>$termo));
			}else if($termo1 == 4){
				$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven where c.nomecliven like :nome order by m.idmens", array(":nome"=>"%".$termo."%"));
			}else if($termo1 == 1 || empty($termo1)){
				$results = $conn->select("SELECT * FROM mensagem m inner join imovel i on m.idimo = i.idimo inner join usuario u on u.idusu = m.idusu inner join clientevendedor c on c.idcliven = m.idcliven  order by m.idmens");
			}
			
			return $results;
		}

	}


?>