<?php
abstract class Vehicule{
    protected string $marque;
    protected string $modele;
    protected int $kilometrage;
    protected int $vitesseMax;
    protected int $cylindre;

    protected function __construct(string $marque, string $modele, int $kilometrage, int $vitesseMax, int $cylindre){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->kilometrage = $kilometrage;
        $this->vitesseMax = $vitesseMax;
        $this->cylindre = $cylindre;
    }

    protected function deplace(){}
    protected function accelere(){}
    protected function freine(){}
    protected function bruit(){}
}