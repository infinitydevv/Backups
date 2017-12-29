<?php

	class Conexao{
		static $conn;
		public static function conectar(){
			try {
				self::$conn = new PDO('mysql:host=localhost;dbname=infinity_ecommerce', 'infinity', 'Alterar1234');
				return self::$conn;
			} catch (PDOException $e) {
				echo 'Erro ao conectar ao banco de dados: '.$e;
				return self::$conn;
			}
		}

		public function query($query, $bind = array()){
	 		try {
	 			$pdo = self::conectar();
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