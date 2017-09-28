<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
	@$getIdimo = $_GET['idimo'];  //pega id para ediçao caso exista
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Históricos</title>

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
					<legend><h1>Listagem dos Históricos <img id="icone" width="50px" height="50px" src = "../img/logonovo.png"/> <a href='index.php' class="btn btn-success pull-right">Retornar</a><br></h1></legend>

		<div class="teste1">
      
	   
	   
	   <form action="" method="POST">
	    
	   <div class="form-group">
	   <input type="text" class="form-control" name="termo" placeholder="Pesquisar">
	   </div>
	    <div class="select1">
	   <select class="form-control" name="tipo">
			<option value="1">ID</option>
			<option value="2">Vendedor</option>
			
	   
	   </select>
	   </div>
	   <input type="submit" class="btn btn-primary" value="Pesquisar" name='enviar'>
	   
	   <input type="submit"  class="btn btn-primary" value="Ver Tudo" name='tudo'>
		
		 
	   <br>
	   <div class="novo">
	   <a class="btn btn-success" href="cadhistorico.php?idimo=<?php echo @$getIdimo ?>">Novo Cadastro </a>
	   </div>
	   <br>
	   
	   </form>
	   <div class="table-responsive">
        <table class="table table-bordered  table-hover table-condensed ">
         
			
				<tr>
                    <th>
                         ID
                    </th>
					<th>
                        Data
                    </th>
					<th>
                       Descrição
                    </th>
					
					<th>
						Imovel
                    </th>
					<th>
						Vendedor	
                    </th>   
										
					<th>
						Editar
                    </th>
					<th>
						Excluir
                    </th>   					
                    
					
                </tr>
				<?php
		if(isset ($_POST['tudo'])){
			$consulta = mysql_query("select h.idhistorico,h.data,h.descricao,h.idimo,c.nome from historico h inner join clientevendedor c on h.idcliven = c.idcliven where idimo=$getIdimo");

			}
		if(isset ($_POST['enviar'])){
				$tipo = $_POST['tipo'];
				$termo = $_POST['termo'];
			
				if($tipo==1){
				$sql ="select h.idhistorico,h.data,h.descricao,h.idimo,c.nome from historico h inner join clientevendedor c on h.idcliven = c.idcliven where h.idhistorico LIKE '$termo%' "; 
				
				$consulta = mysql_query($sql); 
				
			    }else{
				$sql = "select h.idhistorico,h.data,h.descricao,h.idimo,c.nome from historico h inner join clientevendedor c on h.idcliven = c.idcliven  where c.nome LIKE '$termo%' ";
				$consulta = mysql_query($sql); 
				}
				}else{
				$consulta = mysql_query("select h.idhistorico,h.data,h.descricao,h.idimo,c.nome from historico h inner join clientevendedor c on h.idcliven = c.idcliven where idimo=$getIdimo");
				}
                    while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                ?>
				<tr>
                        <td>
                            <?php echo $campo['idhistorico'];  ?> 
                        </td>
						 <td>
                            <?php echo $campo['data']; ?> 
                        </td>
						 <td>
                            <?php echo $campo['descricao']; ?> 
                        </td>
						 
						 <td>
                            <?php echo $campo['idimo'];  ?>
                        </td>
						<td>
                            <?php echo $campo['nome'];  ?> 
                        </td>
						
						<td>
                            <a class="btn btn-primary" href="cadhistorico.php?idhistorico=<?php echo $campo['idhistorico']; //pega o campo ID para a ediçao ?>"> 
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="excluirhis.php?id=<?php echo $campo['idhistorico'];  //pega o campo ID para a exclusao ?>"> 
                                Excluir
                            </a>
                        </td>
					   
                    </tr>
				<?php	
				}
		    ?>
			
			 </table>
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