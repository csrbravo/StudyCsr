<?php
class Archer extends Unit {
    protected $damage = 10;

    public function attack($opponent) {
        if ($opponent->takeDamage($this->damage)) {
            echo "<p>{$this->name} ataca {$opponent->getName()}</p>";
            echo "<p>{$opponent->getName()} pierde {$this->damage} puntos de vida</p>";
            echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
            if ($opponent->hp == 0) {
                echo "<p>{$opponent->getName()} a muerto </p>";
                $opponent->unitDie();
            } elseif ($opponent->hp < 0) {
                echo "<p>{$opponent->getName()} a muerto, ya no le des mas</p>";
            }
        }
    }

    public function takeDamage($damage) {
        if (rand(0, 1)) {
            echo "<p>{$this->name} esquivo el ataque</p>";
            return false;
        } else {
            parent::takeDamage($damage);
            return true;
        }
    }
}