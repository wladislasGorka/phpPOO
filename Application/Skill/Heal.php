<?php
class Heal implements Skill {
    protected $name;
    protected $description;
    protected $type;

    public function __construct() {
        $this->name = "Heal";
        $this->description = "Heal 2 wounds";
        $this->type = "Ally";
    } 
    
    public function getName() {
        return $this->name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getType() {
        return $this->type;
    }

    public function useSkill(array $targets) {
        foreach ($targets as $target) {
            if (!$target instanceof Entity) {
                throw new InvalidArgumentException("Target must be an instance of Entity");
            }
            $target->setHealth($target->getHealth() + 2);
            if($target->getHealth()>$target->getMaxHealth()){
                $target->setHealth($target->getMaxHealth());
            }
        }
    }
}