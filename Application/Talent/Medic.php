<?php
class Medic implements Talent{
    protected int $maxHealth;
    protected int $health;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 0;
        $this->health = 0;
        $this->armor = 0;
    }

    public function getSkills() {
        return [new Heal(),new Heal()];
    }

    public function levelUp(int $level) {
        switch($level) {
            case 1: return [new Heal(),new Heal()]; break;
            case 2: return [new Heal(),new HealAll()]; break;
            case 3: return [new Heal(),new HealAll()]; break;
            case 4: return [new Heal(),new HealAll()]; break;
            case 5: return [new Heal(),new HealAll()]; break;
        }
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}