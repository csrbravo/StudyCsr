<?php

namespace StudyCsr\Weapons;

use StudyCsr\Weapon;

class BasicBow implements Weapon {
    protected int $damage = 20;

    public function getDamage(): int {
        return $this->damage;
    }

    public function getDescription(): string {
        return "Arco básico";
    }
}
