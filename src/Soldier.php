<?php
class Soldier extends Unit {
    protected $damage = 10;
    protected $armor;
    protected $attackColor;

    public function __construct($name, Armor $armor = null, $hp = 100, $attackColor = 'black') {
        parent::__construct($name, $hp);
        $this->armor = $armor;
        $this->attackColor = $attackColor;
    }

    public function attack($opponent): void {
        if ($opponent instanceof Unit) {
            $this->addMessage("{$this->name} ataca a {$opponent->getName()}");
            $damageCaused = $opponent->takeDamage($this->damage);
            if ($damageCaused) {
                $this->addMessage("{$opponent->getName()} pierde {$damageCaused} puntos de vida");
                $this->addMessage("{$opponent->getName()} tiene {$opponent->getHp()} puntos de vida");
            }
            $this->logMessages();
            $this->logMessages($opponent->getMessages());
        }
    }

    protected function logMessages($messages = null) {
        $messagesToLog = $messages ?? $this->getMessages();
        foreach ($messagesToLog as $message) {
            $this->logMessage($message);
        }
    }

    protected function logMessage($message): void {
        echo "<p style='color: {$this->attackColor};'>{$message}</p>";
    }
}
