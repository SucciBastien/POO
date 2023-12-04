<?php 
require_once "Voiture.class.php";

$voiture1 = new Voiture("Peugeot", "205 GR", 1990, "Noire", 0);
$voiture1->afficher();

echo "\n";
$voiture1->accelerer(80);
$voiture1->afficher();

$voiture1->accelerer(20);
$voiture1->afficher();