<?php
abstract class Unit {
    protected int $hp;
    protected string $name;
    protected ?Armor $armor;
    protected array $messages = [];

    public function __construct(string $name, int $hp = 100) {
        $this->name = $name;
        $this->hp = $hp;
    }

    public function setArmor(?Armor $armor = null): void {
        $this->armor = $armor;
    }

    public function move(string $direction): void {
        echo "<p>{$this->name} avanza hacia $direction</p>";
    }

    public function unitDie(): void {
        echo "<p>{$this->name} muere</p>";
        exit ("<p>Fin del juego</p>");
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHp(): int {
        return $this->hp;
    }

    abstract public function attack(Unit $opponent): void;

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

    public function addMessage(string $message): void {
        $this->messages[] = $message;
    }

    public function getMessages(): array {
        $messages = $this->messages;
        $this->messages = [];
        return $messages;
    }
}