
<?php 
include "conectar.php";


if(@$_GET['go'] == 'botao'){
	$nome = $_POST['nomeusu'];
	$email =$_POST['emailusu'];
	$dataani = $_POST['dataaniusu'];
	$fonecel = $_POST['fonecelusu'];
	$foneres = $_POST['foneresusu'];
	$login = $_POST['loginusu'];
	$senha = $_POST['senhausu'];
	$codigousu = $_POST['tipousu'];
	$foto = $_POST['foto']
	

	if(empty($nome)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($email)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($dataani)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($fonecel)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($foneres)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($login)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($senha)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($codigousu)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($foto)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}
	else{
		$query1 = mysql_num_rows(mysql_query("SELECT * FROM USUARIO WHERE USUARIO = '$login'"));
		if($query1 == 1){
			echo "<script>alert('Usuário já existe.'); history.back();</script>"; 
		}else{
			mysql_query("INSERT INTO usuario (nome,email,dataaniversario,fonecel,foneres,login,senha,idtipousu,foto)
              VALUES ('$nome','$email','$dataani','$fonecel','$foneres','$login','$senha','$codigousu','$foto')");
			echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
			echo "<meta http-equiv='refresh' content='0, url=./'>";
		}
	}
}

?>

<!--


  if(isset($_POST['botao'])){
	  echo'<script type="text/javascript">
	alert("Preencha os campos e depois salve!!!");
	window.location="cadusu.php";
</script>';
   
  }else{
 $nome = $_POST['nomeusu'];
	$email =$_POST['emailusu'];
	$dataani = $_POST['dataaniusu'];
	$fonecel = $_POST['fonecelusu'];
	$foneres = $_POST['foneresusu'];
	$login = $_POST['loginusu'];
	$senha = $_POST['senhausu'];
    $sql  =mysql_query("INSERT INTO usuario (nome,email,dataaniversario,fonecel,foneres,login,senha)
              VALUES ('$nome','$email','$dataani','$fonecel','$foneres','$login','$senha')");
	header("Location:area.php");
  }

?>
-->
