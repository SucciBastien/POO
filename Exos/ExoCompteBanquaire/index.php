<?php

require_once "Client.class.php";
require_once "Compte.class.php";

$compte1 = new Compte("0000", 0.0);
$compte2 = new Compte("0001", 0.0);
$compte3 = new Compte("0002", 0.0);
$compte4 = new Compte("0003", 0.0);

$client1 = new Client("Michel", "Michel1234", [$compte1->getNumeroCompte(), $compte2->getNumeroCompte()]);

$client2 = new Client("Jacque", "Jacque1234", [$compte3->getNumeroCompte(), $compte4->getNumeroCompte()]);


a:
echo "\n---------------------\nBienvenue à la banque\n---------------------\n \n";
echo "Veulliez choisir un client :\n\n1. Michel\n2. Jacque\nQ. Quitter le menu\n \n";

while (empty($numclient)){
    unset($action);
    $numclient = (int)readline();
    switch ($numclient){
        case 1: $client = $client1;
            break;
        case 2: $client = $client2;
            break;
        case $numclient == "Q" or $numclient == "q": 
            echo "Au revoir et à bientôt !";
            exit;
        default : echo "Choix invalide !\n\n";
            unset($numclient);
            break;
    }
}

b:
echo "\nQuelle action voulez-vous effectuer ?\n\n1. Afficher les infos du client\n2. Afficher les infos d'un des comptes du client\n3. Réaliser un retrait\n4. Réaliser un versement\n5. Effectuer un virement\nR. Retour au menu de selection des client\n \n";
while (empty($action)){
    unset($numclient);
    $action = (int)readline();
    switch ($action){
        case 1: $client->afficherSesInfos();
            goto a;
        case 2: echo "\nQuel compte voulez vous voir ?\n\n1. " . $client->getCompte(0) . "\n2. " . $client->getCompte(1) . "\n";
            $numcompte = (int)readline();
            switch ($numcompte){
                case 1: 
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte1;
                        break;
                    }
                    else{
                        $compte = $compte3;
                        break;
                    }
                case 2:
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte2;
                        break;
                    }
                    else{
                        $compte = $compte4;
                        break;
                    }
                default : echo "Choix invalide !\n\n";
                    goto b;
            }
            $compte->afficherInfosCompte();
            goto a;
        case 3: echo "\nDe quel compte voulez-vous retirer ?\n \n1. " . $client->getCompte(0) . "\n2. " . $client->getCompte(1) . "\n\n";
            $numcompte = (int)readline();
            switch ($numcompte){
                case 1: 
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte1;
                    }
                    else{
                        $compte = $compte2;
                    }
                    break;
                case 2:
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte3;
                    }
                    else{
                        $compte = $compte4;
                    }
                    break;
                default : echo "Choix invalide !\n\n";
                    goto b;
            }
            echo "\nQuel montant voulez-vous retirer ?\nSolde : " . $compte->getSolde() . "\n\n";
            $montant = readline();
            if ($montant<=$compte->getSolde()){
                $compte->retrait($montant);
                echo "Retrait effectué.\nNouveau solde : " . $compte->getSolde() . "\n";
                goto a;
            }
            else{
                echo "Solde insuffisant !\n";
                goto b;
            }
        case 4: echo "\nSur quel compte voulez-vous verser ?\n \n1. " . $client->getCompte(0) . "\n2. " . $client->getCompte(1) . "\n\n";
            $numcompte = (int)readline();
            switch ($numcompte){
                case 1: 
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte1;
                        break;
                    }
                    else{
                        $compte = $compte2;
                        break;
                    }
                case 2:
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte3;
                        break;
                    }
                    else{
                        $compte = $compte4;
                        break;
                    }
                    break;
                default : echo "Choix invalide !\n\n";
                    goto b;
            }
            echo "Quel montant déposez-vous ?\n";
            $montant = (float)readline();
            $compte->versement($montant);
            echo "Versement effectué.\nNouveau solde : " . $compte->getSolde() . "\n";
            goto a;
        case 5: echo "\nA partir de quel compte ?\n \n1. " . $client->getCompte(0) . "\n2. " . $client->getCompte(1) . "\n\n";
            $numcompte = (int)readline();
            switch ($numcompte){
                case 1: 
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte1;
                        $autreCompte = $compte2;
                        break;
                    }
                    else{
                        $compte = $compte2;
                        $autreCompte = $compte1;
                        break;
                    }
                case 2:
                    if ($client->getCompte(0)==$compte1->getNumeroCompte()){
                        $compte = $compte3;
                        $autreCompte = $compte4;
                        break;
                    }
                    else{
                        $compte = $compte4;
                        $autreCompte = $compte3;
                        break;
                    }
                    break;
                default : echo "Choix invalide !\n\n";
                    goto b;
            }
            echo "Quel montant virez-vous ?\n";
            $montant = (float)readline();
            if ($montant<=$compte->getSolde()){
                $compte->virement($autreCompte, $montant);
                echo "Virement effectué.\nNouveau solde de ce compte: " . $compte->getSolde() . "\nNouveau du compte viré : " . $autreCompte->getSolde() . "\n";
                goto a;
            }
            else{
                echo "Solde insuffisant !\n";
                goto b;
            }
        case $action=="r" or $action=="R":
            goto a;
        default: echo "Choix invalide !\n\n";
            unset($action);
            break;
    }
}

