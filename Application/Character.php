<?php
class Character extends Entity{

    protected Race $race;
    protected Talent $talent;
    protected int $exp;

    public function __construct(string $name, Race $race, Talent $talent){
        parent::__construct($name);
        $this->race=$race;
        $this->talent=$talent;        
        $this->level=1;
        $this->exp=0;
        $this->maxHealth=0;
        $this->health=0;
        $this->armor=0;
    }

    public function getRace(): Race{
        return $this->race;
    }
    public function getTalent(): Talent{
        return $this->talent;
    }
    public function getExp(): int{
        return $this->exp;
    }

    public function setRace(Talent $race): void{
        $this->race=$race;
    }
    public function setTalent(Talent $talent): void{
        $this->talent=$talent;
    }
    public function setExp(int $exp): void{
        $this->exp=$exp;
    }


    public function roll(){}

    public function action(int $action){}
}