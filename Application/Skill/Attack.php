<?php
class Attack implements Skill {
    protected $name;
    protected $description;
    protected $type;

    public function __construct() {
        $this->name = "Attack";
        $this->description = "Deal 2 damages";
        $this->type = "Mob";
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
            $damage = 2 - $target->getArmor();
            if ($damage > 0) {
                $target->setHealth($target->getHealth() - $damage);
            }
        }
    }
}