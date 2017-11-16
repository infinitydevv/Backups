<?php
	require '../conexoes/conexao.php';
	@session_start();
	require "../login/functions.php";
    require "../login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
      $id = $_SESSION['iduser'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    }

// Recebe o id do cliente do cliente via GET
$id = (isset($_GET['idimo'])) ? $_GET['idimo'] : '';
$pdo = conexao::getInstance();
// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):
	// Captura os dados do cliente solicitado
	$sql = 'SELECT * FROM imovel i inner join cidade c on i.cidade = c.idcity WHERE i.idimo = :id';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(':id', $id);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);
endif;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edição de Imóvel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
			<!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">

</head>
<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
	<div class='container'>
		<br>
			<legend><h1 class="text-center">Formulário - Edição de Imóvel</h1></legend>
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Imóvel não encontrado!</h3>
			<?php else: ?>
				<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>		
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
								<legend><h2>Dados Gerais </h2></legend>
								<div class="form-group">
									<label for="tipo">Corretor:</label>
									<?php
									$sql = "SELECT idusu,nome FROM usuario";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$row = $stmt->fetchAll(PDO::FETCH_OBJ);
									?>
									<!--later on-->
									<select class="form-control" name="nomeusu">
										<?php 
										foreach ($row as $k) {
											if($k->idusu == $cliente->idusu){
												echo "<option value='" . $k->idusu . "' selected >" . $k->nome . "</option>";
											}else{
												echo "<option value='" . $k->idusu . "'>" . $k->nome . "</option>";
											}
										}
										?>	
									</select>
								</div>

								<div class="form-group">
									<label for="dataani">Data do Cadastro:</label>
									<input type="text" class="form-control" id="datac" name="datacad" value="<?php echo $cliente->datacadimo?>">
								</div>
								<!-- ativos e imoveis destaques -->
								
								<div class="form-group">
									<label for="dataani">Imóvel Destaque?</label>
									<?php 
											if($cliente->destaqueimo == 1){
												echo '<input type="radio"  id="datac" name="destaque" checked value="1" />Sim
												<input type="radio" name="destaque" value="0" />Não';
											}else if($cliente->destaqueimo == 0){
												echo '<input type="radio"  id="datac" name="destaque" value="1" />Sim
												<input type="radio" name="destaque" value="0" checked/>Não';
											}
									?>
								</div>
								
								<div class="form-group">
									<label for="dataani">Imóvel Ativo?</label>
									<?php 
											if($cliente->ativo == 1){
												echo '<input type="radio"  id="datac" name="ativo" checked value="1" />Sim';
												echo '<input type="radio" name="ativo" value="0" />Não';
											}else if($cliente->ativo == 0){
												echo '<input type="radio"  id="datac" name="ativo"  value="1" />Sim';
												echo '<input type="radio" name="ativo" value="0" checked />Não';
											}
									?>
								</div>
								<legend>Captador </legend>
								<label for="tipo">Nome do captador:</label>
								<?php
								$sql = "SELECT idcap,nomecap FROM captador where 1";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetchAll(PDO::FETCH_OBJ);
								?>
								<!--later on-->
								<select name="nomecap" class="form-control">
									<?php
									foreach ($row as $r){
										if($r->idcap == $cliente->idcap){
											echo "<option value='" . $r->idcap . "' selected>" . $r->nomecap . "</option>";
										}else{
											echo "<option value='" . $r->idcap . "'>" . $r->nomecap . "</option>";
										}
									}
									?>	
								</select>
							<!-- fim ativos e imoveis destaques -->
							<!-- dados do cliente -->
							<br>
								<legend>Proprietário </legend>
								<label for="tipo">Cliente:</label>
								<?php
								$ops='';
								$sql = "SELECT idcliven,nomecliven FROM clientevendedor where 1";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$row = $stmt->fetchAll(PDO::FETCH_OBJ);

								?>
								<!--later on-->
								<select class="form-control" name="cliven">
									<?php 
									foreach ($row as $r){
										if($r->idcliven == $cliente->idcliven){
											echo "<option value='" . $r->idcliven . "' selected>" . $r->nomecliven . "</option>";
										}else{
											echo "<option value='" . $r->idcliven . "'>" . $r->nomecliven . "</option>";
										}
									}

									?>	
								</select>

						</div>
						<!-- FIM DADOS DO PROPRIETARIO -->
						<div class="col-xs-12 col-sm-4 col-md-4">
							<legend><h2>Dados do Imóvel </h2></legend>
							<div class="form-group">
								<label for="tipo">Tipo do Imóvel:</label>
								<select name="tipoimo" class="form-control" id="tipoimo1">
									<option value="<?php echo $cliente->tipoimo?>"><?php echo "<strong>".$cliente->tipoimo."</strong>"; ?></option>
									<option value="Casa">Casa</option>
									<option value="Apartamento">Apartamento</option>
									<option value="Terreno">Terreno</option>
									<option value="Rural">Rural</option>
									<option value="Comercial">Comercial</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tipo">Sub-Tipo:</label>
								<select name="subtipo" class="form-control" id="subtipo1">
									<option value="<?php echo $cliente->tipo?>"><?php echo $cliente->tipo; ?></option>
									<option value="Padrão">Padrão</option>
									<option value="Cobertura">Cobertura</option>
									<option value="Kitnet">Kitnet</option>
									<option value="Loft/Studio">Loft/Studio</option>
									<option value="Madeira">Madeira</option>
									<option value="Alvenaria">Alvenaria</option>
									<option value="Mista">Mista</option>
									<option value="empreendimento">Empreendimento</option>
								</select>
							</div>


							<div class="form-group">
								<label for="dados">Logradorou:</label>
								<input type="text" class="form-control" id="endereco" name="logradouro" placeholder="Endereço" value="<?php echo $cliente->lougradouro; ?>">
							</div>

							<div class="form-group">
								<label for="dados">Número:</label>
								<input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?php echo $cliente->numero ;?>">
							</div> 
							<div class="form-group">
								<label for="dados">Bairro:</label>
								<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $cliente->bairro; ?>">
							</div> 

							<div class="form-group">
								<label for="tipo">Cidade:</label>
								<select name="cidade" class="form-control" id="cidade">
									<?php
										$sql = "SELECT * from cidade c inner join estado e on c.estado = e.id where c.estado = 23";
										$stmt = $pdo->prepare($sql);
										$stmt->execute();
										$rs = $stmt->fetchAll(PDO::FETCH_OBJ);

										foreach ($rs as $city) {
											if($city->idcity == $cliente->cidade){
												echo '<option value="'.$city->idcity.'" selected>'.$city->nomecity.'</option>';
											}else{
												echo '<option value="'.$city->idcity.'">'.$city->nomecity.'</option>';
											}
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="dados">CEP:</label>
								<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php echo $cliente->cep;?>">
							</div> 
							<div class="form-group">
								<label for="dados">Estado:</label>
								<?php
									$sql = "SELECT * from estado where id = 23";
									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									$rs = $stmt->fetchAll(PDO::FETCH_OBJ);


									foreach ($rs as $stades) {
										echo '<input type="text" class="form-control" id="estado" name="estado" placeholder="estado" value="'.$stades->uf.'">';
									}
									
								?>
							</div> 
							<div class="form-group">
								<label for="dados">Bloco/Apto:</label>
								<input type="text" class="form-control" id="bloco" name="bloco" placeholder="Bloco/Apto" value="<?php echo $cliente->bloco; ?>">
							</div>	
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<legend><h2>Dados do Empreendimento </h2></legend>
								<div class="form-group">
									<label for="dataani">É um Empreendimento?</label>
									<?php

										if($cliente->empreendimento == "Sim"){
											echo '<input type="radio"  id="empreendimento" checked name="emp" value="1" />Sim
												  <input type="radio" name="emp" value="0" />Não';
										}else{
											echo '<input type="radio"  id="empreendimento"  name="emp" value="1" />Sim
												  <input type="radio" name="emp" value="0" checked />Não';
										}

									?>
								</div>
								<div class="form-group">
									<label for="dados">Nome do Empreendimento:</label>
									<input type="text" class="form-control" id="empreendimento1" name="empreendimento" placeholder="Nome do Empreendimento" value="<?php echo $cliente->nomeempreendimento;?>">
								</div>
								<div class="form-group">
									<label for="dados">Nº Prédios:</label>
									<input type="text" class="form-control" id="numpredios" name="numpredios" placeholder="Nº de Prédios" value="<?php echo $cliente->numpredios?>">
								</div> 
								<div class="form-group">
									<label for="dados">Nº Unidades:</label>
									<input type="text" class="form-control" id="numunidades" name="numunidades" placeholder="Nº de Unidades" value="<?php echo $cliente->numunidades?>">
								</div> 
								<div class="form-group">
									<label for="dados">Nº Andares:</label>
									<input type="text" class="form-control" id="numandares" name="numandares" placeholder="Nº de andares" value="<?php echo $cliente->numandares?>"> 
								</div> 
								<div class="form-group">
									<label for="dados">Aptos/Andar:</label>
									<input type="text" class="form-control" id="aptosporandar" name="aptosporandar" placeholder="Nº Aptos/Andar" value="<?php echo $cliente->aptosporandar?>">
								</div> 
								<div class="form-group">
									<label for="embutido">Espera Split?</label>
									<select name="split" class="form-control" id="split1">
										<option value="<?php echo $cliente->esperasplit?>">--</option>
										<option value="Sim">Sim</option>
										<option value="Não">Não</option>
									</select>
								</div>
								<div class="form-group">
									<label for="embutido">Sacada?</label>
									<select name="sacada" class="form-control" id="sacada1">
										<option value="<?php echo $cliente->sacada?>">--</option>
										<option value="Sim">Sim</option>
										<option value="Não">Não</option>
									</select>
								</div>
								<div class="form-group">
									<label for="embutido">Quadra Poliesportiva?</label>
									<select name="quadra" class="form-control" id="quadra">
										<option value="<?php echo $cliente->quadraesporte?>"></option>
										<option value="Sim">Sim</option>
										<option value="Não">Não</option>
									</select>
								</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
						<legend><h2>Detalhes do Imóvel</h2></legend>	  
						<div class="form-group">
							<label for="dormitorio">Nº de Dormitórios:</label>
							<input type="text" class="form-control" id="dormitorio" name="dormitorio" placeholder="3 dorm" value="<?php echo $cliente->numdormimo?>">
						</div>

						<div class="form-group">
							<label for="areautil">Área útil: </label>
							<input type="text" class="form-control" id="areautil" name="areautil" placeholder="? m²" value="<?php echo $cliente->areaimo?>">
						</div>

						<div class="form-group">
							<label for="ar">Terreno - Medidas:</label>
							<input type="text" class="form-control" id="medidas" name="medidas" placeholder="? m x ? m" value="<?php echo $cliente->medidasimo?>">
						</div>
						<div class="form-group">
							<label for="vagas">Vagas:</label>
							<input type="number" class="form-control" min ="0" max="8" id="vagas" name="vagas" placeholder="vagas" value="<?php echo $cliente->vagasimo?>">
						</div>

						<div class="form-group">
							<label for="condominio">Valor do Condomínio: </label>
							<input type="text" class="form-control" id="condominio" name="valcondominio" placeholder="R$" value="<?php echo $cliente->valorcondominioimo?>">
						</div>

						<div class="form-group">
							<label for="iptu">Valor do IPTU: </label>
							<input type="number" class="form-control" id="iptu" name="iptu" placeholder="R$" value="<?php echo $cliente->valoriptuimo?>">
						</div>


						<div class="form-group">
							<label for="piso">Piso:</label>
							<input type="text" class="form-control" id="piso" name="piso" placeholder="Madeira; Laminado; Ceramica; Porcelanato;" value="<?php echo $cliente->piso?>">
						</div>

						<div class="form-group">
							<label for="teto">Teto:</label>
							<input type="text" class="form-control" id="teto" name="teto" placeholder="Madeira; PVC; Chapa; Gesso;" value="<?php echo $cliente->tetoimo?>">
						</div>

						<div class="form-group">
							<label for="paredes">Paredes:</label>
							<input type="text" class="form-control" id="parede" name="parede" placeholder="Reboco; Massa Corrida; Textura; Ceramica; Revestida" value="<?php echo $cliente->paredesimo?>">
						</div>
						<div class="form-group">



							<div class="form-group">
								<label for="Hidraulica">Hidraulica:</label>
								<select name="hidraulica" class="form-control" id="hidraulica">
									<option value="<?php echo $cliente->hidraulicaimo?>"><?php echo $cliente->aptosporandar?></option>
									<option value="Água Quente">Água Quente</option>
									<option value="Água Fria">Água Fria</option>

								</select>
							</div>

							<div class="form-group">
								<label for="ar">Ar condicionado:</label>
								<input type="text" class="form-control" id="ar" name="ar" placeholder="Dois ar Split e um ar janela" value="<?php echo $cliente->arcondicionadoimo?>">
							</div>

							<div class="form-group">
								<label for="embutido">Armários Embutidos:</label>
								<select name="embutido" class="form-control" id="embutido">
									<option value="<?php echo $cliente->armariosimo?>"><?php echo $cliente->armariosimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="festa">Salão de Festas:</label>
								<select name="festa" class="form-control" id="festa">
									<option value="<?php echo $cliente->salaofestaimo?>"><?php echo $cliente->salaofestaimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="churrasqueira">Churrasqueira:</label>
								<select name="churras" class="form-control" id="churrasqueira">
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="portaria">Portaria 24h:</label>
								<select name="portaria" class="form-control" id="portaria">
									<option value="<?php echo $cliente->churrasqueiraimo?>"><?php echo $cliente->churrasqueiraimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="servico">Área de serviço:</label>
								<select name="servico" class="form-control" id="servico">
									<option value="<?php echo $cliente->areaservicoimo?>"><?php echo $cliente->areaservicoimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="piscina">Piscina:</label>
								<select name="piscina" class="form-control" id="piscina">
									<option value="<?php echo $cliente->piscinaimo?>"><?php echo $cliente->piscinaimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="academia">Academia:</label>
								<select name="academia" class="form-control" id="academia">
									<option value="<?php echo $cliente->academiaimo?>"><?php echo $cliente->academiaimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="embutido">Plano:</label>
								<select name="plano" class="form-control" id="plano">
									<option value="<?php echo $cliente->planoimo?>"><?php echo $cliente->planoimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>

							<div class="form-group">
								<label for="inclinado">Inclinado:</label>
								<select name="inclinado" class="form-control" id="inclinado">
									<option value="<?php echo $cliente->inclinadoimo?>"><?php echo $cliente->inclinadoimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>
							<div class="form-group">
								<label for="gramado">Gramado:</label>
								<select name="gramado" class="form-control" id="gramado">
									<option value="<?php echo $cliente->gramadoimo?>"><?php echo $cliente->gramadoimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>
							<div class="form-group">
								<label for="calcado">Calçado:</label>
								<select name="calcado" class="form-control" id="calcado">
									<option value="<?php echo $cliente->calcadoimo?>"><?php echo $cliente->calcadoimo?></option>
									<option value="Sim">Sim</option>
									<option value="Não">Não</option>
								</select>
							</div>
						</div>
					</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<legend><h2>Imagens</h2></legend>
							<div class="form-group">
								<div class="row">
									<label for="nome">Selecionar Foto 1</label>
									<div class="col-md-2">
										<a href="#" class="thumbnail">
											<img src="<?php echo $cliente->foto1?>" height="190" width="150" id="foto11">
										</a>
									</div>
									<input type="hidden" name="foto_atual1" value="<?php echo $cliente->foto1; ?>">
									<input type="file" name="foto1" id="foto1" value="<?php echo $cliente->foto1?>">
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<label for="nome">Selecionar Foto 2</label>
									<div class="col-md-2">
										<a href="#" class="thumbnail">
											<img src="<?php echo $cliente->foto2?>" height="190" width="150" id="foto22">
										</a>
									</div>
									<input type="hidden" name="foto_atual2" value="<?php echo $cliente->foto2; ?>">
									<input type="file" name="foto2" id="foto2" value="<?php echo $cliente->foto2?>" >
								</div>
							</div>			

							<div class="form-group">
								<div class="row">
									<label for="nome">Selecionar Foto 3</label>
									<div class="col-md-2">
										<a href="#" class="thumbnail">
											<img src="<?php echo $cliente->foto3?>" height="190" width="150" id="foto33" >
										</a>
									</div>
									<input type="hidden" name="foto_atual3" value="<?php echo $cliente->foto3; ?>">
									<input type="file" name="foto3" id="foto3" value="<?php echo $cliente->foto3?>" >
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<label for="nome">Selecionar Foto 4</label>
									<div class="col-md-2">
										<a href="#" class="thumbnail">
											<img src="<?php echo $cliente->foto4?>" height="190" width="150" id="foto44">
										</a>
									</div>
									<input type="hidden" name="foto_atual4" value="<?php echo $cliente->foto4; ?>">
									<input type="file" name="foto4" id="foto4" value="<?php echo $cliente->foto4?>">
								</div>
							</div>	

							<div class="form-group">
								<div class="row">
									<label for="nome">Selecionar Foto 5</label>
									<div class="col-md-2">
										<a href="#" class="thumbnail">
											<img src="<?php echo $cliente->foto5?>" height="190" width="150" id="foto55">
										</a>
									</div>
									<input type="hidden" name="foto_atual5" value="<?php echo $cliente->foto5; ?>">
									<input type="file" name="foto5" id="foto5" value="<?php echo $cliente->foto5?>">
								</div>
							</div>	
								<legend><h2>Preço e Condição </h2></legend>	
								<div class="form-group">
									<label for="valimo">Valor para o proprietário: </label>
									<input type="text" class="form-control" id="valimo" name="valimo" placeholder="R$" value="<?php echo $cliente->valorimo?>">
								</div>
								<div class="form-group">
									<label for="comissao">Comissão</label>
									<input type="text" class="form-control" id="comissao" name="comissao" placeholder="%" value="<?php echo $cliente->comissaoimo?>">
								</div>
								<div class="form-group">
									<label for="valvenda">Valor de venda: </label>
									<input type="text" class="form-control" id="valvenda" name="valvenda" placeholder="R$" value="<?php echo $cliente->valorvendaimo?>">
								</div>

								<div class="form-group">
									<label for="dataani">MCMV?</label>
									<?php
											if($cliente->mcmv == "Sim"){
												echo '<input type="radio"  id="MCMV1" name="MCMV" checked value="Sim" />Sim
													  <input type="radio" name="MCMV" value="Não" />Não';
											}else{
												echo '<input type="radio"  id="MCMV1" name="MCMV"  value="Sim" />Sim
													  <input type="radio" name="MCMV" value="Não" checked />Não';
											}
									?>
								</div>

								<div class="form-group">
									<label for="comment">Facilidades de Negociação:</label>
									<textarea class="form-control ckeditor" rows="5" name="observacao1" placeholder="Observações sobre o apartamento" value="<?php echo $cliente->observacao1?>"><?php echo $cliente->observacao1?></textarea>
								</div>		
								<div class="form-group">
									<label for="comment">Observações:</label>
									<textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Observações sobre o apartamento" value="<?php echo $cliente->observacao2?>"><?php echo $cliente->observacao2?></textarea>
								</div>
								<div class="form-group">
									<label for="comment">Descrição:</label>
									<textarea class="form-control ckeditor" rows="5" name="observacao3" placeholder="Observações sobre o apartamento" value="<?php echo $cliente->observacao3?>"><?php echo $cliente->observacao3?></textarea>
								</div>


							<input type="hidden" name="acao" value="editar">
							<input type="hidden" value="<?php echo $id; ?>" name="idimo">

							<button type="submit" class="btn btn-block btn-warning" id='botao'> 
								Editar
							</button>
							<a href='index.php' class="btn btn-block btn-primary">Cancelar</a>
							</div>
						</div>
						</form>
					<?php endif; ?>

			</div>
			<script type="text/javascript" src="js/custom.js"></script>
		</body>
		</html>