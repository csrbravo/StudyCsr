<?php

namespace StudyCsr;

abstract class Weapon {
    protected int $damage = 0;

    public function getDamage(): int {
        return $this->damage;
    }

    abstract public function getDescription(): string;
}
