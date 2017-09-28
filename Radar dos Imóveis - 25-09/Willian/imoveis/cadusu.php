<?php 
  $nomeBanco = "radar";
  $conexao = @mysql_connect("localhost","root","");
  @mysql_select_db($nomeBanco, $conexao);
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php 

    session_start(); 
	     if((!isset ($_SESSION['login_usuario']) == true) and (!isset ($_SESSION['senha_usuario']) == true)) { 
		 
		     unset($_SESSION['login_usuario']); 
			 unset($_SESSION['senha_usuario']); 
			 header('location:index.php'); 
		} 
		
		 $logado = $_SESSION['nomecompleto_usuario']; ?>
		 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
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

    <title>CADASTRO DE USUARIOS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <center><img id="icone" width="100px" height="100px" src = "img/bgC1.png"/></center>
  

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
       <? include "cabecalho.php" ?>
    </nav>
 

 <div id="main" class="container">
  
  <h3 class="page-header">Cadastro usuário [<?php echo''.$logado;?>]</h3>
  
  <form action="?go=cadastrar" method="POST">
  	
	<div class="row">
  	  
	  <div class="form-group col-md-1">
  	  	<label for="nomeusu">Nome Completo</label>
  	  	<input type="text" class="form-control" name="nomeusu" placeholder="Digite o nome">
  	  </div>
	  
	  <div class="form-group col-md-1">
		<label for="InputEmail1">E-mail</label>
		<input type="email" class="form-control" name="emailusu" id="InputEmail1" placeholder="Digite o email">
	  </div>
	  
	  <div class="form-group col-md-1">
  	  	<label for="dataaniusu">Data Aniversário</label>
  	  	<input type="date" class="form-control" name="dataaniusu" placeholder="Digite a Data de Aniversário">
  	  </div>
   </div>
	
	<div class="row">
  	 
  	  <div class="form-group col-md-1">
		<label for="fonecelusu">Telefone Celular</label>
  	  	<input type="tel" class="form-control" name="fonecelusu" placeholder="Digite o celular">
  	  </div>
	  
	  <div class="form-group col-md-1">
  	  	<label for="foneresusu">Telefone Residencial</label>
  	  	<input type="tel" class="form-control" name="foneresusu" placeholder="Digite o telefone residencial" maxlength="12" OnKeyPress="formatar('##-####-####', this)">
  	  </div>
	  	  
	  <div class="form-group col-md-1">
  	  	<label for="platform" class="control-label col-xs-2">tipo Usuário</label>
        <select name="tipousu" class="form-control">
		<?php
           $sql = "select * from tipousuario";
           $resultado = mysql_query($sql,$conexao);	
           while($dados = mysql_fetch_array($resultado)){
			   $codigo = $dados['idtipousu'];
			   $tipousu = $dados['tipo'];
			   echo"<option value = '$codigo'>$tipousu</option>";
			   
		   }		   
		?>
	  </div>
    </div>
	
	<div class="row">
	  
	  <div class="form-group col-md-1">
  	  	<label for="loginusu">Login</label>
  	  	<input type="text" class="form-control" name="loginusu" placeholder="Digite o login">
  	  </div>
	  
	  <div class="form-group col-md-1">
  	  	<label for="senhausu">Senha</label>
  	  	<input type="password" class="form-control" name="senhausu" placeholder="Digite a senha">
  	  </div>
	  
	  <div class="form-group col-md-1">
			<label for="InputFile">Foto</label>
			<input type="file" id="InputFile" name="foto"> 
     </div>
    </div>
	
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
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include "conectar.php";


if(@$_GET['go'] == 'cadastrar'){
	$nome = $_POST['nomeusu'];
	$email =$_POST['emailusu'];
	$dataani = $_POST['dataaniusu'];
	$fonecel = $_POST['fonecelusu'];
	$foneres = $_POST['foneresusu'];
	$login = $_POST['loginusu'];
	$senha = $_POST['senhausu'];
	$codigousu = $_POST['tipousu'];
	$foto = $_POST['foto'];

	if(empty($nome)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($dataani)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonecel)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($foneres)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($login)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($senha)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($codigousu)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($foto)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}
	else{
		$query1 = @mysql_num_rows(mysql_query("SELECT * FROM USUARIO WHERE USUARIO = '$login'"));
		if($query1 == 1){
			echo "<script>alert('Usuário já existe.'); history.back();</script>";
						
		}else{
			mysql_query("INSERT INTO usuario (nome,email,dataaniversario,fonecel,foneres,login,senha,idtipousu,foto)
              VALUES ('$nome','$email','$dataani','$fonecel','$foneres','$login','$senha','$codigousu','$foto')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			echo "<meta http-equiv='refresh' content='0, url=./'>";
		}
	}
}

?>