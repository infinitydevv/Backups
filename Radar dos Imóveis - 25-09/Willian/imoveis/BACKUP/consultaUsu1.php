<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jeferson Leon">

    <title>Consulta de Usuários</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="shadowbox/jquery.js" ></script>
    <script type="text/javascript" src="shadowbox/shadowbox.js" ></script>
    <link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css" />

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <script type="text/javascript">
		Shadowbox.init({
		language: 'pt',
		players: ['img'],
		});
</script>

</head>

<body>

    <center><img id="icone" width="100px" height="100px" src = "img/bgC1.png"/></center>
  

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Radar dos Imóveis</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                        <a href="logout.php">Sair</a>
                    </li>

					<li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Cadastro</a>						
						<ul class="dropdown-menu">
						<li><a href="cad.php">Cadastro de Usuários</a></li>
						<li><a href="cadapto.php">Cadastro de Apartamentos</a>
						<li><a href="cad.php"> Cadastro de Casas</a></li>
						<li><a href="cad.php"> Cadastro de Terrenos</a></li>
						<li><a href="cad.php"> Cadastro de imóveis Rurais</a></li></li>
						
				</ul></li>
                    </li>
					
					  <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Consultas</a>
						<ul class="dropdown-menu">
						<li><a href="#">Consulta de Apartamentos</a></li>
						<li><a href="#">Consulta de Casas</a></li>
						<li><a href="#">Consulta de Terrenos</a></li>
						<li><a href="#">Consulta de Imóveis Rurais</a></li>
						<li><a href="consultaUsu.php"> Consulta de Usuários</a></li>
				</ul></li>
                    </li> 
					
                    <li>
                        <a href="#">Sobre</a>
                    </li>         
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
			
			
			
			
			
			
			
			
        </div>
        <!-- /.container -->
    </nav>
		
		

	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                 
					<?php
						 //conexão com o banco de dados
       						 @mysql_connect("mysql.radardosimoveis.com.br","radardosimovei","Radar2015");
        					 @mysql_select_db("radardosimovei");
					 
						//verifica a página atual caso seja informada na URL, senão atribui como 1ª página
							$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
					 
						//seleciona todos os itens da tabela
							$cmd = "select * from usuario";
							$usu = @mysql_query($cmd);
					   
						//conta o total de itens
							$total = @mysql_num_rows($usu);
					   
						//seta a quantidade de itens por página, neste caso, 2 itens
							$registros = 4;
					   
						//calcula o número de páginas arredondando o resultado para cima
							$numPaginas = ceil($total/$registros);
					   
						//variavel para calcular o início da visualização com base na página atual
							$inicio = ($registros*$pagina)-$registros;
					 
						//seleciona os itens por página
							$cmd = "select * from usuario limit $inicio,$registros";
							$usu = @mysql_query($cmd);
							$total = @mysql_num_rows($usu);
					 
						//exibe os produtos selecionados
						echo "<center><table id='tabela'> 
								   <tr>
									 <td class='titulo'>ID</td>
									 <td class='titulo'>NOME</td>
									 <td class='titulo'>E-MAIL</td>
									 <td class='titulo'>DATA NASCIMENTO</td>
									 <td class='titulo'>CELULAR</td>
									 <td class='titulo'>FONE RESID.</td>
									 <td class='titulo'>FOTO</td>
									 <td class='titulo'>CRECI</td>
									 </tr>";
									 $linha = 1;
							while ($usuario = @mysql_fetch_array($usu)) {
								if($linha % 2 != 0 ){
								echo "<tr><td class='cont'>".$usuario['idusu']."</td>";
								echo "<td class='cont'>".$usuario['nome']."</td>";
								echo "<td class='cont'>".$usuario['email']."</td>";
								echo "<td class='cont'>".$usuario['dataaniversario']."</td>";
								echo "<td class='cont'>".$usuario['fonecel']."</td>";
								echo "<td class='cont'>".$usuario['foneres']."</td>";
								$imagem = $usuario['foto'];       
								echo "<td class='cont'> <a title=$linha href='$imagem' rel='shadowbox[vocation]' > <img src='$imagem' width='50' height='50'\> </td>";	
								echo "<td class='cont'>".$usuario['creci']."</td></tr>";
								
								
								
								}else{
								echo "<tr><td class='cont1'>".$usuario['idusu']."</td>";
								echo "<td class='cont1'>".$usuario['nome']."</td>";
								echo "<td class='cont1'>".$usuario['email']."</td>";
								echo "<td class='cont1'>".$usuario['dataaniversario']."</td>";
								echo "<td class='cont1'>".$usuario['fonecel']."</td>";
								echo "<td class='cont1'>".$usuario['foneres']."</td>";
								$imagem = $usuario['foto'];                           								
							        echo "<td class='cont1'> <a title=$linha href='$imagem' rel='shadowbox[vocation]' > <img src='$imagem' width='50' height='50'\> </td>";
								echo "<td class='cont1'>".$usuario['creci']."</td></tr>";
									
								}
								$linha++;
								
							}
						echo"</table></center>";
						//exibe a paginação
						echo"<div id='numero'>";
							for($i = 1; $i < $numPaginas + 1; $i++) {
								 echo "<a href='consultaUsu.php?pagina=$i'>".$i."</a> ";
							}
						echo"</div>";
					?>	
				</div>
			</div>
	</div>
	
	
	
	<?php include "rodape.php";?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	<style>
	#galeria img{width:100px;height:400px;display:block;}
	</style>

</body>

</html>



