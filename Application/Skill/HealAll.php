<?php
class HealAll implements Skill {
    protected $name;
    protected $description;
    protected $type;
    protected $peril;

    public function __construct() {
        $this->name = "Heal All";
        $this->description = "Heal 2 wounds on everybody";
        $this->type = "All";
        $this->peril = "2";
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
    public function getPeril() {
        return $this->peril;
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

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}