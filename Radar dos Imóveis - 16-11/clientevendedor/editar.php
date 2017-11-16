<?php
require '../conexoes/conexao.php';
    @session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
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
// Recebe o id do cliente do cliente via GET
$id = (isset($_GET['idcliven'])) ? $_GET['idcliven'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM clientevendedor WHERE idcliven = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);



endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Cliente Vendedor</title>
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Cliente Vendedor</h1></legend>
			
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Cliente não encontrado!</h3>
			<?php else: ?>
				<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
					

				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$cliente->nomecliven?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>
					<div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$cliente->cpf?>" placeholder="Infome o CPF">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
					
					<div class="form-group">
				      <label for="cnpj">CNPJ</label>
				      <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?=$cliente->cnpj?>" placeholder="Infome o CNPJ">
				      <span class='msg-erro msg-cnpj'></span>
				    </div>
					
				    <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$cliente->email?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				      <div id="rs"></div>
				    </div>

				    <div class="form-group">
				      <label for="fonececel">Celular:</label>
				      <input type="text" class="form-control" id="celular" maxlength="14" name="celular" value="<?=$cliente->celular?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					 <div class="form-group">
				      <label for="foneres">Telefone Fixo</label>
				      <input type="text" class="form-control" id="telefone" maxlength="14" name="telefone" value="<?=$cliente->telefone?>" placeholder="Informe o Telefone Fixo">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
				    <div class="form-group">
				      <label for="logradouro">Logradouro</label>
				      <input type="text" class="form-control" id="logradouro" maxlength="200" value="<?=$cliente->logradouro?>" name="logradouro">
				      <span class='msg-erro msg-datacad'></span>
				    </div>
					<div class="form-group">
				      <label for="numero">Número</label>
				      <input type="text" class="form-control" id="numero" maxlength="10" value="<?=$cliente->numero?>" name="numero">
				      <span class='msg-erro msg-numero'></span>
				    </div>
					<div class="form-group">
				      <label for="cep">CEP</label>
				      <input type="text" class="form-control" id="cep" maxlength="10" value="<?=$cliente->cep?>" name="cep">
				      <span class='msg-erro msg-cep'></span>
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
				    <label for="bairro">Bairro</label>
				    <input type="text" class="form-control" id="bairro" maxlength="20" name="bairro" value="<?=$cliente->bairro?>" placeholder="Informe o Bairro">
				    <span class='msg-erro msg-bairro'></span>
				</div>
				<div class="form-group">
				    <label for="conjuge">Conjuge</label>
				    <input type="text" class="form-control" id="conjuge" maxlength="20" name="conjuge" value="<?=$cliente->conjuge?>" placeholder="Informe o Conjuge">
				    <span class='msg-erro msg-conjuge'></span>
				</div>
				<div class="form-group">
				    <label for="cpfconjuge">CPF do Conjuge</label>
				    <input type="text" class="form-control" id="cpfconjuge" maxlength="20" name="cpfconjuge" value="<?=$cliente->cpfconjuge?>" placeholder="Informe o CPF do Conjuge">
				    <span class='msg-erro msg-cpfconjuge'></span>
				</div>
				<div class="form-group">
				    <label for="pessoacontato">Pessoa Contato</label>
				    <input type="text" class="form-control" id="pessoacontato" maxlength="20" name="pessoacontato" value="<?=$cliente->pessoacontato?>" placeholder="Informe o pessoacontato">
				    <span class='msg-erro msg-pessoacontato'></span>
				</div>
				<div class="form-group">
				      <label for="login">Login</label>
				      <input type="text" class="form-control" id="login" maxlength="12" name="login" value="<?=$cliente->login?>" placeholder="Informe o Login">
				      <span class='msg-erro msg-login'></span>
				      <div id="rs1"></div>
				    </div>
				    <div class="form-group">
				      <label for="senha">Senha</label>
				      <input type="password" class="form-control" id="senha" maxlength="20" name="senha" value="<?=$cliente->senha?>" placeholder="Informe o Senha">
				      <span class='msg-erro msg-senha'></span>
				    </div>
					
				    <div class="form-group">
				      <label for="status">Status</label>
						<select name="status" class="form-control" id="status">
							<?php 
								if($cliente->status == "Ativo"){
									echo "<option value = 'Ativo' selected>Ativo</option>;
							  		<option value = 'Inativo'>Inativo</option>";
								}else{
									echo "<option value = 'Ativo'>Ativo</option>;
							  		<option value = 'Inativo' selected>Inativo</option>";
								}
							?>
						</select>
					  <span class='msg-erro msg-status'></span>
				    </div>		
					<div class="form-group">
						<label for="comment">Observações:</label>
					<textarea class="form-control ckeditor" rows="5" name="obs"  placeholder="Observações"><?=$cliente->obs?></textarea>
       
				</div>
					
					
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$cliente->idcliven?>">
				    <input type="hidden" name="foto_atual" value="<?=$cliente->foto?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='index.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
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