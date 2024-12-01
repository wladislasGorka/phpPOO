<?php
class Character extends Entity{

    protected Race $race;
    protected Talent $talent;
    protected array $skills;

    public function __construct(string $name, Race $race, Talent $talent){
        parent::__construct($name);
        $this->race=$race;
        $this->talent=$talent;        
        $this->level=1;
        $this->maxHealth=$race->getMaxHealth();
        $this->health=$race->getMaxHealth();
        $this->armor=$race->getArmor();
        $this->skills = array_merge($race->getSkills(), $talent->getSkills());
    }

    public function getRace(): Race{
        return $this->race;
    }
    public function getTalent(): Talent{
        return $this->talent;
    }

    public function setRace(Talent $race): void{
        $this->race=$race;
    }
    public function setTalent(Talent $talent): void{
        $this->talent=$talent;
    }


    public function getCharacterSkills() {
        return $this->skills;
    }

    public function useSkill(Skill $skill, array $targets) {
        $skill->useSkill($targets);
    }
}