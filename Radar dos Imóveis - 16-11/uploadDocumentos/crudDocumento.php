<?php 
/* 
* @Autor: Bruno França
* @Descrição: Crud da tabela documento
*/
	class crudDocumento{

		public function inserir($id, $descricao, $url, $idusu){
			// require_once 'Sql.php';
			// $sql = new Sql;
			require_once '../conexoes/conexao.php';
			$sql = new Conexao;

			$insere = $sql->query("INSERT INTO documento VALUES(:ID, :DESCRICAO, :URL, :IDUSU)", array(
				":ID"=>$id,
				":DESCRICAO"=>$descricao,
				":URL"=>$url,
				":IDUSU"=>$idusu
			));
			return $insere;
		}

		public function selecionar($where = null){
			// require_once 'Sql.php';
			// $sql = new Sql;
			require_once '../conexoes/conexao.php';
			$sql = new Conexao;


			if($where == null){
				$seleciona = $sql->select("SELECT * FROM documento INNER JOIN usuario ON documento.idusu = usuario.idusu ORDER BY iddoc asc");
			} else {
				$seleciona = $sql->select("SELECT * FROM documento INNER JOIN usuario ON documento.idusu = usuario.idusu WHERE $where");
			}
			return $seleciona;
		}

		public function atualizar($descricao, $url, $idusu, $where){
			require_once '../conexoes/conexao.php';
			try{
				$sql = new Conexao;
				$conn = Conexao::getInstance();
				$atualiza = $sql->query("UPDATE documento SET descricaodoc = :DESCR, urldoc = :URLDOC, idusu= :IDUSU WHERE $where", array(
					":DESCR"=>$descricao,
					":URLDOC"=>$url,
					":IDUSU"=>$idusu
				));
				return $atualiza;
			} catch(PDOEXCEPTION $e){
				echo $e->getMessage();	
			}

			
		}

		public function deletar($where){
			// require_once 'Sql.php';
			// $sql = new Sql;
			require_once '../conexoes/conexao.php';
			$sql = new Conexao;
			$deleta = $sql->query("DELETE FROM documento WHERE $where");
			return $deleta;
		}

	}
?>