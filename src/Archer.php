<?php

namespace StudyCsr;

class Archer extends Unit {
    public function attack(Unit $opponent): void {
        $this->dealDamage($opponent, $this->weapon->getDamage());
    }
}
