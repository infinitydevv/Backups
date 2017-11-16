<?php 
/* 
* @Autor: Bruno França
* @Descrição: Acessa métodos do CRUD
*/
	class controllerDocumento{

		public function inserirDados(modelDocumento $model){
			require_once 'crudDocumento.php';
			$crud = new crudDocumento;
			$inserir = $crud->inserir($model->getId(), $model->getDescricao(), $model->getUrl(), $model->getIdUsu());	
			return $inserir;			
		}

		public function selecionarDados($where = null){
			require_once 'crudDocumento.php';
			$crud = new crudDocumento;
			if($where == null){
				$selecionar = $crud->selecionar(null);				
			} else {
				$selecionar = $crud->selecionar($where);
			}
			return $selecionar;
		}

		public function atualizarDados(modelDocumento $model){
			require_once 'crudDocumento.php';
			$crud = new crudDocumento;
			$iddoc = $model->getId();
			$desc = $model->getDescricao();
			$url = $model->getUrl();
			$idusu = $model->getIdUsu();
			$atualizar = $crud->atualizar($desc, $url, $idusu, "iddoc = $iddoc");
			return $atualizar;
		}

		public function removerDados(modelDocumento $model){
			require_once 'crudDocumento.php';
			$crud = new crudDocumento;
			$id = $model->getId();
			$remover = $crud->deletar("iddoc = $id");
			return $remover;
		}
	}
?>