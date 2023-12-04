<?php
require_once "Personne.class.php";

$personne1 = new Personne("DOE", "John");
$personne1->afficherInfos();

echo "Prénom : " . $personne1->getPrenom() . "\n";
echo "Nom : " . $personne1->getNom() . "\n";

$personne1->setPrenom("Jane");
echo "Prénom : " . $personne1->getPrenom() . "\n";
echo "Nom : " . $personne1->getNom() . "\n";
