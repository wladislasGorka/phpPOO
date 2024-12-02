<?php
class Hunter implements Talent{
    protected int $maxHealth;
    protected int $health;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 0;
        $this->health = 0;
        $this->armor = 0;
    }

    public function getSkills() {
        return [new Attack(),new Pierce()];
    }

    public function levelUp(int $level) {
        switch($level) {
            case 1: return [new Attack(),new Pierce()]; break;
            case 2: return [new Strike(),new Pierce()]; break;
            case 3: return [new Strike(),new Pierce()]; break;
            case 4: return [new Strike(),new Pierce()]; break;
            case 5: return [new Strike(),new Pierce()]; break;
        }
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}