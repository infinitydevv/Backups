<?php 
@session_start(); 
require_once('../desconto/Class/Desconto.php');
require_once('../desconto/DAO/DescontoDAO.php');
require_once('../Conexao/Conexao.php');
require_once('../login/function.php');

$d = new Desconto();
$dDAO = new DescontoDAO();
$c = new Conexao();

$desconto = isset($_GET['cupom']) ? $_GET['cupom'] : '';

if($desconto != ''){
	$d->setCod_des($desconto);
	$rs = $dDAO->selectCupom($d);

	if(count($rs) > 0){
		foreach ($rs as $r) {
			$_SESSION['msgCupom'] = 'Cupom válido';
			$descontin = number_format($r->valor_des, 2, ',', '.');
		}
	}else{
		$_SESSION['msgCupom'] = 'Cupom inválido';
		$descontin = number_format(0, 2, ',', '.');
	}
}else{
	$descontin = number_format(0, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="../bibliotecas/materialize/css/color.css"  media="screen,projection"/>
	<title>E-Commerce - Carrinho de Compras</title>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<?php require_once('../navbar-index.php'); ?>
	<div class="container">
		<div class="row">
				<h4>Carrinho de compras</h4>
			<?php
			if($_SESSION['msgCupom'] != null){
				if($_SESSION['msgCupom'] == 'Cupom inválido'){
					echo "<div class='red lighten-2' style='padding: 20px; border: 1px solid #388e3c;'>".$_SESSION['msgCupom']."</div>";
					unset($_SESSION['msgCupom']);
				}else{
					echo "<div class='green lighten-2' style='padding: 20px; border: 1px solid #388e3c;'>".$_SESSION['msgCupom']."</div>";
					unset($_SESSION['msgCupom']);
				}
			} 
			?>
			<?php if(count($_SESSION['carrinho']) > 0): ?>
			<div class="col s12 l8">
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
			</div>
			<div class="col s12 l4">
				<div class="container right grey lighten-5" style="padding: 10px;">
					<div class="row">
						<div class="col s12" style="border-bottom: 2px #dcdcdc solid; padding-bottom: 10px;">
							<p class="red-text" style="font-size: 14pt;">Cupom de desconto</p>
							<div class="divider"></div>
							<form action="carrinho-compras.php" method="GET" class="center-align">
								<div class="input-field col s12">
									<input id="cupom" name="cupom" type="text" class="validate">
									<label for="cupom">Código do cupom</label>
								</div>
								<button class="btn waves-effect waves-light red" type="submit">Enviar</button>
							</form>
						</div>
						<div class="col s12">
							<div class=""><p class="red-text" style="font-size: 14pt;">Pagamento</p></div>
							<div class="divider"></div>
							<p>Sub-total: R$
								<?php
								$valorResultado = 0;
								foreach ($_SESSION['carrinho'] as $r) {
									$valorResultado += $r['preco'];
								}
								echo number_format($valorResultado, 2, ',', '.');
								?>
							</p>
							<p>Descontos: R$<?php echo $descontin; ?></p>
							<p>Total: R$<?php echo number_format($valorResultado - $descontin, 2, ',', '.')?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="section right-align">
			<a href="https://infinitydev.com.br/e-commerce/" class=" waves-effect grey waves-red btn-flat">Continuar comprando</a>
		</div>
		<div class="section right-align">
			<a href="#!" class="btn waves-effect waves-light red">Finalizar compra</a>
		</div>
	</div>
			<?php else: ?>
			<blockquote>
				Carrinho vazio.<br>
				<a href="https://infinitydev.com.br/e-commerce/">Voltar a tela inicial</a>
			</blockquote>
			</div>
		<?php endif; ?>
		<?php require_once('../footer.php'); ?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../bibliotecas/materialize/js/materialize.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js'></script>
	<script type="text/javascript">
		function atualizarQuantidade(id){
			var quant = $('#quant'+id).val();
			$.ajax({
				url: "atualizarQuantidade.php",
				method: "POST",
				data: {id: id, quant: quant},
				dataType: "html"
			}).done(function(html){
				Materialize.toast(html, 1000, 'rounded');
			});
		}

		function removeItem(id){
			$.ajax({
				url: "removerCarrinho.php",
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
				url: "removerCarrinho.php",
				method: "POST",
				data: {botao: 'rTodos'},
				dataType: "html"
			}).done(function(html){
				Materialize.toast(html, 1000, 'rounded');
				location.reload();
			});
		}
	</script>
</body>
</html>
