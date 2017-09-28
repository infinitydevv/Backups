<?php
	@$db = mysql_connect("localhost","root","");
	@mysql_select_db("radari", $db);
	
	function conectarComPdo(){
		define('HOST','localhost');
		define('USER', 'root');
		define('PASS','');
		define('BD', 'radari');
		$dsn="mysql:host=".HOST.";dbname=".BD;
		try{
		  $conectar = new PDO($dsn,USER,PASS);
          $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conectar;		  
		}catch(PDOException $e){
			echo "Erro ao conectar ao banco ".$e->getMessage();
		}
	}
?>