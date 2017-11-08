<?php  
/*
Descrição: Classe de conexão em PDO com métodos para acessar a query.
Autor: Wesley Schneider Aires
Data: 25/10/2017
*/
	class Conexao{
		static $pdo;
		public static function getConnection(){
			try {
				self::$pdo = new PDO('mysql:host=localhost;dbname=profglau_ber', 'profglauber', 'Alterar1234');
				return self::$pdo;
			} catch (PDOException $e) {
				echo "Erro ao conectar: " . $e;
				return self::$pdo;
			}
		}
		public function query($query, $bind = array()){
	 		try {
	 			$pdo = self::getConnection();
		 		$stmt = $pdo->prepare($query);
		 		$this->setParams($stmt, $bind);
		 		$stmt->execute();
		 		return $stmt;
	 			
	 		} catch (PDOException $e) {
	 			echo "Erro na query:" . $e;
	 		}
	 	}
	 	private function setParams($stmt, $bind = array()){
	 		foreach ($bind as $key => $value) {
	 			$this->setParam($stmt, $key, $value);
	 		}
	 	}
	 	private function setParam($stmt, $key, $value){
	 		$stmt->bindValue($key, $value);
	 	}
	 	public function select($query, $bind = array()){
	 		$stmt = $this->query($query, $bind);
	 		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 	}
	}

?>