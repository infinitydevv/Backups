<?php 
  $nomeBanco = "radar";
  $conexao = @mysql_connect("localhost","root","");
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS 
    <link href="css/stylish-portfolio.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php 

    session_start(); 
	    
?>
		
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <center><img id="icone" width="100px" height="100px" src = "img/bgC1.png"/></center>
  

   <nav class="navbar navbar-default" role="navigation">
       <?php include "cabecalho.php"; ?>
        <!-- /.container -->
   </nav>


 <div id="main" class="container">
<form action="?go=cadastrar" method="POST" enctype="multipart/form-data">
<!-- DADOS PESSOAIS-->
<fieldset>
 <legend>Dados Pessoais</legend>
  <div class="form-group">
   <label for="nome">Nome: </label>
    <input type="text" name="nome">
	</div>

  <div class="form-group">	
   <label>Nascimento: </label>
   <input type="date" name="data"> 
  </div>
	
	<div class="form-group">
	    <label for="rg">RG: </label>
        <input type="text" name="rg" size="13" maxlength="13"> 
   </div>
  <div class="form-group">
    <label>CPF:</label>
    <input type="text" name="cpf" size="9" maxlength="11">
   </div>
   </fieldset>

<br />
<!-- ENDEREÇO -->
<fieldset>
 <legend>Dados de Endereço</legend>
 <table cellspacing="10">

  <tr>
   <td>
    <label for="rua">Rua:</label>
   </td>
   <td align="left">
    <input type="text" name="rua">
   </td>
   <td>
    <label for="numero">Numero:</label>
   </td>
   <td align="left">
    <input type="text" name="numero" size="4">
   </td>
  </tr>
  <tr>
   <td>
    <label for="bairro">Bairro: </label>
   </td>
   <td align="left">
    <input type="text" name="bairro">
   </td>
  </tr>
  <tr>
   <td>
    <label for="estado">Estado:</label>
   </td>
   <td align="left">
    <select name="estado"> 
    <option value="ac">Acre</option> 
    <option value="al">Alagoas</option> 
    <option value="am">Amazonas</option> 
    <option value="ap">Amapá</option> 
    <option value="ba">Bahia</option> 
    <option value="ce">Ceará</option> 
    <option value="df">Distrito Federal</option> 
    <option value="es">Espírito Santo</option> 
    <option value="go">Goiás</option> 
    <option value="ma">Maranhão</option> 
    <option value="mt">Mato Grosso</option> 
    <option value="ms">Mato Grosso do Sul</option> 
    <option value="mg">Minas Gerais</option> 
    <option value="pa">Pará</option> 
    <option value="pb">Paraíba</option> 
    <option value="pr">Paraná</option> 
    <option value="pe">Pernambuco</option> 
    <option value="pi">Piauí</option> 
    <option value="rj">Rio de Janeiro</option> 
    <option value="rn">Rio Grande do Norte</option> 
    <option value="ro">Rondônia</option> 
    <option value="rs">Rio Grande do Sul</option> 
    <option value="rr">Roraima</option> 
    <option value="sc">Santa Catarina</option> 
    <option value="se">Sergipe</option> 
    <option value="sp">São Paulo</option> 
    <option value="to">Tocantins</option> 
   </select>
   </td>
  </tr>
  <tr>
   <td>
    <label for="cidade">Cidade: </label>
   </td>
   <td align="left">
    <input type="text" name="cidade">
   </td>
  </tr>
  <tr>
   <td>
    <label for="cep">CEP: </label>
   </td>
   <td align="left">
    <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3">
   </td>
  </tr>
 </table>
</fieldset>
<br />

<!-- DADOS DE LOGIN -->
<fieldset>
 <legend>Dados de login</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <label for="email">E-mail: </label>
   </td>
   <td align="left">
    <input type="text" name="email">
   </td>
  </tr>
  <tr>
   <td>
    <label for="imagem">Imagem de perfil:</label>
   </td>
   <td>
    <input type="file" name="imagem" >

   </td>
  </tr>
  <tr>
   <td>
    <label for="login">Login de usuário: </label>
   </td>
   <td align="left">
    <input type="text" name="login">
   </td>
  </tr>
  <tr>
   <td>
    <label for="pass">Senha: </label>
   </td>
   <td align="left">
    <input type="password" name="pass">
   </td>
  </tr>
  <tr>
   <td>
    <label for="passconfirm">Confirme a senha: </label>
   </td>
   <td align="left">
    <input type="password" name="passconfirm">
   </td>
  </tr>
 </table>
</fieldset>
<br />
<input type="submit">
<input type="reset" value="Limpar">





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
	$extensao = strtolower(substr($_FILES['fotousu']['name'], -4));
	$foto = md5(time()).$extensao;
	$diretorio = 'upload';
	move_uploaded_file(substr($_FILES['fotousu']['tmp_name'], -4),$diretorio.$foto);
	//$foto = $_POST['fotousu'];

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
	}elseif(empty($foto)){
		echo "<script>alert('coloque a foto  para se cadastrar.'); history.back();</script>";
	}
	else{
		$query1 = @mysql_num_rows(mysql_query("SELECT * FROM USUARIO WHERE USUARIO = '$login'"));
		if($query1 == 1){
			echo "<script>alert('Usuário já existe.'); history.back();</script>";
						
		}else{
			
			
			
			
			
			
			
			//echo "nome $nome creci $creci data $dataani email $email fone res $foneres celular $fonecel login $login senha $senha id $codigousu foto $foto";
			@mysql_query("INSERT INTO usuario (idusuario,nome,creci,dataaniversario,email,foneres,fonecel,login,senha,tipousu,foto)
            VALUES (null, '$nome','$creci','$dataani','$email','$foneres','$fonecel','$login','$senha','$codigousu','$foto')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			
			echo "<meta http-equiv='refresh' content='0, url=./area.php'>";
	}
	}
}

?>
<?php include "rodape.php"; ?>
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

</body>

</html>





<!--   fim html -->

 
