<?php

namespace StudyCsr;
class BronzeArmor implements Armor {
    public function absorbDamage(&$damage, Unit $unit): void {
        $originalDamage = $damage;
        $damage = max(0, $damage / 2);
        $unit->addMessage("La armadura de bronce redujo el daño de {$originalDamage} a {$damage}");
    }
}