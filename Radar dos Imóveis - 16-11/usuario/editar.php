<?php
	require '../conexoes/conexao.php';
	@session_start();
    require "../login/functions.php";
    require "../login/functions-cliente.php";
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
// Recebe o id do cliente do cliente via GET
$idusu = (isset($_GET['idusu'])) ? $_GET['idusu'] : '';
// Valida se existe um id e se ele é numérico
if (!empty($idusu) && is_numeric($idusu)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM usuario WHERE idusu = :idusu';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idusu', $idusu);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($cliente)):
         
		// Formata a data no formato nacional
		$array_data     = explode('-', $cliente->datacad);
		
		$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
         // 
	endif;

endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Usuário</title>
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Usuário</h1></legend>
			
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Usuário não encontrado!</h3>
			<?php else: ?>
				<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
				      	<div class="col-md-2">
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?=$cliente->foto?>" height="190" width="150" id="foto-cliente">
						    </a>
					  	</div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  	</div>

				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$cliente->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>
					<div class="form-group">
				      <label for="creci">CRECI</label>
				      <input type="text" class="form-control" id="creci" name="creci" value="<?=$cliente->creci?>" placeholder="Infome o CRECI">
				      <span class='msg-erro msg-creci'></span>
				    </div>
					
					<div class="form-group">
					<label for="tipo">Função:</label>
						<select name="funcao" class="form-control" id="funcao">
						      <option value = "<?=$cliente->funcao?>"><?=$cliente->funcao?></option>;
				              <option value = 'Avaliador'>Avaliador</option>; 
							  <option value = 'Captador'>Captador</option>;
							  <option value = 'Corretor'>Corretor</option>;
							  <option value = 'Franqueado'>Franqueado</option>;
						      <option value = 'Usuário'>Usuário</option>; 
						</select>
				</div>
					
				    <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$cliente->email?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>

				    <div class="form-group">
				      <label for="fonececel">CELULAR:</label>
				      <input type="text" class="form-control" id="celular" maxlength="14" name="celular" value="<?=$cliente->fonecel?>" placeholder="Informe o Celular">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					 <div class="form-group">
				      <label for="foneres">Telefone Fixo:</label>
				      <input type="text" class="form-control" id="telefone" maxlength="14" name="telefone" value="<?=$cliente->foneres?>" placeholder="Informe o Telefone Fixo">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
				    <div class="form-group">
				      <label for="data_nascimento">Data de Cadastro</label>
				      <input type="text" class="form-control" id="datacad" maxlength="10" value="<?=$data_formatada?>" name="datacad">
				      <span class='msg-erro msg-datacad'></span>
				    </div>
				    <div class="form-group">
				      <label for="login">Login</label>
				      <input type="text" class="form-control" id="login" maxlength="12" name="login" value="<?=$cliente->login?>" placeholder="Informe o Login">
				      <span class='msg-erro msg-login'></span>
				    </div>
				    <div class="form-group">
				      <label for="senha">Senha</label>
				      <input type="password" class="form-control" id="senha" maxlength="20" name="senha" value="<?=$cliente->senha?>" placeholder="Informe o Senha">
				      <span class='msg-erro msg-senha'></span>
				    </div>
					  <div class="form-group">
				      <label for="cnai">CNAI</label>
				      <input type="text" class="form-control" id="cnai" maxlength="20" name="cnai" value="<?=$cliente->cnai?>" placeholder="Informe o CNAI">
				      <span class='msg-erro msg-cnai'></span>
				    </div>
				    <div class="form-group">
				      <label for="status">Status</label>
				      <select class="form-control" name="status" id="status">
					    <option value="<?=$cliente->status?>"><?=$cliente->status?></option>
					    <option value="Ativo">Ativo</option>
					    <option value="Inativo">Inativo</option>
					  </select>
					  <span class='msg-erro msg-status'></span>
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
					
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$cliente->idusu?>">
				    <input type="hidden" name="foto_atual" value="<?=$cliente->foto?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='index.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>