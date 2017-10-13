<?php 
	@session_start();
    require "../login/functions-cliente.php";
    if(!isLoggedInCli()){
    	echo"<script type='text/javascript'> alert('Necessario fazer o Login!!'); </script>";
    	echo"<meta http-equiv='refresh' content='0; url=../login-cliente.php' />";
    	exit;
    }else{
    	$logado = $_SESSION['nomecompleto_cliente'];
    }
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
	    <!-- CSS da página --><link href="../css/area-cliente.css" rel="stylesheet">
	    <!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
	    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
	    <!-- Bootstrap Core CSS --><link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link rel="icon" href="../img/logo.png">
	      <!-- Custom Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- navbar-top.php e navbar-top.css no head -->
    	<?php include('../navbar-area.php');?>
    	<!-- FIM navbar-top.php e navbar-top.css no head -->
		<div class="container-fluid">
		    <div class="row">
		      <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 bloco-left">
		        <div class="row">
		          <div class="col-xs-12">
		            <div class="row center-block">
		              <div class="col-xs-12 col-md-12 ">
		                <div class="photo-avatar center-block">
		                  <?php
		                  echo "
		                    <img src='../usuario/fotos/padrao.jpg' class='photo-avatar center-block'>";
		                  ?>
		                </div>
		              </div>
		              <div class="col-xs-12 col-md-12">
		                <h4 class="text-center">Seja bem vindo, <?php echo $logado . "."?></h4>
		              </div>
		            </div>
		          </div>
		          <div class="col-xs-12 hehe">
		            <h4>Principais funções</h4>
		          </div>
		          <div class="col-xs-12 func">
		          <ul>
		              <li>
		                <a href="radardosimoveis.com.br"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Imóveis</a>
		              </li>
		              <li>
		                <a href="radardosimoveis.com.br"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Mensagens</a>
		              </li>
		              <li>
		                <a href="radardosimoveis.com.br"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Alterar nome</a>
		              </li>
		              <li>
		                <a href="imoveis/index.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Alterar login</a>
		              </li>
		              <li>
		                <a href="usuario/index.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar senha</a>
		              </li>
		              <li>
		                <a href="../login/deslogar.php"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a>
		              </li>
		            </ul>
		          </div>
		        </div>
		      </div>
		      <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 bloco">
		        <br>
		        <h1 class="text-center">Área do Cliente</h1>
		        <p class="ps text-center">Na área do cliente você pode ter novidades sobre seus imóveis.</p>
		        <div class="">
		        	<div class="">
		        		<div class="header-mensagem">
		        			<h4>Radar dos Imóveis</h4>
		        		</div>
		        		<div class="body-mensagem">
		        			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							      <h4 class="panel-title">
							        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          <h4>Casa - Pasqualine rua Anjo Rafael, 133. R$ 150.000,000</h4>
							        </a>
							      </h4>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body">
							        <ul class="nav nav-tabs" role="tablist">
									    <li role="presentation" class="active"><a href="#imovel" aria-controls="imovel" role="tab" data-toggle="tab">Imóvel</a></li>
									    <li role="presentation"><a href="#mensagens" aria-controls="mensagens" role="tab" data-toggle="tab">Mensagens</a></li>
									  </ul>

									  <!-- Tab panes -->
									  <div class="tab-content">
									    <div role="tabpanel" class="tab-pane active" id="imovel">...</div>
									    <div role="tabpanel" class="tab-pane" id="mensagens">
						        			<blockquote class="blockquote mensagem-mm">
											  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
											  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
											</blockquote>
											<blockquote class="blockquote mensagem-mm">
											  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
											  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
											</blockquote>
											<blockquote class="blockquote mensagem-mm">
											  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
											  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
											</blockquote>
											<blockquote class="blockquote mensagem-mm">
											  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
											  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
											</blockquote>
									    </div>
									  </div>
							      </div>
							    </div>
							  </div>
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingTwo">
							      <h4 class="panel-title">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Collapsible Group Item #2
							        </a>
							      </h4>
							    </div>
							    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							      <div class="panel-body">
							        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      </div>
							    </div>
							  </div>
							  <div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingThree">
							      <h4 class="panel-title">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							          Collapsible Group Item #3
							        </a>
							      </h4>
							    </div>
							    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							      <div class="panel-body">
							        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      </div>
							    </div>
							  </div>
							</div>
		        		</div>
		        	</div>
		        </div>
		        <hr>
		        <footer class="footer">
		            <br>
		            <p class="text-center"><strong>Desenvolvido por </strong></p>
		            <a href="infinitydev/index.html" target="_blank"><img src="../infinitydev/img/logo-InfinityDev.png" class="center-block" width="120" height="auto"></a>
		        </footer>
		      </div>
		    </div>
		  </div>
	</body>
</html>