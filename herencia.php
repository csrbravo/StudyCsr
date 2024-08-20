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

    public function unitDie()
    {
        echo "<p>{$this->name} muere</p>";
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

class Soldier extends Unit {
    protected $damage = 10;

    public function attack($opponent)
    {
        $opponent->takeDamage($this->damage);
        echo "<p>{$this->name} ataca a {$opponent->getName()}</p>";
        echo "<p>{$opponent->getName()} pierde {$this->damage} puntos de vida</p>";
        echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
    }
}
class Archer extends Unit {
    protected $damage = 20;

    public function attack($opponent)
    {
        $opponent->takeDamage($this->damage);
        echo "<p>{$this->name} ataca a {$opponent->getName()}</p>";
        echo "<p>{$opponent->getName()} pierde {$this->damage} puntos de vida</p>";
        echo "<p>{$opponent->getName()} tiene {$opponent->hp} puntos de vida</p>";
        if ($opponent->hp == 0) {
            echo "<p>{$opponent->getName()} ha muerto</p>";
            $opponent->unitDie();
        }elseif ($opponent->hp <0) {
            echo "<p>{$opponent->getName()} ya no le des mas ya se murio </p>";
        }

    }

    public function takeDamage($damage)
    {
        if (rand(0, 1)) {
            parent::takeDamage($damage);
        } else {
            echo "<p>{$this->name} esquiva el ataque</p>";
        }
    }
}


try {
    $Csr = new Archer('Cesar');
    $Csr->move('el norte');
    $Jose = new Soldier('Jose');
    $Jose->move('el sur');
    $Csr->attack($Jose);
    $Csr->attack($Jose);
    $Csr->attack($Jose);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}