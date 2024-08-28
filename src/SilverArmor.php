<?php
class SilverArmor implements Armor
{
    public function absorbDamage(int &$damage, Unit $unit): void
    {
        $originalDamage = $damage;
        $damage = max(0, $damage - 3);
        $unit->addMessage("La armadura de plata redujo el daño de {$originalDamage} a {$damage}");
    }
}
