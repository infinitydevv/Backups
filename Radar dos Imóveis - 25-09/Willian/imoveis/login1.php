<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- jQuery -->
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
  <!-- Arquivos do Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <!-- Minha folha de Estilos -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Meu arquivo de scripts -->
  <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
  <script src="js/custom.js"></script>
  <title>Identifique-se</title>
</head>
<body>

 
<div id="blocoLogin" class="container">

  <div class="row">
    <div class="col-md-12">
	<center><img src="img/logonovo.png" alt="Radar dos Imóveis" title="" width="150" height="150" /></center> 
	
	<h1><center> Cliente </center></h1><br/>
 <form id="log" name="logar" method="POST" action="logarcli.php">	       
	 <div class="input-group">
     
	    <label class="input-group input-group-addon"><b class="glyphicon glyphicon-user"></b></label>
	    <input autofocus type="text" class="form-control" name = "login" id="cmpLogin" placeholder="Login -- > cliente">
      </div>
	</div>
  </div>
  
  <br>
  
  <div class="row">
    <div class="col-md-12">
      <div class="input-group">
	    <label class="input-group input-group-addon"><b class="glyphicon glyphicon-log-in"></b></label>
	    <input type="password" class="form-control" name="senha" id="cmpSenha" placeholder="Senha --> *****">
      </div>
	</div>
  </div>
  
  <div class="row">
	<div class="col-md-12 text-right">
	  <a href="index.php">Voltar para página inicial?</a>
	</div>
	
  </div>
  
  <br>
  
  <div class="row">
    <div class="col-md-12 text-right">
	  <button class="btn btn-default" id="btnLogin1">Login</button>
	</div>
  </div>
  </form>
</div>

</body>
</html>