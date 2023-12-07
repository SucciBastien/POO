<?php


class employes{

    public function __construct(private string $nom, private float $salaire)
    {
        
    }

    public function __get($name)
    {
        if (property_exists($this, $name)){
            return $this->$name;
        }
        else{
            trigger_error("L'attribut $name n'existe pas !\n", E_USER_ERROR);
            return NULL;
        }
    }

    public function __toString()
    {
        return "Nom : " . $this->nom . ", Salaire : " . $this->salaire . "€\n\n";
    }

    public function augmenterSalaire($percent){
        $this->salaire = $this->salaire * (1+($percent/100));
    }


}