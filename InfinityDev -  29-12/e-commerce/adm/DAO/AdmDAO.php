<?php 
	class AdmDAO{

		public function addAdm(Adm $a){
			$c = new Conexao();
			$c->query('INSERT INTO adm(id_a, nome_a, login_a, email_a, senha_a) VALUES(default, :nome, :login, :email, :senha)', array(':nome'=>$a->getNome_a(), ':login'=>$a->getLogin_a(), ':email'=>$a->getEmail_a(), ':senha'=>$a->getSenha_a()));
		}
		public function editAdm(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET nome_a = :nome, login_a = :login, email_a = :email, senha_a = :senha where id_a = :id', array(':id'=>$a->getId_a(), ':nome'=>$a->getNome_a(), ':login'=>$a->getLogin_a(), ':email'=>$a->getEmail_a(), ':senha'=>$a->getSenha_a()));
		}
		public function editAdmSS(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET nome_a = :nome, login_a = :login, email_a = :email where id_a = :id', array(':id'=>$a->getId_a(), ':nome'=>$a->getNome_a(), ':login'=>$a->getLogin_a(), ':email'=>$a->getEmail_a()));
		}
		public function excAdm(Adm $a){
			$c = new Conexao();
			$c->query('DELETE FROM adm WHERE id_a = :id', array(':id'=>$a->getId_a()));
		}
		public function selectAdmAll(){
  			$c = new Conexao();
			return $c->select('SELECT * FROM adm');
		}

		public function editNomeAdm(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET nome_a = :nome where id_a = :id', array(':id'=>$a->getId_a(), ':nome'=>$a->getNome_a()));
		}

		public function editEmailAdm(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET email_a = :email where id_a = :id', array(':id'=>$a->getId_a(), ':email'=>$a->getEmail_a()));
		}

		public function editLoginAdm(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET login_a = :login where id_a = :id', array(':id'=>$a->getId_a(), ':login'=>$a->getLogin_a()));
		}

		public function editSenhaAdm(Adm $a){
			$c = new Conexao();
			$c->query('UPDATE adm SET senha_a = :senha where id_a = :id', array(':id'=>$a->getId_a(), ':senha'=>$a->getSenha_a()));
		}

		public function logar(Adm $a){
			$c = new Conexao();
			return $c->select('SELECT * FROM adm where email_a = :email', array(':email'=>$a->getEmail_a()));
		}
		public function selectEmail(Adm $a){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM adm WHERE email_a = :email', array(':email'=>$a->getEmail_a()));
			return $rs;
		}
		public function selectLogin(Adm $a){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM adm WHERE login_a = :login', array(':login'=>$a->getLogin_a()));
			return $rs;
		}
		public function selectAdm(Adm $a, $termo){
			$c = new Conexao();
			if($termo == 1){
				$rs = $c->select('SELECT * FROM adm WHERE id_a = :id', array(':id'=>$a->getId_a()));
				return $rs;
			}else if($termo == 3){
				$rs = $c->select('SELECT * FROM adm WHERE email_a like :email', array(':email'=>"%".$a->getEmail_a()."%"));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM adm WHERE nome_a like :nome', array(':nome'=>"%".$a->getNome_a()."%"));
				return $rs;
			}else if($termo == 4){
				$rs = $c->select('SELECT * FROM adm WHERE login_a = :login', array(':login'=>$a->getLogin_a()));
				return $rs;
			}
		}
	}
?>