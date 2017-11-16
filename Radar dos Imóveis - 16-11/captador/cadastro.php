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
			<legend><h1>Formulário - Cadastro de Captador</h1></legend>
			
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
			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>