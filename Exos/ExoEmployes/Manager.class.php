<?php

class Manager extends Employe{
    
    public function __construct(protected string $nom, protected float $salaire, protected array $employesGeres)
    {
        parent::__construct($nom, $salaire);
    }

    public function getNom(){parent::getNom();}

    public function getSalaire(){parent::getSalaire();}
    
    public function getEmployeGeres(){return $this->employesGeres;}

    public function setNom($nom){parent::setNom($nom);}

    public function setSalaire($salaire){parent::setSalaire($salaire);}

    public function setEmployesGeres($employes){$this->employesGeres=$employes;}

    public function setEmployeGere($employe, $i){$this->employesGeres[$i]=$employe;}

    public function ajouterEmploye($employe){
        array_push($this->employesGeres, $employe);
    }

    public function afficherDetails(){
        parent::afficherDetails();
        echo "Employés gérés :"; 
        foreach ($this->employesGeres as $employe){
            echo "\nNom: {$employe->nom} Salaire {$employe->salaire}";
        }
        echo "\n";
    }

}