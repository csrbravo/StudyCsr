<?php

namespace StudyCsr\Weapons;

namespace StudyCsr\Weapons;

use StudyCsr\Weapon;

class BasicSword extends Weapon {
    protected int $damage = 15;

    public function getDescription(): string {
        return "Espada básica";
    }
}
