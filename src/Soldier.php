<?php

namespace StudyCsr;

class Soldier extends Unit {
    public function attack(Unit $opponent): void {
        $damage = $this->weapon->getDamage();
        $this->dealDamage($opponent, $damage);
    }
}
