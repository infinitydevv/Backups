<?php  
	require_once "../conexoes/conexao.php";
	$pdo = conexao::getInstance();;
	if($_GET){
		$id = $_GET['id'];

		$sql = "SELECT * FROM imovel i inner join clientevendedor c on i.idcliven = c.idcliven where i.idimo = :id";


		$stm = $pdo->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->execute();
		$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

		foreach ($clientes as $key) {
			 echo '<div class="row">
	                            <div class="col-xs-12 col-sm-12">';
	                            if($key->foto1 != "../imoveis/fotosprodutos/padrao.png"){
	                              echo '
	                              <img src="'.$key->foto1.'" width="200">';
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
	                            <div class="col-xs-12 col-sm-12">';
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
	                                <div class='col-xs-6'>
	                                  <ul>";
	                                    if( $key->tipoimo!="Terreno" && $key->tipoimo!="Comercial"){
	                                    echo "<li><img src='../img/icons/icon-certo.png'>N° de Dormitórios: <span class='texto-laranja'>".$key->numdormimo."</span>.</li>";
	                                    }
	                                    echo "<li><img src='../img/icons/icon-certo.png'>Área do Imóvel: <span class='texto-laranja'>".$key->areaimo." m²</span>.</li>";
	                                    if($key->tipoimo == 'Terreno'){
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Medidas: <span class='texto-laranja'>".$key->medidasimo."</span>.</li>";
	                                    }
	                                    if($key->churrasqueiraimo=="Sim"){
	                                      echo "
	                                      <li><img src='../img/icons/icon-certo.png'>Churrasqueira: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->salaofestaimo=="Sim" && !empty($key->salaofestaimo)){
	                                      echo "<li><img src='../img/icons/icon-certo.png'>Salão de Festa: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->portariaimo=="Sim" && !empty($key->portariaimo)){
	                                      echo "<li><img src='../img/icons/icon-certo.png'>Portaria: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->areaservicoimo=="Sim" && !empty($key->areaservicoimo)){
	                                      echo "<li><img src='../img/icons/icon-certo.png'>Área de Serviço: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->piscinaimo=="Sim" && !empty($key->piscinaimo)){
	                                      echo "<li><img src='../img/icons/icon-certo.png'>Piscina: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                   
	                                    echo "
	                                  </ul>
	                                </div>
	                                <div class='col-xs-6'>
	                                  <ul>";
	                                    if($key->academiaimo=="Sim" && !empty($key->academiaimo)){
	                                      echo "<li><img src='../img/icons/icon-certo.png'>Academia: <span class='texto-laranja'>Sim</span>.</li>";
	                                    }
	                                    if($key->tipoimo != "Terreno" && $key->tipoimo != "Comercial" ){
	                                      $piso = $key->piso;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Piso: <span class='texto-laranja'>".$piso."</span>.</li>";
	                                       $teto = $key->tetoimo;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Teto: <span class='texto-laranja'>".$teto."</span>.</li>";
	                                       $parede = $key->paredesimo;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Paredes: <span class='texto-laranja'>".$parede."</span>.</li>";
	                                       $hidro = $key->hidraulicaimo;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Hidraulica: <span class='texto-laranja'>".$hidro."</span>.</li>";
	                                    if($key->arcondicionadoimo=="Sim"){
	                                       $ar = $key->arcondicionadoimo;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Ar Condicionado: <span class='texto-laranja'>".$ar."</span>.</li>";
	                                    }
	                                    if($key->armariosimo=="Sim" && !empty($key->armariosimo)){
	                                       $arma = $key->armariosimo;
	                                       echo "<li><img src='../img/icons/icon-certo.png'>Armarios: <span class='texto-laranja'>".$arma."</span>.</li>";
	                                    }
	                                   }
	                                    echo '
	                                  </ul>
	                                </div>
	                                <div class="col-xs-12 text-center">
		                                <a class="btn btn-lg text-center btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										  Proprietário
										</a>
										<div class="collapse" id="collapseExample">
										  <div class="well">
										  	<div class="row">
											  	<div class="col-xs-6 text-left">
												    <strong>ID do cliente:</strong> '.$key->idcliven.'<br>
												    <strong>Nome:</strong> '.$key->nomecliven.'<br>
												    <strong>CPF:</strong> '.$key->cpf.'<br>
												    <strong>Email:</strong> '.$key->email.'<br>
												    <strong>Telefone:</strong> '.$key->telefone.'<br>
												    <strong>Celular:</strong> '.$key->celular.'<br>
												    <strong>Logradouro:</strong> '.$key->logradouro.'<br>
												    <strong>Nome para Contato:</strong> '.$key->pessoacontato.'<br>
											    </div>
											    <div class="co-xs-6 text-left">
												    <strong>Número:</strong> '.$key->numero.'<br>
												    <strong>CEP:</strong> '.$key->cep.'<br>
												    <strong>Cidade:</strong> '.$key->bairro.'<br>
												    <strong>Cônjuge:</strong> '.$key->conjuge.'<br>
												    <strong>CPF do cônjuge:</strong> '.$key->cpfconjuge.'<br>
													<strong>OBS:</strong> '.$key->obs.'<br>
													
												</div>
											</div>
										  </div>
										</div>
									</div>
	                            </div>';
		}
					
	}else{
		echo "errão";
	}

?>