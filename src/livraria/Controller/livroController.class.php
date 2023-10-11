<?php

// require_once "models/Conexao.class.php";
require_once '../config.php';

class livroController {
	public function listar() {
		global $envBasePath;
		
		$serviceUrl = $envBasePath . "editora/services/editoraSoap.class.php";
		
		$opcao = array(
			"location" => $serviceUrl,
			"uri" => "http://localhost"
		);
		
		$client = new soapClient(null, $opcao);

		$retorno = $client->buscar_catalogo();
		$json = json_decode($retorno);
		require_once "Views/listar_livros.php";
	}
}
