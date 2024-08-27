<?php
class CursedArmor implements Armor
{
    public function absorbDamage(&$damage, Unit $unit)
    {
        $originalDamage = $damage;
        $damage *= 2;
        $unit->addMessage("La armadura duplicó los {$originalDamage} puntos de daño a {$damage}");
    }
}