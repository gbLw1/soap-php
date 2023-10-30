<?php

class Livro
{
    public function __construct(
        private int $idlivro = 0,
        private string $titulo = "",
        private string $sinopse = "",
        private int $ano = 0,
        private float $preco = 0.00,
        $genero = null,
        private int $codigo_livro = 0
    ) {
    }

    public function getIdlivro()
    {
        return $this->idlivro;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getSinopse()
    {
        return $this->sinopse;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getCodigoLivro()
    {
        return $this->codigo_livro;
    }
}

