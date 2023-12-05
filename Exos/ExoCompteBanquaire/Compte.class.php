<?php


class Compte extends Client{

    public function __construct(private string $numeroCompte, private float $solde)
    {
        
    }

    public function getNumeroCompte(){return $this->numeroCompte;}

    public function getSolde(){return $this->solde;}

    public function setNumeroCompte($numeroCompte){$this->numeroCompte = $numeroCompte;}

    public function setSolde($solde){$this->solde = $solde;}

    public function afficherInfosCompte(){
        echo "Numéro de compte : {$this->numeroCompte}\nSolde du compte : {$this->solde}\n\n";
    }

    public function retrait($somme){
        $this->solde -= $somme;
    }

    public function versement($somme){
        $this->solde += $somme;
    }

    public function virement($compte, $somme){
        $this->retrait($somme);
        $compte->versement($somme);
    }

}