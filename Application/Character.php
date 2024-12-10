<?php
class Character extends Entity{

    protected Race $race;
    protected Talent $talent;
    protected array $skills;
    protected int $peril;

    public function __construct(string $name, Race $race, Talent $talent){
        parent::__construct($name);
        $this->race=$race;
        $this->talent=$talent;        
        $this->level=1;
        $this->maxHealth=$race->getMaxHealth();
        $this->health=$race->getMaxHealth();
        $this->armor=$race->getArmor();
        $this->peril=0;
        $this->skills = array_merge($race->getSkills(), $talent->getSkills());
    }

    public function getRace(): Race{
        return $this->race;
    }
    public function getTalent(): Talent{
        return $this->talent;
    }
    public function getCharacterSkills() {
        return $this->skills;
    }
    public function getPeril(): int{
        return $this->peril;
    }

    public function setRace(Talent $race): void{
        $this->race=$race;
    }
    public function setTalent(Talent $talent): void{
        $this->talent=$talent;
    }
    public function setPeril(int $peril): void{
        $this->peril=$peril;
    }
    

    public function useSkill(Skill $skill, array $targets) {
        $this->peril = $skill->getPeril();
        $skill->useSkill($targets);
    }

    public function levelUp(){
        $this->level++;
        $newStats = $this->race->levelUp($this->level);
        $this->maxHealth+= $newStats[0];
        $this->health+= $newStats[0];
        $this->armor+= $newStats[1];
        $newSkills = $this->talent->levelUp($this->level);
        $this->skills[2]= $newSkills[0];
        $this->skills[3]= $newSkills[1];
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}