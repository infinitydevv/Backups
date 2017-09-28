<?php
	
	 use Dompdf\Dompdf;
	 require_once '../bibliotecas/dompdf/autoload.inc.php';
	 include "conexao.php";
@session_start();
      if((!isset ($_SESSION['login_usuario']) == true) and (!isset ($_SESSION['senha_usuario']) == true)) {   
        unset($_SESSION['login_usuario']); 
        unset($_SESSION['senha_usuario']); 
        echo"<script type='text/javascript'> alert('Necessario fazer o Login!!'); </script>";
        echo"<meta http-equiv='refresh' content='0; url=../login.php' />";
           //header('location: index.php'); 
      }else{
        @session_start();
        $logado = $_SESSION['nomecompleto_usuario'];
        $imgusu = $_SESSION['img_usuario'];
      }
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT i.idimo, i.tipoimo, i.cidade, i.bairro, u.nome, 
	        i.valorvendaimo, c.nomecap FROM imovel i INNER JOIN usuario u on i.idusu = u.idusu inner join captador c on i.idcap = c.idcap where 1 order by i.idimo';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$imoveis = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	$conexao = conexao::getInstance();
	$sql = 'SELECT i.idimo, i.tipoimo, i.cidade, i.bairro, u.nome, 
	        i.valorvendaimo, c.nomecap FROM imovel i INNER JOIN usuario u on i.idusu = u.idusu inner join captador c on i.idcap = c.idcap';
	$termo1 = (isset($_GET['termo1'])) ? $_GET['termo1'] : '';          
	if($termo1 == 1 ){
		$sql .= ' WHERE i.tipoimo LIKE :tipo order by i.idimo';
	    $stm = $conexao->prepare($sql);
        $stm->bindValue(':tipo', $termo.'%');
    }else if($termo1 == 2 ){
		$sql .= ' WHERE i.cidade LIKE :cidade order by i.idimo';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':cidade', $termo.'%');
	}else if($termo1 == 3 ){
		$sql .= ' WHERE i.idimo = :idimo order by i.idimo';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':idimo', $termo);
	}else if($termo1 == 4 ){
		$sql .= ' WHERE i.valorvendaimo >= :valorvendaimo order by i.idimo';
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':valorvendaimo', $termo);
	}else if($termo1 == 5){
		$sql .= ' WHERE u.nome LIKE :nome order by i.idimo';
	    $stm = $conexao->prepare($sql);
        $stm->bindValue(':nome', $termo.'%');
	}		
	$stm->execute();
	$imoveis = $stm->fetchAll(PDO::FETCH_OBJ);
endif;

	 	$dompdf = new DOMPDF();
	 	$html = "<link rel='stylesheet' type='text/css' href='css/pdf.css' media='all' >
	 			<body>
	 			<h1><img src='../img/logonovo.png'/>  Relatório geral dos Imóveis</h1>";
	 	$html .= '<table>
					<tr>
						<th>Código</th>
						<th>Tipo</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Valor</th>
						<th>Corretor</th>
						<th>Captador</th>
					</tr>';
	 	foreach ($imoveis as $imovel) {
	 		$html .=     "<tr>
							<td id='primeiro'>".$imovel->idimo."</td>
							<td>".$imovel->tipoimo."</td>
							<td>".$imovel->bairro."</td>
							<td>".$imovel->cidade."</td>
							<td>R$".number_format($imovel->valorvendaimo,2, ",", ".")."</td>
							<td>".$imovel->nome."</td>
							<td>".$imovel->nomecap."</td>
						</tr>";
	 	}

	 	$html .= "</table>
	 	</body>";


	 	$dompdf->load_html($html);
	 	$dompdf->render();

	 	$dompdf->stream("relatorioimoveis.pdf", array("Attachment"=>false));


	 	
	 		/*//Gerando o relatório com a variável do html
	 		$mpdf = new mPDF();
	    	$mpdf->SetDisplayMode('fullpage');
	   		$css = file_get_contents('css/pdf.css');
	    	$mpdf->WriteHTML($css,1);
	    	$mpdf->WriteHTML($html);
			$mpdf->Output();*/

?>