 	<div class="navbar-fixed">
 		<nav class="red">
 			<div class="nav-wrapper">
 				 <a href="https://infinitydev.com.br/e-commerce/" class="brand-logo"><img src="https://infinitydev.com.br/e-commerce/img/logo.png" class="responsive-img" width="150" alt=""></a>
 				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
 				<ul id="nav-mobile" class="right hide-on-med-and-down">
 					<li><a href="https://infinitydev.com.br/e-commerce/carrinho/carrinho-compras.php" class="modal-trigger"><i class="material-icons left">shopping_cart</i><span class="new badge" data-badge-caption="Itens"><?php echo count($_SESSION['carrinho']); ?></span></a></li>
 					<?php
 						if(logadoAdm()){
 							echo '  <li><div class="chip center-align">
							    '.$_SESSION['nomeAdm'].'
							  </div></li>
							';
							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/deslogar.php">Sair</a></li>';
 						}else if(logadoUsuario()){
 							echo '  <li><div class="chip center-align">
							    '.$_SESSION['nomeUser'].'
							  </div></li>
							';
							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/deslogar.php">Sair</a></li>';
 						}else{
 							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/login.php">Entre ou cadastre-se</a></li>';
 						}
 					?>
 				</ul>
 				<ul class="side-nav" id="mobile-demo">
 					<li><a href="https://infinitydev.com.br/e-commerce/carrinho/carrinho-compras.php" class="modal-trigger"><i class="material-icons left">shopping_cart</i><span class="new badge" data-badge-caption="Itens"><?php echo count($_SESSION['carrinho']); ?></span></a></li>
 					<?php
 						if(logadoAdm()){
 							echo '  <li><div class="chip center-align">
							    '.$_SESSION['nomeAdm'].'
							  </div></li>
							';
							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/deslogar.php">Sair</a></li>';
 						}else if(logadoUsuario()){
 							echo '  <li><div class="chip center-align">
							    '.$_SESSION['nomeUser'].'
							  </div></li>
							';
							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/deslogar.php">Sair</a></li>';
 						}else{
 							echo '<li><a href="https://infinitydev.com.br/e-commerce/login/login.php">Entre ou cadastre-se</a></li>';
 						}
 					?>
 				</ul>
 			</div>
 		</nav>
 	</div>
 	<script>
 		window.script = [];
 	</script>