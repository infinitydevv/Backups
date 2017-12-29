 <?php
 @session_start();
 require_once("Conexao/Conexao.php");
 require_once('produto/DAO/ProdutoDAO.php');
 require_once('produto/Class/Produto.php');
 require_once('login/function.php');

 $c = new Conexao();
 $pDAO = new ProdutoDAO();
 $init = 0;
 $final = 3;
 $rs = $c->select("SELECT * FROM produto where status_p = 1 LIMIT $init, $final");
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
 	<title>E-Commerce</title>
 	<!--Let browser know website is optimized for mobile-->
 	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 </head>

 <body>
 	<div class="grey lighten-2">

 	</div>

 	<?php require_once('navbar-index.php'); ?>

 	<div class="container center">
 		<div class="row">
 			<div class="input-field col s12 m10">
 				<input id="pesq" type="text" class="validate">
 				<label for="pesq">Pesquisar</label>
 			</div>
 			<div class="input-field col s12 m2">
 				<a class="waves-effect waves-light btn center red darken-3"><i class="material-icons">search</i></a>
 			</div>
 		</div>
 	</div>

 	<div class="container">
 		<div class="row" id="retornoVermais">
 			<?php foreach ($rs as $r): ?>
 				<div class="col s12 m4">
 					<div class="card">
 						<div class="card-image">
 							<img src="produto/img/<?php echo $r->imagem_p; ?>" class="responsive-img">
 							<a class="btn-floating halfway-fab waves-effect waves-light red" onclick="carrinho(<?php echo $r->id_p?>);"><i class="material-icons">add_shopping_cart</i></a>
 						</div>
 						<div class="card-content">
 							<span class="card-title center-align" style="color: #d50000 !important; font-size: 12pt!important;"><strong><?php echo $r->nome_p?></strong></span>
 							<div class="row">
 								<div class="col s6"><p class="right-align" style="font-size: 10pt!important;">R$ <?php echo number_format($r->preco_p, 2, ',', '.'); ?></p></div>
 								<div class="col s6"><a href="#" class="left-align">Ver mais</a></div>
 							</div>
 						</div>
 					</div>
 				</div>
 			<?php endforeach; ?>
 		</div>
 		<div class="buttonsFotter center" style="padding: 25px">
 			<button id="vermais" class="waves-effect waves-light btn red">Ver mais</button>
 			<input type="hidden" id="maximoVermais" value="<?php echo $final; ?>">
 			<input type="hidden" id="inicioVermais" value="<?php echo $final; ?>">
 		</div>
 	</div>

 	<!--Import jQuery before materialize.js-->
 	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 	<script type="text/javascript" src="bibliotecas/materialize/js/materialize.min.js"></script>
 	<script src='https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js'></script>

 	<script>
 		$(".button-collapse").sideNav();
 	</script>

 	<script type="text/javascript">
 		function carrinho(id){
 			$.ajax({
 				url: 'carrinho/carrinho.php',
 				method: 'POST',
 				data: {id: id},
 				dataType: 'html'
 			}).done(function(html){
 				Materialize.toast(html, 1000);
 			});
 		}
 	</script>
 	<script>
 		$('#vermais').click(function(){
 			var init = $('#inicioVermais').val();
 			var final = $('#maximoVermais').val();
 			var btn = 'um';
 			$.ajax({
 				url: 'produto/Controller/SelectIndex.php',
 				method: 'POST',
 				data: {init: init, final: final, btn: btn},
 				dataType: 'html'
 			}).done(function(html){
 				$('#retornoVermais').append(html);
 				$('#inicioVermais').val(parseInt(init) + 3);
 				$('#maximoVermais').val(parseInt(final));

 				var init1 = $('#inicioVermais').val();
 				var final1 = $('#maximoVermais').val();
 				var btn1 = 'todos';
 				$.ajax({
 					url: 'produto/Controller/SelectIndex.php',
 					method: 'POST',
 					data: {init: init1, final: final1, btn: btn1},
 					dataType: 'html'
 				}).done(function(html){
 					if(html == "Nao"){
 						$('#vermais').prop("disabled", true);
 					}
 				});
 			});
 		});
 	</script>
 		<?php require_once('footer.php'); ?>
 </body>
 </html>