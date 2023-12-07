<?php

require_once "intface.class.php";
require_once "humain.class.php";
require_once "chasseur.class.php";
require_once "animal.class.php";
require_once "lapin.class.php";

$lapin = new lapin("marron", 3, 1);

$chasseur = new chasseur("Benoit", "sniper");

echo lapin::seNourir();

while ($lapin->getEnVie()==1){
    echo $chasseur->SeDeplacer();
    echo lapin::crier();
    $tire = $chasseur->chasser();
    if ($tire==0){
        echo lapin::fuir();
    }
    else{
        $lapin->setEnVie(0);
    }
}
echo "Le lapin est mort .";