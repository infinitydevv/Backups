<?php 
	@session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
    require_once '../conexoes/conexao.php';
    $conexao = Conexao::getInstance();
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Usuários</h1></legend>
			
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					      <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
					    </a>
				  	</div>
				  	<input type="file" name="foto" id="foto" value="foto" >
			  	</div>

			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-email'></span>
			      <div id="rs"></div>
			    </div>

			    <div class="form-group">
			      <label for="cpf">CRECI</label>
			      <input type="creci" class="form-control" id="creci" maxlength="9" name="creci" placeholder="Informe o CRECI">
			      <span class='msg-erro msg-creci'></span>
			    </div>
				<div class="form-group">
			      <label for="cpf">CNAI</label>
			      <input type="cnai" class="form-control" id="cnai" maxlength="9" name="cnai" placeholder="Informe o CNAI">
			      <span class='msg-erro msg-cnai'></span>
			    </div>
			    <div class="form-group">
			      <label for="data_nascimento">Data de Cadastro</label>
			      <input type="datacad" class="form-control" id="datacad" maxlength="10" name="datacad">
			      <span class='msg-erro msg-data'></span>
			    </div>
			    <div class="form-group">
			      <label for="telefone">Telefone Fixo</label>
			      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone Fixo">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
			    <div class="form-group">
			      <label for="celular">Celular</label>
			      <input type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Telefone Celular">
			      <span class='msg-erro msg-celular'></span>
			    </div>
				<div class="form-group">
					<label for="tipo">Função:</label>
						<select name="funcao" class="form-control" id="funcao"> 
							  <option value = 'Avaliador'>Avaliador</option>; 
							  <option value = 'Captador'>Captador</option>;
							  <option value = 'Corretor'>Corretor</option>;
							  <option value = 'Franqueado'>Franqueado</option>;
						      <option value = 'Usuário'>Usuário</option>; 
						</select>
				</div>
				<div class="form-group">
					<label for="tipo">Status:</label>
						<select name="status" class="form-control" id="status">
				              <option value = 'Ativo'>Ativo</option>;
							  <option value = 'Inativo'>Inativo</option>;
						</select>
				</div>	  
				<div class="form-group">
					<label for="tipo">Cidade:</label>
						<select name="cidade" class="form-control" id="cidade">
							  		<?php
										$sql = "SELECT * from cidade c inner join estado e on c.estado = e.id where c.estado = 23";
										$stmt = $conexao->prepare($sql);
										$stmt->execute();
										$rs = $stmt->fetchAll(PDO::FETCH_OBJ);

										foreach ($rs as $city) {
											if($city->idcity == $cliente->cidade){
												echo '<option value="'.$city->idcity.'" selected>'.$city->nomecity.'</option>';
											}else{
												echo '<option value="'.$city->idcity.'">'.$city->nomecity.'</option>';
											}
										}
									?>
						</select>
				</div>

				<div class="form-group">
					<label for="login">Login:</label>
					<input type="text" class="form-control" id="login"  maxlength="15" name="login">
					<div id="rs1"></div>
				</div>

				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control" id="senha" name="senha" maxlength="8">
				</div>
			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script src='script.js'></script>
</body>
</html>