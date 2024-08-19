<?php
abstract class Unit {
    protected $hp = 50;
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function move($direction)
    {
        echo "<p>{$this->name} avanza hacia $direction</p>";
    }


    public function getName()
    {
        return $this->name;
    }

    abstract function attack($opponent);

}

class Soldier extends Unit {
    protected $damage = 10;

    public function attack($opponent)
    {
        $opponent->hp = $opponent->hp - $this->damage;
        echo "<p>{$this->name} ataca a {$opponent->getName()}</p>";
        echo "<p>{$opponent->getName()} pierde {$this->damage} puntos de vida</p>";
        echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
    }
}
class Archer extends Unit {
    protected $damage = 20;
    public function attack($opponent)
    {
        $opponent->hp = $opponent->hp - $this->damage;
        echo "<p>{$this->name} ataca a {$opponent->getName()}</p>";
        echo "<p>{$opponent->getName()} pierde {$this->damage} puntos de vida</p>";
        echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
    }
}


try {
    $Csr = new Archer('Cesar');
    $Csr->move('el norte');
    $Jose = new Soldier('Jose');
    $Jose->move('el sur');
    $Csr->attack($Jose);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}