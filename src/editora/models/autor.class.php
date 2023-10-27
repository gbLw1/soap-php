<?php

class Autor{
    public function __construct(private int $idautor = 0, private string $nome ="",private string $nacionalidade = ""){}

    public function getIdautor(){
        return $this->idautor;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getNacionalidade(){
        return $this->nacionalidade;
    }
}

?>