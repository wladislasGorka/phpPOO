<?php
class Elfe extends Personnage implements Arme, Talent{

    public function __construct(string $name){
        $this->name= $name;
        $this->pv= 100;
        $this->endurance= 40;
        $this->force= 60;
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
        if($this->pv<=0){
            $this->setStatut(false);
        }
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

    public function epee(){
        $this->force = 70;
    }
    public function arc(){
        $this->force = 100;
    }
    public function masse(){}
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

    public function attaquer(){
        if( $this->statut ){
            return $this->force;
        }else{
            return 0;
        }
    }
    public function defendre(){
        return $this->endurance;
    }
}