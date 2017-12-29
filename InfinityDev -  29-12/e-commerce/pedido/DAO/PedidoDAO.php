<?php 

	class PedidoDAO{
		public function addPedido(Pedido $p){
			$c = new Conexao();
			$c->query('INSERT INTO pedido VALUES(default, :pag_pe, NOW(), :status_pe, :total_pe, :id_u)', array(':id_u'=>$p->getId_u(), ':pag_pe'=> $p->getPag_pe(), ':status_pe'=> $p->getStatus_pe(), ':total_pe'=> $p->getTotal_pe()));
		}

		public function editPedido(Pedido $p){
			$c = new Conexao();
			$c->query('UPDATE pedido SET id_u = :id_u, pag_pe = :pag_pe, status_pe = :status_pe, total_pe = :total_pe WHERE id_pe = :id_pe', array(':id_u'=>$p->getId_u(), ':pag_pe'=> $p->getPag_pe(), ':status_pe'=> $p->getStatus_pe(), ':total_pe'=> $p->getTotal_pe(), ':id_pe'=>$p->getId_pe()));
		}

		public function excPedido(Pedido $p){
			$c = new Conexao();
			$c->query('DELETE FROM pedido WHERE id_pe = :id_pe', array(':id_pe'=>$p->getId_pe()));
		}

		public function selectPedidoId(Pedido $p){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where pe.id_pe = :id', array(':id'=>$p->getId_pe()));
			return $rs;
		}

		public function selectPedidoIdItens(Pedido $p){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM itenspedido i inner join produto p on i.id_p = p.id_p where i.id_pe = :id', array(':id'=>$p->getId_pe()));
			return $rs;
		}

		public function selectPedidoUser(Pedido $p){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where u.id_u = :id', array(':id'=>$p->getId_u()));
			return $rs;
		}

		public function selectPedido(Pedido $p, $termo){
			$c = new Conexao();
			if($termo == 1){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where pe.id_pe = :id', array(':id'=>$p->getId_pe()));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where pe.id_u = :id', array(':id'=>$p->getId_u()));
				return $rs;
			}else if($termo == 3){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where pe.pag_pe like :pag', array(':pag'=>'%'.$p->getPag_pe().'%'));
				return $rs;
			}else if($termo == 0){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u order by pe.id_pe DESC');
				return $rs;
			}else if($termo == 4){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where u.nome_u like :nome', array(':nome'=>"%".$p->getNome_u()."%"));
				return $rs;
			}else if($termo == 5){
				$rs = $c->select('SELECT * FROM pedido pe inner join usuario u on pe.id_u = u.id_u where u.cpf_u = :cpf', array(':cpf'=>$p->getCpf_u()));
				return $rs;
			}
		}
	}

?>