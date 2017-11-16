<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro - Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require '../conexoes/conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$id    = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$creci   = (isset($_POST['creci'])) ? $_POST['creci'] : '';
		$cnai   = (isset($_POST['cnai'])) ? $_POST['cnai'] : '';
		$email = (isset($_POST['email'])) ? $_POST['email'] : '';
		$foto_atual	  = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
		
		$data_nascimento  = (isset($_POST['datacad'])) ? $_POST['datacad'] : '';
		
		$telefone = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
		$celular  = (isset($_POST['celular'])) ? str_replace(array('-', ' '), '', $_POST['celular']) : '';
		$funcao   = (isset($_POST['funcao'])) ? $_POST['funcao'] : '';
		$login   = (isset($_POST['login'])) ? $_POST['login'] : '';
		$senha   = (isset($_POST['senha'])) ? $_POST['senha'] : '';
		$cidade   = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
		
		$status   = (isset($_POST['status'])) ? $_POST['status'] : '';
   

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;


			if ($email == ''):
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)):
				  $mensagem .= '<li>Formato do E-mail inválido.</li>';
			endif;

	/*		if ($data_nascimento == ''): 		
				$mensagem .= '<li>Favor preencher a Data de Nascimento.</li>';
			else:
				$data = explode('/', $data_nascimento);
				if (!checkdate($data[1], $data[0], $data[2])):
					$mensagem .= '<li>Formato da Data de Nascimento inválido.</li>';
				endif;
			endif;

*/
			if ($celular == ''):
				$mensagem .= '<li>Favor preencher o Celular.</li>';
			elseif(strlen($celular) < 11):
				  $mensagem .= '<li>Formato do Celular inválido.</li>';
			endif;

			if ($status == ''):
			   $mensagem .= '<li>Favor preencher o Status.</li>';
			endif;
			
			if ($cidade == ''):
			   $mensagem .= '<li>Favor selecione a Cidade.</li>';
			endif;

			if ($login == ''):
			   $mensagem .= '<li>Favor preencher o login.</li>';
			endif;
				if ($senha == ''):
			   $mensagem .= '<li>Favor preencher a senha.</li>';
			endif;
			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

			// Constrói a data no formato ANSI yyyy/mm/dd
			$data_temp = explode('/', $data_nascimento);
			$data_ansi = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$nome_foto = 'padrao.jpg';
			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;  
			endif;

			$sql = 'INSERT INTO usuario (nome, creci, funcao,email,fonecel,foneres,login,senha,foto,cidade,status,cnai, datacad)
							   VALUES  (:nome,:creci,:funcao,:email,:fonecel,:foneres,:login,:senha,:foto,:cidade,:status,:cnai,:datacad)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':creci', $creci);
			$stm->bindValue(':funcao', $funcao);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':fonecel', $celular);
			$stm->bindValue(':foneres', $telefone);
			$stm->bindValue(':login', $login);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':cnai', $cnai);
			$stm->bindValue(':datacad', $data_ansi);
			$stm->bindValue(':foto', $nome_foto);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0): 

				// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
				if ($foto_atual <> 'padrao.jpg'):
					unlink("fotos/" . $foto_atual);
				endif;

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;
			else:
               
			 	$nome_foto = $foto_atual;
                
			endif;
																				
			$sql = 'UPDATE usuario SET nome=:nome, creci=:creci, funcao=:funcao, email=:email, fonecel=:celular, foneres=:telefone, login=:login, senha=:senha, foto=:foto, cidade=:cidade, cnai=:cnai, datacad=:datacad';
			$sql .= ' WHERE idusu = :id';
             /*var_dump($sql);*/
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':creci', $creci);
			$stm->bindValue(':funcao', $funcao);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':login', $login);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':cnai', $cnai);
			$stm->bindValue(':datacad', $data_ansi);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
          

		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir'):

			// Captura o nome da foto para excluir da pasta
			$sql = "SELECT foto FROM usuario WHERE idusu = :id AND foto <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->execute();
			$cliente = $stm->fetch(PDO::FETCH_OBJ);

			if (!empty($cliente) && file_exists('fotos/'.$cliente->foto)):
				unlink("fotos/" . $cliente->foto);
			endif;

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM usuario WHERE idusu = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
	
		?>

	</div>
</body>
</html>