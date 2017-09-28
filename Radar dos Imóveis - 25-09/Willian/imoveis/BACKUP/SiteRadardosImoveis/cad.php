<?php 
  $nomeBanco = "radari";
  $conexao = @mysql_connect("localhost","root","");
  mysql_select_db($nomeBanco, $conexao);
   
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
						<li><a href="cad.php">Cadastro de Usuários</a></li>
						<li><a href="cadcliente.php">Cadastro de Clientes</a></li>
						<li><a href="cadapto.php">Cadastro de Apartamentos</a>
						<li><a href="cadcasa.php"> Cadastro de Casas</a></li>
						<li><a href="cadterreno.php"> Cadastro de Terrenos</a></li>
						<li><a href="cadrural.php"> Cadastro de imóveis Rurais</a></li></li>
						
				</ul></li>
                    </li>
					
					  <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Consultas</a>
						<ul class="dropdown-menu">
						<li><a href="#">Consulta de Apartamentos</a></li>
						<li><a href="#">Consulta de Casas</a></li>
						<li><a href="#">Consulta de Terrenos</a></li>
						<li><a href="#">Consulta de Imóveis Rurais</a></li>
						<li><a href="consultaUsu.php"> Consulta de Usuários</a></li>
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
  <legend>Cadastro de Usuários</legend>

	<div class="form-group">
		<label for="nomecomplet">Nome Completo</label>
		<input type="text" class="form-control" id="nomeC" name="nomeusu">
	</div>
	<div class="form-group">
		<label for="creci">CRECI Nº</label>
		<input type="text" class="form-control" id="creci" name="cresiusu">
	</div>
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="email" class="form-control" id="email" name="emailusu" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	</div>
	<div class="form-group">
		<label for="dataani">Data de Aniversário</label>
		<input type="date" class="form-control" id="dataa" name="dataaniusu">
	</div>
	<div class="form-group">
		<label for="fonec">Telefone Celular</label>
		<input type="tel" class="form-control" id="telcel" name="fonecelusu" maxlength="12" OnKeyPress="formatar('##-####-####', this)">
	</div>
	<div class="form-group">
		<label for="foner">Telefone Residencial</label>
		<input type="tel" class="form-control" id="telcel" name="foneresusu" maxlength="12" OnKeyPress="formatar('##-####-####', this)">
	</div>

	<!--OnKeyPress="formatar('##-####-####', this)"-->
  
	<div class="form-group">
		<label for="login">Login</label>
		<input type="text" class="form-control" id="login"  maxlength="15" name="loginusu">
	</div>
	<div class="form-group">
		<label for="senha">Senha</label>
		<input type="password" class="form-control" id="senha" name="senhausu" maxlength="8">
	</div>
  
    <div class="form-group">
			<label for="InputFile">Foto</label>
			<input type="file" id="InputFile" name="fotousu"> 
     </div>
	 
	 <div class="form-group">
  	  	<label for="tipo">tipo Usuário</label>
        <select name="tipousu" class="form-control" id="tipousu">
		<?php
		  
           $sql = "select * from tipo";
           $resultado = mysql_query($sql,$conexao);	
           while($dados = mysql_fetch_array($resultado)){
			   $codigo = $dados['idtipousu'];
			   $tipousu = $dados['tipo'];
			   echo"<option value = '$codigo'>$tipousu</option>";
			   
		   }		   
		?>
		
		</select>
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

</form>

</div>

<?php 
include "conectar.php";

$msg = false;
if(@$_GET['go'] == 'cadastrar'){
	
	$nome = $_POST['nomeusu'];
	$creci = $_POST['cresiusu'];
	$email =$_POST['emailusu'];
	$dataani = $_POST['dataaniusu'];
	$fonecel = $_POST['fonecelusu'];
	$foneres = $_POST['foneresusu'];
	$login = $_POST['loginusu'];
	$senha = $_POST['senhausu'];
	$codigousu = $_POST['tipousu'];
	
	$arq_name = $_FILES['fotousu']['name']; //O nome do ficheiro
    $arq_size = $_FILES['fotousu']['size']; //O tamanho do ficheiro
    $arq_tmp = $_FILES['fotousu']['tmp_name']; //O nome temporário do arquivo
    $arq1_name = "upload/".$arq_name;

	//se nao existir a pasta ele cria uma

	if(!file_exists($pasta_dir)){

		mkdir($pasta_dir);

	}

	$arquivo_nome = $pasta_dir . $arquivo["name"];
	$tipo_foto_filme = "1";

	// Faz o upload da imagem

	move_uploaded_file($arquivo["tmp_name"],$foto);
	
	

	if(empty($nome)){
		echo "<script>alert('Preencha o nome campo para se cadastrar.'); history.back();</script>";
	}elseif(empty($creci)){
		echo "<script>alert('Preencha  o CRECI campo para se cadastrar.'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('Preencha  o e-mail campo para se cadastrar.'); history.back();</script>";
	}elseif(empty($dataani)){
		echo "<script>alert('Preencha a data de aniversario os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonecel)){
		echo "<script>alert('Preencha o fone celular os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($foneres)){
		echo "<script>alert('Preencha o fone residencial os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($login)){
		echo "<script>alert('Preencha o login os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($senha)){
		echo "<script>alert('Preencha a senha os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($codigousu)){
		echo "<script>alert('Preencha o tipo de usuario os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($arq_name)){
		echo "<script>alert('coloque a foto  para se cadastrar.'); history.back();</script>";
	}
	else{
		$query1 = @mysql_num_rows(mysql_query("SELECT * FROM usuario WHERE login = '$login'"));
		if($query1 == 1){
			echo "<script>alert('Usuário já existe.'); history.back();</script>";
						
		}else{
			
		   			
			
			//echo "nome $nome creci $creci data $dataani email $email fone res $foneres celular $fonecel login $login senha $senha id $codigousu foto $foto";
			@mysql_query("INSERT INTO usuario (idusu,nome,creci,dataaniversario,email,fonecel,foneres,login,senha,foto,tipo)
            VALUES (null,'$nome','$creci','$dataani','$email','$fonecel','$foneres','$login','$senha','$arq1_name','$codigousu')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			//Aqui Grava a imagem a diretória desejada, na esquecer de dar as permissões no servido
			move_uploaded_file($arq_tmp, "upload/".$arq_name);
			echo "<meta http-equiv='refresh' content='0, url=./area.php'>";
		}
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