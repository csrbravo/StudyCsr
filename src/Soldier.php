<?php
class Soldier extends Unit {
    protected $damage = 10;
    protected $armor;

    public function __construct($name, Armor $armor = null) {
        $this->armor = $armor;
        parent::__construct($name);
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function attack($opponent) {
        $damage = $this->damage;
        $opponent->takeDamage($damage);
        echo "<p>{$this->name} ataca a {$opponent->getName()}</p>";
        echo "<p>{$opponent->getName()} pierde {$damage} puntos de vida</p>";
        echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
    }

    public function takeDamage($damage) {
        if (!is_null($this->armor)) {
            $this->armor->absorbDamage($damage);
        }
        if (rand(0, 1)) {
            parent::takeDamage($damage);
        } else {
            echo "<p>{$this->name} esquiva el ataque</p>";
        }
    }
}
