<?php 

class Personne{
    // public $nom;
    // public $prenom;

    public function __construct(public string $nom, public string $prenom)
    {
        // $this->nom = $name;
        // $this->prenom = $prenom;
    }

    public function afficherInfos(){
        echo "Nom : {$this->nom}, Prénom : {$this->prenom}";
    }
}