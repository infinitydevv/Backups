<?php 
  $nomeBanco = "radardosimovei";
  $conexao = @mysql_connect("mysql.radardosimoveis.com.br","radardosimovei","Radar2015");
  @mysql_select_db($nomeBanco, $conexao);
mysql_query("SET NAMES 'utf8'");
  mysql_query("SET character_set_connection=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_results=utf8");
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
        <div class="container">
       
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             
                <a class="navbar-brand" href="index.php">Radar dos Imóveis</a>
            </div>
     
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="logout.php">Sair</a>
                    </li>

					<li>
                         <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Cadastro</a>						
						<ul class="dropdown-menu">
						<li><a href="cad.php">Usuários</a></li>
						<li><a href="cadclienteVend.php">Cliente - Vendedor</a></li>
						<li><a href="cadcliente.php">Cliente - Comprador</a></li>
						<li><a href="cadapto.php">Apartamentos</a>
						<li><a href="cadcasa.php">Casas</a></li>
						<li><a href="cadterreno.php">Terrenos</a></li>
						<li><a href="cadrural.php">Rurais</a></li></li>
						
				</ul></li>
                    </li>
					
					  <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Consultas</a>
						<ul class="dropdown-menu">
						<li><a href="#">Apartamentos</a></li>
						<li><a href="#">Casas</a></li>
						<li><a href="#">Terrenos</a></li>
						<li><a href="#">Rurais</a></li>
						<li><a href="consultaUsu.php">Usuários</a></li>
				</ul></li>
                    </li> 
					
                    <li>
                        <a href="#">Sobre</a>
                    </li>                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
   </nav>

<body> 

 <div id="main" class="container">
<form action="?go=cadastrar" method="POST" enctype="multipart/form-data">
<fieldset>
  <legend>CADASTRO DE TERRENO </legend>
  
  
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
	  <label for="tipo">Tipo:</label>
				<select name="tipoimo" class="form-control" id="tipoimo">
                    <option value="">--</option>
                    <option value="Sitio">Terreno</option>
			    </select>
	  </div>
	  
	 
	  
	
	<div class="form-group">
		<label for="ar">Terreno - Medidas:</label>
		<input type="text" class="form-control" id="medidas" name="medidas" placeholder="30 mt x 15m">
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
         <label for="comment">Observações 1:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao1" placeholder="Descrições de benfeitorias (Cercas, construções, fornecimento de água e luz, açudes, arroios, ...) Distribuição da área (esboço da localização e topografia
		 )"></textarea>
       
     </div>
	  
	  
	  <div class="form-group">
		<label for="valimo">Valor para o proprietário: R$</label>
		<input type="text" class="form-control" id="valimo" name="valimo" placeholder="300.000,00">
	</div>
	 <div class="form-group">
		<label for="comissao">Comissão% </label>
		<input type="text" class="form-control" id="comissao" name="comissao" placeholder="3.000,00">
	</div>
	   <div class="form-group">
		<label for="valvenda">Valor de venda: R$</label>
		<input type="text" class="form-control" id="valvenda" name="valvenda" placeholder="300.000,00">
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
         <label for="comment">Observações 2:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao2" placeholder="Observações sobre o apartamento"></textarea>
       
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
	
	$areautil = $_POST['areautil'];
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
			 tipoimo, numdormimo, areaimo, vagasimo,valorcondominioimo,valoriptuimo,piso, tetoimo, paredesimo, hidraulicaimo,
			 arcondicionadoimo, armariosimo, salaofestaimo, churrasqueiraimo, portariaimo, areaservicoimo, piscinaimo,academiaimo,
			 valorimo, planoimo, inclinadoimo, gramadoimo, calcadoimo, comissaoimo, valorvendaimo, observacao1, observacao2, 
			 medidasimo, imoveltipoimo, foto1, foto2, foto3, foto4, foto5)

			 VALUES (NULL, '$nomeusu', '$datacad', '$nomecli', '$tipoimo', NULL, '$areautil', NULL, 
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