<?php	

	class MigrandoDados
	{						   
		    public function __construct() {
            $this->conectarBanco();
			}

			protected function conectarBanco()
				{
				    $this->db = new PDO("mysql:host=localhost;dbname=migracao", "root", ""); 
				    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
			private function MigraTabelaProdutos()
				{
					
                    $consulta = $this->db->query("SELECT DISTINCT(codigo), titulo FROM dados_antigos;");

					while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

					$this->db->exec("INSERT INTO produtos (titulo, codigo) VALUES ('".$linha['titulo']."', '".$linha['codigo']."')");
                    }
				}
			private function MigraTabelaCores()
				{
                    $consulta = $this->db->query("SELECT DISTINCT(cor) FROM dados_antigos;");

					while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

					$this->db->exec("INSERT INTO cores (titulo) VALUES ('".$linha['cor']."')");
                   }
				}
			private function MigraTabelaTamanhos()
				{

                    $consulta = $this->db->query("SELECT DISTINCT(tamanho) FROM dados_antigos;");

					while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

					$this->db->exec("INSERT INTO tamanhos (titulo) VALUES ('".$linha['tamanho']."')");
                    }
				}	
			private function MigraTabelaProdutos_Cores()
				{

                    $consulta = $this->db->query("SELECT DISTINCT(titulo), cor FROM dados_antigos;");

					while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
						
						     $consultaIDCor = $this->db->query("SELECT id FROM cores WHERE titulo = '".$linha['cor']."';");

										while ($linhaCor = $consultaIDCor->fetch(PDO::FETCH_ASSOC)) {
										$idCor = $linhaCor['id'];
										}
										
						     $consultaIDProduto = $this->db->query("SELECT id FROM Produtos WHERE titulo = '".$linha['titulo']."';");

										while ($linhaProduto = $consultaIDProduto->fetch(PDO::FETCH_ASSOC)) {
										$idProduto = $linhaProduto['id'];
										}
					$this->db->exec("INSERT INTO produtos_cores (id_cor, id_produto) VALUES ('$idCor', '$idProduto')");
                    }
				}
			private function MigraTabelaProdutos_Tamanhos()
			{

                    $consulta = $this->db->query("SELECT DISTINCT(titulo), tamanho FROM dados_antigos;");

					while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
						
						     $consultaIDTamanho = $this->db->query("SELECT id FROM tamanhos WHERE titulo = '".$linha['tamanho']."';");

										while ($linhaTamanho = $consultaIDTamanho->fetch(PDO::FETCH_ASSOC)) {
										$idTamanho = $linhaTamanho['id'];
										}
										
						     $consultaIDProduto = $this->db->query("SELECT id FROM Produtos WHERE titulo = '".$linha['titulo']."';");

										while ($linhaProduto = $consultaIDProduto->fetch(PDO::FETCH_ASSOC)) {
										$idProduto = $linhaProduto['id'];
										}
					$this->db->exec("INSERT INTO produtos_tamanhos (id_produto_cor, id_tamanho) VALUES ('$idProduto', '$idTamanho')");
                    }
				}	

			public function ExecutaMigracao()	
			{
			
				$this->MigraTabelaProdutos();
				$this->MigraTabelaCores();
				$this->MigraTabelaTamanhos();
				$this->MigraTabelaProdutos_Cores();
				$this->MigraTabelaProdutos_Tamanhos();
			}	
		}
		
		$migraDados = new MigrandoDados;
        $migraDados->ExecutaMigracao();
		
?>