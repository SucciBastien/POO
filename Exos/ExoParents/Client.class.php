<?php

class Client{

    public function __construct(protected string $nom, protected string $identifiant, protected array $comptes)
    {
        
    }

    public function getNom(){return $this->nom;}

    public function getIdentifiant(){return $this->identifiant;}

    public function getComptes(){return $this->comptes;}

    public function getCompte($i){return $this->comptes[$i];}

    public function setNom($nom){$this->nom = $nom;}

    public function setIdentifiant($identifiant){$this->identifiant = $identifiant;}

    public function setComptes($comptes){$this->comptes = $comptes;}

    public function setCompte($compte, $i){$this->comptes[$i] = $compte;}

    public function afficherSesInfos(){
        echo "L'identifiant est {$this->identifiant} et ses numéros de comptes sont " . implode(", ", $this->comptes) . "\n \n";
    }
}