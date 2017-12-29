<?php

	class ProdutoDAO{
		public function addProduto(Produto $p){
			$c = new Conexao();
			$c->query('INSERT INTO produto VALUES(default, :nome, :descri, :preco, :imagem, :status)', array(':nome'=>$p->getNome_p(), ':descri'=>$p->getDesc_p(), ':preco'=>$p->getPreco_p(), ':imagem'=>$p->getImagem_p(), ':status'=>$p->getStatus_p()));
		}

		public function editProduto(Produto $p){
			$c = new Conexao();
			$c->query('UPDATE produto set nome_p = :nome, desc_p = :descri, preco_p = :preco, imagem_p = :imagem, status_p = :status where id_p = :id', array(':nome'=>$p->getNome_p(), ':descri'=>$p->getDesc_p(), ':preco'=>$p->getPreco_p(), ':imagem'=>$p->getImagem_p(), ':id'=>$p->getId_p(), ':status'=>$p->getStatus_p()));
		}

		public function editStatusProduto(Produto $p){
			$c = new Conexao();
			$c->query('UPDATE produto set status_p = :status where id_p = :id', array(':id'=>$p->getId_p(), ':status'=>$p->getStatus_p()));
		}

		public function selectProdIndex($init, $final){
			$c = new Conexao();
			$rs = $c->select("SELECT * FROM produto WHERE status_p = 1 LIMIT $init, $final");
			return $rs;
		}

		public function selectProd(Produto $p, $termo){
			$c = new Conexao();
			if($termo == 0){
				$rs = $c->select('SELECT * FROM produto');
				return $rs;
			}else if($termo == 1){
				$rs = $c->select('SELECT * FROM produto where id_p = :id', array(':id'=>$p->getId_p()));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM produto where nome_p like :nome', array(':nome'=>'%'.$p->getNome_p().'%'));
				return $rs;
			}
		}
	}

?>