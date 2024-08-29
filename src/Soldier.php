<?php

namespace StudyCsr;
class Soldier extends Unit {
    protected int $damage = 10;
    protected ?Armor $armor;
    protected string $attackColor;

    public function __construct(string $name, ?Armor $armor = null, int $hp = 100, string $attackColor = 'black') {
        parent::__construct($name, $hp);
        $this->armor = $armor;
        $this->attackColor = $attackColor;
    }

    public function attack(Unit $opponent): void {
        $this->addMessage("{$this->name} ataca a {$opponent->getName()}");
        $damageCaused = $opponent->takeDamage($this->damage);
        if ($damageCaused) {
            $this->addMessage("{$opponent->getName()} pierde {$damageCaused} puntos de vida");
            $this->addMessage("{$opponent->getName()} tiene {$opponent->getHp()} puntos de vida");
        }
        $this->logMessages();
        $this->logMessages($opponent->getMessages());
    }

    protected function logMessages(?array $messages = null): void {
        $messagesToLog = $messages ?? $this->getMessages();
        foreach ($messagesToLog as $message) {
            $this->logMessage($message);
        }
    }

    protected function logMessage(string $message): void {
        echo "<p style='color: {$this->attackColor};'>{$message}</p>";
    }
}
