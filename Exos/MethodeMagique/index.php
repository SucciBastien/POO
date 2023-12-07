<?php

require "employes.class.php";

$bob = new employes ("Bob", 15000);

echo $bob;

$bob->augmenterSalaire(9);

echo $bob;

echo $bob->age;