<?php  
	require_once "../conexoes/conexao.php";
	require_once "../mensagem/class/Mensagem.php";
	$pdo = conexao::getInstance();;
	$m = new Mensagem();
	if($_GET){
		$id = $_GET['id'];

		$sql = "SELECT * FROM clientevendedor where idcliven = :id";


		$stm = $pdo->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_OBJ);

		foreach ($result as $key1) {
			echo '<div class="row">
				<div class="col-xs-12">
					<h2 class="text-center">Dados do Cliente Vendedor</h2>
					<div class="center-block">
						<ul>
							<div class="col-xs-6">
								<li>ID: '.$key1->idcliven.'</li>
								<li>Nome: '.$key1->nomecliven.'</li>
								<li>CPF: '.$key1->cpf.'</li>
								<li>CNPJ: '.$key1->cnpj.'</li>
								<li>Email: '.$key1->email.'</li>
								<li>Login: '.$key1->login.'</li>
							</div>
							<div class="col-xs-6">
								<li>Celular: '.$key1->celular.'</li>
								<li>Telefone: '.$key1->telefone.'</li>
								<li>Cônjuge: '.$key1->conjuge.'</li>
								<li>CPF do Cônjuge: '.$key1->cpfconjuge.'</li>
								<li>Nome para contato: '.$key1->pessoacontato.'</li>
								<li>Status: '.$key1->status.'</li>
							</div>
						</ul>
					</div>
					<strong>Endereço:</strong><br>
					'.$key1->cidade.', '.$key1->bairro.' rua '.$key1->logradouro.', '.$key1->numero.'<br>
					CEP: '.$key1->cep.'
				</div>
				<div class="col-xs-12">
				 	<h2>Observações</h2>';
				 	if($key1->obs != ""){
				 		echo '<p>'.$key1->obs.'</p>';
				 	}else{
				 		echo '<p>Nenhuma obervação.</p>';
				 	}
				 	echo '
				</div>
				</div>';
					echo '<h2>Imóveis</h2>';
				    $m->setIdcliven($id);
				    $rs = $m->pesquisarImoveis();
				    if(count($rs) != 0){
			          foreach ($rs as $key) {
			          echo '
			          <div class="panel panel-default">
			            <div class="panel-heading" role="tab" id="headingOne">
			              <h4 class="panel-title">
			                <a class="imo-h4" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$key->idimo.'" aria-expanded="true" aria-controls="collapse'.$key->idimo.'">
			                  <h4 >'.$key->tipoimo. ' - '.$key->bairro.'. '.$key->lougradouro.' - '.$key->cidade.'       R$'.number_format($key->valorvendaimo, 2,',','.').'</h4>
			                </a>
			              </h4>
			            </div>
			            <div id="collapse'.$key->idimo.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			              <div class="panel-body">
			                <ul class="nav nav-tabs" role="tablist">
			                  <li role="presentation" class="active"><a href="#mensagens'.$key->idimo.'" aria-controls="mensagens'.$key->idimo.'" role="tab" data-toggle="tab"><h4>Mensagens</h4></a></li>
			                   <li role="presentation" ><a href="#imovel'.$key->idimo.'" aria-controls="imovel'.$key->idimo.'" role="tab" data-toggle="tab"><h4>Imóvel</h4></a></li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                  <div role="tabpanel" class="tab-pane" id="imovel'.$key->idimo.'">'; 

			                    echo '<div class="row">
			                            <div class="col-xs-12 col-sm-6">';
			                            if($key->foto1 != "../imoveis/fotosprodutos/padrao.png"){
			                              echo '
			                              <img src="'.$key->foto1.'" width="150" style="margin-bottom: 10px;">';
			                            }
			                            if($key->foto2 != "../imoveis/fotosprodutos/padrao.png"){
			                              echo '
			                              <img src="'.$key->foto2.'" width="150" style="margin-bottom: 10px;">';
			                            }
			                            if($key->foto3 != "../imoveis/fotosprodutos/padrao.png"){
			                              echo '
			                              <img src="'.$key->foto3.'" width="150" style="margin-bottom: 10px;">';
			                            }
			                            if($key->foto4 != "../imoveis/fotosprodutos/padrao.png"){
			                              echo '
			                              <img src="'.$key->foto4.'" width="150" style="margin-bottom: 10px;">';
			                            }
			                            if($key->foto5 != "../imoveis/fotosprodutos/padrao.png"){
			                              echo '
			                              <img src="'.$key->foto5.'" width="150" style="margin-bottom: 10px;">';
			                            }
			                              if(!empty($key->observacao3)){
			                                      echo "<br>
			                                   <div class='info-imovel col-xs-12'>
			                                      <h3 class='descricao'>Descrição do Imóvel</h3>
			                                      <p>".$key->observacao3."</p>
			                                    </div>";
			                                }
			                                    if(!empty($key->observacao1)){
			                                      echo"
			                                    <div class='info-imovel col-xs-12'>
			                                        <h3>Facilidades de Negociação</h3>
			                                        <p>".$key->observacao1."</p>
			                                    </div>";
			                                  }
			                                  echo '
			                            </div>
			                            <div class="col-xs-12 col-sm-6">';
			                              if(!empty($key->nomeempreendimento)){
			                                echo "<h1>".$key->nomeempreendimento."</h1>";
			                              }
			                              echo "
			                                <h1>".$key->tipoimo."</h1>
			                                <span>Código: ".$key->idimo."</span><br>
			                                <span>".$key->cidade."</span><br>
			                                <span>Bairro: ".$key->bairro."</span><br>
			                                <h2 class='texto-laranja'>".number_format($key->valorvendaimo, 2,',','.')."</h2>
			                                <h3>Características do Imóvel:</h3>
			                                <div class='col-xs-12'>
			                                  <ul>";
			                                    if( $key->tipoimo!="Terreno" && $key->tipoimo!="Comercial"){
			                                    echo "<li><img src='img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$key->numdormimo."</span>.</li>";
			                                    }
			                                    echo "<li><img src='img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$key->areaimo." m²</span>.</li>";
			                                    if($key->tipoimo == 'Terreno'){
			                                       echo "<li><img src='img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$key->medidasimo."</span>.</li>";
			                                    }
			                                    if($key->churrasqueiraimo=="Sim"){
			                                      echo "
			                                      <li><img src='img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			                                    if($key->salaofestaimo=="Sim" && !empty($key->salaofestaimo)){
			                                      echo "<li><img src='img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			                                    if($key->portariaimo=="Sim" && !empty($key->portariaimo)){
			                                      echo "<li><img src='img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			                                    if($key->areaservicoimo=="Sim" && !empty($key->areaservicoimo)){
			                                      echo "<li><img src='img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			                                    if($key->piscinaimo=="Sim" && !empty($key->piscinaimo)){
			                                      echo "<li><img src='img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			      
			                                    if($key->academiaimo=="Sim" && !empty($key->academiaimo)){
			                                      echo "<li><img src='img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
			                                    }
			                                    if($key->tipoimo != "Terreno" && $key->tipoimo != "Comercial" ){
			                                      $piso = $key->piso;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
			                                       $teto = $key->tetoimo;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
			                                       $parede = $key->paredesimo;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
			                                       $hidro = $key->hidraulicaimo;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
			                                    if($key->arcondicionadoimo=="Sim"){
			                                       $ar = $key->arcondicionadoimo;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
			                                    }
			                                    if($key->armariosimo=="Sim" && !empty($key->armariosimo)){
			                                       $arma = $key->armariosimo;
			                                       echo "<li><img src='img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
			                                    }
			                                   }
			                                    echo "
			                                  </ul>
			                                </div>";

			                                echo "
			                            </div>
			                          </div>";

			                  echo '</div>
			                    <div role="tabpanel" class="tab-pane active" id="mensagens'.$key->idimo.'">';
			                      $m->setIdimo($key->idimo);
			                      $rsM = $m->pesquisarMensagem();
			                      $total = count($rsM);
			                      if($total != 0){
			                          foreach ($rsM as $keyM) {
			                             echo '
			                            <blockquote class="blockquote mensagem-mm">
			                              <h5>'.$keyM->assuntomens.'</h5>
			                              <p>'.$keyM->descricaomens.'</p>
			                              <footer>'.$keyM->datamens.' às '.$keyM->horamens.' - <cite title="Source Title">'.$keyM->nome.'.</cite></footer>
			                            </blockquote>';
			                          }
			                        }else{
			                          echo '
			                          <blockquote class="blockquote mensagem-mm">
			                            <p>Não há mensagens.</p>
			                            <footer>Radar dos imóveis. <cite title="Source Title">Dalmo Souza.</cite></footer>
			                          </blockquote>';
			                        }
			                    echo '
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>';
			            }
			        }else{
			        	echo "<h5>Você não tem imóveis cadastrados!</h5>";
			        }
				}
			
					
	}else{
		echo "errão";
	}

?>