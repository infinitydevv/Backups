<?php
/* 
* @Autor: Bruno França
*/


	require_once '../conexoes/conexao.php';
	require_once 'controllerDocumento.php';
	$controller = new controllerDocumento;
    @session_start();
    
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    require "../login/functions.php";
    require "../login/functions-cliente.php";
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

    
    $termo = isset($_GET['termo']) ? $_GET['termo'] : '';
    $combo = isset($_GET['combo']) ? $_GET['combo'] : '';
	if(empty($termo)){ //Se o termo estiver vazio, mostra todos os dados da tabela
    	$documentos = $controller->selecionarDados();
    } else {
    	// echo "<script>alert($termo)</script>";
    	$combo = isset($_GET['combo']) ? $_GET['combo'] : '';
    	if($combo == 1){
    		if(is_numeric($termo)){
	    		$documentos = $controller->selecionarDados("iddoc = $termo order by iddoc asc");
	    		if(count($documentos) < 1){
	    			$mensagem = '<h3 class="text-center text-primary">Nenhum documento com o código $termo foi encontrado!</h3>';
	    		}
    		} else {
    			$mensagem = '<h3 class="text-center text-primary">Apenas números são aceitos na pesquisa por código!</h3>';
    		}
    	} else if($combo == 2){
    		$documentos = $controller->selecionarDados("descricaodoc like '%$termo%' order by iddoc");
    		if(count($documentos) < 1){
    			$mensagem = '<h3 class="text-center text-primary">Nenhum documento com essa descrição foi encontrado!</h3>';
    		}
    	} else if($combo == 3){
    		$documentos = $controller->selecionarDados("nome like '%$termo%' order by iddoc asc");
    		if(count($documentos) < 1){
    			$mensagem = '<h3 class="text-center text-primary">Não há documentos enviados por esse usuário!</h3>';
    		}
    	}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Radar dos Imóveis" content="">
	<title>Listagem de Documentos</title>
	<link rel="stylesheet" type="text/css" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../clientecomprador/css/index.css">
	<!-- CSS do footer.php --><link rel="stylesheet" href="../css/footer.css">
    <!-- CSS do navbar-top.php --><link rel="stylesheet" href="../css/navbar-top.css">
    <script src="https://use.fontawesome.com/6785ad4786.js"></script>
</head>
<body>
	<!-- navbar-top.php e navbar-top.css no head -->
    <?php include('../navbar-log.php');?>
    <!-- FIM navbar-top.php e navbar-top.css no head -->
	<div class='container cabe'>
		<h1 class="text-center text-laranja">Documentos</h1>
		<fieldset>
			<!-- Cabeçalho da Listagem -->
			<legend><a href='../area.php' class="btn btn-voltar btn-success pull-right">Retornar</a><br><br></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-1 col-lg-1 text-center">
						<label class=" control-label text-laranja" for="termo" style="font-size: 14pt;">Pesquisar</label>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
				    	<input type="text" class="form-control text-laranja" id="termo" name="termo" placeholder="Informe o código ou um trecho da descrição ou o nome do usuário responsável pelo envio do documento"><br>
					</div>
					<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3 div-mar'>
						<select size="1" name="combo" class="form-control text-laranja">
							<option selected value="1">Selecione!</option>
							<option value="1">Código do Documento</option>
							<option value="2">Descrição</option>
							<option value="3">Nome do Usuário</option>
						</select>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-left div-mar">
					    <button type="submit" class="btn show btn-md btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn show btn-md btn-primary">Ver Todos</a>

					    <button type="submit" class="btn hide btn-md btn-block btn-primary">Pesquisar</button>
					    <a href='index.php' class="btn hide btn-md btn-block  btn-primary">Ver Todos</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-right">
						<a href='cadastrar.php' class="btn show btn-md btn-success">Enviar Documento</a>
						<a href='cadastrar.php' class="btn hide btn-md btn-block btn-success">Enviar Documento</a>
					</div>
				   </div>
					
			</form>
		</fieldset>

	</div>
	<div class="container show2">
	<?php if(!empty($documentos)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-hover">
					<tr class='warning'>
						<th>Código</th>
						<th>Descrição</th>
						<th>Nome do Usuário</th>
						<th>Ação</th>
					</tr>
					<?php foreach($documentos as $documento):?>
						<tr class="success">
							<td><?=$documento->iddoc?></td>
							<td><?=$documento->descricaodoc?></td>
							<td><?=$documento->nome?></td>
							<td>
								<a href="<?php echo $documento->urldoc ?>" target="_blank" class="show btn btn-md show btn-success"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></a> <!-- BOTÂO  DOWNLOAD -->
								<a data-toggle="modal" data-target="#modalEditar" target="_blank" class="show btn btn-md show btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a> <!-- BOTÂO  EDITAR -->
								<a href="javascript: excluirDocumento(<?php echo $documento->iddoc ?>, '<?php echo $documento->urldoc ?>')" class="show btn btn-md show btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a> <!-- BOTÂO  REMOVER -->
							</td>
						</tr>
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<?php echo $mensagem; ?>
			<?php endif; ?>
		</div>
		<div class="hide">
			<?php if(!empty($documentos)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-striped">
					<tr class='warning'>
						<th>Código</th>
						<th>Descrição</th>
						<th>Nome do Usuário</th>
						<th>Ação</th>
					</tr>
					<?php foreach($documentos as $documento):?>
							<tr class="success">
								<td><?=$documento->iddoc?></td>
								<td><?=$documento->descricaodoc?></td>
								<td><?=$documento->nome?></td>
								<td>
									<a href="<?php echo $documento->urldoc ?>" target="_blank" class="hide btn btn-xs btn-success btn-block"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></a> <!-- BOTÂO  DOWNLOAD -->
									<a data-toggle="modal" data-target="#modalEditar" class="hide btn btn-xs btn-warning btn-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></a> <!-- BOTÂO  EDITAR -->
									<a href="javascript: excluirDocumento(<?php echo $documento->iddoc; ?>)" class="hide btn btn-xs btn-danger btn-block"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a> <!-- BOTÂO  REMOVER -->
									
								</td>
							</tr>
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<?php echo $mensagem; ?>
			<?php endif; ?>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title" id="myModalLabel">Editar Documento</h4>
		      	</div>
		      	<div class="modal-body">
		      		<form name="formUpload" id="formUpload" method="post">
				        <div class="form-group">
							<label for="descricao">Descrição do Documento:</label>
							<textarea class="form-control ckeditor" rows="5" id="idDescricao" name="descricao" placeholder="Descrição do documento" required></textarea>
						</div>
						<input type="hidden" id="acao" value="editar">
						<input type="hidden" value="<?php echo $documento->iddoc; ?>">
						<div class="form-group">
							<label>
								Selecionar Documento
								<input type="file" id="inputArquivo" name="inputArquivo" accept=".ptf, .ppt, .pptx, .xls, .xlsx, .doc, .docx, .txt, .7z, .rar, .zip, .jpg, .png, .gif, .bmp, .rtf" onchange="validarFormato();" required>
							</label>
						</div>
						
					</form>
		      	</div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			        <button type="button" id="btnEnviar" onclick="editarDocumento('<?php echo $documento->iddoc ?>', '<?php echo $documento->urldoc ?>');" class="btn btn-primary">Salvar Alterações</button>
			    </div>
		    </div>
		  </div>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="http://malsup.github.com/jquery.form.js"></script> 
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	    <script type="text/javascript">
	    	function excluirDocumento(id, arquivo){
	    		
	    		bootbox.confirm({
	    			title: "Remover Documento",
	    			message: "Tem certeza que deseja remover esse documento?",
	    			buttons: {
	    				cancel: {
	    					label: '<i class="fa fa-times"></i> Não'
	    				},
	    				confirm: {
	    					label: '<i class="fa fa-check"></i> Sim'
	    				}
	    			},
	    			callback: function(result){
	    				var dialog = bootbox.dialog({
			    			title: 'Aguarde enquanto excluimos o registro...',
			    			message: '<p><i class="fa fa-spin fa-spinner"></i> Carregando...</p>'
			    		});
	    				if(result == true){
	    					dialog.init(function(){
	    						setTimeout(function(){
	    							$.ajax({
	    								url: 'enviaDados.php',
	    								type: 'post',
	    								data: {
	    									'idDocumento': id,
	    									'arquivoAnt': arquivo,
	    									'acao' : "remover"
	    								},
	    								dataType: 'html',
	    								success: function(retorno){
	    									dialog.modal('hide');
	    									window.location.reload();
	    								},
	    								error: function(erro, er){
	    									bootbox.alert("Não foi possível remover o documento, tente novamente mais tarde!");
	    								}
	    							});
	    						}, 1000);
	    					});
	    				} else {
	    					dialog.modal('hide');
	    				}
	    			}
	    		});
	    	}

	    	function editarDocumento(id, arquivoAnt){
		    	var dialog = bootbox.dialog({
	    			title: 'Aguarde enquanto editamos o registro...',
	    			message: '<p><i class="fa fa-spin fa-spinner"></i> Editando...</p>'
	    		});

		    	var descricao = $('#idDescricao').val();
	    		var formData = new FormData();

				formData.append("idDocumento", id);
				formData.append("descricao", descricao);
				formData.append("inputArquivo", $("#inputArquivo").prop('files')[0]);
				formData.append("arquivoAntigo", arquivoAnt);
				formData.append("acao", $("#acao").val());

	            dialog.init(function(){
					// $('#modalEditar').modal('hide');
					setTimeout(function(){
						$.ajax({
							url: 'enviaDados.php',
							type: 'post',
							data: formData,
							cache: false,
					        processData: false,
					        contentType: false,
							dataType: 'html',
							success: function(retorno){
								dialog.modal('hide');
								window.location.reload();
							},
							error: function(erro, er){
								bootbox.alert("Não foi possível editar o documento, tente novamente mais tarde!");
							}
						});
					}, 1000);
				}); 	
	    	}

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