<?php
class Human implements Race{
    protected int $maxHealth;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 10;
        $this->armor = 0;
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
        return [
            'maxHealth' => $this->maxHealth,
            'armor' => $this->armor
        ];
    }

    public function levelUp(int $level){
        if($level%2== 0){
            return [1,1];
        }else{
            return [2,0];
        }
    }

    public function getSkills() {
        return [new Attack(),new Heal()];
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}