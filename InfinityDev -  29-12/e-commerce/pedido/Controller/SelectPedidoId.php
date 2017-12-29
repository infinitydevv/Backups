<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
	require_once('../../Conexao/Conexao.php');
	require_once('../DAO/PedidoDAO.php');
	require_once('../Class/Pedido.php');

	$c = new Conexao();
	$pDAO = new PedidoDAO();
	$p = new Pedido();

	$id = $_GET['id'];
		$p->setId_pe($id);

		$rs1 = $pDAO->selectPedidoId($p);
		$rsItens = $pDAO->selectPedidoIdItens($p);

		foreach ($rs1 as $r) {

			echo '<div id="removeDepois"><div class="col s12 m6">
			        <h4>Pedido</h4>
			        <span><strong>ID:</strong> '.$r->id_pe.'</span><br>
			        <span><strong>Pagamento:</strong> '.$r->pag_pe.'</span><br>
			        <span><strong>Data:</strong> '.date('d/m/Y H:i:s', strtotime($r->data_pe)).'</span><br>
			        <span><strong>Status:</strong> '; if($r->status_pe == 1){ echo "Pago"; }else{ echo "Pendente"; } echo '</span><br>
			        <span><strong>Total:</strong> R$'.number_format($r->total_pe, 2, ',', '.').'</span><br>
			      </div>
			      <div class="col s12 m6">
			      	<h4>Usuário</h4>
			      	<span><strong>ID:</strong> '.$r->id_u.'</span><br>
			      	<span><strong>Nome:</strong> '.$r->nome_u.'</span><br>
			      	<span><strong>CPF:</strong> '.$r->cpf_u.'</span><br>
			      	<span><strong>Email:</strong> '.$r->email_u.'</span><br>
			      </div>
			      <div class="col s12">
			      	<br>
			      	<h4>Itens do Pedido</h4>
			      	<table>
			      		<thead>
			      			<th><i class="material-icons">image</i></th>
			      			<th>#</th>
			      			<th>Nome</th>
			      			<th>Preço</th>
			      		</thead>
			      		<tbody>';
		}
		
		foreach ($rsItens as $rr) {
			echo '
			      			<tr>
			      				<th><img class="center materialboxed" src="https://infinitydev.com.br/e-commerce/produto/img/'.$rr->imagem_p.'" width="30" alt=""></th>
			      				<th>'.$rr->id_p.'</th>
			      				<th>'.$rr->nome_p.'</th>
			      				<th>R$'.number_format($rr->preco_p, 2, ',', '.').'</th>
			      			</tr>';
		}
		echo '			</tbody>
			      	</table>
			      </div></div>';


?>