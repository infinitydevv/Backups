<?php
 $nomeBanco = "radari";
  $conexao = @mysql_connect("localhost","root","");
  mysql_select_db($nomeBanco, $conexao);

$busca = $_POST['palavra'];// palavra que o usuario digitou
$categoria = $_POST['categoria']; //categoria que o usuario deseja

$busca_query = mysql_query("SELECT * FROM usuario WHERE nome LIKE '%$busca%' AND tipo = '$categoria'")or die(mysql_error());//faz a busca com as palavras enviadas

if (empty($busca_query)) { //Se nao achar nada, lança essa mensagem
    echo "Nenhum registro encontrado.";
}

// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = @mysql_fetch_array($busca_query)) {
    echo "Id do usuário: $dados[idusu]<br />"; 
    echo "Nome do usuário: $dados[nome]<br />";
    echo "Celular: $dados[fonecel]<br />";
    echo "Fone Residencial: $dados[foneres]<br />";
    echo "<hr>";
}
?>