<?php

class generoDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }


    public function buscar_livros_genero($genero)
    {

        $sql = "SELECT * FROM livro INNER JOIN genero ON livro.idgenero = genero.idgenero where genero.idgenero = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $genero->getIdgenero());
            $stm->execute();
            $this->db = null;
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao buscar catalogo de livros";
        }
    }
}

