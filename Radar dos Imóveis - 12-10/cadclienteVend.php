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
    <script type="text/javascript" src="js/mtel.js"></script>
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
        <?php include "cabecalho.php"; ?>
        <!-- /.container -->
   </nav>

<body> 

 <div id="main" class="container">
<form action="?go=cadastrar" method="POST" enctype="multipart/form-data">
<fieldset>
  <legend>Cadastro de Cliente -  Vendedor</legend>

	<div class="form-group">
		<label for="nomecomplet">Nome Completo:</label>
		<input type="text" class="form-control" id="nomeC" name="nomecli">
	</div>
	<div class="form-group">
		<label for="cpf">CPF: </label>
		<input type="text" class="form-control" id="cpfcli" name="cpfcli" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
	</div>
	
	<div class="form-group">
		<label for="cnpj">CNPJ: </label>
		<input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)">
	</div>
	
	<div class="form-group">
		<label for="email">E-mail:</label>
		<input type="email" class="form-control" id="email" name="emailcli" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	</div>
	<div class="form-group">
		<label for="nomecomplet">Nome Completo do Conjuge:</label>
		<input type="text" class="form-control" id="nomeC" name="conjuguecli">
	</div>
	
	<div class="form-group">
		<label for="creci">Nº CPF do Conjuge : </label>
		<input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
	</div>
	
	<div class="form-group">
		<label for="datanascli">Pessoa de Contato:</label>
		<input type="text" class="form-control" id="pessoacontato" name="pessoacontato">
	</div>
	
	<div class="form-group">
		<label for="fonec">Telefone Celular:</label>
		<input type="tel" class="form-control" id="telcel" name="fonecelcli" maxlength="15" onkeyup="mascara( this, mtel );">
	</div>
	<div class="form-group">
		<label for="foner">Telefone Fixo:</label>
		<input type="tel" class="form-control" id="telres" name="fonerescli" maxlength="15" onkeyup="mascara( this, mtel );">
	</div>
	
		  
	   <div class="form-group">
         <label for="comment">Observações:</label>
		 <textarea class="form-control ckeditor" rows="5" name="obs1cli" placeholder="Observações"></textarea>
       
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
	
	$nomecli = $_POST['nomecli'];
	$cpfcli = $_POST['cpfcli'];
	$rgcli =$_POST['rgcli'];
	$emailcli = $_POST['emailcli'];
	$datanascli = $_POST['datanascli'];
	$fonerescli = $_POST['fonerescli'];
	$fonecelcli = $_POST['fonecelcli'];
	$tipocli = $_POST['tipocli'];
	$obs1cli = $_POST['obs1cli'];
	$obs2cli = $_POST['obs2cli'];
	
	
	if(empty($nomecli)){
		echo "<script>alert('Preencha o nome  para se cadastrar.'); history.back();</script>";
	}elseif(empty($cpfcli)){
		echo "<script>alert('Preencha  o cpf  para se cadastrar.'); history.back();</script>";
	}elseif(empty($rgcli)){
		echo "<script>alert('Preencha  o rg para se cadastrar.'); history.back();</script>";
	}elseif(empty($emailcli)){
		echo "<script>alert('Preencha a e-mail para se cadastrar.'); history.back();</script>";
	}elseif(empty($datanascli)){
		echo "<script>alert('Preencha a data de nascimento para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonerescli)){
		echo "<script>alert('Preencha o fone residencial para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonecelcli)){
		echo "<script>alert('Preencha o fone celular para se cadastrar.'); history.back();</script>";
	}elseif(empty($tipocli)){
		echo "<script>alert('Preencha o nome do conjugue para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs1cli)){
		echo "<script>alert('Preencha o cpf do conjugue para se cadastrar.'); history.back();</script>";
	}elseif(empty($obs2cli)){
		echo "<script>alert('Preencha o cpf do conjugue para se cadastrar.'); history.back();</script>";
	}else{			
			
			@mysql_query("INSERT INTO clienteV (idcliv,nomecliv,cpfcliv,rgcliv,emailcliv,datanascliv, fonerescliv, fonecelcliv, tipocliv, obs1cliv, obs2cliv )
            VALUES (null,'$nomecli','$cpfcli','$rgcli','$emailcli','$datanascli','$fonerescli','$fonecelcli','$tipocli','$obs1cli','$obs1cl2')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			//Aqui Grava a imagem a diretória desejada, na esquecer de dar as permissões no servido
			
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