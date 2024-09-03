<?php

namespace StudyCsr\Weapons;

use StudyCsr\Weapon;

class BasicBow extends Weapon {
    protected int $damage = 20;

    public function getDescription(): string {
        return "Arco básico";
    }
}
