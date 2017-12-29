<?php @session_start(); ?>
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<!--Import Google Icon Font-->
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<!--Import materialize.css-->
 	<link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/materialize.min.css"  media="screen,projection"/>
 	<link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/color.css"  media="screen,projection"/>
 	<title>E-Commerce - Usuários</title>
 	<!--Let browser know website is optimized for mobile-->
 	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 </head>

 <body>

	<div class="container">
		<div class="modal-content">
			<h4>Carrinho de compras</h4>
			<?php if(count($_SESSION['carrinho']) > 0): ?>
				<table>
					<thead>
						<tr>
							<th><i class="material-icons">image</i></th>
							<th>#</th>
							<th>Produto</th>
							<th>Quantidade</th>
							<th>Preço</th>
							<th></th>
						</tr>
					</thead>
					<tbody id='tbody-remove'>
					<?php foreach ($_SESSION['carrinho'] as $r):?>

							<tr id="tr<?php echo $r['id']; ?>">
								<td><img src="../produto/img/<?php echo $r['img']; ?>" height="100"></td>
								<td><?php echo $r['id']; ?></td>
								<td><?php echo $r['nome']; ?></td>
								<td>
									<div class="input-field inline">
							            <input type="number" id="quant<?php echo $r['id']; ?>" value="<?php echo $r['quantidade']; ?>" min="1" max="10" class="validate browser-default">
							            <button class="waves-effect btn-floating waves-light orange btn" onclick="atualizarQuantidade(<?php echo $r['id']; ?>)"><i class="material-icons">create</i></button>
							        </div>
							    </td>
							    <td>R$ <?php echo number_format($r['preco'], 2, ',', '.'); ?></td>
							    <td><a style='cursor: pointer;' onclick="removeItem(<?php echo $r['id']; ?>);"><i class="material-icons">delete</i></a></td>
							</tr>

					<?php endforeach; ?>
					</tbody>
				</table>
				<a style='cursor: pointer;' class="right-align" onclick="removeTodos();">Limpar carrinho</a>
				<div class="container">
					<div class="row">
						<div class="col s12 m4 right grey lighten-4">
							<div class=""><p class="red-text" style="font-size: 14pt;">Pagamento</p></div>
							<div class="divider"></div>
							<p>Sub-total: R$
								<?php
									foreach ($_SESSION['carrinho'] as $r) {
										$rs = 0;
										$rs += $r['preco'];
									}
									echo number_format($rs, 2, ',', '.');;
								?>
									
							</p>
							<p>Descontos: <?php echo $desconto; ?></p>
							<p>Total: R$
								
							</p>
						</div>
					</div>
					<div class="divisor">
						
					</div>
				</div>
			<?php else: ?>
				<blockquote>
			      Carrinho vazio.<br>
			      <a href="https://radardosimoveis.com.br/e-commerce/">Voltar a tela inicial</a>
			    </blockquote>
			<?php endif; ?>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close right waves-effect waves-red btn-flat">Continuar comprando</a>
			<a href="#!" class="waves-effect waves-white right red btn-flat">Finalizar compra</a>
		</div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 	<script type="text/javascript" src="../bibliotecas/materialize/js/materialize.min.js"></script>
 	<script src='https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js'></script>
	<script type="text/javascript">
		function atualizarQuantidade(id){
			var quant = $('#quant'+id).val();
			$.ajax({
				url: "carrinho/atualizarQuantidade.php",
				method: "POST",
				data: {id: id, quant: quant},
				dataType: "html"
			}).done(function(html){
				Materialize.toast(html, 1000, 'rounded');
			});
		}

		function removeItem(id){
			$.ajax({
				url: "carrinho/removerCarrinho.php",
				method: "POST",
				data: {id: id, botao: 'rItem'},
				dataType: "html"
			}).done(function(html){
				Materialize.toast(html, 1000, 'rounded');
				$('#tr'+id).remove();
			});
		}
		function removeTodos(){
			$.ajax({
				url: "carrinho/removerCarrinho.php",
				method: "POST",
				data: {botao: 'rTodos'},
				dataType: "html"
			}).done(function(html){
				Materialize.toast(html, 1000, 'rounded');
				location.reload();
			});
		}
	</script>
</body></html>
