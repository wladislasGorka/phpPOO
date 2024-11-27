<?php
class Avion extends Vehicule{
    public int $altitudeMax;

    public function __construct(string $marque, string $modele, int $kilometrage, int $vitesseMax, int $cylindre, int $altitudeMax){
        parent::__construct($marque,$modele,$kilometrage,$vitesseMax,$cylindre);
        $this->altitudeMax = $altitudeMax;
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

    public function setAltitudeMax(string $altitudeMax){
        $this->altitudeMax = $altitudeMax;
    }
    public function getAltitudeMax(){
        return $this->altitudeMax;
    }

    public function deplace(){
        echo "Je vole! <br>";
    }
    public function accelere(){
        echo "Je passe la manette des gaz à fond !!! <br>";
    }
    public function freine(){
        echo "j'inverse la poussée. <br>";
    }
    public function bruit(){
        echo "grondement de réacteur. <br>";
    }
    public function vole(){}

    public function printAvion(){
        echo "<br>";
        echo "Marque de mon avion: " . $this->marque . "<br>";
        echo "Modele de mon avion: " . $this->modele . "<br>";
        echo "Kilometrage de mon avion: " . $this->kilometrage . "<br>";
        echo "Vitesse max de mon avion: " . $this->vitesseMax . "<br>";
        echo "Cylindre de mon avion: " . $this->cylindre . "<br>";
        echo "Altitude max de mon avion: " . $this->altitudeMax . "<br>";
        echo "<br>";
    }
}