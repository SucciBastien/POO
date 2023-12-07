<?php

class maClasse{

    public function __construct( private string $attr1, private string $attr2, private string $attr3)
    {
        
    }

    public function __toString()
    {
        return "Attribut 1 : {$this->attr1}, Attribut 2 : {$this->attr2}, Attribut 3 : {$this->attr3}";
    }

}

$ob = new maClasse("valeur1", "valeur2", "valeur3");

echo $ob;