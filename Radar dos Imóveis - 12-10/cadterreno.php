<?php 
  /*$nomeBanco = "radari";
  $conexao = @mysql_connect("localhost","root","");
  @mysql_select_db($nomeBanco, $conexao);
  */
  include "conectar.php"; 
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
  <legend>FICHA DE CADASTRO - TERRENO </legend>
  
  
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
		<label for="dados">Nº Lotes:</label>
		<input type="text" class="form-control" id="numlotes" name="numunidades" placeholder="Nº de Lotes">
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
		<label for="dados">Cidade:</label>
		<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
	</div> 
	<div class="form-group">
		<label for="dados">CEP:</label>
		<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
	</div> 
	  
	  <div class="form-group">
	  <label for="tipo">Tipo:</label>
				<select name="tipo" class="form-control" id="tipoimo">
                    <option value="">--</option>
                    <option value="terreno">Terreno</option>
					<option value="terreno">Empreendimento</option>
			    </select>
	  </div>
	 
	  
	 
	  
	
	<div class="form-group">
		<label for="ar">Terreno - Medidas:</label>
		<input type="text" class="form-control" id="medidas" name="medidas" placeholder="? m x ? m">
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
	<label for="embutido">Inclinado:</label>
		<select name="inclinado" class="form-control" id="inclinado">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  <div class="form-group">
	<label for="embutido">Gramado:</label>
		<select name="gramado" class="form-control" id="gramado">
            <option value="">--</option>
            <option value="Sim">Sim</option>
			<option value="Não">Não</option>
		</select>
	  </div>
	  <div class="form-group">
	<label for="embutido">Calçado:</label>
		<select name="calcado" class="form-control" id="calcado">
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
		<label for="comissao">Comissão </label>
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
        <!-- <textarea class="form-control" rows="8" id="obs"></textarea> -->
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
	$tipoimo =$_POST['tipoimo'];
	$tipo =$_POST['tipo'];
	$areautil = $_POST['medidas'];
	/*$vagas = $_POST['vagas'];
	$valcondominio = $_POST['valcondominio'];
	$iptu = $_POST['iptu'];
	$piso = $_POST['piso'];
	$teto = $_POST['teto'];
	$parede = $_POST['parede'];
	$hidraulica = $_POST['hidraulica'];
	$ar = $_POST['ar'];
	
	$medidas = $_POST['medidas'];
	$plano = $_POST['plano'];
	$inclinado = $_POST['inclinado'];
	$gramado = $_POST['gramado'];
	$calcado = $_POST['calcado'];
		
	$embutido = $_POST['embutido'];
	$festa = $_POST['festa'];
	$churras = $_POST['churras'];
	$portaria = $_POST['portaria'];
	$servico = $_POST['servico'];
	$piscina = $_POST['piscina'];
	$academia = $_POST['academia'];*/
	$valimo = $_POST['valimo'];
	$comissao = $_POST['comissao'];
	$valvenda = $_POST['valvenda'];
	
	$arq_name = $_FILES['foto1']['name']; //O nome do ficheiro
    $arq_size = $_FILES['foto1']['size']; //O tamanho do ficheiro
    $arq_tmp = $_FILES['foto1']['tmp_name']; //O nome temporário do arquivo
    $arq1_name = "terreno/".$arq_name;
	
	$arq_name1 = $_FILES['foto2']['name']; //O nome do ficheiro
    $arq1_size = $_FILES['foto2']['size']; //O tamanho do ficheiro
    $arq1_tmp = $_FILES['foto2']['tmp_name']; //O nome temporário do arquivo
    $arq2_name = "terreno//".$arq_name1;
	
	
	
	$arq_name2 = $_FILES['foto3']['name']; //O nome do ficheiro
    $arq2_size = $_FILES['foto3']['size']; //O tamanho do ficheiro
    $arq2_tmp = $_FILES['foto3']['tmp_name']; //O nome temporário do arquivo
    $arq3_name = "terreno/".$arq_name2;
	
	
	
	$arq_name3 = $_FILES['foto4']['name']; //O nome do ficheiro
    $arq3_size = $_FILES['foto4']['size']; //O tamanho do ficheiro
    $arq3_tmp = $_FILES['foto4']['tmp_name']; //O nome temporário do arquivo
    $arq4_name = "terreno/".$arq_name3;
	
	$arq_name4 = $_FILES['foto5']['name']; //O nome do ficheiro
    $arq4_size = $_FILES['foto5']['size']; //O tamanho do ficheiro
    $arq4_tmp = $_FILES['foto5']['tmp_name']; //O nome temporário do arquivo
    $arq5_name = "terreno/".$arq_name4;
		
	$obs1 = $_POST['observacao1'];
	$obs2 = $_POST['observacao2'];
	
//se nao existir a pasta ele cria uma

	
	
	
	
	
	//se nao existir a pasta ele cria uma

	if(empty($nomeusu)){
		echo "<script>alert('Preencha o campo nome para se cadastrar.'); history.back();</script>";
	}elseif(empty($datacad)){
		echo "<script>alert('Preencha o campo data de cadastro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($nomecli)){
		echo "<script>alert('Preencha  o campo do cliente para se cadastrar.'); history.back();</script>";
	}elseif(empty($tipoimo)){
		echo "<script>alert('Preencha o campo tipo de imóvel para se cadastrar.'); history.back();</script>";
	}elseif(empty($tipo)){
		echo "<script>alert('Preencha o campo tipo de imóvel para se cadastrar.'); history.back();</script>";
	}elseif(empty($areautil)){
		echo "<script>alert('Preencha o campo Area útil para se cadastrar.'); history.back();</script>";
	}elseif(empty($valimo)){
		echo "<script>alert('Preencha o campo valimo para se cadastrar.'); history.back();</script>";
	}elseif(empty($comissao)){
		echo "<script>alert('Preencha o campo comissao para se cadastrar.'); history.back();</script>";
	}elseif(empty($valvenda)){
		echo "<script>alert('Preencha o campo vakor venda para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs1)){
		echo "<script>alert('Preencha o campo observacao para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs2)){
		echo "<script>alert('Preencha o campo observacao para se cadastrar.'); history.back();</script>";
	}else{
	
     /* INICIO DA FOTO */

    			
	/*FIM DA FOTO */			
				
				
		@mysql_query("insert into imovel (idimo, idusu, datacadimo, idcli,
			 tipoimo,tipo,lougradouro,numero,bairro,cidade,cep,estado,numdormimo, areaimo, vagasimo,valorcondominioimo,valoriptuimo,piso, tetoimo, paredesimo, hidraulicaimo,
			 arcondicionadoimo, armariosimo, salaofestaimo, churrasqueiraimo, portariaimo, areaservicoimo, piscinaimo,academiaimo,
			 valorimo, planoimo, inclinadoimo, gramadoimo, calcadoimo, comissaoimo, valorvendaimo, observacao1, observacao2, 
			 medidasimo, imoveltipoimo, foto1, foto2, foto3, foto4, foto5)

			 VALUES (NULL, '$nomeusu', '$datacad', '$nomecli', '$tipoimo','$tipoimo',NULL,NULL,'$bairro','$cidade',NULL, NULL, '$areautil', NULL, 
			 NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL,NULL,NULL,NULL,NULL,NULL, '$valimo', NULL,NULL,NULL,NULL,'$comissao', '$valvenda', '$obs1',
			 $obs2, '$medidas',NULL,'$arq1_name', '$arq2_name', '$arq3_name', '$arq4_name', '$arq5_name')");
			 
		   move_uploaded_file($arq_tmp, "rural/".$arq_name);
		   move_uploaded_file($arq1_tmp, "rural/".$arq_name1);
		   move_uploaded_file($arq2_tmp, "rural/".$arq_name2);
		   move_uploaded_file($arq3_tmp, "rural/".$arq_name3);
		   move_uploaded_file($arq4_tmp, "rural/".$arq_name4);
		   
		
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			//Aqui Grava a imagem a diretória desejada, na esquecer de dar as permissões no servido
			//move_uploaded_file($arq_tmp, "upload/".$arq_name);
			echo "<meta http-equiv='refresh' content='0, url=./area.php'>";
		}
	
}

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