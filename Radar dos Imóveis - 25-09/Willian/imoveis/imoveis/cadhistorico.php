<?php


    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';
	$con = new conexao(); // instancia classe de conexao
    $con->connect(); // abre conexao com o banco
	@$getId = $_GET['idhistorico'];  //pega id para ediçao caso exista
	@$getIdimo = $_GET['idimo'];  //pega id para ediçao caso exista
     if(@$getId){ 
        $consulta = mysql_query("SELECT * FROM historico WHERE idhistorico = + $getId"); 
        $campo = mysql_fetch_array($consulta);
		
		
    }
	
	if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
         $data = $_POST['datahis'];
		$descricao = $_POST['descricao'];
		$idimo = $_POST['idimo'];
		$idcliven = $_POST['idcliven'];
		
		
		
		$crud = new crud('historico');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro//****************************************************OPA***********************************************
        $crud->inserir("data,descricao,idimo,idcliven", "'$data','$descricao','$idimo','$idcliven'"); // utiliza a funçao INSERIR da classe crud //****************************************************OPA***********************************************
        header("Location: historico.php?idimo=$idimo"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
         $data = $_POST['datahis'];
		$descricao = $_POST['descricao'];
		
		
		
		
		$crud = new crud('historico'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro //****************************************************OPA***********************************************
        $crud->atualizar("data='$data',descricao='$descricao'", "idhistorico='$getId'"); // utiliza a funçao ATUALIZAR da classe crud //****************************************************OPA***********************************************
        header("Location: historico.php"); // redireciona para a listagem
    }
	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro de Fretes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/meuestilo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
  <div class="container">
   
     <div class="col-md-6 col-md-offset-3">       
	 <div class="teste">
		<h2>Cadastro de Históricos</h2>
	 <form action="" method="post">
			
				
					
			
			
	
			<div class="form-group">
		   <label>Data:</label>
		   <br>
            <input  class="form-control"type="date" name="datahis" value="<?php echo @$campo['data']; // trazendo campo preenchido caso esteja no modo de ediçao ?>" /> <!--****************************************************OPA***********************************************-->
            

		  </div>
		   <br>
			
		
			
			<div class="form-group">
			<label>Descrição:</label>
			<br>
			<textarea name="descricao" class="form-control" rows="3"><?php echo @$campo['descricao'];?></textarea>
		
			
			 </div>
			  <br>
			  <br>
			 <br>
			 <br>
			
            <?php
                if(@!$campo['idhistorico']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
            ?>
                <input type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar" />
            <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
                <input type="submit" class="btn btn-primary" name="editar" value="Editar" />    
            <?php } ?>
            
			<a class="btn btn-primary" href="index.php">Cancelar</a>
			<?php
			 if(@$getIdimo){ 
			 ?>
			<a class="btn btn-primary" href="historico.php?idimo=<?php echo $getIdimo ?>">Listagem</a>
			<?php
			}else{
				?>
				<a class="btn btn-primary" href="historico.php?idimo=<?php echo $campo['idimo']; ?>">Listagem</a>
				
			<?php } ?>
			<?php
		    if(@$getId == 0){ 
			 $consulta = mysql_query("SELECT * FROM imovel WHERE idimo = + $getIdimo"); 
			$campo = mysql_fetch_array($consulta);
			?>
			<input  class="form-control"type="hidden" name="idimo" value="<?php echo $campo['idimo'];  ?>" /> 
			<input  class="form-control"type="hidden" name="idcliven" value="<?php echo $campo['idcliven'];  ?>" /> 
			   <?php }else{?>
			<input  class="form-control"type="hidden" name="idimo" value="<?php echo $campo['idimo'];  ?>" />
			<input  class="form-control"type="hidden" name="idcliven" value="<?php echo $campo['idcliven'];  ?>" />
			<?php } ?>
        </form>
		</div>
		
		</div>
		</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	 <script src="bootstrap/js/jquery.js"></script>
  </body>
</html>