<?php

namespace StudyCsr;

class BronzeArmor implements Armor {
    public function absorbDamage(int $damage): int {
        $absorbed = min($damage, max(0, floor($damage / 2)));
        return $absorbed;
    }
}
