<?php

class Produit{
    public function __construct(private string $nom, private float $prixUni, private int $stock)
    {
        
    }

    public function getNom(){return $this->nom;}

    public function getPrixUni(){return $this->prixUni;}

    public function getStock(){return $this->stock;}

    public function setNom($nom){$this->nom = $nom;}

    public function setPrixUni($prixUni){$this->prixUni = $prixUni;}

    public function setStock($stock){$this->stock = $stock;}

    public function afficherPoduit(){
        echo "Produit : {$this->nom} \nPrix unitaire : {$this->prixUni}€\nQuantité en stock : {$this->stock}\n";
    }

    public function mettreAJourPrix($prix){
        $this->prixUni = $prix;
    }

    public function ajouterStock($nouveauStock){
        $this->stock += $nouveauStock;
    }

    public function vendreProduit($quantite){
        if ($quantite<=$this->stock){
            $this->stock -= $quantite;
        }
        else {
            echo "Stock insuffisant\n";
        }
    }
}