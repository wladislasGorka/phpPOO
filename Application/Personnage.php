<?php
abstract class Personnage{
    protected string $name;
    protected int $pv;
    protected int $endurance;
    protected int $force;
    protected bool $statut;

    protected function __construct(string $name, int $pv, int $endurance, int $force, bool $statut){
    }

    public function attaquer(){}

    public function defendre(){}

    public function deceder(){}

    public function crashTheGameIfLoose(){}
}