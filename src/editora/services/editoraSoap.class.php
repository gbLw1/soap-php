<?php
require_once "../models/conexao.class.php";
require_once "../models/livroDAO.class.php";
require_once "../models/autor.class.php";
require_once "../models/genero.class.php";
require_once "../models/autorDAO.class.php";
require_once "../models/generoDAO.class.php";

// usar quando não tem o arquivo wsdl
// $opcao = array("uri"=>"http://localhost");
// $server = new soapServer(null, $opcao);

//usar quando tem wsdl
$server = new soapServer("editora.wsdl");

class editoraSoap
{
	private $autenticado = false;

	public function security($header)
	{
		if (isset($header->username) && isset($header->password)) {
			if ($header->username == "adm" && ($header->password == "123")) {
				$this->autenticado = true;
			}
		}
	}

	public function buscar_catalogo()
	{
		$livroDAO = new livroDAO();
		$retorno = $livroDAO->buscar_todos_livros();
		return json_encode($retorno);
	}

	public function buscar_livros_autor($autor)
	{
		if ($this->autenticado) {
			$autor = new Autor($autor);
			$autorDAO = new autorDAO();
			$retorno = $autorDAO->livros_por_autor($autor);
			return json_encode($retorno);
		} else {
			return json_encode("Problema de autenticacao");
		}
	}

	public function buscar_livros_por_genero($genero)
	{
		$genero = new Genero($genero);
		$generoDAO = new generoDAO();
		$retorno = $generoDAO->buscar_livros_genero($genero);
		return json_encode($retorno);
	}
}

$server->setObject(new editoraSoap());
$server->handle();

/*
$obj = new editoraSoap();
$ret = $obj->buscar_catalogo();
var_dump($ret);
*/
