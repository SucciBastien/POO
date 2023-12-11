<?php

class livre{

    public function __construct(private int $idLivre, private string $titre, private int $nbPages, private $image)
    {
        
    }

    public function getidLivre(){return $this->idLivre;}
    public function gettitre(){return $this->titre;}
    public function getnbPages(){return $this->nbPages;}
    public function getimage(){return $this->image;}

    public function setidLivre($x){$this->idLivre = $x;}
    public function settitre($x){$this->titre = $x;}
    public function setnbPages($x){$this->nbPages = $x;}
    public function setimage($x){$this->image = $x;}

}