<?php
	$para = "glauberfgv1@gmail.com; glauber@solutionadvice.com.br";
	$assunto = "Contato pelo Site";
	$nome = $_REQUEST['nome'];
	$email = $_REQUEST['email'];
	$telefone = $_REQUEST['telefone'];
	$textodamensagem = $_REQUEST['textodamensagem'];
	$corpo = "<strong> Mensagem de Contatos:</strong><br><br>";
	$corpo .= "<strong> Nome:</strong> $nome <br>";
	$corpo .= "<strong> E-mail:</strong> $email <br>";
	$corpo .= "<strong> Telefone:</strong>$telefone <br>";
	$corpo .= "<strong> Mensagem:</strong>$textodamensagem <br>";
	$header ="Content-Type: text/html; charset= utf-8 \n";
	$header .="From: $email Reply-to:$email";
	@mail($para, $assunto,$corpo, $header);
	header("location:index.php?msg=enviado");
?>