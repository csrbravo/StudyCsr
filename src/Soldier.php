<?php

namespace StudyCsr;

class Soldier extends Unit {
    public function attack(Unit $opponent): void {
        $this->dealDamage($opponent, $this->weapon->getDamage());
    }
}
