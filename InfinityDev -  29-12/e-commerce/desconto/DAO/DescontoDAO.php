<?php 
	
	class DescontoDAO{

		public function addDesconto(Desconto $d){
			$c = new Conexao();
			$c->query('INSERT INTO desconto VALUES(default, :cod_des, :status_des, :valor_des)', array(':cod_des'=>$d->getCod_des(), ':status_des'=> $d->getStatus_des(), ':valor_des'=>$d->getValor_des()));
		}

		public function editDesconto(Desconto $d){
			$c = new Conexao();
			$c->query('UPDATE desconto SET cod_des = :cod_des, status_des = :status_des, valor_des = :valor_des WHERE id_des = :id_des', array(':cod_des'=>$d->getCod_des(), ':status_des'=> $d->getStatus_des(), ':valor_des'=>$d->getValor_des(), 'id_des'=>$d->getId_des()));
		}

		public function excIDesconto(Desconto $d){
			$c = new Conexao();
			$c->query('DELETE FROM desconto WHERE id_des = :id_des', array(':id_des'=>$d->getId_des()));
		}

		public function selectCupom(Desconto $d){
			$c = new Conexao();
			$rs = $c->select('SELECT * FROM desconto where  cod_des = :cod and status_des = 1', array(':cod'=>$d->getCod_des()));
			return $rs;
		}

		public function selectDesconto(Desconto $d, $termo){
			$c = new Conexao();
			if($termo == 1){
				$rs = $c->select('SELECT * FROM desconto where id_des = :id', array(':id'=>$d->getId_des()));
				return $rs;
			}else if($termo == 2){
				$rs = $c->select('SELECT * FROM desconto where cod_des like :cod', array(':cod'=>$d->getCod_des()));
				return $rs;
			}else if($termo == 3){
				$rs = $c->select('SELECT * FROM desconto where status_des = :status', array(':status'=>$d->getStatus_des()));
				return $rs;
			}else if($termo == 0){
				$rs = $c->select('SELECT * FROM desconto where 1 order by status_des DESC');
				return $rs;
			}
		}

	}

?>