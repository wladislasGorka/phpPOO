<?php
class Warrior implements Talent{
    protected int $maxHealth;
    protected int $health;
    protected int $armor;

    public function __construct() {
        $this->maxHealth = 0;
        $this->health = 0;
        $this->armor = 0;
    }

    public function getSkills() {
        return [new Attack(),new Attack()];
    }

    public function levelUp(int $level) {
        switch($level) {
            case 1: return [new Attack(),new Attack()]; break;
            case 2: return [new Attack(),new Strike()]; break;
            case 3: return [new Strike(),new Strike()]; break;
            case 4: return [new Strike(),new Strike()]; break;
            case 5: return [new Strike(),new Strike()]; break;
        }
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}