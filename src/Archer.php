<?php

namespace StudyCsr;

class Archer extends Unit {
    public function attack(Unit $opponent): void {
        $damage = $this->weapon->getDamage();
        $this->dealDamage($opponent, $damage);
    }
}
