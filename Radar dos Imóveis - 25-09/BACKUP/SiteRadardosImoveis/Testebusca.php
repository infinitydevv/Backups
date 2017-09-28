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
<script type="text/javascript" src="shadowbox/jquery.js" ></script>
<script type="text/javascript" src="shadowbox/shadowbox.js" ></script>
<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

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

<br>
<br>
<form action="Buscar.php" method="post">
<input type="text" name="palavra" />
<select name="categoria">
  <option value="1">Esteio</option>
  <option value="2">Sapucaia do Sul</option>
  <option value="3">Sao Leopoldo</option>
</select>
<input type="submit" Value="Buscar" />
</form>
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
