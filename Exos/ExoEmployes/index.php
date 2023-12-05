<?php

require_once "Employe.class.php";
require_once "Manager.class.php";

$Alice = new Employe("Alice", 50000);
$Bob = new Manager("Bob", 70000, []);

$Bob->ajouterEmploye($Alice);
$Bob->afficherDetails();

$John = new Employe("John", 30000);

$Bob->ajouterEmploye($John);
// echo $Bob->getEmployeGeres();
$Bob->afficherDetails();