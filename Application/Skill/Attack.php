<?php
class Attack implements Skill {
    protected $name;
    protected $description;
    protected $type;
    protected $peril;

    public function __construct() {
        $this->name = "Attack";
        $this->description = "Deal 2 damages";
        $this->type = "Mob";
        $this->peril = "3";
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
            $damage = 2 - $target->getArmor();
            if ($damage > 0) {
                $target->setHealth($target->getHealth() - $damage);
            }
        }
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}