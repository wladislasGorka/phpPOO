<?php
class Heal implements Skill {
    public function useSkill(Entity $target) {
        $target->setHealth($target->getHealth() + 2);
        if($target->getHealth()>$target->getMaxHealth()){
            $target->setHealth($target->getMaxHealth());
        }
    }
}