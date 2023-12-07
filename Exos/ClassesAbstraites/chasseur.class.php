<?php

class chasseur extends humain{

    public function __construct(protected string $nom, protected string $arme)
    {
        parent::__construct($nom);
        echo "Le chasseur {$this->nom} a été créer avec un {$this->arme}.\n\n";
    }

    public function getNom(){return $this->nom;}

    public function getArme(){return $this->arme;}

    public function chasser(){
        echo "{$this->nom} tire avec son {$this->arme} et ";
        $rand = rand(1,6);
        if ($rand==1 or $rand==6) {
            echo "touche !\n\n";
            return 1;
        }
        else{
            echo "rate !\n\n";
            return 0;
        }
    }

    public function SeDeplacer()
    {
        return "{$this->nom} avance avec son {$this->arme}.\n\n";
    }

}