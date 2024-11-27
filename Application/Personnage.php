<?php
abstract class Personnage{
    protected string $name;
    protected int $pv;
    protected int $endurance;
    protected int $force;

    protected function __construct(string $name, int $pv, int $endurance, int $force){
    }

    public function attaquer(){}

    public function defendre(){}

    public function deceder(){}

    public function crashTheGameIfLoose(){}
}