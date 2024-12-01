<?php
class Attack implements Skill {
    public function useSkill(Entity $target) {
        $target->setHealth($target->getHealth() - 2);
    }
}