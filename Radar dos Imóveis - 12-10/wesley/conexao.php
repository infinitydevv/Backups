<?php
	class Connection{

		private function __construct() {

    	}

		public static function getConnection(){
			try {
				$con = new PDO("mysql:dbname=radardos_wesley;host=localhost", "radardosimoveisc", "Alterar1234");
				return $con;

			} catch (PDOException $e) {
				echo "Erro ao conectar, classe de conexao: ". $e->getMessage();
				return null;
			}
		}
	}
 ?>