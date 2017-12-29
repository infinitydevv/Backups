<?php 
	@session_start();
	require_once('login/function.php');
	if(!logadoAdm()){
		header("Location: login/login.php");
		exit;
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
	<input type="hidden" value="<?php echo $_SESSION['idAdm']; ?>" id="idAdm">
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
						<a href="#modalLogin" class="modal-trigger">
							<i class="material-icons circle blue">person_outline</i>
							<span class="title">Editar Login</span>
							<p>Clique aqui para editar seu login.</p>
						</a>
					</li>
					<li class="collection-item avatar">
						<a href="#modalSenha" class="modal-trigger">
							<i class="material-icons circle orange">vpn_key</i>
							<span class="title">Editar Senha</span>
							<p>Clique aqui para editar seu senha.</p>
						</a>
					</li>
				</ul>
			</div>
			<div class="col s12 m8">
				<div class="row">
					<a href="https://infinitydev.com.br/e-commerce/usuario/">
						<div class="col s12 m6 l4 center divOver" id="userOver"  style="padding: 50px!important;">
							<i class="material-icons large black-text">face</i>
							<p class="black-text">Usuários</p>
						</div>
					</a>
					<a href="https://infinitydev.com.br/e-commerce/adm/">
						<div class="col s12 m6 l4 center divOver" id="admOver"  style="padding: 50px!important;">
							<i class="material-icons large black-text">account_circle</i>
							<p class="black-text">Administradores</p>
						</div>
					</a>
					<a href="https://infinitydev.com.br/e-commerce/produto/">
						<div class="col s12 m6 l4 center divOver" id="prodOver"  style="padding: 50px!important;">
							<i class="material-icons large black-text">local_offer</i>
							<p class="black-text">Produtos</p>
						</div>
					</a>
					<a href="https://infinitydev.com.br/e-commerce/pedido/">
						<div class="col s12 m6 l4 center divOver" id="pedOver"  style="padding: 50px!important;">
							<i class="material-icons large black-text">shopping_basket</i>
							<p class="black-text">Pedidos</p>
						</div>
					</a>
					<a href="https://infinitydev.com.br/e-commerce/desconto/">
						<div class="col s12 m6 l4 center divOver" id="descOver"  style="padding: 50px!important;">
							<i class="material-icons large black-text">attach_money</i>
							<p class="black-text">Descontos</p>
						</div>
					</a>
				</div>
			</div>
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

	<div id="modalLogin" class="modal">
		<div class="modal-content">
			<h4>Editar Login</h4>
			<div class="input-field col s6">
				<input id="loginEdit" onkeyup="login();" type="text" class="validate">
				<label for="loginEdit">Login</label>
				<p id="retornoLogin"></p>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Fechar</a>
			<a href="#!" id="cadLogin" class="waves-effect waves-green green btn-flat">Confirmar</a>
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
	</script>
	<script>
		$('#cadNome').click(function(){
			var nome = $("#nomeEdit").val();
			var btn = "cadNome";
			var id = $('#idAdm').val();

			if(nome != ''){
				$.ajax({
					url: 'adm/Controller/ControllerCampos.php',
					method: "POST",
					data: {nome: nome, id: id, btn: btn},
					dataType: "html"
				}).done(function(html){
					if(html == "OK Nome"){
						Materialize.toast('Nome Alterado', 4000);
						$('#modalNome').modal('close');
					}else{
						Materialize.toast('Erro', 4000);
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
			var id = $('#idAdm').val();
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
									.$.ajax({
										url: 'adm/Controller/ControllerCampos.php',
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
		function login(){
			var login = $('#loginEdit').val();
			var btn1 = "login";
			$.ajax({
				url: 'adm/Controller/SelectEmailandLogin.php',
				method: "GET",
				data: {login: login, btn: btn1},
				dataType: "html"
			}).done(function(html){
				if(html == "Login válido."){
					$('#retornoLogin').removeClass('red-text');
					$('#retornoLogin').text(html);
					$('#retornoLogin').addClass('green-text');
				}else{
					$('#retornoLogin').removeClass('green-text');
					$('#retornoLogin').text(html);
					$('#retornoLogin').addClass('red-text');
				}	
			});
		}
	</script>
	<script>
		$('#cadLogin').click(function(){
			var login = $('#loginEdit').val();
			var id = $('#idAdm').val();
			var btn = "cadLogin";
			var btn1 = "login";
			$.ajax({
				url: 'adm/Controller/SelectEmailandLogin.php',
				method: "GET",
				data: {login: login, btn: btn1},
				dataType: "html"
			}).done(function(html){
				if(html == "Login válido."){
					$.ajax({
						url: 'adm/Controller/ControllerCampos.php',
						method: "POST",
						data: {login: login, id: id, btn: btn},
						dataType: "html"
					}).done(function(html){
						if(html == "OK Login"){
							Materialize.toast('Login Alterado', 4000);
							$('#modalLogin').modal('close');
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
			var id = $('#idAdm').val();
			var btn = "cadSenha";
			if(senha != "" && senhaconf != ""){
				if(senha == senhaconf){
					$.ajax({
						url: 'adm/Controller/ControllerCampos.php',
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
</body>
</html>