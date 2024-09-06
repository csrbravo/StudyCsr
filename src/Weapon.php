<?php

namespace StudyCsr;

interface Weapon {
    public function getDamage(): int;
    public function getDescription(): string;
}
