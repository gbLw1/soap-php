<?php

class Genero{
    public function __construct(private int $idgenero = 0, private string $descritivo ="",private string $nacionalidade = ""){}

    public function getIdgenero(){
        return $this->idgenero;
    }
    
    public function getDescritivo(){
        return $this->descritivo;
    }
    
   
}

?>