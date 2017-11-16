<?php 
	session_start();
	require_once('login/functions.php');
    require_once('canto-do-conto/Class/Conto.php');
    require_once('conexao/Conexao.php');

    $c = new Conto();

    $termo = isset($_GET['termo']) ? $_GET['termo'] : '0';
    $valor = isset($_GET['valor']) ? $_GET['valor'] : '';

    $rs = $c->listarIndex($termo, $valor);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Canto do Conto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/conto.css">
  </head>
  <body>
    <?php require_once('nav-bar-logado.php'); ?>
    
    <div class="container">
    	<h1 class="display-3">Canto do Conto</h1>
    	<div class="row">
    		<div class="col-12 col-sm-3">
    			<br>
    			<form action="" method="GET">
    				<div class="form-group">
    					<input type="text" name="valor" placeholder="Pesquisar" class='form-control'>
    				</div>
    				<div class="form-group">
    					<select class='form-control' name="termo">
    						<option value="0">Selecione</option>
    						<option value="2">Título</option>
    						<option value="3">Descrição</option>
    						<option value="4">Autor</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<input type="submit" class="btn btn-dark btn-block" value="Pesquisar">
    				</div>
    			</form>
    		</div>
    		<div class="col-12 col-sm-8">
    			<?php if(count($rs) < 0): ?>
    				<div class="alert alert-danger" role="alert">
					  Nenhum conto cadastrado.
					</div>
				<?php else: ?>
	    			<?php foreach ($rs as $r):?>
				    	<div class="conto">
					    	<div class="prlx" style="background-image: url('<?php echo $r->foto_c; ?>'); width: 100%;">
					    		<a id="btn-titulo" onclick="abrirConto(<?php echo $r->id_c; ?>);"><h1><?php echo $r->titulo_c; ?></h1>
					    		<p class="text-center">por <?php echo $r->nome_u; ?></p></a>
					    	</div>
					    	<div id="id<?php echo $r->id_c; ?>" class="conteudo" style="display: none;">
					    		<?php echo $r->paragrafo_c; ?>
					    	</div>
					    </div>
					<?php endforeach; ?>
				<?php endif; ?>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	   <script
	  src="https://code.jquery.com/jquery-3.2.1.js"
	  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
	  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
    	$('.prlx').each(function() {
	        var $obj = $(this);
	        $obj.css('background-position', '100% 0');
	        $obj.css('background-attachment', 'fixed');
	        if ($(window).width() > 940) {
	            $obj.css('background-size', '100%');
	            $(window).scroll(function() {
	                var offset = $obj.offset();
	                var yPos = -($(window).scrollTop() - offset.top) / 8;
	                var bgpos = '50% ' + yPos + 'px';
	                $obj.css('background-position', bgpos);
	            });
	        }
	    });
    </script>
    <script>
    	function abrirConto(id){
    		$('#id'+id).slideToggle("slow");
    	}
    </script>
  </body>
</html>