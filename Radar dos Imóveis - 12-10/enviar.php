<?php
$para = "jeferson@professorjefersonleon.com.br";
$assunto = "Contato de venda";
$nome = $_REQUEST['nome'];
$fone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];
$msg = $_REQUEST['assunto'];

$corpo  = "<strong> Mensagem de contato</strong><br><br>";
$corpo .= "<strong>Nome: </strong> $nome";
$corpo .= "<br><strong>Fone: </strong> $fone";
$corpo .= "<br><strong>E-mail: </strong> $email";
$corpo .= "<br><strong>Mensagem: </strong> $msg";


$header ="Content-type: text/html; charset=utf-8\n";
$header .= "From: $email reply-to: $email\n";

mail($para,$assunto,$corpo,$header);
header("location:index.php");


?>