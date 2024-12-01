<?php
class Mob extends Entity{
    protected $damage;

    public function __construct(string $name, int $health, int $armor, int $damage, int $level){
        parent::__construct($name);   
        $this->level=$level;
        $this->maxHealth=$health;
        $this->health=$health;
        $this->armor=$armor;
        $this->damage=$damage;
    }

    public function getDamage():int{
        return $this->damage;
    }
    public function setDamage(int $damage):void{
        $this->damage=$damage;
    }
}