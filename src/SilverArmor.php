<?php
class SilverArmor implements Armor
{
    public function absorbDamage(&$damage, Unit $unit)
    {
        $originalDamage = $damage;
        $damage = max(0, $damage - 3);
        $unit->addMessage("La armadura de plata redujo el daño de {$originalDamage} a {$damage}");
    }
}
