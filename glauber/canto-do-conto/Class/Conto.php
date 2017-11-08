<?php
	Class Conto{
		private $id_c;
		private $titulo_c;
		private $paragrafo_c;
		private $foto_c;
		private $id_u;

		public function setId_c($id){
			$this->id_c = $id;
		}
		public function getId_c(){
			return $this->id_c;
		}

		public function setTitulo_c($titulo){
			$this->titulo_c = $titulo;
		}
		public function getTitulo_c(){
			return $this->titulo_c;
		}

		public function setParagrafo_c($paragrafo){
			$this->paragrafo_c = $paragrafo;
		}
		public function getParagrafo_c(){
			return $this->paragrafo_c;
		}

		public function setId_u($id){
			$this->id_u = $id;
		}
		public function getId_u(){
			return $this->id_u;
		}

		public function setFoto_c($foto){
			$this->foto_c = $foto;
		}
		public function getFoto_c(){
			return $this->foto_c;
		}


		public function inserirConto(){
			$pdo = new Conexao();
			return $pdo->query("INSERT INTO tbconto(titulo_c, paragrafo_c, foto_c, id_u)  VALUES(:titulo, :paragrafo, :foto, :idu)", array(":titulo"=>$this->getTitulo_c(), ":paragrafo"=>$this->getParagrafo_c(), ":foto"=>$this->getFoto_c(), ":idu"=>$this->getId_u()));
		}

		public function updateConto(){
			$pdo = new Conexao();
			$pdo->query("UPDATE tbconto SET titulo_c = :titulo, paragrafo_c = :paragrafo, foto_c = :foto, id_u = :idu where id_c = :idc", array(":titulo"=>$this->getTitulo_c(), ":paragrafo"=>$this->getParagrafo_c(), ":foto"=>$this->getFoto_c(), ":idu"=>$this->getId_u(), ":idc"=>$this->getId_c()));
			return $this->getId_c();
		}

		public function deleteConto(){
			$pdo = new Conexao();
			return $pdo->query("DELETE FROM tbconto where id_c = :idc", array(":idc"=>$this->getId_c()));
		}

		public function listarContos(){
			$pdo = new Conexao();
			return $pdo->select("SELECT * from tbconto c inner join tbusuario u on c.id_u = u.id_u order by c.id_c");
		}

		public function listarContosId(){
			$pdo = new Conexao();
			return $pdo->select("SELECT * FROM tbconto c inner join tbusuario u  on c.id_u = u.id_u where c.id_c = :id order by c.id_c", array(":id"=>$this->getId_c()));
		}

		public function listarContosTitulo(){
			$pdo = new Conexao();
			return $pdo->select("SELECT * FROM tbconto c inner join tbusuario u on c.id_u = u.id_u where c.titulo_c like :titulo order by c.id_c", array(":titulo"=>"%".$this->getTitulo_c()."%"));
		}

		public function listarContosParagrafo(){
			$pdo = new Conexao();
			return $pdo->select("SELECT * FROM tbconto c inner join tbusuario u on c.id_u = u.id_u where c.paragrafo_c like :paragrafo order by c.id_c", array(":paragrafo"=>"%".$this->getParagrafo_c()."%"));
		}

		public function listarContosUsuario(){
			$pdo = new Conexao();
			return $pdo->select("SELECT * FROM tbconto c inner join tbusuario u on c.id_u = u.id_u where c.id_u = :id_u order by c.id_c", array(":id_u"=>$this->getId_u()));
		}

		public function listarIndex($termo, $valor){
			if($termo == 0){
				return $this->listarContos();
			}else if($termo == 1){
				$this->setId_c($valor);
				return $this->listarContosId();
			}else if($termo == 2){
				$this->setTitulo_c($valor);
				return $this->listarContosTitulo();
			}else if($termo == 3){
				$this->setParagrafo_c($valor);
				return $this->listarContosParagrafo();
			}else if($termo == 4){
				$this->setId_u($valor);
				return $this->listarContosUsuario();
			}
		}
	} 
?>