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
$pdo = conexao::getInstance();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Imóvel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">

	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script type="text/javascript" src="../js/jquery.mask.min.js"></script>
	<script Language="JavaScript">
// Por Mario Bruno Morais Aliste
function Inibe() {
	document.formulario.empreendimento.disabled = true;
	document.formulario.numpredios.disabled = true;
	document.formulario.numlote.disabled = true;
	document.formulario.numunidades.disabled = true;
	document.formulario.numandares.disabled = true;
	document.formulario.aptosporandar.disabled = true;
	document.formulario.split.disabled = true;
	document.formulario.sacada.disabled = true;
	document.formulario.quadra.disabled = true;         
	
}

function Exibe() {
	document.formulario.empreendimento.disabled = false;
	document.formulario.numpredios.disabled = false;
	document.formulario.numlote.disabled = false;
	document.formulario.numunidades.disabled = false;
	document.formulario.numandares.disabled = false;
	document.formulario.aptosporandar.disabled = false;
	document.formulario.split.disabled = false;
	document.formulario.sacada.disabled = false;
	document.formulario.quadra.disabled = false; 
	
}
</script>
<script type="text/javascript">
	
	
	$(function() {
		$('.date').mask('00/00/0000');
		$('.time').mask('00:00:00');
		$('.date_time').mask('00/00/0000 00:00:00');
		$('.cep').mask('00000-000');
		$('.phone').mask('0000-0000');
		$('.phone_with_ddd').mask('(00) 000-0000');
		$('.phone_us').mask('(000) 000-0000');
		$('.mixed').mask('AAA 000-S0S');
		$('.ip_address').mask('099.099.099.099');
		$('.percent').mask('##0,00%', {reverse: true});
		$('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
		$('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
		$('.fallback').mask("00r00r0000", {
			translation: {
				'r': {
					pattern: /[\/]/,
					fallback: '/'
				},
				placeholder: "__/__/____"
			}
		});

		$('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

		$('.cep_with_callback').mask('00000-000', {onComplete: function(cep) {
			console.log('Mask is done!:', cep);
		},
		onKeyPress: function(cep, event, currentField, options){
			console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
		},
		onInvalid: function(val, e, field, invalid, options){
			var error = invalid[0];
			console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
		}
	});

		$('.crazy_cep').mask('00000-000', {onKeyPress: function(cep, e, field, options){
			var masks = ['00000-000', '0-00-00-00'];
			mask = (cep.length>7) ? masks[1] : masks[0];
			$('.crazy_cep').mask(mask, options);
		}});

		$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
		$('.cpf').mask('000.000.000-00', {reverse: true});
		$('.money').mask('#.##0,00', {reverse: true});

		var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
			onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
		};

		$('.sp_celphones').mask(SPMaskBehavior, spOptions);

		$(".bt-mask-it").click(function(){
			$(".mask-on-div").mask("000.000.000-00");
			$(".mask-on-div").fadeOut(500).fadeIn(500)
		})

		$('pre').each(function(i, e) {hljs.highlightBlock(e)});
	});
</script>

</head>
<body>
	<!-- navbar-top.php e navbar-top.css no head -->
	<?php include('../navbar-log.php');?>
	<!-- FIM navbar-top.php e navbar-top.css no head -->
	<div class='container'>
		<br>
		<legend><h1 class="text-center">Formulário - Cadastro de Imóvel</h1></legend>
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
								echo "<option value='" . $k->idusu . "'>" . $k->nome . "</option>";
							}
							?>	
						</select>
					</div>

					<div class="form-group">
						<label for="dataani">Data do Cadastro:</label>
						<input type="date" class="form-control" id="datac" name="datacad" value="<?php echo $cliente->datacadimo?>">
					</div>
					<!-- ativos e imoveis destaques -->
					
					<div class="form-group">
						<label for="dataani">Imóvel Destaque?</label>
						<?php 
						echo '<input type="radio"  id="datac" name="destaque" value="1" />Sim
						<input type="radio" name="destaque" value="0" checked/>Não';
						?>
					</div>
					
					<div class="form-group">
						<label for="dataani">Imóvel Ativo?</label>
						<?php 
						echo '<input type="radio"  id="datac" name="ativo"  value="1" />Sim';
						echo '<input type="radio" name="ativo" value="0" checked />Não';
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
							echo "<option value='" . $r->idcap . "'>" . $r->nomecap . "</option>";
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
							echo "<option value='" . $r->idcliven . "'>" . $r->nomecliven . "</option>";
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
						<input type="text" class="form-control" id="endereco" name="logradouro" placeholder="Endereço">
					</div>

					<div class="form-group">
						<label for="dados">Número:</label>
						<input type="text" class="form-control" id="numero" name="numero" placeholder="Número" >
					</div> 
					<div class="form-group">
						<label for="dados">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" >
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
								echo '<option value="'.$city->idcity.'">'.$city->nomecity.'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="dados">CEP:</label>
						<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
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
						<input type="text" class="form-control" id="bloco" name="bloco" placeholder="Bloco/Apto"">
					</div>	
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<legend><h2>Dados do Empreendimento </h2></legend>
					<div class="form-group">
						<label for="dataani">É um Empreendimento?</label>
						<input type="radio"  id="empreendimento" name="emp" value="1" />Sim
						<input type="radio" name="emp" value="0" checked/>Não
					</div>
					<div class="form-group">
						<label for="dados">Nome do Empreendimento:</label>
						<input type="text" class="form-control" id="empreendimento1" name="empreendimento" placeholder="Nome do Empreendimento">
					</div>
					<div class="form-group">
						<label for="dados">Nº Prédios:</label>
						<input type="text" class="form-control" id="numpredios" name="numpredios" placeholder="Nº de Prédios" >
					</div> 
					<div class="form-group">
						<label for="dados">Nº Unidades:</label>
						<input type="text" class="form-control" id="numunidades" name="numunidades" placeholder="Nº de Unidades" >
					</div> 
					<div class="form-group">
						<label for="dados">Nº Andares:</label>
						<input type="text" class="form-control" id="numandares" name="numandares" placeholder="Nº de andares" > 
					</div> 
					<div class="form-group">
						<label for="dados">Aptos/Andar:</label>
						<input type="text" class="form-control" id="aptosporandar" name="aptosporandar" placeholder="Nº Aptos/Andar" >
					</div> 
					<div class="form-group">
						<label for="embutido">Espera Split?</label>
						<select name="split" class="form-control" id="split1">
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select>
					</div>
					<div class="form-group">
						<label for="embutido">Sacada?</label>
						<select name="sacada" class="form-control" id="sacada1">
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select>
					</div>
					<div class="form-group">
						<label for="embutido">Quadra Poliesportiva?</label>
						<select name="quadra" class="form-control" id="quadra">
							<option value="Sim">Sim</option>
							<option value="Não">Não</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<legend><h2>Detalhes do Imóvel</h2></legend>	  
					<div class="form-group">
						<label for="dormitorio">Nº de Dormitórios:</label>
						<input type="text" class="form-control" id="dormitorio" name="dormitorio" placeholder="3 dorm">
					</div>

					<div class="form-group">
						<label for="areautil">Área útil: </label>
						<input type="text" class="form-control" id="areautil" name="areautil" placeholder="? m²">
					</div>

					<div class="form-group">
						<label for="ar">Terreno - Medidas:</label>
						<input type="text" class="form-control" id="medidas" name="medidas" placeholder="? m x ? m">
					</div>
					<div class="form-group">
						<label for="vagas">Vagas:</label>
						<input type="number" class="form-control" min ="0" max="8" id="vagas" name="vagas" placeholder="vagas">
					</div>

					<div class="form-group">
						<label for="condominio">Valor do Condomínio: </label>
						<input type="text" class="form-control" id="condominio" name="valcondominio" placeholder="R$">
					</div>

					<div class="form-group">
						<label for="iptu">Valor do IPTU: </label>
						<input type="number" class="form-control" id="iptu" name="iptu" placeholder="R$">
					</div>


					<div class="form-group">
						<label for="piso">Piso:</label>
						<input type="text" class="form-control" id="piso" name="piso" placeholder="Madeira; Laminado; Ceramica; Porcelanato;">
					</div>

					<div class="form-group">
						<label for="teto">Teto:</label>
						<input type="text" class="form-control" id="teto" name="teto" placeholder="Madeira; PVC; Chapa; Gesso;">
					</div>

					<div class="form-group">
						<label for="paredes">Paredes:</label>
						<input type="text" class="form-control" id="parede" name="parede" placeholder="Reboco; Massa Corrida; Textura; Ceramica; Revestida">
					</div>
					<div class="form-group">



						<div class="form-group">
							<label for="Hidraulica">Hidraulica:</label>
							<select name="hidraulica" class="form-control" id="hidraulica">
								<option value="Água Quente">Água Quente</option>
								<option value="Água Fria">Água Fria</option>

							</select>
						</div>

						<div class="form-group">
							<label for="ar">Ar condicionado:</label>
							<input type="text" class="form-control" id="ar" name="ar" placeholder="Dois ar Split e um ar janela" >
						</div>

						<div class="form-group">
							<label for="embutido">Armários Embutidos:</label>
							<select name="embutido" class="form-control" id="embutido">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="festa">Salão de Festas:</label>
							<select name="festa" class="form-control" id="festa">
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
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="servico">Área de serviço:</label>
							<select name="servico" class="form-control" id="servico">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="piscina">Piscina:</label>
							<select name="piscina" class="form-control" id="piscina">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="academia">Academia:</label>
							<select name="academia" class="form-control" id="academia">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="embutido">Plano:</label>
							<select name="plano" class="form-control" id="plano">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>

						<div class="form-group">
							<label for="inclinado">Inclinado:</label>
							<select name="inclinado" class="form-control" id="inclinado">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>
						<div class="form-group">
							<label for="gramado">Gramado:</label>
							<select name="gramado" class="form-control" id="gramado">
								<option value="Sim">Sim</option>
								<option value="Não">Não</option>
							</select>
						</div>
						<div class="form-group">
							<label for="calcado">Calçado:</label>
							<select name="calcado" class="form-control" id="calcado">
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
									<img src="fotos/padrao.jpg" height="190" width="150" id="foto11">
								</a>
							</div>
							<input type="hidden" name="foto_atual1">
							<input type="file" name="foto1" id="foto1">
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="nome">Selecionar Foto 2</label>
							<div class="col-md-2">
								<a href="#" class="thumbnail">
									<img src="fotos/padrao.jpg" height="190" width="150" id="foto22">
								</a>
							</div>
							<input type="hidden" name="foto_atual2">
							<input type="file" name="foto2" id="foto2">
						</div>
					</div>			

					<div class="form-group">
						<div class="row">
							<label for="nome">Selecionar Foto 3</label>
							<div class="col-md-2">
								<a href="#" class="thumbnail">
									<img src="fotos/padrao.jpg" height="190" width="150" id="foto33" >
								</a>
							</div>
							<input type="hidden" name="foto_atual3">
							<input type="file" name="foto3" id="foto3">
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="nome">Selecionar Foto 4</label>
							<div class="col-md-2">
								<a href="#" class="thumbnail">
									<img src="fotos/padrao.jpg" height="190" width="150" id="foto44">
								</a>
							</div>
							<input type="hidden" name="foto_atual4">
							<input type="file" name="foto4" id="foto4">
						</div>
					</div>	

					<div class="form-group">
						<div class="row">
							<label for="nome">Selecionar Foto 5</label>
							<div class="col-md-2">
								<a href="#" class="thumbnail">
									<img src="fotos/padrao.jpg" height="190" width="150" id="foto55">
								</a>
							</div>
							<input type="hidden" name="foto_atual5">
							<input type="file" name="foto5" id="foto5">
						</div>
					</div>	
					<legend><h2>Preço e Condição </h2></legend>	
					<div class="form-group">
						<label for="valimo">Valor para o proprietário: </label>
						<input type="text" class="form-control" id="valimo" name="valimo" placeholder="R$" >
					</div>
					<div class="form-group">
						<label for="comissao">Comissão</label>
						<input type="text" class="form-control" id="comissao" name="comissao" placeholder="%" >
					</div>
					<div class="form-group">
						<label for="valvenda">Valor de venda: </label>
						<input type="text" class="form-control" id="valvenda" name="valvenda" placeholder="R$" >
					</div>

					<div class="form-group">
						<label for="dataani">MCMV?</label>
						<input type="radio"  id="MCMV1" name="MCMV" value="Sim" />Sim
						<input type="radio" name="MCMV" value="Não" checked />Não
					</div>

					<div class="form-group">
						<label for="comment">Facilidades de Negociação:</label>
						<textarea class="form-control ckeditor" rows="5" name="observacao1" placeholder="Observações sobre o apartamento" ></textarea>
					</div>		
					<div class="form-group">
						<label for="comment">Observações:</label>
						<textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Observações sobre o apartamento" ></textarea>
					</div>
					<div class="form-group">
						<label for="comment">Descrição:</label>
						<textarea class="form-control ckeditor" rows="5" name="observacao3" placeholder="Observações sobre o apartamento" ></textarea>
					</div>


					<input type="hidden" name="acao" value="cadastrar">

					<button type="submit" class="btn btn-block btn-success" id='botao'> 
						Cadastrar
					</button>
					<a href='index.php' class="btn btn-block btn-primary">Cancelar</a>
				</div>
			</div>
		</form>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>