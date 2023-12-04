<?php
class Voiture{
    public function __construct(private string $marque, private string $modele, private int $annee, private string $couleur, private int $vitesseAct)
    {
        
    }

    public function getMarque(){return $this->marque;}

    public function getModele(){return $this->modele;}

    public function getAnnee(){return $this->annee;}

    public function getCouleur(){return $this->couleur;}

    public function getVitesseAct(){return $this->vitesseAct;}

    public function setMarque($marque){$this->marque = $marque;}

    public function setModel($modele){$this->modele = $modele;}

    public function setAnnee($annee){$this->annee = $annee;}

    public function setCouleur($annee){$this->annee = $annee;}

    public function setVitesseAct($vitesseAct){$this->vitesseAct = $vitesseAct;}

    public function afficher(){
        echo "{$this->marque} - {$this->modele} ({$this->annee}) - {$this->couleur} - Vitesse : {$this->vitesseAct} km/h";
    }

    public function accelerer($vitesse){
        $this->vitesseAct += $vitesse;
    }
}