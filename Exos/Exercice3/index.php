<?php
require_once "Produit.class.php";

$produit1 = new Produit("Clou", 0.02, 1200);
$produit1->afficherPoduit();

echo "\n";
$produit1->mettreAJourPrix(0.01);
$produit1->afficherPoduit();

echo "\n";
$produit1->ajouterStock(200);
$produit1->afficherPoduit();

echo "\n";
$produit1->vendreProduit(1500);
$produit1->afficherPoduit();

echo "\n";
$produit1->vendreProduit(500);
$produit1->afficherPoduit();

$produit1->setPrixUni(5);
echo $produit1->getPrixUni();
