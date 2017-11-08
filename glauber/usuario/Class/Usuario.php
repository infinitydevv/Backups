<?php 
	 class Usuario{

	 	private $id_u;
	 	private $nome_u;
	 	private $email_u;
	 	private $login_u;
	 	private $senha_u;


	 	public function setId_u($id_u){
	 		$this->id_u = $id_u;
	 	}
	 	public function getId_u(){
	 		return $this->id_u;
	 	}
	 	public function setNome_u($nome_u){
	 		$this->nome_u = $nome_u;
	 	}
	 	public function getNome_u(){
	 		return $this->nome_u;
	 	}
	 	public function setEmail_u($email_u){
	 		$this->email_u = $email_u;
	 	}
	 	public function getEmail_u(){
	 		return $this->email_u;
	 	}
	 	public function setLogin_u($login_u){
	 		$this->login_u = $login_u;
	 	}
	 	public function getLogin_u(){
	 		return $this->login_u;
	 	}
	 	public function setSenha_u($senha_u){
	 		$this->senha_u = $senha_u;
	 	}
	 	public function getSenha_u(){
	 		return $this->senha_u;
	 	}


	 	public function addUsuario(){//INSERT de usuário
	 		$pdo = new Conexao();
	 		return $pdo->query("INSERT INTO tbusuario(nome_u, email_u, login_u, senha_u) VALUES(:nome, :email, :login, :senha)", array(":nome"=>$this->getNome_u(), ":email"=>$this->getEmail_u(), ":senha"=>$this->getSenha_u(), ":login"=>$this->getLogin_u()));
	 	}

	 	public function updateUsuario(){//UPDATE de usuário
	 		$pdo = new Conexao();
	 	 $pdo->query("UPDATE tbusuario SET nome_u = :nome, email_u = :email, login_u = :login, senha_u = :senha where id_u = :id", array(":nome"=>$this->getNome_u(), ":email"=>$this->getEmail_u(), ":login"=>$this->getLogin_u(), ":senha"=>$this->getSenha_u(), ":id"=>$this->getId_u()));
	 	 return $this->getId_u();
	 	}


	 	public function listarUsuarioLoginL(){//SELECT dos usuários por Login
	 		$pdo = new Conexao();
	 		return $pdo->select("SELECT * FROM tbusuario where login_u = :login", array(":login"=>$this->getLogin_u()));
	 	}
	 	public function login(){
	 		$pdo = new Conexao();
	 	    return $pdo->select("SELECT * FROM tbusuario where login_u = :login and senha_u = :senha", array(":login"=>$this->getLogin_u(), ":senha"=>$this->getSenha_u()));
	 	}

	 	public function deleteUsuario(){
	 		$pdo = new Conexao();
	 		return $pdo->query("DELETE FROM tbusuario WHERE id_u = :id", array(":id"=>$this->getId_u()));
	 	}

	 	public function listarUsuario(){//SELECT de todos os usuários
	 		$pdo = new Conexao();
	 		return $pdo->select("SELECT * FROM tbusuario order by id_u");
	 	}

	 	public function listarUsuarioId(){//SELECT dos usuários por ID
	 		$pdo = new Conexao();
	 	    return $pdo->select("SELECT * FROM tbusuario where id_u = :id", array(":id"=>$this->getId_u()));
	 	}

		public function listarUsuarioNome(){//SELECT dos usuários por Nome
	 		$pdo = new Conexao();
	 		return $pdo->select("SELECT * FROM tbusuario where nome_u like :nome", array(":nome"=>"%".$this->getNome_u()."%"));
	 	}

	 	public function listarUsuarioLogin(){//SELECT dos usuários por Login
	 		$pdo = new Conexao();
	 		return $pdo->select("SELECT * FROM tbusuario where login_u like :login", array(":login"=>"%".$this->getLogin_u()."%"));
	 	}

	 	public function listarUsuarioEmail(){//SELECT dos usuários por Email
	 		$pdo = new Conexao();
	 		return $pdo->select("SELECT * FROM tbusuario where email_u like :email", array(":email"=>"%".$this->getEmail_u()."%"));
	 	}

	 	public function listarIndex($termo, $valor){
	 		if($termo  == 1){
	 			$this->setId_u($valor);
	 			return $this->listarUsuarioId();
	 		}else if($termo == 2){
	 			$this->setNome_u($valor);
	 			return $this->listarUsuarioNome();
	 		}else if($termo == 3){
	 			$this->setEmail_u($valor);
	 			return $this->listarUsuarioEmail();
	 		}else if($termo == 4){
	 			$this->setLogin_u($valor);
	 			return $this->listarUsuarioLogin();
	 		}else if($termo == 0){
	 			return $this->listarUsuario();
	 		}
	 	}


	 }
?>