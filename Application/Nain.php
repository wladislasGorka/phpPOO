<?php
class Nain extends Personnage implements Arme, Talent{

    public function __construct(string $name){
        $this->name= $name;
        $this->pv= 100;
        $this->endurance= 60;
        $this->force= 70;
        $this->statut= true;
    }

    public function getName(){
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getPv(){
        return $this->pv;
    }
    public function setPv( int $pv){
        $this->pv = $pv;
    }
    public function getEndurance(){
        return $this->endurance;
    }
    public function setEndurance(int $endurance){
        $this->endurance = $endurance;
    }
    public function getForce(){
        return $this->force;
    }
    public function setForce(int $force){
        $this->force = $force;
    }
    public function getStatut(){
        return $this->statut;
    }
    public function setStatut(bool $statut){
        $this->statut = $statut;
    }

    public function epee(){}
    public function arc(){}
    public function masse(){
        $this->force = 120;
    }
    public function dague(){}
    public function baton(){}
    public function sceptre(){}

    public function cavalier(){}
    public function magicien(){}
    public function guerrier(){}
    public function necromancien(){}
    public function voleur(){}
    public function assassin(){}
    public function pretre(){}
}