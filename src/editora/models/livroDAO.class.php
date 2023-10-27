<?php
	class livroDAO extends conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todos_livros()
		{
			$sql = "SELECT * FROM livro";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				return "Problema ao buscar catalogo de livros";
			}
		}

		
		
	}//fim classe
?>