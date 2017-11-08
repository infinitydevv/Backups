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
  <legend>Cadastro de Cliente -  Comprador</legend>

	<div class="form-group">
		<label for="nomecomplet">Nome Completo</label>
		<input type="text" class="form-control" id="nomeC" name="nomecli">
	</div>
	
	
	<div class="form-group">
		<label for="email">E-mail:</label>
		<input type="email" class="form-control" id="email" name="emailcli" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	</div>
	<div class="form-group">
		<label for="creci">Logradouro: </label>
		<input type="text" class="form-control" id="creci" name="lougradorocli">
	</div>
	<div class="form-group">
		<label for="creci">Nº: </label>
		<input type="number" class="form-control" id="creci" name="numcli">
	</div>
	<div class="form-group">
		<label for="creci">Bairro: </label>
		<input type="text" class="form-control" id="creci" name="bairrocli">
	</div>
	<div class="form-group">
	<label for="creci">Estado: </label>
	   <select name="estadoscli" id="id_estados" class="form-control">
			<option>Escolha o Estado</option>
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espirito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MT">Mato Grosso</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraiba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondônia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantis</option>
	</select>
	</div>
	<div class="form-group">
		<label for="cidades">Cidade</label>
		<input type="text" class="form-control" id="cidades" name="cidadescli" maxlength="40">
	</div>
	<div class="form-group">
		<label for="foner">CEP:</label>
		<input type="text" class="form-control" id="cepcli" name="cepcli" maxlength="10" OnKeyPress="formatar('##.###-###', this)">
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
         <label for="comment">Descrição do Imóvel Desejado:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Descreva aqui como é o imovel desejado do cliente"></textarea>
      
     </div>
		 
	<div class="form-group">
         <label for="comment">Localização do Imóvel Desejado:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Descreva aqui a localização do imóvel"></textarea>
      
     </div>
	<div class="form-group">
         <label for="comment">Faixa de Preço e Condição de Pagamento:</label>
		 <textarea class="form-control ckeditor" rows="5" name="observacao" placeholder="Descreva aqui qual a faixa de preço e suas condições de pagamento"></textarea>
      
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
	$lougradorocli = $_POST['lougradorocli'];
	$numcli = $_POST['numcli'];
	$bairrocli = $_POST['bairrocli'];
	$estadoscli = $_POST['estadoscli'];
	$cidadescli = $_POST['cidadescli'];
	$cepcli = $_POST['cepcli'];
	$datanascli = $_POST['datanascli'];
	$fonerescli = $_POST['fonerescli'];
	$fonecelcli = $_POST['fonecelcli'];
	$conjuguecli = $_POST['conjuguecli'];
	$cpf = $_POST['cpf'];
	
	
	if(empty($nomecli)){
		echo "<script>alert('Preencha o nome  para se cadastrar.'); history.back();</script>";
	}elseif(empty($cpfcli)){
		echo "<script>alert('Preencha  o cpf  para se cadastrar.'); history.back();</script>";
	}elseif(empty($rgcli)){
		echo "<script>alert('Preencha  o rg para se cadastrar.'); history.back();</script>";
	}elseif(empty($emailcli)){
		echo "<script>alert('Preencha a e-mail para se cadastrar.'); history.back();</script>";
	}elseif(empty($lougradorocli)){
		echo "<script>alert('Preencha o lougradoro para se cadastrar.'); history.back();</script>";
	}elseif(empty($numcli)){
		echo "<script>alert('Preencha o numero residencial para se cadastrar.'); history.back();</script>";
	}elseif(empty($bairrocli)){
		echo "<script>alert('Preencha o bairro  para se cadastrar.'); history.back();</script>";
	}elseif(empty($estadoscli)){
		echo "<script>alert('Selecione o estado  para se cadastrar.'); history.back();</script>";
	}elseif(empty($cidadescli)){
		echo "<script>alert('Preencha a cidade para se cadastrar.'); history.back();</script>";
	}elseif(empty($cepcli)){
		echo "<script>alert('Preencha o cep se cadastrar.'); history.back();</script>";
	}elseif(empty($datanascli)){
		echo "<script>alert('Preencha a data de nascimento para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonerescli)){
		echo "<script>alert('Preencha o fone residencial para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonecelcli)){
		echo "<script>alert('Preencha o fone celular para se cadastrar.'); history.back();</script>";
	}elseif(empty($conjuguecli)){
		echo "<script>alert('Preencha o nome do conjugue para se cadastrar.'); history.back();</script>";
	}elseif(empty($cpf)){
		echo "<script>alert('Preencha o cpf do conjugue para se cadastrar.'); history.back();</script>";
	}else{			
			
			@mysql_query("INSERT INTO cliente (idcli,nomecli,cpfcli,rgcli,emailcli,lougradourocli,numerocli,bairroci,estadocli,cidadecli,cepcli,datanascli, fonerescli, fonecelcli, conjugue, cpf)
            VALUES (null,'$nomecli','$cpfcli','$rgcli','$emailcli','$lougradorocli','$numcli','$bairrocli','$estadoscli','$cidadescli','$cepcli','$datanascli','$fonerescli','$fonecelcli','$conjuguecli','$cpf')");
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