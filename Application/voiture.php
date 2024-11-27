<?php
class Voiture extends Vehicule{

    public function __construct(string $marque, string $modele, int $kilometrage, int $vitesseMax, int $cylindre){
        parent::__construct($marque,$modele,$kilometrage,$vitesseMax,$cylindre);
    }

    public function setMarque(string $marque){
        $this->marque = $marque;
    }
    public function getMarque(){
        return $this->marque;
    }

    public function setModele(string $modele){
        $this->modele = $modele;
    }
    public function getModele(){
        return $this->modele;
    }

    public function setKilometrage(string $kilometrage){
        $this->kilometrage = $kilometrage;
    }
    public function getKilometrage(){
        return $this->kilometrage;
    }

    public function setVitesseMax(string $vitesseMax){
        $this->vitesseMax = $vitesseMax;
    }
    public function getVitesseMax(){
        return $this->vitesseMax;
    }

    public function setCylindre(string $cylindre){
        $this->cylindre = $cylindre;
    }
    public function getCylindre(){
        return $this->cylindre;
    }

    public function deplace(){
        echo "Je roule! <br>";
    }
    public function accelere(){
        echo "Chauffeur si t'es champion... <br>";
    }
    public function freine(){
        echo "Ralentit! <br>";
    }
    public function bruit(){
        echo "grondement de moteur. <br>";
    }
    public function vole(){}
}