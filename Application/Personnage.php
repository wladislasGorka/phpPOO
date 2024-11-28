<?php
abstract class Personnage{
    protected string $name;
    protected int $pv;
    protected int $endurance;
    protected int $force;
    protected int $forceBonus;
    protected int $agilite;
    protected int $chance;
    protected int $armure;
    protected string $arme;
    protected bool $statut;

    protected function __construct(){
    }

    public function attaquer(){}

    public function defendre(){}

    public function deceder(){}

    public function crashTheGameIfLoose(){}
}