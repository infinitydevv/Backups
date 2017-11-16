<?php 
  $nomeBanco = "radardosimovei";
  $conexao = @mysql_connect("mysql.radardosimoveis.com.br","radardosimovei","Radar2015");
  @mysql_select_db($nomeBanco, $conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">

    <title>Radar dos Imóveis</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<script>
		function formatar(mascara, documento){
			var i = documento.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(i)
  
			if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
  }
  
}
</script>
		
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	

    <title>Cadastro</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

  
</head>
<center><img id="icone" width="100px" height="100px" src = "img/bgC1.png"/></center>
<nav class="navbar navbar-default" role="navigation">
        <?php include "cabecalho.php"; ?>
        <!-- /.container -->
   </nav>

<body> 

 <div id="main" class="container">
<form action="?go=cadastrar" method="POST" enctype="multipart/form-data">
<fieldset>
  <legend>FICHA DE CADASTRO DE IMÓVEL - APARTAMENTO </legend>
  
  
  <div class="form-group row">

   <div class="form-group">
  	  	<label for="tipo">Corretor:</label>
        <select name="nomeusu" class="form-control" id="nomeusu">
		<?php
		  
           $sql = "select * from usuario";
           $resultado = mysql_query($sql,$conexao);	
           while($dados = mysql_fetch_array($resultado)){
			   $codigo = $dados['idusu'];
			   $nome = $dados['nome'];
			   echo"<option value = '$codigo'>$nome</option>";
			   
		   }		   
		?>
		
		</select>
	  </div>
  
	  <div class="form-group">
	     <label for="dataani">Data do Cadastro:</label>
		 <input type="date" class="form-control" id="datac" name="datacad">
	  </div>
	  <!-- ativos e imoveis destaques -->
	  <div class="form-group">
	     <label for="dataani">Imóvel Destaque?</label>
		 <input type="radio"  id="datac" name="destaque" value="1" checked/>Sim
		 <input type="radio" name="destaque" value="0" />Não
	  </div>
	  <div class="form-group">
	     <label for="dataani">Imóvel Ativo?</label>
		 <input type="radio"  id="datac" name="ativo" value="1" checked/>Sim
		 <input type="radio" name="ativo" value="0" />Não
	  </div>
	   <div class="form-group">
	     <label for="dataani">É um Empreendimento?</label>
		 <input type="radio"  id="empreendimento" name="empreendimento" value="1" checked/>Sim
		 <input type="radio" name="empreendimento" value="0" />Não
	  </div>
	  <!-- fim ativos e imoveis destaques -->
	  <!-- dados do cliente -->
	  <br/>
	  <fieldset>
	  <legend>PROPRIETARIO </legend>
	  <label for="tipo">Cliente:</label>
        <select name="nomecli" class="form-control" id="nomecli">
		<?php
		  
           $sql = "select * from cliente";
           $resultado = mysql_query($sql,$conexao);	
           while($dados = mysql_fetch_array($resultado)){
			   $codigo = $dados['idcli'];
			   $nome = $dados['nomecli'];
			   echo"<option value = '$codigo'>$nome</option>";
			   
		   }		   
		?>
		
		</select>
	  
	   </fieldset>
	  <!-- FIM DADOS DO PROPRIETARIO -->
	  
	  <br/>
	  <legend>DADOS DO IMÓVEL </legend>
	 
	 <div class="form-group">
		<label for="dados">Nome do Empreendimento:</label>
		<input type="text" class="form-control" id="empreendimento" name="empreendimento" placeholder="Nome do Empreendimento">
	</div>
	  
	<div class="form-group">
		<label for="dados">Lougradorou:</label>
		<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
	</div>
	  
	<div class="form-group">
		<label for="dados">Número:</label>
		<input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
	</div> 
	
	  <div class="form-group">
		<label for="dados">Bloco/Apto:</label>
		<input type="text" class="form-control" id="bloco" name="bloco" placeholder="Bloco/Apto">
	</div> 
	<div class="form-group">
		<label for="dados">Cidade:</label>
		<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
	</div> 
	<div class="form-group">
		<label for="dados">Bairro:</label>
		<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
	</div> 
	 <div class="form-group">
		<label for="dados">Nº Prédios:</label>
		<input type="text" class="form-control" id="numpredios" name="numpredios" placeholder="Nº de Prédios">
	</div> 
	 <div class="form-group">
		<label for="dados">Nº Unidades:</label>
		<input type="text" class="form-control" id="numunidades" name="numunidades" placeholder="Nº de Unidades">
	</div> 
	 <div class="form-group">
		<label for="dados">Nº Andares:</label>
		<input type="text" class="form-control" id="numandares" name="numandares" placeholder="Nº de andares">
	</div> 
	 <div class="form-group">
		<label for="dados">Aptos/Andar:</label>
		<input type="text" class="form-control" id="aptosporandar" name="aptosporandar" placeholder="Nº Aptos/Andar">
	</div> 
	<div class="form-group">
		<label for="dados">CEP:</label>
		<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
	</div> 
	
	  <div class="form-group">
	  <label for="tipo">Tipo:</label>
				<select name="tipoimo" class="form-control" id="tipoimo">
                    <option value="">--</option>
                    <option value="Padrão">Padrão</option>
					<option value="Cobertura">Cobertura</option>
					<option value="Kitnet">Kitnet</option>
					<option value="Loft/Studio">Loft/Studio</option>
					<option value="empreendimento">Empreendimento</option>
                </select>
	  </div>
	  
	  <div class="form-group">
		<label for="dormitorio">Nº de Dormitórios:</label>
		<input type="text" class="form-control" id="dormitorio" name="dormitorio" placeholder="3 dorm">
	</div>
	  
	  <div class="form-group">
		<label for="areautil">Área útil: </label>
		<input type="text" class="form-control" id="areautil" name="areautil" placeholder="? m²">
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
		<input type="number" class="form-control" id="iptu" name="iptu" placeholder="R$" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$">
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
		<input type="text" class="form-control" id="parede" name="parede" placeholder="Reboco; Massa Corrida; Textura; Ceramica; Revestida;">
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
		<input type="text" class="form-control" id="ar" name="ar" placeholder="Dois ar Split e um ar janela">
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
		<label for="valimo">Valor para o proprietário: </label>
		<input type="text" class="form-control" id="valimo" name="valimo" placeholder="R$">
	</div>
	 <div class="form-group">
		<label for="comissao">Comissão</label>
		<input type="text" class="form-control" id="comissao" name="comissao" placeholder="%">
	</div>
	   <div class="form-group">
		<label for="valvenda">Valor de venda: </label>
		<input type="text" class="form-control" id="valvenda" name="valvenda" placeholder="R$">
	</div>
	    <legend>IMAGENS DO IMÓVEL </legend>
	   <div class="form-group">
			<label for="InputFile">Foto 1:</label>
			<input type="file" id="InputFile" name="foto1"> 
     </div>
	  
	    <div class="form-group">
			<label for="InputFile">Foto 2:</label>
			<input type="file" id="InputFile" name="foto2"> 
     </div>
	   <div class="form-group">
			<label for="InputFile">Foto 3:</label>
			<input type="file" id="InputFile" name="foto3"> 
     </div>
	   <div class="form-group">
			<label for="InputFile">Foto 4:</label>
			<input type="file" id="InputFile" name="foto4"> 
     </div>
	   <div class="form-group">
			<label for="InputFile">Foto 5:</label>
			<input type="file" id="InputFile" name="foto5"> 
     </div>
	 
	 <div class="form-group">
         <label for="comment">Observações:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Observações sobre o apartamento"></textarea>
      
     </div>
	  <div class="form-group">
         <label for="comment">Facilidades de Negociação:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao1" placeholder="Observações sobre o apartamento"></textarea>
      
     </div>
	  </fieldset>
	  
	  
	  
 
  
  <hr />
	
     <div class="row">
	  <div class="col-md-12">
	  	<button type="submit" name="botao" class="btn btn-primary">Salvar</button>
		<button type="reset" name="limpar" class="btn btn-primary">Limpar</button>
		<a href="area.php" class="btn btn-default">Cancelar</a>
	  </div>
	  </div>
	</div> 
	</div>
  </fieldset>
	 </div><br/>
</form>

</div>

<?php 
include "conectar.php";

$msg = false;
if(@$_GET['go'] == 'cadastrar'){
	
	$nomeusu = $_POST['nomeusu'];
	$datacad = $_POST['datacad'];
	$nomecli = $_POST['nomecli'];
	$destaque = $_POST['destaque'];
	$ativo = $_POST['ativo'];
	$empreendimento = $_POST['empreendimento'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$bloco = $_POST['bloco'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	
	$numpredios = $_POST['numpredios'];
	$numunidades = $_POST['numunidades'];
	$numandares = $_POST['numandares'];
	$aptosporandar = $_POST['aptosporandar'];
	
	
	
	
	$tipoimo =$_POST['tipoimo'];
	$dormitorio = $_POST['dormitorio'];
	$areautil = $_POST['areautil'];
	$vagas = $_POST['vagas'];
	$valcondominio = $_POST['valcondominio'];
	$iptu = $_POST['iptu'];
	$piso = $_POST['piso'];
	$teto = $_POST['teto'];
	$parede = $_POST['parede'];
	$hidraulica = $_POST['hidraulica'];
	$ar = $_POST['ar'];
	$embutido = $_POST['embutido'];
	$festa = $_POST['festa'];
	$churras = $_POST['churras'];
	$portaria = $_POST['portaria'];
	$servico = $_POST['servico'];
	$piscina = $_POST['piscina'];
	$academia = $_POST['academia'];
	$valimo = $_POST['valimo'];
	$comissao = $_POST['comissao'];
	$valvenda = $_POST['valvenda'];
	
	$arq_name = $_FILES['foto1']['name']; //O nome do ficheiro
    $arq_size = $_FILES['foto1']['size']; //O tamanho do ficheiro
    $arq_tmp = $_FILES['foto1']['tmp_name']; //O nome temporário do arquivo
    $arq1_name = "apto/".$arq_name;
	
	$arq_name1 = $_FILES['foto2']['name']; //O nome do ficheiro
    $arq1_size = $_FILES['foto2']['size']; //O tamanho do ficheiro
    $arq1_tmp = $_FILES['foto2']['tmp_name']; //O nome temporário do arquivo
    $arq2_name = "apto/".$arq_name1;
	
	
	
	$arq_name2 = $_FILES['foto3']['name']; //O nome do ficheiro
    $arq2_size = $_FILES['foto3']['size']; //O tamanho do ficheiro
    $arq2_tmp = $_FILES['foto3']['tmp_name']; //O nome temporário do arquivo
    $arq3_name = "apto/".$arq_name2;
	
	
	
	$arq_name3 = $_FILES['foto4']['name']; //O nome do ficheiro
    $arq3_size = $_FILES['foto4']['size']; //O tamanho do ficheiro
    $arq3_tmp = $_FILES['foto4']['tmp_name']; //O nome temporário do arquivo
    $arq4_name = "apto/".$arq_name3;
	
	$arq_name4 = $_FILES['foto5']['name']; //O nome do ficheiro
    $arq4_size = $_FILES['foto5']['size']; //O tamanho do ficheiro
    $arq4_tmp = $_FILES['foto5']['tmp_name']; //O nome temporário do arquivo
    $arq5_name = "apto/".$arq_name4;
		
	$obs = $_POST['observacao'];
	$obs1 = $_POST['observacao1'];
	
	
//se nao existir a pasta ele cria uma

	
	
	
	
	
	//se nao existir a pasta ele cria uma
/*
	if(empty($nomeusu)){
		echo "<script>alert('Preencha o campo nome para se cadastrar.'); history.back();</script>";
	}elseif(empty($datacad)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($endereco)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($numero)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($bloco)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($dcidade)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($numpredios)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($numunidades)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($numandares)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($aptosporandar)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($cep)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($nomecli)){
		echo "<script>alert('Preencha  o campo do cliente para se cadastrar.'); history.back();</script>";
	}elseif(empty($tipoimo)){
		echo "<script>alert('Preencha o campo tipo de imóvel para se cadastrar.'); history.back();</script>";
	}elseif(empty($dormitorio)){
		echo "<script>alert('Preencha o campo número de dormitórios para se cadastrar.'); history.back();</script>";
	}elseif(empty($areautil)){
		echo "<script>alert('Preencha o campo Area útil para se cadastrar.'); history.back();</script>";
	}elseif(empty($vagas)){
		echo "<script>alert('Preencha o campo número de vagas para se cadastrar.'); history.back();</script>";
	}elseif(empty($valcondominio)){
		echo "<script>alert('Preencha o campo valor do condominio para se cadastrar.'); history.back();</script>";
	}elseif(empty($iptu)){
		echo "<script>alert('Preencha o campo valor do iptu para se cadastrar.'); history.back();</script>";
	}elseif(empty($piso)){
		echo "<script>alert('Preencha o campo Piso para se cadastrar.'); history.back();</script>";
	}elseif(empty($teto)){
		echo "<script>alert('Preencha o campo teto para se cadastrar.'); history.back();</script>";
	}elseif(empty($parede)){
		echo "<script>alert('Preencha o campo parede para se cadastrar.'); history.back();</script>";
	}elseif(empty($hidraulica)){
		echo "<script>alert('Preencha o campo hidraulica para se cadastrar.'); history.back();</script>";
	}elseif(empty($ar)){
		echo "<script>alert('Preencha o campo ar para se cadastrar.'); history.back();</script>";
	}elseif(empty($embutido)){
		echo "<script>alert('Preencha o campo embutido para se cadastrar.'); history.back();</script>";
	}elseif(empty($festa)){
		echo "<script>alert('Preencha o campo festa para se cadastrar.'); history.back();</script>";
	}elseif(empty($churras)){
		echo "<script>alert('Preencha o campo churras para se cadastrar.'); history.back();</script>";
	}elseif(empty($portaria)){
		echo "<script>alert('Preencha o campo portaria para se cadastrar.'); history.back();</script>";
	}elseif(empty($servico)){
		echo "<script>alert('Preencha o campo servico para se cadastrar.'); history.back();</script>";
	}elseif(empty($piscina)){
		echo "<script>alert('Preencha o campo piscina para se cadastrar.'); history.back();</script>";
	}elseif(empty($academia)){
		echo "<script>alert('Preencha o campo academia para se cadastrar.'); history.back();</script>";
	}elseif(empty($valimo)){
		echo "<script>alert('Preencha o campo valimo para se cadastrar.'); history.back();</script>";
	}elseif(empty($comissao)){
		echo "<script>alert('Preencha o campo comissao para se cadastrar.'); history.back();</script>";
	}elseif(empty($valvenda)){
		echo "<script>alert('Preencha o campo vakor venda para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs)){
		echo "<script>alert('Preencha o campo observacao para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs1)){
		echo "<script>alert('Preencha o campo observacao para se cadastrar.'); history.back();</script>";
	}	else{
	
      INICIO DA FOTO */

    			
	/*FIM DA FOTO */			
		header('Content-Type: text/html; charset=utf-8');		
				
		@mysql_query("insert into imovel (idimo, usuario_idusu,cliente_idcli,usuario_tipo_idtipousu, idusu,ativo, datacadimo, idcli,
			 tipoimo,tipo,lougradouro,numero,bloco,bairro,cidade,cep,estado, numdormimo, areaimo, vagasimo,valorcondominioimo,valoriptuimo,piso, tetoimo, 
			 paredesimo, hidraulicaimo, arcondicionadoimo, armariosimo, salaofestaimo, churrasqueiraimo, portariaimo, areaservicoimo, piscinaimo,
			 academiaimo, valorimo, planoimo, inclinadoimo, gramadoimo, calcadoimo, comissaoimo, valorvendaimo, observacao1, observacao2, 
			 medidasimo, imoveltipoimo, foto1, foto2, foto3, foto4, foto5,destaqueimo, empreendimento, nomeempreendimento, numunidades,numandares,
			 numpredios,aptosporandar,numlotes)

			 VALUES (NULL,0,2,0,'$ativo','$nomeusu','$datacad','$nomecli','$tipoimo','Apartamento','$logradouro','$numero','$bloco','$bairro','$cidade',
			 '$cep','RS','$dormitorio','$areautil','$vagas','$valcondominio','$iptu','$piso','$teto','$parede','$hidraulica','$ar','$embutido', 
			 '$festa', '$churras', '$portaria', '$servico', '$piscina','$academia', '$valimo', NULL, NULL, NULL, NULL,'$comissao', '$valvenda', '$obs',
			 '$obs1', NULL,NULL,'$arq1_name','$arq2_name', '$arq3_name', '$arq4_name', '$arq5_name','$destaque','$empreendimento','$nomeempreendimento',
			 '$numunidades','$numandares','$numpredios','$aptosporandar',0)");
			 
			 
			 
			 
		   move_uploaded_file($arq_tmp, "apto/".$arq_name);
		   move_uploaded_file($arq1_tmp, "apto/".$arq_name1);
		   move_uploaded_file($arq2_tmp, "apto/".$arq_name2);
		   move_uploaded_file($arq3_tmp, "apto/".$arq_name3);
		   move_uploaded_file($arq4_tmp, "apto/".$arq_name4);
		   
		
			echo "<script>alert('Apartamento cadastrado com sucesso.');</script>";
			//Aqui Grava a imagem a diretória desejada, na esquecer de dar as permissões no servido
			//move_uploaded_file($arq_tmp, "upload/".$arq_name);
			echo "<meta http-equiv='refresh' content='0, url=./area.php'>";
		}
	
//}

?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

	<?php include "rodape.php"; ?>
	
</body>

</html>