<?php

class Animal{

    public function __construct(protected string $nom, protected int $age)
    {
        
    }

    public function getNom(){return $this->nom;}

    public function getAge(){return $this->age;}

    public function setNom($nom){$this->nom = $nom;}

    public function setAge($age){$this->age = $age;}

    public function afficherInfos(){
        echo "Nom : {$this->nom}\nAge : {$this->age}\n";
    }
}