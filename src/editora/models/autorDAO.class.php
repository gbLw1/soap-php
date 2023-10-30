<?php

class autorDAO extends Conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function livros_por_autor($autor)
	{
		$sql = "SELECT l.* from livro as l, autor as a , livro_autor as la
		    WHERE a.idautor = la.idautor AND l.idlivro = la.idlivro AND a.idautor = ? ";
		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $autor->getIdautor());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			$this->db = null;
			return "Problema ao buscar os livros do autor";
		}
	}

	public function listar_autores()
	{
		$sql = "SELECT * FROM autor ";
		try {
			$stm = $this->db->prepare($sql);
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			$this->db = null;
			return "Problema ao buscar os autores";
		}
	}
}
