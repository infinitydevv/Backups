<?php

session_start();

//if (!isset($_REQUEST['logmeout'])){

//echo "Você realmente deseja sair da área restrita?<br />";

//echo "<meta charset='utf-8'>";
//echo "<a href=\"logout.php?logmeout\">Sim</a> | ";
//echo "<a href=\"javascript:history.go(-1)\">Não</a>";

//}else{
	
session_destroy();
echo "<meta charset='utf-8'>";
echo'<script type="text/javascript">
	alert("Não esqueça que para retornar deve fazer o login novamente!!! ABRAÇOS :)");
	window.location="index.php";
</script>';

//header("Location:index.php");







?>