<?php 
  $nomeBanco = "radar";
  $conexao = @mysql_connect("localhost","root","");
  mysql_select_db($nomeBanco, $conexao);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cadastro de Usuários - Radar dos Imóveis</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style=" background: url(img/bg.jpg) repeat center center scroll;">



<!-- Start Formoid form-->
<link rel="stylesheet" href="cadu_files/formoid1/formoid-solid-light-green.css" type="text/css" />
 <link href="css/stylish-portfolio.css" rel="stylesheet">
<script type="text/javascript" src="cadu_files/formoid1/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-light-green" 
           style="background-color:#dfdfdf;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" 
		   method="post" action="salvarusu.php">
	<div class="title"><h2>Cadastro de Usuário</h2></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="nomeusu" placeholder="Nome do usuário"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="emailusu" placeholder="E-mail"/><span class="icon-place"></span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="loginusu" placeholder="Login"/><span class="icon-place"></span></div></div>
	<div class="element-password"><label class="title"></label><div class="item-cont"><input class="large" type="password" name="senhausu" value="" placeholder="Senha"/><span class="icon-place"></span></div></div>
	<div class="element-date"><label class="title"></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="dataaniusu" placeholder="Data de Nascimento"/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="foneresusu" placeholder="Fone Residencial" value=""/><span class="icon-place"></span></div></div>
	<div class="element-phone"><label class="title"></label><div class="item-cont"><input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="fonecelusu" placeholder="Fone Celular" value=""/><span class="icon-place"></span></div></div>
	<div class="element-select"><label class="title"></label><div class="item-cont"><div class="large"><span><select name="tipousu" >
 
	<?php
           $sql = "select * from tipousuario";
           $resultado = mysql_query($sql,$conexao);	
           while($dados = mysql_fetch_array($resultado)){
			   $codigo = $dados['idtipousu'];
			   $tipousu = $dados['tipo'];
			   echo"<option value = '$codigo'>$tipousu</option>";
			   
		   }		   
		?>
	   <option value="Selecione uma Opção">
	  <!--	<option value="option 1">option 1</option>
		<option value="option 2">option 2</option>
		<option value="option 3">option 3</option> --></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-file"><label class="title"></label><div class="item-cont"><label class="large" ><div class="button">Selecione a foto</div><input type="file" class="file_input" name="foto" /><div class="file_text">Nada Selecionado</div><span class="icon-place"></span></label></div></div>
<div class="submit"><input type="submit" value="Salvar" name="botao"/> <p class="frmd"><a href="http://formoid.com/v29.php">html forms</a> Formoid.com 2.9</p><script type="text/javascript" src="cadu_files/formoid1/formoid-solid-light-green.js"></script></div></div>
</form>

<!-- Stop Formoid form-->



</body>
</html>
