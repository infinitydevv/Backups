


<?php
// Conexão com o banco de dados
$conn = @mysql_connect("localhost", "root", "") or die ("Problemas na conexão.");
$db = @mysql_select_db("radari", $conn) or die ("Problemas na conexão");

$arq_name = $_FILES['arq']['name']; //O nome do ficheiro
$arq_size = $_FILES['arq']['size']; //O tamanho do ficheiro
$arq_tmp = $_FILES['arq']['tmp_name']; //O nome temporário do arquivo
$arq1_name = "upload/".$arq_name;

//grava no DB
@mysql_query("INSERT INTO usuario (idusu,nome,creci,dataaniversario,email,fonecel,foneres,login,senha,foto,tipo)
          VALUES (null,'$teste','teste','2000-01-01','teste@test.com','4040404040','50505050','je','1','$arq1_name','1')");

//Aqui Grava a imagem a diretória desejada, na esquecer de dar as permissões no servido
move_uploaded_file($arq_tmp, "upload/".$arq_name);
?>