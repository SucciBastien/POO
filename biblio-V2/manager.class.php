<?php

class manager{

    private $livres;

    public function ajoutLivre($livre){
        $this->livres[] = $livre; 
    }

    public function getlivres(){return $this->livres;}

}