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
        return [new Heal(),new Pierce()];
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}