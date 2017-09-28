<?php
	
	 use Dompdf\Dompdf;
	 require_once 'bibliotecas/dompdf/autoload.inc.php';
	 include "conexao.php";
	$id = (isset($_GET['id'])) ? $_GET['id'] : '';
	$conexao = conexao::getInstance();
	$sql = "SELECT * FROM imovel WHERE idimo = :id";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id);
	$stm->execute();
	$imoveis = $stm->fetchAll(PDO::FETCH_OBJ);
	 	$dompdf = new DOMPDF();
	 	$html = "<link rel='stylesheet' type='text/css' href='css/pdf.css'><body><h1 style='text-align:center;'>Radar dos Imóveis</h1>";
	 				foreach ($imoveis as $imovel){
		 				if(!empty($imovel->nomeempreendimento)){
			              $html .= "<h2>".$imovel->nomeempreendimento."</h2>";
			            }
			            $html .= "<div class='uls'>
			              <h2>".$imovel->tipoimo."</h2>
			              <h3>".number_format($imovel->valorvendaimo, 2,',','.')."</h3>
			              
				              <span>Código: ".$imovel->idimo."</span><br>
				              <span>".$imovel->cidade."</span><br>
				              <span>Bairro: ".$imovel->bairro."</span><br>
				              <span>".$imovel->lougradouro."</span>
				           
			              ";

		 				$html .= "<ul class='ulla1'>";
		                if( $imovel->tipoimo!="Terreno" && $imovel->tipoimo!="Comercial"){
		                $html .= "<li><img src='img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$imovel->numdormimo."</span>.</li>";
		                }
		                $html .= "<li><img src='img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$imovel->areaimo." m²</span>.</li>";
		                if($imovel->tipoimo == 'Terreno'){
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$imovel->medidasimo."</span>.</li>";
		                }
		                if($imovel->churrasqueiraimo=="Sim"){
		                  $html .= "
		                  <li><img src='img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		                if($imovel->salaofestaimo=="Sim" && !empty($imovel->salaofestaimo)){
		                  $html .= "<li><img src='img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		                if($imovel->portariaimo=="Sim" && !empty($imovel->portariaimo)){
		                  $html .= "<li><img src='img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		                if($imovel->areaservicoimo=="Sim" && !empty($imovel->areaservicoimo)){
		                  $html .= "<li><img src='img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		                if($imovel->piscinaimo=="Sim" && !empty($imovel->piscinaimo)){
		                  $html .= "<li><img src='img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		               
		                $html .= "
		              </ul>
		              <ul class='ulla'>";
		              	if($imovel->academiaimo=="Sim" && !empty($imovel->academiaimo)){
		                  $html .= "<li><img src='img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
		                }
		                if($imovel->tipoimo != "Terreno" && $imovel->tipoimo != "Comercial" ){
		                  $piso = $imovel->piso;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
		                   $teto = $imovel->tetoimo;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
		                   $parede = $imovel->paredesimo;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
		                   $hidro = $imovel->hidraulicaimo;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
		                if($imovel->arcondicionadoimo=="Sim"){
		                   $ar = $imovel->arcondicionadoimo;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
		                }
		                if($imovel->armariosimo=="Sim" && !empty($imovel->armariosimo)){
		                   $arma = $imovel->armariosimo;
		                   $html .= "<li><img src='img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
		                }
		               }
		                $html .= "
		              </ul></div>";
						if(!empty($imovel->observacao3)){
				          	$html .= "
					         <div>
					            <h3 class='descricao'>Descrição do Imóvel</h3>
					            <p>".$imovel->observacao3."</p>
					          </div>";
				      		}
				          	if(!empty($imovel->observacao1)){
				            $html .="
					          <div>
					              <h3>Facilidades de Negociação</h3>
					              <p>".$imovel->observacao1."</p>
					          </div>";
					        }
					        $html .= "";
		    }

	 	$dompdf->load_html($html);
	 	$dompdf->render();

	 	$dompdf->stream("relatorioimoveis.pdf", array("Attachment"=>false));

?>