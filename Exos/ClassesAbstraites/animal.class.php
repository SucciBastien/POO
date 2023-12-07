<?php

abstract class animal extends intface{

    public function __construct(protected string $couleur, protected int $nbPattes)
    {
        
    }

    abstract public static function crier();
    
}