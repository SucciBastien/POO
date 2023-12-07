<?php

require_once "utilitaire.class.php";

$info1 = new utilitaire("Ceci est un information");

echo $info1->getInformations() . "\n";

echo utilitaire::addition(5,10) . "\n";

echo utilitaire::multiplication(5,10) . "\n";

echo utilitaire::multiplication(5,2) . "\n";

echo utilitaire::addition(5,98) . "\n";

echo utilitaire::getTotalOperations() . "\n";
