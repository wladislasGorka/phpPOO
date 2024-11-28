<?php
class Nain extends Personnage implements Arme, Talent{

    public function __construct(string $name){
        $this->name= $name;
        $this->pv= 100;
        $this->endurance= 50;
        $this->force= 20;
        $this->agilite= 15;
        $this->chance= 10;
        $this->armure= 5;
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
    public function getAgilite(){
        return $this->agilite;
    }
    public function setAgilite(int $agilite){
        $this->agilite = $agilite;
    }
    public function getChance(){
        return $this->chance;
    }
    public function setChance(int $chance){
        $this->chance = $chance;
    }
    public function getArmure(){
        return $this->armure;
    }
    public function setArmure(int $armure){
        $this->armure = $armure;
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