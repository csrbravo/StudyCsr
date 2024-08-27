<?php
abstract class Unit {
    protected $hp;
    protected $name;
    protected $armor;
    protected $messages = [];

    public function __construct($name, $hp = 100) {
        $this->name = $name;
        $this->hp = $hp;
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function move($direction) {
        echo "<p>{$this->name} avanza hacia $direction</p>";
    }

    public function unitDie() {
        echo "<p>{$this->name} muere</p>";
        exit ("<p>Fin del juego</p>");
    }

    public function getName() {
        return $this->name;
    }

    public function getHp() {
        return $this->hp;
    }

    abstract function attack($opponent);

    public function takeDamage(int $damage): int {
        $originalDamage = $damage;
        if ($this->armor !== null) {
            $this->armor->absorbDamage($damage, $this);
        }
        $this->hp = max(0, $this->hp - $damage);
        $actualDamage = $originalDamage - $damage;
        if ($this->hp <= 0) {
            $this->unitDie();
        }
        return $actualDamage;
    }

    public function addMessage($message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        $messages = $this->messages;
        $this->messages = [];
        return $messages;
    }

}
