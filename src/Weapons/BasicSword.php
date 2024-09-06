<?php

namespace StudyCsr\Weapons;

use StudyCsr\Weapon;

class BasicSword implements Weapon {
    protected int $damage = 40;

    public function getDamage(): int {
        return $this->damage;
    }

    public function getDescription(): string {
        return "Espada básica";
    }
}
