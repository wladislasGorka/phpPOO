<?php
abstract class Entity{
    protected string $name;
    protected int $maxHealth;
    protected int $health;
    protected int $armor;
    protected int $level;

    protected function __construct(string $name){
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }
    public function getMaxHealth(){
        return $this->maxHealth;
    }
    public function getHealth(){
        return $this->health;
    }
    public function getArmor(){
        return $this->armor;
    }
    public function getLevel(){
        return $this->level;
    }

    public function setName(string $name){
        $this->name=$name;
    }
    public function setMaxHealth(int $maxHealth){
        $this->maxHealth=$maxHealth;
    }
    public function setHealth(int $health){
        if($health > $this->maxHealth){
            $this->health= $health;
        }else{
            $this->health=$this->maxHealth;
        }
    }
    public function setArmor(int $armor){
        if($this->armor<0){
            $this->armor= 0;
        }else{
            $this->armor=$armor;
        }
    }
    public function setLevel(int $level){
        $this->level=$level;
    }



}