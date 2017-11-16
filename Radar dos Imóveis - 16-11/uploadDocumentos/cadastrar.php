<?php 
    @session_start();
    require_once "../login/functions.php";
    require_once "../login/functions-cliente.php";
    if(isLoggedInCli()){
      echo"<script type='text/javascript'> alert('Você ja está logado como Cliente!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../area-cliente.php' />";
      exit;
    }else if(isLoggedIn()){
      $logado = $_SESSION['nomecompleto_usuario'];
      $imgusu = $_SESSION['img_usuario'];
    }else{
      echo"<script type='text/javascript'> alert('Necessário fazer login!'); </script>";
      echo"<meta http-equiv='refresh' content='0; url=../login.php'/>";
      exit;
    } 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
</head>
<body>
	<div class='container'>
		<div class="row">
			<div class="col-lg-12">
				<fieldset>
					<legend><h1>Formulário - Enviar Documentos</h1></legend>		
					
					<form action="enviaDados.php" method="post" id='form-contato' name="form-contato" enctype='multipart/form-data'>
						<div class="form-group">
							<label for="descricao">Descrição do Documento:</label>
							<textarea class="form-control ckeditor" rows="5" id="descricao" name="descricao" placeholder="Descrição do documento" required></textarea>
						</div>	
						<div class="form-group">
							<label>
								Selecionar Documento
								<input type="file" id="inputArquivo" name="inputArquivo" accept=".ptf, .ppt, .pptx, .xls, .xlsx, .doc, .docx, .txt, .7z, .rar, .zip, .jpg, .png, .gif, .bmp, .rtf" onchange="validarFormato(this)" required>
							</label>
						</div>		
						<!-- <progress value="0" max="100"></progress><span id="porcentagem">0%</span>	 -->
					    <input type="hidden" name="acao" value="cadastrar">
					    <button type="submit" class="btn btn-primary" id='btnEnviar'>Enviar</button>
					    <a href="index.php" class="btn btn-danger">Cancelar</a>
					</form>
				
				</fieldset>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<script>
		$(document).ready(function(){
		//     $('#btnEnviar').click(function(){
		//         $('#form-contato').ajaxForm({
		//             uploadProgress: function(event, position, total, percentComplete) {
		//                 $('progress').attr('value', percentComplete);
		//                 $('#porcentagem').html(percentComplete+'%');
		//             },        
		//             success: function(data) {
		            	
		//                 $('progress').attr('value','100');
		//                 $('#porcentagem').html('100%');                
		//                 if(data.sucesso == true){
		//                     $('#resposta').html('<img src="'+ data.msg +'" />');
		//                 }
		//                 else{
		//                     $('#resposta').html(data.msg);
		//                 }                
		//             },
		//             error : function(){
		//             	alert("kappa3");
		//                 $('#resposta').html('Erro ao enviar requisição!!!');
		//             },
		//             dataType: 'html',
		//             url: 'enviar_arquivo.php',
		//             resetForm: true
		//         }).submit();
		//     });
		// });
		function validarFormato(valor){
			var fileName = document.getElementById("inputArquivo").value;
			var lastDot = fileName.lastIndexOf(".") + 1;
			var extFile = fileName.substr(lastDot, fileName.length).toLowerCase();
			if(extFile != "pdf" && extFile != "ppt" && extFile != "pptx" && extFile != "xls" && extFile != "xlsx" && extFile != "doc" && extFile != "docx" && extFile != "txt" && extFile != "7z" && extFile != "rar" && extFile != "zip" && extFile != "jpg" && extFile != "png" && extFile != "gif" && extFile != "bmp" && extFile != "rtf"){
				bootbox.alert("Tipo de Arquivo Inválido!");
				document.getElementById("inputArquivo").value = null;
			}
		}
	</script>
</body>
</html>