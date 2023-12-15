<?php

require_once "Models/LivreManager.class.php";
require_once "Models/Model.class.php";

class LivresController{

    private $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    public function afficherLivre(){
        $livres = $this->livreManager->getLivres();
        require "Views/livres.view.php";
    }

}