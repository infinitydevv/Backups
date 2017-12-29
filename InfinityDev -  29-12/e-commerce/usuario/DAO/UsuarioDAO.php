<?php 
	class UsuarioDAO{

		public function addUser(Usuario $u){
			$c = new Conexao();
			$c->query('INSERT INTO usuario (id_u, nome_u, email_u, senha_u, cpf_u, estado_u, cidade_u, cep_u, numero_u, endereco_u) VALUES(default, :nome, :email, :senha, :cpf, :estado, :cidade, :cep, :numero, :endereco)', array(':nome'=>$u->getNome_u(), ':email'=>$u->getEmail_u(), ':senha'=>$u->getSenha_u(), ':cpf'=>$u->getCpf_u(), ':estado'=>$u->getEstado_u(), ':cidade'=>$u->getCidade_u(), ':cep'=>$u->getCep_u(), ':numero'=>$u->getNumero_u(), ':endereco'=>$u->getEndereco_u()));
		}
		public function editUser(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET nome_u = :nome, email_u = :email, senha_u = :senha, cpf_u = :cpf, estado_u = :estado, cidade_u = :cidade, cep_u = :cep, numero_u = :numero, endereco_u = :endereco where id_u = :id', array(':id'=>$u->getId_u(), ':nome'=>$u->getNome_u(), ':email'=>$u->getEmail_u(), ':senha'=>$u->getSenha_u(), ':cpf'=>$u->getCpf_u(), ':estado'=>$u->getEstado_u(), ':cidade'=>$u->getCidade_u(), ':cep'=>$u->getCep_u(), ':numero'=>$u->getNumero_u(), ':endereco'=>$u->getEndereco_u()));
		}
		public function logar(Usuario $u){
			$c = new Conexao();
			return $c->select('SELECT * FROM usuario where email_u = :email', array(':email'=>$u->getEmail_u()));
		}
		public function editUserSS(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET nome_u = :nome, email_u = :email, cpf_u = :cpf, estado_u = :estado, cidade_u = :cidade, cep_u = :cep, numero_u = :numero, endereco_u = :endereco where id_u = :id', array(':id'=>$u->getId_u(), ':nome'=>$u->getNome_u(), ':email'=>$u->getEmail_u(), ':cpf'=>$u->getCpf_u(), ':estado'=>$u->getEstado_u(), ':cidade'=>$u->getCidade_u(), ':cep'=>$u->getCep_u(), ':numero'=>$u->getNumero_u(), ':endereco'=>$u->getEndereco_u()));
		}
		public function excUser(Usuario $u){
			$c = new Conexao();
			$c->query('DELETE FROM usuario WHERE id_u = :id', array(':id'=>$u->getId_u()));
		}

		public function editNomeUsuario(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET nome_u = :nome where id_u = :id', array(':id'=>$u->getId_u(), ':nome'=>$u->getNome_u()));
		}

		public function editEmailUsuario(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET email_u = :email where id_u = :id', array(':id'=>$u->getId_u(), ':email'=>$u->getEmail_u()));
		}

		public function editSenhaUsuario(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET senha_u = :senha where id_u = :id', array(':id'=>$u->getId_u(), ':senha'=>$u->getSenha_u()));
		}

		public function editCpfUsuario(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET cpf_u = :cpf where id_u = :id', array(':id'=>$u->getId_u(), ':cpf'=>$u->getCpf_u()));
		}
		public function editEnderecoUsuario(Usuario $u){
			$c = new Conexao();
			$c->query('UPDATE usuario SET cep_u = :cep, estado_u = :estado, numero_u = :numero, endereco_u = :endereco, cidade_u = :cidade WHERE id_u = :id', array(':id'=>$u->getId_u(), ':cep'=>$u->getCep_u(), ':numero'=>$u->getNumero_u(), ':cidade'=>$u->getCidade_u(), ':estado'=>$u->getEstado_u(), ':endereco'=>$u->getEndereco_u()));
		}
		public function selectUserAll(){
  			$c = new Conexao();
			return $c->select('SELECT * FROM usuario');
		}

		public function selectEmail(Usuario $u){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM usuario WHERE email_u = :email', array(':email'=>$u->getEmail_u()));
			return $rs;
		}
		public function selectCpf(Usuario $u){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM usuario WHERE cpf_u = :cpf', array(':cpf'=>$u->getCpf_u()));
			return $rs;
		}
		public function selectUser(Usuario $u, $termo){
			$c = new Conexao();
			if($termo == 1){
				$rs = $c->select('SELECT * FROM usuario WHERE id_u = :id', array(':id'=>$u->getId_u()));
				return $rs;
			}else if($termo == 3){
				$rs = $c->select('SELECT * FROM usuario WHERE email_u like :email', array(':email'=>"%".$u->getEmail_u()."%"));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM usuario WHERE nome_u like :nome', array(':nome'=>"%".$u->getNome_u()."%"));
				return $rs;
			}else if($termo == 4){
				$rs = $c->select('SELECT * FROM usuario WHERE cpf_u = :cpf', array(':cpf'=>$u->getCpf_u()));
				return $rs;
			}
		}
	}
?>