<?php
require_once "Animal.class.php";
require_once "Chien.class.php";

$animal1 = new Animal("Clifford", 450);
$animal1->afficherInfos();

$chien = new Chien("Max", 2, "Labrador");
$chien->afficherInfos();
$chien->aboyer();