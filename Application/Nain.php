<?php
class Nain extends Personnage implements Arme, Talent{

    public function __construct(string $name){
        $this->name= $name;
        $this->pv= 100;
        $this->endurance= 50;
        $this->force= 25;
        $this->forceBonus= 0;
        $this->agilite= 10;
        $this->chance= 10;
        $this->armure= 10;
        $this->arme= "mains nues";
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
    public function getForceBonus(){
        return $this->forceBonus;
    }
    public function setForceBonus(int $forceBonus){
        $this->forceBonus = $forceBonus;
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
    public function getArme(){
        return $this->arme;
    }
    public function setArme(int $arme){
        $this->arme = $arme;
    }
    public function getStatut(){
        return $this->statut;
    }
    public function setStatut(bool $statut){
        $this->statut = $statut;
    }

    public function epee(){ $this->forceBonus = 6; $this->arme = "epee"; }
    public function arc(){ $this->forceBonus = 0; $this->arme = "arc"; }
    public function masse(){ $this->forceBonus = 8; $this->arme = "masse"; }
    public function dague(){ $this->forceBonus = 2; $this->arme = "dague"; }
    public function baton(){ $this->forceBonus = 2; $this->arme = "baton"; }
    public function sceptre(){ $this->forceBonus = 4; $this->arme = "sceptre"; }

    public function equiperArmeAleatoire() {
        $armes = ['epee', 'arc', 'masse', 'dague', 'baton', 'sceptre'];
        $armeAleatoire = $armes[array_rand($armes)];
        call_user_func([$this, $armeAleatoire]);
    }
    
    public function cavalier(){}
    public function magicien(){}
    public function guerrier(){}
    public function necromancien(){}
    public function voleur(){}
    public function assassin(){}
    public function pretre(){}

    public function attaquer(){
        if( $this->statut ){
            $degats = $this->force + $this->forceBonus;
            $degats += rand(1,6);
            return (rand(1,100)<=$this->chance)?$degats*2:$degats;
        }else{
            return 0;
        }
    }
    public function defendre(){
        return (rand(1,100)<=$this->agilite)?1000:$this->armure;
    }
}