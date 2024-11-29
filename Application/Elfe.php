<?php
class Elfe extends Personnage implements Arme, Talent{

    public function __construct(string $name){
        $this->name= $name;
        $this->pv= 100;
        $this->endurance= 50;
        $this->force= 20;
        $this->agilite= 20;
        $this->chance= 15;
        $this->armure= 5;
        $this->arme= "mains nues";
        $this->talent= "";
        $this->statCombat= [
            'pv'=> $this->pv,
            'endurance'=>$this->endurance,
            'force'=>$this->force,
            'agilite'=>$this->agilite,
            'chance'=>$this->chance,
            'armure'=>$this->armure
        ];
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
            $this->pv = 0;
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
    public function getArme(){
        return $this->arme;
    }
    public function setArme(int $arme){
        $this->arme = $arme;
    }
    public function getTalent(){
        return $this->talent;
    }
    public function setTalent(int $talent){
        $this->talent = $talent;
    }
    public function getStatCombat($stat){
        return $this->statCombat[$stat];
    }
    public function getStatut(){
        return $this->statut;
    }
    public function setStatut(bool $statut){
        $this->statut = $statut;
    }

    public function epee(){ $this->statCombat['force'] = $this->force + 4; $this->arme = "epee"; }
    public function arc(){ $this->statCombat['force'] = $this->force + 10; $this->arme = "arc"; }
    public function masse(){ $this->statCombat['force'] = $this->force + 0; $this->arme = "mass"; }
    public function dague(){ $this->statCombat['force'] = $this->force + 6; $this->arme = "dague"; }
    public function baton(){ $this->statCombat['force'] = $this->force + 2; $this->arme = "baton"; }
    public function sceptre(){ $this->statCombat['force'] = $this->force + 0; $this->arme = "sceptre"; }

    public function equiperArmeAleatoire() {
        $armes = ['epee', 'arc', 'masse', 'dague', 'baton', 'sceptre'];
        $armeAleatoire = $armes[array_rand($armes)];
        call_user_func([$this, $armeAleatoire]);
    }

    public function cavalier(){ $this->talent = "cavalier"; }
    public function magicien(){ $this->talent = "magicien"; }
    public function guerrier(){ $this->talent = "guerrier"; }
    public function necromancien(){ $this->talent = "necromancien"; }
    public function voleur(){ $this->talent = "voleur"; }
    public function assassin(){ $this->talent = "assassin"; }
    public function pretre(){ $this->talent = "pretre"; }

    public function equiperTalentAleatoire() {
        $talents = ['cavalier', 'magicien', 'guerrier', 'necromancien', 'voleur', 'assassin', 'pretre'];
        $talentAleatoire = $talents[array_rand($talents)];
        call_user_func([$this, $talentAleatoire]);
    }

    public function attaquer(){
        if( $this->statut ){
            $degats = $this->statCombat['force'];
            $degats += rand(1,6);
            return (rand(1,100)<=$this->chance)?$degats*2:$degats;
        }else{
            return 0;
        }
    }
    public function defendre(){
        if(rand(1,100)<=$this->agilite){
            echo "Esquive! <br>";
            return 1000;
        }
        return $this->armure;
    }
}