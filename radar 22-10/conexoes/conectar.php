<?php 
header("content-type: text/html;charset=utf-8");
error_reporting(0);
  $nomeBanco = "radardos_imoveis";
  $conexao = @mysql_connect("localhost","radardosimoveisc","Alterar1234");
  mysql_select_db($nomeBanco, $conexao);
@mysql_query("SET NAMES 'utf8'");
 @mysql_query('SET character_set_connection=utf8');
 @mysql_query('SET character_set_client=utf8');
 @mysql_query('SET character_set_results=utf8');
  ini_set('default_charset','UTF-8');
   
 ?>
<?php
/*

	@$db = mysql_connect("mysql.radardosimoveis.com.br","radardosimovei","Radar2015");
	@mysql_select_db("radardosimovei", $db);
	
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

echo "<script>
history.pushState({},'','http://www.radardosimoveis.com.br');
</script>";*/
?>