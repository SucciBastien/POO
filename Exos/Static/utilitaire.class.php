<?php

class utilitaire{

    private static int $totalOperations = 0;

    public function __construct(private string $informations)
    {
        
    }

    public function getInformations(){return $this->informations;}

    public static function getTotalOperations(){
        return "Nombre total d'opérations : " . self::$totalOperations;
    }

    public static function addition($a, $b){
        self::$totalOperations++;
        return "$a + $b = " . $a+$b;
    }

    public static function multiplication($a, $b){
        self::$totalOperations++;
        return "$a * $b = " . $a*$b;
    }
}