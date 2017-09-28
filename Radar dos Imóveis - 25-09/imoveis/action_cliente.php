<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro - Imóveis</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
 
        //dados gerais
     	$idimo    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$idusu  = (isset($_POST['nomeusu'])) ? $_POST['nomeusu'] : '';
		$datacadimo = (isset($_POST['datacad'])) ? $_POST['datacad'] : '';
		$destaque = (isset($_POST['destaque'])) ? $_POST['destaque'] : '';	
		$ativo   = (isset($_POST['ativo'])) ? $_POST['ativo'] : '';
		$captador = 3;
		
		//proprietario
		$idcliven = (isset($_POST['cliven'])) ? $_POST['cliven'] : '';
		
		//dados do imovel
		$tipo =  (isset($_POST['tipoimo'])) ? $_POST['tipoimo'] : '';
		$subtipo = (isset($_POST['subtipo'])) ? $_POST['subtipo'] : ''; 
		$logradouro   = (isset($_POST['logradouro'])) ? $_POST['logradouro'] : '';
		$numero   = (isset($_POST['numero'])) ? $_POST['numero'] : '';
		$bairro   = (isset($_POST['bairro'])) ? $_POST['bairro'] : '';
		$cidade   = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
		$cep   = (isset($_POST['cep'])) ? $_POST['cep'] : '';
		$estado   = (isset($_POST['estado'])) ? $_POST['estado'] : '';
		$bloco   = (isset($_POST['bloco'])) ? $_POST['bloco'] : '';
	
	    //dados do empreendimento`
				
		$emp = (isset($_POST['emp'])) ? $_POST['emp'] : '';
		$nomeempreendimento  = (isset($_POST['nomeempreendimento'])) ? $_POST['nomeempreendimento'] : '';
        $numpredios = (isset($_POST['numpredios'])) ? $_POST['numpredios'] : '';
		$numunidades = (isset($_POST['numunidades'])) ? $_POST['numunidades'] : '';
		$numandares = (isset($_POST['numandares'])) ? $_POST['numandares'] : '';
		$numlotes = (isset($_POST['numlotes'])) ? $_POST['numlotes'] : '';
		$aptosporandar =(isset($_POST['aptosporandar'])) ? $_POST['aptosporandar'] : '';
		$split = (isset($_POST['split'])) ? $_POST['split'] : '';
		$sacada = (isset($_POST['sacada'])) ? $_POST['sacada'] : '';
		$quadra = (isset($_POST['quadra'])) ? $_POST['quadra'] : '';
		
		
		// detalhes do imovel
		$numdormimo = (isset($_POST['dormitorio'])) ? $_POST['dormitorio'] : '';
		$areautil = (isset($_POST['areautil'])) ? $_POST['areautil'] : '';
		$vagasimo = (isset($_POST['vagas'])) ? $_POST['vagas'] : '';
		$valorcondominioimo = (isset($_POST['valcondominio'])) ? $_POST['valcondominio'] : '';
		$valoriptuimo = (isset($_POST['iptu'])) ? $_POST['iptu'] : '';
		$piso = (isset($_POST['piso'])) ? $_POST['piso'] : '';
		$tetoimo = (isset($_POST['teto'])) ? $_POST['teto'] : '';
		$paredesimo = (isset($_POST['parede'])) ? $_POST['parede'] : '';
		$hidraulicaimo = (isset($_POST['hidraulica'])) ? $_POST['hidraulica'] : '';
		$arcondicionadoimo = (isset($_POST['ar'])) ? $_POST['ar'] : '';
		$armariosimo = (isset($_POST['embutido'])) ? $_POST['embutido'] : '';
		$salaofestaimo = (isset($_POST['festa'])) ? $_POST['festa'] : '';
		$churrasqueiraimo = (isset($_POST['churras'])) ? $_POST['churras'] : '';
		$portariaimo = (isset($_POST['portaria'])) ? $_POST['portaria'] : '';
		$areaservicoimo = (isset($_POST['servico'])) ? $_POST['servico'] : '';
		$piscinaimo = (isset($_POST['piscina'])) ? $_POST['piscina'] : '';
		$academiaimo = (isset($_POST['academia'])) ? $_POST['academia'] : '';
		$plano = (isset($_POST['plano'])) ? $_POST['plano'] : '';
		$inclinado = (isset($_POST['inclinado'])) ? $_POST['inclinado'] : '';
		$gramado = (isset($_POST['gramado'])) ? $_POST['gramado'] : '';
		$calcado = (isset($_POST['calcado'])) ? $_POST['calcado'] : '';
		$medidas = (isset($_POST['medidas'])) ? $_POST['medidas'] : '';
		$foto1 = (isset($_POST['foto1'])) ? $_POST['foto1'] : '';
		$foto2 = (isset($_POST['foto2'])) ? $_POST['foto2'] : '';
		$foto3 = (isset($_POST['foto3'])) ? $_POST['foto3'] : '';
		$foto4 = (isset($_POST['foto4'])) ? $_POST['foto4'] : '';
		$foto5 = (isset($_POST['foto5'])) ? $_POST['foto5'] : '';
		echo $foto1."br>";
		echo $foto2."br>";
		echo $foto3."br>";
		echo $foto4."br>";
		echo $foto5."br>";
		
		//preço e condição
		
		$valorimo = (isset($_POST['valimo'])) ? $_POST['valimo'] : '';
		$comissaoimo = (isset($_POST['comissao'])) ? $_POST['comissao'] : '';
		$valorvendaimo = (isset($_POST['valvenda'])) ? $_POST['valvenda'] : '';
		$mcmv = (isset($_POST['MCMV'])) ? $_POST['MCMV'] : '';
		$obs1 = (isset($_POST['observacao'])) ? $_POST['observacao'] : '';
		$obs2 = (isset($_POST['observacao1'])) ? $_POST['observacao1'] : '';
		
		
		
		//fim formulario
		$mensagem = '';
		
		
		if ($acao == 'editar' && $idimo == ''):
		    $mensagem .= '<li>ID do registro desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
		 
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;


			


			

			
   
			
			if ($logradouro == ''):
			   $mensagem .= '<li>Favor preencher o logradouro.</li>';
			endif;
			if ($numero == ''):
			   $mensagem .= '<li>Favor preencher o número.</li>';
			endif;
			if ($cep == ''):
			   $mensagem .= '<li>Favor preencher o cep.</li>';
			endif;
			if ($cidade == ''):
			   $mensagem .= '<li>Favor preencher o cidade.</li>';
			endif;
			if ($bairro == ''):
			   $mensagem .= '<li>Favor preencher o bairro.</li>';
			endif;
		
		
			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

			// Constrói a data no formato ANSI yyyy/mm/dd
			
		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			
			$sql = 'INSERT INTO imovel (idimo, idusu, ativo, datacadimo, idcliven, tipoimo, tipo, lougradouro, numero, bloco,
			bairro, cidade, cep, estado, numdormimo, areaimo, vagasimo, valorcondominioimo, valoriptuimo, piso, tetoimo,
			paredesimo, hidraulicaimo, arcondicionadoimo, armariosimo, salaofestaimo, churrasqueiraimo, portariaimo,
			areaservicoimo, piscinaimo, academiaimo, valorimo, planoimo, inclinadoimo, gramadoimo, calcadoimo, comissaoimo,
			valorvendaimo, observacao1, observacao2, medidasimo,  foto1, foto2, foto3, foto4, foto5, destaqueimo, 
			empreendimento, nomeempreendimento, numunidades, numandares, numpredios, aptosporandar, numlotes, esperasplit, 
			sacada, quadraesporte, mcmv, idcap) VALUES (null, :idusu, :ativo , :datacad, :idcliven, :tipo, :subtipo, :logradouro,
			:numero, :bloco, :bairro, :cidade, :cep, :estado, :numdormimo, :areautil, :vagasimo, :valorcondominioimo, 
			:valoriptuimo, :piso, :tetoimo, :paredesimo, :hidraulicaimo, :arcondicionadoimo, :armariosimo, :salaofestaimo,
			:churrasqueiraimo, :portariaimo, :areaservicoimo, :piscinaimo, :academiaimo, :valorimo, :plano, :inclinado,
			:gramado, :calcado, :comissaoimo, :valorvendaimo, :obs1, :obs2, :medidas,  :foto1,:foto2, :foto3, :foto4, 
			:foto5, :destaque, :emp, :nomeempreendimento, :numunidades, :numandares, :numpredios, :aptosporandar, 
			:numlotes, :esperasplit,:sacada, :quadra, :mcmv, :idcap);';

			$stm = $conexao->prepare($sql);
			//dados gerais
			$stm->bindValue(':idusu', $idusu);
			$stm->bindValue(':datacad', $datacadimo);
			$stm->bindValue(':destaque', $destaque);
			$stm->bindValue(':ativo', $ativo );
			
			//proprietario
			$stm->bindValue(':idcliven', $idcliven);
			
			//dados do imovel
			$stm->bindValue(':tipo', $tipo);
			$stm->bindValue(':subtipo', $subtipo);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':estado', $estado);
			$stm->bindValue(':bloco', $bloco);
			
			//dados do empreendimento
			$stm->bindValue(':emp', $emp);
			$stm->bindValue(':nomeempreendimento', $nomeempreendimento);
			$stm->bindValue(':numpredios', $numpredios);
			$stm->bindValue(':numunidades', $numunidades);
			$stm->bindValue(':numandares', $numandares);
			$stm->bindValue(':numlotes', $numlotes);
			$stm->bindValue(':aptosporandar', $aptosporandar);
			$stm->bindValue(':esperasplit', $split);
			$stm->bindValue(':sacada', $sacada);
			$stm->bindValue(':quadra', $quadra);
			
			//detalhes imovel
			$stm->bindValue(':numdormimo', $numdormimo);
			$stm->bindValue(':areautil', $areautil);
			$stm->bindValue(':medidas', $medidas);
			$stm->bindValue(':vagasimo', $vagasimo);
			$stm->bindValue(':valorcondominioimo', $valorcondominioimo);
			$stm->bindValue(':valoriptuimo', $valoriptuimo);
			$stm->bindValue(':piso', $piso);
			$stm->bindValue(':tetoimo', $tetoimo);
			$stm->bindValue(':paredesimo', $paredesimo);
			$stm->bindValue(':hidraulicaimo', $hidraulicaimo);
		    $stm->bindValue(':arcondicionadoimo', $arcondicionadoimo);
			$stm->bindValue(':armariosimo', $armariosimo);
			$stm->bindValue(':salaofestaimo', $salaofestaimo);
			$stm->bindValue(':churrasqueiraimo', $churrasqueiraimo);
			$stm->bindValue(':portariaimo', $portariaimo);
	        $stm->bindValue(':areaservicoimo', $areaservicoimo);
			$stm->bindValue(':academiaimo', $academiaimo);
			$stm->bindValue(':piscinaimo', $piscinaimo);
			$stm->bindValue(':plano', $plano);
			$stm->bindValue(':inclinado', $inclinado);
			$stm->bindValue(':gramado', $gramado);
			$stm->bindValue(':calcado', $calcado);
			$stm->bindValue(':foto1', $foto1);
		    $stm->bindValue(':foto2', $foto2);
			$stm->bindValue(':foto3', $foto3);
			$stm->bindValue(':foto4', $foto4);
			$stm->bindValue(':foto5', $foto5);
	
			//preço e condição
		
			$stm->bindValue(':valorimo', $valorimo);
			$stm->bindValue(':valorvendaimo', $valorvendaimo);
			$stm->bindValue(':comissaoimo', $comissaoimo);
			$stm->bindValue(':mcmv', $mcmv);
			$stm->bindValue(':obs1', $obs1);
			$stm->bindValue(':obs2', $obs2);
			$stm->bindValue(':idcap', $captador);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

		
																				
			$sql = 'UPDATE imovel SET idusu=:idusu, ativo = :ativo, datacadimo = :datacadimo , idcliven = :dicliven, tipoimo = :tipoimo,
			tipo = :tipo, lougradouro = :logradouro, numero = :numero, bloco = :bloco, bairro = :bairro, cidade = :cidade,
			cep = :cep, estado = :estado, numdormimo = :numdormimo, areaimo = :areaimo, vagasimo = :vagasimo, 
			valorcondominioimo = :valorcondominioimo, valoriptuimo = :valoriptuimo, piso = :piso, tetoimo = :tetoimo,
			paredesimo = :paredesimo, hidraulicaimo = :hidraulicaimo, arcondicionadoimo = :arcondicionadoimo, 
			armariosimo = :armariosimo, salaofestaimo = :salaofestaimo, churrasqueiraimo = :churrasqueiraimo, 
			portariaimo = :portariaimo,	areaservicoimo = :areaservicoimo, piscinaimo = :piscinaimo, academiaimo = :academiaimo,
			valorimo = :valorimo, planoimo = :planoimo, inclinadoimo = :inclinadoimo, gramadoimo = :gramadoimo, 
			calcadoimo = :calcadoimo, comissaoimo = :comissaoimo, valorvendaimo = :valorvendaimo, observacao1 = :observacao1,
			observacao2 = :observacao2, medidasimo = :medidasimo,  foto1 = :foto1, foto2 = :foto2, foto3 = :foto3, 
			foto4 = :foto4, foto5 = :foto5, destaqueimo = :destaqueimo,	empreendimento = :empreendimento, 
			nomeempreendimento = :nomeempreendimento, numunidades = :numunidades, numandares = :numandares, numpredios = :numpredios,
			aptosporandar = :aptosporandar, numlotes = :numlotes, esperasplit = :esperasplit, sacada = :sacada, 
			quadraesporte = :quadraesporte, mcmv = :mcmv';
			$sql .= ' WHERE idimo = :idimo';

			$stm = $conexao->prepare($sql);
			
			$stm->bindValue(':datacad', $datacadimo);
			$stm->bindValue(':destaque', $destaque);
			$stm->bindValue(':ativo', $ativo );
			
			//proprietario
			$stm->bindValue(':idcliven', $idcliven);
			
			//dados do imovel
			$stm->bindValue(':tipo', $tipo);
			$stm->bindValue(':subtipo', $subtipo);
			$stm->bindValue(':logradouro', $logradouro);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':estado', $estado);
			$stm->bindValue(':bloco', $bloco);
			
			//dados do empreendimento
			$stm->bindValue(':emp', $emp);
			$stm->bindValue(':nomeempreendimento', $nomeempreendimento);
			$stm->bindValue(':numpredios', $numpredios);
			$stm->bindValue(':numunidades', $numunidades);
			$stm->bindValue(':numandares', $numandares);
			$stm->bindValue(':numlotes', $numlotes);
			$stm->bindValue(':aptosporandar', $aptosporandar);
			$stm->bindValue(':esperasplit', $split);
			$stm->bindValue(':sacada', $sacada);
			$stm->bindValue(':quadra', $quadra);
			
			//detalhes imovel
			$stm->bindValue(':numdormimo', $numdormimo);
			$stm->bindValue(':areautil', $areautil);
			$stm->bindValue(':medidas', $medidas);
			$stm->bindValue(':vagasimo', $vagasimo);
			$stm->bindValue(':valorcondominioimo', $valorcondominioimo);
			$stm->bindValue(':valoriptuimo', $valoriptuimo);
			$stm->bindValue(':piso', $piso);
			$stm->bindValue(':tetoimo', $tetoimo);
			$stm->bindValue(':paredesimo', $paredesimo);
			$stm->bindValue(':hidraulicaimo', $hidraulicaimo);
		    $stm->bindValue(':arcondicionadoimo', $arcondicionadoimo);
			$stm->bindValue(':armariosimo', $armariosimo);
			$stm->bindValue(':salaofestaimo', $salaofestaimo);
			$stm->bindValue(':churrasqueiraimo', $churrasqueiraimo);
			$stm->bindValue(':portariaimo', $portariaimo);
	        $stm->bindValue(':areaservicoimo', $areaservicoimo);
			$stm->bindValue(':academiaimo', $academiaimo);
			$stm->bindValue(':piscinaimo', $piscinaimo);
			$stm->bindValue(':plano', $plano);
			$stm->bindValue(':inclinado', $inclinado);
			$stm->bindValue(':gramado', $gramado);
			$stm->bindValue(':calcado', $calcado);
			$stm->bindValue(':foto1', $foto1);
		    $stm->bindValue(':foto2', $foto2);
			$stm->bindValue(':foto3', $foto3);
			$stm->bindValue(':foto4', $foto4);
			$stm->bindValue(':foto5', $foto5);
	
			//preço e condição
		
			$stm->bindValue(':valorimo', $valorimo);
			$stm->bindValue(':valorvendaimo', $valorvendaimo);
			$stm->bindValue(':comissaoimo', $comissaoimo);
			$stm->bindValue(':mcmv', $mcmv);
			$stm->bindValue(':obs1', $obs1);
			$stm->bindValue(':obs2', $obs2);
			$stm->bindValue(':idimo', $idimo);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
          

		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir'):
           

		

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM imovel WHERE idimo = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $idimo);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
	*/
		?>

	</div>
</body>
</html>