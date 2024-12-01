<?php
class Human implements Race{
    protected int $maxHealth;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 10;
        $this->armor = 1;
    }

    public function setMaxHealth(int $maxHealth){
        $this->maxHealth = $maxHealth;
    }
    public function setArmor(int $armor){
        $this->armor = $armor;
    }
    public function getMaxHealth(): int{
        return $this->maxHealth;
    }
    public function getArmor():int{
        return $this->armor;
    }

    public function getStats(){
        return [$this->maxHealth, $this->armor];
    }
    public function getSkills(){
    }
}