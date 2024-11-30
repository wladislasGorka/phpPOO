<?php
class Human implements Race{
    protected int $maxHealth;
    protected int $health;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 0;
        $this->health = 0;
        $this->armor = 0;
    }
}