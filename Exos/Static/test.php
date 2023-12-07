<?php

class facture{

    const TVA = 0.2;

    public static function montantTTC($prixHT){
        return $prixHT*(1+self::TVA);
    }

}

echo facture::montantTTC(1000);