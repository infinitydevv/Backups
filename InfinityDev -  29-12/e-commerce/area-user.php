<?php 
@session_start();
require_once('login/function.php');
require_once('pedido/Class/Pedido.php');
require_once('pedido/DAO/PedidoDAO.php');
require_once('Conexao/Conexao.php');
$c = new Conexao();
$p = new Pedido();
$pDAO = new PedidoDAO();

if(!logadoUsuario()){
	header("Location: login/login.php");
	exit;
}else{
	$p->setId_u($_SESSION['idUser']);
	$rs = $pDAO->selectPedidoUser($p);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="bibliotecas/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="bibliotecas/materialize/css/color.css"  media="screen,projection"/>
	<link rel="stylesheet" href="css/area-adm.css">
	<title>E-Commerce - Área</title>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
	<?php require_once('navbar-adm.php'); ?>
	<input type="hidden" value="<?php echo $_SESSION['idUser']; ?>" id="idUser">
	<div class="container"><h5>Minhas Conta</h5></div>
	<div class="container">
		<div class="row">
			<div class="col s12 m4">
				<ul class="collection">
					<li class="collection-item avatar">
						<a href="#modalNome" class="modal-trigger">
							<i class="material-icons circle red">edit</i>
							<span class="title">Editar Nome</span>
							<p>Clique aqui para editar seu nome.</p>
						</a>
					</li>
					<li class="collection-item avatar">
						<a href="#modalEmail" class="modal-trigger">
							<i class="material-icons circle green">email</i>
							<span class="title">Editar Email</span>
							<p>Clique aqui para editar seu Email.</p>
						</a>
					</li>
					<li class="collection-item avatar">
						<a href="#modalCPF" class="modal-trigger">
							<i class="material-icons circle blue">person_outline</i>
							<span class="title">Editar CPF</span>
							<p>Clique aqui para editar seu CPF.</p>
						</a>
					</li>
					<li class="collection-item avatar">
						<a href="#modalSenha" class="modal-trigger">
							<i class="material-icons circle orange">vpn_key</i>
							<span class="title">Editar Senha</span>
							<p>Clique aqui para editar seu senha.</p>
						</a>
					</li>
					<li class="collection-item avatar">
						<a href="#modalEndereco" class="modal-trigger">
							<i class="material-icons circle teal accent-4">map</i>
							<span class="title">Editar Endereço</span>
							<p>Clique aqui para editar seu Endereço.</p>
						</a>
					</li>
				</ul>
			</div>
			<div class="col s12 m8">
				<table class="highlight bordered responsive-table"">
					<h5>Ultimos pedidos</h5>
					<?php if(count($rs) > 0){ ?>
					<thead>
						<tr>
							<th>#</th>
							<th>Pagamento</th>
							<th><i class="material-icons">date_range</i></th>
							<th>Status</th>
							<th><i class="material-icons">attach_money</i></th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rs as $r){?>
						<tr>
							<th><?php echo $r->id_pe; ?></th>
							<th><?php echo $r->pag_pe; ?></th>
							<th><?php echo date('d/m/Y H:i:s', strtotime($r->data_pe)) ?></th>
							<th><?php if($r->status_pe != 0){echo "Pago";}else{echo "Pendente";} ?></th>
							<th><?php echo number_format($r->total_pe, 2, ',', '.'); ?></th>
							<th>
								<button class="btn-floating waves-effect waves-light blue" onclick="modalSelect(<?php echo $r->id_pe; ?>);" ><i class="material-icons right">remove_red_eye</i></button>
							</th>
						</tr>
						<?php } ?>
						<?php }else{ ?>
						<h3>Nenhum pedido cadastrado.</h3>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div id="modalVisual" class="modal">
		<div class="modal-content">
			<div class="row" id='mandaraqui'>

			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
		</div>
	</div>

	<div id="modalNome" class="modal">
		<div class="modal-content">
			<h4>Editar Nome</h4>
			<div class="input-field col s6">
				<input id="nomeEdit" type="text" class="validate">
				<label for="nomeEdit">Nome</label>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadNome" class="modal-action modal-close waves-effect waves-green green btn-flat">Confirmar</a>
		</div>
	</div>

	<div id="modalEmail" class="modal">
		<div class="modal-content">
			<h4>Editar Email</h4>
			<div class="input-field col s6">
				<input id="emailEdit" onkeyup="email();" type="email" class="validate">
				<label for="emailEdit">Email</label>
			</div>
			<p id="retornoEmail"></p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadEmail" class="waves-effect waves-green green btn-flat">Confirmar</a>
		</div>
	</div>

	<div id="modalCPF" class="modal">
		<div class="modal-content">
			<h4>Editar CPF</h4>
			<div class="input-field col s6">
				<input id="cpfEdit" onkeyup="cpf();" type="number" class="validate">
				<label for="cpfEdit">CPF</label>
				<p id="retornoCPF"></p>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadCPF" class="waves-effect waves-green green btn-flat">Confirmar</a>
		</div>
	</div>

	<div id="modalSenha" class="modal">
		<div class="modal-content">
			<h4>Editar Senha</h4>
			<div class="input-field col s6">
				<input id="senhaEdit" type="password" class="validate">
				<label for="senhaEdit">Senha</label>
			</div>
			<div class="input-field col s6">
				<input id="senhaConfEdit" type="password" class="validate">
				<label for="senhaConfEdit">Confirmar Senha</label>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadSenha" class="waves-effect waves-green green btn-flat">Confirmar</a>
		</div>
	</div>

	<div id="modalEndereco" class="modal">
		<div class="modal-content">
			<h4>Editar Endereço</h4>
			<div class="row">
				<div class="input-field col s12">
					<input id="cep" type="text" maxlength="8" class="validate" onkeyup="verificarCEP();">
					<label for="cep">CEP</label>
					<a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Não sabe seu CEP?</a>
				</div>
				<div class="input-field col s12 m3">
					<input id="estado" placeholder="" type="text" placeholder="" readonly class="validate">
					<label for="estado">Estado</label>
				</div>
				<div class="input-field col s12 m9">
					<input id="cidade" placeholder="" type="text" placeholder="" readonly class="validate">
					<label for="cidade">Cidade</label>
				</div>
				<div class="input-field col s12 m9">
					<input id="rua" placeholder="" type="text" placeholder="" readonly class="validate">
					<label for="rua">Rua</label>
				</div>
				<div class="input-field col s12 m3">
					<input id="numero" placeholder="" type="number" class="validate">
					<label for="numero">Número</label>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadEndereco" class="waves-effect waves-green green btn-flat">Confirmar</a>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bibliotecas/materialize/js/materialize.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js'></script>
	<script>
		$(".button-collapse").sideNav();
		$(document).ready(function(){
			// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
		$('.dropdown-button').dropdown({
			inDuration: 300,
			outDuration: 225,
		      constrainWidth: false, // Does not change width of dropdown to that of the activator
		      hover: true, // Activate on hover
		      gutter: 0, // Spacing from edge
		      belowOrigin: true, // Displays dropdown below the button
		      alignment: 'left', // Displays dropdown with edge aligned to the left of button
		      stopPropagation: false // Stops event propagation
		  }
		  );
		$(document).ready(function(){
			$('.materialboxed').materialbox();
		});
	</script>
	<script>
		function modalSelect(id){
			$.ajax({
				url: 'pedido/Controller/SelectPedidoId.php',
				method: 'GET',
				data: {id: id},
				dataType: 'html'
			}).done(function(html){
				$("#removeDepois").remove();
				$('#mandaraqui').append(html);
				$('#modalVisual').modal('open');
			});
		}
	</script>
	<script>
		function verificarCEP(){
			var cep = $('#cep').val();
			$.ajax({
				url:'usuario/Controller/cep.php',
				method: 'GET',
				data: {cep: cep},
				dataType: 'json'
			}).done(function(json){
				if(typeof json === "object"){
					$('#rua').val("");
					$('#cidade').val("");
					$('#estado').val("");

					$('#rua').val(json['logradouro']);
					$('#cidade').val(json['localidade']);
					$('#estado').val(json['uf']);
				}
			});
		}
	</script>
	<script>
		$('#cadNome').click(function(){
			var nome = $("#nomeEdit").val();
			var btn = "cadNome";
			var id = $('#idUser').val();

			if(nome != ''){
				$.ajax({
					url: 'usuario/Controller/ControllerCampos.php',
					method: "POST",
					data: {nome: nome, id: id, btn: btn},
					dataType: "html"
				}).done(function(html){
					if(html == "OK Nome"){
						Materialize.toast('Nome Alterado', 4000);
						$('#modalNome').modal('close');
					}else{
						Materialize.toast(html, 4000);
						console.log(html);
					}				
				});
			}else{
				Materialize.toast('Preencha o nome para alterado.', 4000);
			}
		});
	</script>
	<script>
		$('#cadEmail').click(function(){
			var email = $("#emailEdit").val();
			var btn = "cadEmail";
			var id = $('#idUser').val();
			var btn = "cadEmail";
			var btn1 = "email";

			var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

			if(email != ''){
				if(filter.test(email)){
					$.ajax({
						url: 'adm/Controller/SelectEmailandLogin.php',
						method: "GET",
						data: {email: email, btn: btn1},
						dataType: "html"
					}).done(function(html){
						if(html == "E-mail válido."){
							$.ajax({
								url: 'usuario/Controller/EmailandLogin.php',
								method: "GET",
								data: {email: email},
								dataType: "html"
							}).done(function(html){
								if(html == "Disponível"){
									$.ajax({
										url: 'usuario/Controller/ControllerCampos.php',
										method: "POST",
										data: {email: email, id: id, btn: btn},
										dataType: "html"
									}).done(function(html){
										if(html == "OK Email"){
											Materialize.toast('E-mail Alterado', 4000);
											$('#modalEmail').modal('close');
										}else{
											Materialize.toast("Erro", 4000);
										}				
									});
								}else{
									Materialize.toast('E-mail ja cadastrado.', 4000);
								}
							});
						}else{
							Materialize.toast(html, 4000);
						}				
					});
				}else{
					Materialize.toast('E-mail inválido.', 4000);
				}
			}else{
				Materialize.toast('Preencha o E-mail para alterado.', 4000);
			}
		});
	</script>
	<script>
		function email(){
			var email = $('#emailEdit').val();
			var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			var btn1 = "email";
			if(filter.test(email)){
				$.ajax({
					url: 'adm/Controller/SelectEmailandLogin.php',
					method: "GET",
					data: {email: email, btn: btn1},
					dataType: "html"
				}).done(function(html){
					if(html == "E-mail válido."){
						$.ajax({
							url: 'usuario/Controller/EmailandLogin.php',
							method: "GET",
							data: {email: email},
							dataType: "html"
						}).done(function(html){
							if(html == "Disponível"){
								$('#retornoEmail').removeClass('red-text');
								$('#retornoEmail').text(html);
								$('#retornoEmail').addClass('green-text');
							}else{
								$('#retornoEmail').removeClass('green-text');
								$('#retornoEmail').text("E-mail ja cadastrado.");
								$('#retornoEmail').addClass('red-text');
							}
						});
					}else{
						$('#retornoEmail').removeClass('green-text');
						$('#retornoEmail').text(html);
						$('#retornoEmail').addClass('red-text');
					}				
				});
			}else{
				$('#retornoEmail').removeClass('green-text');
				$('#retornoEmail').text("E-mail inválido.");
				$('#retornoEmail').addClass('red-text');
			}
		}
	</script>
	<script>
		function cpf(){
			var cpf = $('#cpfEdit').val();
			$.ajax({
				url: 'usuario/Controller/EmailandLogin.php',
				method: "GET",
				data: {cpf: cpf},
				dataType: "html"
			}).done(function(html){
				if(html == "Disponível"){
					$('#retornoCPF').removeClass('red-text');
					$('#retornoCPF').text(html);
					$('#retornoCPF').addClass('green-text');
				}else{
					$('#retornoCPF').removeClass('green-text');
					$('#retornoCPF').text(html);
					$('#retornoCPF').addClass('red-text');
				}	
			});
		}
	</script>
	<script>
		$('#cadCPF').click(function(){
			var cpf = $('#cpfEdit').val();
			var id = $('#idUser').val();
			var btn = "cadCPF";
			var btn1 = "cpf";
			$.ajax({
				url: 'usuario/Controller/EmailandLogin.php',
				method: "GET",
				data: {cpf: cpf},
				dataType: "html"
			}).done(function(html){
				if(html == "Disponível"){
					$.ajax({
						url: 'usuario/Controller/ControllerCampos.php',
						method: "POST",
						data: {cpf: cpf, id: id, btn: btn},
						dataType: "html"
					}).done(function(html){
						if(html == "OK CPF"){
							Materialize.toast('CPF Alterado', 4000);
							$('#modalCPF').modal('close');
						}else{
							Materialize.toast("Erro", 4000);
						}				
					});
				}else{
					Materialize.toast(html, 4000);
				}
			});
		});
	</script>
	<script>
		$('#cadSenha').click(function(){
			var senha = $('#senhaEdit').val();
			var senhaconf = $('#senhaConfEdit').val();
			var id = $('#idUser').val();
			var btn = "cadSenha";
			if(senha != "" && senhaconf != ""){
				if(senha == senhaconf){
					$.ajax({
						url: 'usuario/Controller/ControllerCampos.php',
						method: "POST",
						data: {senha: senha, id: id, btn: btn},
						dataType: "html"
					}).done(function(html){
						if(html == "OK Senha"){
							Materialize.toast('Senha Alterada', 4000);
							$('#modalSenha').modal('close');
						}else{
							Materialize.toast("Erro", 6000);
						}				
					});
				}else{
					Materialize.toast("As senhas não são iguais.", 6000);
				}
			}else{
				Materialize.toast("Preencha o campo da nova senha e a confirmação da senha.", 6000);
			}
		});
	</script>
	<script>
		$('#cadEndereco').click(function(){
			var cep = $('#cep').val();
			var rua = $('#rua').val();
			var estado = $('#estado').val();
			var cidade = $('#cidade').val();
			var numero = $('#numero').val();
			var id = $('#idUser').val();
			var btn = "cadEndereco";
			if(cep != "" || rua != "" || estado != "" || cidade != "" || numero != ""){
				$.ajax({
					url: 'usuario/Controller/ControllerCampos.php',
					method: "POST",
					data: {cep: cep, rua: rua, estado: estado, cidade: cidade, numero: numero, id: id, btn: btn},
					dataType: "html"
				}).done(function(html){
					if(html == "OK ENDERECO"){
						Materialize.toast('Endereço Alterado', 4000);
						$('#modalEndereco').modal('close');
					}else{
						Materialize.toast("Erro", 4000);
						console.log(html);
					}				
				});
			}else{
				Materialize.toast("Preencha o CEP.", 4000);	
			}
		});
		</script>
	</body>
	</html>