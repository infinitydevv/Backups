<?php 
// vamos pegar o valor campo do formulário chamado 'q', se houver sido preenchido 
// caso contrário, o script voltará à página anterior 
$busca = !is_null($_GET['q']) ? $_GET['q'] : die('<script> history.go(-1); </script>'); 
// agora, vamos nos proteger de SQLi 
$busca = mysql_real_escape_string($busca); 
// e também de XSS Reflected 
$busca = htmlspecialchars($busca); 
// e pegar a página 
$page = is_numeric($_GET['p']) ? $_GET['p']-1 : 0; 

// quantos resultados por página nós exibiremos? 
$qnt = 10; 

// agora vamos fazer a conexão ao banco de dados 
mysql_connect('localhost', 'usuario', 'senha'); // configure corretamente 
// e selecionar a base de dados em que há a tabela 'noticias' 
mysql_select_db('gh_busca'); // configure com sua base de dados 
// tudo ok?