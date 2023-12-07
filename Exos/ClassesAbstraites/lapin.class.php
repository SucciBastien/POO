<?php

class lapin extends animal{

    public function __construct(protected string $couleur, protected int $nbPattes, protected bool $enVie)
    {
        parent::__construct($couleur, $nbPattes);
        echo "Le lapin {$this->couleur} à {$this->nbPattes} pattes a été créer.\n\n";
    }

    public function getEnVie(){return $this->enVie;}

    public function setEnVie($x){$this->enVie=$x;}

    public static function crier(){
        return "Le lapin glapie de peur !\n\n";
    }

    public static function seNourir(){
        return "Le lapin mange paisiblement.\n\n";
    }

    public static function fuir(){
        return "Le lapin bondit pour s'enfuir !\n\n";
    }

}