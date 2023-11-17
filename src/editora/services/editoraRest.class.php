<?php

require_once "../models/conexao.class.php";
require_once "../models/autor.class.php";
require_once "../models/autorDAO.class.php";
require_once "../models/livro.class.php";
require_once "../models/livroDAO.class.php";

class editoraRest {
	public function buscar_catalogo() {
		$livroDAO = new livroDAO();
		$retorno = $livroDAO->buscar_todos_livros();
		return json_encode($retorno);
	}

	public function buscar_livro_autor($nome) {
		$autor = new Autor(nome: $nome);
		$autorDAO = new autorDAO();
		$retorno = $autorDAO->buscar_livros_por_autor($autor);
		return json_encode($retorno);
	}

	public function buscar_livro_ano($ano) {
		$livro = new Livro(ano: $ano);
		$livroDAO = new livroDAO();
		$retorno = $livroDAO->buscar_por_ano($livro);
		return json_encode($retorno);
	}
}

$obj = new editoraRest();

if ($_GET) {
	if (isset($_GET["oper"])) {
		$metodo = $_GET["oper"];
	}

	if ($metodo == "buscar_catalogo") {
		$ret = $obj->$metodo();
	}

	if ($metodo == "buscar_livro_autor") {
		$ret = $obj->$metodo($_GET["nome"]);
	}

	exit($ret);
}

if ($_POST) {
	if (isset($_POST["oper"])) {
		$metodo = $_POST["oper"];
	}

	if ($metodo == "buscar_livro_ano") {
		$ret = $obj->$metodo($_POST["ano"]);
	}

	exit($ret);
}
