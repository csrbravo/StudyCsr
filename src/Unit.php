<?php
abstract class Unit {
    protected $hp;
    protected $name;

    public function __construct($name, $hp = 100) {
        $this->name = $name;
        $this->hp = $hp;
    }
    public function setArmor(Armor $armor = null)
    {
        $this->armor = $armor;
    }
    public function move($direction)
    {
        echo "<p>{$this->name} avanza hacia $direction</p>";
    }

    public function unitDie()
    {
        echo "<p>{$this->name} muere</p>";
        exit ("<p>Fin del juego</p>");
    }

    public function getName()
    {
        return $this->name;
    }

    abstract function attack($opponent);

    public function takeDamage($damage)
    {
        $this->hp -= $damage;
        if ($this->hp <= 0) {
            $this->unitDie();
        }
    }
}
