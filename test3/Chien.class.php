<?php

class Chien extends Animal{

    public function __construct(protected string $nom, protected int $age, protected string $race)
    {
        parent::__construct($nom,$age);
    }

    public function aboyer(){
        echo "woof! woof!\n";
    }

    public function afficherInfos()
    {
        parent::afficherInfos();
        echo "Race : {$this->race}\n";
    }

}