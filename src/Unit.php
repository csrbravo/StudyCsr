<?php

namespace StudyCsr;

abstract class Unit {
    protected int $hp;
    protected string $name;
    protected ?Armor $armor = null;  // Inicializado a null
    protected array $messages = [];
    protected ?Weapon $weapon = null;

    public function __construct(string $name, Weapon $weapon, int $hp) {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->hp = $hp;
    }

    public function setWeapon(?Weapon $weapon): void {
        $this->weapon = $weapon;
    }

    public function getWeapon(): ?Weapon {
        return $this->weapon;
    }

    public function setArmor(?Armor $armor = null): void {
        $this->armor = $armor;
    }

    public function move(string $direction): void {
        echo "<p>{$this->name} avanza hacia $direction</p>";
    }

    public function unitDie(): void {
        echo "<p>{$this->name} muere</p>";
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHp(): int {
        return $this->hp;
    }

    abstract public function attack(Unit $opponent): void;

    protected function dealDamage(Unit $opponent, int $damage): int {
        if ($this->weapon !== null) {
            $actualDamage = $this->weapon->getDamage();
            $damageDealt = $opponent->takeDamage($actualDamage);
            $this->addMessage("{$this->name} ataca con {$this->weapon->getDescription()} a {$opponent->getName()} y causa {$damageDealt} puntos de daño");
            return $damageDealt;
        } else {
            $this->addMessage("{$this->name} no tiene arma para atacar");
            return 0;
        }
    }

    public function takeDamage(int $damage): int {
        $originalDamage = $damage;
        if ($this->armor !== null) {
            $this->armor->absorbDamage($damage, $this);
        }
        $this->hp = max(0, $this->hp - $damage);
        $this->addMessage("{$this->name} recibe {$damage} puntos de daño. Vida restante: {$this->hp}");
        if ($this->hp <= 0) {
            $this->unitDie();
        }
        return $originalDamage - $damage;
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
