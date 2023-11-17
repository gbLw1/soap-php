<?php

class livroDAO extends conexao
{
	public function __construct()
	{
		parent::__construct();
	}

	public function buscar_todos_livros()
	{
		$sql = "SELECT * FROM livro";
		try {
			$stm = $this->db->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			return "Problema ao buscar catalogo de livros";
		} finally {
			$this->db = null;
		}
	}

	public function buscar_por_ano($livro) {
		$sql = "SELECT * FROM livro WHERE ano = ?";
		try {
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $livro->getAno());
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			return "Problema ao buscar livros por ano";
		}
		finally {
			$this->db = null;
		}
	}
}

