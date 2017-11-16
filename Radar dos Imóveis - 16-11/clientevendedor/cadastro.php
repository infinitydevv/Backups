<?php 
    @session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
    require_once '../conexoes/conexao.php';
    $conexao = Conexao::getInstance();
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=login.php'/>";
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
			<legend><h1>Formulário - Cadastro de Cliente Vendedor</h1></legend>
			
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
				

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
			      <label for="cpf">CPF</label>
			      <input type="creci" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF">
			      <span class='msg-erro msg-cpf'></span>
			    </div>
				<div class="form-group">
			      <label for="cnpj">CNPJ</label>
			      <input type="text" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="Informe o CNPJ">
			      <span class='msg-erro msg-cnai'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="telefone">Telefone Fixo</label>
			      <input type="text" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone Fixo">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
			    <div class="form-group">
			      <label for="celular">Celular</label>
			      <input type="text" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Telefone Celular">
			      <span class='msg-erro msg-celular'></span>
			    </div>
				<div class="form-group">
			      <label for="logradouro">Logradouro</label>
			      <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe o E-logradouro">
			      <span class='msg-erro msg-logradouro'></span>
			    </div>
				<div class="form-group">
			      <label for="numero">Número</label>
			      <input type="text" class="form-control" id="numero" name="numero" placeholder="Informe o Número">
			      <span class='msg-erro msg-numero'></span>
			    </div>
				<div class="form-group">
			      <label for="cep">CEP</label>
			      <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP">
			      <span class='msg-erro msg-cep'></span>
			    </div>
				
				<div class="form-group">
			      <label for="bairro">Bairro</label>
			      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o Bairro">
			      <span class='msg-erro msg-bairro'></span>
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
			      <label for="conjuge">Conjuge</label>
			      <input type="text" class="form-control" id="conjuge" name="conjuge" placeholder="Informe o Conjuge">
			      <span class='msg-erro msg-conjuge'></span>
			    </div>
				<div class="form-group">
			      <label for="cpfconjuge">CPF do Conjuge</label>
			      <input type="text" class="form-control" id="cpfconjuge" name="cpfconjuge" placeholder="Informe o CPF do Conjuge">
			      <span class='msg-erro msg-cpfconjuge'></span>
			    </div>
				<div class="form-group">
					<label for="pessoacontato">Pessoa Contato:</label>
					<input type="text" class="form-control" id="pessoacontato"  maxlength="15" name="pessoacontato" placeholder="Informe a Pessoa de Contato">
				</div>
				<div class="form-group">
					<label for="tipo">Status:</label>
						<select name="status" class="form-control" id="status">
				              <option value = 'Ativo'>Ativo</option>;
							  <option value = 'Inativo'>Inativo</option>;
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
				
				<div class="form-group">
					<label for="comment">Observações:</label>
					<textarea class="form-control ckeditor" rows="5" name="obs" placeholder="Observações"></textarea>
       
				</div>
				
				
				
			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'>Gravar</button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script src="script.js"></script>
</body>
</html>