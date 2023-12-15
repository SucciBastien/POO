<?php

require_once "Controller/LivreController.php";
$livreController = new LivresController();


if(empty($_GET['page'])){
    require_once "Views/accueil.view.php";
}
else{
    switch($_GET['page']){
        case "accueil" : require "Views/accueil.view.php";
        break;
        case "livres" : $livreController->afficherLivre();
        break;
    }
}