<?php 
	
	class ItensPedidoDAO{

		public function addItens(ItensPedido $i){
			$c = new Conexao();
			$c->query('INSERT INTO itenspedido VALUES(default, :id_p, :id_pe, :quant_i)', array(':id_p'=>$i->getId_p(), ':id_pe'=> $i->getId_pe(), ':quant_i'=>$i->getQuant_i()));
		}

		public function editItens(ItensPedido $i){
			$c = new Conexao();
			$c->query('UPDATE itenspedido SET id_p = :id_p, id_pe = :id_pe, quant_i = :quant_i WHERE id_i = :id_i', array(':id_p'=>$i->getId_p(), ':id_pe'=> $i->getId_pe(), ':quant_i'=>$i->getQuant_i(), ':id_i'=>$i->getId_i()));
		}

		public function excItens(ItensPedido $i){
			$c = new Conexao();
			$c->query('DELETE FROM itenspedido WHERE id_i = :id_i', array(':id_i'=>$i->getId_i()));
		}

		public function selectItens(ItensPedido $i, $termo){
			$c = new Conexao();
			if($termo == 1){
				$rs = $c->select('SELECT * FROM itenspedido i inner join pedido pe on i.id_pe = pe.id_pe inner join produto p on i.id_p = p.id_p inner join usuario u on pe.id_u = u.id_u where i.id_i = :id', array(':id'=>$i->getId_i()));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM itenspedido i inner join pedido pe on i.id_pe = pe.id_pe inner join produto p on i.id_p = p.id_p inner join usuario u on pe.id_u = u.id_u where i.id_p = :id', array(':id'=>$i->getId_p()));
				return $rs;
			}else if($termo == 3){
				$rs = $c->select('SELECT * FROM itenspedido i inner join pedido pe on i.id_pe = pe.id_pe inner join produto p on i.id_p = p.id_p inner join usuario u on pe.id_u = u.id_u where i.id_pe = :id', array(':id'=>$i->getId_pe()));
				return $rs;
			}else if($termo == 0){
				$rs = $c->select('SELECT * FROM itenspedido i inner join pedido pe on i.id_pe = pe.id_pe inner join produto p on i.id_p = p.id_p inner join usuario u on pe.id_u = u.id_u');
				return $rs;
			}
		}

	}

?>