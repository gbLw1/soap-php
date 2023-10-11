<?php
	require_once "../models/conexao.class.php";
	require_once "../models/livroDAO.class.php";
	
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	
	class editoraSoap {
		public function buscar_catalogo() {
			$livroDAO = new livroDAO();
			$retorno = $livroDAO->buscar_todos_livros();
			return json_encode($retorno);
		}
	}
	
	$server->setObject(new editoraSoap());
	$server->handle();

	// $obj = new editoraSoap();
	// $ret = $obj->buscar_catalogo();
	
	// var_dump($ret);
?>