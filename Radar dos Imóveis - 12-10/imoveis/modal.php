<?php  

	require_once '../conexoes/conexao.php';
	$id = isset($_GET['idimo']) ? $_GET['idimo'] : '';

	$conexao = conexao::getInstance();
	$sql = "SELECT * FROM imovel i INNER JOIN usuario u on i.idusu = u.idusu inner join captador c on i.idcap = c.idcap inner join clientevendedor cli on i.idcliven = cli.idcliven where i.idimo = $id";

	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);


	foreach ($clientes as $c) {
		echo "<div class='modal fadeIn' id='modal-mensagem<?=$c->idimo?>'>
						    <div class='modal-dialog'>
						         <div class='modal-content'>
						             <div class='modal-header'>
						                 <button type='button' class='close' data-dismiss='modal'><span>×</span></button>
						                 <h4 class='modal-title'>"$c->tipoimo. ' - '.$c->bairro.'. '.$c->lougradouro.' - '.$c->cidade.'R$'.number_format($c->valorvendaimo, 2,',','.'); "</h4>
						             </div>
						             <div class='modal-body'>
						                 <p>Conteúdo da mensagem</p>
						             </div>
						             <div class='modal-footer'>
						                 <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
						             </div>
						         </div>
						     </div>
						 </div>
						 <script>$('modal-mensagem<?=$c->idimo?>').modal('toggle')</script>
						 ";
	}



?>