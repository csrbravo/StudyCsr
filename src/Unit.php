<?php

namespace StudyCsr;

abstract class Unit {
    protected int $hp;
    protected string $name;
    protected ?Armor $armor = null;
    protected array $messages = [];
    protected ?Weapon $weapon = null;

    public function __construct(string $name, ?Weapon $weapon, int $hp) {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->hp = $hp;
    }

    public function setWeapon(?Weapon $weapon): self {
        $this->weapon = $weapon;
        return $this;
    }

    public function setArmor(?Armor $armor = null): self {
        $this->armor = $armor;
        return $this;
    }

    public function move(string $direction): void {
        $this->addMessage("{$this->name} avanza hacia $direction");
    }

    public function unitDie(): void {
        $this->addMessage("{$this->name} muere");
    }

    public function getName(): string { return $this->name; }
    public function getHp(): int { return $this->hp; }
    public function getWeapon(): ?Weapon { return $this->weapon; }

    abstract public function attack(Unit $opponent): void;

    protected function dealDamage(Unit $opponent, int $damage): int {
        if ($this->weapon === null) {
            $this->addMessage("{$this->name} no tiene arma para atacar");
            return 0;
        }

        $damageDealt = $opponent->takeDamage($damage);
        $this->addMessage("{$this->name} ataca con {$this->weapon->getDescription()} a {$opponent->getName()} y causa {$damageDealt} puntos de daño");
        return $damageDealt;
    }

    public function takeDamage(int $damage): int {
        $originalDamage = $damage;
        if ($this->armor !== null) {
            $absorbedDamage = $this->armor->absorbDamage($damage);
            $damage -= $absorbedDamage;
            $this->addMessage("La armadura de {$this->name} absorbe {$absorbedDamage} puntos de daño");
        }
        $this->hp = max(0, $this->hp - $damage);
        $this->addMessage("{$this->name} recibe {$damage} puntos de daño. Vida restante: {$this->hp}");
        if ($this->hp <= 0) {
            $this->unitDie();
        }
        return $damage;
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
