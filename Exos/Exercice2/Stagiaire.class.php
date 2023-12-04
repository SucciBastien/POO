<?php

class Stagiaire{

    public function __construct(private string $nom, private array $notes)
    {
        
    }

    public function getNom(){return $this->nom;}

    public function getNotes(){return $this->notes;}

    public function getNote($i){return $this->notes[$i];}

    public function setNom($nom){$this->nom = $nom;}

    public function setNotes($notes){$this->notes = $notes;}

    public function setNote($note, $i){$this->notes[$i] = $note;}

    public function calculerMoyenne(){
        $moy = array_sum($this->notes) / count($this->notes);
        return $moy;
    }

    public function trouverMax(){
        return max($this->notes);
    }

    public function trouverMin(){
        return min($this->notes);
    }

    public function afficher(){
        echo "La moyenne de {$this->nom} est de {$this->calculerMoyenne()}.\nSa meilleure note est {$this->trouverMax()} et sa pire note est {$this->trouverMin()} ";
    }


}