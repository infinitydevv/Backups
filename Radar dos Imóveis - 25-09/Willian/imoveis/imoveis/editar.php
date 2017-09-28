<?php
require 'conexao.php';

// Recebe o id do cliente do cliente via GET
$id = (isset($_GET['idimo'])) ? $_GET['idimo'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM imovel WHERE idimo	= :id';
	$stm = $conexao->prepare($sql);
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Imóvel</h1></legend>
			
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Imóvel não encontrado!</h3>
			<?php else: ?>
				<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
					

				  <fieldset>
					<legend>Dados Gerais </legend>
						<div class="form-group">
							<label for="tipo">Corretor:</label>
							<?php
								$ops='';
								$pdo = new PDO('mysql:host=localhost;dbname=db_blog', 'root', '');
								$stmt = $pdo->query("SELECT idusu,nome FROM usuario");
								//$stmt = $pdo->execute();
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									$ops.= "<option value='" . $row['idusu'] . "'>" . $row['nome'] . "</option>";
								}
							?>
							<!--later on-->
							<select name="fileselect" class="form-control" name="nomeusu" value="<?=$cliente->idusu?>">
								<?php echo $ops;?>	
							</select>
						</div>
  
						<div class="form-group">
							<label for="dataani">Data do Cadastro:</label>
							<input type="text" class="form-control" id="datac" name="datacad" value="<?=$cliente->datacadimo?>">
						</div>
						<!-- ativos e imoveis destaques -->
						
						<div class="form-group">
							<label for="dataani">Imóvel Destaque?</label>
							<input type="radio"  id="datac" name="destaque" value="1" />Sim
							<input type="radio" name="destaque" value="0" checked/>Não
						</div>
						
						<div class="form-group">
							<label for="dataani">Imóvel Ativo?</label>
							<input type="radio"  id="datac" name="ativo" value="1" />Sim
							<input type="radio" name="ativo" value="0" checked/>Não
						</div>
					</fieldset>
	  <!-- fim ativos e imoveis destaques -->
	  <!-- dados do cliente -->
	  <br/>
	  <fieldset>
	  <legend>Proprietário </legend>
	  <label for="tipo">Cliente:</label>
		<?php
			$ops='';
			$pdo = new PDO('mysql:host=localhost;dbname=db_blog', 'root', '');
			$stmt = $pdo->query("SELECT idcliven,nome FROM clientevendedor");
		//$stmt = $pdo->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$ops.= "<option value='" . $row['idcliven'] . "'>" . $row['nome'] . "</option>";
			}
		?>
			<!--later on-->
		<select name="fileselect" class="form-control" name="cliven" value="<?=$cliente->idcliven?>">
			<?php echo $ops;?>	
		</select>
	  
	   </fieldset>
	  <!-- FIM DADOS DO PROPRIETARIO -->
	  
	  <br/>
	  <legend>Dados do Imóvel </legend>
	 <div class="form-group">
	  <label for="tipo">Tipo do Imóvel:</label>
				<select name="tipoimo" class="form-control" id="tipoimo1">
                    <option value="<?=$cliente->tipo?>">--</option>
                    <option value="Padrão">Casa</option>
					<option value="Cobertura">Apartamento</option>
					<option value="Kitnet">Terreno</option>
					<option value="Loft/Studio">Rural</option>
					<option value="empreendimento">Comercial</option>
                </select>
	  </div>
	  <div class="form-group">
	  <label for="tipo">Sub-Tipo:</label>
				<select name="subtipo" class="form-control" id="subtipo1">
                    <option value="<?=$cliente->subtipo?>">--</option>
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
		<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?=$cliente->lougradouro?>">
	</div>
	  
	<div class="form-group">
		<label for="dados">Número:</label>
		<input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="<?=$cliente->numero?>">
	</div> 
	<div class="form-group">
		<label for="dados">Bairro:</label>
		<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?=$cliente->bairro?>">
	</div> 
	  
				<div class="form-group">
					<label for="tipo">Cidade:</label>
						<select name="cidade" class="form-control" id="cidade">
				              <option value = 'Aceguá'>Aceguá</option>;
							  <option value = 'Água Santa'>Água Santa</option>;
							  <option value = 'Agudo'>Agudo</option>;
							  <option value = 'Ajuricaba'>Ajuricaba</option>; 
							  <option value = 'Alecrim'>Alecrim</option>;
							  <option value = 'Alegrete'>Alegrete</option>;
							  <option value = 'Agudo'>Agudo</option>;
							  <option value = 'Alegria'>Alegria</option>;
							  <option value = 'Almirante Tamandaré do Sul'>Almirante Tamandaré do Sul</option>;
							  <option value = 'Alpestre'>Alpestre</option>;
							  <option value = 'Alto Alegre'>Alto Alegre</option>;
							  <option value = 'Alto Feliz'>Alto Feliz</option>; 
							  <option value = 'Alvorada'>Alvorada</option>;
							  <option value = 'Amaral Ferrador'>Amaral Ferrador</option>;
							  <option value = 'Ametista do Sul'>Ametista do Sul</option>;
							  <option value = 'André da Rocha'>André da Rocha</option>;
				              <option value = 'Anta Gorda'>Anta Gorda</option>;
							  <option value = 'Antônio Prado'>Antônio Prado</option>;
							  <option value = 'Arambaré'>Arambaré</option>;
							  <option value = 'Araricá'>Araricá</option>; 
							  <option value = 'Aratiba'>Aratiba</option>;
							  <option value = 'Arroio do Meio'>Arroio do Meio</option>;
							  <option value = 'Arroio do Padre'>Arroio do Padre</option>;
							  <option value = 'Alegria'>Alegria</option>;
							  <option value = 'Arroio do Sal'>Arroio do Sal</option>;
							  <option value = 'Arroio do Tigre'>Arroio do Tigre</option>;
							  <option value = 'Arroio dos Ratos'>Arroio dos Ratos</option>;
							  <option value = 'Arroio Grande'>Arroio Grande</option>; 
							  <option value = 'Arvorezinha'>Arvorezinha</option>;
							  <option value = 'Bagé'>Bagé</option>;
							  <option value = 'Balneário Pinhal'>Balneário Pinhal</option>;
							  <option value = 'Barão'>Barão</option>;

				              <option value = 'Barão de Cotegipe'>Barão de Cotegipe</option>;
							  <option value = 'Barão do Triunfo'>Barão do Triunfo</option>;
							  <option value = 'Barra do Guarita'>Barra do Guarita</option>;
							  <option value = 'Barra do Quaraí'>Barra do Quaraí</option>; 
							  <option value = 'Barra do Ribeiro'>Barra do Ribeiro</option>;
							  <option value = 'Barra do Rio Azul'>Barra do Rio Azul</option>;
							  <option value = 'Barra Funda'>Barra Funda</option>;
							  <option value = 'Barracão'>Barracão</option>;
							  <option value = 'Barros Cassal'>Barros Cassal</option>;
							  <option value = 'Benjamin Constant do Sul'>Benjamin Constant do Sul</option>;

							  <option value = 'Bento Gonçalves'>Bento Gonçalves</option>;
							  <option value = 'Boa Vista das Missões'>Boa Vista das Missões</option>;
							  <option value = 'Boa Vista do Buricá'>Boa Vista do Buricá</option>;
							  <option value = 'Boa Vista do Cadeado'>Boa Vista do Cadeado</option>;
							  <option value = 'Boa Vista do Incra'>Boa Vista do Incra</option>;
							  <option value = 'Boa Vista do Sul'>Boa Vista do Sul</option>;
							  <option value = 'Bom Jesus'>Bom Jesus</option>;
							  <option value = 'Bom Princípio'>Bom Princípio</option>;
							  <option value = 'Bom Progresso'>Bom Progresso</option>;
							  <option value = 'Bom Retiro do Sul'>Bom Retiro do Sul</option>;
							  <option value = 'Boqueirão do Leão'>Boqueirão do Leão</option>;
							  <option value = 'Bossoroca'>Bossoroca</option>;
							  <option value = 'Bozano'>Bozano</option>;
							  <option value = 'Braga'>Braga</option>;
							  <option value = 'Brochier'>Brochier</option>;
							  <option value = 'Butiá'>Butiá</option>;
							  <option value = 'Caçapava do Sul'>Caçapava do Sul</option>;
							  <option value = 'Cacequi'>Cacequi</option>;							  
							  <option value = 'Cachoeira do Sul'>Cachoeira do Sul</option>;
							  <option value = 'Cachoeirinha'>Cachoeirinha</option>;
							  <option value = 'Cacique Doble'>Cacique Doble</option>;
							  <option value = 'Caibaté'>Caibaté</option>;
							  <option value = 'Caiçara'>Caiçara</option>;
							  <option value = 'Camaquã'>Camaquã</option>;
							  <option value = 'Camargo'>Camargo</option>;
							  <option value = 'Cambará do Sul'>Cambará do Sul</option>;
							  <option value = 'Campestre da Serra'>Campestre da Serra</option>;
							  <option value = 'Campina das Missões'>Campina das Missões</option>;
							  <option value = 'Campinas do Sul'>Campinas do Sul</option>;
							  <option value = 'Campo Bom'>Campo Bom</option>;
							  <option value = 'Campo Novo'>Campo Novo</option>;
							  <option value = 'Campos Borges'>Campos Borges</option>;
							  <option value = 'Candelária'>Candelária</option>;
							  <option value = 'Cândido Godói'>Cândido Godói</option>;
							  <option value = 'Candiota'>Candiota</option>;	
							  <option value = 'Canela'>Canela</option>;
							  <option value = 'Canguçu'>Canguçu</option>;
							  <option value = 'Canoas'>Canoas</option>;
							  <option value = 'Canudos do Vale'>Canudos do Vale</option>;
							  <option value = 'Capão Bonito do Sul'>Capão Bonito do Sul</option>;
							  <option value = 'Capão da Canoa'>Capão da Canoa</option>;
							  <option value = 'Capão do Cipó'>Capão do Cipó</option>;
							  <option value = 'Capão do Leão'>Capão do Leão</option>;
							  <option value = 'Capela de Santana'>Capela de Santana</option>;
							  <option value = 'Capitão'>Capitão</option>;
							  <option value = 'Capivari do Sul'>Capivari do Sul</option>;
							  <option value = 'Caraá'>Caraá</option>;
							  <option value = 'Carazinho'>Carazinho</option>;
							  <option value = 'Carlos Barbosa'>Carlos Barbosa</option>;
							  <option value = 'Carlos Gomes'>Carlos Gomes</option>;
							  <option value = 'Casca'>Casca</option>;
							  <option value = 'Caseiros'>Caseiros</option>;
							  <option value = 'Catuípe'>Catuípe</option>;
							  <option value = 'Caxias do Sul'>Caxias do Sul</option>;
							  <option value = 'Centenário'>Centenário</option>;
							  <option value = 'Cerrito'>Cerrito</option>;
							  <option value = 'Cerro Branco'>Cerro Branco</option>;
							  <option value = 'Cerro Grande'>Cerro Grande</option>;
							  <option value = 'Cerro Grande do Sul'>Cerro Grande do Sul</option>;
							  <option value = 'Cerro Largo'>Cerro Largo</option>;
							  <option value = 'Chapada'>Chapada</option>;
							  <option value = 'Charqueadas'>Charqueadas</option>;
							  <option value = 'Charrua'>Charrua</option>;
							  <option value = 'Chiapetta'>Chiapetta</option>;
							  <option value = 'Chuí'>Chuí</option>;
							  <option value = 'Chuvisca'>Chuvisca</option>;
							  <option value = 'Cidreira'>Cidreira</option>;
							  <option value = 'Ciríaco'>Ciríaco</option>;
							  <option value = 'Colinas'>Colinas</option>;
							  <option value = 'Colorado'>Colorado</option>;
							  <option value = 'Condor'>Condor</option>;
							  <option value = 'Constantina'>Constantina</option>;
							  <option value = 'Coqueiro Baixo'>Coqueiro Baixo</option>;
							  <option value = 'Coqueiros do Sul'>Coqueiros do Sul</option>;
							  <option value = 'Coronel Barros'>Coronel Barros</option>;
	
							  <option value = 'Coronel Bicaco'>Coronel Bicaco</option>;	
							  <option value = 'Coronel Pilar'>Coronel Pilar</option>;	
							  <option value = 'Cotiporã'>Cotiporã</option>;	
							  <option value = 'Coxilha'>Coxilha</option>;	
							  <option value = 'Crissiumal'>Crissiumal</option>;	
							  <option value = 'Cristal'>Cristal</option>;	
							  <option value = 'Cristal do Sul'>Cristal do Sul</option>;	
							  <option value = 'Cruz Alta'>Cruz Alta</option>;	
							  <option value = 'Cruzaltense'>Cruzaltense</option>;	
							  <option value = 'Cruzeiro do Sul'>Cruzeiro do Sul</option>;								  
							  <option value = 'David Canabarro'>David Canabarro</option>;			
							  <option value = 'Derrubadas'>Derrubadas</option>;	
							  <option value = 'Dezesseis de Novembro'>Dezesseis de Novembro</option>;	
							  <option value = 'Dilermando de Aguiar'>Dilermando de Aguiar</option>;	
							  <option value = 'Dois Irmãos'>Dois Irmãos</option>;	
							  <option value = 'Dois Irmãos das Missões'>Dois Irmãos das Missões</option>;	
							  <option value = 'Dois Lajeados'>Dois Lajeados</option>;	
							  <option value = 'Dom Feliciano'>Dom Feliciano</option>;	
							  <option value = 'Dom Pedrito'>Dom Pedrito</option>;	
							  <option value = 'Dom Pedro de Alcântara'>Dom Pedro de Alcântara</option>;	
							  <option value = 'Dona Francisca'>Dona Francisca</option>;	
							  <option value = 'Doutor Maurício Cardoso'>Doutor Maurício Cardoso</option>;	
							  <option value = 'Doutor Ricardo'>Doutor Ricardo</option>;	
							  <option value = 'Eldorado do Sul'>Eldorado do Sul</option>;	
							  <option value = 'Encantado'>Encantado</option>;							  
							  <option value = 'Encruzilhada do Sul'>Encruzilhada do Sul</option>;	
							  <option value = 'Engenho Velho'>Engenho Velho</option>;	
							  <option value = 'Entre Rios do Sul'>Entre Rios do Sul</option>;	
							  <option value = 'Entre-Ijuís'>Entre-Ijuís</option>;	
							  <option value = 'Erebango'>Erebango</option>;	
							  <option value = 'Erechim'>Erechim</option>;	
							  <option value = 'Ernestina'>Ernestina</option>;	
							  <option value = 'Erval Grande'>Erval Grande</option>;	
							  <option value = 'Erval Seco'>Erval Seco</option>;	
							  <option value = 'Esmeralda'>Esmeralda</option>;	
							  <option value = 'Esperança do Sul'>Esperança do Sul</option>;	
							  <option value = 'Espumoso'>Espumoso</option>;	
							  <option value = 'Estação'>Estação</option>;	
							  <option value = 'Estância Velha'>Estância Velha</option>;			
							  <option value = 'Esteio'>Esteio</option>;	
							  <option value = 'Estrela'>Estrela</option>;	
							  <option value = 'Estrela Velha'>Estrela Velha</option>;	
							  <option value = 'Eugênio de Castro'>Eugênio de Castro</option>;	
							  <option value = 'Fagundes Varela'>Fagundes Varela</option>;	
							  <option value = 'Farroupilha'>Farroupilha</option>;	
							  <option value = 'Faxinal do Soturno'>Faxinal do Soturno</option>;	
							  <option value = 'Faxinalzinho'>Faxinalzinho</option>;	
							  <option value = 'Fazenda Vilanova'>Fazenda Vilanova</option>;	
							  <option value = 'Feliz'>Feliz</option>;	
							  <option value = 'Flores da Cunha'>Flores da Cunha</option>;	
							  <option value = 'Floriano Peixoto'>Floriano Peixoto</option>;	
							  <option value = 'Fontoura Xavier'>Fontoura Xavier</option>;	
							  <option value = 'Formigueiro'>Formigueiro</option>;	
							  <option value = 'Forquetinha'>Forquetinha</option>;	
							  <option value = 'Fortaleza dos Valos'>Fortaleza dos Valos</option>;								  
							  <option value = 'Frederico Westphalen'>Frederico Westphalen</option>;
							  <option value = 'Garibaldi'>Garibaldi</option>;
							  <option value = 'Garruchos'>Garruchos</option>;
							  <option value = 'Gaurama'>Gaurama</option>;
							  <option value = 'General Câmara'>General Câmara</option>;
							  <option value = 'Gentil'>Gentil</option>;
							  <option value = 'Getúlio Vargas'>Getúlio Vargas</option>;
							  <option value = 'Giruá'>Giruá</option>;
							  <option value = 'Glorinha'>Glorinha</option>;
							  <option value = 'Gramado'>Gramado</option>;
							  <option value = 'Gramado dos Loureiros'>Gramado dos Loureiros</option>;
							  <option value = 'Gramado Xavier'>Gramado Xavier</option>;
							  <option value = 'Gravataí'>Gravataí</option>;
							  <option value = 'Guabiju'>Guabiju</option>;							  
							  <option value = 'Guaíba'>Guaíba</option>;
							  <option value = 'Guaporé'>Guaporé</option>;
							  <option value = 'Guarani das Missões'>Guarani das Missões</option>;
							  <option value = 'Harmonia'>Harmonia</option>;
							  <option value = 'Herval'>Herval</option>;
							  <option value = 'Herveiras'>Herveiras</option>;
							  <option value = 'Horizontina'>Horizontina</option>;
							  <option value = 'Hulha Negra'>Hulha Negra</option>;
							  <option value = 'Ibarama'>Ibarama</option>;
							  <option value = 'Ibiaçá'>Ibiaçá</option>;
							  <option value = 'Ibiraiaras'>Ibiraiaras</option>;
							  <option value = 'Ibirapuitã'>Ibirapuitã</option>;
							  <option value = 'Ibirubá'>Ibirubá</option>;
							  <option value = 'Igrejinha'>Igrejinha</option>;
							  <option value = 'Ijuí'>Ijuí</option>;
							  <option value = 'Ilópolis'>Ilópolis</option>;
							  <option value = 'Imbé'>Imbé</option>;
							  <option value = 'Imigrante'>Imigrante</option>;
							  <option value = 'Independência'>Independência</option>;
							  <option value = 'Inhacorá'>Inhacorá</option>;
							  <option value = 'Ipê'>Ipê</option>;
							  <option value = 'Ipiranga do Sul'>Ipiranga do Sul</option>;
							  <option value = 'Iraí'>Iraí</option>;
							  <option value = 'Itaara'>Itaara</option>;
							  <option value = 'Itacurubi'>Itacurubi</option>;
							  <option value = 'Itapuca'>Itapuca</option>;
							  <option value = 'Itaqui'>Itaqui</option>;
							  <option value = 'Itati'>Itati</option>;
							  <option value = 'Itatiba do Sul'>Itatiba do Sul</option>;
							  <option value = 'Ivorá'>Ivorá</option>;
							  <option value = 'Ivoti'>Ivoti</option>;
							  <option value = 'Jaboticaba'>Jaboticaba</option>;
							  <option value = 'Jacuizinho'>Jacuizinho</option>;
							  <option value = 'Jacutinga'>Jacutinga</option>;
							  <option value = 'Jaguarão'>Jaguarão</option>;
							  <option value = 'Jaguari'>Jaguari</option>;							  
							  <option value = 'Jaquirana'>Jaquirana</option>;							  
							  <option value = 'Jari'>Jari</option>;							  
							  <option value = 'Jóia'>Jóia</option>;							  
							  <option value = 'Júlio de Castilhos'>Júlio de Castilhos</option>;							  
							  <option value = 'Lagoa Bonita do Sul'>Lagoa Bonita do Sul</option>;							  
							  <option value = 'Lagoa dos Três Cantos'>Lagoa dos Três Cantos</option>;							  
							  <option value = 'Lagoa Vermelha'>Lagoa Vermelha</option>;							  
							  <option value = 'Lagoão'>Lagoão</option>;							  
							  <option value = 'Lajeado'>Lajeado</option>;							  
							  <option value = 'Lajeado do Bugre'>Lajeado do Bugre</option>;							  
							  <option value = 'Lavras do Sul'>Lavras do Sul</option>;							  
							  <option value = 'Liberato Salzano'>Liberato Salzano</option>;							  
							  <option value = 'Lindolfo Collor'>Lindolfo Collor</option>;							  
							  <option value = 'Linha Nova'>Linha Nova</option>;							  
							  <option value = 'Maçambará'>Maçambará</option>;							  
							  <option value = 'Machadinho'>Machadinho</option>;							  
							  <option value = 'Mampituba'>Mampituba</option>;							  
							  <option value = 'Manoel Viana'>Manoel Viana</option>;							  
							  <option value = 'Maquiné'>Maquiné</option>;							  							  
							  <option value = 'Maratá'>Maratá</option>;
							  <option value = 'Marau'>Marau</option>;
							  <option value = 'Marcelino Ramos'>Marcelino Ramos</option>;
							  <option value = 'Mariana Pimentel'>Mariana Pimentel</option>;
							  <option value = 'Mariano Moro'>Mariano Moro</option>;
							  <option value = 'Marques de Souza'>Marques de Souza</option>;
							  <option value = 'Mata'>Mata</option>;
							  <option value = 'Mato Castelhano'>Mato Castelhano</option>;
							  <option value = 'Mato Leitão'>Mato Leitão</option>;
							  <option value = 'Mato Queimado'>Mato Queimado</option>;
							  <option value = 'Maximiliano de Almeida'>Maximiliano de Almeida</option>;
							  <option value = 'Minas do Leão'>Minas do Leão</option>;
							  <option value = 'Miraguaí'>Miraguaí</option>;
							  <option value = 'Montauri'>Montauri</option>;
							  <option value = 'Monte Alegre dos Campos'>Monte Alegre dos Campos</option>;
							  <option value = 'Monte Belo do Sul'>Monte Belo do Sul</option>;
							  <option value = 'Montenegro'>Montenegro</option>;
							  <option value = 'Mormaço'>Mormaço</option>;
							  <option value = 'Morrinhos do Sul'>Morrinhos do Sul</option>;
							  <option value = 'Morro Redondo'>Morro Redondo</option>;	
							  <option value = 'Morro Reuter'>Morro Reuter</option>;	
							  <option value = 'Mostardas'>Mostardas</option>;	
							  <option value = 'Muçum'>Muçum</option>;	
							  <option value = 'Muitos Capões'>Muitos Capões</option>;	
							  <option value = 'Muliterno'>Muliterno</option>;	
							  <option value = 'Não-Me-Toque'>Não-Me-Toque</option>;	
							  <option value = 'Nicolau Vergueiro'>Nicolau Vergueiro</option>;	
							  <option value = 'Nonoai'>Nonoai</option>;	
							  <option value = 'Nova Alvorada'>Nova Alvorada</option>;	
							  <option value = 'Nova Araçá'>Nova Araçá</option>;	
							  <option value = 'Nova Bassano'>Nova Bassano</option>;	
							  <option value = 'Nova Boa Vista'>Nova Boa Vista</option>;	
							  <option value = 'Nova Bréscia'>Nova Bréscia</option>;	
							  <option value = 'Nova Candelária'>Nova Candelária</option>;	
							  <option value = 'Nova Esperança do Sul'>Nova Esperança do Sul</option>;	
							  <option value = 'Nova Hartz'>Nova Hartz</option>;	
							  <option value = 'Nova Pádua'>Nova Pádua</option>;	
							  <option value = 'Nova Palma'>Nova Palma</option>;	
							  <option value = 'Nova Petrópolis'>Nova Petrópolis</option>;	

							  <option value = 'Nova Prata'>Nova Prata</option>;							  
							  <option value = 'Nova Ramada'>Nova Ramada</option>;								  
							  <option value = 'Nova Roma do Sul'>Nova Roma do Sul</option>;
							  <option value = 'Nova Santa Rita'>Nova Santa Rita</option>;
							  <option value = 'Novo Barreiro'>Novo Barreiro</option>;
							  <option value = 'Novo Cabrais'>Novo Cabrais</option>;							  
							  <option value = 'Novo Hamburgo'>Novo Hamburgo</option>;								  
							  <option value = 'Novo Machado'>Novo Machado</option>;
							  <option value = 'Novo Tiradentes'>Novo Tiradentes</option>;
							  <option value = 'Novo Xingu'>Novo Xingu</option>;
							  <option value = 'Osório'>Osório</option>;							  
							  <option value = 'Paim Filho'>Paim Filho</option>;								  
							  <option value = 'Palmares do Sul'>Palmares do Sul</option>;
							  <option value = 'Palmeira das Missões'>Palmeira das Missões</option>;
							  <option value = 'Palmitinho'>Palmitinho</option>;
							  <option value = 'Panambi'>Panambi</option>;							  
							  <option value = 'Pantano Grande'>Pantano Grande</option>;								  
							  <option value = 'Paraí'>Paraí</option>;
							  <option value = 'Paraíso do Sul'>Paraíso do Sul</option>;
							  <option value = 'Pareci Novo'>Pareci Novo</option>;
							  <option value = 'Parobé'>Parobé</option>;							  
							  <option value = 'Passa Sete'>Passa Sete</option>;								  
							  <option value = 'Passo do Sobrado'>Passo do Sobrado</option>;
							  <option value = 'Passo Fundo'>Passo Fundo</option>;
							  <option value = 'Paulo Bento'>Paulo Bento</option>;
							  <option value = 'Paverama'>Paverama</option>;							  
							  <option value = 'Pedras Altas'>Pedras Altas</option>;							  
							  <option value = 'Pedro Osório'>Pedro Osório</option>;							  
							  <option value = 'Pejuçara'>Pejuçara</option>;							  
							  <option value = 'Pelotas'>Pelotas</option>;							  
							  <option value = 'Picada Café'>Picada Café</option>;							  
							  <option value = 'Pinhal'>Pinhal</option>;							  
							  <option value = 'Pinhal da Serra'>Pinhal da Serra</option>;							  
							  <option value = 'Pinhal Grande'>Pinhal Grande</option>;							  
							  <option value = 'Pinheirinho do Vale'>Pinheirinho do Vale</option>;							  
							  <option value = 'Pinheiro Machado'>Pinheiro Machado</option>;							  
							  <option value = 'Pinto Bandeira'>Pinto Bandeira</option>;							  
							  <option value = 'Pirapó'>Pirapó</option>;							  
							  <option value = 'Piratini'>Piratini</option>;							  
							  <option value = 'Planalto'>Planalto</option>;							  
							  <option value = 'Poço das Antas'>Poço das Antas</option>;							  
							  <option value = 'Pontão'>Pontão</option>;							  
							  <option value = 'Ponte Preta'>Ponte Preta</option>;							  
							  <option value = 'Portão'>Portão</option>;							  

							  <option value = 'Porto Alegre'>Porto Alegre</option>;							  
							  <option value = 'Porto Lucena'>Porto Lucena</option>;							  
							  <option value = 'Porto Mauá'>Porto Mauá</option>;							  
							  <option value = 'Porto Vera Cruz'>Porto Vera Cruz</option>;							  
							  <option value = 'Porto Xavier'>Porto Xavier</option>;							  
							  <option value = 'Pouso Novo'>Pouso Novo</option>;							  
							  <option value = 'Presidente Lucena'>Presidente Lucena</option>;							  
							  <option value = 'Progresso'>Progresso</option>;							  
							  <option value = 'Protásio Alves'>Protásio Alves</option>;							  
							  <option value = 'Putinga'>Putinga</option>;							  
							  <option value = 'Quaraí'>Quaraí</option>;							  
							  <option value = 'Quatro Irmãos'>Quatro Irmãos</option>;							  
							  <option value = 'Quevedos'>Quevedos</option>;							  
							  <option value = 'Quinze de Novembro'>Quinze de Novembro</option>;							  
							  <option value = 'Redentora'>Redentora</option>;							  
							  <option value = 'Relvado'>Relvado</option>;							  
							  <option value = 'Restinga Seca'>Restinga Seca</option>;							  
							  <option value = 'Rio dos Índios'>Rio dos Índios</option>;							  
							  <option value = 'Rio Grande'>Rio Grande</option>;							  
							  <option value = 'Rio Pardo'>Rio Pardo</option>;							  
							  <option value = 'Riozinho'>Riozinho</option>;							  
							  <option value = 'Roca Sales'>Roca Sales</option>;							  
							  <option value = 'Rodeio Bonito'>Rodeio Bonito</option>;							  
							  <option value = 'Rolador'>Rolador</option>;							  
							  <option value = 'Rolante'>Rolante</option>;							  
							  <option value = 'Ronda Alta'>Ronda Alta</option>;							  
							  <option value = 'Rondinha'>Rondinha</option>;							  
							  <option value = 'Roque Gonzales'>Roque Gonzales</option>;							  
							  <option value = 'Rosário do Sul'>Rosário do Sul</option>;							  
							  <option value = 'Sagrada Família'>Sagrada Família</option>;							  
							  <option value = 'Saldanha Marinho'>Saldanha Marinho</option>;							  
							  <option value = 'Salto do Jacuí'>Salto do Jacuí</option>;							  
							  <option value = 'Salvador das Missões'>Salvador das Missões</option>;							  
							  <option value = 'Salvador do Sul'>Salvador do Sul</option>;							  
							  <option value = 'Sananduva'>Sananduva</option>;							  
							  <option value = 'Sant'Ana do Livramento'>Sant'Ana do Livramento</option>;							  
							  <option value = 'Santa Bárbara do Sul'>Santa Bárbara do Sul</option>;							  
							  <option value = 'Santa Cecília do Sul'>Santa Cecília do Sul</option>;							  
							  <option value = 'Santa Clara do Sul'>Santa Clara do Sul</option>;							  
							  <option value = 'Santa Cruz do Sul'>Santa Cruz do Sul</option>;							  
							  <option value = 'Santa Margarida do Sul'>Santa Margarida do Sul</option>;							  
							  <option value = 'Santa Maria'>Santa Maria</option>;							  
							  <option value = 'Santa Maria do Herval'>Santa Maria do Herval</option>;							  
							  <option value = 'Santa Rosa'>Santa Rosa</option>;							  
							  <option value = 'Santa Tereza'>Santa Tereza</option>;							  
							  <option value = 'Santa Vitória do Palmar'>Santa Vitória do Palmar</option>;							  
							  <option value = 'Santana da Boa Vista'>Santana da Boa Vista</option>;							  
							  <option value = 'Santiago'>Santiago</option>;							  
							  <option value = 'Santo Ângelo'>Santo Ângelo</option>;							  
							  <option value = 'Santo Antônio da Patrulha'>Santo Antônio da Patrulha</option>;							  
							  <option value = 'Santo Antônio das Missões'>Santo Antônio das Missões</option>;							  
							  <option value = 'Santo Antônio do Palma'>Santo Antônio do Palma</option>;							  
							  <option value = 'Santo Antônio do Planalto'>Santo Antônio do Planalto</option>;							  
							  <option value = 'Santo Augusto'>Santo Augusto</option>;							  
							  <option value = 'Santo Cristo'>Santo Cristo</option>;							  
							  <option value = 'Santo Expedito do Sul'>Santo Expedito do Sul</option>;							  
							  <option value = 'São Borja'>São Borja</option>;							  
							  <option value = 'São Domingos do Sul'>São Domingos do Sul</option>;							  
							  <option value = 'São Francisco de Assis'>São Francisco de Assis</option>;							  
							  <option value = 'São Francisco de Paula'>São Francisco de Paula</option>;							  
							  <option value = 'São Gabriel'>São Gabriel</option>;							  
							  <option value = 'São Jerônimo'>São Jerônimo</option>;							  
							  <option value = 'São João da Urtiga'>São João da Urtiga</option>;							  
							  <option value = 'São João do Polêsine'>São João do Polêsine</option>;							  
							  <option value = 'São Jorge'>São Jorge</option>;							  
							  <option value = 'São José das Missões'>São José das Missões</option>;							  
							  <option value = 'São José do Herval'>São José do Herval</option>;							  
							  <option value = 'São José do Hortêncio'>São José do Hortêncio</option>;							  
							  <option value = 'São José do Inhacorá'>São José do Inhacorá</option>;							  
							  <option value = 'São José do Norte'>São José do Norte</option>;							  
							  <option value = 'São José do Ouro'>São José do Ouro</option>;							  
							  <option value = 'São José do Sul'>São José do Sul</option>;							  
							  <option value = 'São José dos Ausentes'>São José dos Ausentes</option>;							  
							  <option value = 'São Leopoldo'>São Leopoldo</option>;							  
							  <option value = 'São Lourenço do Sul'>São Lourenço do Sul</option>;							  
							  <option value = 'São Luiz Gonzaga'>São Luiz Gonzaga</option>;							  
							  <option value = 'São Marcos'>São Marcos</option>;							  
							  <option value = 'São Martinho'>São Martinho</option>;							  
							  <option value = 'São Martinho da Serra'>São Martinho da Serra</option>;							  
							  <option value = 'São Miguel das Missões'>São Miguel das Missões</option>;							  
							  <option value = 'São Nicolau'>São Nicolau</option>;							  
							  <option value = 'São Paulo das Missões'>São Paulo das Missões</option>;							  
							  <option value = 'São Pedro da Serra'>São Pedro da Serra</option>;							  
							  <option value = 'São Pedro das Missões'>São Pedro das Missões</option>;							  
							  <option value = 'São Pedro do Butiá'>São Pedro do Butiá</option>;							  
							  <option value = 'São Pedro do Sul'>São Pedro do Sul</option>;							  
							  <option value = 'São Sebastião do Caí'>São Sebastião do Caí</option>;							  
							  <option value = 'São Sepé'>São Sepé</option>;							  
							  <option value = 'São Valentim'>São Valentim</option>;							  
							  <option value = 'São Valentim do Sul'>São Valentim do Sul</option>;							  
							  <option value = 'São Valério do Sul'>São Valério do Sul</option>;							  
							  <option value = 'São Vendelino'>São Vendelino</option>;	
							  <option value = 'São Vicente do Sul'>São Vicente do Sul</option>;
							  <option value = 'Sapiranga'>Sapiranga</option>;
							  <option value = 'Sapucaia do Sul'>Sapucaia do Sul</option>;							  
							  <option value = 'Sarandi'>Sarandi</option>;							  
							  <option value = 'Seberi'>Seberi</option>;							  
							  <option value = 'Sede Nova'>Sede Nova</option>;							  
							  <option value = 'Segredo'>Segredo</option>;							  
							  <option value = 'Selbach'>Selbach</option>;							  
							  <option value = 'Senador Salgado Filho'>Senador Salgado Filho</option>;							  
							  <option value = 'Sentinela do Sul'>Sentinela do Sul</option>;							  
							  <option value = 'Serafina Corrêa'>Serafina Corrêa</option>;							  
							  <option value = 'Sério'>Sério</option>;							  
							  <option value = 'Sertão'>Sertão</option>;							  
							  <option value = 'Sertão Santana'>Sertão Santana</option>;							  
							  <option value = 'Sete de Setembro'>Sete de Setembro</option>;							  
							  <option value = 'Severiano de Almeida'>Severiano de Almeida</option>;							  
							  <option value = 'Silveira Martins'>Silveira Martins</option>;							  
							  <option value = 'Sinimbu'>Sinimbu</option>;							  
							  <option value = 'Sobradinho'>Sobradinho</option>;							  
							  <option value = 'Soledade'>Soledade</option>;							  
							  <option value = 'Tabaí'>Tabaí</option>;							  
							  <option value = 'Tapejara'>Tapejara</option>;							  
							  <option value = 'Tapera'>Tapera</option>;							  
							  <option value = 'Tapes'>Tapes</option>;							  
							  <option value = 'Taquara'>Taquara</option>;							  
							  <option value = 'Taquari'>Taquari</option>;							  
							  <option value = 'Taquaruçu do Sul'>Taquaruçu do Sul</option>;							  
							  <option value = 'Tavares'>Tavares</option>;							  
							  <option value = 'Tenente Portela'>Tenente Portela</option>;							  
							  <option value = 'Terra de Areia'>Terra de Areia</option>;							  
							  <option value = 'Teutônia'>Teutônia</option>;							  
							  <option value = 'Tio Hugo'>Tio Hugo</option>;							  
							  <option value = 'Tiradentes do Sul'>Tiradentes do Sul</option>;							  
							  <option value = 'Toropi'>Toropi</option>;							  
							  <option value = 'Torres'>Torres</option>;							  
							  <option value = 'Tramandaí'>Tramandaí</option>;							  
							  <option value = 'Travesseiro'>Travesseiro</option>;							  
							  <option value = 'Três Arroios'>Três Arroios</option>;							  
							  <option value = 'Três Cachoeiras'>Três Cachoeiras</option>;							  
							  <option value = 'Três Coroas'>Três Coroas</option>;							  
							  <option value = 'Três de Maio'>Três de Maio</option>;							  
							  <option value = 'Três Forquilhas'>Três Forquilhas</option>;							  
							  <option value = 'Três Palmeiras'>Três Palmeiras</option>;							  
							  <option value = 'Três Passos'>Três Passos</option>;							  
							  <option value = 'Trindade do Sul'>Trindade do Sul</option>;							  
							  <option value = 'Triunfo'>Triunfo</option>;							  
							  <option value = 'Tucunduva'>Tucunduva</option>;							  
							  <option value = 'Tunas'>Tunas</option>;							  
							  <option value = 'Tupanci do Sul'>Tupanci do Sul</option>;							  
							  <option value = 'Tupanciretã'>Tupanciretã</option>;							  
							  <option value = 'Tupandi'>Tupandi</option>;							  
							  <option value = 'Tuparendi'>Tuparendi</option>;							  
							  <option value = 'Turuçu'>Turuçu</option>;							  
							  <option value = 'Ubiretama'>Ubiretama</option>;							  
							  <option value = 'União da Serra'>União da Serra</option>;							  
							  <option value = 'Unistalda'>Unistalda</option>;							  
							  <option value = 'Uruguaiana'>Uruguaiana</option>;							  
							  <option value = 'Vacaria'>Vacaria</option>;							  
							  <option value = 'Vale do Sol'>Vale do Sol</option>;							  
							  <option value = 'Vale Real'>Vale Real</option>;							  
							  <option value = 'Vale Verde'>Vale Verde</option>;							  
							  <option value = 'Vanini'>Vanini</option>;							  
							  <option value = 'Venâncio Aires'>Venâncio Aires</option>;							  
							  <option value = 'Vera Cruz'>Vera Cruz</option>;							  
							  <option value = 'Veranópolis'>Veranópolis</option>;							  
							  <option value = 'Vespasiano Correa'>Vespasiano Correa</option>;							  
							  <option value = 'Viadutos'>Viadutos</option>;							  
							  <option value = 'Viamão'>Viamão</option>;							  
							  <option value = 'Vicente Dutra'>Vicente Dutra</option>;							  
							  <option value = 'Victor Graeff'>Victor Graeff</option>;							  
							  <option value = 'Vila Flores'>Vila Flores</option>;							  
							  <option value = 'Vila Lângaro'>Vila Lângaro</option>;							  
							  <option value = 'Vila Maria'>Vila Maria</option>;							  
							  <option value = 'Vila Nova do Sul'>Vila Nova do Sul</option>;							  
							  <option value = 'Vista Alegre'>Vista Alegre</option>;							  
							  <option value = 'Vista Alegre do Prata'>Vista Alegre do Prata</option>;							  
							  <option value = 'Vista Gaúcha'>Vista Gaúcha</option>;							  
							  <option value = 'Vitória das Missões'>Vitória das Missões</option>;							  
							  <option value = 'Westfália'>Westfália</option>;							  
							  <option value = 'Xangri-lá'>Xangri-lá</option>;							  
							  		  
						</select>
				</div>
    <div class="form-group">
		<label for="dados">CEP:</label>
		<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?=$cliente->cep?>">
	</div> 
	<div class="form-group">
		<label for="dados">Estado:</label>
		<input type="text" class="form-control" id="estado" name="estado" placeholder="estado" value="<?=$cliente->estado?>">
	</div> 
    <div class="form-group">
		<label for="dados">Bloco/Apto:</label>
		<input type="text" class="form-control" id="bloco" name="bloco" placeholder="Bloco/Apto" value="<?=$cliente->bloco?>">
	</div>	
	<fieldset>
	  <legend>Dados do Empreendimento </legend>
	  
	  <div class="form-group">
	     <label for="dataani">É um Empreendimento?</label>
		 <input type="radio"  id="empreendimento" name="emp" value="1" />Sim
		 <input type="radio" name="emp" value="0" checked/>Não
	  </div>
	   <div class="form-group">
		<label for="dados">Nome do Empreendimento:</label>
		<input type="text" class="form-control" id="empreendimento1" name="empreendimento" placeholder="Nome do Empreendimento" value="<?=$cliente->nomeempreendimento?>">
	</div>
	 <div class="form-group">
		<label for="dados">Nº Prédios:</label>
		<input type="text" class="form-control" id="numpredios" name="numpredios" placeholder="Nº de Prédios" value="<?=$cliente->numpredios?>">
	</div> 
	 <div class="form-group">
		<label for="dados">Nº Unidades:</label>
		<input type="text" class="form-control" id="numunidades" name="numunidades" placeholder="Nº de Unidades" value="<?=$cliente->numunidades?>">
	</div> 
	 <div class="form-group">
		<label for="dados">Nº Andares:</label>
		<input type="text" class="form-control" id="numandares" name="numandares" placeholder="Nº de andares" value="<?=$cliente->numandares?>">
	</div> 
	 <div class="form-group">
		<label for="dados">Aptos/Andar:</label>
		<input type="text" class="form-control" id="aptosporandar" name="aptosporandar" placeholder="Nº Aptos/Andar" value="<?=$cliente->aptosporandar?>">
	</div> 
	<div class="form-group">
	<label for="embutido">Espera Split?</label>
		<select name="split" class="form-control" id="split1">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	<div class="form-group">
	<label for="embutido">Sacada?</label>
		<select name="sacada" class="form-control" id="sacada1">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  <div class="form-group">
	<label for="embutido">Quadra Poliesportiva?</label>
		<select name="quadra" class="form-control" id="quadra">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	</fieldset>
	
	<fieldset>
		<legend>Detalhes do Imóvel </legend>	  
	  <div class="form-group">
		<label for="dormitorio">Nº de Dormitórios:</label>
		<input type="text" class="form-control" id="dormitorio" name="dormitorio" placeholder="3 dorm" value="<?=$cliente->numdormimo?>">
	</div>
	  
	  <div class="form-group">
		<label for="areautil">Área útil: </label>
		<input type="text" class="form-control" id="areautil" name="areautil" placeholder="? m²" value="<?=$cliente->areaimo?>">
	</div>
	
	<div class="form-group">
		<label for="ar">Terreno - Medidas:</label>
		<input type="text" class="form-control" id="medidas" name="medidas" placeholder="? m x ? m" value="<?=$cliente->medidasimo?>">
	</div>
	<div class="form-group">
		<label for="vagas">Vagas:</label>
		<input type="number" class="form-control" min ="0" max="8" id="vagas" name="vagas" placeholder="vagas" value="<?=$cliente->vagasimo?>">
	</div>
	
	<div class="form-group">
		<label for="condominio">Valor do Condomínio: </label>
		<input type="text" class="form-control" id="condominio" name="valcondominio" placeholder="R$" value="<?=$cliente->valorcondominioimo?>">
	</div>
	
	<div class="form-group">
		<label for="iptu">Valor do IPTU: </label>
		<input type="number" class="form-control" id="iptu" name="iptu" placeholder="R$" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" value="<?=$cliente->valoriptuimo?>">
	</div>
	
	
	<div class="form-group">
		<label for="piso">Piso:</label>
		<input type="text" class="form-control" id="piso" name="piso" placeholder="Madeira; Laminado; Ceramica; Porcelanato;" value="<?=$cliente->piso?>">
	</div>
	
	<div class="form-group">
		<label for="teto">Teto:</label>
		<input type="text" class="form-control" id="teto" name="teto" placeholder="Madeira; PVC; Chapa; Gesso;" value="<?=$cliente->tetoimo?>">
	</div>
	
	<div class="form-group">
		<label for="paredes">Paredes:</label>
		<input type="text" class="form-control" id="parede" name="parede" placeholder="Reboco; Massa Corrida; Textura; Ceramica; Revestida" value="<?=$cliente->paredesimo?>">
	</div>
	<div class="form-group">
		  
	 
	
	 <div class="form-group">
	<label for="Hidraulica">Hidraulica:</label>
		<select name="hidraulica" class="form-control" id="hidraulica">
            <option value="">--</option>
            <option value="Água Quente">Água Quente</option>
			<option value="Água Fria">Água Fria</option>
		
                </select>
	  </div>
	
	<div class="form-group">
		<label for="ar">Ar condicionado:</label>
		<input type="text" class="form-control" id="ar" name="ar" placeholder="Dois ar Split e um ar janela" value="<?=$cliente->arcondicionadoimo?>">
	</div>
	
	<div class="form-group">
	<label for="embutido">Armários Embutidos:</label>
		<select name="embutido" class="form-control" id="embutido">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	
	<div class="form-group">
	<label for="festa">Salão de Festas:</label>
		<select name="festa" class="form-control" id="festa">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="churrasqueira">Churrasqueira:</label>
		<select name="churras" class="form-control" id="churrasqueira">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="portaria">Portaria 24h:</label>
		<select name="portaria" class="form-control" id="portaria">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="servico">Área de serviço:</label>
		<select name="servico" class="form-control" id="servico">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="piscina">Piscina:</label>
		<select name="piscina" class="form-control" id="piscina">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="academia">Academia:</label>
		<select name="academia" class="form-control" id="academia">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  <div class="form-group">
	<label for="embutido">Plano:</label>
		<select name="plano" class="form-control" id="plano">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	
	<div class="form-group">
	<label for="inclinado">Inclinado:</label>
		<select name="inclinado" class="form-control" id="inclinado">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  <div class="form-group">
	<label for="gramado">Gramado:</label>
		<select name="gramado" class="form-control" id="gramado">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  <div class="form-group">
	<label for="calcado">Calçado:</label>
		<select name="calcado" class="form-control" id="calcado">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  
	  
	  
	  
	  
	  <div class="form-group">
		<div class="row">
			<label for="nome">Selecionar Foto 1</label>
		      	<div class="col-md-2">
					<a href="#" class="thumbnail">
					<img src="fotos/padrao.jpg" height="190" width="150" id="foto11">
					</a>
				</div>
				<input type="file" name="foto1" id="foto1" value="foto1" value="<?=$cliente->foto1?>">
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
				<input type="file" name="foto2" id="foto2" value="foto2" value="<?=$cliente->foto2?>" >
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
				<input type="file" name="foto3" id="foto3" value="foto3" value="<?=$cliente->foto3?>" >
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
				<input type="file" name="foto4" id="foto4" value="foto4" value="<?=$cliente->foto4?>">
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
				<input type="file" name="foto5" id="foto5" value="foto5" value="<?=$cliente->foto5?>">
		</div>
    </div>	
	  
	  <fieldset>
		<legend>Preço e Condição </legend>	
	  <div class="form-group">
		<label for="valimo">Valor para o proprietário: </label>
		<input type="text" class="form-control" id="valimo" name="valimo" placeholder="R$" value="<?=$cliente->valorimo?>">
	</div>
	 <div class="form-group">
		<label for="comissao">Comissão</label>
		<input type="text" class="form-control" id="comissao" name="comissao" placeholder="%" value="<?=$cliente->comissaoimo?>">
	</div>
	   <div class="form-group">
		<label for="valvenda">Valor de venda: </label>
		<input type="text" class="form-control" id="valvenda" name="valvenda" placeholder="R$" value="<?=$cliente->valorvendaimo?>">
	</div>
	
	<div class="form-group">
		<label for="dataani">MCMV?</label>
		<input type="radio"  id="MCMV1" name="MCMV" value="Sim" />Sim
		<input type="radio" name="MCMV" value="Não" checked />Não
	</div>
	
	<div class="form-group">
		<label for="comment">Facilidades de Negociação:</label>
		    <textarea class="form-control ckeditor" rows="5" name="observacao1" placeholder="Observações sobre o apartamento" value="<?=$cliente->observacao1?>"></textarea>
    </div>		
	<div class="form-group">
	    <label for="comment">Observações:</label>
			 <textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Observações sobre o apartamento" value="<?=$cliente->observacao2?>"></textarea>
    </div>
	</fieldset>			
					
					
					
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$cliente->idimo?>">
				 
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='index.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>