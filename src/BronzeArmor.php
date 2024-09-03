<?php

namespace StudyCsr;

class BronzeArmor implements Armor {
    public function absorbDamage(int &$damage, Unit $unit): void {
        $absorbed = max(0, floor($damage / 2));
        $damage -= $absorbed;
        $unit->addMessage("La armadura de bronce absorbe {$absorbed} puntos de daño");
    }
}
